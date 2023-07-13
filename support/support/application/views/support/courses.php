


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
						<!-- End Page Header -->
						<!-- Row -->
						<div class="row">
							<div class="col-lg-12 col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="main-content-label mg-b-5">
											
										</div>
										<!-- <p class="mg-b-20">It is Very Easy to Customize and it uses in your website apllication.</p> -->
										<form id="courseFormValidation" method="post" action="<?php echo base_url()?>insert-course-name" >
										<div class="row">
											<div class="col-md-4">
												<div class="form-group">
													<p class="mg-b-10">Qualification Name  <span class="tx-danger">*</span></p>
												<select class="form-control select2" name="qualificationName"  id ="qualificationName" required>
												<option value="" selected disabled>Select</option>
												<?php if($qualification->num_rows()>0){ foreach($qualification->result() as $row){?>
												<option <?php echo ($this->input->get('qualificationName') ==$row->id ) ? 'selected' : ' ' ?> value="<?php echo $row->id;?>"><?php echo $row->course_name?></option>
											<?php } } ?>


												</select>


											</div>
											</div>


											<div class="col-md-6">
												<div class="form-group">
													<p class="mg-b-10">Coure Name  <span class="tx-danger">*</span></p>
													<input type="text" class="form-control" name="coureName"  id ="coureName" placeholder="Enter Course Name" required>
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
										
										<div  class="table-responsive ">
											<table id="exportexample" class="table table-striped table-bordered text-nowrap" >
												<thead>
													<tr>
														<th>Sl No.</th>
														<th>Qualification Name</th>
														<th>Course Name</th>
														<th>Action</th>
													
														
														
													</tr>
												</thead>
												<tbody>
													<?php if($course->num_rows()>0){ $i=1; foreach($course->result() as $row){?>

													<tr>
														<td><?php echo $i;?> </td>
														<td><?php echo $row->course_name;?> </td>
														<td><?php echo $row->particular_name;?> </td>
														<td><a style="margin-right: 10px;" onclick="setDataFunction(
														'<?php echo $row->particular_id; ?>',
														'<?php echo $row->particular_name?>',
														'<?php echo $row->course_id?>'
													
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
								<h6 class="modal-title">Edit Course  </h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
							</div>
							<form method="post" id="validateCourseNameUpdateForm" action="<?php echo base_url()?>update-course-name">
								<div class="modal-body">

									<div class="row">
										<div class="col-lg-6 form-group">
											<label class="form-label">Qualification Name <span class="tx-danger">*</span></label>
											
											<select class="form-control select2" name="editQualificationName"  id ="editQualificationName" required>
												<option value="" selected disabled>Select</option>
												<?php if($qualification->num_rows()>0){ foreach($qualification->result() as $row){?>
												<option value="<?php echo $row->id;?>"><?php echo $row->course_name?></option>
											<?php } } ?>


												</select>
										</div>

										<div class="col-lg-6 form-group">
											<label class="form-label">Course Name <span class="tx-danger">*</span></label>
											<input class="form-control" name="editCourseName" id="editCourseName" placeholder="Enter Course Name" required="" type="text" >
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



	<?php if($this->session->flashdata('course-name-add-success')){?>		
			<Script>
				swal({
					title: 'Add Course Name!',
					text: 'Course name added successfully!',
					type: 'success',
					timer: 3000,
        			showConfirmButton: false
				});
			</Script>
		<?php }?>


		<?php if($this->session->flashdata('course-name-add-failure')){?>		
			<Script>
				swal({
					title: 'Add Course Name!',
					text: 'Failed to add course name!',
					type: 'error',
					timer: 3000,
       				showConfirmButton: false
				});
			</Script>
		<?php }?>


			<?php if($this->session->flashdata('course-name-update-success')){?>		
			<Script>
				swal({
					title: 'Update Course Name!',
					text: 'Course name updated successfully!',
					type: 'success',
					timer: 3000,
        			showConfirmButton: false
				});
			</Script>
		<?php }?>


		<?php if($this->session->flashdata('course-name-update-failure')){?>		
			<Script>
				swal({
					title: 'Update Course Name!',
					text: 'Failed to update course name!',
					type: 'error',
					timer: 3000,
       				showConfirmButton: false
				});
			</Script>
		<?php }?>


		<script>
$(document).ready(function() {

    $('#courseFormValidation').bootstrapValidator({
 
        fields: {
            qualificationName: {
        
                validators: {
                    notEmpty: {
                        message: 'Qualification name is required'
                    },
                 
                   
                }
            },
            coureName: {
        
                validators: {
                    notEmpty: {
                        message: 'Course name is required'
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

    $('#validateCourseNameUpdateForm').bootstrapValidator({

        fields: {
            editQualificationName: {
        
                validators: {
                    notEmpty: {
                        message: 'Qualification name is required'
                    },
                 
                   
                }
            },
            editCourseName: {
        
                validators: {
                    notEmpty: {
                        message: 'Course name is required'
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
		function setDataFunction(id,course_name,qualification_name){

			$('#rid').val(id);  
			$('#editQualificationName').val(qualification_name).trigger('change');
			$('#editCourseName').val(course_name);
			$('#editModal').modal('show');
			
		}
	</script>