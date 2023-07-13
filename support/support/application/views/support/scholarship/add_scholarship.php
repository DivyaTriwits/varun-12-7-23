<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
 
.form-group {
      margin-bottom: 10px;
    }
  #addFieldButton {
    border-radius: 20%;
    border-color: #FF7F50;
    width: 100px;
    height: 40px;
    font-size: 15px;
    font-weight: bold;
    cursor: pointer;
    background-color: #FF7F50;
    color: white;
  }
    #addFieldButton:hover{

background-color: #FF6347;

    }
</style>
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
								<form  id="scholarshipForm" method="POST" enctype="multipart/form-data" action="<?php echo base_url('add-scholarship')?>">
									
									<div class="row">
										<div class="col-lg-4 form-group">
											<label class="form-label">Scholarship Type<span class="tx-danger">*</span></label>
											
											<select class="form-control select2" name="scholarship_type" id="scholarship_type">
												<option selected="" disabled="">Select Scholarship Type
												</option>
												<option value="Educational Based">
													Educational Based
												</option>
												<option value="Talent Based">
													Talent Based
												</option>
												<option value="Special Abled">
													Special Abled
												</option>
												
												<option value="Internship">Internship</option>
												<option value="Community Based">Community Based</option>
												<option value="Athlete Based">Sports</option>
												<option value="Talent & Athletics">Talent & Athletics</option>
												<option value="Abroad">Abroad</option>
												<option value="Competitions and Awards">Competitions and Awards</option>
													<option value="Scholarship">Scholarship</option>
												<option value="All">
												    	
													All
												</option>
											</select>
										</div>
										<div class="col-lg-4 form-group">

											<label class="form-label">Scholarship Name <span class="tx-danger">*</span> </label>
											<input class="form-control" name="scholarship_name" placeholder=" "   type="text">
										</div>
										<div class="col-lg-4 form-group">
											<label class="form-label">Application Start Date <span class="tx-danger">*</span> </label>
											<input class="form-control" name="application_start_date"   type="date">
										</div>
										<div class="col-lg-4 form-group">
											<label class="form-label">Application End Date <span class="tx-danger">*</span> </label>
											<input class="form-control" name="application_end_date"   type="date">
										</div>
										<div class="col-lg-4 form-group">
											<label class="form-label">Scholarship Provider<span class="tx-danger">*</span>  </label>
											<input class="form-control" name="scholarship_provider" placeholder="Enter scholarship provider name"   type="text">
										</div>
										<div class="col-lg-4 form-group">
											<label class="form-label">Scholarship Worth  </label>
											<input class="form-control" name="scholarship_worth" placeholder="Enter scholarship worth"   type="text">
										</div>
										
										<div class="col-lg-4 form-group">
											<label class="form-label">Scholarship Link <span class="tx-danger">*</span> </label>
											<input class="form-control" name="scholarship_link" placeholder=" "  
											type="text">
										</div>
										<div class="col-lg-4 form-group">
											<label class="form-label">Scholarship Description<span class="tx-danger">*</span> </label>

											<textarea class="form-control" name="scholarship_description" placeholder=" "   type="text"></textarea>
										</div>
										<div class="col-lg-4 form-group">
											<label class="form-label">List Of Eligibility</label>

											<textarea class="form-control" name="eligibility" placeholder=" "   type="text"></textarea>
										</div>
										<div class="col-lg-4 form-group">
											<label class="form-label"> List of Benifits</label>

											<textarea class="form-control" name="list_of_benifits" placeholder=" "   type="text"></textarea>
										</div>
										<div class="col-lg-4 form-group">
											<label class="form-label">Scholarship Documents </label>

											<textarea class="form-control" name="scholarship_documents" placeholder=" "   type="text"></textarea>
										</div>
										
										<div class="col-lg-4 form-group">
											<label class="form-label">Benifits of Scholarship<span class="tx-danger">*</span> </label>
											<textarea class="form-control" name="benefits" placeholder=" "   type="text"></textarea>
										</div>
										<!--<div class="col-lg-4 form-group">
											<label class="form-label">Attachment Type </label>
											<select class="form-control select2-no-search" name="attachment_type" id="attachment_type"onchange="ShowHideDiv()">
												<option selected="" disabled="">Select
												</option>
												<option value="file">
													file
												</option>
												<option value="url">
													url
												</option>
												<option value="both">
													both
												</option>

											</select>
										</div>-->
										<div class="col-lg-4 form-group" id="attachment_file" style="display:none">
											<label class="form-label">Upload File </label>
											<input class="form-control" name="attachment_file" placeholder=" "  
											type="file">
										</div>
										<div class="col-lg-4 form-group" id="attachment_text" style="display:none">
											<label class="form-label">Add Url </label>
											<input class="form-control" name="attachment_text" id="attachment_text"  
											type="text">
										</div>
                                          
										<div class="col-md-4">
											<div class="form-group">
												<p class="mg-b-10">Qualifications </p>
												<select class="form-control add-scholarship-select2" multiple name="qualification[]" id="qualification">
													<option label="Choose one"></option>
													<option  value="All">All</option>
													<?php if($getCourse->num_rows()>0){ foreach($getCourse->result() as $row){?>
														<option value="<?php echo $row->course_name;?>">
															<?php echo $row->course_name;?>
														</option>

													<?php } } ?>
													
												</select>
											</div>
										</div>
									<!--	<div class="col-md-4">
											<div class="form-group">
												<p class="mg-b-10">Class/Course/Degree/</p>
												<select class="form-control add-scholarship-select2" multiple name="current_class_or_degree[]" id="current_class_or_degree">
													<option label="Choose one"></option>
													<option  value="All">All</option>
													<option  value="Bachelors (All)">Bachelors (All)</option>
													<option  value="B.Tech (All)">B.Tech (All)</option>
													<option  value="B.E (All)">B.E (All)</option>
													<option  value="Masters (All)">Masters (All)</option>
													<option  value="Diploma in Technical (All)">Diploma in Technical (All)</option>
													<option  value="Diploma in Health (All)">Diploma in Health (All)</option>
													<option  value="PHD (All)">PHD (All)</option> 
													<option  value="PG Diploma (All)">PG Diploma (All)</option> 
													<optgroup label="Old Courses">
														<option value="Advanced Diploma In Fashion Design">Advanced Diploma In Fashion Design</option>
														<option value="Bachelor Of Applied Sciences - B.A.S">Bachelor Of Applied Sciences - B.A.S</option>
														<option value="Bachelor Of Architecture - B.Arch">Bachelor Of Architecture - B.Arch</option>
														<option value="Bachelor Of Arts - B.A">Bachelor Of Arts - B.A</option>
														<option value="Bachelor Of Arts Bachelor Of Law - B.A.B.L">Bachelor Of Arts Bachelor Of Law - B.A.B.L</option>
														<option value="Bachelor Of Ayurvedic Medicine & Surgery - B.A.M.S">Bachelor Of Ayurvedic Medicine & Surgery - B.A.M.S</option>
														<option value="Bachelor Of Business Administration - B.B.A">Bachelor Of Business Administration - B.B.A</option>
														<option value="Bachelor Of Business Management - B.B.M">Bachelor Of Business Management - B.B.M</option>
														<option value="Bachelor Of Commerce - B.Com">Bachelor Of Commerce - B.Com</option>
														<option value="Bachelor Of Computer Applications - B.C.A">Bachelor Of Computer Applications - B.C.A</option>
														<option value="Bachelor Of Computer Science - B.C.S">Bachelor Of Computer Science - B.C.S</option>
														<option value="Bachelor Of Education - B.Ed">Bachelor Of Education - B.Ed</option>
														<option value="Bachelor Of Electronic Science - B.E.S">Bachelor Of Electronic Science - B.E.S</option>
														<option value="Bachelor Of Engineering / Bachelor Of Technology - B.E / B.Tech">Bachelor Of Engineering / Bachelor Of Technology - B.E / B.Tech</option>
														<option value="Bachelor Of Fisheries Science - B.F.Sc / B.Sc (Fisheries)">Bachelor Of Fisheries Science - B.F.Sc / B.Sc (Fisheries)</option>
														<option value="Bachelor Of Homoeopathic Medicine & Surgery - B.H.M.S">Bachelor Of Homoeopathic Medicine & Surgery - B.H.M.S</option>
														<option value="Bachelor Of Medicine & Bachelor Of Surgery - M.B.B.S">Bachelor Of Medicine & Bachelor Of Surgery - M.B.B.S</option>
														<option value="Bachelor Of Nursing">Bachelor Of Nursing</option>
														<option value="Bachelor Of Pharmacy - B.pharm / B.pharma">Bachelor Of Pharmacy - B.pharm / B.pharma</option>
														<option value="Bachelor Of Science - B.Sc">Bachelor Of Science - B.Sc</option>
														<option value="Behavioral Healthcare Education - B.H.Ed">Behavioral Healthcare Education - B.H.Ed</option>
														<option value="Diploma In Automobile Engineering">Diploma In Automobile Engineering</option>
														<option value="Diploma In Ayurvedic Pharmacy">Diploma In Ayurvedic Pharmacy</option>
														<option value="Diploma In Civil Engineering">Diploma In Civil Engineering</option>
														<option value="Diploma In Computer Science And Engineering">Diploma In Computer Science And Engineering</option>
														<option value="Diploma In Dental Hygienist ">Diploma In Dental Hygienist </option>
														<option value="Diploma In Dermatology">Diploma In Dermatology</option>
														<option value="Diploma In Electrical & Communication Engineering">Diploma In Electrical & Communication Engineering</option>
														<option value="Diploma In Electrical & Electronics Engineering">Diploma In Electrical & Electronics Engineering</option>
														<option value="Diploma In Electronics And Communication Engineering">Diploma In Electronics And Communication Engineering</option>
														<option value="Diploma In Food And Nutrition">Diploma In Food And Nutrition</option>
														<option value="Diploma In Health Inspector">Diploma In Health Inspector</option>
														<option value="Diploma In Mechanical Engineering">Diploma In Mechanical Engineering</option>
														<option value="Diploma In Medical Laboratory Technology [DMLT]">Diploma In Medical Laboratory Technology [DMLT]</option>
														<option value="Diploma In Naturopathy">Diploma In Naturopathy</option>
														<option value="Diploma In Nursing">Diploma In Nursing</option>
														<option value="Diploma In Ophthalmology">Diploma In Ophthalmology</option>
														<option value="Diploma In Pharmacy [D.Pharma]">Diploma In Pharmacy [D.Pharma]</option>
														<option value="Diploma In X-ray Technology">Diploma In X-ray Technology</option>
														<option value="M.Phil. (Library & Information Science)">M.Phil. (Library & Information Science)</option>
														<option value="Master Of Business Administration - M.B.A">Master Of Business Administration - M.B.A</option>
														<option value="Master Of Commerce - M.Com">Master Of Commerce - M.Com</option>
														<option value="Master Of Computer Applications - M.C.A">Master Of Computer Applications - M.C.A</option>
														<option value="Master Of Engineering / Master Of Technology - M.E./ M.Tech">Master Of Engineering / Master Of Technology - M.E./ M.Tech</option>
														<option value="Master Of Science - M.Sc">Master Of Science - M.Sc</option>
														<option value="Master Of Science - Management">Master Of Science - Management</option>
														<option value="Master Of Surgery - M.S">Master Of Surgery - M.S</option>
														<option value="Ph.D. (Education)">Ph.D. (Education)</option>
														<option value="Ph.D. (Electronics And Telecommunication)">Ph.D. (Electronics And Telecommunication)</option>
														<option value="Ph.D. (Pharmacy)">Ph.D. (Pharmacy)</option>
													</optgroup>
													<optgroup label="New Courses">
														<?php if($getParticularCourse->num_rows()>0){ foreach($getParticularCourse->result() as $row){?>
															<option value="<?php echo $row->particular_name;?>">
																<?php echo $row->particular_name;?>
															</option>
														<?php } } ?>
													</optgroup>
													
											<!-- 	<option <?php if($getAcademicDetails!='' ){ echo ($getAcademicDetails->current_class_or_degree!='') ? "selected" : " " ; } ?> value="<?php if($getAcademicDetails!='' && $getAcademicDetails->current_class_or_degree!='' ){echo ($getAcademicDetails->current_class_or_degree) ;} ?>" > <?php if($getAcademicDetails!='' && $getAcademicDetails->current_class_or_degree!='' ){echo ($getAcademicDetails->current_class_or_degree) ;} ?>
										</option> -->

									<!--</select>
								</div>
							</div>-->
								<div class="col-lg-4 form-group">
								<label class="form-label">Courses</label>
								<textarea class="form-control" name="display_courses" id="display_courses" placeholder=" "></textarea>
							

							</div>
							<!-- <div class="col-lg-4 form-group">
								<label class="form-label">Is Cgpa Based  </label>
								<select class="form-control select2-no-search" name="is_cgpa_based">
									<option selected="" disabled="">Select
									</option>
									<option value="1">
										Yes
									</option>
									<option value="0">
										No
									</option>
								</select>
							</div>
						-->
							<!-- <div class="col-lg-4 form-group">
								<label class="form-label">Cgpa Type </label>
								<select class="form-control select2-no-search" name="cgpa_type">
									<option selected="" disabled="">Select
									</option>
									<option value="CGPA 4">
										CGPA 4 
									</option>
									<option value="CGPA 10">
										CGPA 10 
									</option>
									<option value="Percentage">
										Percentage
									</option>
								</select>
							</div> 
							<div class="col-lg-4 form-group">
								<label class="form-label">10th Result </label>
								<input class="form-control" name="tenth_cgpa_or_percentage" id="tenth_cgpa_or_percentage" placeholder=" "  
								type="text">

							</div>
							<div class="col-lg-4 form-group">
								<label class="form-label">12th Result  </label>
								<input class="form-control" name="twelfth_cgpa_or_percentage" id="twelfth_cgpa_or_percentage" placeholder=" "  
								type="text">

							</div>

							<div class="col-lg-4 form-group">
								<label class="form-label">Diploma Result </label>
								<input class="form-control" name="diploma_cgpa_or_percentage" id="diploma_cgpa_or_percentage" placeholder=" "  
								type="text">
							</div>
							<div class="col-lg-4 form-group">
								<label class="form-label">Previous Year Result </label>
								<input class="form-control" name="previous_year_cgpa_or_percentage" id="previous_year_cgpa_or_percentage" placeholder=" "  
								type="text">
							</div>
							<div class="col-lg-4 form-group">
								<label class="form-label">State </label>
								<select class="form-control add-scholarship-select2" multiple name="domicile[]" id="domicile" >
									<option label="Choose one">
									</option>
									<option  value="All">All</option>
									


								</select>


							</div>
							<div class="col-lg-4 form-group">
								<label class="form-label">Cities </label>
							

								<select class="form-control add-scholarship-select2" multiple name="cities[]" id="cities" >
								    	
									<option label="Choose one">
									</option>
									<option  value="All">All</option>
								

								</select>


							</div>
							<div class="col-md-4">
								<div class="form-group">
									<p class="mg-b-10">Religion</p>
									<select class="form-control add-scholarship-select2" multiple name="religion[]" id="religion">
										<option label="Choose one">
										</option>
										<option  value="All">All</option>
										<option value="Muslim">
											Muslim
										</option>
										<option value="Hindu">
											Hindu
										</option>
										<option value="Christian">
											Christian
										</option>
										<option value="Jain">
											Jain  
										</option>
										<option value="Parsi">
											Parsi
										</option>
										<option value="Buddhist">
											Buddhism
										</option>
										<option value="Sikh">
											Sikh
										</option>
										

									</select>
								</div>
							</div>

							<div class="col-lg-4 form-group">
								<label class="form-label">category  </label>
								<select class="form-control add-scholarship-select2" multiple name="category[]" id="category">
									<option label="Choose one">
									</option>
									<option value="All">
										All
									</option>
									<option value="GM">
										GM
									</option>
									<option value="2A">
										2A
									</option>
									<option value="2B">
										2B
									</option>
									<option value="3A">
										3A
									</option>
									<option value="3B">
										3B
									</option>
									<option value="SC">SC
											</option>
									<option value="ST">ST
											</option>
									<option value="OBC/BC">
										OBC/BC
									</option>
									<option value="OC">
										OC
									</option>
									<option value="UR">
										UR
									</option>
									
								</select>
							</div>

							<div class="col-lg-4 form-group">
								<label class="form-label">Hosteller/Day Scholar </label>

								<select class="form-control select2-no-search" name="is_hosteller">
									<option selected="" disabled="">Select
									</option>
									<option value="Hosteller">
										Hosteller
									</option>
									<option value="Day Scholar">
										Day Scholar
									</option>
									<option value="Both">
										Both
									</option>
								</select>
							</div>
							<div class="col-lg-4 form-group">
								<label class="form-label">Gender </label>

								<select class="form-control select2-no-search" multiple name="gender[]" id="gender">
									<option label="Choose one">
									</option>
									<option  value="All">All</option>
									<option value="Female">
										Female
									</option>
									<option value="Male">
										Male
									</option>
									<option value="Transgender">
										Transgender
									</option>
									
								</select>
							</div>
							<div class="col-lg-4 form-group">
								<label class="form-label">Minimum Age </label>
								<input class="form-control" name="minimum_age" placeholder="Enter minimum age"  type="number">
							</div>
							<div class="col-lg-4 form-group">
								<label class="form-label">Maximum Age  </label>
								<input class="form-control" name="maximum_age" placeholder="Enter maximum age"   type="number">
							</div>
							<div class="col-lg-4 form-group">
								<label class="form-label">Parent Occupation  </label>
								<select class="form-control add-scholarship-select2" multiple name="parent_occupation[]" id="parent_occupation">
									<option label="Choose one">
									    <option  value="All">All</option>
										<?php foreach ($getparentoccupation as $parent):?>
											<option value=<?php echo $parent->occupation_name;?>><?php echo $parent->occupation_name;?>
										</option>
									<?php endforeach;?>
								</option>
							</select>
						</div>-->

						<div class="col-lg-4 form-group">
							<label class="form-label">Family Annual Income </label>

							<input class="form-control" name="family_annual_income" placeholder=" "   type="text">
						</div>
						<!--<div class="col-lg-4 form-group">
							<label class="form-label">Talent in </label>
							<select class="form-control select2-no-search" name="talent" id="talent">
								<option label="Choose one">
								</option>
								<?php if($talentIn->num_rows()>0){foreach ($talentIn->result() as $row){  ?>
									<option value="<?php echo $row->activity_type;?>">
										<?php echo $row->activity_type;?>
									</option>

								<?php } } ?>

							</select>

						</div>
						<div class="col-lg-4 form-group">
							<label class="form-label">Special Talent </label>
							<select class="form-control select2"  multiple name="special_talent[]" id="special_talent">
								<option label="Choose one">
								</option>

							</select>

						</div>


						<div class="col-lg-4 form-group">
							<label class="form-label">Disability Type  </label>
							<select class="form-control add-scholarship-select2" multiple name="disability_type[]">
								<option label="Choose one">
								</option>
								<option value="All">
									All
								</option>
								<?php if($getDisabilityType->num_rows()>0){foreach($getDisabilityType->result() as $row){?>
									<option value="<?php echo $row->disability_name;?>">
										<?php  echo $row->disability_name;?>
									</option>
								<?php } } ?>
								<option value="2">
									N/A
								</option>
							</select>
						</div>
						<div class="col-lg-4 form-group">
							<label class="form-label">Disability Type Percenatge </label>
							<input class="form-control" name="disability_percentage" placeholder=""   type="text">
						</div>


						<div class="col-lg-4 form-group">
							<label class="form-label">Is for Orphans </label>
							<select class="form-control select2-no-search" name="is_for_orphans">
								<option selected="" disabled="">Select
								</option>
								<option value="1">
									Yes
								</option>
								<option value="0">
									No
								</option>
								<option value="2">
									N/A
								</option>
							</select>
						</div>
						<div class="col-lg-4 form-group">
							<label class="form-label">Is For Single Child</label>
							<select class="form-control select2-no-search" name="is_for_single_child">
								<option selected="" disabled="">Select
								</option>
								<option value="1">
									Yes
								</option>
								<option value="0">
									No
								</option>
								<option value="2">
									N/A
								</option>
							</select>
						</div>
						<div class="col-lg-4 form-group">
							<label class="form-label">Is For Single Girl Child </label>
							<select class="form-control select2-no-search" name="is_for_single_girl_child" id="is_for_single_girl_child">
								<option selected="" disabled="">Select
								</option>
								<option value="1">
									Yes
								</option>
								<option value="0">
									No
								</option>
								<option value="2">
									N/A
								</option>
							</select>
						</div>-->
							<div class="col-lg-4 form-group">
											<label class="form-label">Watch Video Link </label>
											<input class="form-control" name="video_link" placeholder=" "  
											type="text">
										</div>
                        	<div class="col-lg-4 form-group">
											<label class="form-label">How To Apply<span class="tx-danger">*</span> </label>

											<textarea class="form-control" name="how_to_apply" placeholder=" "   type="text"></textarea>
										</div>
										 	<div class="col-lg-4 form-group">
											<label class="form-label">SEO Keyword</label>

											<textarea class="form-control" name="seo_keyword" placeholder=" "   type="text"></textarea>
										</div>
										<!-- /*changes for adding new addtitional field-- by varun-- 15 JUN*/ -->
										
										<!-- /*changes for adding new addtitional field-- by varun-- 15 JUN*/ -->

					</div>
					<div class="col-lg-4 form-group">
											<div id="fieldsContainer">
      										<div class="form-group">
     
     									 	</div>
    										</div>
    										<button type="button" id="addFieldButton">Add More</button>
    										<br><br>
										</div>
					<hr>  <h4>SEO</h4>
						<div class="row">
						  
						    <br>
						    	<div class="col-lg-3 form-group">
											<label class="form-label">Title Tag (Bellow H1 tag)</label>

											<textarea class="form-control" name="title_tag" placeholder=" "   type="text"></textarea>
										</div>
											<div class="col-lg-3 form-group">
											<label class="form-label">Title Description </label>

											<textarea class="form-control" name="title_description" placeholder=" "   type="text"></textarea>
										</div>
											<div class="col-lg-3 form-group">
											<label class="form-label">Keywords/ Meta Tags</label>

											<textarea class="form-control" name="seo_keyword" placeholder=" "   type="text"></textarea>
										</div>
											<div class="col-lg-3 form-group">
											<label class="form-label"> H1 tags</label>

											<textarea class="form-control" name="h_tags" placeholder=" "   type="text"></textarea>
										</div>
						    </div>
					<button style="background-color: #ff7f45; border-color: #ff7f45" type="Submit" class="btn ripple btn-primary float-right">Submit</button>
				</form>
			</div>
		</div>
	</div>
</div>
</div>
</div>



<?php if($this->session->flashdata('scholarship-add-success')){?>		
	<Script>
		swal({
			title: 'Well done!',
			text: 'Scholarship added successfully..',
			type: 'success',
			confirmButtonColor: '#57a94f'
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
        				message: 'The scholarship type is required '
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
        				message: 'The scholarship end date is required '
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
			text: 'Scholarship added successfully..',
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
				$('#talent').prop("disabled",false);
				$('#special_talent').prop("disabled",false);

				$('#tenth_cgpa_or_percentage').prop("disabled",true);
				$('#twelfth_cgpa_or_percentage').prop("disabled",true);
				$('#diploma_cgpa_or_percentage').prop("disabled",true);
				$('#previous_year_cgpa_or_percentage').prop("disabled",true);

				

			} 
			else if($(this).val() == 'Educational Based') {       
				$('#religion').prop( "disabled", false );
				$('#category').prop("disabled",false);
				$('#talent').prop("disabled",true);
				$('#special_talent').prop("disabled",true);

				$('#tenth_cgpa_or_percentage').prop("disabled",false);
				$('#twelfth_cgpa_or_percentage').prop("disabled",false);
				$('#diploma_cgpa_or_percentage').prop("disabled",false);
				$('#previous_year_cgpa_or_percentage').prop("disabled",false);
			}	

			else if($(this).val() == 'Special Abled') {       
				$('#religion').prop( "disabled", false );
				$('#category').prop("disabled",false);
				$('#talent').prop("disabled",false);
				$('#special_talent').prop("disabled",false);



				$('#tenth_cgpa_or_percentage').prop("disabled",false);
				$('#twelfth_cgpa_or_percentage').prop("disabled",false);
				$('#diploma_cgpa_or_percentage').prop("disabled",false);
				$('#previous_year_cgpa_or_percentage').prop("disabled",false);
			}

			else if($(this).val() == 'All' ) {       
				$('#religion').prop( "disabled", false );
				$('#category').prop("disabled",false);
				$('#talent').prop("disabled",false);
				$('#special_talent').prop("disabled",false);


				$('#tenth_cgpa_or_percentage').prop("disabled",false);
				$('#twelfth_cgpa_or_percentage').prop("disabled",false);
				$('#diploma_cgpa_or_percentage').prop("disabled",false);
				$('#previous_year_cgpa_or_percentage').prop("disabled",false);
			}

			else{
				$('#semester').prop( "disabled", false );
				$('#document').prop("disabled",false);

				$('#religion').prop( "disabled", false );
				$('#category').prop("disabled",false);
				
				$('#talent').prop("disabled",false);
				$('#special_talent').prop("disabled",false);




				$('#tenth_cgpa_or_percentage').prop("disabled",false);
				$('#twelfth_cgpa_or_percentage').prop("disabled",false);
				$('#diploma_cgpa_or_percentage').prop("disabled",false);
				$('#previous_year_cgpa_or_percentage').prop("disabled",false);
			}
		});

	});  
</script>





















<script type="text/javascript">
	$(document).ready(function() {
		$('#gender').change(function() {

	var selected = [];
	  for (var option of document.getElementById('gender').options) {
	    if (option.selected) {
	      selected.push(option.value);

	    }
	  }

	  // alert(selected);

		if(selected.length===1)
		{

			if(selected[0]==='Male')
			{
				$('#is_for_single_girl_child').prop("disabled",true);
			}
			else
			{
				$('#is_for_single_girl_child').prop("disabled",false);	
			}

		}
		else
		{
		$('#is_for_single_girl_child').prop("disabled",false);	
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
	$(document).ready(function(){

		$('#qualification').change(function(){
			var id=$(this).val();

// 			alert(id);
                //var id=document.getElementById('academic_year').value;
                $.ajax({
                	url : "<?php echo site_url('get-particular-course-list');?>",
                	method : "POST",
                	data : {id: id},
                	async : true,
                	dataType : 'json',
                	success: function(data){
                		console.log(data);

                		var html = '<option label="Choose one"></option>';		
                		html += '<option value="All">All</option>';
                		html +='<option  value="Bachelors (All)">Bachelors (All)</option>';
						html +='<option  value="B.Tech (All)">B.Tech (All)</option>';
						html +='<option  value="B.E (All)">B.E (All)</option>';
						html +='<option  value="Masters (All)">Masters (All)</option>';
						html +='<option  value="Diploma in Technical (All)">Diploma in Technical (All)</option>';
						html +='<option  value="Diploma in Health (All)">Diploma in Health (All)</option>';
						html +='<option  value="PHD (All)">PHD (All)</option>';
						html +='<option  value="PG Diploma (All)">PG Diploma (All)</option>';

                		html += '<optgroup label="Old Courses"><option value="Advanced Diploma In Fashion Design">Advanced Diploma In Fashion Design</option>';
                		html += '<option value="Bachelor Of Applied Sciences - B.A.S">Bachelor Of Applied Sciences - B.A.S</option>';
                		html += '<option value="Bachelor Of Architecture - B.Arch">Bachelor Of Architecture - B.Arch</option>';
                		html += '<option value="Bachelor Of Arts - B.A">Bachelor Of Arts - B.A</option>';
                		html += '<option value="Bachelor Of Arts Bachelor Of Law - B.A.B.L">Bachelor Of Arts Bachelor Of Law - B.A.B.L</option>';
                		html += '<option value="Bachelor Of Ayurvedic Medicine & Surgery - B.A.M.S">Bachelor Of Ayurvedic Medicine & Surgery - B.A.M.S</option>';
                		html += '<option value="Bachelor Of Business Administration - B.B.A">Bachelor Of Business Administration - B.B.A</option>';
                		html += '<option value="Bachelor Of Business Management - B.B.M">Bachelor Of Business Management - B.B.M</option>';
                		html += '<option value="Bachelor Of Commerce - B.Com">Bachelor Of Commerce - B.Com</option>';
                		html += '<option value="Bachelor Of Computer Applications - B.C.A">Bachelor Of Computer Applications - B.C.A</option>';
                		html += '<option value="Bachelor Of Computer Science - B.C.S">Bachelor Of Computer Science - B.C.S</option>';
                		html += '<option value="Bachelor Of Education - B.Ed">Bachelor Of Education - B.Ed</option>';
                		html += '<option value="Bachelor Of Electronic Science - B.E.S">Bachelor Of Electronic Science - B.E.S</option>';
                		html += '<option value="Bachelor Of Engineering / Bachelor Of Technology - B.E / B.Tech">Bachelor Of Engineering / Bachelor Of Technology - B.E / B.Tech</option>';
                		html += '<option value="Bachelor Of Fisheries Science - B.F.Sc / B.Sc (Fisheries)">Bachelor Of Fisheries Science - B.F.Sc / B.Sc (Fisheries)</option>';
                		html += '<option value="Bachelor Of Homoeopathic Medicine & Surgery - B.H.M.S">Bachelor Of Homoeopathic Medicine & Surgery - B.H.M.S</option>';
                		html += '<option value="Bachelor Of Medicine & Bachelor Of Surgery - M.B.B.S">Bachelor Of Medicine & Bachelor Of Surgery - M.B.B.S</option>';
                		html += '<option value="Bachelor Of Nursing">Bachelor Of Nursing</option>';
                		html += '<option value="Bachelor Of Pharmacy - B.pharm / B.pharma">Bachelor Of Pharmacy - B.pharm / B.pharma</option>';
                		html += '<option value="Bachelor Of Science - B.Sc">Bachelor Of Science - B.Sc</option>';
                		html += '<option value="Behavioral Healthcare Education - B.H.Ed">Behavioral Healthcare Education - B.H.Ed</option>';
                		html += '<option value="Diploma In Automobile Engineering">Diploma In Automobile Engineering</option>';
                		html += '<option value="Diploma In Ayurvedic Pharmacy">Diploma In Ayurvedic Pharmacy</option>';
                		html += '<option value="Diploma In Civil Engineering">Diploma In Civil Engineering</option>';
                		html += '<option value="Diploma In Computer Science And Engineering">Diploma In Computer Science And Engineering</option>';
                		html += '<option value="Diploma In Dental Hygienist ">Diploma In Dental Hygienist </option>';
                		html += '<option value="Diploma In Dermatology">Diploma In Dermatology</option>';
                		html += '<option value="Diploma In Electrical & Communication Engineering">Diploma In Electrical & Communication Engineering</option>';
                		html += '<option value="Diploma In Electrical & Electronics Engineering">Diploma In Electrical & Electronics Engineering</option>';
                		html += '<option value="Diploma In Electronics And Communication Engineering">Diploma In Electronics And Communication Engineering</option>';
                		html += '<option value="Diploma In Food And Nutrition">Diploma In Food And Nutrition</option>';
                		html += '<option value="Diploma In Health Inspector">Diploma In Health Inspector</option>';
                		html += '<option value="Diploma In Mechanical Engineering">Diploma In Mechanical Engineering</option>';
                		html += '<option value="Diploma In Medical Laboratory Technology [DMLT]">Diploma In Medical Laboratory Technology [DMLT]</option>';
                		html += '<option value="Diploma In Naturopathy">Diploma In Naturopathy</option>';
                		html += '<option value="Diploma In Nursing">Diploma In Nursing</option>';
                		html += '<option value="Diploma In Ophthalmology">Diploma In Ophthalmology</option>';
                		html += '<option value="Diploma In Pharmacy [D.Pharma]">Diploma In Pharmacy [D.Pharma]</option>';
                		html += '<option value="Diploma In X-ray Technology">Diploma In X-ray Technology</option>';
                		html += '<option value="M.Phil. (Library & Information Science)">M.Phil. (Library & Information Science)</option>';
                		html += '<option value="Master Of Business Administration - M.B.A">Master Of Business Administration - M.B.A</option>';
                		html += '<option value="Master Of Commerce - M.Com">Master Of Commerce - M.Com</option>';
                		html += '<option value="Master Of Computer Applications - M.C.A">Master Of Computer Applications - M.C.A</option>';
                		html += '<option value="Master Of Engineering / Master Of Technology - M.E./ M.Tech">Master Of Engineering / Master Of Technology - M.E./ M.Tech</option>';
                		html += '<option value="Master Of Science - M.Sc">Master Of Science - M.Sc</option>';
                		html += '<option value="Master Of Science - Management">Master Of Science - Management</option>';
                		html += '<option value="Master Of Surgery - M.S">Master Of Surgery - M.S</option>';
                		html += '<option value="Ph.D. (Education)">Ph.D. (Education)</option>';
                		html += '<option value="Ph.D. (Electronics And Telecommunication)">Ph.D. (Electronics And Telecommunication)</option>';
                		html += '<option value="Ph.D. (Pharmacy)">Ph.D. (Pharmacy)</option></optgroup>';
                		html += '<optgroup label="New Courses">';

                		var i;
                		for(i=0; i<data.length; i++){
                			html += '<option value="'+data[i].particular_name+'">'+data[i].particular_name+'</option>';

                		}
                		html += '</optgroup>';
                		$('#current_class_or_degree').html(html);

                	}
                });
return false;
}); 

});
</script>




<script type="text/javascript">
	$(document).ready(function(){

		$('#domicile').change(function(){
			var id=$(this).val();

// 			alert(id);
                //var id=document.getElementById('academic_year').value;
                $.ajax({
                	url : "<?php echo site_url('get-cities-list');?>",
                	method : "POST",
                	data : {id: id},
                	async : true,
                	dataType : 'json',
                	success: function(data){
                		console.log(data);
                		var html = '<option label="Choose one"></option>';
                		var i;
                		for(i=0; i<data.length; i++){

                			html += '<option value="'+data[i].city+'">'+data[i].city+'</option>';
                            
                		}
                		html += '</optgroup>';
                		html+='<option  value="All">All</option>';
                		$('#cities').html(html);

                	}
                });
                return false;
            }); 

	});
</script>


<script>
	$( function() {
		var dateFormat = "mm/dd/yy",
		from = $( "#application_start_date" )
		.datepicker({
			minDate:0,
			defaultDate: "+1w",
			changeMonth: true,
			numberOfMonths: 1
		})
		.on( "change", function() {
			to.datepicker( "option", "minDate", getDate( this ) );
			
		}),
		to = $( "#application_end_date" ).datepicker({
			defaultDate: "+1w",
			changeMonth: true,
			numberOfMonths: 1
		})
		.on( "change", function() {
			from.datepicker( "option", "maxDate", getDate( this ) );
		});

		function getDate( element ) {
			var date;
			try {
				date = $.datepicker.parseDate( dateFormat, element.value );
			} catch( error ) {
				date = null;
			}

			return date;
		}
	} );
</script>
<!-- /*changes for adding new addtitional field-- by varun-- 15 JUN*/ -->
 <script>
     $(document).ready(function() {
  var counter = 1;
  
  // Function to remove the field when "-" button is clicked
  function removeField() {
    $(this).parent().remove();
    counter--;
    updateAddButton();

  }

  function updateAddButton() {
    if (counter >= 3) {
      $("#addFieldButton").prop("disabled", true);
    } else {
      $("#addFieldButton").prop("disabled", false);
    }
  }

  $("#addFieldButton").click(function() {
        var newField = '<div class="form-group">';
        newField += '<label class="form-label"> Additional Field' + counter + ':</label>'
        newField += '<label class="form-label"><input type="text"  name="heading'+ counter +'" class="form-control" placeholder="enter the heading'+ counter +' " style=" border: 1px solid #ccc; border-radius: 4px;margin: 8px 0;" required></label>';
        newField += ' <textarea class="form-control" name="description'+ counter +'" placeholder="Enter the details "   type="text" required></textarea>';
        newField += '<button type="button" class="removeFieldButton"><i class="fa fa-trash-o" style="font-size:24px;color:red"></i></button>';
        newField += '</div>';

    $("#fieldsContainer").append(newField);
    counter++;

    updateAddButton();
  });

  // Attach click event to dynamically created "-" buttons
  $(document).on("click", ".removeFieldButton", removeField);

  updateAddButton();
});
  </script>
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 <!--   /*changes for adding new addtitional field-- by varun-- 15 JUN*/ -->

