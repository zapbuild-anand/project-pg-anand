<div class="row justify-content-md-center">
    <div class="col-6 p-3">
            <?= $this->Form->create($user,['enctype'=>'multipart/form-data','class'=>'form-disable']) ?>
            <div class="form-group border rounded p-2">
                <fieldset>
                    <legend class="text-md-center"><?= __('Sign Up') ?></legend>
                    <?php
                        echo $this->Form->control('firstname',['class'=>'form-control mb-2']);
                        echo $this->Form->control('lastname',['class'=>'form-control mb-2']);
                        echo $this->Form->control('password',['class'=>'form-control mb-2']);
                        echo $this->Form->control('email',['class'=>'form-control mb-2']);
                        echo $this->Form->control('phone',['class'=>'form-control mb-2']);
                        echo '<div class="form-check-inline">';
                        echo $this->Form->control('gender', ['class'=>'form-check-input mb-2','label'=>'','type' => 'radio', 'options' => [['value' => '1', 'text' => 'Male'],['value' => '2', 'text' => 'Female'],['value' => '3', 'text' => 'Other']]]) ;
                        echo '</div><br>';
                        echo $this->Form->control('dob',['class'=>'form-control mb-2','label'=>'Date of Birth']);
                        //echo $this->Form->control('image',['class'=>'form-control mb-2']);
                        echo $this->Form->control('image',['accept'=>['.jpg,','.jpeg','.png'],'type'=>'file','class'=>'form-control mb-2','id'=>'file']);
                        echo '<div class="form-check-inline">';
                        echo $this->Form->control('type', ['class'=>'form-check-input mb-2','label'=>'','type' => 'radio', 'options' => [['value' => '1', 'text' => 'Guest'],['value' => '2', 'text' => 'Owner'],['value' => '3', 'text' => 'Admin']]]) ;
                        echo '</div><br>';
                    ?>
                </fieldset>
                <?= $this->Form->button('Submit',['class'=>'btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0']) ?>
                <?= $this->Form->end() ?>
                <div class="text-md-center">
                  Hav an account! <?= $this->Html->link(__('Login here'), ['action' => 'login']) ?>
                </div>
            </div>
    </div>
</div>
