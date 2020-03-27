<div class="row">
    <div class="col">
        <div class="pgs view content">
            <h3><?= h($pg->name) ?></h3>
            <div class="row">
                <div class="col">
                    <table class="table">
                        <tr>
                            <th><?= __('Name') ?></th>
                            <td><?= h($pg->name) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Owner') ?></th>
                            <td><?= $pg->has('user') ? $this->Html->link($pg->user->firstname, ['controller' => 'Users', 'action' => 'view', $pg->user->id]) : '' ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Type') ?></th>
                            <td><?= h($pg->type) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Landmark') ?></th>
                            <td><?= h($pg->landmark) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Status') ?></th>
                            <td><?= h($pg->status) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Approved') ?></th>
                            <td><?= h($pg->approved) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <td><?= $this->Number->format($pg->id) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Sharing') ?></th>
                            <td><?= $this->Number->format($pg->sharing) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('TotalFloors') ?></th>
                            <td><?= $this->Number->format($pg->totalFloors) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('PgOnFloor') ?></th>
                            <td><?= $this->Number->format($pg->pgOnFloor) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('NoOfRooms') ?></th>
                            <td><?= $this->Number->format($pg->noOfRooms) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('HouseNumber') ?></th>
                            <td><?= $this->Number->format($pg->houseNumber) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('AvailableFrom') ?></th>
                            <td><?= h($pg->availableFrom) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Expire') ?></th>
                            <td><?= h($pg->expire) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Created') ?></th>
                            <td><?= h($pg->created) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Modified') ?></th>
                            <td><?= h($pg->modified) ?></td>
                        </tr>
                    </table>
                </div>
                <div class="col-3">
                    <h4>Details</h4>
                    <a href="#address">Address</a><br>
                    <a href="#facilities">Facilities</a><br>
                    <a href="#images">Images</a><br>
                    <a href="#pricing">Pricing</a><br>
                    <a href="#rules">Rules</a><br>
                </div>
            </div>
            <div class="related" id="address">
                <h4><?= __('Addresses') ?></h4>
                <?php if (!empty($pg->addresses)) : ?>
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Pg Id') ?></th>
                            <th><?= __('State') ?></th>
                            <th><?= __('District') ?></th>
                            <th><?= __('Sector') ?></th>
                            <th><?= __('Pincode') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($pg->addresses as $addresses) : ?>
                        <tr>
                            <td><?= h($addresses->id) ?></td>
                            <td><?= h($addresses->user_id) ?></td>
                            <td><?= h($addresses->pg_id) ?></td>
                            <td><?= h($addresses->state) ?></td>
                            <td><?= h($addresses->district) ?></td>
                            <td><?= h($addresses->sector) ?></td>
                            <td><?= h($addresses->pincode) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Addresses', 'action' => 'view', $addresses->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Addresses', 'action' => 'edit', $addresses->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Addresses', 'action' => 'delete', $addresses->id], ['confirm' => __('Are you sure you want to delete # {0}?', $addresses->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related" id="facilities">
                <h4><?= __('Facilities') ?></h4>
                <?php if (!empty($pg->facilities)) : ?>
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Pg Id') ?></th>
                            <th><?= __('Furnishing') ?></th>
                            <th><?= __('Balcony') ?></th>
                            <th><?= __('Table') ?></th>
                            <th><?= __('Sofa') ?></th>
                            <th><?= __('Electricity') ?></th>
                            <th><?= __('PowerBackup') ?></th>
                            <th><?= __('Wifi') ?></th>
                            <th><?= __('Led') ?></th>
                            <th><?= __('Refrigerator') ?></th>
                            <th><?= __('AC') ?></th>
                            <th><?= __('RO') ?></th>
                            <th><?= __('Geaser') ?></th>
                            <th><?= __('Cooler') ?></th>
                            <th><?= __('Laundary') ?></th>
                            <th><?= __('Security') ?></th>
                            <th><?= __('Cctv') ?></th>
                            <th><?= __('Parking') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($pg->facilities as $facilities) : ?>
                        <tr>
                            <td><?= h($facilities->id) ?></td>
                            <td><?= h($facilities->pg_id) ?></td>
                            <td><?= h($facilities->furnishing) ?></td>
                            <td><?= h($facilities->balcony) ?></td>
                            <td><?= h($facilities->table) ?></td>
                            <td><?= h($facilities->sofa) ?></td>
                            <td><?= h($facilities->electricity) ?></td>
                            <td><?= h($facilities->powerBackup) ?></td>
                            <td><?= h($facilities->wifi) ?></td>
                            <td><?= h($facilities->led) ?></td>
                            <td><?= h($facilities->refrigerator) ?></td>
                            <td><?= h($facilities->AC) ?></td>
                            <td><?= h($facilities->RO) ?></td>
                            <td><?= h($facilities->geaser) ?></td>
                            <td><?= h($facilities->cooler) ?></td>
                            <td><?= h($facilities->laundary) ?></td>
                            <td><?= h($facilities->security) ?></td>
                            <td><?= h($facilities->cctv) ?></td>
                            <td><?= h($facilities->parking) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Facilities', 'action' => 'view', $facilities->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Facilities', 'action' => 'edit', $facilities->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Facilities', 'action' => 'delete', $facilities->id], ['confirm' => __('Are you sure you want to delete # {0}?', $facilities->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related" id="images">
                <h4><?= __('Images') ?></h4>
                <?php if (!empty($pg->images)) : ?>
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Pg Id') ?></th>
                            <th><?= __('Image') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($pg->images as $images) : ?>
                        <tr>
                            <td><?= h($images->id) ?></td>
                            <td><?= h($images->pg_id) ?></td>
                            <td><?= h($images->image) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Images', 'action' => 'view', $images->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Images', 'action' => 'edit', $images->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Images', 'action' => 'delete', $images->id], ['confirm' => __('Are you sure you want to delete # {0}?', $images->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related" id="pricing">
                <h4><?= __('Pricings') ?></h4>
                <?php if (!empty($pg->pricings)) : ?>
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Pg Id') ?></th>
                            <th><?= __('Rent') ?></th>
                            <th><?= __('Security') ?></th>
                            <th><?= __('MinimumDuration') ?></th>
                            <th><?= __('LeavingNotice') ?></th>
                            <th><?= __('EarlyLeavingCharge') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($pg->pricings as $pricings) : ?>
                        <tr>
                            <td><?= h($pricings->id) ?></td>
                            <td><?= h($pricings->pg_id) ?></td>
                            <td><?= h($pricings->rent) ?></td>
                            <td><?= h($pricings->security) ?></td>
                            <td><?= h($pricings->minimumDuration) ?></td>
                            <td><?= h($pricings->leavingNotice) ?></td>
                            <td><?= h($pricings->earlyLeavingCharge) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Pricings', 'action' => 'view', $pricings->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Pricings', 'action' => 'edit', $pricings->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Pricings', 'action' => 'delete', $pricings->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pricings->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related" id="rating">
                <h4><?= __('Ratings') ?></h4>
                <?php if (!empty($pg->ratings)) : ?>
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Pg Id') ?></th>
                            <th><?= __('Rating') ?></th>
                            <th><?= __('Comment') ?></th>
                            <th><?= __('Created') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($pg->ratings as $ratings) : ?>
                        <tr>
                            <td><?= h($ratings->id) ?></td>
                            <td><?= h($ratings->user_id) ?></td>
                            <td><?= h($ratings->pg_id) ?></td>
                            <td><?= h($ratings->rating) ?></td>
                            <td><?= h($ratings->comment) ?></td>
                            <td><?= h($ratings->created) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Ratings', 'action' => 'view', $ratings->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Ratings', 'action' => 'edit', $ratings->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Ratings', 'action' => 'delete', $ratings->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ratings->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related" id="request">
                <h4><?= __('Requests') ?></h4>
                <?php if (!empty($pg->requests)) : ?>
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Pg Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Status') ?></th>
                            <th><?= __('Created') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($pg->requests as $requests) : ?>
                        <tr>
                            <td><?= h($requests->id) ?></td>
                            <td><?= h($requests->pg_id) ?></td>
                            <td><?= h($requests->user_id) ?></td>
                            <td><?= h($requests->status) ?></td>
                            <td><?= h($requests->created) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Requests', 'action' => 'view', $requests->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Requests', 'action' => 'edit', $requests->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Requests', 'action' => 'delete', $requests->id], ['confirm' => __('Are you sure you want to delete # {0}?', $requests->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related" id="rules">
                <h4><?= __('Rules') ?></h4>
                <?php if (!empty($pg->rules)) : ?>
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Pg Id') ?></th>
                            <th><?= __('Pets') ?></th>
                            <th><?= __('Visitors') ?></th>
                            <th><?= __('Smoking') ?></th>
                            <th><?= __('Alcohal') ?></th>
                            <th><?= __('Events') ?></th>
                            <th><?= __('LateEntry') ?></th>
                            <th><?= __('Others') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($pg->rules as $rules) : ?>
                        <tr>
                            <td><?= h($rules->id) ?></td>
                            <td><?= h($rules->pg_id) ?></td>
                            <td><?= h($rules->pets) ?></td>
                            <td><?= h($rules->visitors) ?></td>
                            <td><?= h($rules->smoking) ?></td>
                            <td><?= h($rules->alcohal) ?></td>
                            <td><?= h($rules->events) ?></td>
                            <td><?= h($rules->lateEntry) ?></td>
                            <td><?= h($rules->others) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Rules', 'action' => 'view', $rules->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Rules', 'action' => 'edit', $rules->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Rules', 'action' => 'delete', $rules->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rules->id)]) ?>
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
