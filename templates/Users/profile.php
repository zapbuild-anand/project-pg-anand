<div class="container">
<div class="row p-3 justify-content-md-center">
        <div class="col-md">
            <h3>Profile</h3>
            <table class="table w-100">
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($user->firstname." ".$user->lastname) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($user->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($user->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Phone') ?></th>
                    <td><?= h($user->phone) ?></td>
                </tr>
                <tr>
                    <th><?= __('Gender') ?></th>
                    <td><?= h($user->gender) ?></td>
                </tr>
                <tr>
                    <th><?= __('Type') ?></th>
                    <td><?= h($user->type) ?></td>
                </tr>
                <tr>
                    <th><?= __('Dob') ?></th>
                    <td><?= h($user->dob) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($user->created) ?></td>
                </tr>
            </table>
        </div>
        <div class="col-md m-4">
            <?php echo $this->Html->image($user->image, ['width'=>'200','height'=>'200','alt' => 'CakePHP']); ?>
        </div>
    </div>
</div>