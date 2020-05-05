
<div class="row justify-content-md-center">
    <div class="col-5">
        <div class="facilities form content">
            <?= $this->Form->create($facility) ?>
            <div class="form-group p-3">
                <fieldset>
                    <legend><?= __('Add Facility') ?></legend>
                    <?php
                        echo $this->Form->control('furnishing', ['type' => 'radio', 'options' => [['value' => '1', 'text' => 'Furnished'],['value' => '2', 'text' => 'SemiFurnished'],['value' => '3', 'text' => 'UnFurnished']]]) ;
                        echo $this->Form->control('balcony', ['type' => 'radio', 'options' => [['value' => '1', 'text' => 'Yes'],['value' => '0', 'text' => 'No']]]) ;
                        echo $this->Form->control('chair', ['type' => 'radio', 'options' => [['value' => '1', 'text' => 'Yes'],['value' => '0', 'text' => 'No']]]) ;
                        echo $this->Form->control('sofa', ['type' => 'radio', 'options' => [['value' => '1', 'text' => 'Yes'],['value' => '0', 'text' => 'No']]]) ;
                        echo $this->Form->control('electricity', ['type' => 'radio', 'options' => [['value' => '1', 'text' => 'Yes'],['value' => '0', 'text' => 'No']]]) ;
                        echo $this->Form->control('powerBackup', ['type' => 'radio', 'options' => [['value' => '1', 'text' => 'Yes'],['value' => '0', 'text' => 'No']]]) ;
                        echo $this->Form->control('wifi', ['type' => 'radio', 'options' => [['value' => '1', 'text' => 'Yes'],['value' => '0', 'text' => 'No']]]) ;
                        echo $this->Form->control('led', ['type' => 'radio', 'options' => [['value' => '1', 'text' => 'Yes'],['value' => '0', 'text' => 'No']]]) ;
                        echo $this->Form->control('refrigerator', ['type' => 'radio', 'options' => [['value' => '1', 'text' => 'Yes'],['value' => '0', 'text' => 'No']]]) ;
                        echo $this->Form->control('AC', ['type' => 'radio', 'options' => [['value' => '1', 'text' => 'Yes'],['value' => '0', 'text' => 'No']]]) ;
                        echo $this->Form->control('RO', ['type' => 'radio', 'options' => [['value' => '1', 'text' => 'Yes'],['value' => '0', 'text' => 'No']]]) ;
                        echo $this->Form->control('geaser', ['type' => 'radio', 'options' => [['value' => '1', 'text' => 'Yes'],['value' => '0', 'text' => 'No']]]) ;
                        echo $this->Form->control('cooler', ['type' => 'radio', 'options' => [['value' => '1', 'text' => 'Yes'],['value' => '0', 'text' => 'No']]]) ;
                        echo $this->Form->control('laundary', ['type' => 'radio', 'options' => [['value' => '1', 'text' => 'Yes'],['value' => '0', 'text' => 'No']]]) ;
                        echo $this->Form->control('pgsecurity', ['label'=>'Security','type' => 'radio', 'options' => [['value' => '1', 'text' => 'Yes'],['value' => '0', 'text' => 'No']]]) ;
                        echo $this->Form->control('cctv', ['type' => 'radio', 'options' => [['value' => '1', 'text' => 'Yes'],['value' => '0', 'text' => 'No']]]) ;
                        echo $this->Form->control('parking', ['type' => 'radio', 'options' => [['value' => '1', 'text' => 'Yes'],['value' => '0', 'text' => 'No']]]) ;
                    ?>
                </fieldset>
                <?= $this->Form->button('Submit',['class'=>'btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0']) ?>
            </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
