<?php
declare(strict_types=1);

namespace App\Controller;
class ImagesController extends AppController
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
        $images = $this->paginate($this->Images);

        $this->set(compact('images'));
    }
    public function view($id = null)
    {
        $image = $this->Images->get($id, [
            'contain' => ['Pgs'],
        ]);

        $this->set('image', $image);
    }
    public function add($id = null)
    {
        $base_url=WWW_ROOT."img";
        $image = $this->Images->newEmptyEntity();
        if ($this->request->is('post')) {
            if($_FILES['image']['tmp_name'])
            {
                $file_tmp =$_FILES['image']['tmp_name'];
                $file_name = "".date('mdYHis')."".$_FILES['image']['name'];
                move_uploaded_file($file_tmp,$base_url."/".$file_name);
            }
            $image = $this->Images->patchEntity($image, $this->request->getData());
            $image->image=$file_name;
            $image->pg_id=$id;
            if ($this->Images->save($image)) {
                $this->Flash->success(__('The image has been saved.'));
                $this->loadModel('Pgs');
                $newpg=$this->Authentication->getIdentity()->id;
                $pg = $this->Pgs->findByUser_id($newpg)->last();
                return $this->redirect(['controller'=>'pgs','action' => 'details',$pg->id]);
            }
            $this->Flash->error(__('The image could not be saved. Please, try again.'));
        }
        $pgs = $this->Images->Pgs->find('list', ['limit' => 200]);
        $this->set(compact('image', 'pgs'));
    }

   
    public function edit($id = null)
    {
        $images = $this->Images->find('all')->where(['pg_id'=>$id]);
        $this->set(compact('images'));
        $this->set(compact('id'));
    }


    public function editImage($id = null)
    {
        $base_url=WWW_ROOT."img";
        $image = $this->Images->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            if(file_exists(WWW_ROOT."img/".$image->image))
            {
                //delete file
                unlink(WWW_ROOT."img/".$image->image);
            }
            if($_FILES['image']['tmp_name'])
            {
                $file_tmp =$_FILES['image']['tmp_name'];
                $ext=explode(".",$_FILES['image']['name']);
                $file_name = "".date('mdYHis').".".$ext[1];
                move_uploaded_file($file_tmp,$base_url."/".$file_name);
            }

            $image = $this->Images->patchEntity($image, $this->request->getData());
            $image->image=$file_name;
            if ($this->Images->save($image)) {
                $this->Flash->success(__('The image has been saved.'));

                return $this->redirect(['controller'=>'images','action' => 'edit',$image->pg_id]);
            }
            $this->Flash->error(__('The image could not be saved. Please, try again.'));
        }
        $pgs = $this->Images->Pgs->find('list', ['limit' => 200]);
        $this->set(compact('image', 'pgs'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $image = $this->Images->get($id);
        if ($this->Images->delete($image)) {
            $this->Flash->success(__('The image has been deleted.'));
        } else {
            $this->Flash->error(__('The image could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
