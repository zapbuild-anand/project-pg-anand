<?php
declare(strict_types=1);

namespace App\Controller;
use Authorization\IdentityInterface;


class UsersController extends AppController
{
   public function initialize(): void
    {
        parent::initialize();
        $this->viewBuilder()->setLayout('customLayout');
    }

    public function home()
    {
        //pr($this->Authentication->getIdentity()->type);
        $this->Authorization->skipAuthorization();

    }
   
    public function login()
    {
        $this->Authorization->skipAuthorization();
       
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
            $this->Flash->error(__('Invalid username or password'));
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

    public function index()
    {
        $this->Authorization->skipAuthorization();
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
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
            if($_FILES['image']['tmp_name'])
            {
                $file_tmp =$_FILES['image']['tmp_name'];
                $file_name = "".date('mdYHis')."".$_FILES['image']['name'];
                move_uploaded_file($file_tmp,$base_url."/".$file_name);
            }
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $user['image']=$file_name;    
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    public function edit($id = null)
    {
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

                return $this->redirect(['action' => 'index']);
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
        $this->Authentication->addUnauthenticatedActions(['login', 'add']);
    }
}
