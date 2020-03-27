<?php
    namespace App\Controller\Admin;
    use Cake\ORM\TableRegistry;
    class AdminsController extends AppController
    {
    	public function initialize(): void
	    {
	        parent::initialize();
	        $this->viewBuilder()->setLayout('adminLayout');
	    }
    	public function index()
    	{
    		$this->Authorization->skipAuthorization();
    		$user = $this->request->getAttribute('identity');
            $owners = TableRegistry::getTableLocator()->get('Users');
    		$owner=$owners->findByType('2');
    		$oc=0;
    		foreach ($owner as $row) 
    		{
    			$oc++;
    		}
        	$this->set('owners',$oc);

        	$pgs = TableRegistry::getTableLocator()->get('Pgs');
    		$pg=$pgs->find();
    		$pc=0;
    		foreach ($pg as $row) 
    		{
    			$pc++;
    		}
        	$this->set('pgs',$pc);

        	$categories = TableRegistry::getTableLocator()->get('Categories');
    		$category=$categories->find();
    		$cc=0;
    		$sc=0;
    		foreach ($category as $row) 
    		{
    			if($row->parent_id==null)
    				$sc++;
    			else
    				$cc++;
    		}
        	
        	$this->set('cities',$cc);
    		$this->set('states',$sc);
    		$this->set('title','Admin Pannel');
    	}

    }
?>