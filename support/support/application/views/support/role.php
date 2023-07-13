<!-- Main Content-->
<div class="main-content pt-5 mt-5">
	<div class="container-fluid">

	<div align="right"><a class="btn ripple btn-info" href="<?php echo base_url('Support_controller/addroute')?>" style="background-color: #ff7f45;
	border-color: #ff7f45">Add Routes</a></div><br>

	<!-- </div> -->
	
	<!-- End Page Header -->

	<!-- Row -->
	<div class="row">
		<div class="col-lg-12">
			<div class="card overflow-hidden">
				<div class="card-body">
					<div>
						<h6 class="main-content-label mb-1">Roles</h6>
					</div>
					<div class="table-responsive">
						<table id="exportexample" class="table table-bordered border-t0 key-buttons text-nowrap w-100" >
							<thead>
								<tr>
									<th>Sl No.</th>
									<th>User</th>
								
									<!--<th>Edit</th>-->
									<!--<th>Delete</th>-->
									<th>Access</th>
								</tr>
							</thead>
							<tbody>
								<?php $i=1; if($user->num_rows()>0){
                                                     foreach($user->result() as $row){
													?>
													<tr>
														<td><?php echo $i;?></td>
														<td><?php echo $row->name?></td>
														
														<!--<td>-->
														<!--	<a  style="color:green;cursor: pointer;" onclick="setDataFunction(-->
              <!--                                                '<?php echo $row->id?>',-->
              <!--                                                '<?php echo $row->role?>',-->
														<!--	)"><i class="zmdi zmdi-edit"></i></a>-->
														
														<!--</td>-->
														<!--<td>	<a style="color:red;cursor: pointer;" onclick="setDeleteFunction('<?php echo $row->id?>')"><i class="zmdi zmdi-delete"></i></a>	</td>-->
															<td><a href="<?php echo base_url('access-authentication/'.$row->support_id)?>"><button style="background-color:#73D3DD;color: #ffff;" class="btn btn-sm ripple ">Access</button></a></td>
													</tr>
													<?php $i++;}}?>		</tbody>
								</table>
							</div>
						</div>
					=
					</div>
				</div>

			</div>
			<!-- End Row -->
						
		</div>

	</div>

	<!-- End Main Content--><div class="modal" id="modaldemo3">
				<div class="modal-dialog " role="document">
					<div class="modal-content modal-content-demo">
						<div class="modal-header">
							<h6 class="modal-title">Add Role</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
						</div>
						<form class="" action="<?php echo base_url('insert-roles')?>" method="post">
						<div class="modal-body">
							
											<div class="row">
												<div class="col-lg-12">
													<div class="form-group ">
														<p class="mg-b-10">Role</p>
														<input class="form-control" placeholder="Role" required="" type="text" required name="name">
														
													</div>
												</div>
												
											</div>
										
						</div>
						<div class="modal-footer">
							<button class="btn ripple btn-primary" type="submit">Submit</button>
							<button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Close</button>
						</div>
						</form>
					</div>
				</div>
			</div>
			<!--End Large Modal -->
			<!-- Large Modal -->
			<div class="modal" id="editmodaldemo3">
				<div class="modal-dialog" role="document">
					<div class="modal-content modal-content-demo">
						<div class="modal-header">
							<h6 class="modal-title">Edit Role</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
						</div>
						<form class="" action="<?php echo base_url('update-roles')?>" method="post">
						<div class="modal-body">
							
											<div class="row">
												<div class="col-lg-12">
													<div class="form-group ">
														<p class="mg-b-10">Role</p>
														<input class="form-control" placeholder="Airline name" required="" type="text" required name="ename" id="ename">
														<input type="hidden" name="id" id="id">
													</div>
												</div>
												
											</div>
										
						</div>
						<div class="modal-footer">
							<button class="btn ripple btn-primary" type="submit">Update</button>
							<button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Close</button>
						</div>
						</form>
					</div>
				</div>
			</div>
			<!--End Large Modal -->
		<!-- Basic modal -->
			<div class="modal" id="deletemodaldemo1">
				<div class="modal-dialog" role="document">
					<div class="modal-content modal-content-demo">
						<div class="modal-header">
							<h6 class="modal-title">Delete Role</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
						</div>
						<form method="post" action="<?php echo base_url('delete-roles')?>">
						<div class="modal-body">
							<h6>Are you sure you want to delete this row?</h6>
							<input type="hidden" name="did" id="did">
						</div>
						<div class="modal-footer">
							<button class="btn ripple btn-primary" type="submit">Delete</button>
							<button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Close</button>
						</div>
						</form>
					</div>
				</div>
			</div>
			<!-- End Basic modal -->
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

<script>
	function setDataFunction(id,name){

	 $('#id').val(id);
     // alert(d_id);
     $('#ename').val(name);
     $('#editmodaldemo3').modal('show');
 }
</script>

<script>
	function setDeleteFunction(id){
      //alert(id);
	 $('#did').val(id);
     $('#deletemodaldemo1').modal('show');
 }
</script>