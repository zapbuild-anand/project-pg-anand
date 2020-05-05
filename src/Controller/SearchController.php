<?php
declare(strict_types=1);

namespace App\Controller;
class SearchController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
        $this->viewBuilder()->setLayout('customLayout');
    }

    public function index()
    {
        $this->loadModel('Addresses');
        $this->loadModel('Shortlists');
        $arr=[];
        $owner=[];
        $this->Authorization->skipAuthorization();
        if ($this->request->is('get') && !empty($this->request->getQuery('search'))) {
            $key=$this->request->getQuery('search');
            $key=explode(" ", $key);
            $len=count($key);
            if($len==1){
                $key=$key[0];
                $addresses=$this->Addresses->find()->where(['OR'=>['district'=>$key,'state'=>$key]]);
            }
            else
            {
                $sector=explode("-", $key[0]);
                $sector=$sector[1];
                $district=$key[$len-1];
                $addresses=$this->Addresses->find()->where(['AND'=>['district'=>$district,'sector'=>$sector]]);
                $key="Sector-".$sector." ".$district;
            }

            $addresses->select(['pg_id']);
            foreach ($addresses as $row) 
            {
                $arr[]=$row->pg_id;
            }
            if(!count($arr)==0)
            {
                $this->loadModel('Pgs');
                $pgs=$this->Pgs->find()->where(['AND'=>['id in'=>$arr,'approved'=>'1']]);
                $this->set('pgs',$pgs);

                $count=0;
                foreach ($pgs as $pg) {
                    $owner[]=$pg->user_id;
                    $count++;
                }
                
                $this->set('search', $key);
                $this->set('pgcount', $count);

                $this->loadModel('Users');
                $users=$this->Users->find()->where(['id in'=>$owner]);
                $users->select(['id','firstname','lastname','phone','email']);
                $this->set('users', $users);

                $this->loadModel('Images');
                $imgs=$this->Images->find();
                $this->set('imgs', $imgs);

                $this->loadModel('Facilities');
                $facilities=$this->Facilities->find()->where(['pg_id in'=>$arr]);
                $facilities->select(['pg_id','furnishing']);
                $this->set('facilities', $facilities);

                $this->loadModel('Pricings');
                $pricings=$this->Pricings->find()->where(['pg_id in'=>$arr]);
                $pricings->select(['pg_id','rent']);
                $this->set('pricings', $pricings);                

                $session = $this->getRequest()->getSession();
                $user_id= $session->read('Auth.id');
                $this->set('user_id',$user_id);
                if(isset($user_id)){
                    $shortlists=$this->Shortlists->find('all')->where(['pg_id in'=>$arr]);
                    if($shortlists)
                        $this->set('shortlists',$shortlists);
                }
            }
            else
            {
                $error="No results matching your search!";
                $this->set(compact('error'));
            }
        }
        $address = $this->Addresses->find('all', ['limit' => 200]);
        $this->set(compact('address'));
    }

   
}
