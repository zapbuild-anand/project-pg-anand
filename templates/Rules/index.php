<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Rule[]|\Cake\Collection\CollectionInterface $rules
 */
?>
<div class="rules index content">
    <?= $this->Html->link(__('New Rule'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Rules') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('pg_id') ?></th>
                    <th><?= $this->Paginator->sort('pets') ?></th>
                    <th><?= $this->Paginator->sort('visitors') ?></th>
                    <th><?= $this->Paginator->sort('smoking') ?></th>
                    <th><?= $this->Paginator->sort('alcohal') ?></th>
                    <th><?= $this->Paginator->sort('events') ?></th>
                    <th><?= $this->Paginator->sort('lateEntry') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($rules as $rule): ?>
                <tr>
                    <td><?= $this->Number->format($rule->id) ?></td>
                    <td><?= $rule->has('pg') ? $this->Html->link($rule->pg->name, ['controller' => 'Pgs', 'action' => 'view', $rule->pg->id]) : '' ?></td>
                    <td><?= h($rule->pets) ?></td>
                    <td><?= h($rule->visitors) ?></td>
                    <td><?= h($rule->smoking) ?></td>
                    <td><?= h($rule->alcohal) ?></td>
                    <td><?= h($rule->events) ?></td>
                    <td><?= h($rule->lateEntry) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $rule->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $rule->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $rule->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rule->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
