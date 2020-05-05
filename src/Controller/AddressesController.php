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
        $address = $this->Addresses->findByPg_id($id)->first();
        if($address)
        {
            $this->Flash->error(__('Already added.'));
            return $this->redirect(['controller'=>'addresses','action' => 'edit',$id]);
        }
        $address = $this->Addresses->newEmptyEntity();
        if ($this->request->is('post')) {
            $address = $this->Addresses->patchEntity($address, $this->request->getData());
            $address->pg_id=$id;
            if ($this->Addresses->save($address)) {
                $this->Flash->success(__('The address has been saved.'));
                $this->loadModel('Pgs');
                $newpg=$this->Authentication->getIdentity()->id;
                $pg = $this->Pgs->findByUser_id($newpg)->last();
                return $this->redirect(['controller'=>'pgs','action' => 'details',$pg->id]);
            }
            $this->Flash->error(__('The address could not be saved. Please, try again.'));
        }
        $this->loadModel('Categories');
        $categories = $this->Categories->find('list', ['limit' => 200]);
        $categories->select(['name']);
        $this->set(compact('address','categories'));
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
        $address = $this->Addresses->findByPg_id($id)->first();
        if(!$address)
        {
            return $this->redirect(['controller'=>'addresses','action' => 'add-pg',$id]);
        }
        if ($this->request->is(['patch', 'post', 'put'])) {
            $address = $this->Addresses->patchEntity($address, $this->request->getData());
            if ($this->Addresses->save($address)) {
                $this->Flash->success(__('The address has been updated.'));

                return $this->redirect(['controller'=>'pgs','action' => 'edit',$id]);
            }
            $this->Flash->error(__('The address could not be saved. Please, try again.'));
        }
        $this->set(compact('address'));
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
