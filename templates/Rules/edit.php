<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Rule $rule
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $rule->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $rule->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Rules'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="rules form content">
            <?= $this->Form->create($rule) ?>
            <fieldset>
                <legend><?= __('Edit Rule') ?></legend>
                <?php
                    echo $this->Form->control('pg_id', ['options' => $pgs]);
                    echo $this->Form->control('pets');
                    echo $this->Form->control('visitors');
                    echo $this->Form->control('smoking');
                    echo $this->Form->control('alcohal');
                    echo $this->Form->control('events');
                    echo $this->Form->control('lateEntry', ['empty' => true]);
                    echo $this->Form->control('others');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
