
			<!-- Main Content-->
			<div class="main-content pt-4 mt-5 mb-4">
				<div class="container-fluid">

						<!-- Page Header -->
				<!-- 		<div class="page-header">
							<div class="page-header-1">
								<h1 class="main-content-title tx-30">Instititional Dashboard</h1>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="#">Agreement Paper</a></li>
								</ol>
							</div>
						</div> -->
						<!-- End Page Header  -->
						<!-- Row -->
						<div class="row">
							<div class="col-lg-12 col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="main-content-label mg-b-5">
											
										</div>
										<!-- <p class="mg-b-20">It is Very Easy to Customize and it uses in your website apllication.</p> -->
										<form id="activiyNameFormValidation" method="post" action="<?php echo base_url()?>insert-activity-name" >
										<div class="row">
											<div class="col-md-4">
												<div class="form-group">
													<p class="mg-b-10">Activity Type  <span class="tx-danger">*</span></p>
												<select class="form-control select2" name="activityType"  id ="activityType" required>
												<option value="" selected disabled>Select</option>
												<?php if($activity_type->num_rows()>0){ foreach($activity_type->result() as $row){?>
												<option <?php echo ($this->input->get('activityType') ==$row->activity_type ) ? 'selected' : ' ' ?> value="<?php echo $row->activity_type;?>"><?php echo $row->activity_type?></option>
											<?php } } ?>


												</select>


											</div>
											</div>


											<div class="col-md-6">
												<div class="form-group">
													<p class="mg-b-10">Activity  Name  <span class="tx-danger">*</span></p>
													<input type="text" class="form-control" name="activityName"  id ="activityName" placeholder="Enter Activity Name" required>
												</div>
											</div>
										
										<!-- 	<div class="col-sm-12 col-md-12 col-lg-6">
												
														<input style="background-color: #ff7f45; border-color: #ff7f45" type="submit" name="submit" value="submit" class="btn ripple btn-primary" >
													
											</div> -->

										<div class="form-actions">
											<div class="card-body">

												<input class="btn ripple btn-primary" type="submit" style="background-color: #ff7f45; border-color: #ff7f45" value="Submit">
											

										

												

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
										
										<div class="">
											
											<br>
										</div>
										
										<div class="table-responsive">
											<table id="exportexample" class="table table-striped table-bordered text-nowrap" >
												<thead>
													<tr>
														<th>Sl No.</th>
														<th>Activity Type</th>
														<th>Activity Name</th>
														<th>Action</th>
													
														
														
													</tr>
												</thead>
												<tbody>
													<?php if($name->num_rows()>0){ $i=1; foreach($name->result() as $row){?>

													<tr>
														<td><?php echo $i;?> </td>
														<td><?php echo $row->student_activity_type_id;?> </td>
														<td><?php echo $row->student_activity_name;?> </td>
														<td><a style="margin-right: 10px;" onclick="setDataFunction(
														'<?php echo $row->id; ?>',
														'<?php echo $row->student_activity_type_id?>',
														'<?php echo $row->student_activity_name?>'
													
														)"  href="javascrupt:void(0)"><i class="fe fe-edit-3" style="color: green" ></i></a>
														 </td>
													</tr>

													<?php $i=$i+1; } }?>
												</tbody>



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

						<!-- Large Modal -->
				<div class="modal fade" id="editModal">
					<div class="modal-dialog modal-lg" role="document">
						<div class="modal-content modal-content-demo">
							<div class="modal-header">
								<h6 class="modal-title">Edit Activity Type  </h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
							</div>
							<form method="post" id="validateActivityNameUpdateForm" action="<?php echo base_url()?>update-activity-name">
								<div class="modal-body">

									<div class="row">
										<div class="col-lg-6 form-group">
											<label class="form-label">Activity Type <span class="tx-danger">*</span></label>
											
											
											<select class="form-control select2"  name="editActivityType" id="editActivityType"  required>
												<option value="" selected disabled>Select</option>
												<?php if($activity_type->num_rows()>0){ foreach($activity_type->result() as $row){?>
												<option  value="<?php echo $row->activity_type;?>"><?php echo $row->activity_type?></option>
											<?php } } ?>

											</select>
										</div>

										<div class="col-lg-6 form-group">
											<label class="form-label">Activity Name <span class="tx-danger">*</span></label>
											<input class="form-control" name="editActivityName" id="editActivityName" placeholder="Enter Activity Name" required="" type="text" >
											<input type="hidden" name="rid" id="rid">
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



	<?php if($this->session->flashdata('activity-name-add-success')){?>		
			<Script>
				swal({
					title: 'Add Activity Name!',
					text: 'Activity name added successfully!',
					type: 'success',
					timer: 3000,
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
		function setDataFunction(id,activity_type,activity_Name){

			$('#rid').val(id);  
			$('#editActivityType').val(activity_type).trigger('change');
			$('#editActivityName').val(activity_Name);
			$('#editModal').modal('show');
			
		}
	</script>