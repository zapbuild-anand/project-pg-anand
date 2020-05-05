<div class="pgs index content">
    <h3 class="text-center"><?= __('Available PG Details') ?></h3>
    <div id="result" class="text-danger"></div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('Owner') ?></th>
                    <th><?= $this->Paginator->sort('landmark') ?></th>
                    <th><?= $this->Paginator->sort('status') ?></th>
                    <th><?= $this->Paginator->sort('Registration Date') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pgs as $pg): ?>
                <tr id="<?=$pg->id?>">
                    <td><?= $this->Number->format($pg->id) ?></td>
                    <td><?= h($pg->name) ?></td>
                    <td><?= $pg->has('user') ? $this->Html->link($pg->user->firstname, ['controller' => 'Users', 'action' => 'view', $pg->user->id]) : '' ?></td>
                    <td><?= h($pg->landmark) ?></td>
                    <td><?= h($pg->status) ?></td>
                    <td><?= h($pg->created) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['prefix'=>false,'controller'=>'Pgs','action' => 'view', $pg->id],['class'=>'btn btn-outline-success btn-rounded mr-2']) ?>
                        <?php echo "<button onclick='remove($pg->id);' class='btn btn-outline-danger btn-rounded mr-2' id='remove$pg->id'>Remove</button>"; ?>
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
    function remove(pgid)
    {
        if (!confirm("Do you want to remove this PG #"+pgid)){
        return false;
        }
        else
        {  
            var dataString='id='+pgid;
            $.ajax({
                method: 'post',
                url : "<?php echo $this->Url->build( ['controller' => 'Pgs', 'action' => 'delete' ] ); ?>",
                data:dataString,
                success: function( response )
                {    
                    $('#result').html(response);
                    $('#'+pgid).remove();
                }
            });   
        }        
    }
</script>