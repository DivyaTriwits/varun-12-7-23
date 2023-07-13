



<!-- Main Content-->
<div class="main-content pt-5 mt-5">
	<div class="container-fluid">

	<!-- 	<div class="text-wrap">
			<div class="example">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb breadcrumb-style1 mg-b-0">

						<li class="breadcrumb-item">
							<a href="<?php echo base_url()?>">Support</a>
						</li>
						<li class="breadcrumb-item">
							<a href="<?php echo base_url('requested-callback-list')?>">Request Call Back</a></li>
							<li class="breadcrumb-item active">Request call Back List</li>
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
											<label for="callbackStatus">Call Back Status</label>
											<select class="form-control select2-no-search" name="callbackStatus" id="callbackStatus" >
												<option value="" selected disabled>Select</option>
												<option <?php echo ($this->input->get('callbackStatus') =='contacted' ) ? 'selected' : ' ' ?> value="contacted">Contacted</option>
												<option <?php echo ($this->input->get('callbackStatus') == 'notContacted') ? 'selected' : ' ' ?> value="notContacted">Not Contacted</option>

											</select>
										</div>
									</div>







									<!--  <div class="col-md-4"> -->
										<div class="form-actions">
											<div class="card-body">

												<input class="btn ripple btn-primary" type="submit" style="background-color: #ff7f45; border-color: #ff7f45" value="Search">
												<a href="<?php echo base_url()?>requested-callback-list" class="btn waves-effect waves-light m-t-30" style="background-color:#460056;border-color:#460056">Reset</a>

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
												<th>Contact No.</th>
												<th>Message</th>
												<th>Whatsapp</th>
												<th>Date</th>

												<th>Status</th>
												<th>Action</th>

											</tr>
										</thead>
										<tbody>
											<?php if($customer->num_rows()>0){$i=1; foreach($customer->result() as $row ){ ?>


												
												<tr>
													<td><?php echo $i;?></td>
													<td><?php echo $row->name;?></td>
													<td><?php echo $row->number;?></td>
													<td><?php echo $row->message;?></td>
												<!--	<td>
														<a target = "_blank"  
														href="https://wa.me/?phone=91<?php echo $row->number;?>&text=<?php echo $row->name;?>" data-action="share/whatsapp/share"><i class="zmdi zmdi-whatsapp" style="color:green; font-size:30px" data-toggle="tooltip" title="Click to contact via WhatsApp"></i></a></strong>
													</td>-->
													 
        											<td style="text-align: center;">
        													<a target = "_blank"
        													class="whatsapp"
        													href="https://api.whatsapp.com/send/?phone=91<?php echo $row->number;?>&text=<?php echo $row->name;?>" data-action="share/whatsapp/share">
        													<button type="button" class="btn ripple btn-success">
        														<i class="zmdi zmdi-whatsapp"></i>
        													</button>
        												    </a>
        											</td>  
													
													<td>

														<p> Req: <?php echo $row->requested_date;?> <br />

															Cont: <?php echo $row->contacted_date;?>
														</p>


													</td>

												<!--	<td><?php if($row->status==0){?>
														<p style="color: red"> Not Contacted </p>

													<?php } else {?>
														<p style="color:green"> Contacted </p>

													<?php } ?>


												</td>-->
												
												
													<td><?php if($row->status==0){?>
														<p >Contacted <i style="color: red" class="fe fe-x" ></i> </p>

													<?php } else {?>
														<p > Contacted  <i class="fe fe-check" style="color: green;"></i></p>

													<?php } ?>



															 <?php if($row->requested_issue=='solved'){?>
														 	Requested Issue: <strong style="color:green">Solved</strong>
														 <?php } else if($row->requested_issue=='not solved'){?>
														 	Requested Issue: <strong style="color:red">Not Solved</strong>
														<?php } else if($row->requested_issue=='processing') {?>
															Requested Issue:<strong style="color:green">Processing</strong> 
														<?php } else if($row->requested_issue=='invalid request') {?>
															Requested Issue: <strong style="color:red">Invalid Request</strong>
														<?php } else { ?>
															Requested Issue: <strong style="color:red">Pending</strong>
														<?php } ?>


												</td>

												<td>
												<!--	<?php if($row->status==0){?>
														<a href="<?php echo base_url()?>change-status-to-contacted/<?php echo $row->id;?>" > <i class="fe fe-phone" style="color: green" data-toggle="tooltip" title="Click to change status to contacted"> </i></a>
													<?php } else {?>
														<a href="<?php echo base_url()?>change-status-to-not-contacted/<?php echo $row->id;?>" > <i class="fe fe-phone-off" style="color: red" data-toggle="tooltip" title="Click to change status to not contacted" > </i> </a>
													<?php }?>-->
													
													<div class="row button-group">
                                                        <div class="btn-group">
                                                            <!-- <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> -->
                                                               <i class="fe fe-more-vertical dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: green;"></i>
                                                           <!--  </button> -->
                                                            <div class="dropdown-menu">
                                                            		<?php if($row->status==0){?>
																	<a class="dropdown-item" href="<?php echo base_url()?>change-status-to-contacted/<?php echo $row->id;?>" > <i class="fe fe-phone" style="color: green" data-toggle="tooltip" title="Click to change status to contacted"> </i>Change status to contacted</a>
																	<?php } else {?>
																	<a class="dropdown-item" href="<?php echo base_url()?>change-status-to-not-contacted/<?php echo $row->id;?>" > <i class="fe fe-phone-off" style="color: red" data-toggle="tooltip" title="Click to change status to not contacted" > </i>Change status to not contacted</a>
																	<?php }?>
                                                                

                                                              

                                                                <a class="dropdown-item" href="<?php echo base_url()?>response-status/<?php echo $row->id;?>/1"><i class="fe fe-x" style="color: red;"> </i>Invalid Request</a>

                                                                <a class="dropdown-item" href="<?php echo base_url()?>response-status/<?php echo $row->id;?>/2"><i class="fe fe-check" style="color: green;"> </i>Request Solved</a>

                                                                <a class="dropdown-item" href="<?php echo base_url()?>response-status/<?php echo $row->id;?>/3"><i class="fe fe-x" style="color: red;"> </i>Request Not Solved</a>

                                                                <a class="dropdown-item" href="<?php echo base_url()?>response-status/<?php echo $row->id;?>/4"><i class="fe fe-power" style="color: green;"> </i>Processing the Request</a>

                                                                  <a class="dropdown-item" href="<?php echo base_url()?>response-status/<?php echo $row->id;?>/5"><i class="fe fe-more-horizontal" style="color: red;"> </i>Request Pending</a>
                                                               
                                                                
                                                            </div>
                                                        </div>
                                                    </div>


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

		<?php if($this->session->flashdata('status-changed-to-contacted-success')){?>		
			<Script>
				swal({
					title: 'Requested CallBack Status!',
					text: 'Status changed to contacted successfully.!',
					type: 'success',
					timer: 3000,
        			showConfirmButton: false
				});
			</Script>
		<?php }?>


		<?php if($this->session->flashdata('status-changed-to-contacted-error')){?>		
			<Script>
				swal({
					title: 'Requested CallBack Status!',
					text: 'Failed to change the status to contacted!',
					type: 'error',
					timer: 3000,
       				showConfirmButton: false
				});
			</Script>
		<?php }?>



		<?php if($this->session->flashdata('status-changed-to-not-contacted-success')){?>		
			<Script>
				swal({
					title: 'Requested CallBack Status!',
					text: 'Status changed to not contacted successfully.!',
					type: 'success',
					timer: 3000,
        			showConfirmButton: false
				});
			</Script>
		<?php }?>


		<?php if($this->session->flashdata('status-changed-to-not-contacted-error')){?>		
			<Script>
				swal({
					title: 'Requested CallBack Status!',
					text: 'Failed to change the status to not contacted!',
					type: 'error',
					timer: 3000,
        			showConfirmButton: false
				});
			</Script>
		<?php }?>








