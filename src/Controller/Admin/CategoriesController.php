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

    public function city()
    {
        $this->Authorization->skipAuthorization();
        $this->paginate = [
            'contain' => ['ParentCategories'],
        ];
        $categories = $this->paginate($this->Categories->find('all')->where(['Categories.parent_id is not'=>null]));

        $this->set(compact('categories'));
    }

    public function state()
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
        if ($this->request->is('post')) {
            $category = $this->Categories->patchEntity($category, $this->request->getData());
            if ($this->Categories->save($category)) {
                $this->Flash->success(__('The category has been saved.'));

                return $this->redirect(['action' => 'city']);
            }
            $this->Flash->error(__('The category could not be saved. Please, try again.'));
        }
        $parentCategories = $this->Categories->ParentCategories->find('list', ['limit' => 200]);
        $this->set(compact('category', 'parentCategories'));
    }

    public function addState()
    {
        $this->Authorization->skipAuthorization();
        $category = $this->Categories->newEmptyEntity();
        if ($this->request->is('post')) {
            $category = $this->Categories->patchEntity($category, $this->request->getData());
            if ($this->Categories->save($category)) {
                $this->Flash->success(__('The category has been saved.'));

                return $this->redirect(['action' => 'state']);
            }
            $this->Flash->error(__('The category could not be saved. Please, try again.'));
        }
        $parentCategories = $this->Categories->ParentCategories->find('list', ['limit' => 200]);
        $this->set(compact('category', 'parentCategories'));
    }

    public function edit($id = null)
    {
        $this->Authorization->skipAuthorization();
        $category = $this->Categories->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $category = $this->Categories->patchEntity($category, $this->request->getData());
            if ($this->Categories->save($category)) {
                $this->Flash->success(__('The category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The category could not be saved. Please, try again.'));
        }
        $parentCategories = $this->Categories->ParentCategories->find('list', ['limit' => 200]);
        $this->set(compact('category', 'parentCategories'));
    }

    public function delete($id = null)
    {
        $this->Authorization->skipAuthorization();  
        $this->request->allowMethod(['post', 'delete']);
        $category = $this->Categories->get($id);
        if ($this->Categories->delete($category)) {
            $this->Flash->success(__('The category has been deleted.'));
        } else {
            $this->Flash->error(__('The category could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'city']);
    }
}
