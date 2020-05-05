<div class="row justify-content-md-center">
    <div class="col-5">
        <div class="pgs form content">
            <?= $this->Form->create($pg) ?>
            <div class="form-group p-3">
                <fieldset>
                    <legend><?= __('Edit Pg') ?></legend>
                    <?php
                        echo $this->Form->control('name',['label'=>'PG Name','class'=>'form-control mb-2']);
                        echo '<div class="form-check-inline">';
                        echo $this->Form->control('type', ['label'=>'','class'=>'form-check-input mb-2','type' => 'radio', 'options' => [['value' => '1', 'text' => 'Boys'],['value' => '2', 'text' => 'Girls'],['value' => '3', 'text' => 'All']]]) ;
                        echo '</div><br>';
                        echo '<label for="sharing">Sharing</label>
                            <select class="form-control mb-2" id="sharing" name="sharing">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>';
                        echo $this->Form->control('totalFloors',['class'=>'form-control mb-2']);
                        echo $this->Form->control('pgOnFloor',['class'=>'form-control mb-2']);
                        echo $this->Form->control('noOfRooms',['class'=>'form-control mb-2']);
                        echo $this->Form->control('houseNumber',['class'=>'form-control mb-2']);
                        echo $this->Form->control('landmark',['class'=>'form-control mb-2']);
                        echo $this->Form->control('availableFrom',['class'=>'form-control mb-2']);
                        echo $this->Form->control('description',['class'=>'form-control mb-2']);
                    ?>
                </fieldset>
                <?= $this->Form->button('Submit',['class'=>'btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0']) ?>
            </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
    <aside class="col-3 p-3">
        <div class="side-nav">
            <h4 class="heading"><?= __('Edit details') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $pg->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $pg->id), 'class' => 'side-nav-item']
            ) ?>
            <br>
            <?= $this->Html->link(__('Address'), ['controller'=>'addresses','action' => 'edit',$pg->id], ['class' => 'side-nav-item']) ?>
            <br>
            <?= $this->Html->link(__('Facilities'), ['controller'=>'facilities','action' => 'edit',$pg->id], ['class' => 'side-nav-item']) ?>
            <br>
            <?= $this->Html->link(__('Pricing'), ['controller'=>'pricings','action' => 'edit',$pg->id], ['class' => 'side-nav-item']) ?>
            <br>
            <?= $this->Html->link(__('Rules'), ['controller'=>'rules','action' => 'edit',$pg->id], ['class' => 'side-nav-item']) ?>
            <br>
            <?= $this->Html->link(__('Images'), ['controller'=>'images','action' => 'edit',$pg->id], ['class' => 'side-nav-item']) ?>
            <br>
        </div>
    </aside>
</div>
