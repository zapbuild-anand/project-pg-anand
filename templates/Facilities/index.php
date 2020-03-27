<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Facility[]|\Cake\Collection\CollectionInterface $facilities
 */
?>
<div class="facilities index content">
    <?= $this->Html->link(__('New Facility'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Facilities') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('pg_id') ?></th>
                    <th><?= $this->Paginator->sort('furnishing') ?></th>
                    <th><?= $this->Paginator->sort('balcony') ?></th>
                    <th><?= $this->Paginator->sort('chair') ?></th>
                    <th><?= $this->Paginator->sort('sofa') ?></th>
                    <th><?= $this->Paginator->sort('electricity') ?></th>
                    <th><?= $this->Paginator->sort('powerBackup') ?></th>
                    <th><?= $this->Paginator->sort('wifi') ?></th>
                    <th><?= $this->Paginator->sort('led') ?></th>
                    <th><?= $this->Paginator->sort('refrigerator') ?></th>
                    <th><?= $this->Paginator->sort('AC') ?></th>
                    <th><?= $this->Paginator->sort('RO') ?></th>
                    <th><?= $this->Paginator->sort('geaser') ?></th>
                    <th><?= $this->Paginator->sort('cooler') ?></th>
                    <th><?= $this->Paginator->sort('laundary') ?></th>
                    <th><?= $this->Paginator->sort('security') ?></th>
                    <th><?= $this->Paginator->sort('cctv') ?></th>
                    <th><?= $this->Paginator->sort('parking') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($facilities as $facility): ?>
                <tr>
                    <td><?= $this->Number->format($facility->id) ?></td>
                    <td><?= $facility->has('pg') ? $this->Html->link($facility->pg->name, ['controller' => 'Pgs', 'action' => 'view', $facility->pg->id]) : '' ?></td>
                    <td><?= h($facility->furnishing) ?></td>
                    <td><?= h($facility->balcony) ?></td>
                    <td><?= h($facility->chair) ?></td>
                    <td><?= h($facility->sofa) ?></td>
                    <td><?= h($facility->electricity) ?></td>
                    <td><?= h($facility->powerBackup) ?></td>
                    <td><?= h($facility->wifi) ?></td>
                    <td><?= h($facility->led) ?></td>
                    <td><?= h($facility->refrigerator) ?></td>
                    <td><?= h($facility->AC) ?></td>
                    <td><?= h($facility->RO) ?></td>
                    <td><?= h($facility->geaser) ?></td>
                    <td><?= h($facility->cooler) ?></td>
                    <td><?= h($facility->laundary) ?></td>
                    <td><?= h($facility->security) ?></td>
                    <td><?= h($facility->cctv) ?></td>
                    <td><?= h($facility->parking) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $facility->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $facility->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $facility->id], ['confirm' => __('Are you sure you want to delete # {0}?', $facility->id)]) ?>
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
