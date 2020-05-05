<div class="row justify-content-md-center">
    <div class="col-4 p-3">
        <div class="pricings form content">
            <?= $this->Form->create($pricing) ?>
            <div class="form-group border rounded p-2">
                <fieldset>
                    <legend><?= __('Edit Pricing') ?></legend>
                    <?php
                        echo $this->Form->control('rent',['class'=>'form-control mb-2']);
                        echo $this->Form->control('per', ['type' => 'radio', 'options' => [['value' => '1', 'text' => 'bed'],['value' => '2', 'text' => 'bedroom']]]) ;
                        echo $this->Form->control('duration',['class'=>'form-control mb-2']);
                        echo $this->Form->control('security',['class'=>'form-control mb-2']);
                        echo $this->Form->control('minimumDuration',['class'=>'form-control mb-2']);
                        echo $this->Form->control('leavingNotice',['class'=>'form-control mb-2']);
                        echo $this->Form->control('earlyLeavingCharge',['class'=>'form-control mb-2']);
                        echo '<label for="sel1">Services Included</label>';
                        echo $this->Form->control('food', ['type' => 'radio', 'options' => [['value' => '1', 'text' => 'Yes'],['value' => '0', 'text' => 'No']]]) ;
                        echo $this->Form->control('laundary', ['type' => 'radio', 'options' => [['value' => '1', 'text' => 'Yes'],['value' => '0', 'text' => 'No']]]) ;
                        echo $this->Form->control('electricity', ['type' => 'radio', 'options' => [['value' => '1', 'text' => 'Yes'],['value' => '0', 'text' => 'No']]]) ;
                        echo $this->Form->control('wifi', ['type' => 'radio', 'options' => [['value' => '1', 'text' => 'Yes'],['value' => '0', 'text' => 'No']]]) ;
                        echo $this->Form->control('housekeeping', ['type' => 'radio', 'options' => [['value' => '1', 'text' => 'Yes'],['value' => '0', 'text' => 'No']]]) ;
                        echo $this->Form->control('dth', ['type' => 'radio', 'options' => [['value' => '1', 'text' => 'Yes'],['value' => '0', 'text' => 'No']]]) ;
                    ?>
                </fieldset>
                <?= $this->Form->button('Submit',['class'=>'btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0']) ?>
            </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
