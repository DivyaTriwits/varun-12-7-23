



<!-- Main Content-->
<div class="main-content pt-5 mt-5">
	<div class="container-fluid">

	<!-- 	<div class="text-wrap">
			<div class="example">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb breadcrumb-style1 mg-b-0">
						<li class="breadcrumb-item">
							<a href="<?php echo base_url()?>">Support</a></li>
							<li class="breadcrumb-item active">Registration Lists</li>
						</ol>
					</nav>
				</div>
			</div> -->

			<?php if($this->session->flashdata('success')){?>
				<script>
					swal({
						title: "Success",
						text: "Added successfully.",
						type: 'success',
						timer: 3000,
						showConfirmButton: false
					});
				</script>
				<!-- <script>setTimeout(function () { $('.alert').hide(); }, 3000);</script> -->
			<?php }?>
				<?php if($this->session->flashdata('update-success')){?>
				<script>
					swal({
						title: "Success",
						text: "Updated successfully.",
						type: 'success',
						timer: 3000,
						showConfirmButton: false
					});
				</script>
				<!-- <script>setTimeout(function () { $('.alert').hide(); }, 3000);</script> -->
			<?php }?>
			<?php if($this->session->flashdata('delete-success')){?>
				<script>
					swal({
						title: "Success",
						text: "Delete successfully.",
						type: 'success',
						timer: 3000,
						showConfirmButton: false
					});
				</script>
				<!-- <script>setTimeout(function () { $('.alert').hide(); }, 3000);</script> -->
			<?php }?>
			<?php if($this->session->flashdata('failes')){?>		
				<Script>
					swal({
						title: 'Failed Register!',
						text: 'This email is already used. Please other email!',
						type: 'error',
						timer: 3000,
						showConfirmButton: false
					});
				</Script>
			<?php }?>

			<div align="right"><a class="btn ripple btn-info" href="" data-target="#modaldemo3" data-toggle="modal"style="background-color:#ff7f45;border-color: #ff7f45">Add Messages</a></div><br>
			<div class="row">
				<div class="col-lg-12">
					<div class="card">
						<div class="card-body">
							<div>
									<h6 class="main-content-label mb-1">Alert Notification Messages</h6>

								</div><br>
							<div class="table-responsive">
								<table id="exportexample" class="table table-striped table-bordered text-nowrap" >
									<thead>
										<tr>
											<th>Sl No.</th>
											<th>Message</th>
											<th>Page Link</th>
											<th>Edit</th>
											<th>Delete</th>
										</tr>
									</thead>
									<tbody>
									
										<?php $i=1;foreach($notifications as $eachNotifications) {?>
											<tr>
												<td><?php echo $i?></td>
												<td><?php echo $eachNotifications->message?></td>
												<td><?php echo $eachNotifications->navigate_to?></td>
												<td><a onclick="setDataFunction(
													'<?php echo $eachNotifications->id; ?>',
													'<?php echo $eachNotifications->message; ?>',
													'<?php echo $eachNotifications->navigate_to?>'
													)" data-target="#editModal" data-toggle="modal" href="<?php //echo base_url('student_profile_details')?>"><i class="fe fe-edit-3" style="color: green" ></i></a></td>

												<td><a onclick="setDeleteFunction(
												'<?php echo $eachNotifications->id; ?>')" data-target="#delete" data-toggle="modal"><i class="fe fe-trash" style="cursor: pointer; color: red" ></i></a></td>
											</tr>
										<?php $i++; }?>
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
	<div class="modal fade" id="modaldemo3">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content modal-content-demo">
				<div class="modal-header">
					<h6 class="modal-title">Add message</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
				</div>
				<form method="post" id="addForm" action="<?php echo base_url('add-alert-message')?>">
					<div class="modal-body">

						<div class="row">
							<div class="col-lg-12 form-group">
								<label class="form-label">Message<span class="tx-danger">*</span></label>
								<textarea class="form-control" name="add_message" placeholder="Your Message" required="" type="text"></textarea> 
							</div>
						</div>
							<div class="row">
								<div class="col-lg-12 form-group">
									<label class="form-label">Add url link</label>
									<textarea class="form-control" name="add_link" id="add_link" placeholder="Your Message" type="text"></textarea> 
								</div>
							</div>
					</div>
					<div class="modal-footer">
						<button class="btn ripple btn-primary" type="submit" style="background-color: #ff7f45; border-color: #ff7f45">Submit</button>
						<button class="btn ripple btn-outline-light" data-dismiss="modal" type="button">Close</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!--End Large Modal -->

	<!-- Large Modal -->
		<div class="modal fade" id="editModal">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content modal-content-demo">
				<div class="modal-header">
					<h6 class="modal-title">Edit Message</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
				</div>
				<form method="post" id="edit_stud" action="<?php echo base_url('update-alert-message')?>">
					<div class="modal-body">
					
					    	<input type="hidden" name="sid" id="sid">
						<div class="row">
						
							<div class="col-lg-12 form-group">
								<label class="form-label">Message<span class="tx-danger">*</span></label>
								<textarea class="form-control" name="add_emessage"id="add_emessage" placeholder="add message" required="" type="text"></textarea> 
								
							</div>
							</div>
							<div class="row">
								<div class="col-lg-12 form-group">
									<label class="form-label">Add url link</label>
									<textarea class="form-control" name="add_elink" id="add_elink" placeholder="Your Message" type="text"></textarea> 
								</div>
							</div>
						</div>
					
					
					<div class="modal-footer">
						<button class="btn ripple btn-primary" type="submit" style="background-color: #ff7f45; border-color: #ff7f45">Update</button>
						<button class="btn ripple btn-outline-light" data-dismiss="modal" type="button">Close</button>
					</div>
					</form>
			</div>
		</div>
	</div>
	<!--End Large Modal -->
	<!-- Basic modal -->
<!-- 	<div class="modal fade" id="delete">
		<div class="modal-dialog" role="document">
			<div class="modal-content modal-content-demo">
				<div class="modal-header">
					<h6 class="modal-title">Delete</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
				</div>
				<form method="post" id="delete" action="<?php echo base_url('delete-alert-message')?>">
					<div class="modal-body">

						<p>Are you sure you want delete this row?</p>
						<input type="hidden" name="did" id="did">
					</div>
					<div class="modal-footer">
						<button class="btn ripple btn-primary" type="submit">Delete</button>
						<button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Close</button>
					</div>
				</form>
			</div>
		</div>
	</div> -->
		<div class="modal fade" id="delete">
								<div class="modal-dialog modal-dialog-centered" role="document">
									<div class="modal-content tx-size-sm">
										<div class="modal-body tx-center pd-y-20 pd-x-20">
											<form method="post" id="delete" action="<?php echo base_url('delete-alert-message')?>">
												<input type="text" name="did" id="did" hidden="">	
												<button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button> <i class="icon icon ion-ios-close-circle-outline tx-100 tx-danger lh-1 mg-t-20 d-inline-block"></i>
												<h4 class="tx-danger mg-b-20">Warning: Are you sure you want to delete this?</h4>
												<p class="mg-b-20 mg-x-20">You won't be able to revert back this!</p>
												<input type="submit" value="Delete" class="btn btn-danger">

											</form>
										</div>
									</div>
								</div>
							</div>
	<!-- End Basic modal -->

	<script>
		$(document).ready(function(){
			$('#addForm').bootstrapValidator({
				fields: {
				
					add_message: {
						validators: {
							notEmpty: {
								message: 'The message is required  '
							}
						}
					},



				}
				
			}).on('success.form.bv', function(e) {
				e.preventDefault();
				(this).submit();
			});

		});
	</script>

	<script>
		$(document).ready(function(){
			$('#edit_stud').bootstrapValidator({
				fields: {
				
					add_emessage: {
						validators: {
							notEmpty: {
								message: 'The message is required  '
							}
						}
					},
				


				}
				
			}).on('success.form.bv', function(e) {
				e.preventDefault();
				(this).submit();
			});

		});
	</script>
	<script>
		function setDataFunction(id,message,navigate_to){
		
		    $('#sid').val(id);  
			$('#add_emessage').val(message);
			$('#add_elink').val(navigate_to);
		}
	</script>
	<script>
		function setDeleteFunction(id){
                  // alert(id);
                  $('#did').val(id);  

              }
          </script>




