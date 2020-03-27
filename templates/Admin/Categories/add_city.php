<div class="row">
    <div class="col-4">
        <div class="categories form content">
            <?= $this->Form->create($category) ?>
            <div class="form-group p-3">
                <fieldset>
                    <legend><?= __('Add City') ?></legend>
                    <?php
                        echo $this->Form->control('name',['class'=>'form-control mb-2']);
                        echo $this->Form->control('parent_id', ['options' => $parentCategories, 'empty' => true,'class'=>'form-control mb-2']);
                    ?>
                </fieldset>
                <?= $this->Form->button('Submit',['class'=>'btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0']) ?>
            </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
