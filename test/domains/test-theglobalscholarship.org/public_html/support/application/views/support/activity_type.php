
			<!-- Main Content-->
			<div class="main-content pt-5 mt-5">
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
						<!-- End Page Header -->
						<!-- Row -->
						<div class="row">
							<div class="col-lg-12 col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="main-content-label mg-b-5">
											
										</div>
										<!-- <p class="mg-b-20">It is Very Easy to Customize and it uses in your website apllication.</p> -->
										<form id="activityTypeFormValidation" method="post" action="<?php echo base_url()?>insert-activity-type-name" >
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<p class="mg-b-10">Activity Type <span class="tx-danger">*</span></p>
													<input type="text" class="form-control" name="activityTypeName"  id ="activityTypeName" placeholder="Enter Activity Type" spellcheck="true" required>
												</div>
											</div>
										
									

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
														<th>Activity Type </th>
														<th>Action</th>
													
														
														
													</tr>
												</thead>
												<tbody>
													<?php if($activity_type->num_rows()>0){ $i=1; foreach($activity_type->result() as $row){?>

													<tr>
														<td><?php echo $i;?> </td>
														<td><?php echo $row->activity_type;?> </td>
														<td><a style="margin-right: 10px;" onclick="setDataFunction(
														'<?php echo $row->id; ?>',
														'<?php echo $row->activity_type?>'
													
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
							<form method="post" id="validateActivityTypeUpdateForm" action="<?php echo base_url()?>update-activity-type">
								<div class="modal-body">

									<div class="row">
										<div class="col-lg-6 form-group">
											<label class="form-label">Activity Type <span class="tx-danger">*</span></label>
											<input class="form-control" name="editActivityType" id="editActivityType"  placeholder="Enter Activity Type" required="" type="text" >
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



	<?php if($this->session->flashdata('activity-type-name-add-success')){?>		
			<Script>
				swal({
					title: 'Add Activity Type !',
					text: 'Activity type added successfully!',
					type: 'success',
					timer: 3000,
        			showConfirmButton: false
				});
			</Script>
		<?php }?>


		<?php if($this->session->flashdata('activity-type-name-add-failure')){?>		
			<Script>
				swal({
					title: 'Add Activity Type!',
					text: 'Failed to add activity type !',
					type: 'error',
					timer: 3000,
       				showConfirmButton: false
				});
			</Script>
		<?php }?>



		<?php if($this->session->flashdata('activity-type-update-success')){?>		
			<Script>
				swal({
					title: 'Update Activity Type!',
					text: 'Activity type updated successfully!',
					type: 'success',
					timer: 3000,
        			showConfirmButton: false
				});
			</Script>
		<?php }?>


		<?php if($this->session->flashdata('activity-type-update-failure')){?>		
			<Script>
				swal({
					title: 'Update Activity Type!',
					text: 'Failed to update activity type!',
					type: 'error',
					timer: 3000,
       				showConfirmButton: false
				});
			</Script>
		<?php }?>




		<script>
$(document).ready(function() {

    $('#activityTypeFormValidation').bootstrapValidator({
 
        fields: {
            activityTypeName: {
        
                validators: {
                    notEmpty: {
                        message: 'Activity type is required'
                    },
                 
                   
                }
            }
     


        }
    }) .on('success.form.bv', function(e) {
        $(this)[0].submit();
    });
});
</script>

		<script>
$(document).ready(function() {

    $('#validateActivityTypeUpdateForm').bootstrapValidator({
   
        fields: {
            editActivityType: {
        
                validators: {
                    notEmpty: {
                        message: 'Activity type is required'
                    },
                 
                   
                }
            }
     


        }
    }) .on('success.form.bv', function(e) {
        $(this)[0].submit();
    });
});
</script>


	<script>
		function setDataFunction(id,activity_type){

			$('#rid').val(id);  
			$('#editActivityType').val(activity_type);
			$('#editModal').modal('show');
			
		}
	</script>