<div class="container-fluid">
    <div class="row justify-content-md-end">
        <div>
            <?= $this->Html->link(__('Guest Zone'), ['controller'=>'users','action' => 'home'], ['class' => 'side-nav-item']) ?>
        </div>
    </div> 

    <div class="mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4" style="cursor: pointer;" onclick="window.location=('/pgs')">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <h5 class="card-title">Total Listed PG</h5>
                            <p class="card-text"><?= $pgs ?> </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4" style="cursor: pointer;" onclick="window.location=('/hosts/list-pg')">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <h5 class="card-title">Total Bookings</h5>
                            <p class="card-text"><?= $pgs ?> </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <h5 class="card-title">New Bookings</h5>
                            <p class="card-text"><?= $pgs ?> </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <h5 class="card-title">Confirmed Booking</h5>
                            <p class="card-text"><?= $pgs ?> </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <h5 class="card-title">Canceled Booking</h5>
                            <p class="card-text"><?= $pgs ?> </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
