<?php
declare(strict_types=1);

namespace App\Controller;
class PgsController extends AppController
{
    public function index()
    {
        $this->Authorization->skipAuthorization();
        $this->paginate = [
            'contain' => ['Users'],
        ];
        $pgs = $this->paginate($this->Pgs);

        $this->set(compact('pgs'));
    }

    public function view($id = null)
    {
        $this->Authorization->skipAuthorization();
        $pg = $this->Pgs->get($id, [
            'contain' => ['Users', 'Addresses', 'Facilities', 'Images', 'Pricings', 'Ratings', 'Requests', 'Rules'],
        ]);

        $this->set('pg', $pg);
    }

    public function add()
    {

        $pg = $this->Pgs->newEmptyEntity();
        $this->Authorization->authorize($pg);

        if ($this->request->is('post')) {
            $pg = $this->Pgs->patchEntity($pg, $this->request->getData());
            $pg->user_id = $this->request->getAttribute('identity')->getIdentifier();

            if ($this->Pgs->save($pg)) {
                $this->Flash->success(__('The pg has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pg could not be saved. Please, try again.'));
        }
        $users = $this->Pgs->Users->find('list', ['limit' => 200]);
        $this->set(compact('pg', 'users'));
    }
    public function edit($id = null)
    {

        $pg = $this->Pgs->get($id, [
            'contain' => [],
        ]);
        $this->Authorization->authorize($pg);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $pg = $this->Pgs->patchEntity($pg, $this->request->getData(),['accessibleFields' => ['user_id' => false]]);
            if ($this->Pgs->save($pg)) {
                $this->Flash->success(__('The pg has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pg could not be saved. Please, try again.'));
        }
        $users = $this->Pgs->Users->find('list', ['limit' => 200]);
        $this->set(compact('pg', 'users'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pg = $this->Pgs->get($id);
        $this->Authorization->authorize($pg);
        if ($this->Pgs->delete($pg)) {
            $this->Flash->success(__('The pg has been deleted.'));
        } else {
            $this->Flash->error(__('The pg could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
