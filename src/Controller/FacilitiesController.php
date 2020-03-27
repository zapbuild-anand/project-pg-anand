<?php
declare(strict_types=1);

namespace App\Controller;
class FacilitiesController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
        $this->viewBuilder()->setLayout('customLayout');
    }
    public function index()
    {
        $this->paginate = [
            'contain' => ['Pgs'],
        ];
        $facilities = $this->paginate($this->Facilities);

        $this->set(compact('facilities'));
    }
    public function view($id = null)
    {
        $facility = $this->Facilities->get($id, [
            'contain' => ['Pgs', 'Meals'],
        ]);

        $this->set('facility', $facility);
    }
    public function add($id = null)
    {
        $facility = $this->Facilities->newEmptyEntity();
        if ($this->request->is('post')) {
            $facility = $this->Facilities->patchEntity($facility, $this->request->getData());
            $facility->pg_id=$id;
            if ($this->Facilities->save($facility)) {
                $this->Flash->success(__('The facility has been saved.'));

                return $this->redirect(['controller'=>'pricings','action' => 'add',$id]);
            }
            $this->Flash->error(__('The facility could not be saved. Please, try again.'));
        }
        $pgs = $this->Facilities->Pgs->find('list', ['limit' => 200]);
        $this->set(compact('facility', 'pgs'));
    }
    public function edit($id = null)
    {
        $facility = $this->Facilities->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $facility = $this->Facilities->patchEntity($facility, $this->request->getData());
            if ($this->Facilities->save($facility)) {
                $this->Flash->success(__('The facility has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The facility could not be saved. Please, try again.'));
        }
        $pgs = $this->Facilities->Pgs->find('list', ['limit' => 200]);
        $this->set(compact('facility', 'pgs'));
    }
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $facility = $this->Facilities->get($id);
        if ($this->Facilities->delete($facility)) {
            $this->Flash->success(__('The facility has been deleted.'));
        } else {
            $this->Flash->error(__('The facility could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
