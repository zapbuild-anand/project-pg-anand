<div class="row justify-content-md-center">
    <div class="col-4">
        <div class="addresses form content">
            <?= $this->Form->create($address) ?>
            <div class="form-group p-3">
                <fieldset>
                    <legend><?= __('PG Address') ?></legend>
                    <?php
                        echo $this->Form->control('district',['label'=>'City','class'=>'form-control mb-2']);
                        echo $this->Form->control('state',['class'=>'form-control mb-2']);
                        echo $this->Form->control('sector',['class'=>'form-control mb-2']);
                        echo $this->Form->control('pincode',['class'=>'form-control mb-2']);
                    ?>
                </fieldset>
                <?= $this->Form->button('Next',['class'=>'btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0']) ?>
            </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
