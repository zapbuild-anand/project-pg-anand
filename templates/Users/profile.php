<style type="text/css">
.container {
  position: relative;
  width: 50%;
}

.image {
  opacity: 1;
  display: block;
  width: 160px;
  height: 160px;
  transition: .5s ease;
  backface-visibility: hidden;
}

.middle {
  transition: .5s ease;
  opacity: 0;
  position: absolute;
  top: 50%;
  left: 48%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  text-align: center;
}

.container:hover .image {
  opacity: 0.3;
}

.container:hover .middle {
  opacity: 1;
}

.text {
  color: black;
  font-size: 16px;
  padding: 16px 32px;
}
</style>
<div class="row justify-content-md-center mt-3">
    <div class="col-4">
        <div class="container">
            <a href="change-image">
                <?php 
                if(!empty($user->image))
                    echo $this->Html->image($user->image, ['class'=>'image rounded-circle','alt' => 'CakePHP','title'=>$user->firstname]); 
                else
                    echo $this->Html->image('avtar.png', ['class'=>'image rounded-circle','width'=>'160','height'=>'160','alt' => 'CakePHP','title'=>$user->firstname]); 

                ?>
                <div class="middle">
                    <div class="text">Click here to change</div>
                </div>
            </a>
        </div>
    </div>
</div>
<div class="row justify-content-md-center">
        <div class="col-6 p-4">
            <h3 class="mb-3">Profile</h3>
            <div class="float-left">
                <?= $this->Html->link(__('Edit'), ['action' => 'edit']) ?>
            </div>
            <div class="text-md-right">
                <?= $this->Html->link(__('Change Password'), ['action' => 'change-password']) ?>
            </div>
            <table class="table w-60 float-left">
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
                    <?php 
                        if($user->gender==1){ 
                            echo '<td>Male</td>';
                        }
                        elseif ($user->gender==2) {
                            echo '<td>Female</td>';
                        }
                        else{
                            echo '<td>Other</td>';   
                        }
                    ?>
                </tr>
                <tr>
                    <th><?= __('Bate of birth') ?></th>
                    <td><?= h($user->dob) ?></td>
                </tr>
                <tr>
                    <th><?= __('Registered On') ?></th>
                    <td><?= h($user->created) ?></td>
                </tr>
            </table>
    </div>
</div>