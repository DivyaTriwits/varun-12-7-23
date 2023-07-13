
<!-- Main Content-->
<div class="main-content pt-5 mt-5">
	<div class="container-fluid">

		<!-- Page Header -->
		<!-- <div class="page-header"> -->
		<!-- 	<div class="text-wrap">
				<div class="example">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb breadcrumb-style1 mg-b-0">

							<li class="breadcrumb-item">
								<a href="<?php echo base_url('scholarship')?>">Scholarship</a>
							</li>
							<li class="breadcrumb-item">
								<a href="<?php echo base_url('scholarship-list')?>">Scholarship List</a></li>
								<li class="breadcrumb-item active">Update Scholarship Form</li>
							</ol>
						</nav>
					</div>
				</div> -->

				<div class="row">
					<div class="col-lg-12 col-md-12">
						<div class="card">
							<div class="card-body">
								<div>
									<h6 class="main-content-label mb-1">View More Scholarship</h6>

								</div><br>
								<form  id="scholarshipForm" method="POST" enctype="multipart/form-data" action="<?php echo base_url('edit-scholarship/'.$this->uri->segment(2))?>">
									<input readonly type="hidden" name="scholarshipId" value="<?php if($getscholarships!='') echo $getscholarships->scholarship_id ?>">
									<div class="row">
										<div class="col-lg-4 form-group">
											<label class="form-label">Scholarship Type  </label>
											
											<select disabled="" class="form-control select2" name="scholarship_type">
												<option label="Choose one">
												</option>
												<option value="Educational Based"<?php if($getscholarships!='')echo ($getscholarships->scholarship_type == 'Educational Based')? 'selected' :''; ?>>Educational Based
												</option>
												<option value="Talent Based" <?php  if($getscholarships!='') echo ($getscholarships->scholarship_type == 'Talent Based')? 'selected' :''; ?>>Talent Based
												</option>
												<option value="Special Abled"<?php  if($getscholarships!='') echo ($getscholarships->scholarship_type == 'Special Abled')? 'selected' :''; ?>>Special Abled
												</option>
												<option value="All"<?php  if($getscholarships!='') echo ($getscholarships->scholarship_type == 'All')? 'selected' :''; ?>>All
												</option>
											</select>
										</div>
										<div class="col-lg-4 form-group">

											<label class="form-label">Scholarship Name  </label>
											<input readonly class="form-control" name="scholarship_name" placeholder=" " required="" type="text"value="<?php if($getscholarships!=''){echo $getscholarships->scholarship_name;}?>"  >
										</div>
										<div class="col-lg-4 form-group">
											<label class="form-label">Application Start Date  </label>
											<input readonly class="form-control" name="application_start_date" required="" type="date" value="<?php if($getscholarships!=''){echo $getscholarships->application_start_date;}?>" >
										</div>
										<div class="col-lg-4 form-group">
											<label class="form-label">Application End Date  </label>
											<input readonly class="form-control" name="application_end_date" required="" type="date" value="<?php if($getscholarships!=''){echo $getscholarships->application_end_date;}?>" >
										</div>
										<div class="col-lg-4 form-group">
											<label class="form-label">Scholarship Provider  </label>
											<input readonly class="form-control" name="scholarship_provider" placeholder="Enter scholarship provider name" required="" type="text" value="<?php if($getscholarships!=''){echo $getscholarships->scholarship_provider;}?>" >
										</div>
										<div class="col-lg-4 form-group">
											<label class="form-label">Scholarship Worth  </label>
											<input readonly class="form-control" name="scholarship_worth" placeholder="Enter scholarship worth" required="" type="text" value="<?php if($getscholarships!=''){echo $getscholarships->scholarship_worth;}?>" >
										</div>
										<!-- </div> -->
										<div class="col-lg-4 form-group">
											<label class="form-label">Scholarship Link  </label>
											<input readonly class="form-control" name="scholarship_link" placeholder=" "  
											type="text" value="<?php if($getscholarships!=''){echo $getscholarships->scholarship_link;}?>" >
										</div>
										<div class="col-lg-4 form-group">
											<label class="form-label">Scholarship Description  </label>

											<textarea class="form-control" name="scholarship_description" placeholder=" " required="" type="text"><?php if($getscholarships!=''){echo $getscholarships->scholarship_description;}?></textarea>
										</div>
										<!--<div class="col-lg-4 form-group">-->
										<!--	<label class="form-label">Attachment Type</label>-->
										<!--	<select disabled="" class="form-control select2-no-search" name="attachment_type" id="attachment_type"onchange="ShowHideDiv()">-->
										<!--		<option label="Choose one">-->
										<!--		</option>-->
										<!--		<option value="file">-->
										<!--			file-->
										<!--		</option>-->
										<!--		<option value="url">-->
										<!--			url-->
										<!--		</option>-->
										<!--		<option value="both">-->
										<!--			both-->
										<!--		</option>-->

										<!--	</select>-->
										<!--</div>-->
										<!--<div class="col-lg-4 form-group" id="attachment_file" style="display:none">-->
										<!--	<label class="form-label">Upload File</label>-->
										<!--	<input readonly class="form-control" name="attachment_file" placeholder=" "  -->
										<!--	type="file">-->
										<!--</div>-->
										<div class="col-lg-4 form-group">
											<label class="form-label">Add Url</label>
											<input class="form-control" name="attachment_text" placeholder=" "  
											type="text" readonly value="<?php if($getscholarshipattachments!=''){echo $getscholarshipattachments->attachment_text;}?>">
										</div>

										<div class="col-md-4">
											<div class="form-group">
												<p class="mg-b-10">Qualifications <i class="ion-help-circled" data-toggle="tooltip" title="select your studying state from list"></i></p>
												<select disabled="" class="form-control select2" multiple name="qualification[]" id="qualification">
													<option label="Choose one"></option>
													<?php if($getCourse->num_rows()>0){ foreach($getCourse->result() as $row){?>
														<option <?php if($getscholarships!='') { echo ($getscholarships->courses==$row->course_name)  ? "selected" : " ";} ?>  value="<?php echo $row->course_name;?>">
															<?php echo $row->course_name;?>
														</option>

													<?php } } ?>
													<option  value="All">
														All
													</option>
												</select>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<p class="mg-b-10">class/Course/Degree/ <i class="ion-help-circled" data-toggle="tooltip" title="Select your studying district from list"></i></p>
												<select disabled="" class="form-control select2" multiple name="current_class_or_degree" id="current_class_or_degree">
													<option label="Choose one" >
													</option>
													<?php if($getParticularCourse->num_rows()>0){ foreach($getParticularCourse->result() as $row){?>
														<option <?php if($getscholarships!='') { echo ($getscholarships->courses==$row->particular_name)  ? "selected" : " ";} ?> value="<?php echo $row->particular_name;?>">
															<?php echo $row->particular_name;?>
														</option>

													<?php } } ?>
													<option  value="All">
														All
													</option>
											<!-- 	<option <?php if($getAcademicDetails!='' ){ echo ($getAcademicDetails->current_class_or_degree!='') ? "selected" : " " ; } ?> value="<?php if($getAcademicDetails!='' && $getAcademicDetails->current_class_or_degree!='' ){echo ($getAcademicDetails->current_class_or_degree) ;} ?>" > <?php if($getAcademicDetails!='' && $getAcademicDetails->current_class_or_degree!='' ){echo ($getAcademicDetails->current_class_or_degree) ;} ?>
										</option> -->

									</select>
								</div>
							</div>
							<div class="col-lg-4 form-group">
								<label class="form-label">Is Cgpa Based </label>
								<select disabled="" class="form-control select2" name="is_cgpa_based">
									<option label="Choose one">
									</option>
									<option value="1" <?php if($getscholarships!='')echo ($getscholarships->is_cgpa_based == '1')? 'selected' :''; ?>>Yes
									</option>
									<option value="0"<?php if($getscholarships!='')echo ($getscholarships->is_cgpa_based == '0')? 'selected' :''; ?>>No
									</option>

								</select>
							</div>

							<div class="col-lg-4 form-group">
								<label class="form-label">Cgpa Type</label>
								<select disabled="" class="form-control select2" name="cgpa_type">
									<option label="Choose one">
									</option>
									<option value="CGPA 4"<?php if($getscholarships!='')echo ($getscholarships->cgpa_type =='CGPA 4')? 'selected' :''; ?>>CGPA 4 

									</option>
									<option value="CGPA 10"<?php if($getscholarships!='')echo ($getscholarships->cgpa_type =='CGPA 10')? 'selected' :''; ?>>CGPA 10 
									</option>
									<option value="Percentage"<?php if($getscholarships!='')echo ($getscholarships->cgpa_type =='Percentage')? 'selected' :''; ?>>Percentage
									</option>
								</select>
							</div>
							<div class="col-lg-4 form-group">
								<label class="form-label">10th Result</label>
								<input readonly class="form-control" name="tenth_cgpa_or_percentage" placeholder=" "  
								type="text" value="<?php if($getscholarships!=''){echo $getscholarships->tenth_cgpa_or_percentage;}?>">

							</div>
							<div class="col-lg-4 form-group">
								<label class="form-label">12th Result </label>
								<input readonly class="form-control" name="twelfth_cgpa_or_percentage" placeholder=" "  
								type="text" value="<?php if($getscholarships!=''){echo $getscholarships->twelfth_cgpa_or_percentage;}?>">

							</div>

							<div class="col-lg-4 form-group">
								<label class="form-label">Diploma Result</label>
								<input readonly class="form-control" name="diploma_cgpa_or_percentage" placeholder=" "  
								type="text" value="<?php if($getscholarships!=''){echo $getscholarships->diploma_cgpa_or_percentage;}?>">
							</div>
							<div class="col-lg-4 form-group">
								<label class="form-label">Previous Year Result</label>
								<input readonly class="form-control" name="previous_year_cgpa_or_percentage" placeholder=" "  
								type="text"value="<?php if($getscholarships!=''){echo $getscholarships->previous_year_cgpa_or_percentage;}?>">
							</div>
							<div class="col-lg-4 form-group">
								<label class="form-label">Domicile</label>


								<select disabled="" class="form-control select2" multiple name="domicile[]" id="domicile" required>
									<option label="Choose one">
									</option>

									<?php if($states->num_rows()>0){ foreach($states->result() as $row){?>
										<option <?php if($getscholarships!='') { echo ($getscholarships->domicile==$row->name)  ? "selected" : " ";} ?>  value="<?php echo $row->name;?>">
											<?php echo $row->name;?>
										</option>

									<?php } } ?>

									<option  value="All">
										All
									</option>
								</select>

								<!-- 	<input readonly class="form-control" name="domicile" placeholder=" " required="" type="text"value="<?php if($getscholarships!=''){echo $getscholarships->domicile;}?>"> -->



							</div>
							<div class="col-lg-4 form-group">
								<label class="form-label">District</label>
								<!-- <input readonly class="form-control" name="domicile" placeholder=" " required="" type="text"> -->

								<select disabled="" class="form-control select2" multiple name="cities[]" id="cities" required>
									<option label="Choose one">
									</option>

									<?php if($getCities->num_rows()>0){ foreach($getCities->result() as $row){?>
										<option  value="<?php echo $row->city;?>">
											<?php echo $row->city;?>
										</option>

									<?php } } ?>

									<option  value="All">
										All
									</option>
								</select>


							</div>
							<div class="col-md-4">
								<div class="form-group">
									<p class="mg-b-10">Religion</p>
									<select disabled="" class="form-control select2" id="select-religion" multiple name="religion[]">
										<option label="Choose one">
										</option>
										<option value="Muslim"<?php if($getscholarships!='') echo ($getscholarships->religion =='Muslim')? 'selected' :''; ?>>Muslim
										</option>
										<option value="Hindu"<?php if($getscholarships!='')echo ($getscholarships->religion =='Hindu')? 'selected' :''; ?>>Hindu
										</option>
										<option value="Christian"<?php if($getscholarships!='')echo ($getscholarships->religion =='Christian')? 'selected' :''; ?>>Christian
										</option>
										<option value="Jain"<?php if($getscholarships!='')echo ($getscholarships->religion =='Jain')? 'selected' :''; ?>>Jain
										</option>
										<option value="Parsi"<?php if($getscholarships!='')echo ($getscholarships->religion =='Parsi')? 'selected' :''; ?>>Parsi
										</option>
										<option value="Buddhist"<?php if($getscholarships!='')echo ($getscholarships->religion =='Buddhist')? 'selected' :''; ?>>Buddhist
										</option>
											<option value="All"<?php if($getscholarships!='')echo ($getscholarships->religion =='All')? 'selected' :''; ?>>All
										</option>

									</select>
								</div>
							</div>

							<div class="col-lg-4 form-group">
								<label class="form-label">category </label>
								<select disabled="" class="form-control select2" multiple id="select-category" name="category[]">
									<option label="Choose one">
									</option>
									<option value="GM"<?php if($getscholarships!='')echo ($getscholarships->category =='GM')? 'selected' :''; ?>>GM
									</option>
									<option value="2A"<?php if($getscholarships!='')echo ($getscholarships->category =='GM')? 'selected' :''; ?>>2A
									</option>
									<option value="2B"<?php if($getscholarships!='')echo ($getscholarships->category =='GM')? 'selected' :''; ?>>2B
									</option>
									<option value="3A"<?php if($getscholarships!='')echo ($getscholarships->category =='GM')? 'selected' :''; ?>>3A
									</option>
									<option value="3B"<?php if($getscholarships!='')echo ($getscholarships->category =='GM')? 'selected' :''; ?>>3B
									</option>
									<option value="OBC/BC/OC"<?php if($getscholarships!='')echo ($getscholarships->category =='OBC/BC/O')? 'selected' :''; ?>>OBC/BC/O
									</option>
									<option value="UR"<?php if($getscholarships!='')echo ($getscholarships->category =='UR')? 'selected' :''; ?>>UR
									</option>
								</select>
							</div>

							<div class="col-lg-4 form-group">
								<label class="form-label">Hosteller/Day Scholar</label>

								<select disabled="" class="form-control select2" name="is_hosteller">
									<option label="Choose one">
									</option>
									<option value="Hosteller"<?php if($getscholarships!='')echo ($getscholarships->is_hosteller =='Hosteller')? 'selected' :''; ?>>Hosteller
									</option>
									<option value="Day Scholar"<?php if($getscholarships!='')echo ($getscholarships->is_hosteller =='Hosteller')? 'selected' :''; ?>>Hosteller
									</option>
									<option value="Both"<?php if($getscholarships!='')echo ($getscholarships->is_hosteller =='Both')? 'selected' :''; ?>>Both
									</option>
								</select>
							</div>
							<div class="col-lg-4 form-group">
								<label class="form-label">gender</label>
								<select disabled="" class="form-control select2-no-search" multiple name="gender[]" id=gender>
									<option label="Choose one">
									</option>
												<!-- <option value="Female"<?php if($getscholarships!='')echo ($getscholarships->gender =='Female')? 'selected' :''; ?>>Female
												</option>
												<option value="Male"<?php if($getscholarships!='')echo ($getscholarships->gender =='Male')? 'selected' :''; ?>>Male
												</option>
												<option value="Transgender"<?php if($getscholarships!='')echo ($getscholarships->gender =='Transgender')? 'selected' :''; ?>>Transgender
												</option>
												<option value="All"<?php if($getscholarships!='')echo ($getscholarships->gender =='All')? 'selected' :''; ?>>All
												</option> -->
												<option value="Female">
													Female
												</option>
												<option value="Male">
													Male
												</option>
												<option value="Transgender">
													Transgender
												</option>
												<option value="All">
													All
												</option>
											</select>
										</div>
										<div class="col-lg-4 form-group">
											<label class="form-label">Minimum Age</label>
											<input readonly class="form-control" name="minimum_age" placeholder="Enter minimum age"  type="number" value="<?php if($getscholarships!=''){echo $getscholarships->minimum_age;}?>">
										</div>
										<div class="col-lg-4 form-group">
											<label class="form-label">Maximum Age </label>
											<input readonly class="form-control" name="maximum_age" placeholder="Enter maximum age" required="" type="number" value="<?php if($getscholarships!=''){echo $getscholarships->maximum_age;}?>">
										</div>
										<div class="col-lg-4 form-group">
											<label class="form-label">Parent Occupation </label>
											<select disabled="" class="form-control select2" multiple name="parent_occupation[]"id="parent_occupation">
												<option label="Choose one">
													<?php foreach ($getparentoccupation as $parent):?>
														<?php if($parent->id == $parent->occupation_name) { ?>
															<option value="<?php echo $parent->occupation_name?>" selected><?php echo $parent->occupation_name?></option>
														<?php } else {?>
															<option value=<?php echo $parent->id;?>><?php echo $parent->occupation_name;?>
														</option>
													<?php }?>
												<?php endforeach;?>
											</option>
										</select>

									</div>

									<div class="col-lg-4 form-group">
										<label class="form-label">Family Annual Income</label>

										<input readonly class="form-control" name="family_annual_income" placeholder=" " required="" type="text"value="<?php if($getscholarships!=''){echo $getscholarships->family_annual_income;}?>">
									</div>
									<div class="col-lg-4 form-group">
										<label class="form-label">Talent in</label>
										<select disabled="" class="form-control select2" name="talent" id="talent">
											<option label="Choose one">
											</option>
											<?php if($talentIn->num_rows()>0){foreach ($talentIn->result() as $row){  ?>
												<option <?php if($getscholarships!='') { echo ($getscholarships->domicile==$row->activity_type)  ? "selected" : " ";} ?> value="<?php echo $row->activity_type;?>">
													<?php echo $row->activity_type;?>
												</option>

											<?php } } ?>

										</select>

										

									</div>
									<div class="col-lg-4 form-group">
										<label class="form-label">Special Talent</label>
										<select disabled="" class="form-control select2"  multiple name="special_talent[]" id="special_talent">
											<option label="Choose one">
											</option>

										</select>

									</div>

									<div class="col-lg-4 form-group">
										<label class="form-label">Disability Type </label>
										<select disabled="" class="form-control select2" multiple name="disability_type[]">
											<option label="Choose one">
												<?php foreach ($getdisabilitytype as $type):?>
													<?php if($type->id == $type->disability_name) { ?>
														<option value="<?php echo $type->disability_name?>" selected><?php echo $type->disability_name?></option>
													<?php } else {?>
														<option value=<?php echo $type->id;?>><?php echo $type->disability_name;?>
													</option>
												<?php }?>
											<?php endforeach;?>
										</option>
										
									</select>
								</div>
								<div class="col-lg-4 form-group">
									<label class="form-label">Disability Type Percenatge</label>
									<input readonly class="form-control" name="disability_percentage" placeholder="" required="" type="text"value="<?php if($getscholarships!=''){echo $getscholarships->disability_percentage;}?>">
								</div>

								<div class="col-lg-4 form-group">
									<label class="form-label">Is For Orphans</label>
									<select disabled="" class="form-control select2-no-search" name="is_for_orphans">
										<option label="Choose one">
										</option>
										<option value="1" <?php if($getscholarships!='')echo ($getscholarships->is_for_orphans == '1')? 'selected' :''; ?>>Yes
										</option>
										<option value="0"<?php if($getscholarships!='')echo ($getscholarships->is_for_orphans == '0')? 'selected' :''; ?>>No
										</option>
									</select>
								</div>
								<div class="col-lg-4 form-group">
									<label class="form-label">Is Single Child</label>

									<select disabled="" class="form-control select2-no-search" name="is_for_single_child">
										<option label="Choose one">
										</option>
										<option value="1" <?php if($getscholarships!='')echo ($getscholarships->is_for_single_child == '1')? 'selected' :''; ?>>Yes
										</option>
										<option value="0"<?php if($getscholarships!='')echo ($getscholarships->is_for_single_child == '0')? 'selected' :''; ?>>No
										</option>
									</select>
								</div>
								<div class="col-lg-4 form-group">
									<label class="form-label">Is For Single Girl Child</label>
									<select disabled="" class="form-control select2-no-search" name="is_for_single_girl_child">
										<option label="Choose one">
										</option>
										<option value="1" <?php if($getscholarships!='')echo ($getscholarships->is_for_single_girl_child == '1')? 'selected' :''; ?>>Yes
										</option>
										<option value="0"<?php if($getscholarships!='')echo ($getscholarships->is_for_single_girl_child == '0')? 'selected' :''; ?>>No
										</option>
									</select>
								</div>

							</div>
							<!-- <button style="background-color: #ff7f45; border-color: #ff7f45" type="Submit" class="btn ripple btn-primary float-right">Submit</button> -->
						</form>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<?php if($this->session->flashdata('add-success')){?>		
	<Script>
		swal({
			title: 'Well done!',
			text: 'Scholarship update successfully..',
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
        				message: 'The scholarship type is required'
        			}
        		}
        	},
        	scholarship_name: {
        		validators: {
        			notEmpty: {
        				message: 'The scholarship name is required'
        			}
        		}
        	},
        	
        	application_start_date: {
        		validators: {
        			notEmpty: {
        				message: 'The scholarship start date is required'
        			}
        		}
        	},
        	application_end_date: {
        		validators: {
        			notEmpty: {
        				message: 'The scholarship start end is required'
        			}
        		}
        	},      	
        	scholarship_provider: {
        		validators: {
        			notEmpty: {
        				message: 'The scholarship provider name is required'
        			}
        		}
        	}, 
        	scholarship_worth: {
        		validators: {
        			notEmpty: {
        				message: 'The scholarship worth is required'
        			}
        		}
        	},
        	scholarship_link: {
        		validators: {
        			notEmpty: {
        				message: 'The scholarship link is required'
        			}
        		}
        	},
        	scholarship_description: {
        		validators: {
        			notEmpty: {
        				message: 'The scholarship description is required'
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
			text: 'Link created for institution..',
			type: 'success',
			timer: 3000,
			showConfirmButton: false
		});
	</Script>
<?php }?>



<script type="text/javascript">
	$(document).ready(function() {
		$('#attachment_type').on('change.attachment_file', function() {
			$("#attachment_file").toggle($(this).val() == 'file'||$(this).val() == 'both');
		}).trigger('change.attachment_file');
	});
</script>

<script type="text/javascript">
	$(document).ready(function() {
		$('#attachment_type').on('change.attachment_text', function() {
			$("#attachment_text").toggle($(this).val() == 'url'||$(this).val() == 'both');
		}).trigger('change.attachment_text');
	});


</script>

<script type="text/javascript">
	$(document).ready(function() {
		$('#scholarship_type').change(function() {
			if( $(this).val() == 'Talent Based') {
				$('#religion').prop( "disabled", true );
				$('#category').prop("disabled",true);




			} 
			else if($(this).val() == 'Educational Based') {       
				$('#religion').prop( "disabled", false );
				$('#category').prop("disabled",false);
			}

			else if($(this).val() == 'Special Abled') {       
				$('#religion').prop( "disabled", false );
				$('#category').prop("disabled",false);
			}

			else if($(this).val() == 'All' ) {       
				$('#religion').prop( "disabled", false );
				$('#category').prop("disabled",false);
			}

			else{
				$('#semester').prop( "disabled", false );
				$('#document').prop("disabled",false);
			}
		});

	});  
</script>



<script type="text/javascript">
	$(document).ready(function(){
		$('#talent').change(function(){ 
			var id=$(this).val();
			$.ajax({

				url : "<?php echo site_url('get-special-talent-list');?>",
				method : "POST",
				data : {id: id},
				async : true,
				dataType : 'json',
				success: function(data){

					var html = '';
					var i;
					for(i=0; i<data.length; i++){

						html += '<option value="'+data[i].student_activity_name+'">'+data[i].student_activity_name+'</option>';

					}
					$('#special_talent').html(html);
				}
			});
			return false;
		}); 
	});
</script>


<script type="text/javascript">


$('#select-religion').val( <?php if($getscholarships!='') {echo $getscholarships->religion;}?>); // Select the option with a value of '1'
$('#select-religion').trigger('change');



$('#select-category').val( <?php if($getscholarships!='') {echo $getscholarships->category;}?>); // Select the option with a value of '1'
$('#select-category').trigger('change');


$('#select-courses').val( <?php if($getscholarships!='') {echo $getscholarships->courses;}?>); // Select the option with a value of '1'
$('#select-courses').trigger('change');

$('#domicile').val( <?php if($getscholarships!='') {echo $getscholarships->domicile;}?>); // Select the option with a value of '1'
$('#domicile').trigger('change');

$('#cities').val( <?php if($getscholarships!='') {echo $getscholarships->cities;}?>); // Select the option with a value of '1'
$('#cities').trigger('change');

$('#gender').val( <?php if($getscholarships!='') {echo $getscholarships->gender;}?>); // Select the option with a value of '1'
$('#gender').trigger('change');

$('#special_talent').val( <?php if($getscholarships!='') {echo $getscholarships->special_talent;}?>); // Select the option with a value of '1'
$('#special_talent').trigger('change');

$('#parent_occupation').val( <?php if($getscholarships!='') {echo $getscholarships->parent_occupation;}?>); // Select the option with a value of '1'
$('#parent_occupation').trigger('change');


$('#qualification').val( <?php if($getscholarships!='') {echo $getscholarships->courses;}?>); // Select the option with a value of '1'
$('#qualification').trigger('change');

$('#current_class_or_degree').val( <?php if($getscholarships!='') {echo $getscholarships->current_class_or_degree;}?>); // Select the option with a value of '1'
$('#current_class_or_degree').trigger('change');
</script> 