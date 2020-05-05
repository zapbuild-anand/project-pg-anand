<div class="bookings index content">
    <h3><?= __('Bookings') ?></h3>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id',['label'=>'Booking Id']) ?></th>
                    <th><?= $this->Paginator->sort('request_status',['label'=>'Request Status']) ?></th>
                    <th><?= $this->Paginator->sort('status') ?></th>
                    <th><?= $this->Paginator->sort('created',['label'=>'Booking Date']) ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($bookings as $booking): ?>
                <tr>
                    <td><?= $this->Number->format($booking->id) ?></td>
                    <?php if($booking->request->status==0): ?>
                        <td id="conf">Not Confirmed Yet</td>
                    <?php else: ?>
                        <td class="text-success">Confirmed</td>
                    <?php endif; ?>
                    <?php if($booking->status==0): ?>
                        <td id="conf">Not Confirmed Yet</td>
                    <?php else: ?>
                        <td class="text-success">Confirmed</td>
                    <?php endif; ?>
                    <td><?= h($booking->created) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $booking->id],['class'=>'btn btn-outline-primary mr-2']) ?>
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
