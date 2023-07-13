



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
							<a href="<?php echo base_url('webinar')?>">Webinar</a></li>
							<li class="breadcrumb-item active">Webinar Registrations</li>
					</ol>
				</nav>
			</div>
		</div> -->
		<div align="right"><a class="btn ripple btn-info" href="<?php echo base_url('webinar-registrations-form')?>"style="background-color: #ff7f45; 
		border-color: #ff7f45">Webinar Register</a></div><br>

	<!-- </div> -->
	
	<!-- End Page Header -->

	<!-- Row -->
	<div class="row">
		<div class="col-lg-12">
			<div class="card overflow-hidden">
				<div class="card-body">
					<div>
						<h6 class="main-content-label mb-1">Webinar Registrations</h6>
					</div>
					<div class="table-responsive">
						<table id="exportexample" class="table table-bordered border-t0 key-buttons text-nowrap w-100" >
							<thead>
								<tr>
									<th>Sl No.</th>
									<th>Name Of Institution</th>
									<th>Email</th>
									<th>Contact No.</th>

									<th>Date Of webinar</th>
									<th>Links</th>
									<!-- <th>Add Webinar</th> -->
									<th>Edit</th>
									<th>Delete</th>
								</tr>
							</thead>
							<tbody>
								<?php $index=1;foreach($getwebinarRegistrations as $eachRegistrations){?>
									<tr>
										<td><?php echo $index?></td>
										<td><?php echo $eachRegistrations->institutional_name?></td>
										<td><?php echo $eachRegistrations->email?><br>
											<?php echo $eachRegistrations->alternative_email?></td>
											<td><?php echo $eachRegistrations->contact_number?><br>
												<?php echo $eachRegistrations->alternate_contact_number?>
											</td>
											<td><?php echo $eachRegistrations->date?></td>

											<td><a class="btn ripple btn-primary btn-sm" href="<?php echo base_url('generate-links/'.$eachRegistrations->webinar_uniqueid)?>">Webinar Link</a></td>

										<!-- 	<td><a class="btn ripple btn-primary btn-sm" href="<?php echo base_url('generate-links/'.$eachRegistrations->webinar_uniqueid)?>">Add Webinar</a></td> -->
											
											<td><a href="<?php echo base_url('update-webinar-registration/'.$eachRegistrations->webinar_uniqueid)?>"> <i class="fe fe-edit-3" style="color: green"></i></a></td>

											<td><a onclick="setDeleteFunction('<?php echo $eachRegistrations->id; ?>'
											)" data-target="#modaldemo5" data-toggle="modal" href="" ><i class="fe fe-trash" style="cursor: pointer; color: red" ></i></a></td>
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
										<form method="post"action="<?php echo base_url('delete-webinar-registration')?>">
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
					</div>
				</div>

			</div>
			<!-- End Row -->
						
		</div>

	</div>

	<!-- End Main Content-->
	<!-- Large Modal -->
	<div class="modal fade" id="modaldemo3">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content modal-content-demo">
				<div class="modal-header">
					<h6 class="modal-title">New Webinar Register Form</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-lg-6 form-group">
							<label class="form-label">Institutional Name: <span class="tx-danger">*</span></label>
							<input class="form-control" name="firstname" placeholder="Enter Institutional name" required="" type="text">
						</div>
						<div class="col-lg-6 form-group">
							<label class="form-label">Email: <span class="tx-danger">*</span></label>
							<input class="form-control" name="email" placeholder="Enter email" required="" type="email">
						</div>
						<div class="col-lg-6 form-group">
							<label class="form-label">Alternate Email: <span class="tx-danger">*</span></label>
							<input class="form-control" name="email" placeholder="Enter alternate email" required="" type="email">
						</div>
						<div class="col-lg-6 form-group">
							<label class="form-label">Contact No.: <span class="tx-danger">*</span></label>
							<input class="form-control" name="firstname" placeholder="Enter contact no." required="" type="text">
						</div>
						<div class="col-lg-6 form-group">
							<label class="form-label">Alternate Contact No.: <span class="tx-danger">*</span></label>
							<input class="form-control" name="firstname" placeholder="Enter alternate contact no." required="" type="text">
						</div>
						<div class="col-lg-6 form-group">
							<label class="form-label">Date Of Webinar: <span class="tx-danger">*</span></label>
							<input class="form-control" name="date" placeholder="Enter date of webinar" required="" type="date">
						</div>

					</div>
				</div>
				<div class="modal-footer">
					<button class="btn ripple btn-primary" type="submit" style="background-color: #ff7f45; border-color: #ff7f45">Submit</button>
					<button class="btn ripple btn-outline-light" data-dismiss="modal" type="button">Close</button>
				</div>
			</div>

		</div>
	</div>
	<!--End Large Modal -->
	<?php if($this->session->flashdata('webinar-success')){?>		
		<Script>
			swal({
				title: 'Well done!',
				text: 'Webinar registration created successfully..',
				type: 'success',
				timer: 3000,
				showConfirmButton: false
			});
		</Script>
	<?php }?>

	<script>
		function setDeleteFunction(id) {
        // alert(id);
        $('#did').val(id);
    }
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

