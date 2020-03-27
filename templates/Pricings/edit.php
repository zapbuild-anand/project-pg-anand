<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pricing $pricing
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $pricing->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $pricing->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Pricings'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="pricings form content">
            <?= $this->Form->create($pricing) ?>
            <fieldset>
                <legend><?= __('Edit Pricing') ?></legend>
                <?php
                    echo $this->Form->control('pg_id', ['options' => $pgs]);
                    echo $this->Form->control('rent');
                    echo $this->Form->control('security');
                    echo $this->Form->control('minimumDuration');
                    echo $this->Form->control('leavingNotice');
                    echo $this->Form->control('earlyLeavingCharge');
                    echo $this->Form->control('food');
                    echo $this->Form->control('laundary');
                    echo $this->Form->control('electricity');
                    echo $this->Form->control('wifi');
                    echo $this->Form->control('housekeeping');
                    echo $this->Form->control('dth');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
