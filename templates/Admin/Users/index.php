<div class="users index content">
    <h3 class="text-center"><?= __('PG Owner Details') ?></h3>
    <div id="result" class="text-danger"></div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('Full Name') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('phone') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('Registeration Date') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                <tr id="<?=$user->id?>">
                    <td><?= $this->Number->format($user->id) ?></td>
                    <td><?= h($user->firstname.' '.$user->lastname) ?></td>
                    <td><?= h($user->email) ?></td>
                    <td><?= h($user->phone) ?></td>
                    <td><?= h($user->created) ?></td>
                    <td class="actions">
                        <?php echo "<button onclick='remove($user->id);' class='btn btn-outline-danger btn-rounded mr-2' id='remove$user->id'>Remove</button>"; ?>
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
    function remove(userid)
    {
        if (!confirm("Do you want to remove this owner #"+userid)){
        return false;
        }
        else
        {  
            var dataString='id='+userid;
            $.ajax({
                method: 'post',
                url : "<?php echo $this->Url->build( ['controller' => 'Users', 'action' => 'delete' ] ); ?>",
                data:dataString,
                success: function( response )
                {    
                    $('#result').html(response);
                    $('#'+userid).remove();
                }
            });   
        }        
    }
</script>