
<!-- Main Content-->
<div class="main-content pt-5 mt-5">
	<div class="container-fluid">

		<!-- <div class="text-wrap">
			<div class="example">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb breadcrumb-style1 mg-b-0">

						<li class="breadcrumb-item">
							<a href="<?php echo base_url()?>">Sales</a>
						</li>
						<li class="breadcrumb-item">
							Scholarship</li>
							<li class="breadcrumb-item active">View Institution Scholarship List </li>
						</ol>
					</nav>
				</div>
			</div> -->



			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-body">
							<form id="searchMembers" >
								<div class="row pt-3">


									
									<div class="col-md-4">
										<div class="form-group">
											<label for="memberId">Institution  </label>
											<select class="form-control select2" name="institutionId" id="institutionId" >
												<option value="" selected disabled>Select</option>

												<?php if($institutionDetails->num_rows()>0){ foreach($institutionDetails->result() as $row){?>
													<option <?php echo ($this->input->get('institutionId') == $row->institute_userid ) ? 'selected' : ' ' ?>  value="<?php echo $row->institute_userid;?>">
														<?php echo $row->institute_name;?>
													</option>
												<?php } } ?>
													
											

											</select>
										</div>
									</div>
								


						
									<!--  <div class="col-md-4"> -->
										<div class="form-actions">
											<div class="card-body">

												<input class="btn ripple btn-primary" type="submit" style="background-color: #ff7f45; border-color: #ff7f45" value="Search">
											

												<!-- <button class="btn ripple btn-primary" type="reset" style="background-color: #ff7f45; border-color: #ff7f45"> Reset</button> -->

													<a href="<?php echo base_url()?>view-institution-scholarship-list" class="btn waves-effect waves-light m-t-30" style="background-color:#460056;border-color:#460056">Reset</a>

											</div>
										</div>







									</div>
								</form>

					
							</div>

						</div>
					</div>
				</div>


	<div align="right"><a class="btn ripple btn-info" href="<?php echo base_url('institution-scholarship')?>"style="background-color: #ff7f45;
			border-color: #ff7f45">Add Institution Scholarship</a></div>
				<!-- Row -->
				<div class="row">
					<div class="col-lg-12">
						<div class="card">
							<div class="card-body">

								<div class="table-responsive">
									<table id="exportexample" class="table table-striped table-bordered text-nowrap" >
										<thead>
											<tr>
												<th>Sl No.</th>
												<th>Scholarship Name</th>
												<th>Institute Name</th>
												<th>Start Date</th>
												<th>End Date</th>
											
												<th>Actions</th> 

											</tr>
										</thead>
										<tbody>
											<?php if($scholarshipDetails->num_rows()>0){$i=1; foreach($scholarshipDetails->result() as $row ){ ?>

												<tr>
													<td><?php echo $i;?></td>
													<td><?php echo $row->scholarship_name;?></td>
													<td><?php echo $row->institute_name;?></td>
													<td><?php echo  $row->start_date;?></td>
													<td><?php echo  $row->last_date;?></td>
													
													<td><a style="margin-right: 20px;" href="<?php echo base_url()?>view-institute-scholarship-details/<?php echo $row->scholarship_id;?>"><i class="fe fe-eye"></i></a> 

													<a style="margin-right: 20px;" href="<?php echo base_url()?>edit-institution-schloarship-details/<?php echo $row->scholarship_id;?>"><i class="fe fe-edit-3"></i></a>


														


													 </td>
												 </tr>
												

										
										

											

											<?php $i=$i+1;} } ?>	

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


		<?php if($this->session->flashdata('follow-up-status-changed-to-pending-success')){?>		
			<Script>
				swal({
					title: 'Follow Up Status!',
					text: 'Follow up status changed to pending successfully!',
					type: 'success',
					timer: 3000,
        			showConfirmButton: false
				});
			</Script>
		<?php }?>


		<?php if($this->session->flashdata('follow-up-status-changed-to-pending-failure')){?>		
			<Script>
				swal({
					title: 'Follow Up Status!',
					text: 'Failed to change the status to pending!',
					type: 'error',
					timer: 3000,
       				showConfirmButton: false
				});
			</Script>
		<?php }?>



		<?php if($this->session->flashdata('follow-up-status-changed-to-done-success')){?>		
			<Script>
				swal({
					title: 'Follow Up Status!',
					text: 'Follow up status changed to done successfully.',
					type: 'success',
					timer: 3000,
        			showConfirmButton: false
				});
			</Script>
		<?php }?>


		<?php if($this->session->flashdata('follow-up-status-changed-to-done-failure')){?>		
			<Script>
				swal({
					title: 'Follow Up Status!',
					text: 'Failed to change the status to done!',
					type: 'error',
					timer: 3000,
        			showConfirmButton: false
				});
			</Script>
		<?php }?>

			<?php if($this->session->flashdata('lead-details-updated-in-follow-up-page-success')){?>		
			<Script>
				swal({
					title: 'Lead Details!',
					text: 'Lead details updated successfully.',
					type: 'success',
					timer: 3000,
        			showConfirmButton: false
				});
			</Script>
		<?php }?>


		<?php if($this->session->flashdata('lead-details-updated-in-follow-up-page-failure')){?>		
			<Script>
				swal({
					title: 'Lead Details!',
					text: 'Failed to update lead details!',
					type: 'error',
					timer: 3000,
        			showConfirmButton: false
				});
			</Script>
		<?php }?>






	<script>

    function setUpdateDataFunction(lead_id, lead_name,lead_phone_number,lead_email,lead_designation,lead_institute_name,lead_website,lead_alternative_phone_number,lead_alternative_email,lead_city,lead_state,lead_country,lead_address,name,assign_to_id,	lead_assigned_by,lead_assigned_date,lead_status) {
      
      	


         $('#editLeadName').val(lead_name);
         $('#editLeadId').val(lead_id);
        $('#editLeadPhoneNumber').val(lead_phone_number);
         $('#editLeadEmail').val(lead_email);
         $('#editLeadDesignation').val(lead_designation);
         $('#editLeadInstituteName').val(lead_institute_name);
         $('#editLeadWebsite').val(lead_website);
         $('#editLeadAlternatePhoneNumber').val(lead_alternative_phone_number);
        $('#editLeadAlternateEmail').val(lead_alternative_email);
        $('#editLeadCityName').val(lead_city);
        $('#editLeadStateName').val(lead_state);
        $('#editLeadCountryName').val(lead_country);
        $('#editLeadAddress').val(lead_address);
        <?php if($this->session->userdata('role')!='' && $this->session->userdata('role')=='Admin'){?>
       $('#editLeadAssignedTo').val(assign_to_id).trigger('change');
       <?php }?>
        $('#editLeadAssignedDate').val(lead_assigned_date);
        $('#editLeadStatus').val(lead_status).trigger('change');
         
        $('#myModalUpdate').modal('show');
    }
	</script>




<script type="text/javascript">
 $(document).ready(function() {
   $('#editLeadStatus').change(function() {
   
     if($(this).val() == 'Follow up') {       
        $('#followUpDate').prop( "disabled", false );
       $('#remark').prop("disabled",false);
     }
     else{
        $('#followUpDate').prop( "disabled", true );
       $('#remark').prop("disabled",true);
     }
   });

 });  
</script>


<?php if($this->session->flashdata('institution-scholarship-add-success')){?>		
	<Script>
		swal({
			title: 'Well done!',
			text: 'Institution scholarship added successfully..',
			type: 'success',
			timer: 3000,
			showConfirmButton: false
		});
	</Script>
<?php }?>
<?php if($this->session->flashdata('institution-scholarship-update-success')){?>		
	<Script>
		swal({
			title: 'Well done!',
			text: 'institution scholarship details update successfully..',
			type: 'success',
			timer: 3000,
			showConfirmButton: false
		});
	</Script>
<?php }?>
<script>