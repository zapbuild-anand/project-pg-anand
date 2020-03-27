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

                return $this->redirect(['controller'=>'images','action' => 'add',$id]);
            }
            $this->Flash->error(__('The image could not be saved. Please, try again.'));
        }
        $pgs = $this->Images->Pgs->find('list', ['limit' => 200]);
        $this->set(compact('image', 'pgs'));
    }

   
    public function edit($id = null)
    {
        $image = $this->Images->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $image = $this->Images->patchEntity($image, $this->request->getData());
            if ($this->Images->save($image)) {
                $this->Flash->success(__('The image has been saved.'));

                return $this->redirect(['action' => 'index']);
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
