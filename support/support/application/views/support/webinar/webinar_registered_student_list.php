



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
							<a href="<?php echo base_url('webinar')?>">Webinar</a></li>
							<li class="breadcrumb-item active">Webinar Registered Student List</li>
					</ol>
				</nav>
			</div>
		</div> -->
	<!-- 	<div align="right"><a class="btn ripple btn-info" href="<?php echo base_url('webinar-registrations-form')?>"style="background-color: #ff7f45; 
		border-color: #ff7f45">Webinar Register</a>
		</div> --> 
	
	<!-- End Page Header -->




	


      <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <form id="searchCallbackStatus" >
             <div class="row pt-3">


                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="callbackStatus">Webinar Name</label>
                            <select class="custom-select form-control " name="webinarList" id="webinarList" >
                            	   <option value="" selected disabled>Select</option>
                            	<?php if($webinar->num_rows()>0){foreach($webinar->result() as $row){?>

                            		<option <?php echo ($this->input->get('webinarList') == $row->webinar_name ) ? 'selected' : ' ' ?> value="<?php echo $row->webinar_name; ?>"> <?php echo $row->webinar_name;?></option>
                            	<?php }}?>
                
                            </select>
                        </div>
                    </div>


             

                 
       

                   <!--  <div class="col-md-4"> -->
                    	  <div class="form-actions">
                    	  	 <div class="card-body">
                  
                    <input class="btn ripple btn-primary" type="submit" style="background-color: #ff7f45; border-color: #ff7f45" value="Search">
                    <a href="<?php echo base_url()?>webinar-registered-student-list" class="btn waves-effect waves-light m-t-30" style="background-color:#460056;border-color:#460056">Reset</a>
                
               		</div>
                    </div>

                     





                    </div>
                    </form>
                 
                </div>
                </div>
                </div>
                </div>



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
										<th>Student Name</th>
										<th>Email</th>
										<th>Contact No.</th>
										<th>Whatsapp</th>
										<th>Class</th>
										<th>Webinar Name</th>
										<th>Registered Date</th>
									
								<!-- 		<th>Name Of Institution</th> -->
									</tr>
								</thead>
								<tbody>
									<?php if($list->num_rows()>0){$i=1; foreach($list->result() as $row){?>

									<tr>
										<td> <?php echo $i; ?></td>
										<td> <?php echo $row->full_name; ?></td>
										<td> 
											
											<strong><a  target = "_blank" href="mailto:<?php echo $row->email; ?>"><?php echo $row->email; ?></a>	</strong>
										</td>
										<td> 
												
											<strong><a  target = "_blank" href="tel:<?php echo $row->mobile_no; ?>"><?php echo $row->mobile_no; ?></a>	
											</strong>

										</td>
									
										
									    <td> 
											<a target = "_blank"  class="whatsapp"
											href="https://api.whatsapp.com/send/?phone=91<?php echo $row->mobile_no;?>&text=<?php echo $row->full_name;?>" data-action="share/whatsapp/share">
													<button type="button" class="btn ripple btn-success">
																<i class="zmdi zmdi-whatsapp"></i>
													</button>
											</a>
										</td>
										
										<td> <?php echo $row->class; ?></td>
										<td> <?php echo $row->webinar_name; ?></td>
										<td> <?php echo $row->registered_date; ?></td>
									</tr>	
										

									<?php $i=$i+1; } } ?>



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

