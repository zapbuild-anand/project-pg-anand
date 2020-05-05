<div class="container-fluid">
	<div class="mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>
	<div class="row">
		<div class="col-xl-3 col-md-6 mb-4" style="cursor: pointer;" onclick="window.location=('admin/users')">
			<div class="card border-left-primary shadow h-100 py-2">
				<div class="card-body">
				  	<div class="row no-gutters align-items-center">
				  		<div class="col mr-2">
					    	<h5 class="card-title">Total PG Owner</h5>
					    	<p class="card-text"><?= $owners ?> </p>
					    </div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl-3 col-md-6 mb-4" style="cursor: pointer;" onclick="window.location=('admin/pgs')">
			<div class="card border-left-primary shadow h-100 py-2">
				<div class="card-body">
				  	<div class="row no-gutters align-items-center">
				  		<div class="col mr-2">
					    	<h5 class="card-title">Total PG</h5>
					    	<p class="card-text"><?= $pgs ?> </p>
					    </div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl-3 col-md-6 mb-4" style="cursor: pointer;" onclick="window.location=('admin/categories/edit-city')">
			<div class="card border-left-primary shadow h-100 py-2">
				<div class="card-body">
				  	<div class="row no-gutters align-items-center">
				  		<div class="col mr-2">
					    	<h5 class="card-title">Total Cities</h5>
					    	<p class="card-text"><?= $cities ?> </p>
					    </div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl-3 col-md-6 mb-4" style="cursor: pointer;" onclick="window.location=('admin/categories/edit-state')">
			<div class="card border-left-primary shadow h-100 py-2">
				<div class="card-body">
				  	<div class="row no-gutters align-items-center">
				  		<div class="col mr-2">
					    	<h5 class="card-title">Total State</h5>
					    	<p class="card-text"><?= $states ?> </p>
					    </div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xl-3 col-md-6 mb-4" style="cursor: pointer;" onclick="window.location=('admin/admins/approve')">
			<div class="card border-left-primary shadow h-100 py-2">
				<div class="card-body">
				  	<div class="row no-gutters align-items-center">
				  		<div class="col mr-2">
					    	<h5 class="card-title">New PG for Approval</h5>
					    	<p class="card-text"><?= $unvpgs ?> </p>
					    </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>