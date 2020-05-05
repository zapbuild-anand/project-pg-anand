<?php
declare(strict_types=1);

namespace App\Controller;

class RequestsController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
        $this->viewBuilder()->setLayout('hostLayout');
    }
    public function edit($id = null)
    {
        $request = $this->Requests->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $request = $this->Requests->patchEntity($request, $this->request->getData());
            if ($this->Requests->save($request)) {
                $this->Flash->success(__('The request has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The request could not be saved. Please, try again.'));
        }
        $pgs = $this->Requests->Pgs->find('list', ['limit' => 200]);
        $users = $this->Requests->Users->find('list', ['limit' => 200]);
        $this->set(compact('request', 'pgs', 'users'));
    }
    public function index()
    {
        $this->viewBuilder()->setLayout('hostLayout');
        if($this->request->is(['ajax']))
        {
            $id=$this->request->getQuery('id');
            $request = $this->Requests->get($id, [
                'contain' => [],
            ]);
            $request = $this->Requests->patchEntity($request, ['status'=>1]);
            if ($this->Requests->save($request)) {
                echo "Request Confirmed.";
                die;
            }
            echo 'Please, try again.';
            die;
            
        }
        $this->loadModel('Pgs');
        $session = $this->getRequest()->getSession();
        $user_id= $session->read('Auth.id');
        $pgs=$this->Pgs->findByUser_id($user_id);
        $arr=[];
        foreach ($pgs as $pg) {
            $arr[]=$pg->id;
        }
        $this->paginate = [
            'contain' => ['Pgs', 'Users'],
        ];
        $requests = $this->paginate($this->Requests->find('all')->where(['pg_id in'=>$arr]));
        $count=0;
        foreach ($requests as $request) {
            if($request->status==0)
                $count++;
        }
        $this->set(compact('count'));
        $this->set(compact('requests'));
    }

    public function confirmed()
    {
        $this->loadModel('Pgs');
        $session = $this->getRequest()->getSession();
        $user_id= $session->read('Auth.id');
        $pgs=$this->Pgs->findByUser_id($user_id);
        $arr=[];
        foreach ($pgs as $pg) {
            $arr[]=$pg->id;
        }
        $this->paginate = [
            'contain' => ['Pgs', 'Users'],
        ];
        $requests = $this->paginate($this->Requests->find('all')->where(['pg_id in'=>$arr]));
        $count=0;
        foreach ($requests as $request) {
            if($request->status!=0)
                $count++;
        }
        $this->set(compact('count'));
        $this->set(compact('requests'));
    }

    public function view($id = null)
    {
        $request = $this->Requests->get($id, [
            'contain' => ['Pgs', 'Users', 'Bookings'],
        ]);
        $session = $this->getRequest()->getSession();
        $user_id= $session->read('Auth.id');
        if($request->pg->user_id==$user_id)
        {
            $this->set('request', $request);
        }
        else
        {
            echo 'Unauthorized access!';
            die;
        }
    }
   
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $request = $this->Requests->get($id);
        if ($this->Requests->delete($request)) {
            $this->Flash->success(__('The request has been deleted.'));
        } else {
            $this->Flash->error(__('The request could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
