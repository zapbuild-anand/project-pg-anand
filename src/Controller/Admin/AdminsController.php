<?php
    namespace App\Controller\Admin;
    use Cake\Routing\Router;
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
            $this->loadModel('Users');
            $owner=$this->Users->findByType('2');
    		$oc=0;
    		foreach ($owner as $row) 
    		{
    			$oc++;
    		}
        	$this->set('owners',$oc);

        	$this->loadModel('Pgs');
    		$pg=$this->Pgs->find();
    		$pc=0;
            $unvpc=0;
    		foreach ($pg as $row) 
    		{
    			$pc++;
                if($row->approved==0)
                    $unvpc++;
    		}
        	$this->set('pgs',$pc);
            $this->set('unvpgs',$unvpc);

        	$this->loadModel('Categories');
            $category=$this->Categories->find();
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

        public function approve()
        {
            $this->loadModel('Pgs');
            if($this->request->is(['ajax','post']))
            {
                $this->viewBuilder()->setLayout('ajax');
                $pg_id=$this->request->getQuery('pg_id');
                $pg = $this->Pgs->get($pg_id, [
                    'contain' => [],
                ]);
                //echo $pg_id;
                $pg = $this->Pgs->patchEntity($pg, ['approved'=>1],['accessibleFields' => ['user_id' => false]]);
                if ($this->Pgs->save($pg)) {
                }
            }
            $this->paginate = [
                'contain' => ['Users'],
            ];
            $pgs = $this->paginate($this->Pgs->findByApproved(0));

            $this->set(compact('pgs'));
        }

    }
