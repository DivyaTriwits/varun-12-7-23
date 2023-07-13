



<!-- Main Content-->
<div class="main-content pt-5 mt-5">
	<div class="container-fluid">

		<!-- Page Header -->
	<!-- 	<div class="text-wrap">
			<div class="example">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb breadcrumb-style1 mg-b-0">

						
						<li class="breadcrumb-item">
							<a href="<?php echo base_url('webinar')?>">Support</a></li>
							<li class="breadcrumb-item active">Subscription Expired List</li>
						</ol>
					</nav>
				</div>
			</div> -->
			<!-- <div align="right"><a class="btn ripple btn-info" href="<?php echo base_url('eachStudents-form')?>"style="background-color: #ff7f45;
			border-color: #ff7f45">Add eachStudents</a></div> -->

			<!-- End Page Header -->

			<!-- Row -->
			<div class="row">
				<div class="col-lg-12">
					<div class="card overflow-hidden">
						<div class="card-body">
							<div>
								<h6 class="main-content-label mb-1">Subscription Expired List</h6>
							</div>
							<div class="table-responsive">
								<table id="exportexample" class="table table-bordered border-t0 key-buttons text-nowrap w-100" >
									<thead>
										<tr>
											<th>Sl No.</th>
											<th>Email </th>
											<th>Mobile Number</th>
											<th>Whatsapp</th>
											<th>Registration Date</th>
											<th>Subscription Expired Date</th>
										</tr>
									</thead>
									<tbody>
										<?php $index=1;foreach($getregisterestudents as $eachStudents){?>
											<tr>
												<td><?php echo $index?></td>
												<td><?php echo $eachStudents->registered_email?></td>
												<td><?php echo $eachStudents->registered_mobile_no?></td>
                                                <?php if($eachStudents->registered_whatsapp_mobile_no!=''){?>
														<td style="text-align: center;">
															<a target = "_blank"
															class="whatsapp"
														href="<?php echo base_url('redirect-to-whatsapp?username='.$eachStudents->student_username.'&mobile_no='.$eachStudents->registered_mobile_no).'&message=Hello '.$eachStudents->student_name.'&redirect='.$this->uri->segment(1);?>" data-action="share/whatsapp/share">
															<button type="button" class="btn ripple btn-success">
																<i class="zmdi zmdi-whatsapp"></i>
															</button>
														</a>
													</td>
												<?php }else{?>
													<td style="text-align: center;">
														<a target = "_blank"
														class="whatsapp"
														href="<?php echo base_url('redirect-to-whatsapp?username='.$eachStudents->student_username.'&mobile_no='.$eachStudents->registered_mobile_no).'&message=Hello '.$eachStudents->student_name.'&redirect='.$this->uri->segment(1);?>" data-action="share/whatsapp/share">
														<button type="button" class="btn ripple btn-success">
															<i class="zmdi zmdi-whatsapp"></i>
														</button>
													</a>
												</td>
											<?php }?>
												<td><?php echo date("d-M-Y", strtotime($eachStudents->registration_datetime));?></td>
												<td><?php echo date("d-M-Y", strtotime($eachStudents->subscription_validity_datetime));?></td>


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
											<form method="post"action="<?php echo base_url('delete-eachStudents')?>">
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

