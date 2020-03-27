<?php
declare(strict_types=1);

namespace App\Controller;
class AddressesController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
        $this->viewBuilder()->setLayout('customLayout');
    }
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Pgs'],
        ];
        $addresses = $this->paginate($this->Addresses);

        $this->set(compact('addresses'));
    }

    public function view($id = null)
    {
        $address = $this->Addresses->get($id, [
            'contain' => ['Users', 'Pgs'],
        ]);

        $this->set('address', $address);
    }

    public function addPg($id = null)
    {
        $address = $this->Addresses->newEmptyEntity();
        if ($this->request->is('post')) {
            $address = $this->Addresses->patchEntity($address, $this->request->getData());
            $address->pg_id=$id;
            if ($this->Addresses->save($address)) {
                $this->Flash->success(__('The address has been saved.'));

                return $this->redirect(['controller'=>'facilities','action' => 'add',$id]);
            }
            $this->Flash->error(__('The address could not be saved. Please, try again.'));
        }
        $users = $this->Addresses->Users->find('list', ['limit' => 200]);
        $pgs = $this->Addresses->Pgs->find('list', ['limit' => 200]);
        $this->set(compact('address', 'users', 'pgs'));
    }

    public function addUser($id = null)
    {
        $address = $this->Addresses->newEmptyEntity();
        if ($this->request->is('post')) {
            $address = $this->Addresses->patchEntity($address, $this->request->getData());
            $address->user_id = $this->request->getAttribute('identity')->getIdentifier();
            if ($this->Addresses->save($address)) {
                $this->Flash->success(__('The address has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The address could not be saved. Please, try again.'));
        }
        $users = $this->Addresses->Users->find('list', ['limit' => 200]);
        $pgs = $this->Addresses->Pgs->find('list', ['limit' => 200]);
        $this->set(compact('address', 'users', 'pgs'));
    }

    public function edit($id = null)
    {
        $address = $this->Addresses->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $address = $this->Addresses->patchEntity($address, $this->request->getData());
            if ($this->Addresses->save($address)) {
                $this->Flash->success(__('The address has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The address could not be saved. Please, try again.'));
        }
        $users = $this->Addresses->Users->find('list', ['limit' => 200]);
        $pgs = $this->Addresses->Pgs->find('list', ['limit' => 200]);
        $this->set(compact('address', 'users', 'pgs'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $address = $this->Addresses->get($id);
        if ($this->Addresses->delete($address)) {
            $this->Flash->success(__('The address has been deleted.'));
        } else {
            $this->Flash->error(__('The address could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
