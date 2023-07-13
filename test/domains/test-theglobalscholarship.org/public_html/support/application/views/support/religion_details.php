
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
										<form id="religionFormValidation" method="post" action="<?php echo base_url()?>insert-regligion-name" >
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<p class="mg-b-10">Religion Name  <span class="tx-danger">*</span></p>
													<input type="text" class="form-control" name="religionName"  id ="religionName" placeholder="Enter Religion Name" required>
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
														<th>Religion Name</th>
														<th>Action</th>
													
														
														
													</tr>
												</thead>
												<tbody>
													<?php if($religion->num_rows()>0){ $i=1; foreach($religion->result() as $row){?>

													<tr>
														<td><?php echo $i;?> </td>
														<td><?php echo $row->religion_name;?> </td>
														<td><a style="margin-right: 10px;" onclick="setDataFunction(
													'<?php echo $row->religion_id; ?>',
													'<?php echo $row->religion_name?>'
												
													)"  href="javascrupt:void(0)"><i class="fe fe-edit-3" style="color: green" ></i></a> </td>

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
								<h6 class="modal-title">Edit Religion </h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
							</div>
							<form method="post" id="validateReligionUpdateForm" action="<?php echo base_url()?>update-religion-name">
								<div class="modal-body">

									<div class="row">
										<div class="col-lg-6 form-group">
											<label class="form-label">Religion Name <span class="tx-danger">*</span></label>
											<input class="form-control" name="editReligionName" id="editReligionName" placeholder="Religion name" required="" type="text" >
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




	<?php if($this->session->flashdata('religion-name-add-success')){?>		
			<Script>
				swal({
					title: 'Add Religion Name!',
					text: 'Religion name added successfully!',
					type: 'success',
					timer: 3000,
        			showConfirmButton: false
				});
			</Script>
		<?php }?>


		<?php if($this->session->flashdata('religion-name-add-failure')){?>		
			<Script>
				swal({
					title: 'Add Religion Name!',
					text: 'Failed to add religion name!',
					type: 'error',
					timer: 3000,
       				showConfirmButton: false
				});
			</Script>
		<?php }?>

		<?php if($this->session->flashdata('religion-name-update-success')){?>		
			<Script>
				swal({
					title: 'Update Religion Name!',
					text: 'Religion name updated successfully!',
					type: 'success',
					timer: 3000,
        			showConfirmButton: false
				});
			</Script>
		<?php }?>


		<?php if($this->session->flashdata('religion-name-update-failure')){?>		
			<Script>
				swal({
					title: 'Update Religion Name!',
					text: 'Failed to update religion name!',
					type: 'error',
					timer: 3000,
       				showConfirmButton: false
				});
			</Script>
		<?php }?>



		<script>
$(document).ready(function() {

    $('#religionFormValidation').bootstrapValidator({
        // message: 'This value is not valid',
        // feedbackIcons: {
        //     valid: 'glyphicon glyphicon-ok',
        //     invalid: 'glyphicon glyphicon-remove',
        //     validating: 'glyphicon glyphicon-refresh'
        // },
        fields: {
            religionName: {
        
                validators: {
                    notEmpty: {
                        message: 'Religion name is required'
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

    $('#validateReligionUpdateForm').bootstrapValidator({
        // message: 'This value is not valid',
        // feedbackIcons: {
        //     valid: 'glyphicon glyphicon-ok',
        //     invalid: 'glyphicon glyphicon-remove',
        //     validating: 'glyphicon glyphicon-refresh'
        // },
        fields: {
            editReligionName: {
        
                validators: {
                    notEmpty: {
                        message: 'Religion name is required'
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
		function setDataFunction(religion_id,religion_name){

			$('#rid').val(religion_id);  
			$('#editReligionName').val(religion_name);
			$('#editModal').modal('show');
			
			

		}
	</script>