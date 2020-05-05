<?php
$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>
  	
    <?= $this->Html->css('bootstrap.min.css') ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" />
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    <!-- jQuery UI library -->
	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
   
	<style type="text/css">
  		.box{
  			width: 800px;
  			margin: 0 auto;
  		}
  		.active_tab1{
  			background-color: #fff;
  			color: #333;
  			font-weight: 600;
  		}
  		.inactive_tab1{
  			background-color: #f5f5f5;
  			color: #333;
  			cursor : not-allowed;
  		}
  		.has-error{
  			border-color: #cc0000;
  			background-color: #ffff99;
  		}
  	</style>

</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
	    <a class="navbar-brand" href="/"><span class="font-weight-bold ">PG</span></a>
	    <ul class="navbar-nav mr-auto">
	  	</ul>

	  	<ul class="navbar-nav">
	  		<li class="nav-item">
	  			<?= $this->Html->link(__('List PG for Free'), ['controller'=>'pgs','action' => 'add'], ['class'=>'btn btn-outline-success btn-rounded mr-4']) ?>
	  		</li>
		     <li>
		     	<div class="nav-item dropdown pmd-dropdown pmd-user-info ml-auto">
			        <a href="javascript:void(0);" class="btn-user dropdown-toggle media align-items-center" data-toggle="dropdown" data-sidebar="true" aria-expanded="false">
			        	<?php $session = $this->getRequest()->getSession();
			        	if(!empty($session->read('Auth.image'))){
        					$image=$session->read('Auth.image'); 
        					$name=$session->read('Auth.firstname'); ?>
		         		<?= $this->Html->image($image, ['class'=>'mr-2','style'=>'border-radius: 50%;','alt' => 'CakePHP','width'=>'40','height'=>'40']); ?>
			            <div class="media-body">
			                <?= $name ?>
			            </div>
			            <?php } else{ ?>
			            	<?= $this->Html->image('avtar.png', ['class'=>'mr-2','style'=>'border-radius: 50%;','alt' => 'CakePHP','width'=>'40','height'=>'40']); ?>
				            <div class="media-body">
				                Guest
				            </div>
			        	<?php } ?>

			        </a>
			        <ul class="dropdown-menu dropdown-menu-right" role="menu">
			        	<?php $session = $this->getRequest()->getSession();
        					$user_id= $session->read('Auth.id');
        					$user_type=$session->read('Auth.type');
         				?>
			            <?php if(!isset($user_id)): ?>
				        <?= $this->Html->link(__('Login'), ['controller'=>'users','action' => 'login'], ['class' => 'dropdown-item']) ?>
				        <?= $this->Html->link(__('Register'), ['controller'=>'users','action' => 'add'], ['class' => 'dropdown-item']) ?>
				    <?php else: ?>
		        	<?= $this->Html->link(__('Shortlists'), ['controller'=>'users','action' => 'dashboard'], ['class' => 'dropdown-item']) ?>
		        	<?= $this->Html->link(__('Profile'), ['controller'=>'users','action' => 'profile'], ['class' => 'dropdown-item']) ?>
		        	<?php if($user_type==2): ?>
		        		<?= $this->Html->link(__('Dashboard'), ['controller'=>'hosts','action' => 'dashboard'], ['class' => 'dropdown-item']) ?>
		        	<?php else: ?>
		        		<?= $this->Html->link(__('Dashboard'), ['controller'=>'Users','action' => 'dashboard'], ['class' => 'dropdown-item']) ?>
		        	<?php endif; ?>
		          	<?= $this->Html->link(__('Logout'), ['controller'=>'users','action' => 'logout'], ['class' => 'dropdown-item btn btn-outline-danger float-right']) ?>
		     		<?php endif; ?>
		     		<?= $this->Html->link(__('About Us'), ['action' => 'about'], ['class' => 'dropdown-item']) ?>
		     		<?= $this->Html->link(__('Contact Us'), ['action' => 'contact'], ['class' => 'dropdown-item']) ?>
			        </ul>
			    </div>
		     </li>
	    </ul>
	  </div>
	</nav>

	

    <main class="main">
        <div class="container-fluid">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
    </main>
    <footer>
    </footer>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<?= $this->Html->script('bootstrap.min.js') ?>

</body>
</html>
