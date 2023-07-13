<!-- Main Content-->
<div class="main-content pt-5 mt-5">
	<div class="container-fluid">

		<!-- Page Header -->
		<!-- <div class="text-wrap">
			<div class="example">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb breadcrumb-style1 mg-b-0">

						<li class="breadcrumb-item">
							<a href="<?php echo base_url()?>">Support</a>
						</li>
						<li class="breadcrumb-item">
							<a href="<?php echo base_url('scholarship')?>">scholarship</a></li>
							<li class="breadcrumb-item active">Live Scholarship</li>
						</ol>
					</nav>
				</div>
			</div> -->
			<!-- <div align="right"><a class="btn ripple btn-info" href="<?php echo base_url('scholarship-form')?>"style="background-color: #ff7f45;
				border-color: #ff7f45">Add Scholarship</a></div> -->

				<!-- End Page Header -->

				<!-- Row -->
				<div class="row">
					<div class="col-lg-12">
						<div class="card overflow-hidden">
							<div class="card-body">
								<div>
									<h6 class="main-content-label mb-1">Live Scholarships</h6>
								</div>
								<div class="table-responsive">
									<table id="live_scholarshipslist" class="table table-bordered border-t0 key-buttons text-nowrap w-100" >
										<thead>
											<tr>
											    
											
												<!--<th>Sl No.</th>-->
												<th>Added Date</th>
												<th>End Date</th>
												<th>Scholarship Name</th>
												<th>Sent Count</th>
												<th>Scholarship Type</th>
											    <th>Start Date</th>
												<th>Qualification</th>
												<!--<th >Current Class/Course/Degree</th>-->
												<th>Scholarship Benefits</th>
												
												<th>Push</th>
												
											</tr>
										</thead>
										<tbody>
											<?php $index=1;foreach($getscholarships as $scholarship){
											    $courses = '';
											    $coursesArray = json_decode($scholarship->courses);
											    if(is_array($coursesArray)){
											        foreach($coursesArray as $eachCourse){
													$courses .= $eachCourse.'<br>';
													}
											    }
											      $currentclass='';
											       $currentclassArray = json_decode($scholarship->current_class_or_degree);
											    if(is_array($currentclassArray)){
											        foreach($currentclassArray as $eachclass){
													$currentclass .= $eachclass.'<br>';
													}
											    }
											    
											?>
												<tr>
													<!--<td><?php echo $index?></td>-->
													<td ><?php echo date('Y-m-d',strtotime($scholarship->scholarship_added_date))?></td>
													
													<td ><?php echo $scholarship->application_end_date;?></td>
													<td><?php echo $scholarship->scholarship_name?></td>
													<td>
														<?php $count=$this->Scholarship_model->CountReceviedScholarshipNotifications($scholarship->scholarship_id)?>
														<h3><span class="badge badge-pill badge-success"><?php echo $count?></span></h3>
													</td>
													<td><?php echo $scholarship->scholarship_type?></td>
													<td ><?php echo $scholarship->application_start_date;?></td>
													<td ><?php echo $courses;?></td>
													<!--<td ><?php echo $currentclass;?></td>-->
													<td ><?php echo $scholarship->benefits;?></td>
													
												    
													<td><a class="btn ripple btn-primary btn-sm" href="<?php echo base_url('push-scholarship/').$scholarship->scholarship_id?>">Push</a></td>
												
												</tr>
												<?php $index++;}?>

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
			<!-- End Main Content-->



			<script>
				function setDeleteFunction(id) {
        // alert(id);
        $('#did').val(id);

    }
</script>
</script>
<?php if($this->session->flashdata('delete-success')){?>		
	<Script>
		swal({
			title: 'Well done!',
			text: 'Webinar deleted successfully..',
			type: 'success',
			timer: 3000,
			showConfirmButton: false
		});
	</Script>
<?php }?>

