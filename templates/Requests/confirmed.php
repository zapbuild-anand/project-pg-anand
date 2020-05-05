<?php if($count>0): ?>
    <div class="requests index content">
        <h3><?= __('Requests') ?></h3>
        <div id="result" class="text-danger"></div>
        <div class="table-responsive">
            <?php $number=1; ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>S.NO</th>
                        <th><?= $this->Paginator->sort('Request Id') ?></th>
                        <th><?= $this->Paginator->sort('pg_id') ?></th>
                        <th><?= $this->Paginator->sort('Guest Name') ?></th>
                        <th><?= __('Status') ?></th>
                        <th><?= $this->Paginator->sort('Date') ?></th>
                        <th class="actions"><?= __('Actions') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($requests as $request): ?>
                    <?php if($request->status!=0): ?>
                        <tr id="<?=$request->id?>">
                            <td><?= $number++ ?></td>
                            <td><?= $this->Number->format($request->id) ?></td>
                            <td><?= $request->has('pg') ? $this->Html->link($request->pg->name, ['controller' => 'Pgs', 'action' => 'view', $request->pg->id]) : '' ?></td>
                            <td><?= $request->user->firstname.' '.$request->user->lastname ?></td>
                            <?php if($request->status==0): ?>
                                <td id="conf">Not Confirmed Yet</td>
                            <?php else: ?>
                                <td class="text-success">Confirmed</td>
                            <?php endif; ?>
                            <td><?= h($request->created) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['action' => 'view', $request->id],['class'=>'btn btn-outline-primary mr-2']) ?>
                                <?= $this->Form->postLink(__('Reject'), ['controller'=>'Pgs','action' => 'delete'], ['class'=>'btn btn-outline-danger mr-2']) ?>
                            </td>
                        </tr>
                    <?php endif; ?>
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
<?php else: ?>
    <br>
    <p class="text-danger text-center">No confirmed requests!</p>
<?php endif; ?>
