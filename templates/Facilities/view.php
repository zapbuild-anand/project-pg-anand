<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Facility $facility
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Facility'), ['action' => 'edit', $facility->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Facility'), ['action' => 'delete', $facility->id], ['confirm' => __('Are you sure you want to delete # {0}?', $facility->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Facilities'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Facility'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="facilities view content">
            <h3><?= h($facility->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Pg') ?></th>
                    <td><?= $facility->has('pg') ? $this->Html->link($facility->pg->name, ['controller' => 'Pgs', 'action' => 'view', $facility->pg->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Furnishing') ?></th>
                    <td><?= h($facility->furnishing) ?></td>
                </tr>
                <tr>
                    <th><?= __('Balcony') ?></th>
                    <td><?= h($facility->balcony) ?></td>
                </tr>
                <tr>
                    <th><?= __('Chair') ?></th>
                    <td><?= h($facility->chair) ?></td>
                </tr>
                <tr>
                    <th><?= __('Sofa') ?></th>
                    <td><?= h($facility->sofa) ?></td>
                </tr>
                <tr>
                    <th><?= __('Electricity') ?></th>
                    <td><?= h($facility->electricity) ?></td>
                </tr>
                <tr>
                    <th><?= __('PowerBackup') ?></th>
                    <td><?= h($facility->powerBackup) ?></td>
                </tr>
                <tr>
                    <th><?= __('Wifi') ?></th>
                    <td><?= h($facility->wifi) ?></td>
                </tr>
                <tr>
                    <th><?= __('Led') ?></th>
                    <td><?= h($facility->led) ?></td>
                </tr>
                <tr>
                    <th><?= __('Refrigerator') ?></th>
                    <td><?= h($facility->refrigerator) ?></td>
                </tr>
                <tr>
                    <th><?= __('AC') ?></th>
                    <td><?= h($facility->AC) ?></td>
                </tr>
                <tr>
                    <th><?= __('RO') ?></th>
                    <td><?= h($facility->RO) ?></td>
                </tr>
                <tr>
                    <th><?= __('Geaser') ?></th>
                    <td><?= h($facility->geaser) ?></td>
                </tr>
                <tr>
                    <th><?= __('Cooler') ?></th>
                    <td><?= h($facility->cooler) ?></td>
                </tr>
                <tr>
                    <th><?= __('Laundary') ?></th>
                    <td><?= h($facility->laundary) ?></td>
                </tr>
                <tr>
                    <th><?= __('Security') ?></th>
                    <td><?= h($facility->security) ?></td>
                </tr>
                <tr>
                    <th><?= __('Cctv') ?></th>
                    <td><?= h($facility->cctv) ?></td>
                </tr>
                <tr>
                    <th><?= __('Parking') ?></th>
                    <td><?= h($facility->parking) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($facility->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Meals') ?></h4>
                <?php if (!empty($facility->meals)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Facility Id') ?></th>
                            <th><?= __('Breakfast') ?></th>
                            <th><?= __('Lunch') ?></th>
                            <th><?= __('Dinner') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($facility->meals as $meals) : ?>
                        <tr>
                            <td><?= h($meals->id) ?></td>
                            <td><?= h($meals->facility_id) ?></td>
                            <td><?= h($meals->breakfast) ?></td>
                            <td><?= h($meals->lunch) ?></td>
                            <td><?= h($meals->dinner) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Meals', 'action' => 'view', $meals->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Meals', 'action' => 'edit', $meals->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Meals', 'action' => 'delete', $meals->id], ['confirm' => __('Are you sure you want to delete # {0}?', $meals->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
