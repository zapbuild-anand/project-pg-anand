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
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
	    <a class="navbar-brand" href="/">PG</a>
	    <ul class="navbar-nav mr-auto">
	      <li class="nav-item active">
	        <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="#">About Us</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="#">Contact Us</a>
	      </li>
	  	</ul>
	  	<ul class="navbar-nav">
	  		<?php if(!isset($_SESSION['user'])){ ?>
		      <li class="nav-item p-1">
		        <?= $this->Html->link(__('Login'), ['action' => 'login'], ['class' => ' btn btn-outline-success float-right']) ?>
		      </li>
		      <li class="nav-item p-1">
		        <?= $this->Html->link(__('Register'), ['action' => 'add'], ['class' => 'btn btn-outline-success float-right']) ?>
		      </li>
		     <?php }else{ ?>
		      <li class="nav-item p-1">
		        <?= $this->Html->link(__('Profile'), ['action' => 'profile'], ['class' => 'btn btn-outline-success float-right']) ?>
		      </li>
		      <li class="nav-item p-1">
		        <?= $this->Html->link(__('Logout'), ['controller'=>'users','action' => 'logout'], ['class' => 'btn btn-outline-danger float-right']) ?>
		      </li>
		     <?php } ?>
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
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<?= $this->Html->script('bootstrap.min.js') ?>

</body>
</html>
