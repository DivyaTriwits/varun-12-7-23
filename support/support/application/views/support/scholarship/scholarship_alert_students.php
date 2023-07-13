



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
									<h6 class="main-content-label mb-1">Students Who Not got Scholarships in a Month</h6>
								</div>
								<br>
								<div class="table-responsive">
									<table id="exportexample" class="table table-bordered border-t0 key-buttons text-nowrap w-100" >
										<thead>
											<tr>
												<th>Sl No.</th>
												<th>Student Name</th>
												<th>Qualification</th>
												<th>Whatsapp Number</th>
											</tr>
										</thead>
										<tbody>
											<?php $index=1; if(!empty($scholarships)){foreach($scholarships as $eachscholarship){?>
												<tr>
													<td><?php echo $index?></td>
													<td><?php echo $eachscholarship->student_username?></td>
												    <td><?php echo $eachscholarship->course_name?></td>
													<td ><?php echo $eachscholarship->registered_mobile_no;?></td>
													<!-- <td ><?php echo $eachscholarship->current_class_or_degree;?></td>
													<td ><?php echo $eachscholarship->scholarship_worth;?></td>
													<td ><?php echo $eachscholarship->application_start_date;?></td>
													<td ><?php echo $eachscholarship->application_end_date;?></td> -->
													
												</tr>
												<?php $index++;}}?>

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

