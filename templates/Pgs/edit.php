<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $pg->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $pg->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Pgs'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="pgs form content">
            <?= $this->Form->create($pg) ?>
            <fieldset>
                <legend><?= __('Edit Pg') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('type');
                    echo $this->Form->control('sharing');
                    echo $this->Form->control('totalFloors');
                    echo $this->Form->control('pgOnFloor');
                    echo $this->Form->control('noOfRooms');
                    echo $this->Form->control('houseNumber');
                    echo $this->Form->control('landmark');
                    echo $this->Form->control('availableFrom');
                    echo $this->Form->control('status');
                    echo $this->Form->control('approved');
                    echo $this->Form->control('expire', ['empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
