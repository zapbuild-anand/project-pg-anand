<?= $this->Html->css('pgview.css'); ?>

<div class="container-fluid p-3">
    <div class="row mt-3">
        <div class="col p-3">
            <?php if (!empty($pg->pricings)) : ?>    
                <?php foreach ($pg->pricings as $pricing) : ?>
                    <h3>&#8377; <?= $pricing->rent ?> </h3>
                    <p>for 1 <?php if($pricing->per==1)echo 'bed'; else echo 'bedroom'; ?> Per Month</p>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <div class="col p-3">
            <p><?php if($pg->sharing==1){ 
                        echo 'Private';
                     }else
                     {
                        echo 'Shared';
                     }
                        ?> room for <?php 
                            if($pg->type==1){ 
                                echo 'Boys';
                            }
                            elseif ($pg->type==2) {
                                echo 'Girls';
                            }
                            else{
                                echo 'Boys & Girls';  
                            }
                        ?></p>
            <p>Paying Guest in <?= $pg->name ?></p>
            <p><?php if (!empty($pg->addresses)) : ?>
                            <?php foreach ($pg->addresses as $addresses) : ?>
                                <p>in sector-<?= h($addresses->sector) ?>
                                    <?= h($pg->landmark) ?>,
                                    <?= h($addresses->district) ?>,
                                    <?= h($addresses->state) ?>
                                </p>
                            <?php endforeach; ?>
                        <?php endif; ?>
        </div>
        <div class="col p-3">
            <?= $this->Form->button(__('Contact Owner'), ['type'=>'button','class'=>'btn btn-primary float-right','data-toggle'=>'modal','data-target'=>".bd-example-modal-lg$pg->id"]) ?>
            <br><br>
            <?php if(isset($user_id)): ?>
                <?php if(isset($shortlist)): ?>
                    <button type="button" class="btn text-success float-right" id="shortlist"><i class="fa fa-star" id="star"></i> Shortlisted</button>
                <?php else: ?>
                    <button type="button" class="btn text-success float-right" id="shortlist"><i class="fa fa-star-o" id="star"></i> Shortlist</button>
                <?php endif; ?>
            <?php endif; ?>
            <div id="result" class="text-success float-right mr-2"></div>
        </div>
    </div>
</div>
<div class="container-fluid p-3" style="background-color: #F0F3E5">
    <div class="row mt-3">
        <div class="col-5 pt-3">
            <div class="container">
                <?php $countImage=count($pg->images);$now=1; ?>
                <?php if (!empty($pg->images)) : ?>
                <?php foreach ($pg->images as $images) : ?>
                    <div class="mySlides">
                        <div class="numbertext"><?= $now++ ?> / <?= $countImage ?></div>
                        <?= $this->Html->image($images->image, ['style' => 'width:100%;height:320px;','class'=>'hover-shadow cursor']); ?>
                    </div>
                <?php endforeach; ?>
                <?php else: ?>
                <div class="mySlides">
                    <div class="numbertext"><?= $now++ ?> / <?= $countImage ?></div>
                    <?= $this->Html->image('not2.png', ['style' => 'width:100%;height:320px;']); ?>
                </div>
                <div class="caption-container">
                    <p id="caption">No Image available</p>
                </div>
                <?php endif; ?>
                
              <a class="prev" onclick="plusSlides(-1)">❮</a>
              <a class="next" onclick="plusSlides(1)">❯</a>
            </div>
        </div>
        <div class="col-7 bg-light">
            <div class="row p-2">
                <div class="col">
                    <div>
                        <h5><?= __('Pricings') ?></h5>
                        <?php if (!empty($pg->pricings)) : ?>
                            <?php foreach ($pg->pricings as $pricings) : ?>
                                    &#8377; <?= h($pricings->rent) ?>
                                <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                    <div class="tooltip1">View Rent Details
                        <span class="tooltip1text shadow">
                            <?php if (!empty($pg->pricings)) : ?>
                            <?php foreach ($pg->pricings as $pricings) : ?>
                                    <p>Rent of PG &#8377; <?= h($pricings->rent) ?><br>
                                    Security: &#8377; <?= h($pricings->security) ?><br>
                                    Total Deposit: &#8377; <?= h($pricings->rent+$pricings->security) ?>
                                    </p>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </span>
                    </div>

                </div>
                <div class="col">
                    <div>
                        <h5><?= __('Address') ?></h5>
                        <?php if (!empty($pg->addresses)) : ?>
                            <?php foreach ($pg->addresses as $addresses) : ?>
                                <p><?= h($pg->name) ?>,
                                    <?= h($pg->landmark) ?>,
                                    Sector-<?= h($addresses->sector) ?>,
                                    <?= h($addresses->district) ?>
                                </p>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div> 
            <div class="row p-2">
                <div class="col">
                    <div>
                        <h5><?= __('Sharing') ?></h5>
                        <?php 
                            if($pg->sharing==1){ 
                                echo '<p>Private Room</p>';
                            }
                            else{
                                echo '<p>Shared by '.$pg->sharing.'</p>';
                            }
                        ?>
                    </div>
                </div>
                <div class="col">
                    <div>
                        <h5><?= __('Available for') ?></h5>
                        <?php 
                            if($pg->type==1){ 
                                echo '<p>Boys</p>';
                            }
                            elseif ($pg->type==2) {
                                echo '<p>Girls</p>';
                            }
                            else{
                                echo '<p>All</p>';  
                            }
                        ?>
                    </div>
                </div>
            </div>
            <div class="row p-2">
                <div class="col">
                    <div>
                        <h5><?= __('Available From') ?></h5>
                        <h6><?= date_format($pg->availableFrom,"dS M, Y") ?> </h6>
                    </div>
                </div>
                <div class="col">
                    <div>
                        <h5><?= __('Posted By and On') ?></h5>
                        <h6>Owner on <?= date_format($pg->created,"dS M, Y") ?> </h6>
                    </div>
                </div>
            </div>
            <div class="row p-2">
                <div class="col">
                    <h5><?= __('Furnishing') ?></h5>
                    <?php if (!empty($pg->facilities)) : ?>
                    <?php foreach ($pg->facilities as $facilities) : ?>
                        <h6><?php 
                                if($facilities->furnishing==1){ 
                                    echo 'Furnished';
                                }
                                elseif ($facilities->furnishing==2) {
                                    echo 'Semifurnished';
                                }
                                else{
                                    echo 'Unfurnished';   
                                }
                            ?>
                        </h6>
                    <?php endforeach; ?>
                    <?php endif; ?>
                    <a href="#facilities">View Facilities</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col p-3">
                <h5><?= __('About PG') ?></h5>
                <p><strong><?= __('Address: ') ?></strong>
                <?php if (!empty($pg->addresses)) : ?>
                    <?php foreach ($pg->addresses as $addresses) : ?>
                        <?= h($pg->landmark) ?>,
                            Sector-<?= h($addresses->sector) ?>,
                            <?= h($addresses->district) ?>,
                            <?= h($addresses->state) ?>,
                            <?= h($addresses->pincode) ?>
                    <?php endforeach; ?>
                <?php endif; ?>
                </p>
                <p><?= $pg->description ?></p>
        </div>
    </div>
    <div class="row">
        <div class="col p-3">
            <h5><?= __('Included in the price') ?></h5>
            <?php if (!empty($pg->pricings)) : ?>
                    <?php foreach ($pg->pricings as $pricing) : ?>
                            <p><?php 
                                if($pricing->food==1)
                                    echo 'Food ';
                                if($pricing->laundary==1)
                                    echo 'Laundary ';
                                if($pricing->electricity==1)
                                    echo 'Electricity ';
                                if($pricing->wifi==1)
                                    echo 'Wifi ';
                                if($pricing->housekeeping==1)
                                    echo 'Housekeeping ';
                                if($pricing->dth==1)
                                    echo 'Dth ';
                                ?>
                           </p>
                        <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
    <div class="row">
        <div class="col p-3">
            <div class="related" id="facilities">
                <?php if (!empty($pg->facilities)) : ?>
                    <?php foreach ($pg->facilities as $facilities) : ?>
                        <h5><?php 
                                if($facilities->furnishing==1){ 
                                    echo 'Furnished';
                                }
                                elseif ($facilities->furnishing==2) {
                                    echo 'Semifurnished';
                                }
                                else{
                                    echo 'Unfurnished';   
                                }
                            ?>
                        </h5>
                    <div class="row">
                        <?php 
                        echo '<div class="col">'; 
                            if($facilities->balcony==1){ 
                                echo 'Balcony';
                            }
                            else
                                echo 'No Balcony';
                        echo '</div>';
                        echo '<div class="col">'; 
                            if($facilities->table==1){ 
                                echo 'Table';
                            }
                            else
                                echo 'No Table';
                        echo '</div>';
                        echo '<div class="col">'; 
                            if($facilities->sofa==1){ 
                                echo 'Sofa';
                            }
                            else
                                echo 'No Sofa';
                        echo '</div>';
                        echo '<div class="col">'; 
                            if($facilities->electricity==1){ 
                                echo 'electricity';
                            }
                            else
                                echo 'No Electricity';
                        echo '</div>';
                        echo '<div class="col">'; 
                            if($facilities->powerBackup==1){ 
                                echo 'Power Backup';
                            }
                            else
                                echo 'No Power Packup';
                        echo '</div>';
                        echo '<div class="col">'; 
                            if($facilities->wifi==1){ 
                                echo 'Wifi';
                            }
                            else
                                echo 'No Wifi';
                        echo '</div>';
                        ?>
                    </div>
                    <div class="row">
                        <?php
                        echo '<div class="col">'; 
                            if($facilities->led==1){ 
                                echo 'Led TV';
                            }
                            else
                                echo 'No Led TV';
                        echo '</div>';
                        echo '<div class="col">'; 
                            if($facilities->refrigerator==1){ 
                                echo 'Refrigerator';
                            }
                            else
                                echo 'No Refrigerator';
                        echo '</div>';
                        echo '<div class="col">'; 
                            if($facilities->ac==1){ 
                                echo 'AC';
                            }
                            else
                                echo 'No AC';
                        echo '</div>';
                        echo '<div class="col">'; 
                            if($facilities->ro==1){ 
                                echo 'RO Purifier';
                            }
                            else
                                echo 'No RO';
                        echo '</div>';
                        echo '<div class="col">'; 
                            if($facilities->geaser==1){ 
                                echo 'Geaser';
                            }
                            else
                                echo 'No Geaser';
                        echo '</div>';
                        echo '<div class="col">'; 
                            if($facilities->cooler==1){ 
                                echo 'Cooler';
                            }
                            else
                                echo 'No Cooler';
                        echo '</div>'; 
                        ?>
                    </div>
                    <div class="row">
                        <?php
                        echo '<div class="col">'; 
                            if($facilities->laundary==1){ 
                                echo 'Laundry';
                            }
                            else
                                echo 'No Laundry';
                        echo '</div>';
                        echo '<div class="col">'; 
                            if($facilities->pgsecurity==1){ 
                                echo ' 24x7 Security';
                            }
                            else
                                echo 'No Security';
                        echo '</div>';
                        echo '<div class="col">'; 
                            if($facilities->cctv==1){ 
                                echo 'CCTV';
                            }
                            else
                                echo 'No CCTV';
                        echo '</div>';
                        echo '<div class="col">'; 
                            if($facilities->parking==1){ 
                                echo 'Parking';
                            }
                            else
                                echo 'No Parking';
                        echo '</div>';
                        ?>
                        <div class="col">
                            
                        </div>
                        <div class="col">
                            
                        </div>
                    </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col p-3">
            <div class="related" id="rules">
                <h5><?= __('House Rules') ?></h5>
                <?php if (!empty($pg->rules)) : ?>
                    <?php foreach ($pg->rules as $rules) : ?>
                        <ul>
                            <li>
                                <?= __('Pets ') ?>
                                <?php if($rules->pets==1)
                                        echo "allowed";
                                    else
                                        echo "not allowed"; 
                                ?>
                            </li>
                            <li>
                                <?= __('Visitors ') ?>
                                <?php if($rules->visitors==1)
                                        echo "allowed";
                                    else
                                        echo "not allowed"; 
                                ?>
                            </li>
                            <li>
                                <?= __('Smoking ') ?>
                                <?php if($rules->smoking==1)
                                        echo "allowed";
                                    else
                                        echo "not allowed"; 
                                ?>
                            </li>
                            <li>
                                <?= __('Alcohal ') ?>
                                <?php if($rules->alcohal==1)
                                        echo "allowed";
                                    else
                                        echo "not allowed"; 
                                ?>
                            </li>
                            <li>
                                <?= __('Events ') ?>
                                <?php if($rules->events==1)
                                        echo "allowed";
                                    else
                                        echo "not allowed"; 
                                ?>
                            </li>
                            <li>
                                <?= __('Late Entry time is ') ?>
                                <?= date_format($rules->lateEntry,"h:i:s A") ?>
                            </li>
                        </ul>
                        <?= __('Other: ') ?>
                        <?= h($rules->others) ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid p-3">
    <div class="row">
        <div class="col p-3">
            <div class="row">
                <div class="col">
                    <h5>Owner Details</h5>    
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div>
                        <?php 
                        if(!empty($pg->user->image))   
                            echo $this->Html->image($pg->user->image, ['class'=>'rounded-circle','width'=>'160','height'=>'160','alt' => 'CakePHP','title'=>$pg->user->firstname]);
                        else
                            echo $this->Html->image('avtar.png', ['class'=>'rounded-circle','width'=>'160','height'=>'160','alt' => 'CakePHP','title'=>$pg->user->firstname]);
                        ?>  
                    </div>
                    <div class="mt-2">
                        <?php 
                        $pgcount=0;
                        foreach ($pgs as $row) {
                            $pgcount++;
                        }
                        echo '<p>PG Listed: '.$pgcount.'</p>';
                        ?> 
                    </div>    
                </div>
                <div class="col">
                    <p><?= $pg->user->firstname." ".$pg->user->lastname ?></p>
                    <p>Owner</p>
                    <?= $this->Form->button(__('View Phone Number'), ['type'=>'button','class'=>'btn btn-outline-primary btn-rounded mr-2','data-toggle'=>'modal','data-target'=>".bd-example-modal-lg$pg->id"]) ?>
                    <!-- Modal -->
                    <div class="modal fade bd-example-modal-lg<?= $pg->id ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">You have requested to view owner details.</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col">
                                            <?php
                                                echo '<p>POSTED BY OWNER:</p>';
                                                if(isset($_SESSION['user'])){
                                                    echo '<p>'.$pg->user->email.' | '.$pg->user->phone.'</p>';
                                                }
                                                else{
                                                    echo '<p>+91 88***635** | *****@*****.com</p>';
                                                }
                                                echo '<p>'.$pg->user->firstname." ".$pg->user->lastname.'</p>';
                                            ?>
                                        </div>
                                        <div class="col">
                                            <p>POSTED ON <?= strtoupper(date_format($pg->created,"dS M, Y")) ?>:</p>
                                            <?php foreach($pg->pricings as $pricing){
                                                    if($pricing->pg_id==$pg->id)
                                                    echo '<p class="card-text float-left">&#8377; '.$pricing->rent.'</p>';  
                                                    }   
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>        
        </div>
        <div class="col p-3">
            <div class="row">
                <div class="col">
                    <h5>Send enquiry to owner</h5>        
                </div>
            </div>
            
            <?= $this->Form->create(null) ?>
                <div class="form-group p-3">
                    <fieldset>
                        <?php
                            echo $this->Form->control('name',['class'=>'form-control mb-2']);
                            echo $this->Form->control('email',['class'=>'form-control mb-2']);
                            echo $this->Form->control('phone',['class'=>'form-control mb-2']);
                            echo $this->Form->control('comment',['label'=>'Message','type'=>'textarea','class'=>'form-control mb-2']);
                        ?>
                    </fieldset>
                    <?= $this->Form->button('Send Email & SMS',['class'=>'btn btn-outline-primary btn-rounded my-4 waves-effect z-depth-0']); ?>
                </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
<div class="row justify-content-md-center" >
    <?php if(isset($user_id)): ?>
        <?= $this->Form->button('Book Now',['class'=>'btn btn-success btn-rounded my-4 waves-effect z-depth-0','data-toggle'=>'modal','data-target'=>"#exampleModal"]) ?>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Booking Details</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <?= $this->Form->create(null,['id'=>'request_form']) ?>
                <div class="form-group">
                    <?= $this->Form->control('checkindate',['label'=>'Check In Date','type'=>'date','class'=>'form-control mb-2',]) ?>
                    <div id="error_checkin" class="text-danger"></div>
                    <?= $this->Form->control('message',['type'=>'textarea','class'=>'form-control mb-2',]) ?>
                    <div id="error_message" class="text-danger"></div>
                    <div class="text-md-center">
                        <button type="button" class='btn btn-outline-success btn-rounded mr-2' id="btn_submit" name="btn_submit">Submit</button>
                    </div>
                </div>
            <?= $this->Form->end() ?>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <?php endif; ?>
</div>


<div class="row">
    <div class="col">
        <div class="pgs view content">
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
        </div>
    </div>
</div>


<script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  var captionText = document.getElementById("caption");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  captionText.innerHTML = dots[slideIndex-1].alt;
}
</script>

<script>
    $(document).ready(function(){
         $('#shortlist').click(function(){
            var user_id="<?php echo $user_id; ?>";
            var pg_id="<?php echo $pg->id; ?>";
            var dataString='user_id='+user_id+'&pg_id='+pg_id;
            if($('#star').hasClass('fa-star-o'))
            {
                $.ajax({
                    method: 'get',
                    url : "<?php echo $this->Url->build( [ 'controller' => 'Shortlists', 'action' => 'Add' ] ); ?>",
                    data:dataString,
                    success: function( response )
                    {       
                        $( '#result' ).html(response);
                        $('#shortlist').html("<i id='star' class='fa fa-star'></i> Shortlisted")
                    }
                });
            }
            else
            {
                $.ajax({
                    method: 'get',
                    url : "<?php echo $this->Url->build( [ 'controller' => 'Shortlists', 'action' => 'Delete' ] ); ?>",
                    data:dataString,
                    success: function( response )
                    {       
                        $( '#result' ).html(response);
                        $('#shortlist').html("<i  id='star' class='fa fa-star-o'></i> Shortlist")
                    }
                });
            }
         });

        $('#btn_submit').click(function(){
            var error_checkin='';
            var error_message='';
            if ($.trim($('#checkindate').val()).length ==0) {
                error_checkin="*Check in date required.";
                $('#error_checkin').html(error_checkin);
                $('#checkindate').addClass('has-error');
            }
            else{
                error_checkin = '';
                $('#error_checkin').html(error_checkin);
                $('#checkindate').removeClass('has-error');
            }

            if ($.trim($('#message').val()).length ==0) {
                error_message="*Message required.";
                $('#error_message').html(error_message);
                $('#message').addClass('has-error');
            }
            else{
                error_message = '';
                $('#error_message').html(error_message);
                $('#message').removeClass('has-error');
            }

            if (error_checkin != '' || error_message != '') {
                return false;
            }
            else{
                $('#btn_submit').attr("disabled","disabled");
                $(document).css('cursor','progress');
                $("#request_form").submit();
            }
        });
    });

</script>
