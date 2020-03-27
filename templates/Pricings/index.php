<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pricing[]|\Cake\Collection\CollectionInterface $pricings
 */
?>
<div class="pricings index content">
    <?= $this->Html->link(__('New Pricing'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Pricings') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('pg_id') ?></th>
                    <th><?= $this->Paginator->sort('rent') ?></th>
                    <th><?= $this->Paginator->sort('security') ?></th>
                    <th><?= $this->Paginator->sort('minimumDuration') ?></th>
                    <th><?= $this->Paginator->sort('leavingNotice') ?></th>
                    <th><?= $this->Paginator->sort('earlyLeavingCharge') ?></th>
                    <th><?= $this->Paginator->sort('food') ?></th>
                    <th><?= $this->Paginator->sort('laundary') ?></th>
                    <th><?= $this->Paginator->sort('electricity') ?></th>
                    <th><?= $this->Paginator->sort('wifi') ?></th>
                    <th><?= $this->Paginator->sort('housekeeping') ?></th>
                    <th><?= $this->Paginator->sort('dth') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pricings as $pricing): ?>
                <tr>
                    <td><?= $this->Number->format($pricing->id) ?></td>
                    <td><?= $pricing->has('pg') ? $this->Html->link($pricing->pg->name, ['controller' => 'Pgs', 'action' => 'view', $pricing->pg->id]) : '' ?></td>
                    <td><?= $this->Number->format($pricing->rent) ?></td>
                    <td><?= $this->Number->format($pricing->security) ?></td>
                    <td><?= $this->Number->format($pricing->minimumDuration) ?></td>
                    <td><?= $this->Number->format($pricing->leavingNotice) ?></td>
                    <td><?= $this->Number->format($pricing->earlyLeavingCharge) ?></td>
                    <td><?= h($pricing->food) ?></td>
                    <td><?= h($pricing->laundary) ?></td>
                    <td><?= h($pricing->electricity) ?></td>
                    <td><?= h($pricing->wifi) ?></td>
                    <td><?= h($pricing->housekeeping) ?></td>
                    <td><?= h($pricing->dth) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $pricing->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pricing->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pricing->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pricing->id)]) ?>
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
