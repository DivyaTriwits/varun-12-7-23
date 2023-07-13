



<!-- Main Content-->
<div class="main-content pt-4 mt-5 mb-4">
	<div class="container-fluid">

		<!-- <div class="text-wrap">
			<div class="example">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb breadcrumb-style1 mg-b-0">

						<li class="breadcrumb-item">
							<a href="<?php echo base_url()?>">Support</a>
						</li>
						<li class="breadcrumb-item">
							<a href="<?php echo base_url('candidate-feedback')?>">Candidate FeedBack</a></li>
							<li class="breadcrumb-item active">Candidate FeedBack List</li>
						</ol>
					</nav>
				</div>
			</div> -->




			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-body">
							<form id="searchCallbackStatus" >
								<div class="row pt-3">


									<div class="col-md-4">
										<div class="form-group">
											<label for="callbackStatus">Candidate FeedBack</label>
											<select  class="form-control select2-no-search" name="feedbackStatus" id="feedbackStatus" >
												<option value="" selected disabled>Select</option>
												<option <?php echo ($this->input->get('feedbackStatus') =='goodFeedback' ) ? 'selected' : ' ' ?> value="goodFeedback">Good FeedBack</option>
												<option <?php echo ($this->input->get('feedbackStatus') == 'badFeedback') ? 'selected' : ' ' ?> value="badFeedback">Bad FeedBack</option>

											</select>
										</div>
									</div>







									<!--  <div class="col-md-4"> -->
										<div class="form-actions">
											<div class="card-body">

												<input class="btn ripple btn-primary" type="submit" style="background-color: #ff7f45; border-color: #ff7f45" value="Search">
												<a href="<?php echo base_url()?>candidate-feedback" class="btn waves-effect waves-light m-t-30" style="background-color:#460056;border-color:#460056">Reset</a>

											</div>
										</div>







									</div>
								</form>
					
							</div>
						</div>
					</div>
				</div>



				<!-- Row -->
				<div class="row">
					<div class="col-lg-12">
						<div class="card">
							<div class="card-body">

								<div class="table-responsive">
									<table id="exportexample" class="table table-striped table-bordered text-nowrap" >
										<thead>
											<tr>
												<th>Sl No.</th>
												<th>Name</th>
												<th>Message</th>
												<th>Type</th>
												<th>Whatsapp</th>
												<th>Feedback Date </th>

												<th>Rating</th>


											</tr>
										</thead>
										<tbody>
											<?php if($customer->num_rows()>0){$i=1; foreach($customer->result() as $row ){ ?>


												
												<tr>
													<td><?php echo $i;?></td>
													<td><?php echo $row->student_name;?></td>
													<td><?php echo $row->student_message;?></td>

													<td>

														<?php if($row->student_rating<=3){?>

															<p style="color:red;"> Bad FeedBack </p>

														<?php } else {?>
															<p style="color:green;"> Good FeedBack </p>
														<?php }?>

													</td>

												<!--	<td>

														<a target = "_blank"  
														href="https://wa.me/?phone=91<?php echo $row->student_mobile_number;?>&text=<?php echo $row->student_name;?>" data-action="share/whatsapp/share"><i class="zmdi zmdi-whatsapp" style="color:green; font-size:30px" data-toggle="tooltip" title="Click to contact via WhatsApp"></i></a></strong>


													</td>-->
    												<td style="text-align: center;">
    														<a target = "_blank"
    														class="whatsapp"
    														href="https://api.whatsapp.com/send/?phone=91<?php echo $row->student_mobile_number;?>&text=<?php echo $row->student_name;?>" data-action="share/whatsapp/share">
    														<button type="button" class="btn ripple btn-success">
    															<i class="zmdi zmdi-whatsapp"></i>
    														</button>
    													</a>
    												</td>
                                                    
                                                    <td><?php echo  $row->feedback_date;?></td>

													<td>

														<p> 

															<?php 		if($row->student_rating==1)

															{ ?>


																<div class="static-rate  fs-20">
																	<i class="fa fa-star text-warning" aria-hidden="true"></i>

																</div>

															<?php	} else if($row->student_rating==2) {?>


																<div class="static-rate  fs-20">
																	<i class="fa fa-star text-warning" aria-hidden="true"></i>
																	<i class="fa fa-star text-warning" aria-hidden="true"></i>

																</div>

															<?php } else if($row->student_rating==3){ ?>


																<div class="static-rate  fs-20">
																	<i class="fa fa-star text-warning" aria-hidden="true"></i>
																	<i class="fa fa-star text-warning" aria-hidden="true"></i>
																	<i class="fa fa-star text-warning" aria-hidden="true"></i>

																</div>



															<?php } else if($row->student_rating==4) { ?>



																<div class="static-rate  fs-20">
																	<i class="fa fa-star text-warning" aria-hidden="true"></i>
																	<i class="fa fa-star text-warning" aria-hidden="true"></i>
																	<i class="fa fa-star text-warning" aria-hidden="true"></i>
																	<i class="fa fa-star text-warning" aria-hidden="true"></i>

																</div>

															<?php } else {?>


																<div class="static-rate  fs-20">
																	<i class="fa fa-star text-warning" aria-hidden="true"></i>
																	<i class="fa fa-star text-warning" aria-hidden="true"></i>
																	<i class="fa fa-star text-warning" aria-hidden="true"></i>
																	<i class="fa fa-star text-warning" aria-hidden="true"></i>
																	<i class="fa fa-star text-warning" aria-hidden="true"></i>
																</div>
															<?php }?>

														</p>



													</td>


												</tr>

												<?php $i=$i+1;} } ?>	

											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- End Row -->


					
				</div>
			</div>
			<!-- End Main Content-->
			<!-- Large Modal -->
			<div class="modal" id="modaldemo3">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content modal-content-demo">
						<div class="modal-header">
							<h6 class="modal-title">New Webinar Register Form</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
						</div>
						<div class="modal-body">
							<div class="row">
								<div class="col-lg-6 form-group">
									<label class="form-label">Institutional Name: <span class="tx-danger">*</span></label>
									<input class="form-control" name="firstname" placeholder="Enter Institutional name" required="" type="text">
								</div>
								<div class="col-lg-6 form-group">
									<label class="form-label">Email: <span class="tx-danger">*</span></label>
									<input class="form-control" name="email" placeholder="Enter email" required="" type="email">
								</div>
								<div class="col-lg-6 form-group">
									<label class="form-label">Alternate Email: <span class="tx-danger">*</span></label>
									<input class="form-control" name="email" placeholder="Enter alternate email" required="" type="email">
								</div>
								<div class="col-lg-6 form-group">
									<label class="form-label">Contact No.: <span class="tx-danger">*</span></label>
									<input class="form-control" name="firstname" placeholder="Enter contact no." required="" type="text">
								</div>
								<div class="col-lg-6 form-group">
									<label class="form-label">Alternate Contact No.: <span class="tx-danger">*</span></label>
									<input class="form-control" name="firstname" placeholder="Enter alternate contact no." required="" type="text">
								</div>
								<div class="col-lg-6 form-group">
									<label class="form-label">Date Of Webinar: <span class="tx-danger">*</span></label>
									<input class="form-control" name="date" placeholder="Enter date of webinar" required="" type="date">
								</div>

							</div>
						</div>
						<div class="modal-footer">
							<button class="btn ripple btn-primary" type="button">Save changes</button>
							<button class="btn ripple btn-outline-light" data-dismiss="modal" type="button">Close</button>
						</div>
					</div>
				</div>
			</div>
			<!--End Large Modal -->