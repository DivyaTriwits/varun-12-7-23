
<!-- Main Content-->
<div class="main-content pt-5 mt-5">
	<div class="container-fluid">

		<!-- Page Header -->
	<!-- 	<div class="text-wrap">
			<div class="example">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb breadcrumb-style1 mg-b-0">

						<li class="breadcrumb-item">
							<a href="<?php echo base_url()?>">Support</a>
						</li>
						<li class="breadcrumb-item">
							<a href="<?php echo base_url('scholarship')?>">Scholarship</a></li>
							<li class="breadcrumb-item active">Scholarships List</li>
						</ol>
					</nav>
				</div>
			</div> -->
			<div align="right"><a class="btn ripple btn-info" href="<?php echo base_url('scholarship-form')?>"style="background-color: #ff7f45;
			border-color: #ff7f45">Add Scholarship</a></div><br>

			<!-- End Page Header -->

			<!-- Row -->
			<div class="row">
				<div class="col-lg-12">
					<div class="card overflow-hidden">
						<div class="card-body">
							<div>
								<h6 class="main-content-label mb-1">Scholarship List</h6><br>
							</div>
							<div class="table-responsive">
								<table id="scholarshiplist" class="table table-bordered border-t0 key-buttons text-nowrap w-100" >
									<thead>
										<tr>


											<!--<th>Sl No.</th>-->
											<!--<th>Added Date</th>-->
											<th>End Date</th>
											<th>Scholarship Type</th>
											<th  style="max-width: 10em;">Scholarship Name</th>
											<!--<th>Scholarship Description</th>-->
											<th>Courses</th>
											<th>Religion</th>
											<!-- <th>Caste</th> -->
											<th>category</th>
											<th>View More</th>
											<th>Promote</th>
											<th>Add to freemium DB</th>
											<th>Show to website</th>
											<th>Edit</th>
											<th>Delete</th>
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
											    $religion='';
											       $religionArray = json_decode($scholarship->religion);
											    if(is_array($religionArray)){
											        foreach($religionArray as $eachReligion){
													$religion .= $eachReligion.'<br>';
													}
											    }
											    $category='';
											       $categoryArray = json_decode($scholarship->category);
											    if(is_array($categoryArray)){
											        foreach($categoryArray as $eachCategory){
													$category .= $eachCategory.'<br>';
													}
											    }
										
										?>
											<tr>
												<!--<td><?php echo $index?></td>-->
												<!--<td><?php echo $scholarship->scholarship_added_date?></td-->
												<td><?php echo $scholarship->application_end_date?></td>
												<td><?php echo $scholarship->scholarship_type?></td>
												<td style="overflow-wrap:break-word;"><?php echo $scholarship->scholarship_name?></td>
												<!--<td><?php echo $scholarship->scholarship_description?></td>-->
												<td><?php echo $courses?></td>
												<td><?php echo $religion?></td>
												<td><?php echo $category?></td>



												<td><a href="<?php echo base_url('view-more-scholarship/'.$scholarship->scholarship_id)?>"><i class="fe fe-eye"></i></a></td>
												<td><a taget="_blank" href="<?php echo HOME_PATH?>new-scholarship?sid=<?php echo $scholarship->scholarship_id ?>"><i class="fe fe-cloud-drizzle"></i></a></td>
												<td>
												    
												    <a class="btn btn-sm btn-primary" taget="_blank" href="<?php echo base_url('add-scholarship-to-freemium-db/'.$scholarship->scholarship_id); ?>">Add</a>
												    <a  class="btn btn-sm btn-primary" taget="_blank" href="<?php echo "https://scholar.theglobalscholarship.org/student-promotion-register?sid=".$scholarship->scholarship_id; ?>">Get Link</a>
												
												</td>
													<td>
												    <?php if($scholarship->web_status == 0){?>
												    <a class="btn btn-sm btn-primary" href="<?php echo base_url();?>webiste-visiblity-status/<?php echo $scholarship->scholarship_id;?>/1">Show</a>
												   <?php } else{?>
												   <a class="btn btn-sm btn-primary" href="<?php echo base_url();?>webiste-visiblity-status/<?php echo $scholarship->scholarship_id;?>/0">Undo</a>
												<?php }?>
												</td>

												<td><a href="<?php echo base_url('update-scholarship/'.$scholarship->scholarship_id)?>"><i class="fe fe-edit-3" style="color: green" ></i></a></td>

												<!--<td><a onclick="setDeleteFunction('<?php echo $scholarship->id; ?>'-->
												<!--)" data-target="#modaldemo5" data-toggle="modal" href="" ><i class="fe fe-trash" style="cursor: pointer; color: red" ></i></a></td>-->
												<td>
													<?php $count=$this->Scholarship_model->CountReceviedScholarshipNotifications($scholarship->scholarship_id)?>
													<?php if($count>0){?>
													<a onclick="setDeleteFunction('<?php echo $scholarship->id; ?>'
												)" data-target="" data-toggle="modal" href="" ><i class="fe fe-slash" style="cursor: pointer; color: red" ></i></a>
												<?php }else{?>
												<a onclick="setPDeleteFunction('<?php echo $scholarship->scholarship_id;?>'
												)" data-target="#deleteModal" data-toggle="modal" href="" ><i class="fe fe-trash" style="cursor: pointer; color: red" ></i></a>
												<?php }?>
											</td>
											</tr>
											<?php $index++;}?>
										</tbody>
									</table>
								</div>
					
							</div>
							<div class="modal fade" id="modaldemo5">
								<div class="modal-dialog modal-dialog-centered" role="document">
									<div class="modal-content tx-size-sm">
										<div class="modal-body tx-center pd-y-20 pd-x-20">
											<form method="post"action="<?php echo base_url('delete-scholarship')?>">
												<input type="text" name="did" id="did" hidden="">	
												<button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button> <i class="icon icon ion-ios-close-circle-outline tx-100 tx-danger lh-1 mg-t-20 d-inline-block"></i>
												<h4 class="tx-danger mg-b-20">Warning: Are you sure to delete?</h4>
												<p class="mg-b-20 mg-x-20">You won't be able to revert back this!</p>
												<input type="submit" value="Delete" class="btn btn-danger">
											</form>
										</div>
									</div>
								</div>
							</div>
							<div class="modal fade" id="deleteModal">
								<div class="modal-dialog modal-dialog-centered" role="document">
									<div class="modal-content tx-size-sm">
										<div class="modal-body tx-center pd-y-20 pd-x-20">
											<form method="post"action="<?php echo base_url('permanent-delete-scholarship')?>">
												<input type="text" name="pdid" id="pdid" hidden="">	
												<button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button> <i class="icon icon ion-ios-close-circle-outline tx-100 tx-danger lh-1 mg-t-20 d-inline-block"></i>
												<h4 class="tx-danger mg-b-20">Warning: Are you sure to delete?</h4>
												<p class="mg-b-20 mg-x-20">You won't be able to revert back this!</p>
												<input type="submit" value="Delete" class="btn btn-danger">
											</form>
										</div>
									</div>
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
<script>
			function setPDeleteFunction(scholarship_id) {
        // alert(id);
        $('#pdid').val(scholarship_id);

    }

</script>
</script>
<?php if($this->session->flashdata('delete-success')){?>		
	<Script>
		swal({
			title: 'Well done!',
			text: 'Scholarship deleted successfully..',
			type: 'success',
			timer: 3000,
        	showConfirmButton: false
		});
	</Script>
<?php }?>

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



<?php if($this->session->flashdata('scholarship-update-success')){?>		
	<Script>
		swal({
			title: 'Well done!',
			text: 'Scholarship update successfully..',
			type: 'success',
			confirmButtonColor: '#57a94f'
		});
	</Script>
<?php }?>

