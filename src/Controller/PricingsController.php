<?php
declare(strict_types=1);

namespace App\Controller;
class PricingsController extends AppController
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
        $pricings = $this->paginate($this->Pricings);

        $this->set(compact('pricings'));
    }
    public function view($id = null)
    {
        $pricing = $this->Pricings->get($id, [
            'contain' => ['Pgs'],
        ]);

        $this->set('pricing', $pricing);
    }
    public function add($id = null)
    {
        $pricing = $this->Pricings->findByPg_id($id)->first();
        if($pricing)
        {
            return $this->redirect(['controller'=>'pricings','action' => 'add',$id]);
        }
        $pricing = $this->Pricings->newEmptyEntity();
        if ($this->request->is('post')) {
            $pricing = $this->Pricings->patchEntity($pricing, $this->request->getData());
            $pricing->pg_id=$id;
            if ($this->Pricings->save($pricing)) {
                $this->Flash->success(__('The pricing has been saved.'));
                $this->loadModel('Pgs');
                $newpg=$this->Authentication->getIdentity()->id;
                $pg = $this->Pgs->findByUser_id($newpg)->last();
                return $this->redirect(['controller'=>'pgs','action' => 'details',$pg->id]);
            }
            $this->Flash->error(__('The pricing could not be saved. Please, try again.'));
        }
        $pgs = $this->Pricings->Pgs->find('list', ['limit' => 200]);
        $this->set(compact('pricing', 'pgs'));
    }
    public function edit($id = null)
    {
        $pricing = $this->Pricings->findByPg_id($id)->first();
        if(!$pricing)
        {
            return $this->redirect(['controller'=>'pricings','action' => 'add',$id]);
        }
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pricing = $this->Pricings->patchEntity($pricing, $this->request->getData());
            if ($this->Pricings->save($pricing)) {
                $this->Flash->success(__('Pricings has been updated.'));

                return $this->redirect(['controller'=>'pgs','action' => 'edit',$id]);
            }
            $this->Flash->error(__('The pricing could not be saved. Please, try again.'));
        }
        $this->set(compact('pricing'));
    }
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pricing = $this->Pricings->get($id);
        if ($this->Pricings->delete($pricing)) {
            $this->Flash->success(__('The pricing has been deleted.'));
        } else {
            $this->Flash->error(__('The pricing could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
