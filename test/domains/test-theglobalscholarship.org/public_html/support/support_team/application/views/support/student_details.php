
<!-- Main Content-->
<div class="main-content pt-0">
	<div class="container">

		<!-- Page Header -->
		<div class="page-header">
			<div class="page-header-1">
				<h1 class="main-content-title tx-30">Student</h1>
				<ol class="breadcrumb">
					<li class="breadcrumb-item active" aria-current="page">Profile</li>
				</ol>
			</div>
		</div>
		<!-- End Page Header -->

	

		<!-- Row -->
		<div class="row">
			<div class="col-lg-12 col-md-12">
				<div class="card main-content-body-profile">
					<div class="tab-content">
						<div class="main-content-body tab-pane p-4 border-top-0 active" id="about">
							<div class="card-body p-0 border p-0 rounded-11">
								<div class="card-body">
									<div class="row">

										<div class="col-md-3 col-xs-6 b-r"> <strong>Full Name</strong>
											<br>
											<p class="text-muted"><?php echo $personal->student_fullname;?></p>
										</div>
										<div class="col-md-3 col-xs-6 b-r"> <strong>Mobile</strong>
											<br>
											<p class="text-muted"> <?php echo $student_details->registered_mobile_no;?> </p>
										</div>
										<div class="col-md-3 col-xs-6 b-r"> <strong>Email</strong>
											<br>
											<p class="text-muted"><?php echo $student_details->registered_email	;?></p>
										</div>
										<div class="col-md-3 col-xs-6"> <strong>Registration Date</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $student_details->registration_datetime;?></p>
                                            </div>
									</div>
								
                                   
                                        <div class="row">
                                        	<div class="col-md-3 col-xs-6 b-r"> <strong>Expire Date</strong>
                                        		<br>
                                        		<p class="text-muted"><?php echo $student_details->subscription_validity_datetime ?></p>
                                        	</div>
                                            <!-- <div class="col-md-3 col-xs-6 b-r"> <strong>Expire Status </strong>
                                                <br>
                                                <p class="text-muted"><?php echo ($student_details->registration_status == 1) ? 'Active' : 'Expired';?></p>
                                            </div> -->

                                        </div>
                                    </div>

                                </div>
                            </div>
                         
                            					</div>
                            				</div>
                            			</div>
                            		</div>
                            		<!-- End Row -->

             

                            	</div>
                            </div>
                            <!-- End Main Content-->
