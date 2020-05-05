<div class="row border">
    <div class="col">
        <div class="bookings view content">
            <h3 class="text-center">Booking Request</h3>
            <table class="table">
                <tr>
                    <th><?= __('Booking Id') ?></th>
                    <td><?= $this->Number->format($booking->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Booking Status') ?></th>
                    <?php if($booking->status==0): ?>
                        <td id="conf">Not Confirmed Yet</td>
                    <?php else: ?>
                        <td class="text-success">Confirmed</td>
                    <?php endif; ?>
                </tr>
                <tr>
                    <th><?= __('Request Id') ?></th>
                    <td><?= $booking->request->id ?></td>
                </tr>
                <tr>
                    <th><?= __('Request Status') ?></th>
                    <?php if($booking->request->status==0): ?>
                        <td id="conf">Not Confirmed Yet</td>
                    <?php else: ?>
                        <td class="text-success">Confirmed</td>
                    <?php endif; ?>
                </tr>
                <tr>
                    <th><?= __('Requested On') ?></th>
                    <td><?= h($booking->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Booking Confirmed On') ?></th>
                    <td><?= h($booking->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Remark From Owner') ?></th>
                    <td><?= h($booking->remark) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
<?php if($booking->status==0): ?>
<div class="rowrow mt-3 p-2">
    <div class="col">
        <div class="text-center">
            <?php echo "<button onclick='approve();' type='button' class='btn btn-outline-success btn-rounded mr-2' id='approve'>Continue Booking</button>"; ?>
        </div>
    </div>
</div>
<?php endif; ?>