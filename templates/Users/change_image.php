<div class="row justify-content-md-center">
    <div class="col-6 p-3">
            <?= $this->Form->create($user,['enctype'=>'multipart/form-data','class'=>'form-disable']) ?>
            <div class="form-group p-3">
                <fieldset>
                    <legend><?= __('Change Image') ?></legend>
                    <div class="form-group">
                                <?= $this->Form->control('image',['accept'=>['.jpg,','.jpeg','.png'],'type'=>'file','class'=>'form-control mb-2','id'=>'file','label'=>'Profile Picture','required'=>true]);?>
                                <span id="error_image" class="text-danger"></span>
                            </div>
                </fieldset>
                <?= $this->Form->button('Submit',['class'=>'btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0']) ?>
                <?= $this->Form->end() ?>
            </div>
    </div>
</div>
