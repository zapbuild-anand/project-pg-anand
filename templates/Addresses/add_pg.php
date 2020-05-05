<div class="row justify-content-md-center">
    <div class="col-4">
        <div class="addresses form content">
            <?= $this->Form->create($address,['autocomplete'=>'off']) ?>
            <div class="form-group p-3">
                <fieldset>
                    <legend><?= __('PG Address') ?></legend>
                    <?php
                        echo $this->Form->control('district',['list'=>'data-list','label'=>'City','class'=>'form-control mb-2']);
                        echo '<datalist id="data-list">';
                        foreach ($categories as $key) {
                            echo '<option value="'.$key.'">';
                        }
                        echo '</datalist>';

                        echo $this->Form->control('state',['list'=>'data-list','class'=>'form-control mb-2']);
                        echo $this->Form->control('sector',['class'=>'form-control mb-2']);
                        echo $this->Form->control('pincode',['class'=>'form-control mb-2']);
                    ?>
                </fieldset>
                <?= $this->Form->button('Submit',['class'=>'btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0']) ?>
            </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
