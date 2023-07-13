
<!-- Main Content-->
<div class="main-content pt-5 mt-5">
	<div class="container-fluid">

		<!-- Page Header -->
		<!-- <div class="page-header"> -->
			<!-- <div class="text-wrap">
				<div class="example">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb breadcrumb-style1 mg-b-0">

							<li class="breadcrumb-item">
								<a href="<?php echo base_url()?>">Support</a>
							</li>
							<li class="breadcrumb-item">Profile</li>
						
							</ol>
						</nav>
					</div>
				</div> -->

				<div class="row">
					<div class="col-lg-12 col-md-12">
						<div class="card">
							<div class="card-body">
								<div>


								</div><br>
								<form  id="scholarshipForm" method="post"  action="<?php echo base_url()?>update-support-profile">
									
									<div class="row">
									
										<div class="col-lg-4 form-group">

											<label class="form-label">Full Name</label>
											<input class="form-control" name="fullname" autocomplete="off" placeholder="Your Full Name" 
											value="<?php if($profile!=''){echo $profile->name;}?>" type="text">


											<input class="form-control" name="id" autocomplete="off" 
											value="<?php if($profile!=''){echo $profile->support_id;}?>" type="hidden">


										</div>
										
										<div class="col-lg-4 form-group">
											<label class="form-label">Contact No.  </label>
											<input class="form-control" name="phone_number" autocomplete="off"  type="text" 

											value="<?php if($profile!=''){echo $profile->mobile;}?>" 


											>
										</div>
										<div class="col-lg-4 form-group">
											<label class="form-label">Password</label>
											<input class="form-control" name="password" autocomplete="off"  type="text"

											value="<?php if($profile!=''){echo $profile->password;}?>" 

											>
										</div>
										<div class="col-lg-4 form-group">
											<label class="form-label">Email</label>
											<input class="form-control"   type="text" value="<?php if($profile!=''){echo $profile->email;}?>"  readonly>
										</div>
										<div class="col-lg-4 form-group">
											<label class="form-label">Joining Date  </label>
											<input class="form-control" name="joining_date" type="text" value="<?php if($profile!=''){echo $profile->date_of_joining;}?>"  readonly>
										</div>
										<div class="col-lg-4 form-group">
											<label class="form-label">Role  </label>
											<input class="form-control" type="text" value="<?php if($profile!=''){echo $profile->role;}?>" readonly>
										</div>
									
								</div>
								<button style="background-color: #ff7f45; border-color: #ff7f45" type="submit" class="btn ripple btn-primary float-right">Update</button>
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





