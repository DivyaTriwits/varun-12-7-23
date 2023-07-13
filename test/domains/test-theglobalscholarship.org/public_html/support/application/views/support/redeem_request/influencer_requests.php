
<!-- Main Content-->
<div class="main-content pt-4 mt-5 mb-4">
	<div class="container-fluid">
		<!-- Row -->
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-body">

						<div class="">
                            <h6 class="main-content-label mb-1">Influencer Redeem Requests</h6><br>
							<br>
						</div>

						<div class="table-responsive">
							<table id="exportexample" class="table table-striped table-bordered text-nowrap" >
								<thead>
									<tr>
										<th>Sl No.</th>
										<th>Influencer Name</th>
										<th>Mobile No</th>
										<th>Redeem Option</th>
										<th>Request Date</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php if($influncerrequests->num_rows()>0){ $i=1; foreach($influncerrequests->result() as $row){?>
										<tr>
											<td><?php echo $i;?> </td>
											<td><?php echo $row->full_name;?> </td>
											<td><?php echo $row->influencer_mobile_no;?> </td>
											
											<td style="color: green"><?php echo $row->redeem_option;?> </td>
											<td><?php echo $row->request_date;?> </td>
											<td><?php if($row->request_solved_status==0){?>
												<span style="color: red">Request Not Solved <i style="color: red" class="fe fe-x" ></i></span>
											<?php } else {?>
												<span style="color: green">Request Solved <i class="fe fe-check" style="color: green;"></i></span>
											<?php } ?>
										</td>
										<td>
											<div class="row button-group">
												<div class="btn-group">

													<i class="fe fe-more-vertical dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
													<div class="dropdown-menu">	

														<?php if(($row->redeem_option=='Redeem Amount To Bank' && $row->request_solved_status=='0')){?>
															<a class="btn btn-succes"data-target="#bankmodal"data-toggle="modal" onclick="
															setBankData('<?php echo $row->influencer_username;?>',
															    '<?php echo $row->influencer_request_id; ?>',
																'<?php echo $row->full_name; ?>',
																'<?php echo $row->bank_name; ?>',
																'<?php echo $row->bank_account_no; ?>',
																'<?php echo $row->bank_ifsc_code; ?>',
																'<?php echo $row->bhim_upi_id; ?>',
																'<?php echo $row->redeem_amount; ?>',
																)">View Bank Details</a>
															<?php }else{?>
																	<a class="dropdown-item"href="#" style="color: blue">Request Solved</a>
															<?php }?>
															
														</div>
													</div>
												</div>
											</td>

														<!-- <td><a style="margin-right: 10px;" onclick="setDataFunction(
														'<?php echo $row->id; ?>',
														'<?php echo $row->student_activity_type_id?>',
														'<?php echo $row->student_activity_name?>'
													
														)"  href="javascrupt:void(0)"><i class="fe fe-edit-3" style="color: green" ></i></a>
													</td> -->
												</tr>

												<?php $i=$i+1; } }?>
											</tbody>

										</table>
									</div>
								</div>
							</div>
						</div>
					</div>

						
							<div class="modal fade" id="bankmodal">
								<div class="modal-dialog modal-lg" role="document">
									<div class="modal-content modal-content-demo">
										<div class="modal-body">
											<h6 class="modal-title">Redeem Amount</h6>
											<form action="<?php echo base_url('influencer-solved-request')?>" method="Post">
												<h5 class="text-center mb-5 mt-2"></h5>
												<h6>Bank Details</h6>
												<div class="row">
													<!-- <div class="col-md-6">
														<div class="form-group">
															<p class="mg-b-10">Student Name</p>
															<input type="text" class="form-control" name="estudent_name" id="estudent_name"placeholder="" required readonly="">
														</div>
													</div> -->

													<div class="col-md-6">
														<div class="form-group">
															<p class="mg-b-10">Full Name</p>
															<input type="text" class="form-control" name="bank_beneficiary_name" id="bank_beneficiary_name"placeholder="" required readonly="">
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<p class="mg-b-10">Bank Name</p>
															<input type="text" class="form-control" name="bank_name" id="bank_name"
															placeholder="" readonly="">
														</div>
													</div>
													<input type="hidden" name="redeem_option" value="Redeem Amount To Bank">
													<input type="hidden" name="bid"id="bid">
													<input type="hidden" name="reqId"id="reqId">

													<div class="col-md-6">
														<div class="form-group">
															<p class="mg-b-10">Account Number</p>
															<input 
															pattern="[0-9]{1,18}"  maxlength="20" oninput="if (!this.checkValidity()) this.value = this.value.slice(0, -1)"
															type="text" class="form-control" name="bank_account_no" id="bank_account_no" placeholder="" readonly="">
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<p class="mg-b-10"> IFSC Code </p>
															<input 

															pattern="[a-zA-Z0-9]{1,11}"  maxlength="11" oninput="if (!this.checkValidity()) this.value = this.value.slice(0, -1)"

															type="text" class="form-control ifsc" name="bank_ifsc_code" id="bank_ifsc_code"  placeholder=""readonly="">
															<span id="ifscError" style="color:red;"></span>
														</div>
													</div>
													<!-- <div class="col-md-6">
														<div class="form-group">
															<p class="mg-b-10">Bank Branch</p>
															<input type="text" class="form-control" name="bank_branch_name" id="bank_branch_name" placeholder=""readonly="">

														</div>
													</div> -->
													<div class="col-md-6">
														<div class="form-group">
															<p class="mg-b-10">BHIM UPI ID</p>
															<input type="text" class="form-control" name="bhim_upi_id" id="bhim_upi_id" placeholder=""readonly="">

														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<p class="mg-b-10">Amount to Redeem</p>
															<input type="text" class="form-control" name="amount" id="amount" placeholder=""readonly="">

														</div>
													</div>
													<!-- <div class="modal-footer"> -->
														<button class="btn ripple btn-primary" type="submit"style="background-color: #460056; border-color: #460056">Submit</button>&nbsp;&nbsp;
														<button class="btn ripple btn-outline-light" data-dismiss="modal" type="button">Close</button>
														<!-- </div> -->
														<!-- </div> -->

													
												</form>
											</div>

										</div>
									</div>
								</div>
								<!-- Registered Modal Start -->

								<!-- Registered Modal End -->

							</div>
						</div>

						<!-- Large Modal -->

						<!--End Large Modal -->



						<?php if($this->session->flashdata('renew-success')){?>		
							<Script>
								swal({
									title: 'Awesome!',
									text: 'Request Solved!',
									type: 'success',
									timer: 5000,
									showConfirmButton: false
								});
							</Script>
						<?php }?>


						<?php if($this->session->flashdata('activity-name-add-failure')){?>		
							<Script>
								swal({
									title: 'Add Course Name!',
									text: 'Failed to add Activity name!',
									type: 'error',
									timer: 3000,
									showConfirmButton: false
								});
							</Script>
						<?php }?>



						<?php if($this->session->flashdata('activity-name-update-success')){?>		
							<Script>
								swal({
									title: 'Update Activity Name!',
									text: 'Activity name updated successfully!',
									type: 'success',
									timer: 3000,
									showConfirmButton: false
								});
							</Script>
						<?php }?>


						<?php if($this->session->flashdata('activity-name-update-failure')){?>		
							<Script>
								swal({
									title: 'Update Activity Name!',
									text: 'Failed to update activity name!',
									type: 'error',
									timer: 3000,
									showConfirmButton: false
								});
							</Script>
						<?php }?>



						<script>
							$(document).ready(function() {

								$('#activiyNameFormValidation').bootstrapValidator({

									fields: {
										activityType: {

											validators: {
												notEmpty: {
													message: 'Activity type  is required'
												},


											}
										},
										activityName: {

											validators: {
												notEmpty: {
													message: 'Activity name is required'
												},


											}
										},



									}
								}) .on('success.form.bv', function(e) {
									$(this)[0].submit();
								});
							});
						</script>

						<script>
							$(document).ready(function() {

								$('#validateActivityNameUpdateForm').bootstrapValidator({

									fields: {
										editActivityType: {

											validators: {
												notEmpty: {
													message: 'Activity type  is required'
												},


											}
										},
										editActivityName: {

											validators: {
												notEmpty: {
													message: 'Activity name is required'
												},


											}
										},



									}
								}) .on('success.form.bv', function(e) {
									$(this)[0].submit();
								});
							});
						</script>

						<script>

							function setRenewData(student_username,student_name,registered_mobile_no,registration_datetime,subscription_validity_datetime) 
							{
								$('#eid').val(student_username);
								$('#fullname').val(student_name);
								$('#mobile_number').val(registered_mobile_no);
								$('#registered_date').val(registration_datetime);
								$('#subscription_registered_date').val(subscription_validity_datetime);
							}
						</script>

						<script>

							function setBankData(influencer_username,influencer_request_id,full_name,bank_name,bank_account_no,bank_ifsc_code,bhim_upi_id,redeem_amount)
							{
								// alert(influencer_request_id);
								$('#bid').val(influencer_username);
								$('#reqId').val(influencer_request_id);
								$('#bank_beneficiary_name').val(full_name);
								$('#bank_name').val(bank_name);
								// $('#bank_account_type').val(bank_account_type);
								$('#bank_account_no').val(bank_account_no);
								$('#bank_ifsc_code').val(bank_ifsc_code);
								$('#bhim_upi_id').val(bhim_upi_id);
								$('#amount').val(redeem_amount);

								
							}



						</script>

						<script>



							function setRegisteredData(student_username,registered_account_username,registered_account_name,registered_account_mobile,registered_account_email){
								$('#rid').val(student_username);
								$('#registered_account_username').val(registered_account_username);  
								$('#registered_account_name').val(registered_account_name).trigger('change');
								$('#registered_account_mobile').val(registered_account_mobile);
								$('#registered_account_email').val(registered_account_email);
							}
						</script>