



<!-- Main Content-->
<div class="main-content pt-5 mt-5">
	<div class="container-fluid">

				<!-- Row -->
				<div class="row">
					<div class="col-lg-12">
						<div class="card overflow-hidden">
							<div class="card-body">
								<div>
									<h6 class="main-content-label mb-1">Renewal Students</h6>
								</div>
								<div class="table-responsHistoryive">
									<table id="exportexample" class="table table-bordered border-t0 key-buttons text-nowrap w-100" >
										<thead>
											<tr>

												<th>Sl.No</th>
												<th>Student Name</th>
												<th>Mobile No</th>
												<th style="text-center">Whatsapp Number</th>
												<th>Renewal Date</th>
												<th>Renewal Amount</th>
											</tr>
										</thead>
										<tbody>

										<?php  $index=1; foreach ($renewalData as $eachData) {?>
											<tr>

												<td><?php echo $index?></td>
												<td><?php echo $eachData->student_name?></td>
												<td><?php echo $eachData->registered_mobile_no?></td>
											
											    
				
											   	<?php if($eachData->registered_whatsapp_mobile_no!=''){?>
														<td style="text-align: center;">
															<a target = "_blank"
															class="whatsapp"
														href="<?php echo base_url('redirect-to-whatsapp?username='.$eachData->student_username.'&mobile_no='.$eachData->registered_whatsapp_mobile_no).'&message=Hello '.$eachData->student_name.'&redirect='.$this->uri->segment(1);?>" data-action="share/whatsapp/share">
															<button type="button" class="btn ripple btn-success">
																<i class="zmdi zmdi-whatsapp"></i>
															</button>
														</a>
													</td>
												<?php }else{?>
													<td style="text-align: center;">
														<a target = "_blank"
														class="whatsapp"
														href="<?php echo base_url('redirect-to-whatsapp?username='.$eachData->student_username.'&mobile_no='.$eachData->registered_mobile_no).'&message=Hello '.$eachData->student_name.'&redirect='.$this->uri->segment(1);?>" data-action="share/whatsapp/share">
														<button type="button" class="btn ripple btn-success">
															<i class="zmdi zmdi-whatsapp"></i>
														</button>
													</a>
												</td>
											<?php }?>
											
												
													<td ><?php echo date('Y-m-d',strtotime( $eachData->renewal_date))?></td>
												<td><?php echo $eachData->renewal_amount?></td>
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
