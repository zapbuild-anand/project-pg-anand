<div class="row justify-content-md-center">
    <div class="col-6 p-3">
            <?= $this->Form->create($user,['enctype'=>'multipart/form-data','class'=>'form-disable']) ?>
            <div class="form-group p-3">
                <fieldset>
                    <legend><?= __('Change Image') ?></legend>
                    <?php
                        echo $this->Form->control('image',['label'=>'Select new image','accept'=>['.jpg,','.jpeg'],'type'=>'file','id'=>'file']);
                    ?>
                </fieldset>
                <?= $this->Form->button('Submit',['class'=>'btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0']) ?>
                <?= $this->Form->end() ?>
            </div>
    </div>
</div>
