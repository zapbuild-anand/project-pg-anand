<?php
declare(strict_types=1);

namespace App\Controller;
 use Cake\ORM\TableRegistry;
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
    public function profile()
    {
    	$this->Authorization->skipAuthorization();
    	$user = TableRegistry::getTableLocator()->get('Users');
        $id=$this->Authentication->getIdentity()->id;
        $user=$user->findById($id)->first();
        $this->set('user', $user);
        
    }
}