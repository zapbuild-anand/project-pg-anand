<?php
declare(strict_types=1);

namespace App\Controller;
use Authorization\IdentityInterface;
use Cake\Mailer\Mailer;
use Cake\Mailer\TransportFactory;
use Cake\Utility\Security;

class UsersController extends AppController
{
   public function initialize(): void
    {
        parent::initialize();
        $this->viewBuilder()->setLayout('customLayout');
    }

    public function search()
    {
        $this->viewBuilder()->setLayout('ajax');
        $this->request->allowMethod('ajax');
        $this->loadModel('Addresses');
        $keyword = $this->request->getQuery('keyword');
        $query = $this->Addresses->find('all')->where(['district like'=>'%'.$keyword.'%']);
        $query->select(['sector','district'])->distinct(['sector','district']);
        $this->set('addresses', $this->paginate($query));
        $this->set('_serialize', ['addresses']);

    }

    public function dashboard()
    {
        $this->viewBuilder()->setLayout('guestLayout');
        $this->Authorization->skipAuthorization();
        
        $session = $this->getRequest()->getSession();
        $user_id=$session->read('Auth.id');
       
        $this->loadModel('Shortlists');
        $shortlists=$this->Shortlists->findByUser_id($user_id);
        $arr_pg=[];
        foreach ($shortlists as $shortlist) {
            $arr_pg[]=$shortlist->pg_id;
        }
        if(count($arr_pg)!=0)
        {
            $this->loadModel('Pgs');
            $pgs=$this->Pgs->find('all')->where(['id in'=>$arr_pg]);
            $this->set(compact('pgs'));
            $count=0;
                foreach ($pgs as $pg) {
                    $owner[]=$pg->user_id;
                    $count++;
                }
                
                $this->set('pgcount', $count);

                $this->loadModel('Users');
                $users=$this->Users->find()->where(['id in'=>$owner]);
                $users->select(['id','firstname','lastname','phone','email']);
                $this->set('users', $users);

                $this->loadModel('Images');
                $imgs=$this->Images->find();
                $this->set('imgs', $imgs);

                $this->loadModel('Facilities');
                $facilities=$this->Facilities->find()->where(['pg_id in'=>$arr_pg]);
                $facilities->select(['pg_id','furnishing']);
                $this->set('facilities', $facilities);

                $this->loadModel('Pricings');
                $pricings=$this->Pricings->find()->where(['pg_id in'=>$arr_pg]);
                $pricings->select(['pg_id','rent']);
                $this->set('pricings', $pricings);                

                $this->loadModel('Addresses');
                $address = $this->Addresses->find('all')->where(['pg_id in'=>$arr_pg]);
                $this->set(compact('address'));

                $this->set('user_id',$user_id);
                if(isset($user_id)){
                    $shortlists=$this->Shortlists->find('all')->where(['pg_id in'=>$arr_pg]);
                    if($shortlists)
                        $this->set('shortlists',$shortlists);
                }
            }
            else
            {
                $error="No PGs shortlisted yet!";
                $this->set(compact('error'));
            }
    }

    public function index()
    {
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }

    public function home()
    {
       
    }
    
    public function login()
    {       
        $this->request->allowMethod(['get', 'post']);
        
        $result = $this->Authentication->getResult();
        // regardless of POST or GET, redirect if user is logged in
        if ($result->isValid()) {

            // variable for dynamic menu
            $_SESSION['user']='login';
            if($this->Authentication->getIdentityData('type')==3)
            {
                $redirect = $this->request->getQuery('redirect', [
                    'controller' => 'Admin',
                    'action' => 'index',
                ]);
            }
            elseif($this->Authentication->getIdentityData('type')==2)
            {
                $redirect = $this->request->getQuery('redirect', [
                'controller' => 'Hosts',
                'action' => 'dashboard',
                ]);
            }
            else
            {
                $redirect = $this->request->getQuery('redirect', [
                'controller' => 'Users',
                'action' => 'home',
                ]);
            }

            return $this->redirect($redirect);
        }
        // display error if user submitted and authentication failed
        if ($this->request->is('post') && !$result->isValid()) 
        {
            $this->set('error','The username or password you eneterd is incorrect.');
            //$this->Flash->error(__('Invalid username or password'));
        }
    }


    public function logout()
    {
        $this->Authorization->skipAuthorization();
        $result = $this->Authentication->getResult();
        // regardless of POST or GET, redirect if user is logged in
        if ($result->isValid()) {
            $this->Authentication->logout();
            unset($_SESSION['user']);
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }
    }

    

    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Addresses', 'Pgs', 'Ratings', 'Requests'],
        ]);
        if($this->Authorization->can($user, 'view'))
            $this->set('user', $user);
        else
        {
            $this->Flash->error(__('Unauthorized access'));
            return $this->redirect(['action' => 'index']);
        }
    }
    public function profile()
    {
        $id=$this->Authentication->getIdentity()->id;
        $user = $this->Users->get($id, [
            'contain' => ['Addresses', 'Pgs', 'Ratings', 'Requests'],
        ]);
        if($this->Authorization->can($user, 'view'))
            $this->set('user', $user);
        else
        {
            $this->Flash->error(__('Unauthorized access'));
            return $this->redirect(['action' => 'index']);
        }
    }
    public function add()
    {
        $base_url=WWW_ROOT."img";
        $this->Authorization->skipAuthorization();
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if(!$user->getErrors)
            {    
                $image=$this->request->getData('image');
                $name=$image->getClientFilename();
                if($name){
                    if(!is_dir(WWW_ROOT.'img'.DS.'user-img'))
                        mkdir(WWW_ROOT.'img'.DS.'user-img',0775);
                    $targetPath=WWW_ROOT.'img'.DS.'user-img'.DS.$name;
                    $image->moveTo($targetPath);
                    $user->image='user-img/'.$name;
                    $user->type=1;
                }
            }  
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['controller'=>'users','action' => 'login']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    public function edit()
    {
        $id=$this->Authentication->getIdentity()->id;
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        if($this->Authorization->can($user, 'edit'))
            $this->set('user', $user);
        else
        {
            $this->Flash->error(__('Unauthorized access'));
            return $this->redirect(['action' => 'index']);
        }
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'profile']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }
    public function changePassword()
    {
        $id=$this->Authentication->getIdentity()->id;
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        if($this->Authorization->can($user, 'edit'))
            $this->set('user', $user);
        else
        {
            $this->Flash->error(__('Unauthorized access'));
            return $this->redirect(['action' => 'index']);
        }
        if ($this->request->is(['patch', 'post', 'put'])) {
          $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Password changed successfully.'));

                return $this->redirect(['action' => 'profile']);
            }
            $this->Flash->error(__('Error occured while changing password!'));
        }
        $this->set(compact('user'));
    }

    public function forgotPassword()
    {
        if ($this->request->is('post')) {
            $myemail = $this->request->getData('email');
            $mytoken=Security::hash(Security::randomBytes(25));

            $user=$this->Users->findByEmail($myemail)->first();
            if(isset($user))
            {
                $user->token=$mytoken;
                if ($this->Users->save($user)) {
                    $this->set(compact('myemail'));

                TransportFactory::setConfig('mailtrap', [
                    'host' => 'smtp.mailtrap.io',
                    'port' => 2525,
                    'username' => '49471287cb0491',
                    'password' => '5b42fc8d761261',
                    'className' => 'Smtp'
                ]);

                TransportFactory::setConfig('gmail', [
                    'host' => 'smtp.gmail.com',
                    'port' => 587,
                    'username' => 'ak7870854714@gmail.com',
                    'password' => '@An2663@',
                    'className' => 'Smtp',
                    'tls' => true
                ]);
                    $mailer=new Mailer('default');
                    $mailer=$mailer->setTransport('mailtrap')
                            ->setEmailFormat('both')
                            ->setFrom(['ak7870854714@gmail.com'=>'Anand Kumar'])
                            ->setSubject('Please confirm your reset password:')
                            ->setTo($myemail);
                    $mailer->deliver('Hello '.$myemail.'<br>Please click link below to reset your password<br><br><br><a href="http://localhost:8765/users/reset-password/'.$mytoken.'">Reset Password</a>');
                }

                
            }
            else
            {
                $this->set('error','The email id is not registered with us. Please check them again.');
            }
              
        }
    }


    public function resetPassword($token)
    {
        if ($this->request->is('post')) {
            $mypass=$this->request->getData('password');

            $user=$this->Users->find('all')->where(['token'=>$token])->first();
            if(isset($user))
            {
                $user->password=$mypass;
                $user->token='';
                if ($this->Users->save($user)) {
                    $this->Flash->success(__('Password recovered.'));

                    return $this->redirect(['action' => 'login']);
                }
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
            else
            {
                echo 'Link expired.';die;
            }
        }
    }

    public function changeImage()
    {
        $base_url=WWW_ROOT."img";
        $id=$this->Authentication->getIdentity()->id;
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        if($this->Authorization->can($user, 'edit'))
            $this->set('user', $user);
        else
        {
            $this->Flash->error(__('Unauthorized access'));
            return $this->redirect(['action' => 'index']);
        }
        if(file_exists(WWW_ROOT."img/user-img".$user->image))
        {
            //delete file
            unlink(WWW_ROOT."img/user-img".$user->image);
        }
        if ($this->request->is(['patch', 'post', 'put'])) {
          $user = $this->Users->patchEntity($user, $this->request->getData());
          if(!$user->getErrors)
            {    
                $image=$this->request->getData('image');
                $name=$image->getClientFilename();
                if($name){
                    if(!is_dir(WWW_ROOT.'img'.DS.'user-img'))
                        mkdir(WWW_ROOT.'img'.DS.'user-img',0775);
                    $targetPath=WWW_ROOT.'img'.DS.'user-img'.DS.$name;
                    $image->moveTo($targetPath);
                    $user->image='user-img/'.$name;
                }
            }
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Image changed successfully.'));
                
                return $this->redirect(['action' => 'profile']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if($this->Authorization->can($user, 'delete'))
            $this->set('user', $user);
        else
        {
            $this->Flash->error(__('Unauthorized access'));
            return $this->redirect(['action' => 'index']);
        }
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        // Configure the login action to not require authentication, preventing
        // the infinite redirect loop issue
        $this->Authentication->addUnauthenticatedActions(['login', 'add','home','search']);
    }
}
