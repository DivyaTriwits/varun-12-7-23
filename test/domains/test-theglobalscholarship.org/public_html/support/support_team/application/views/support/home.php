

<!-- Main Content-->
<div class="main-content pt-0">
	<div class="container">

		<div class="text-wrap">
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
		</div>


		<!-- Row -->
		<div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                        <form action="<?php echo base_url('support-student-details');?>">
                                        <div class="row">
                                            <div class="col-md-6">
                                          <div class="form-group">
                                            <h6>Enter student's registered mobile no. or e-mail id<span class="text-danger">*</span></h6>
                                            <div class="controls">
                                                <input type="text" required name="search" value="<?php echo $this->input->get('search')?>" id="search" class="form-control">
                                            </div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-3">
                                                <button style="background-color: #ff7f45; border-color: #ff7f45" type="submit" class="btn btn-md btn-primary">Search</button>
                                            </div>
                                        </div>
                                    </form>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
		<div class="row text-center">
          
		<!-- 	<div class="col-lg-4 col-md-6">
				<a href="<?php echo base_url()?>support-team-profile-page">
					<div class="card plan-card">
						<div class="card-block">
							<div class="p-3">
								<h1 class="pt-2"><i class="fe fe-user plan-icon bg-secondary"></i></h1>
								<h6 class="text-uppercase font-weight-semibold text-secondary">Update Profile</h6>
							</div>
										
								</div>
							</div>
						</a>

					</div> -->
				<!-- 	<div class="col-lg-4 col-md-6">
						<a href="<?php echo base_url('support-team-change-password')?>">
							<div class="card plan-card">
								<div class="card-block">
									<div class="p-3">
										<h1 class="pt-2"><i class="fa fa-graduation-cap plan-icon bg-secondary"></i></h1>
										<h6 class="text-uppercase font-weight-semibold text-secondary">Change Passowrd</h6>
									</div>
									
								</div>
							</div>
						</a>

					</div> -->
					
				

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
					confirmButtonColor: '#57a94f'
				});
			</Script>
			<?php }?>