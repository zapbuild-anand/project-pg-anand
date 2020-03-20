<div class="row">
    <div class="col-5">
            <?= $this->Form->create($user,['enctype'=>'multipart/form-data','class'=>'form-disable']) ?>
            <div class="form-group p-3">
                <fieldset>
                    <legend><?= __('Sign Up') ?></legend>
                    <?php
                        echo $this->Form->control('firstname',['class'=>'form-control mb-2']);
                        echo $this->Form->control('lastname',['class'=>'form-control mb-2']);
                        echo $this->Form->control('password',['class'=>'form-control mb-2']);
                        echo $this->Form->control('email',['class'=>'form-control mb-2']);
                        echo $this->Form->control('phone',['class'=>'form-control mb-2']);
                        echo $this->Form->control('gender', ['type' => 'radio', 'options' => [['value' => '1', 'text' => 'Male'],['value' => '2', 'text' => 'Female'],['value' => '3', 'text' => 'Other']]]) ;
                        echo $this->Form->control('dob',['class'=>'form-control mb-2']);
                        //echo $this->Form->control('image',['class'=>'form-control mb-2']);
                        echo $this->Form->control('image',['accept'=>['.jpg,','.jpeg','.png'],'type'=>'file','class'=>'form-control','id'=>'file','onchange'=>'Filevalidation()']);
                        echo $this->Form->control('type', ['type' => 'radio', 'options' => [['value' => '1', 'text' => 'Guest'],['value' => '2', 'text' => 'Owner'],['value' => '3', 'text' => 'Admin']]]) ;
                    ?>
                </fieldset>
                <?= $this->Form->button('Submit',['class'=>'btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0']) ?>
                <?= $this->Form->end() ?>
            </div>
    </div>
</div>
