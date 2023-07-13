
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
									<h6 class="main-content-label mb-1">Update Scholarship Form</h6>

								</div><br>
								<form  id="scholarshipForm" method="POST" enctype="multipart/form-data" action="<?php echo base_url('edit-scholarship/'.$this->uri->segment(2))?>">
									<input type="hidden" name="scholarshipId" value="<?php if($getscholarships!='') echo $getscholarships->scholarship_id ?>">
									<div class="row">
										<div class="col-lg-4 form-group">
											<label class="form-label">Scholarship Type <span class="tx-danger">*</span></label>
											
											<select class="form-control select2" name="scholarship_type" id="scholarship_type">
												<option label="Choose one">
												</option>
												<option value="Educational Based"<?php if($getscholarships!='')echo ($getscholarships->scholarship_type == 'Educational Based')? 'selected' :''; ?>>Educational Based
												</option>
												<option value="Talent Based"<?php  if($getscholarships!='') echo ($getscholarships->scholarship_type == 'Talent Based')? 'selected' :''; ?>>Talent Based
												</option>
												<option value="Special Abled"<?php  if($getscholarships!='') echo ($getscholarships->scholarship_type == 'Special Abled')? 'selected' :''; ?>>Special Abled
												</option>
												<option value="Internship" <?php  if($getscholarships!='') echo ($getscholarships->scholarship_type == 'Internship')? 'selected' :''; ?>>Internship</option>
												<option value="Community Based" <?php  if($getscholarships!='') echo ($getscholarships->scholarship_type == 'Community Based')? 'selected' :''; ?>>Community Based</option>
												<option value="Athlete Based" <?php  if($getscholarships!='') echo ($getscholarships->scholarship_type == 'Sports')? 'selected' :''; ?>>Sports</option>
												<option value="Talent & Athletics" <?php  if($getscholarships!='') echo ($getscholarships->scholarship_type == 'Talent & Athletics')? 'selected' :''; ?>>Talent & Athletics</option>
												<option value="Abroad" <?php  if($getscholarships!='') echo ($getscholarships->scholarship_type == 'Abroad')? 'selected' :''; ?>>Abroad</option>
												<option value="Competitions and Awards" <?php  if($getscholarships!='') echo ($getscholarships->scholarship_type == 'Competitions and Awards')? 'selected' :''; ?>>Competitions and Awards</option>
													<option <?php  if($getscholarships!='') echo ($getscholarships->scholarship_type == 'Scholarship')? 'selected' :''; ?> value="Scholarship">Scholarship</option>
												<option value="All"<?php  if($getscholarships!='') echo ($getscholarships->scholarship_type == 'All')? 'selected' :''; ?>>All
												</option>
											</select>
										</div>
										<div class="col-lg-4 form-group">

											<label class="form-label">Scholarship Name <span class="tx-danger">*</span></label>
											<input class="form-control" name="scholarship_name" placeholder=" " required="" type="text"value="<?php if($getscholarships!=''){echo $getscholarships->scholarship_name;}?>">
										</div>
										<div class="col-lg-4 form-group">
											<label class="form-label">Application Start Date <span class="tx-danger">*</span></label>
											<input class="form-control" name="application_start_date" required="" type="date" value="<?php if($getscholarships!=''){echo $getscholarships->application_start_date;}?>">
										</div>
										<div class="col-lg-4 form-group">
											<label class="form-label">Application End Date<span class="tx-danger">*</span> </label>
											<input class="form-control" name="application_end_date" required="" type="date" value="<?php if($getscholarships!=''){echo $getscholarships->application_end_date;}?>">
										</div>
										<div class="col-lg-4 form-group">
											<label class="form-label">Scholarship Provider <span class="tx-danger">*</span></label>
											<input class="form-control" name="scholarship_provider" placeholder="Enter scholarship provider name" required="" type="text" value="<?php if($getscholarships!=''){echo $getscholarships->scholarship_provider;}?>">
										</div>
										<div class="col-lg-4 form-group">
											<label class="form-label"> Scholarship Worth </label>
											<input class="form-control" name="scholarship_worth" placeholder="Enter scholarship worth"  type="text" value="<?php if($getscholarships!=''){echo $getscholarships->scholarship_worth;}?>">
										</div>
										<!-- </div> -->
										<div class="col-lg-4 form-group">
											<label class="form-label">Scholarship Link <span class="tx-danger">*</span></label>
											<input class="form-control" name="scholarship_link" placeholder=" "  
											type="text" value="<?php if($getscholarships!=''){echo $getscholarships->scholarship_link;}?>">
										</div>
										<div class="col-lg-4 form-group">
											<label class="form-label">Scholarship Description <span class="tx-danger">*</span></label>

											<textarea class="form-control" name="scholarship_description" placeholder=" " required="" type="text"><?php if($getscholarships!=''){echo $getscholarships->scholarship_description;}?></textarea>
										</div>
										<div class="col-lg-4 form-group">
											<label class="form-label">Scholarship Documents </label>

											<textarea class="form-control" name="scholarship_documents" placeholder=" "  type="text"><?php if($getscholarships!=''){echo $getscholarships->documents;}?></textarea>
										</div>
										<div class="col-lg-4 form-group">
											<label class="form-label">Benifits of Scholarship<span class="tx-danger">*</span> </label>
											<textarea class="form-control" name="benefits" placeholder=" "   type="text"><?php if($getscholarships!=''){echo $getscholarships->benefits;}?></textarea>
										</div>
										<div class="col-lg-4 form-group">
											<label class="form-label">Attachment Type</label>
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
										</div>
										<div class="col-lg-4 form-group" id="attachment_file" style="display:none">
											<label class="form-label">Upload File</label>
											<input class="form-control" name="attachment_file" placeholder=" "  
											type="file">
										</div>
										<div class="col-lg-4 form-group" id="attachment_text" style="display:none">
											<label class="form-label">Add Url</label>
											<input class="form-control" name="attachment_text" placeholder=" "  
											type="text"value="<?php if($getscholarshipattachments!=''){echo $getscholarshipattachments->attachment_text;}?>">
										</div>

										<div class="col-md-4">
											<div class="form-group">
												<p class="mg-b-10">Qualifications <i class="ion-help-circled" data-toggle="tooltip" title="select your studying state from list"></i></p>
												<select class="form-control add-scholarship-select2" multiple name="qualification[]" id="qualification">
													<option label="Choose one"></option>
														<option  value="All">
														All
													</option>
													<?php if($getCourse->num_rows()>0){ foreach($getCourse->result() as $row){?>
														<option <?php if($getscholarships!='') { echo ($getscholarships->courses==$row->course_name)  ? "selected" : " ";} ?>  value="<?php echo $row->course_name;?>">
															<?php echo $row->course_name;?>
														</option>

													<?php } } ?>
												
												</select>
											</div>
										</div>
										<!-- <?php if($getParticularCourse->num_rows()>0){ foreach($getParticularCourse->result() as $row){?>
														<option <?php if($getscholarships!='') { echo ($getscholarships->courses==$row->particular_name)  ? "selected" : " ";} ?> value="<?php echo $row->particular_name;?>">
															<?php echo $row->particular_name;?>
														</option>

														<?php } } ?> -->
														<div class="col-md-4">
															<div class="form-group">
																<p class="mg-b-10">class/Course/Degree/ <i class="ion-help-circled" data-toggle="tooltip" title="Select your studying district from list"></i></p>
																<select class="form-control add-scholarship-select2" multiple name="current_class_or_degree[]" id="current_class_or_degree">
																	<option label="Choose one"></option>
																	<option  value="All">All</option>
																	<option  value="Bachelors (All)">Bachelors (All)</option>
																	<option  value="B.Tech (All)">B.Tech (All)</option>
																	<option  value="B.E (All)">B.E (All)</option>
																	<option  value="Masters (All)">Masters (All)</option>
																	<option  value="PG Diploma (All)">PG Diploma (All)</option>
																	<option  value="Diploma in Technical (All)">Diploma in Technical (All)</option>
																	<option  value="Diploma in Health (All)">Diploma in Health (All)</option>
																	<option  value="PHD (All)">PHD (All)</option> 
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
																			<option <?php if($getscholarships!='') { echo ($getscholarships->courses==$row->particular_name)  ? "selected" : " ";} ?> value="<?php echo $row->particular_name;?>">
																				<?php echo $row->particular_name;?>
																			</option>

																		<?php } } ?>
																	</optgroup>
											<!-- 	<option <?php if($getAcademicDetails!='' ){ echo ($getAcademicDetails->current_class_or_degree!='') ? "selected" : " " ; } ?> value="<?php if($getAcademicDetails!='' && $getAcademicDetails->current_class_or_degree!='' ){echo ($getAcademicDetails->current_class_or_degree) ;} ?>" > <?php if($getAcademicDetails!='' && $getAcademicDetails->current_class_or_degree!='' ){echo ($getAcademicDetails->current_class_or_degree) ;} ?>
										</option> -->

									</select>
								</div>
							</div>
								<div class="col-lg-4 form-group">
								<label class="form-label">Courses</label>
								<textarea class="form-control" name="display_courses" id="display_courses" placeholder=" " value="<?php if($getscholarships!=''){echo $getscholarships->display_courses;}?>"><?php if($getscholarships!=''){echo $getscholarships->display_courses;}?></textarea>
							

							</div>
							<!-- <div class="col-lg-4 form-group">
								<label class="form-label">Is Cgpa Based </label>
								<select class="form-control select2" name="is_cgpa_based">
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
								<select class="form-control select2" name="cgpa_type">
									<option label="Choose one">
									</option>
									<option value="CGPA 4"<?php if($getscholarships!='')echo ($getscholarships->cgpa_type =='CGPA 4')? 'selected' :''; ?>>CGPA 4 

									</option>
									<option value="CGPA 10"<?php if($getscholarships!='')echo ($getscholarships->cgpa_type =='CGPA 10')? 'selected' :''; ?>>CGPA 10 
									</option>
									<option value="Percentage"<?php if($getscholarships!='')echo ($getscholarships->cgpa_type =='Percentage')? 'selected' :''; ?>>Percentage
									</option>
								</select>
							</div> -->
							<div class="col-lg-4 form-group">
								<label class="form-label">10th Result</label>
								<input class="form-control" name="tenth_cgpa_or_percentage" id="tenth_cgpa_or_percentage" placeholder=" "  
								type="text" value="<?php if($getscholarships!=''){echo $getscholarships->tenth_cgpa_or_percentage;}?>">

							</div>
							<div class="col-lg-4 form-group">
								<label class="form-label">12th Result </label>
								<input class="form-control" name="twelfth_cgpa_or_percentage" id="twelfth_cgpa_or_percentage" placeholder=" "  
								type="text" value="<?php if($getscholarships!=''){echo $getscholarships->twelfth_cgpa_or_percentage;}?>">

							</div>

							<div class="col-lg-4 form-group">
								<label class="form-label">Diploma Result</label>
								<input class="form-control" name="diploma_cgpa_or_percentage" id="diploma_cgpa_or_percentage" placeholder=" "  
								type="text" value="<?php if($getscholarships!=''){echo $getscholarships->diploma_cgpa_or_percentage;}?>">
							</div>
							<div class="col-lg-4 form-group">
								<label class="form-label">Previous Year Result</label>
								<input class="form-control" name="previous_year_cgpa_or_percentage" id="previous_year_cgpa_or_percentage" placeholder=" "  
								type="text"value="<?php if($getscholarships!=''){echo $getscholarships->previous_year_cgpa_or_percentage;}?>">
							</div>
							<div class="col-lg-4 form-group">
								<label class="form-label">State</label>


								<select class="form-control add-scholarship-select2" multiple name="domicile[]" id="domicile">
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

								<!-- 	<input class="form-control" name="domicile" placeholder=" " required="" type="text"value="<?php if($getscholarships!=''){echo $getscholarships->domicile;}?>"> -->



							</div>
							<div class="col-lg-4 form-group">
								<label class="form-label">Cities</label>
								<!-- <input class="form-control" name="domicile" placeholder=" " required="" type="text"> -->

								<select class="form-control add-scholarship-select2" multiple name="cities[]" id="cities">
									<option label="Choose one">
									</option>
                                    	<option  value="All">
										All
									</option>
									<?php if($getCities->num_rows()>0){ foreach($getCities->result() as $row){?>
										<option  value="<?php echo $row->city;?>">
											<?php echo $row->city;?>
										</option>

									<?php } } ?>

								
								</select>


							</div>
							<div class="col-md-4">
								<div class="form-group">
									<p class="mg-b-10">Religion</p>
									<select class="form-control add-scholarship-select2" id="select-religion" multiple name="religion[]">
										<option label="Choose one">
										</option>
										<option  value="All"<?php if($getscholarships!='') echo ($getscholarships->religion =='All')? 'selected' :''; ?>>All
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
										<option value="Sikh"<?php if($getscholarships!='')echo ($getscholarships->religion =='Sikh')? 'selected' :''; ?>>Sikh
										</option>
										

									</select>
								</div>
							</div>

							<div class="col-lg-4 form-group">
								<label class="form-label">category </label>
								<select class="form-control add-scholarship-select2" multiple id="select-category" name="category[]">
									<option label="Choose one">
									</option>
									<option value="All"<?php if($getscholarships!='')echo ($getscholarships->category =='All')? 'selected' :''; ?>>All
									</option>
									<option value="GM"<?php if($getscholarships!='')echo ($getscholarships->category =='GM')? 'selected' :''; ?>>GM
									</option>
									<option value="2A"<?php if($getscholarships!='')echo ($getscholarships->category =='GM')? 'selected' :''; ?>>2A
									</option>
									<option value="2B"<?php if($getscholarships!='')echo ($getscholarships->category =='GM')? 'selected' :''; ?>>2B
									</option>
									<option value="3A"<?php if($getscholarships!='')echo ($getscholarships->category =='GM')? 'selected' :''; ?>>3A
									</option>
									
									<option value="SC"<?php if($getscholarships!='')echo ($getscholarships->category =='SC')? 'selected' :''; ?>>SC
									</option>
									
									<option value="ST"<?php if($getscholarships!='')echo ($getscholarships->category =='ST')? 'selected' :''; ?>>ST
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

								<select class="form-control add-scholarship-select2" name="is_hosteller">
									<option selected="" disabled="">Select
									</option>
									<option value="Hosteller"<?php if($getscholarships!='')echo ($getscholarships->is_hosteller =='Hosteller')? 'selected' :''; ?>>Hosteller
									</option>
									<option value="Day Scholar"<?php if($getscholarships!='')echo ($getscholarships->is_hosteller =='Day Scholar')? 'selected' :''; ?>>Day Scholar
									</option>
									<option value="Both"<?php if($getscholarships!='')echo ($getscholarships->is_hosteller =='Both')? 'selected' :''; ?>>Both
									</option>
								</select>
							</div>
							<div class="col-lg-4 form-group">
								<label class="form-label">gender</label>
								<select class="form-control select2-no-search" multiple name="gender[]" id=gender>
								    
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
											<input class="form-control" name="minimum_age" placeholder="Enter minimum age"  type="number" value="<?php if($getscholarships!=''){echo $getscholarships->minimum_age;}?>">
										</div>
										<div class="col-lg-4 form-group">
											<label class="form-label">Maximum Age </label>
											<input class="form-control" name="maximum_age" placeholder="Enter maximum age"  type="number" value="<?php if($getscholarships!=''){echo $getscholarships->maximum_age;}?>">
										</div>
										<div class="col-lg-4 form-group">
											<label class="form-label">Parent Occupation </label>
											<select class="form-control select2" multiple name="parent_occupation[]"id="parent_occupation">
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

										<input class="form-control" name="family_annual_income" placeholder=" "  type="text"value="<?php if($getscholarships!=''){echo $getscholarships->family_annual_income;}?>">
									</div>
									<div class="col-lg-4 form-group">
										<label class="form-label">Talent in</label>
										<select class="form-control select2" name="talent" id="talent">
											<option label="Choose one">
											</option>
											<?php if($talentIn->num_rows()>0){foreach ($talentIn->result() as $row){  ?>
												<option <?php if($getscholarships!='') { echo ($getscholarships->domicile==$row->activity_type)  ? "selected" : " ";} ?> value="<?php echo $row->activity_type;?>">
													<?php echo $row->activity_type;?>
												</option>

											<?php } } ?>
                                            	<option value="2">
												N/A
											</option>
										</select>

										

									</div>
									<div class="col-lg-4 form-group">
										<label class="form-label">Special Talent</label>
										<select class="form-control select2"  multiple name="special_talent[]" id="special_talent">
											<option label="Choose one">
											</option>

										</select>

									</div>

									<div class="col-lg-4 form-group">
										<label class="form-label">Disability Type </label>
										<select class="form-control add-scholarship-select2" multiple name="disability_type[]">
											<option label="Choose one">
												<?php foreach ($getdisabilitytype as $type):?>
													<?php if($type->id == $type->disability_name) { ?>
														<option value="<?php echo $type->disability_name?>" selected><?php echo $type->disability_name?></option>
													<?php } else {?>
														<option value=<?php echo $type->id;?>><?php echo $type->disability_name;?>
													</option>
												<?php }?>
											<?php endforeach;?>
											<option value="2">
												N/A
											</option>
										</option>
										
									</select>
								</div>
								<div class="col-lg-4 form-group">
									<label class="form-label">Disability Type Percenatge</label>
									<input class="form-control" name="disability_percentage" placeholder=""  type="text"value="<?php if($getscholarships!=''){echo $getscholarships->disability_percentage;}?>">
								</div>

								<div class="col-lg-4 form-group">
									<label class="form-label">Is For Orphans</label>
									<select class="form-control select2-no-search" name="is_for_orphans">
										<option selected="" disabled="">Select
										</option>
										<option value="1" <?php if($getscholarships!='')echo ($getscholarships->is_for_orphans == '1')? 'selected' :''; ?>>Yes
										</option>
										<option value="0"<?php if($getscholarships!='')echo ($getscholarships->is_for_orphans == '0')? 'selected' :''; ?>>No
										</option>
										<option value="2"<?php if($getscholarships!='')echo ($getscholarships->is_for_orphans == '2')? 'selected' :''; ?>>N/A
										</option>
									</select>
								</div>
								<div class="col-lg-4 form-group">
									<label class="form-label">Is For Single Child</label>

									<select class="form-control select2-no-search" name="is_for_single_child">
										<option selected="" disabled="">Select
										</option>
										<option value="1" <?php if($getscholarships!='')echo ($getscholarships->is_for_single_child == '1')? 'selected' :''; ?>>Yes
										</option>
										<option value="0"<?php if($getscholarships!='')echo ($getscholarships->is_for_single_child == '0')? 'selected' :''; ?>>No
										</option>
										<option value="2"<?php if($getscholarships!='')echo ($getscholarships->is_for_single_child == '2')? 'selected' :''; ?>>N/A
										</option>
									</select>
								</div>
								<div class="col-lg-4 form-group">
									<label class="form-label">Is For Single Girl Child</label>
									<select class="form-control select2-no-search" name="is_for_single_girl_child" id="is_for_single_girl_child">
										<option selected="" disabled="">Select
										</option>
										<option value="1" <?php if($getscholarships!='')echo ($getscholarships->is_for_single_girl_child == '1')? 'selected' :''; ?>>Yes
										</option>
										<option value="0"<?php if($getscholarships!='')echo ($getscholarships->is_for_single_girl_child == '0')? 'selected' :''; ?>>No
										</option>
										<option value="2"<?php if($getscholarships!='')echo ($getscholarships->is_for_single_girl_child == '2')? 'selected' :''; ?>>N/A
										</option>
									</select>
								</div>
										<div class="col-lg-4 form-group">
											<label class="form-label">Watch Video Link </label>
											<input class="form-control" name="video_link" placeholder=" "  
											type="text" value="<?php if($getscholarships!=''){echo $getscholarships->vedio_link;}?>">
										</div>
                           	<div class="col-lg-4 form-group">
											<label class="form-label">How To Apply <span class="tx-danger">*</span></label>

											<textarea class="form-control" name="how_to_apply" placeholder=" " required="" type="text"><?php if($getscholarships!=''){echo $getscholarships->how_apply;}?></textarea>
										</div>
									
							</div>
							<hr>  <h4>SEO</h4>
						<div class="row">
						  
						    <br>
						    	<div class="col-lg-3 form-group">
											<label class="form-label">Title Tag (Bellow H1 tag)</label>

											<textarea class="form-control" name="title_tag" placeholder=" "   type="text"><?php if($getscholarships!=''){echo $getscholarships->title_tag;}?></textarea>
										</div>
											<div class="col-lg-3 form-group">
											<label class="form-label">Title Description </label>

											<textarea class="form-control" name="title_description" placeholder=" "   type="text"><?php if($getscholarships!=''){echo $getscholarships->title_description;}?></textarea>
										</div>
											<div class="col-lg-3 form-group">
											<label class="form-label">Keywords/ Meta Tags</label>

											<textarea class="form-control" name="seo_keyword" placeholder=" "   type="text"><?php if($getscholarships!=''){echo $getscholarships->seo_keywords;}?></textarea>
										</div>
											<div class="col-lg-3 form-group">
											<label class="form-label"> H1 tags</label>

											<textarea class="form-control" name="h_tags" placeholder=" "   type="text"><?php if($getscholarships!=''){echo $getscholarships->h_tags;}?></textarea>
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
        				message: 'The scholarship Provider name is required'
        			}
        		}
        	}, 
        // 	scholarship_worth: {
        // 		validators: {
        // 			notEmpty: {
        // 				message: 'The scholarship worth is required'
        // 			}
        // 		}
        // 	},
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



// <script type="text/javascript">
// 	$(document).ready(function() {
// 		$('#attachment_type').on('change.attachment_file', function() {
// 			$("#attachment_file").toggle($(this).val() == 'file'||$(this).val() == 'both');
// 		}).trigger('change.attachment_file');
// 	});
// </script>








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

		var attachment_type=document.getElementById('attachment_type').value;

		if(attachment_type==='file' || attachment_type==='both')
		{
			$("#attachment_file").toggle(attachment_type == 'file'||attachment_type == 'both').trigger('change.attachment_file');
		}

		
	});
</script>

<script type="text/javascript">
	$(document).ready(function() {


		var attachment_type=document.getElementById('attachment_type').value;

		if(attachment_type==='url' || attachment_type==='both')
		{
			$("#attachment_text").toggle(attachment_type == 'url'||attachment_type == 'both').trigger('change.attachment_text');
		}


	});


</script>






<script type="text/javascript">
	$(document).ready(function() {

		$('#scholarship_type').change(function() {

				
			if( $(this).val() == 'Talent Based') {
				$('#select-religion').prop( "disabled", true );
				$('#select-category').prop("disabled",true);
				$('#talent').prop("disabled",false);
				$('#special_talent').prop("disabled",false);




				$('#tenth_cgpa_or_percentage').prop("disabled",true);
				$('#twelfth_cgpa_or_percentage').prop("disabled",true);
				$('#diploma_cgpa_or_percentage').prop("disabled",true);
				$('#previous_year_cgpa_or_percentage').prop("disabled",true);

			

			} 
			else if($(this).val() == 'Educational Based') {       
				$('#select-religion').prop( "disabled", false );
				$('#select-category').prop("disabled",false);
				$('#talent').prop("disabled",true);
				$('#special_talent').prop("disabled",true);



				$('#tenth_cgpa_or_percentage').prop("disabled",false);
				$('#twelfth_cgpa_or_percentage').prop("disabled",false);
				$('#diploma_cgpa_or_percentage').prop("disabled",false);
				$('#previous_year_cgpa_or_percentage').prop("disabled",false);

			}

			else if($(this).val() == 'Special Abled') {       
				$('#select-religion').prop( "disabled", false );
				$('#select-category').prop("disabled",false);
				$('#talent').prop("disabled",false);
				$('#special_talent').prop("disabled",false);


				$('#tenth_cgpa_or_percentage').prop("disabled",false);
				$('#twelfth_cgpa_or_percentage').prop("disabled",false);
				$('#diploma_cgpa_or_percentage').prop("disabled",false);
				$('#previous_year_cgpa_or_percentage').prop("disabled",false);

			}

			else if($(this).val() == 'All' ) {       
				$('#select-religion').prop( "disabled", false );
				$('#select-category').prop("disabled",false);
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

				$('#select-religion').prop( "disabled", false );
				$('#select-category').prop("disabled",false);

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

		
			
			var  scholarship_type= document.getElementById('scholarship_type').value;
			
			if( scholarship_type === 'Talent Based') {
				$('#select-religion').prop( "disabled", true );
				$('#select-category').prop("disabled",true);
				$('#talent').prop("disabled",false);
				$('#special_talent').prop("disabled",false);


				$('#tenth_cgpa_or_percentage').prop("disabled",true);
				$('#twelfth_cgpa_or_percentage').prop("disabled",true);
				$('#diploma_cgpa_or_percentage').prop("disabled",true);
				$('#previous_year_cgpa_or_percentage').prop("disabled",true);

			
			} 
			else if(scholarship_type === 'Educational Based') {       
				$('#select-religion').prop( "disabled", false );
				$('#select-category').prop("disabled",false);
				$('#talent').prop("disabled",true);
				$('#special_talent').prop("disabled",true);




				$('#tenth_cgpa_or_percentage').prop("disabled",false);
				$('#twelfth_cgpa_or_percentage').prop("disabled",false);
				$('#diploma_cgpa_or_percentage').prop("disabled",false);
				$('#previous_year_cgpa_or_percentage').prop("disabled",false);
			}

			else if(scholarship_type === 'Special Abled') {       
				$('#select-religion').prop( "disabled", false );
				$('#select-category').prop("disabled",false);
				$('#talent').prop("disabled",false);
				$('#special_talent').prop("disabled",false);




				$('#tenth_cgpa_or_percentage').prop("disabled",false);
				$('#twelfth_cgpa_or_percentage').prop("disabled",false);
				$('#diploma_cgpa_or_percentage').prop("disabled",false);
				$('#previous_year_cgpa_or_percentage').prop("disabled",false);
			}

			else if(scholarship_type === 'All' ) {       
				$('#select-religion').prop( "disabled", false );
				$('#select-category').prop("disabled",false);
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

				$('#select-religion').prop( "disabled", false );
				$('#select-category').prop("disabled",false);

				$('#talent').prop("disabled",false);
				$('#special_talent').prop("disabled",false);



				$('#tenth_cgpa_or_percentage').prop("disabled",false);
				$('#twelfth_cgpa_or_percentage').prop("disabled",false);
				$('#diploma_cgpa_or_percentage').prop("disabled",false);
				$('#previous_year_cgpa_or_percentage').prop("disabled",false);
			}
		

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
	$(document).ready(function() {
	
	var selected = [];
	  for (var option of document.getElementById('gender').options) {
	    if (option.selected) {
	      selected.push(option.value);

	    }
	  }

	  //alert("hi");

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
                		html +='<option  value="All">All</option>';
                		$('#cities').html(html);

                	}
                });
                return false;
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