<div class="pgs index content">
    <?= $this->Html->link(__('New Pg'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Pgs') ?></h3>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('type') ?></th>
                    <th><?= $this->Paginator->sort('sharing') ?></th>
                    <th><?= $this->Paginator->sort('totalFloors') ?></th>
                    <th><?= $this->Paginator->sort('pgOnFloor') ?></th>
                    <th><?= $this->Paginator->sort('noOfRooms') ?></th>
                    <th><?= $this->Paginator->sort('houseNumber') ?></th>
                    <th><?= $this->Paginator->sort('landmark') ?></th>
                    <th><?= $this->Paginator->sort('availableFrom') ?></th>
                    <th><?= $this->Paginator->sort('status') ?></th>
                    <th><?= $this->Paginator->sort('approved') ?></th>
                    <th><?= $this->Paginator->sort('expire') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pgs as $pg): ?>
                <tr>
                    <td><?= $this->Number->format($pg->id) ?></td>
                    <td><?= h($pg->name) ?></td>
                    <td><?= $pg->has('user') ? $this->Html->link($pg->user->id, ['controller' => 'Users', 'action' => 'view', $pg->user->id]) : '' ?></td>
                    <td><?= h($pg->type) ?></td>
                    <td><?= $this->Number->format($pg->sharing) ?></td>
                    <td><?= $this->Number->format($pg->totalFloors) ?></td>
                    <td><?= $this->Number->format($pg->pgOnFloor) ?></td>
                    <td><?= $this->Number->format($pg->noOfRooms) ?></td>
                    <td><?= $this->Number->format($pg->houseNumber) ?></td>
                    <td><?= h($pg->landmark) ?></td>
                    <td><?= h($pg->availableFrom) ?></td>
                    <td><?= h($pg->status) ?></td>
                    <td><?= h($pg->approved) ?></td>
                    <td><?= h($pg->expire) ?></td>
                    <td><?= h($pg->created) ?></td>
                    <td><?= h($pg->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $pg->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pg->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pg->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pg->id)]) ?>
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
