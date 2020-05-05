<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Pricing'), ['action' => 'edit', $pricing->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Pricing'), ['action' => 'delete', $pricing->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pricing->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Pricings'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Pricing'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="pricings view content">
            <h3><?= h($pricing->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Pg') ?></th>
                    <td><?= $pricing->has('pg') ? $this->Html->link($pricing->pg->name, ['controller' => 'Pgs', 'action' => 'view', $pricing->pg->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Food') ?></th>
                    <td><?= h($pricing->food) ?></td>
                </tr>
                <tr>
                    <th><?= __('Laundary') ?></th>
                    <td><?= h($pricing->laundary) ?></td>
                </tr>
                <tr>
                    <th><?= __('Electricity') ?></th>
                    <td><?= h($pricing->electricity) ?></td>
                </tr>
                <tr>
                    <th><?= __('Wifi') ?></th>
                    <td><?= h($pricing->wifi) ?></td>
                </tr>
                <tr>
                    <th><?= __('Housekeeping') ?></th>
                    <td><?= h($pricing->housekeeping) ?></td>
                </tr>
                <tr>
                    <th><?= __('Dth') ?></th>
                    <td><?= h($pricing->dth) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($pricing->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Rent') ?></th>
                    <td><?= $this->Number->format($pricing->rent) ?></td>
                </tr>
                <tr>
                    <th><?= __('Security') ?></th>
                    <td><?= $this->Number->format($pricing->security) ?></td>
                </tr>
                <tr>
                    <th><?= __('MinimumDuration') ?></th>
                    <td><?= $this->Number->format($pricing->minimumDuration) ?></td>
                </tr>
                <tr>
                    <th><?= __('LeavingNotice') ?></th>
                    <td><?= $this->Number->format($pricing->leavingNotice) ?></td>
                </tr>
                <tr>
                    <th><?= __('EarlyLeavingCharge') ?></th>
                    <td><?= $this->Number->format($pricing->earlyLeavingCharge) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
