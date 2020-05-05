<div class="container-fluid">
    <div class="row justify-content-md-end">
        <div>
            <?= $this->Html->link(__('Home'), ['controller'=>'users','action' => 'home'], ['class' => 'side-nav-item']) ?>
        </div>
    </div> 

    <div class="mb-4">
            <h1 class="h3 mb-0 text-gray-800">Shortlisted</h1>
    </div>
</div>

<?php if (isset($pgs) && !isset($error)) : ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-9">
                <h3 class="mt-3 float-left">xx PGs Shortlisted</h3>
            </div>
        </div>

        <div class="row">
            <?php $i=1; ?>
            <?php foreach ($pgs as $pg): ?>
                <div class="col-xl-12 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 p-2">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <?php
                                    $imgName='';
                                    foreach ($imgs as $img)
                                    {
                                        if($img->pg_id==$pg->id)
                                        {
                                            $imgName=$img->image;
                                            break;
                                        }
                                    }
                                    if ($imgName!='') 
                                    {
                                        echo $this->Html->image($imgName, ['class'=>'rounded','width'=>'290','height'=>'180','alt' => 'CakePHP','title'=>$pg->name]);
                                    }
                                    else
                                    {
                                        echo $this->Html->image('not2.png', ['class'=>'rounded','width'=>'290','height'=>'180','alt' => 'CakePHP','title'=>$pg->name]);
                                    }
                                ?>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body p-3">
                                    <div class="row mb-1">
                                        <div class="col-8">
                                            <p class="card-text"><?= $pg->noOfRooms ?> Bedroom 
                                            <?php 
                                                    if($pg->type==1){ 
                                                        echo 'Boys';
                                                    }
                                                    elseif ($pg->type==2) {
                                                        echo 'Girls';  
                                                    }
                                                    else{
                                                        echo 'Boys/Girls';  
                                                    }
                                            ?> 
                                            PG in
                                            <?php 
                                                foreach ($address as $key) {
                                                    if($key->pg_id==$pg->id)
                                                        echo 'Sector-'.$key->sector.' ';
                                                } 
                                            ?>
                                            <?= $pg->landmark ?></p>
                                        </div>
                                        <div class="col-4 text-right">
                                            <?php
                                                if(isset($shortlists)){
                                                $flag=0; 
                                                foreach ($shortlists as $shortlist) {
                                                    if ($shortlist->pg_id==$pg->id && $shortlist->user_id==$user_id){
                                                        echo "<i id='shortlist$pg->id' class='fa fa-star' style='cursor: pointer;' onclick='shortlist($pg->id)'></i>";
                                                        $flag=1;
                                                        break;
                                                    }
                                                }
                                                if($flag==0)
                                                {
                                                    echo "<i id='shortlist$pg->id' class='fa fa-star-o' style='cursor: pointer;' onclick='shortlist($pg->id)'></i>";
                                                }
                                                }
                                                echo "<div id='result$pg->id' class='text-success float-right mr-2'></div>";
                                            ?>
                                        </div>
                                    </div>
                                    <h5 class="card-title"><?= $pg->name ?></h5>
                                    <div class="row">
                                        <div class="col">
                                            <?php foreach($pricings as $pricing){
                                                if($pricing->pg_id==$pg->id)
                                                    echo '<p class="card-text float-left">&#8377; '.$pricing->rent.'</p>';  
                                            } ?>
                                            
                                        </div>
                                        <div class="col">
                                            <?php 
                                                if($pg->sharing==1){ 
                                                    echo '<p class="card-text">Private Room</p>';
                                                }
                                                else{
                                                    echo '<p class="card-text">Shared by '.$pg->sharing.'</p>';
                                                }
                                            ?>
                                        </div>
                                        <div class="col">
                                            <?php 
                                                if($pg->type==1){ 
                                                    echo '<p class="card-text">For Boys</p>';
                                                }
                                                elseif ($pg->type==2) {
                                                    echo '<p class="card-text">For Girls</p>';  
                                                }
                                                else{
                                                    echo '<p class="card-text">For Boys/Girls</p>'; 
                                                }
                                            ?>
                                        </div>
                                    </div>
                                   
                                    <?php if(strlen($pg->description)>70): ?>
                                        <style>
                                            #more<?= $i ?> {display: none;}
                                        </style>
                                        <p class="card-text mt-2"><?= substr($pg->description,0,60) ?> <span id='dots<?= $i ?>'>...</span><span id='more<?= $i ?>'><?= substr($pg->description,60) ?></span> <a class="text-primary" style="cursor:pointer" onclick="myFunction('<?= $i ?>')" id='myBtn<?= $i ?>'>more</a></p>

                                        <?php $i++ ?>
                                    <?php else: ?>
                                         <p class="card-text mt-2"><?= $pg->description ?></p>
                                    <?php endif; ?>
                                    <div class="float-left" style="font-size:small;">
                                        <?php foreach ($facilities as $facility)
                                        {
                                            if($facility->pg_id==$pg->id)
                                            {
                                                if($facility->furnishing==1)
                                                    echo '<span style="background-color: #F0F3E5" class="rounded p-1">FURNISHED</span>';
                                                elseif($facility->furnishing==2)
                                                    echo '<span style="background-color: #F0F3E5" class="rounded p-1">SEMIFURNISHED</span>';
                                            }
                                        }
                                        ?>
                                        <?php 
                                                if($pg->sharing==1){ 
                                                    echo '<span style="background-color: #F0F3E5" class="rounded p-1">PRIVATE ROOM</span>';
                                                }
                                                else{
                                                    echo '<span style="background-color: #F0F3E5" class="rounded p-1">SHARED BY '.$pg->sharing.'</span>';
                                                }
                                        ?>
                                        
                                        
                                    </div>
                                    <br>
                                    <div class="float-right">
                                        <?= $this->Html->link(__('View'), ['controller'=>'pgs','action' => 'view',$pg->id]) ?>
                                    </div>
                                </div>
                            </div>        
                        </div>
                        <hr>
                        <div class="row no-gutters align-items-center">
                            <div class="col">
                                <h6 style="font-size:small;" class="float-left mt-2">Posted on <?= date_format($pg->created,"dS M, Y") ?> by owner</h6>
                                <div class="float-right">
                                    <!-- Button trigger modal -->
                                    <?= $this->Form->button(__('View Phone Number'), ['type'=>'button','class'=>'btn btn-outline-light text-primary btn-rounded mr-2','data-toggle'=>'modal','data-target'=>".bd-example-modal-lg$pg->id"]) ?>
                                    <?= $this->Form->button(__('Contact Owner'), ['type'=>'button','class'=>'btn btn-primary btn-rounded','data-toggle'=>'modal','data-target'=>".bd-example-modal-lg$pg->id"]) ?>
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
                                                <?php foreach ($users as $user) {
                                                        if($user->id==$pg->user_id){
                                                            echo '<p>POSTED BY OWNER:</p>';
                                                            if(isset($_SESSION['user'])){
                                                                echo '<p>'.$user->email.' | '.$user->phone.'</p>';
                                                            }
                                                            else{
                                                                echo '<p>+91 88***635** | *****@*****.com</p>';
                                                            }
                                                            echo '<p>'.$user->firstname." ".$user->lastname.'</p>';
                                                        }
                                                        }
                                                 ?>
                                                </div>
                                                <div class="col">
                                                    <p>POSTED ON <?= strtoupper(date_format($pg->created,"dS M, Y")) ?>:</p>
                                                    <?php foreach($pricings as $pricing){
                                                        if($pricing->pg_id==$pg->id)
                                                            echo '<p class="card-text float-left">&#8377; '.$pricing->rent.'</p>';  
                                                    } ?>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php elseif(isset($error)): ?>
    <div class="text-md-center">
        <p class="text-danger "><?= $error ?></p>
        <?= $this->Html->link(__('Explore Now'), ['controller' => 'users','action'=>'home'],['class'=>'btn btn-info']) ?>
    </div>
<?php endif; ?>

<script>
function myFunction(num) {
    var i=num;
  var dots = document.getElementById("dots"+i);
  var moreText = document.getElementById("more"+i);
  var btnText = document.getElementById("myBtn"+i);

  if (dots.style.display === "none") {
    dots.style.display = "inline";
    btnText.innerHTML = "more"; 
    moreText.style.display = "none";
  } else {
    dots.style.display = "none";
    btnText.innerHTML = "less"; 
    moreText.style.display = "inline";
  }
}
</script>


<script>
         function shortlist(pgid){
            var user_id="<?php echo $user_id; ?>";
            var pg_id=pgid;
            var dataString='user_id='+user_id+'&pg_id='+pg_id;
            if($('#shortlist'+pgid).hasClass('fa-star-o'))
            {
                $.ajax({
                    method: 'get',
                    url : "<?php echo $this->Url->build( [ 'controller' => 'Shortlists', 'action' => 'Add' ] ); ?>",
                    data:dataString,
                    success: function( response )
                    {       
                        $( '#result'+pgid ).html(response);
                        $('#shortlist'+pgid).removeClass('fa-star-o');
                        $('#shortlist'+pgid).addClass('fa-star');
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
                        $( '#result'+pgid ).html(response);
                        $('#shortlist'+pgid).removeClass('fa-star');
                        $('#shortlist'+pgid).addClass('fa-star-o');
                    }
                });
            }
        }
</script>


