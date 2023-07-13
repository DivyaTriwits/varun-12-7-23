<style>
	.star-rating {
		font-size: 0;
		white-space: nowrap;
		display: inline-block;
		/* width: 250px; remove this */
		height: 50px;
		overflow: hidden;
		position: relative;
		background: url('data:image/svg+xml;base64,PHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4IiB3aWR0aD0iMjBweCIgaGVpZ2h0PSIyMHB4IiB2aWV3Qm94PSIwIDAgMjAgMjAiIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDIwIDIwIiB4bWw6c3BhY2U9InByZXNlcnZlIj48cG9seWdvbiBmaWxsPSIjREREREREIiBwb2ludHM9IjEwLDAgMTMuMDksNi41ODMgMjAsNy42MzkgMTUsMTIuNzY0IDE2LjE4LDIwIDEwLDE2LjU4MyAzLjgyLDIwIDUsMTIuNzY0IDAsNy42MzkgNi45MSw2LjU4MyAiLz48L3N2Zz4=');
		background-size: contain;
	}
	.star-rating i {
		opacity: 0;
		position: absolute;
		left: 0;
		top: 0;
		height: 100%;
		/* width: 20%; remove this */
		z-index: 1;

		background: url('assets/img/afterstar.svg');
		background-size: contain;
	}
	.star-rating input {
		-moz-appearance: none;
		-webkit-appearance: none;
		opacity: 0;
		display: inline-block;
		/* width: 20%; remove this */
		height: 100%;
		margin: 0;
		padding: 0;
		z-index: 2;
		position: relative;
	}
	.star-rating input:hover + i,
	.star-rating input:checked + i {
		opacity: 1;
	}
	.star-rating i ~ i {
		width: 40%;
	}
	.star-rating i ~ i ~ i {
		width: 60%;
	}
	.star-rating i ~ i ~ i ~ i {
		width: 80%;
	}
	.star-rating i ~ i ~ i ~ i ~ i {
		width: 100%;
	}
	::after,
	::before {
		height: 100%;
		padding: 0;
		margin: 0;
		box-sizing: border-box;
		text-align: center;
		vertical-align: middle;
	}

	.star-rating.star-5 {width: 250px;}
	.star-rating.star-5 input,
	.star-rating.star-5 i {width: 20%;}
	.star-rating.star-5 i ~ i {width: 40%;}
	.star-rating.star-5 i ~ i ~ i {width: 60%;}
	.star-rating.star-5 i ~ i ~ i ~ i {width: 80%;}
	.star-rating.star-5 i ~ i ~ i ~ i ~i {width: 100%;}

	.star-rating.star-3 {width: 150px;}
	.star-rating.star-3 input,
	.star-rating.star-3 i {width: 33.33%;}
	.star-rating.star-3 i ~ i {width: 66.66%;}
	.star-rating.star-3 i ~ i ~ i {width: 100%;}
</style>
<!-- Main Content-->
<div class="main-content pt-4 mt-5 mb-0">
	<div class="container">
		<!-- Row -->
		<div class="row sidemenu-height">
			<div class="col-lg-12">
				<div class="card">

					<div class="card-body">
						<h6>Feed Back Form</h6><br>
						<form id=studentsPersonalForm method="POST" enctype="multipart/form-data" action="<?php echo base_url('add-student-feedback')?>">


							<div class="row">

								<div class="col-md-12">
								
										<p class="mg-b-4">Your Rating  <i class="ion-help-circled" data-toggle="tooltip" title="1)star-1=worst 2)star-2=bad 3)star-3=average 4)star-4=good 5)star-5=excellent"></i></p>
										
										<!-- <select id="example-pill" class="form-control"name="rating" autocomplete="off">
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
										</select> -->
									    	<div class="form-group text-center">
										<span class="star-rating star-5 text-center">
											<input type="radio" name="rating" value="1"><i></i>
											<input type="radio" name="rating" value="2"><i></i>
											<input type="radio" name="rating" value="3"><i></i>
											<input type="radio" name="rating" value="4"><i></i>
											<input type="radio" name="rating" value="5"><i></i>
										</span>
									
									</div>
								</div>

							</div>

							<div class="row">
										<!-- 		<div class="col-md-6">
													<div class="form-group">
														<p class="mg-b-10">Full Name  <i class="ion-help-circled" data-toggle="tooltip" title="this text box contain's your full name"></i></p>
														<input type="text" class="form-control" name="name" 
														placeholder="Full Name">
														<input type="hidden" class="form-control" id="actualRating" name="actualRating" 
														>
													</div>
												</div> -->
												<!-- </div> -->
										<!-- 	<div class="row">
												<div class="col-md-12">
													<div class="form-group">
														<p class="mg-b-10">Photo  <i class="ion-help-circled" data-toggle="tooltip" title="upload your photo"></i></p>
														<input type="file" class="form-control" name="photo">
													</div>
												</div>
											</div> -->
											<!-- <div class="row"> -->

											<!-- 	<div class="col-md-6">
													<div class="form-group">
														<p class="mg-b-10">Message <i class="ion-help-circled" data-toggle="tooltip" title="this text box contain's your message"></i></p>
														<textarea  type="text" class="form-control" name="message"   >
														</textarea>
													</div>
												</div> -->



												<div class="col-lg-12">
													<p class="mg-b-10">Message <i class="ion-help-circled" data-toggle="tooltip" title="this text box contain's your message"></i></p>
													<textarea class="form-control" placeholder="Please Enter Your Feedback" name="message" rows="3"></textarea>
													<!--<input type="hidden" class="form-control" id="actualRating" name="actualRating" -->
													
												</div>
												
											</div>
											<br>
											<button style="background-color: #ff7f45; border-color: #ff7f45" type="Submit" class="btn ripple btn-primary float-right">Submit</button>

										</form>


									</div>

								</div>
							<!-- 	<div class="card">
								<div class="card-body">
										<strong>Rating 1 to 2 <span>Poor</span></strong>
										<strong>Rating 3 to 4 <span>Good</span></strong>
										<strong>Rating 5 <span>Best</span></strong>
									</div>
								</div> -->
							</div>
<!-- 							<div class="col-lg-6">
								<div class="card card-aside">
									<div class="card-body">
										

										<div style="text-align: center;">
											<?php if($getProfilePhoto!=''){?>
												<div class="row">
													<div class="col-md-12">

														<img style="max-width:50%;" src="<?php echo base_url()?>/upload/<?php if($getProfilePhoto!=''){echo $getProfilePhoto->student_photo ; }?>" />


													</div>
												<?php }else{?>
													<h4>Upload Your Passport Size Photo</h4>
												<?php }?>
											</div>


											<div class="row " style="margin-top: 20px;">

												<div class="col-md-12">
													
													<h6 class="main-content-label mb-1" > <?php if($feedback!=''){ echo $feedback->student_name;}?> </h6>
												</div>
												
											</div>

											<div class="row">

												<div class="col-md-12">
													
													<p  > <?php if($feedback!=''){

														if($feedback->student_rating==1)

															{ ?>

																<div>
																	<h6 class="main-content-label mb-1">Rating</h6>
																</div>
																<div class="static-rate text-center fs-30">
																	<i class="fa fa-star text-warning" aria-hidden="true"></i>

																</div>

															<?php	} else if($feedback->student_rating==2) {?>

																<div>
																	<h6 class="main-content-label mb-1">Rating</h6>
																</div>
																<div class="static-rate text-center fs-30">
																	<i class="fa fa-star text-warning" aria-hidden="true"></i>
																	<i class="fa fa-star text-warning" aria-hidden="true"></i>

																</div>

															<?php } else if($feedback->student_rating==3){ ?>

																<div>
																	<h6 class="main-content-label mb-1">Rating</h6>
																</div>
																<div class="static-rate text-center fs-30">
																	<i class="fa fa-star text-warning" aria-hidden="true"></i>
																	<i class="fa fa-star text-warning" aria-hidden="true"></i>
																	<i class="fa fa-star text-warning" aria-hidden="true"></i>

																</div>



															<?php } else if($feedback->student_rating==4) { ?>


																<div>
																	<h6 class="main-content-label mb-1">Static Star Rating</h6>
																</div>
																<div class="static-rate text-center fs-30">
																	<i class="fa fa-star text-warning" aria-hidden="true"></i>
																	<i class="fa fa-star text-warning" aria-hidden="true"></i>
																	<i class="fa fa-star text-warning" aria-hidden="true"></i>
																	<i class="fa fa-star text-warning" aria-hidden="true"></i>

																</div>

															<?php } else {?>

																<div>
																	<h6 class="main-content-label mb-1">Rating</h6>
																</div>
																<div class="static-rate text-center fs-30">
																	<i class="fa fa-star text-warning" aria-hidden="true"></i>
																	<i class="fa fa-star text-warning" aria-hidden="true"></i>
																	<i class="fa fa-star text-warning" aria-hidden="true"></i>
																	<i class="fa fa-star text-warning" aria-hidden="true"></i>
																	<i class="fa fa-star text-warning" aria-hidden="true"></i>
																</div>
															<?php }?>

															<?php	}?> </p>
														</div>

													</div>




													<div class="row">

														<div class="col-md-12">

															<p  ><em> <?php if($feedback!=''){ echo $feedback->student_message;}?> </em></p>
														</div>

													</div>

												</div>

											</div>

										</div>
									</div>
								</div> -->
								
								<!-- End Row -->
							</div>

						</div>
					</div>

					<!-- End Main Content-->



					<?php if($this->session->flashdata('add-success')){?>		
						<Script>
							swal({
								title: 'Well done!',
								text: 'Thanks For Your Valuable Feedback',
								type: 'success',
								timer: 3000,
								showConfirmButton: false
							});
						</Script>
						<?php }?>