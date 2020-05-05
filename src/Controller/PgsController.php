<?php
declare(strict_types=1);

namespace App\Controller;
class PgsController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
        $this->viewBuilder()->setLayout('customLayout');
    }
    public function index()
    {
        $this->viewBuilder()->setLayout('hostLayout');
        $this->Authorization->skipAuthorization();
        $session = $this->getRequest()->getSession();
        $user_id= $session->read('Auth.id');
        $pgs = $this->paginate($this->Pgs->findByUser_id($user_id));

        $this->set(compact('pgs'));
    }

    public function view($id = null)
    {
        if($this->request->is('post')){
            $this->loadModel('Requests');
            $this->loadModel('Bookings');
            $request=$this->Requests->newEmptyEntity();
            $booking = $this->Bookings->newEmptyEntity();
            $pg_id=$id;
            $session = $this->getRequest()->getSession();
            $user_id= $session->read('Auth.id');
            $checkindate=$this->request->getData('checkindate');
            $message=$this->request->getData('message');
            $request = $this->Requests->patchEntity($request, ['pg_id'=>$pg_id,'user_id'=>$user_id,'checkindate'=>$checkindate,'message'=>$message]);
            if ($this->Requests->save($request)) {
                $newrequest=$this->Requests->findByPg_id($id)->last();
                $booking = $this->Bookings->patchEntity($booking, ['request_id'=>$newrequest->id,'status'=>0]);
                if ($this->Bookings->save($booking)) {
                    $this->Flash->success(__('Booking request sent!'));
                    return $this->redirect(['controller'=>'bookings','action' => 'index']);
                }
            }
            $this->Flash->error(__('Please, try again.'));
        }
        $this->Authorization->skipAuthorization();
        $this->loadModel('Shortlists');
        $pg = $this->Pgs->get($id, [
            'contain' => ['Users', 'Addresses', 'Facilities', 'Images', 'Pricings', 'Ratings', 'Requests', 'Rules'],
        ]);
        $this->set('pg', $pg);
        $pgs=$this->Pgs->find('all')->where(['user_id'=>$pg->user->id]);
        $pgs->select(['id']);
        $this->set('pgs',$pgs);
        $session = $this->getRequest()->getSession();
        $user_id= $session->read('Auth.id');
        $this->set('user_id',$user_id);
        if(isset($user_id)){
           $shortlist=$this->Shortlists->find('all')->where(['AND'=>['user_id'=>$user_id,'pg_id'=>$pg->id]])->first();
           if($shortlist)
            $this->set('shortlist',$shortlist);
        }
    }

    public function add()
    {
        $this->loadModel('Categories');
        $this->loadModel('Addresses');
        $this->loadModel('Facilities');
        $this->loadModel('Pricings');
        $this->loadModel('Rules');
        $this->loadModel('Images');
        
        $pg = $this->Pgs->newEmptyEntity();
        $address = $this->Addresses->newEmptyEntity();
        $facility = $this->Facilities->newEmptyEntity();
        $pricing = $this->Pricings->newEmptyEntity();
        $rule = $this->Rules->newEmptyEntity();
        $image = $this->Images->newEmptyEntity();
        $this->Authorization->authorize($pg);

        if ($this->request->is('post')) {
            $pg = $this->Pgs->patchEntity($pg, $this->request->getData());
            //pr($pg);
            $pg->user_id = $this->request->getAttribute('identity')->getIdentifier();
            $address = $this->Addresses->patchEntity($address, $this->request->getData());
            //pr($address);die;
            $facility = $this->Facilities->patchEntity($facility, $this->request->getData());
            $pricing = $this->Pricings->patchEntity($pricing, $this->request->getData());
            $rule = $this->Rules->patchEntity($rule, $this->request->getData());
            $image = $this->Images->patchEntity($image, $this->request->getData());

            if ($this->Pgs->save($pg)) {
                $newpg=$this->Authentication->getIdentity()->id;
                $pg = $this->Pgs->findByUser_id($newpg)->last();
                $address->pg_id=$pg->id;
                $facility->pg_id=$pg->id;
                $pricing->pg_id=$pg->id;
                $rule->pg_id=$pg->id;
                $image->pg_id=$pg->id;
                if ($this->Addresses->save($address) && $this->Facilities->save($facility) && $this->Pricings->save($pricing) && $this->Rules->save($rule) && $this->Images->save($image)) {
                    $message='';
                    $session = $this->getRequest()->getSession();
                    $user_type=$session->read('Auth.type');
                    if ($user_type==1) {
                        $pg = $this->Pgs->patchEntity($pg, $this->request->getData());
                        if ($this->Pgs->save($pg)) {
                            $message.='Congrates you became a Host and ';
                        }
                    }
                    $message.='Your PG has been added.';
                    $this->Flash->success(__($message));
                    return $this->redirect(['controller'=>'pgs','action' => 'add']);
                }
            }
            $this->Flash->error(__('The pg could not be saved. Please, try again.'));
        }
        $users = $this->Pgs->Users->find('list', ['limit' => 200]);
        $categories=$this->Categories->find('all');
        $this->set(compact('pg', 'users','categories','facility'));
    }

    public function edit($id = null)
    {

        $pg = $this->Pgs->get($id, [
            'contain' => [],
        ]);
        $this->Authorization->authorize($pg);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $pg = $this->Pgs->patchEntity($pg, $this->request->getData());
            if ($this->Pgs->save($pg)) {
                $this->Flash->success(__('The pg has been saved.'));

                return $this->redirect(['controller'=>'hosts','action' => 'dashboard']);
            }
            $this->Flash->error(__('The pg could not be saved. Please, try again.'));
        }
        $users = $this->Pgs->Users->find('list', ['limit' => 200]);
        $this->set(compact('pg', 'users'));
    }

     public function delete()
    {
        $this->request->allowMethod(['ajax', 'delete']);
        $id=$this->request->getQuery('id');
        $pg = $this->Pgs->get($id);
        $this->Authorization->authorize($pg);
        if ($this->Pgs->delete($pg)) {
            echo "PG removed!";
            die;
        } else {
            echo 'The pg could not be deleted. Please, try again.';
            die;
        }
    }
}
