<div class="container-fluid">
    <div class="row">
        <div class="col">
            <h3 class="mt-3 float-left">Booking Requests</h3>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <h3 class="mt-3 float-left">Your PG</h3>
            <?= $this->Html->link(__('Add New'), ['controller'=>'pgs','action' => 'add'], ['class'=>'btn btn-outline-success btn-rounded float-right mt-3']) ?>
        </div>
    </div>
    <div class="row">
        <?php foreach ($pgs as $pg): ?>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <h5 class="card-title">Pg Name</h5>
                                <p class="card-text"><?= $pg->name ?> </p>
                                <?= $this->Html->link(__('View'), ['controller'=>'pgs','action' => 'view',$pg->id], ['class'=>'btn btn-outline-success btn-rounded']) ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>