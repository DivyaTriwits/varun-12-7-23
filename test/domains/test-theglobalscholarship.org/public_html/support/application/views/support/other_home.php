

<!-- Main Content-->
<div class="main-content pt-5 mt-5">
	<div class="container-fluid">

<!-- 		<div class="text-wrap">
			<div class="example">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb breadcrumb-style1 mg-b-0">

						
						<li class="breadcrumb-item">
							<a href="<?php echo base_url()?>">Support</a></li>
							<li class="breadcrumb-item active">Home</li>
						</ol>
					</ol>
				</nav>
			</div>
		</div> -->



		<div class="row text-center">
			
			<div class="col-lg-4 col-md-6">
				<a href="<?php echo base_url()?>religion">
					<div class="card plan-card">
						<div class="card-block">
							<div class="p-3">
								<h1 class="pt-2"><i class="ti-world plan-icon bg-secondary"></i></h1>
								<h6 class="text-uppercase font-weight-semibold text-secondary">Religion</h6>
							</div>
							
						</div>
					</div>
				</a>

			</div>
			<div class="col-lg-4 col-md-6">
				<a href="<?php echo base_url()?>category-form">
					<div class="card plan-card">
						<div class="card-block">
							<div class="p-3">
								<h1 class="pt-2"><i class="fe fe-package plan-icon bg-secondary"></i></h1>
								<h6 class="text-uppercase font-weight-semibold text-secondary">Category</h6>
							</div>
						</div>
					</div>
				</a>

			</div>
			<div class="col-lg-4 col-md-6">
				<a href="<?php echo base_url()?>qualification">
					<div class="card plan-card">
						<div class="card-block">
							<div class="p-3">
								<h1 class="pt-2"><i class="fa fa-graduation-cap plan-icon bg-secondary"></i></h1>
								<h6 class="text-uppercase font-weight-semibold text-secondary">Qualification</h6>
							</div>

						</div>
					</div>
				</a>

			</div>
			<div class="col-lg-4 col-md-6">
				<a href="<?php echo base_url()?>course">
					<div class="card plan-card">
						<div class="card-block">
							<div class="p-3">
								<h1 class="pt-2"><i class="fa fa-graduation-cap plan-icon bg-secondary"></i></h1>
								<h6 class="text-uppercase font-weight-semibold text-secondary">Courses</h6>
							</div>

						</div>
					</div>
				</a>
			</div>
			<div class="col-lg-4 col-md-6">
				<a href="<?php echo base_url()?>disability">
					<div class="card plan-card">
						<div class="card-block">
							<div class="p-3">
								<h1 class="pt-2"><i class="fa fa-blind plan-icon bg-secondary"></i></h1>
								<h6 class="text-uppercase font-weight-semibold text-secondary">Disability</h6>
							</div>

						</div>
					</div>
				</a>
			</div>

			<div class="col-lg-4 col-md-6">
				<a href="<?php echo base_url()?>activity-type">
					<div class="card plan-card">
						<div class="card-block">
							<div class="p-3">
								<h1 class="pt-2"><i class="fa fa-child plan-icon bg-secondary"></i></h1>
								<h6 class="text-uppercase font-weight-semibold text-secondary">Activity Type</h6>
							</div>

						</div>
					</div>
				</a>
			</div>


			<div class="col-lg-4 col-md-6">
				<a href="<?php echo base_url()?>activity-name">
					<div class="card plan-card">
						<div class="card-block">
							<div class="p-3">
								<h1 class="pt-2"><i class="fa fa-child plan-icon bg-secondary"></i></h1>
								<h6 class="text-uppercase font-weight-semibold text-secondary">Activity Names</h6>
							</div>

						</div>
					</div>
				</a>
			</div>
			<div class="col-lg-4 col-md-6">
				<a href="<?php echo base_url()?>Support_controller/exportStudentsList">
					<div class="card plan-card">
						<div class="card-block">
							<div class="p-3">
								<h1 class="pt-2"><i class="fa fa-download plan-icon bg-secondary"></i></h1>
								<h6 class="text-uppercase font-weight-semibold text-secondary">Export All Failed List</h6>
							</div>

						</div>
					</div>
				</a>
			</div>
			
			<div class="col-lg-4 col-md-6">
				<a href="<?php echo base_url()?>Support_controller/exportStudentsRegisteredList">
					<div class="card plan-card">
						<div class="card-block">
							<div class="p-3">
								<h1 class="pt-2"><i class="fa fa-download plan-icon bg-secondary"></i></h1>
								<h6 class="text-uppercase font-weight-semibold text-secondary">Export All Registered Students</h6>
							</div>

						</div>
					</div>
				</a>
			</div>
			
			<div class="col-lg-4 col-md-6">
				<a href="<?php echo base_url()?>Support_controller/exportStudentsRegisteredList?filter=active">
					<div class="card plan-card">
						<div class="card-block">
							<div class="p-3">
								<h1 class="pt-2"><i class="fa fa-download plan-icon bg-secondary"></i></h1>
								<h6 class="text-uppercase font-weight-semibold text-secondary">Export All Active Students</h6>
							</div>

						</div>
					</div>
				</a>
			</div>
			<!-- End Row -->
		</div>
					
	</div>
</div>
<!-- End Main Content-->

<?php if($this->session->flashdata('login-success')){?>		
	<Script>
		swal({
			title: 'Well done!',
			text: 'Login success!',
			type: 'success',
			timer: 3000,
			showConfirmButton: false
		});
	</Script>
	<?php }?>