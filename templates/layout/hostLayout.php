<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Host Panel</title>

    <?= $this->Html->css('bootstrap.min.css') ?>
    <?= $this->Html->css('style.css') ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Fontawsomw library -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" />
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    <!-- jQuery UI library -->
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3><?= $this->Html->link(__('HOST PANEL'), ['controller'=>'hosts','action' => 'dashboard']) ?></h3>
                <strong><?= $this->Html->link(__('HP'), ['controller'=>'hosts','action' => 'dashboard']) ?></strong>
            </div>
            <ul class="list-unstyled components">
                <li class="active">
                    <?= $this->Html->link(__('Dashboard'), ['controller'=>'hosts','action' => 'dashboard']) ?>
                </li>
                <li>
                    <a href="#pageSubmenu1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">My PG</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu1">
                        <li>
                            <?= $this->Html->link(__('List New PG'), ['controller'=>'pgs','action' => 'add']) ?>
                        </li>
                        <li>
                            <?= $this->Html->link(__('Manage PGs'), ['controller'=>'pgs','action' => 'index']) ?>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#pageSubmenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Booking</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu2">
                        <li>
                            <?= $this->Html->link(__('New Request'), ['controller'=>'requests','action' => 'index']) ?>
                        </li>
                        <li>
                            <?= $this->Html->link(__('Confirmed'), ['controller'=>'requests','action' => 'confirmed']) ?>
                        </li>
                        <li>
                            <?= $this->Html->link(__('Cancelled'), ['controller'=>'requests','action' => 'cancelled']) ?>
                        </li>
                    </ul>
                </li>
            </ul>

        </nav>

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fa fa-align-left"></i>
                        <span>Menu</span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li>
                                <?= $this->Html->link(__('Profile'), ['controller'=>'users','action' => 'profile'], ['class' => ' btn btn-outline-success float-right mr-2']) ?>
                            </li>
                            <li class="nav-item">
                                <?= $this->Html->link(__('Logout'), ['prefix'=>false,'controller'=>'users','action' => 'logout'], ['class' => 'btn btn-outline-danger float-right']) ?>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <main class="main">
                <div class="container-fluid">
                        <?= $this->Flash->render() ?>
                    <?= $this->fetch('content') ?>
                </div>
            </main>
            
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <?= $this->Html->script('bootstrap.min.js') ?>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
</body>

</html>