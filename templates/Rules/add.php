
<div class="row justify-content-md-center">
    <div class="col-4 p-3">
        <div class="rules form content">
            <?= $this->Form->create($rule) ?>
            <div class="form-group border rounded p-2">
                <fieldset>
                    <legend><?= __('Rules regarding PG') ?></legend>
                    <?php
                        echo $this->Form->control('pets', ['type' => 'radio', 'options' => [['value' => '1', 'text' => 'Allowed'],['value' => '0', 'text' => 'Not Allowed']]]) ;
                        echo $this->Form->control('smoking', ['type' => 'radio', 'options' => [['value' => '1', 'text' => 'Allowed'],['value' => '0', 'text' => 'Not Allowed']]]) ;
                        echo $this->Form->control('alcohal', ['type' => 'radio', 'options' => [['value' => '1', 'text' => 'Allowed'],['value' => '0', 'text' => 'Not Allowed']]]) ;
                        echo $this->Form->control('events', ['type' => 'radio', 'options' => [['value' => '1', 'text' => 'Allowed'],['value' => '0', 'text' => 'Not Allowed']]]) ;
                        echo $this->Form->control('lateEntry', ['empty' => true,'class'=>'form-control mb-2']);
                        echo $this->Form->control('others',['class'=>'form-control mb-2']);
                    ?>
                </fieldset>
                <?= $this->Form->button('Submit',['class'=>'btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0']) ?>
            </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
