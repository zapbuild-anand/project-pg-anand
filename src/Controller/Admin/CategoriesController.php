<?php
declare(strict_types=1);

namespace App\Controller\Admin;

class CategoriesController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
        $this->viewBuilder()->setLayout('adminLayout');
    }

    public function editCity()
    {
        //$this->Authorization->skipAuthorization();
        $this->paginate = [
            'contain' => ['ParentCategories'],
        ];
        $categories = $this->paginate($this->Categories->find('all')->where(['Categories.parent_id is not'=>null]));
        $parentCategories = $this->Categories->ParentCategories->find('list', ['limit' => 200])->where(['ParentCategories.parent_id is'=>null]);
        $this->set(compact('categories', 'parentCategories'));
    }

    public function editState()
    {
        $this->Authorization->skipAuthorization();
        $this->paginate = [
            'contain' => ['ParentCategories'],
        ];
        $categories = $this->paginate($this->Categories->find('all')->where(['Categories.parent_id is'=>null]));

        $this->set(compact('categories'));
    }


    public function view($id = null)
    {
        $this->Authorization->skipAuthorization();
        $category = $this->Categories->get($id, [
            'contain' => ['ParentCategories', 'ChildCategories'],
        ]);

        $this->set('category', $category);
    }

    public function addCity()
    {
        $this->Authorization->skipAuthorization();
        $category = $this->Categories->newEmptyEntity();
        if ($this->request->is('ajax')) {
            $category = $this->Categories->patchEntity($category, $this->request->getQuery());
            $categories=$this->Categories->find('all')->where(['AND'=>['parent_id'=>$category->parent_id,'name'=>$category->name]])->first();
            if(empty($categories))
            {
                if ($this->Categories->save($category)) {
                    echo '<p class="text-danger">City has been added.<p>';
                    die;
                }
            }
            echo '<p class="text-danger">City already exists!<p>';
            die;
        }
        $parentCategories = $this->Categories->ParentCategories->find('list', ['limit' => 200])->where(['ParentCategories.parent_id is'=>null]);
        $this->set(compact('category', 'parentCategories'));
    }

    public function addState()
    {
        $this->Authorization->skipAuthorization();
        $category = $this->Categories->newEmptyEntity();
        if ($this->request->is('ajax')) {
            $category = $this->Categories->patchEntity($category, $this->request->getQuery());
            $categories=$this->Categories->find('all')->where(['name'=>$category->name])->first();
            if(empty($categories))
            {
                if ($this->Categories->save($category)) {
                    echo '<p class="text-danger">State has been added.<p>';
                    die;
                }
            }
            echo '<p class="text-danger">State already exists!<p>';
            die;
        }
        $parentCategories = $this->Categories->ParentCategories->find('list', ['limit' => 200]);
        $this->set(compact('category', 'parentCategories'));
    }

    public function edit()
    {
        if ($this->request->is(['patch', 'ajax', 'put'])) {
            $id=$this->request->getData('id');
            $name=$this->request->getData('name');
            $parent_id=$this->request->getData('parent_id');
            $category = $this->Categories->get($id, [
                'contain' => [],
            ]);
            $category = $this->Categories->patchEntity($category, ['name'=>$name,'parent_id'=>$parent_id]);
            if ($this->Categories->save($category)) {
                echo '<p class="text-danger">Updated!<p>';
                die;
            }
            echo '<p class="text-danger">Error!<p>';
            die;
        }
        $parentCategories = $this->Categories->ParentCategories->find('list', ['limit' => 200]);
        $this->set(compact('category', 'parentCategories'));
    }

    public function delete()
    {
        $this->Authorization->skipAuthorization();  
        $this->request->allowMethod(['ajax', 'delete']);
        $id=$this->request->getData('id');
        $category = $this->Categories->get($id);
        if ($this->Categories->delete($category)) {
            echo '<p class="text-danger">City deleted!<p>';
            die;
        } else {
            echo '<p class="text-danger">Error in deletion!<p>';
            die;
        }
    }
}
