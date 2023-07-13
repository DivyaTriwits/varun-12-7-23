    <script>
            $(document).ready(function()
            {
                setTimeout(function(){
                    $('.alert').hide();
                },5000);

            });
        </script>

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


		<!-- Row -->
		<div class="row mt-5">
			<div class="col-10">
				<div class="card">
					<div class="card-body">
						<form id="searchForm"action="<?php echo base_url('support-student-details');?>">
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<h6>Enter student's mobile no. or e-mail Id<span class="text-danger">*</span></h6>
										<div class="controls">
											<input type="text" required name="search" value="<?php echo $this->input->get('search')?>" id="search" class="form-control">
										</div>
									</div>
								</div>

								<div class="form-actions">
									<div class="card-body">
										<button style="background-color: #ff7f45; border-color: #ff7f45" type="submit" class="btn btn-md btn-primary">Search</button>
									</div>
								</div>


							</div>
						<!-- 	<div class="row">
								<div class="col-3">
									<button style="background-color: #ff7f45; border-color: #ff7f45" type="submit" class="btn btn-md btn-primary">Search</button>
								</div>
							</div> -->
						</form>
							<?php if($this->session->flashdata('no-data-found')){?>		
								<div class="alert alert-danger"><?php echo $this->session->flashdata('no-data-found');?></div> 
							<?php }?>
						
					</div>
				</div>
			</div>
			<div class="col-2">
				<div class="card">
					<div class="card-body">
					    <div class="row">
								<div class="col-md-12">
					        <h6>Active Users</h6>
					        <h2><?php echo $activeUsersCount;?></h2>
					        </div>
					    </div>
					</div>
				</div>
			</div>
		</div>
		<div class="row text-center">
			<?php if($this->session->userdata('role')!='' && $this->session->userdata('role')=="Admin"){?>
			<div class="col-lg-4 col-md-6">
				<a href="<?php echo base_url('new_regsitration')?>">
					<div class="card plan-card">
						<div class="card-block">
							<div class="p-3">
								<h1 class="pt-2"><i class="fe fe-users plan-icon bg-secondary"></i></h1>
								<h6 class="text-uppercase font-weight-semibold text-secondary">Support & Sale Team</h6>
							</div>
							
						</div>
					</div>
				</a>

			</div>
			<?php }?>
			<div class="col-lg-4 col-md-6">
				<a href="<?php echo base_url('webinar')?>">
					<div class="card plan-card">
						<div class="card-block">
							<div class="p-3">
								<h1 class="pt-2"><i class="ti-video-camera plan-icon bg-secondary"></i></h1>
								<h6 class="text-uppercase font-weight-semibold text-secondary">Webinar</h6>
							</div>
										<!-- <div>
											<h1 class="plan-price padding-b-15 display-4 mb-0 tx-60 font-weight-semibold">$39 <span class="text-muted m-l-10"><sup>Per Month</sup></span></h1>
											<div class="plan-div-border"></div>
										</div>
										<div class="plan-features pb-4 mt-4 text-muted padding-t-b-30">
											<p><strong>10 </strong> FreeDomain Name</p>
											<p><strong>10</strong> One-Click Apps</p>
											<p><strong>8</strong>  Databases</p>
											<p><strong>Money</strong> BackGuarntee</p>
											<p><strong>24/7</strong> Support</p>
											<a href="#" class="btn btn-secondary mt-4">Sign Up Now</a>
										</div>
									</div> -->
								</div>
							</div>
						</a>

					</div>
					<div class="col-lg-4 col-md-6">
						<a href="<?php echo base_url('failed-registrations')?>">
							<div class="card plan-card">
								<div class="card-block">
									<div class="p-3">
										<h1 class="pt-2"><i class="zmdi zmdi-close-circle plan-icon bg-secondary"></i></h1>
										<h6 class="text-uppercase font-weight-semibold text-secondary">Failed Registration</h6>
									</div>
										<!-- <div>
											<h1 class="plan-price padding-b-15 display-4 mb-0 tx-60 font-weight-semibold">$39 <span class="text-muted m-l-10"><sup>Per Month</sup></span></h1>
											<div class="plan-div-border"></div>
										</div>
										<div class="plan-features pb-4 mt-4 text-muted padding-t-b-30">
											<p><strong>10 </strong> FreeDomain Name</p>
											<p><strong>10</strong> One-Click Apps</p>
											<p><strong>8</strong>  Databases</p>
											<p><strong>Money</strong> BackGuarntee</p>
											<p><strong>24/7</strong> Support</p>
											<a href="#" class="btn btn-secondary mt-4">Sign Up Now</a>
										</div>
									</div> -->
								</div>
							</div>
						</a>
					</div>
					<div class="col-lg-4 col-md-6">
						<a href="<?php echo base_url('registered-students')?>">
							<div class="card plan-card">
								<div class="card-block">
									<div class="p-3">
										<h1 class="pt-2"><i class="fa fa-group plan-icon bg-secondary"></i></h1>
										<h6 class="text-uppercase font-weight-semibold text-secondary">Registered Students</h6>
									</div>
										<!-- <div>
											<h1 class="plan-price padding-b-15 display-4 mb-0 tx-60 font-weight-semibold">$39 <span class="text-muted m-l-10"><sup>Per Month</sup></span></h1>
											<div class="plan-div-border"></div>
										</div>
										<div class="plan-features pb-4 mt-4 text-muted padding-t-b-30">
											<p><strong>10 </strong> FreeDomain Name</p>
											<p><strong>10</strong> One-Click Apps</p>
											<p><strong>8</strong>  Databases</p>
											<p><strong>Money</strong> BackGuarntee</p>
											<p><strong>24/7</strong> Support</p>
											<a href="#" class="btn btn-secondary mt-4">Sign Up Now</a>
										</div>
									</div> -->
								</div>
							</div>
						</a>
					</div>
						<div class="col-lg-4 col-md-6">
						<a href="<?php echo base_url('state-wise-registered-students')?>">
							<div class="card plan-card">
								<div class="card-block">
									<div class="p-3">
										<h1 class="pt-2"><i class="fa fa-group plan-icon bg-secondary"></i></h1>
										<h6 class="text-uppercase font-weight-semibold text-secondary">State Wise Registered Students Count</h6>
									</div>
										<!-- <div>
											<h1 class="plan-price padding-b-15 display-4 mb-0 tx-60 font-weight-semibold">$39 <span class="text-muted m-l-10"><sup>Per Month</sup></span></h1>
											<div class="plan-div-border"></div>
										</div>
										<div class="plan-features pb-4 mt-4 text-muted padding-t-b-30">
											<p><strong>10 </strong> FreeDomain Name</p>
											<p><strong>10</strong> One-Click Apps</p>
											<p><strong>8</strong>  Databases</p>
											<p><strong>Money</strong> BackGuarntee</p>
											<p><strong>24/7</strong> Support</p>
											<a href="#" class="btn btn-secondary mt-4">Sign Up Now</a>
										</div>
									</div> -->
								</div>
							</div>
						</a>
					</div>
							<div class="col-lg-4 col-md-6">
						<a href="<?php echo base_url('promotional-registered-students')?>">
							<div class="card plan-card">
								<div class="card-block">
									<div class="p-3">
										<h1 class="pt-2"><i class="fa fa-group plan-icon bg-secondary"></i></h1>
										<h6 class="text-uppercase font-weight-semibold text-secondary">Promotional Registered Students</h6>
									</div>
										<!-- <div>
											<h1 class="plan-price padding-b-15 display-4 mb-0 tx-60 font-weight-semibold">$39 <span class="text-muted m-l-10"><sup>Per Month</sup></span></h1>
											<div class="plan-div-border"></div>
										</div>
										<div class="plan-features pb-4 mt-4 text-muted padding-t-b-30">
											<p><strong>10 </strong> FreeDomain Name</p>
											<p><strong>10</strong> One-Click Apps</p>
											<p><strong>8</strong>  Databases</p>
											<p><strong>Money</strong> BackGuarntee</p>
											<p><strong>24/7</strong> Support</p>
											<a href="#" class="btn btn-secondary mt-4">Sign Up Now</a>
										</div>
									</div> -->
								</div>
							</div>
						</a>
					</div>
					<div class="col-lg-4 col-md-6">
						<a href="<?php echo base_url('scholarship')?>">
							<div class="card plan-card">
								<div class="card-block">
									<div class="p-3">
										<h1 class="pt-2"><i class="fa fa-graduation-cap plan-icon bg-secondary"></i></h1>
										<h6 class="text-uppercase font-weight-semibold text-secondary">Scholarship</h6>
									</div>
								</div>
							</div>
						</a>

					</div>
					

					<div class="col-lg-4 col-md-6">
						<a href="<?php echo base_url('scholarship-notifications')?>">
						
						<div class="card plan-card">
							<div class="card-block">
								<div class="p-3">
									<h1 class="pt-2"><i class="fa fa-bell plan-icon bg-secondary"></i></h1>
									<h6 class="text-uppercase font-weight-semibold text-secondary">Students Who Not Got Scholarship</h6>
								</div>
									
								</div>
							</div>
							</a>
						</div>

						<div class="col-lg-4 col-md-6">
							<a href="<?php echo base_url('subscription-expired-list')?>">
								<div class="card plan-card">
									<div class="card-block">
										<div class="p-3">
											<h1 class="pt-2"><i class="ti-alert plan-icon bg-secondary"></i></h1>
											<h6 class="text-uppercase font-weight-semibold text-secondary">Subscription Expired List</h6>
										</div>
										
									</div>
								</div>
							</a>
						</div>


						<div class="col-lg-4 col-md-6">
							<a href="<?php echo base_url()?>other-details">
								<div class="card plan-card">
									<div class="card-block">
										<div class="p-3">
											<h1 class="pt-2"><i class="mdi mdi-apps plan-icon bg-secondary"></i></h1>
											<h6 class="text-uppercase font-weight-semibold text-secondary">Others</h6>
										</div>
										
									</div>
								</div>
							</a>
						</div>
						<div class="col-lg-4 col-md-6">
							<a href="<?php echo base_url()?>candidate-feedback">
								<div class="card plan-card">
									<div class="card-block">
										<div class="p-3">
											<h1 class="pt-2"><i class="ion-clipboard plan-icon bg-secondary"></i></h1>
											<h6 class="text-uppercase font-weight-semibold text-secondary">Candidate Feedback</h6>
										</div>
										<!-- <div>
											<h1 class="plan-price padding-b-15 display-4 mb-0 tx-60 font-weight-semibold">$39 <span class="text-muted m-l-10"><sup>Per Month</sup></span></h1>
											<div class="plan-div-border"></div>
										</div>
										<div class="plan-features pb-4 mt-4 text-muted padding-t-b-30">
											<p><strong>10 </strong> FreeDomain Name</p>
											<p><strong>10</strong> One-Click Apps</p>
											<p><strong>8</strong>  Databases</p>
											<p><strong>Money</strong> BackGuarntee</p>
											<p><strong>24/7</strong> Support</p>
											<a href="#" class="btn btn-secondary mt-4">Sign Up Now</a>
										</div>
									</div> -->
								</div>
							</div>
						</a>
					</div>
					<!-- End Row -->

					<div class="col-lg-4 col-md-6">
						<a href="<?php echo base_url()?>requested-callback-list">
							<div class="card plan-card">
								<div class="card-block">
									<div class="p-3">
										<h1 class="pt-2"><i class="fe fe-phone-call plan-icon bg-secondary"></i></h1>
										<h6 class="text-uppercase font-weight-semibold text-secondary">Requested Call Back List</h6>
									</div>
										<!-- <div>
											<h1 class="plan-price padding-b-15 display-4 mb-0 tx-60 font-weight-semibold">$39 <span class="text-muted m-l-10"><sup>Per Month</sup></span></h1>
											<div class="plan-div-border"></div>
										</div>
										<div class="plan-features pb-4 mt-4 text-muted padding-t-b-30">
											<p><strong>10 </strong> FreeDomain Name</p>
											<p><strong>10</strong> One-Click Apps</p>
											<p><strong>8</strong>  Databases</p>
											<p><strong>Money</strong> BackGuarntee</p>
											<p><strong>24/7</strong> Support</p>
											<a href="#" class="btn btn-secondary mt-4">Sign Up Now</a>
										</div>
									</div> -->
								</div>
							</div>
						</a>
					</div>
					<div class="col-lg-4 col-md-6">
						<a href="<?php echo base_url()?>push-alert-notifications">
							<div class="card plan-card">
								<div class="card-block">
									<div class="p-3">
										<h1 class="pt-2"><i class="fa fa-bell plan-icon bg-secondary"></i></h1>
										<h6 class="text-uppercase font-weight-semibold text-secondary">Push Alert Notifications</h6>
									</div>
										<!-- <div>
											<h1 class="plan-price padding-b-15 display-4 mb-0 tx-60 font-weight-semibold">$39 <span class="text-muted m-l-10"><sup>Per Month</sup></span></h1>
											<div class="plan-div-border"></div>
										</div>
										<div class="plan-features pb-4 mt-4 text-muted padding-t-b-30">
											<p><strong>10 </strong> FreeDomain Name</p>
											<p><strong>10</strong> One-Click Apps</p>
											<p><strong>8</strong>  Databases</p>
											<p><strong>Money</strong> BackGuarntee</p>
											<p><strong>24/7</strong> Support</p>
											<a href="#" class="btn btn-secondary mt-4">Sign Up Now</a>
										</div>
									</div> -->
								</div>
							</div>
						</a>
					</div>
                    <div class="col-lg-4 col-md-6">
				<a href="<?php echo base_url()?>redeem-request">
					<div class="card plan-card">
						<div class="card-block">
							<div class="p-3">
								<h1 class="pt-2"><i class="ion-ribbon-b plan-icon bg-secondary"></i></h1>
								<h6 class="text-uppercase font-weight-semibold text-secondary">Redeem Requests</h6>
							</div>

						</div>
					</div>
				</a>
			</div>	
				<div class="col-lg-4 col-md-6">
				<a href="<?php echo base_url()?>renewal-logs">
					<div class="card plan-card">
						<div class="card-block">
							<div class="p-3">
								<h1 class="pt-2"><i class="fe fe-users plan-icon bg-secondary"></i></h1>
								<h6 class="text-uppercase font-weight-semibold text-secondary">Renewal logs</h6>
							</div>

						</div>
					</div>
				</a>
			</div>			
                		<div class="col-lg-4 col-md-6">
						<a href="<?php echo base_url()?>upload-student-data-for-certificate">
							<div class="card plan-card">
								<div class="card-block">
									<div class="p-3">
										<h1 class="pt-2"><i class="mdi mdi-briefcase-upload plan-icon bg-secondary"></i></h1>
										<h6 class="text-uppercase font-weight-semibold text-secondary">Upload Webinar Student Data</h6>
									</div>
										<!-- <div>
											<h1 class="plan-price padding-b-15 display-4 mb-0 tx-60 font-weight-semibold">$39 <span class="text-muted m-l-10"><sup>Per Month</sup></span></h1>
											<div class="plan-div-border"></div>
										</div>
										<div class="plan-features pb-4 mt-4 text-muted padding-t-b-30">
											<p><strong>10 </strong> FreeDomain Name</p>
											<p><strong>10</strong> One-Click Apps</p>
											<p><strong>8</strong>  Databases</p>
											<p><strong>Money</strong> BackGuarntee</p>
											<p><strong>24/7</strong> Support</p>
											<a href="#" class="btn btn-secondary mt-4">Sign Up Now</a>
										</div>
									</div> -->
								</div>
							</div>
						</a>
					</div>
					<div class="col-lg-4 col-md-6">
						<a href="<?php echo base_url()?>youtube-link">
							<div class="card plan-card">
								<div class="card-block">
									<div class="p-3">
										<h1 class="pt-2"><i class="mdi mdi-briefcase-upload plan-icon bg-secondary"></i></h1>
										<h6 class="text-uppercase font-weight-semibold text-secondary">You Tube</h6>
									</div>
										<!-- <div>
											<h1 class="plan-price padding-b-15 display-4 mb-0 tx-60 font-weight-semibold">$39 <span class="text-muted m-l-10"><sup>Per Month</sup></span></h1>
											<div class="plan-div-border"></div>
										</div>
										<div class="plan-features pb-4 mt-4 text-muted padding-t-b-30">
											<p><strong>10 </strong> FreeDomain Name</p>
											<p><strong>10</strong> One-Click Apps</p>
											<p><strong>8</strong>  Databases</p>
											<p><strong>Money</strong> BackGuarntee</p>
											<p><strong>24/7</strong> Support</p>
											<a href="#" class="btn btn-secondary mt-4">Sign Up Now</a>
										</div>
									</div> -->
								</div>
							</div>
						</a>
					</div>
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

<script>
$(document).ready(function() {

    $('#searchForm').bootstrapValidator({
        message: 'This value is not valid',
        feedbackIcons: {
            // valid: 'glyphicon glyphicon-ok',
            // invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            search: {
        
                validators: {
                    notEmpty: {
                        message: 'The mobile number or e-mail id is required'
                    },
                 
                   
                }
            }
     


        }
    }) .on('success.form.bv', function(e) {
        $(this)[0].submit();
    });
});
</script>