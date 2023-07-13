



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
					<?php }?>
					
		<?php if($this->session->flashdata('update-success')){?>
				<script>
					swal({
						title: "Success",
						text: "update successfully.",
						type: 'success',
						timer: 3000,
						showConfirmButton: false
					});
				
				</script>
		<?php }?>	
				<!-- <script>setTimeout(function () { $('.alert').hide(); }, 3000);</script> -->
		
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

			<div align="right"><a class="btn ripple btn-info" href="" data-target="#modaldemo3" data-toggle="modal"style="background-color: #ff7f45;border-color: #ff7f45">Add Registration</a></div><br>
			<div class="row">
				<div class="col-lg-12">
					<div class="card">
						<div class="card-body">

							<div class="table-responsive">
								<table id="exportexample" class="table table-striped table-bordered text-nowrap" >
									<thead>
										<tr>
											<th>Sl No.</th>
											<th>Full name</th>
											<th>Email</th>
											<th>Contact No.</th>
											<th>Date of Joining</th>
											<th>Role</th>
											<th>Edit</th>
											<th>Delete</th>
										</tr>
									</thead>
									<tbody>
										<?php $i=1;foreach($sales as $sale) {?>
											<tr>
												<td><?php echo $i?></td>
												<td><?php echo $sale->name?></td>
												<td><?php echo $sale->email?></td>
												<td><?php echo $sale->mobile?></td>
												<td><?php echo $sale->date_of_joining?></td>
												<td><?php echo $sale->role?></td>
												<td><a onclick="setDataFunction(
													'<?php echo $sale->support_id; ?>',
													'<?php echo $sale->name?>',
													'<?php echo $sale->email?>',
													'<?php echo $sale->mobile?>',
													'<?php echo $sale->date_of_joining?>',
                                                   '<?php echo $sale->password?>',
													'<?php echo $sale->role?>')" data-target="#editModal" data-toggle="modal" ><i class="fe fe-edit-3" style="color: green" ></i></a></td>

												<td><a onclick="setDeleteFunction(
												'<?php echo $sale->support_id; ?>')" data-target="#delete" data-toggle="modal"><i class="fe fe-trash" style="cursor: pointer; color: red" ></i></a></td>
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



				
				<!-- End Main Content-->
				<!-- Large Modal -->
				<div class="modal fade" id="modaldemo3">
					<div class="modal-dialog modal-lg" role="document">
						<div class="modal-content modal-content-demo">
							<div class="modal-header">
								<h6 class="modal-title">New Register Form</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
							</div>
							<form method="post" id="addForm" action="<?php echo base_url('insert_new_regsitration')?>">
								<div class="modal-body">

									<div class="row">
										<div class="col-lg-6 form-group">
											<label class="form-label">Full name: <span class="tx-danger">*</span></label>
											<input class="form-control" name="firstname" placeholder="full name" required="" type="text">
										</div>
										<div class="col-lg-6 form-group">
											<label class="form-label">Email: <span class="tx-danger">*</span></label>
											<input class="form-control" name="email" placeholder="Email" required="" type="email">
										</div>
										<div class="col-lg-6 form-group">
											<label class="form-label">Contact No.: <span class="tx-danger">*</span></label>
											<input   pattern="[0-9]{1,10}"  maxlength="10"  
											oninput="if (!this.checkValidity()) this.value = this.value.slice(0, -1)"
											class="form-control" name="mobile" placeholder="Contact" required="" type="text">
										</div>
										<div class="col-lg-6 form-group">
											<label class="form-label">Date Of Joining: <span class="tx-danger">*</span></label>
											<input class="form-control" name="date" placeholder="Date of joning" required="" type="date">
										</div>
										<div class="col-lg-6 form-group">
											<label class="form-label">Password: <span class="tx-danger">*</span></label>
											<input class="form-control" name="password" placeholder="Password" required="" type="password">
										</div>
										<div class="col-lg-6 form-group">
											<label class="form-label">Role: <span class="tx-danger">*</span></label>

											<select class="form-control" name="role" required="">
												<option selected="" disabled="">Select</option>
												<option value="Sales">Sales</option>
												<option value="Support">Support</option>
											</select>
										</div>

											<div class="col-lg-6 ">
												<div class="form-group">
													<p class="mb-2">Support Access</p>
													<label class="custom-switch">
														<input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input">
														<span class="custom-switch-indicator"></span>
														<!-- <span class="custom-switch-description">I agree with terms and conditions</span> -->
													</label>
												<!-- 	<p class="mt-4 mb-2">Toggle switch single Checked</p>
													<label class="custom-switch">
														<input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input" checked>
														<span class="custom-switch-indicator"></span>
														<span class="custom-switch-description">I agree with terms and conditions</span>
													</label> -->
												</div>
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
								<h6 class="modal-title">Edit Register Form</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
							</div>
							<form method="post" id="edit_stud" action="<?php echo base_url('update_regsitration_data')?>">
								<div class="modal-body">

									<div class="row">
										<div class="col-lg-6 form-group">
											<label class="form-label">Full Name: <span class="tx-danger">*</span></label>
											<input class="form-control" name="efirstname" placeholder="full name" required="" type="text" id="efirstname">
											<input type="hidden" name="sid" id="sid">
										</div>
										<div class="col-lg-6 form-group">
											<label class="form-label">Email: <span class="tx-danger">*</span></label>
											<input class="form-control" name="eemail" id="eemail" placeholder="Email" required="" type="email" readonly>
										</div>
										<div class="col-lg-6 form-group">
											<label class="form-label">Contact No.: <span class="tx-danger">*</span></label>
											<input  pattern="[0-9]{1,10}"  maxlength="10"  
											oninput="if (!this.checkValidity()) this.value = this.value.slice(0, -1)"
											class="form-control" name="emobile" id="emobile" placeholder="Contact" required="" type="text">
										</div>
										<div class="col-lg-6 form-group">
											<label class="form-label">Date Of Joining: <span class="tx-danger">*</span></label>
											<input class="form-control" name="edate" id="edate" placeholder="Date of joning" required="" type="date">
										</div>
                                        <div class="col-lg-6 form-group">
											<label class="form-label">Password: <span class="tx-danger">*</span></label>
											<input class="form-control" name="epassword" id="epassword" placeholder="Password" required="" type="password">
										</div>
										<div class="col-lg-6 form-group">
											<label class="form-label">Role: <span class="tx-danger">*</span></label>

											<select class="form-control" name="erole" id="erole" required="">
												<option selected="" disabled="">Select</option>
												<option value="Sales">Sales</option>
												<option value="Support">Support</option>
											</select>
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
			
							<div class="modal fade" id="delete">
							<div class="modal-dialog modal-dialog-centered" role="document">
								<div class="modal-content tx-size-sm">
									<div class="modal-body tx-center pd-y-20 pd-x-20">
										<form method="post"action="<?php echo base_url('delete_regsitration_data')?>">
											<input type="text" name="did" id="did" hidden="">	
											<button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button> <i class="icon icon ion-ios-close-circle-outline tx-100 tx-danger lh-1 mg-t-20 d-inline-block"></i>
											<h4 class="tx-danger mg-b-20">Warning: Are you sure,you want to delete it?</h4>
											<p class="mg-b-20 mg-x-20">You won't be able to revert back this!</p>
											<input type="submit" value="Delete" class="btn btn-danger">
										</form>
									</div>
								</div>
							</div>
						</div>




			</div>
		</div>
		
		
		<script>
			$(document).ready(function(){
				$('#addForm').bootstrapValidator({
					fields: {
						firstname: {
							message: 'The full name is not valid',
							validators: {
								notEmpty: {
									message: 'The full name is required '
								},
								stringLength: {
									min: 3,
									max: 25,
									message: 'The full name must be more than 3 and less than 25 characters long'
								},
								regexp: {
									regexp: /^[a-z A-Z]+$/,
									message: 'The full name can only consist of alphabetical'
								}
							}
						},

						mobile: {
							validators: {
								notEmpty: {
									message: 'The contact number is required  '
								},
								stringLength: {
									min: 10,
									max: 10,
									message: 'The contact number must be 10 digits'
								},
								regexp: {
									regexp: /[0-9]/,
									message: 'The contact number. can only consist of digits'
								}
							}
						},

						email: {
							validators: {
								notEmpty: {
									message: 'The email is required  '
								},
							}
						},

						password: {
							validators: {
								notEmpty: {
									message: 'The password is required  '
								}
							}
						},
						role: {
							validators: {
								notEmpty: {
									message: 'The role is required  '
								}
							}
						},
						date: {
							validators: {
								notEmpty: {
									message: 'The date of joining is required  '
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
						efirstname: {
							message: 'The full name is not valid',
							validators: {
								notEmpty: {
									message: 'The full name name is required '
								},
								stringLength: {
									min: 3,
									max: 25,
									message: 'The full name must be more than 3 and less than 25 characters long'
								},
								regexp: {
									regexp: /^[a-z A-Z]+$/,
									message: 'The full name can only consist of alphabetical'
								}
							}
						},

						emobile: {
							validators: {
								notEmpty: {
									message: 'The contact number is required  '
								},
								stringLength: {
									min: 10,
									max: 10,
									message: 'The contact number must be 10 digits'
								},
								regexp: {
									regexp: /[0-9]/,
									message: 'The contact number. can only consist of digits'
								}
							}
						},

						eemail: {
							validators: {
								notEmpty: {
									message: 'The email is required  '
								},
							}
						},

						epassword: {
							validators: {
								notEmpty: {
									message: 'The password is required  '
								}
							}
						},
						erole: {
							validators: {
								notEmpty: {
									message: 'The role is required  '
								}
							}
						},
						edate: {
							validators: {
								notEmpty: {
									message: 'The date of joining is required  '
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
			function setDataFunction(support_id,name,email,mobile,date,epassword,role){

				$('#sid').val(support_id);  
				$('#efirstname').val(name);

				$('#eemail').val(email);
				$('#emobile').val(mobile);
				$('#edate').val(date);
              $('#epassword').val(epassword)
				$('#erole').val(role).trigger('change');

			}
		</script>
		<script>
			function setDeleteFunction(support_id){
                  //alert(support_id);
                  $('#did').val(support_id);  

              }
          </script>