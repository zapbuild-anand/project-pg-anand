<div class="pgs index content" id="result">
    <?= $this->Html->link(__('New Pg'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Pgs') ?></h3>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('landmark') ?></th>
                    <th><?= $this->Paginator->sort('availableFrom') ?></th>
                    <th><?= $this->Paginator->sort('Added') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pgs as $pg): ?>
                <tr>
                    <td><?= $this->Number->format($pg->id) ?></td>
                    <td><?= h($pg->name) ?></td>
                    <td><?= $pg->has('user') ? $this->Html->link($pg->user->id, ['controller' => 'Users', 'action' => 'view', $pg->user->id]) : '' ?></td>
                    <td><?= h($pg->landmark) ?></td>
                    <td><?= h($pg->availableFrom) ?></td>
                    <td><?= h($pg->created) ?></td>
                    <td class="actions">
                        <?php echo "<button onclick='approve($pg->id);' class='btn btn-outline-success btn-rounded mr-2' id='approve$pg->id'>Approve</button>"; ?>
                        <?= $this->Form->postLink(__('Remove'), ['controller'=>'Pgs','action' => 'delete', $pg->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pg->id),'class'=>'btn btn-outline-danger btn-rounded mr-2']) ?>
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


<script type="text/javascript">
    function approve(pgid)
    {
        var dataString='pg_id='+pgid;
        $.ajax({
            method: 'get',
            url : "<?php echo $this->Url->build( ['controller' => 'Admins', 'action' => 'approve' ] ); ?>",
            data:dataString,
            success: function( response )
            {    
                $('#result').html(response);
            }
        });            
    }
</script>