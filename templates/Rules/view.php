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
            <?= $this->Html->link(__('Edit Rule'), ['action' => 'edit', $rule->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Rule'), ['action' => 'delete', $rule->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rule->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Rules'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Rule'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="rules view content">
            <h3><?= h($rule->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Pg') ?></th>
                    <td><?= $rule->has('pg') ? $this->Html->link($rule->pg->name, ['controller' => 'Pgs', 'action' => 'view', $rule->pg->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Pets') ?></th>
                    <td><?= h($rule->pets) ?></td>
                </tr>
                <tr>
                    <th><?= __('Visitors') ?></th>
                    <td><?= h($rule->visitors) ?></td>
                </tr>
                <tr>
                    <th><?= __('Smoking') ?></th>
                    <td><?= h($rule->smoking) ?></td>
                </tr>
                <tr>
                    <th><?= __('Alcohal') ?></th>
                    <td><?= h($rule->alcohal) ?></td>
                </tr>
                <tr>
                    <th><?= __('Events') ?></th>
                    <td><?= h($rule->events) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($rule->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('LateEntry') ?></th>
                    <td><?= h($rule->lateEntry) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Others') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($rule->others)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
