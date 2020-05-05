<?php
declare(strict_types=1);

namespace App\Controller;

class ShortlistsController extends AppController
{

    public function add()
    {
        $shortlist = $this->Shortlists->newEmptyEntity();
        if ($this->request->is(['post','ajax'])) {
            $shortlist = $this->Shortlists->patchEntity($shortlist, $this->request->getQuery());
            if ($this->Shortlists->save($shortlist)) {
                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Shortlisted!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>';
                die;
            }
            else{
                echo "Error";
                die;
            }
        }
    }

    public function delete()
    {
        $this->request->allowMethod(['post', 'delete','ajax']);
        $user_id=$this->request->getQuery('user_id');
        $pg_id=$this->request->getQuery('pg_id');
        $shortlist = $this->Shortlists->find('all')->where(['AND'=>['user_id'=>$user_id,'pg_id'=>$pg_id]])->first();
        if ($this->Shortlists->delete($shortlist)) {
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Removed!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>';
                die;
        } 
        else {
            echo "Error";
                die;
        }
    }
}
