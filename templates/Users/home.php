
<div class="row">
	<div class="col-4 p-4">
	<h2>It's Easy</h2>
    <?= $this->Form->create(null,['class'=>'form-inline my-2 my-lg-0','action'=>'search','type'=>'get']) ?>
        <fieldset>
            <?php echo $this->Form->control('search',['list'=>'data-list','type'=>'search','label'=>'','class'=>'form-control mr-sm-2','placeholder'=>'Enter area, city','autocomplete'=>'off']) ?>
            <datalist id="data-list">
                <div class="result"></div>
            </datalist>
            
        </fieldset>
        <?= $this->Form->button(__('Submit'),['class'=>'btn btn-outline-success my-2 my-sm-0' ,'type'=>'submit']) ?>
    <?= $this->Form->end() ?>
	</div>
	<div class="col-8 p-4 text-lg-right">
		<?= $this->Html->link(__('Host Zone'), ['controller'=>'hosts','action' => 'index'], ['class' => 'side-nav-item']) ?>
	</div>
</div>

<!-- <div id="demo" class="carousel slide carousel-fade" data-ride="carousel">
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <?= $this->Html->image('home9.jpg', ['width'=>'1100','height'=>'600','class'=>'d-block w-100','alt' => 'Second slide']) ?>
      <div class="carousel-caption">
        <h3>Los Angeles</h3>
        <p>We had such a great time in LA!</p>
      </div>   
    </div>
    <div class="carousel-item">
      <?= $this->Html->image('home10.jpg', ['width'=>'1100','height'=>'600','class'=>'d-block w-100','alt' => 'Second slide']) ?>
      <div class="carousel-caption">
        <h3>Chicago</h3>
        <p>Thank you, Chicago!</p>
      </div>   
    </div>
    <div class="carousel-item">
      <?= $this->Html->image('home11.jpg', ['width'=>'1100','height'=>'600','class'=>'d-block w-100','alt' => 'Second slide']) ?>
      <div class="carousel-caption">
        <h3>New York</h3>
        <p>We love the Big Apple!</p>
      </div>   
    </div>
  </div>
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>
 -->

<div class="container">
  <div class="row justify-content-md-center">
  	<div class="col-auto">
  		<h1>Why PG?</h1>
  	</div>
  </div>
  <div class="row">
      <div class="col">
          <h3>Hello</h3>
      </div>
      <div class="col">
          <div class="row">
            <h3>Choose from over XXXXXX properties</h3>
            <p>Now choose from XXXXX+ properties and pay rent online in just one click. </p>
          </div>
          <div class="row">
            <h3>Easier on the Pocket</h3>
            <p>No commuting to multiple locations, no brokerage fee, no hidden costs because you deserve the best. </p>
          </div>
          <div class="row">
            <h3>Safety & Security</h3>
            <p>With round the clock security guards present, our properties are a safe haven for all our residents. </p>
          </div>
      </div>    
  </div>
</div>
<!-- <div class="row">
	<div class="col-6">
		<?= $this->Html->image('iamge.jpg', ['alt' => 'Image Preview','id'=>'imag','width'=>'600px','height'=>'400px']) ?>
	</div>
	<div class="col-6">
		<h1></h1>
	</div>
</div> -->




<script>
    $(document).ready(function(){
         $('#search').keyup(function(){
            var searchKey='';
            if ($.trim($('#search').val()).length >=2) {
                var searchkey = $(this).val();
                searchPlace(searchkey);
            }
            else{
                $('.result').html('');
            }    
         });

        function searchPlace( keyword ){
        var data = keyword;
        $.ajax({
                method: 'get',
                url : "<?php echo $this->Url->build( [ 'controller' => 'Users', 'action' => 'Search' ] ); ?>",
                data: {keyword:data},
                success: function( response )
                {       
                    $( '.result' ).html(response);
                }
            });
        };
    });
</script>
