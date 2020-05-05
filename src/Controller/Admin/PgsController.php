<?php
declare(strict_types=1);

namespace App\Controller\Admin;

class PgsController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
        $this->viewBuilder()->setLayout('adminLayout');
    }

    public function index()
    {
        $this->Authorization->skipAuthorization();
        $this->paginate = [
            'contain' => ['Users'],
        ];
        $pgs = $this->paginate($this->Pgs);

        $this->set(compact('pgs'));
    }

    public function delete()
    {
        $this->request->allowMethod(['ajax', 'delete']);
        $id=$this->request->getData('id');
        $pg = $this->Pgs->get($id);
        $this->Authorization->authorize($pg);
        if ($this->Pgs->delete($pg)) {
            echo "PG removed!";
            die;
        } else {
            echo 'The pg could not be deleted. Please, try again.';
            die;
        }
    }
}
