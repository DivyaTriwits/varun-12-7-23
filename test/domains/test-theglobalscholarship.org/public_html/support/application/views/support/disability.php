
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
						<!-- End Page Header   -->
						<!-- Row -->
						<div class="row">
							<div class="col-lg-12 col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="main-content-label mg-b-5">
											
										</div>
										<!-- <p class="mg-b-20">It is Very Easy to Customize and it uses in your website apllication.</p> -->
										<form id="disabilityFormValidation" method="post" action="<?php echo base_url()?>insert-disability-name" >
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<p class="mg-b-10">Disability Name  <span class="tx-danger">*</span></p>
													<input type="text" class="form-control" name="disabilityName"  id ="disabilityName" placeholder="Enter Disability Name" spellcheck="true" required>
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
														<th>Disability Name</th>
														<th>Action</th>
													
														
														
													</tr>
												</thead>
												<tbody>
													<?php if($disability->num_rows()>0){ $i=1; foreach($disability->result() as $row){?>

													<tr>
														<td><?php echo $i;?> </td>
														<td><?php echo $row->disability_name;?> </td>
														<td><a style="margin-right: 10px;" onclick="setDataFunction(
														'<?php echo $row->id; ?>',
														'<?php echo $row->disability_name?>'
													
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
								<h6 class="modal-title">Edit Disability  </h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
							</div>
							<form method="post" id="validateDisabilityUpdateForm" action="<?php echo base_url()?>update-disability-name">
								<div class="modal-body">

									<div class="row">
										<div class="col-lg-6 form-group">
											<label class="form-label">Disability Name <span class="tx-danger">*</span></label>
											<input class="form-control" name="editDisabilityName" id="editDisabilityName" placeholder="Enter Disability Name"  required="" type="text" >
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



	<?php if($this->session->flashdata('disability-name-add-success')){?>		
			<Script>
				swal({
					title: 'Add Disability Name!',
					text: 'Disability name added successfully!',
					type: 'success',
					timer: 3000,
        			showConfirmButton: false
				});
			</Script>
		<?php }?>


		<?php if($this->session->flashdata('disability-name-add-failure')){?>		
			<Script>
				swal({
					title: 'Add Disability Name!',
					text: 'Failed to add disability name!',
					type: 'error',
					timer: 3000,
       				showConfirmButton: false
				});
			</Script>
		<?php }?>



		<?php if($this->session->flashdata('disability-name-update-success')){?>		
			<Script>
				swal({
					title: 'Update Disability Name!',
					text: 'Disability name updated successfully!',
					type: 'success',
					timer: 3000,
        			showConfirmButton: false
				});
			</Script>
		<?php }?>


		<?php if($this->session->flashdata('disability-name-update-failure')){?>		
			<Script>
				swal({
					title: 'Update Disability Name!',
					text: 'Failed to update disability name!',
					type: 'error',
					timer: 3000,
       				showConfirmButton: false
				});
			</Script>
		<?php }?>



		<script>
$(document).ready(function() {

    $('#disabilityFormValidation').bootstrapValidator({

        fields: {
            disabilityName: {
        
                validators: {
                    notEmpty: {
                        message: 'Disability name is required'
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

    $('#validateDisabilityUpdateForm').bootstrapValidator({

        fields: {
            editDisabilityName: {
        
                validators: {
                    notEmpty: {
                        message: 'Disability name is required'
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
		function setDataFunction(id,disability_name){

			$('#rid').val(id);  
			$('#editDisabilityName').val(disability_name);
			$('#editModal').modal('show');
			
		}
	</script>