<?php
declare(strict_types=1);

namespace App\Controller\Admin;

class UsersController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
        $this->viewBuilder()->setLayout('adminLayout');
    }

    public function index()
    {
        $this->Authorization->skipAuthorization();
        $users = $this->paginate($this->Users->findByType('2'));

        $this->set(compact('users'));
    }

    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Addresses', 'Pgs', 'Ratings', 'Requests'],
        ]);

        $this->set('user', $user);
    }
    
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
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

    public function delete()
    {
        $this->request->allowMethod(['ajax', 'delete']);
        $id=$this->request->getData('id');
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            echo "Owner removed!";
            die;
        } else {
            echo 'The user could not be deleted. Please, try again.';
            die;
        }
    }
}
