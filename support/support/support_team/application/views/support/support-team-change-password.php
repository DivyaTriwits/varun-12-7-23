
<!-- Main Content-->
<div class="main-content pt-0">
	<div class="container-fluid">

		<!-- Page Header -->
		<!-- <div class="page-header"> -->
			<div class="text-wrap">
				<div class="example">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb breadcrumb-style1 mg-b-0">

							<li class="breadcrumb-item">
								<a href="<?php echo base_url()?>">Sales</a>
							</li>
							<li class="breadcrumb-item">Profile</li>
						
							</ol>
						</nav>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-12 col-md-12">
						<div class="card">
							<div class="card-body">
								<div>


								</div><br>
								<form  id="scholarshipForm" method="post"  action="<?php echo base_url()?>update-support-team-profile">
									
									<div class="row">
									
										<div class="col-lg-4 form-group">

											<label class="form-label">Old Password</label>
											<input class="form-control" name="fullname" autocomplete="off" placeholder="Your Full Name" 
											value="" type="text">
										</div>
										
										<div class="col-lg-4 form-group">
											<label class="form-label">New Password</label>
											<input class="form-control" name="phone_number" autocomplete="off"  type="text" 

											value="" 


											>
										</div>
										<div class="col-lg-4 form-group">
											<label class="form-label">Confirm Password</label>
											<input class="form-control" name="password" autocomplete="off"  type="text"

											value="" 

											>
										</div>
									
									
								</div>
								<button style="background-color: #ff7f45; border-color: #ff7f45" type="submit" class="btn ripple btn-primary float-right">Change Password</button>
							</form>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<?php if($this->session->flashdata('profile-details-update-success')){?>		
		<Script>
			swal({
				title: 'Profile!',
				text: 'Profile details updated successfully!',
				type: 'success',
				timer: 3000,
        		showConfirmButton: false
			});
		</Script>
	<?php }?>


<?php if($this->session->flashdata('profile-details-update-error')){?>		
	<Script>
		swal({
			title: 'Profile!',
			text: 'Failed to update profile details!',
			type: 'error',
			timer: 3000,
        	showConfirmButton: false
		});
	</Script>
<?php }?>





