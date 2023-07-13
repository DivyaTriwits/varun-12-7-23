
<!-- Main Content-->
<div class="main-content pt-5 mt-4">
	<div class="container-fluid">

		<!-- Page Header -->
		<!-- <div class="page-header"> -->
		<!-- 	<div class="text-wrap">
				<div class="example">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb breadcrumb-style1 mg-b-0">

							<li class="breadcrumb-item">
								<a href="<?php echo base_url()?>">Support</a>
							</li>
							<li class="breadcrumb-item">
								<a href="<?php echo base_url('scholarship')?>">Scholarship</a></li>
								<li class="breadcrumb-item active">Add Scholarship Form</li>
							</ol>
						</nav>
					</div>
				</div> -->

				<div class="row">
					<div class="col-lg-12 col-md-12">
						<div class="card">
							<div class="card-body">
								<div>
								</div><br>
								<form  id="scholarshipForm" method="POST"  action="<?php echo base_url('update-institutional-scholarship-details')?>">
									
									<div class="row">
									
										<div class="col-lg-4 form-group">

											<label class="form-label">Scholarship Name <span class="tx-danger">*</span> </label>
											<input class="form-control" name="scholarship_name" placeholder=" "   type="text" value="<?php if($scholarshipDetails!=''){echo $scholarshipDetails->scholarship_name; }?>" required>
											<input class="form-control" name="scholarshipId" id="scholarshipId" placeholder=" "   type="hidden" value="<?php if($scholarshipDetails!=''){echo $scholarshipDetails->scholarship_id; }?>" required>


										</div>

											<!-- </div> -->
										<div class="col-lg-4 form-group">
											<label class="form-label">website Link <span class="tx-danger">*</span> </label>
											<input class="form-control" name="scholarship_link" placeholder=" "  
											type="text" value="<?php if($scholarshipDetails!=''){echo $scholarshipDetails->website_link; }?>" required>
										</div>

										<div class="col-lg-4 form-group">
											<label class="form-label">Application Start Date <span class="tx-danger">*</span> </label>
											<input class="form-control" name="application_start_date"   type="date"  value="<?php if($scholarshipDetails!=''){echo $scholarshipDetails->start_date; }?>" required>
										</div>

										<div class="col-lg-4 form-group">
											<label class="form-label">Application Last Date <span class="tx-danger">*</span> </label>
											<input class="form-control" name="application_end_date"   type="date"  value="<?php if($scholarshipDetails!=''){echo $scholarshipDetails->last_date; }?>" required>
										</div>
									
										
									

										
										
										
			

							<div class="col-lg-4 form-group">
								<label class="form-label">Institutin Name<span class="tx-danger">*</span> </label>
								<select class="form-control select2"  name="institutionId" id="institutionId"  required>
									<option label="Choose one">
									</option>

									<?php if($institutionDetails->num_rows()>0){ foreach($institutionDetails->result() as $row){?>
										<option  <?php if($scholarshipDetails!=''){echo ($scholarshipDetails->institution_id== $row->institute_userid ) ? 'selected' : ' ';}?>  value="<?php echo $row->institute_userid;?>">
											<?php echo $row->institute_name;?>
										</option>
									<?php } } ?>
								

								</select>


							</div>
			

					</div>

						<div class="row">
					

								<div class="col-lg-12">
									<div class="form-group">
										<label for="password">Criteria</label>
										<textarea class="form-control"  name="criteria" id="summernote" required placeholder="Enter description"><?php if($scholarshipDetails!=''){echo $scholarshipDetails->criteria; }?> </textarea>
									</div>
								</div>




						</div>

					<button style="background-color: #ff7f45; border-color: #ff7f45" type="Submit" class="btn ripple btn-primary float-right">Update</button>
				</form>

				

			</div>
		</div>
	</div>
</div>		<div class="row">
				<div class="col-lg-12 col-md-12">
					<div class="card">
						<div class="card-body">
	
								<div  class="table-responsive ">
									<table  id="exportexample" class="table table-striped table-bordered text-nowrap" >
										<thead>
											<tr>
												<th>Sl No.</th>
												
												<th>Download</th>
												<th>Upload</th> 

											</tr>
										</thead>
										<tbody>
											<?php if($document->num_rows()>0){$i=1; foreach($document->result() as $row ){ ?>

												<tr>

													<td><?php echo $i;?></td>
													
													<td><a  download href="<?php echo base_url()?>attachment_files/institution_scholarship_files/<?php echo $row->file?>"><button class="btn btn-success">Download</button> </a></td>
													<td><a style="font-size: 30px;" 

															 onclick="setDataFunction('<?php echo $row->scholarship_refer_id;?>','<?php echo $row->file;?>','<?php echo $row->file_id;?>'
                                                      
                                                          )"





														><i class="ion ion-upload"></i></a></td>
																						
												 </tr>
												

									
											<?php $i=$i+1;} } ?>	

										</tbody>
									</table>
								</div>


					</div>
				</div>
			</div>
		</div>	
	


		<!-- Large Modal -->
			<div class="modal fade" id="myModal">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content modal-content-demo">
						<div class="modal-header">
							<h6 class="modal-title">Update Scholarship Document</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
						</div>
						<div class="modal-body">
							
						
							<form  id="updateTaskDetails" method="post" enctype="multipart/form-data" action="<?php echo base_url()?>update-scholarship-document">

							
									<div class="row">
									
										<div class="col-lg-6 form-group">
											<label class="form-label">Upload File </label>
											<input class="form-control" name="scholarshipDocument" id="scholarshipDocument" autocomplete="off"  type="file" required >
											<input class="form-control" name="scholarshipIdForFileUpload" id="scholarshipIdForFileUpload" autocomplete="off"  type="text" >
											<input class="form-control" name="oldFile" id="oldFile" autocomplete="off"  type="text" >
											<input class="form-control" name="fileId" id="fileId" autocomplete="off"  type="text" >
										</div>	

									</div>


	
								

						<div class="modal-footer">
							<button style="background-color: #ff7f45; border-color: #ff7f45" type="submit" class="btn ripple btn-primary float-right">Update</button>
							
							<button class="btn ripple btn-outline-light" data-dismiss="modal" type="button">Close</button>
						</div>
							</form>	

						
					

				
						</div>
					
					</div>
				</div>
			</div>
			<!--End Large Modal -->
</div>
</div>



<?php if($this->session->flashdata('institution-scholarship-update-success')){?>		
	<Script>
		swal({
			title: 'Well done!',
			text: 'institution scholarship details update successfully..',
			type: 'success',
			timer: 3000,
			showConfirmButton: false
		});
	</Script>
<?php }?>
<script>
	$(document).ready(function() {
		$('#scholarshipForm').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        // feedbackIcons: {
        // 	valid: 'glyphicon glyphicon-ok',
        // 	invalid: 'glyphicon glyphicon-remove',
        // 	validating: 'glyphicon glyphicon-refresh'
        // },
        fields: {
        	scholarship_type: {
        		validators: {
        			notEmpty: {
        				message: 'The scholarship type is '
        			}
        		}
        	},
        	scholarship_name: {
        		validators: {
        			notEmpty: {
        				message: 'The scholarship name is '
        			}
        		}
        	},
        	
        	application_start_date: {
        		validators: {
        			notEmpty: {
        				message: 'The scholarship start date is '
        			}
        		}
        	},
        	application_end_date: {
        		validators: {
        			notEmpty: {
        				message: 'The scholarship end date is '
        			}
        		}
        	},      	
        	scholarship_provider: {
        		validators: {
        			notEmpty: {
        				message: 'The Scholarship Provider name is '
        			}
        		}
        	}, 
        	scholarship_worth: {
        		validators: {
        			notEmpty: {
        				message: 'The Scholarship worth is '
        			}
        		}
        	},
        	scholarship_link: {
        		validators: {
        			notEmpty: {
        				message: 'The Scholarship link is '
        			}
        		}
        	},
        	scholarship_description: {
        		validators: {
        			notEmpty: {
        				message: 'The Scholarship description is '
        			}
        		}
        	},                  
        }
    }).on('success.form.bv', function(e) {
    	$(this)[0].submit();
    });
});
</script>

<?php if($this->session->flashdata('success')){?>		
	<Script>
		swal({
			title: 'Well done!',
			text: 'Link Created for Institution..',
			type: 'success',
			timer: 3000,
			showConfirmButton: false
		});
	</Script>
<?php }?>







	<script>

    function setDataFunction(scholarship_id, file,file_id) {
      
         $('#scholarshipIdForFileUpload').val(scholarship_id);
        $('#oldFile').val(file);
        $('#fileId').val(file_id);
      


         
        $('#myModal').modal('show');
    }
	</script>


