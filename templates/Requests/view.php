<div class="row border">
    <div class="col">
            <h3 class="text-center">Paying Guest Details</h3>
            <div id="result" class="text-danger"></div>
            <table class="table">
                <tr>
                    <th><?= __('Booking Id') ?></th>
                    <td><?= $this->Number->format($request->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Pg Name') ?></th>
                    <td><?= $request->has('pg') ? $this->Html->link($request->pg->name, ['controller' => 'Pgs', 'action' => 'view', $request->pg->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Guest Name') ?></th>
                    <td><?= $request->user->firstname.' '.$request->user->lastname ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= $request->user->email ?></td>
                </tr>
                <tr>
                    <th><?= __('Phone') ?></th>
                    <td><?= $request->user->phone ?></td>
                </tr>
                <tr>
                    <th><?= __('Check In Date') ?></th>
                    <td><?= h($request->checkindate) ?></td>
                </tr>
                <tr>
                    <th><?= __('Requested On') ?></th>
                    <td><?= h($request->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Message') ?></th>
                    <td><?= h($request->message) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <?php if($request->status==0): ?>
                        <td id="conf">Not Confirmed Yet</td>
                    <?php else: ?>
                        <td class="text-success">Confirmed</td>
                    <?php endif; ?>
                </tr>
            </table>
    </div>
</div>
<?php if($request->status==0): ?>
<div class="row mt-3 border p-2" id="afterconf">
    <div class="col">
        <?= $this->Form->create() ?>
        <div class="form-group">
            <?= $this->Form->control('remark',['label'=>'Remark :','type'=>'textarea','class'=>'form-control mb-2']) ?>
            <div class="text-center">
            <?php echo "<button onclick='approve($request->id);' type='button' class='btn btn-outline-success btn-rounded mr-2' id='approve$request->id'>Confirm</button>"; ?>
            </div>
        </div>
        <?= $this->Form->end() ?>        
    </div>
</div>
<?php endif; ?>


<script type="text/javascript">
    function approve(requestid)
    {
        var dataString='id='+requestid;
        $.ajax({
            method: 'get',
            url : "<?php echo $this->Url->build( ['controller' => 'Requests', 'action' => 'index' ] ); ?>",
            data:dataString,
            success: function( response )
            {    
                $('#result').html(response);
                $('#approve'+requestid).hide();
                $('#afterconf').remove();
                $('#conf').html('Confirmed');
                $('#conf').addClass('text-success');

            }
        });            
    }
</script>