



<!-- Main Content-->
<div class="main-content pt-5 mt-5">
	<div class="container-fluid">

	     	<div class="row">
					<div class="col-12">
						<div class="card ">
							<div class="card-body">
								<form id="searchCallbackStatus" >
									<div class="row">

										<div class="col-md-6">
											<div class="form-group">
												<label for="callbackStatus">Search Promotional Students</label>
												 <select style="width: 100%;" name="source" id="source" required class="form-control select2-no-search">
                                                <option selected="" disabled="">Select </option>
                                              <?php if($getPromotionalStudents->num_rows()>0){ foreach($getPromotionalStudents->result() as $row){?>

                                                    <option <?php echo ($row->page_source == $this->input->get('source'))? 'selected' : ''  ?> value="<?php echo $row->page_source?>">
                                                        <?php echo $row->page_source?></option>
                                                    <?php }}?>
                                                </select>
											</div>
										</div>

										<div class="form-actions">
											<div class="card-body">

											<!-- 	<input class="btn ripple btn-primary " type="submit" style="background-color: #ff7f45; border-color: #ff7f45" value="Search"> -->

												<a href="<?php echo base_url()?>failed-registrations" class="btn waves-effect waves-light m-t-30" style="background-color:#460056;border-color:#460056">Reset</a>
												
												<!-- <a href="<?php echo base_url()?>push-scholarship/<?php echo $this->uri->segment(2)?>" class="btn waves-effect waves-light btn-secondary m-t-30 ">Reset</a> -->
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
						<div class="card overflow-hidden">
							<div class="card-body">
								<div>
									<h6 class="main-content-label mb-1">Failed Registration List</h6>
								</div>
								<div class="table-responsive">
									<table id="failed-registrations" class="table table-bordered border-t0 key-buttons text-nowrap w-100" >
										<thead>
											<tr>
												
												<!-- <th>Sl No.</th> -->
												<th>Name </th>
												<th style="width:10%;">Mobile Number</th>
												<th style="width:10%;">Whatsapp</th>
												<th >Date</th>
												<th >Amount Tried</th>
											</tr>
										</thead>
										<tbody>
											<?php $index=1;foreach($getregisterestudents as $eachStudents){?>
												<tr>
													<!-- <td><?php echo $index?></td> -->
													<td><?php echo $eachStudents->student_name?></td>
													<td><?php echo $eachStudents->registered_mobile_no?></td>

													<?php if($eachStudents->registered_whatsapp_mobile_no!=''){?>
														<td style="text-align: center;">
															<a target = "_blank"
															class="whatsapp"
														href="<?php echo base_url('redirect-to-whatsapp?username='.$eachStudents->student_username.'&mobile_no='.$eachStudents->registered_whatsapp_mobile_no).'&message=Hello '.$eachStudents->student_name.'&redirect='.$this->uri->segment(1);?>" data-action="share/whatsapp/share">
															<button type="button" class="btn ripple btn-success">
																<i class="zmdi zmdi-whatsapp"></i>
															</button>
														</a>
													</td>
												<?php }else{?>
													<td style="text-align: center;">
														<a target = "_blank"
														class="whatsapp"
														href="<?php echo base_url('redirect-to-whatsapp?username='.$eachStudents->student_username.'&mobile_no='.$eachStudents->registered_mobile_no).'&message=Hello '.$eachStudents->student_name.'&redirect='.$this->uri->segment(1);?>" data-action="share/whatsapp/share">
														<button type="button" class="btn ripple btn-success">
															<i class="zmdi zmdi-whatsapp"></i>
														</button>
													</a>
												</td>
											<?php }?>


													<td><?php echo $eachStudents->registration_initiated_datetime;?></td>

													<td><?php echo $eachStudents->amount;?></td>

												</tr>
												<?php }?>

											</tbody>
										</table>
									</div>
					
								</div>
								<div class="modal fade" id="modaldemo5">
									<div class="modal-dialog modal-dialog-centered" role="document">
										<div class="modal-content tx-size-sm">
											<div class="modal-body tx-center pd-y-20 pd-x-20">
												<form method="post"action="<?php echo base_url('delete-eachStudents')?>">
													<input type="text" name="did" id="did" hidden="">	
													<button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button> <i class="icon icon ion-ios-close-circle-outline tx-100 tx-danger lh-1 mg-t-20 d-inline-block"></i>
													<h4 class="tx-danger mg-b-20">Warning: Are you sure to delete?</h4>
													<p class="mg-b-20 mg-x-20">You won't be able to revert back this!</p>
													<input type="submit" value="Delete" class="btn btn-danger">
												</form>
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



			<script>
				function setDeleteFunction(id) {
        // alert(id);
        $('#did').val(id);

    }
</script>
</script>
<?php if($this->session->flashdata('delete-success')){?>		
	<Script>
		swal({
			title: 'Well done!',
			text: 'Webinar deleted successfully..',
			type: 'success',
			timer: 3000,
        	showConfirmButton: false
		});

		

		
	</Script>
<?php }?>
<script>
    $('#source').change(function(){
        location.replace('<?php echo base_url('failed-registrations?source=')?>'+$(this).val());
    });
</script>
