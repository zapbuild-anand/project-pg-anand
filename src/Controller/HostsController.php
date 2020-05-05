<?php
declare(strict_types=1);

namespace App\Controller;
use Authorization\IdentityInterface;


class HostsController extends AppController
{
   	public function initialize(): void
    {
        parent::initialize();
        $this->viewBuilder()->setLayout('customLayout');
    }
    public function index()
    {
    	$this->Authorization->skipAuthorization();
    }
    public function dashboard()
    {
        $this->viewBuilder()->setLayout('hostLayout');
    	$this->Authorization->skipAuthorization();
    	
        $this->loadModel('Users');
        $id=$this->Authentication->getIdentity()->id;
        $user=$this->Users->findById($id)->first();
        $this->set('user', $user);
       
        $this->loadModel('Pgs');
        $pgs=$this->Pgs->findByUser_id($id);
        $pc=0;
            foreach ($pgs as $row) 
            {
                $pc++;
            }
            $this->set('pgs',$pc);
        
    }
}