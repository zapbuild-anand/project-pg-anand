<div class="row justify-content-md-center">
    <div class="col-4">
        <div class="images form content">
            <?= $this->Form->create($image,['enctype'=>'multipart/form-data','class'=>'form-disable']) ?>
            <div class="form-group p-3">
                <fieldset>
                    <legend><?= __('Add Image') ?></legend>
                    <?php
                        echo $this->Form->control('image',['accept'=>['.jpg,','.jpeg,','.png'],'type'=>'file','class'=>'form-control mb-2','id'=>'file']);
                    ?>
                </fieldset>
                <?= $this->Form->button('Upload',['class'=>'btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0']) ?>
            </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
