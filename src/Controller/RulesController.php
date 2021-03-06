<?php
declare(strict_types=1);

namespace App\Controller;
class RulesController extends AppController
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
        $rules = $this->paginate($this->Rules);

        $this->set(compact('rules'));
    }

    public function view($id = null)
    {
        $rule = $this->Rules->get($id, [
            'contain' => ['Pgs'],
        ]);

        $this->set('rule', $rule);
    }
    public function add($id = null)
    {
        $rule = $this->Rules->findByPg_id($id)->first();
        if($rule)
        {
            return $this->redirect(['controller'=>'rules','action' => 'edit',$id]);
        }
        $rule = $this->Rules->newEmptyEntity();
        if ($this->request->is('post')) {
            $rule = $this->Rules->patchEntity($rule, $this->request->getData());
            $rule->pg_id=$id;
            if ($this->Rules->save($rule)) {
                $this->Flash->success(__('The rule has been saved.'));
                $this->loadModel('Pgs');
                $newpg=$this->Authentication->getIdentity()->id;
                $pg = $this->Pgs->findByUser_id($newpg)->last();
                return $this->redirect(['controller'=>'pgs','action' => 'details',$pg->id]);
            }
            $this->Flash->error(__('The rule could not be saved. Please, try again.'));
        }
        $pgs = $this->Rules->Pgs->find('list', ['limit' => 200]);
        $this->set(compact('rule', 'pgs'));
    }
    public function edit($id = null)
    {
        $rule = $this->Rules->findByPg_id($id)->first();
        if(!$rule)
        {
            return $this->redirect(['controller'=>'rules','action' => 'add',$id]);
        }
        if ($this->request->is(['patch', 'post', 'put'])) {
            $rule = $this->Rules->patchEntity($rule, $this->request->getData());
            if ($this->Rules->save($rule)) {
                $this->Flash->success(__('Rules has been updated.'));

                return $this->redirect(['controller'=>'pgs','action' => 'edit',$id]);
            }
            $this->Flash->error(__('The rule could not be saved. Please, try again.'));
        }
        $pgs = $this->Rules->Pgs->find('list', ['limit' => 200]);
        $this->set(compact('rule', 'pgs'));
    }
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $rule = $this->Rules->get($id);
        if ($this->Rules->delete($rule)) {
            $this->Flash->success(__('The rule has been deleted.'));
        } else {
            $this->Flash->error(__('The rule could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
