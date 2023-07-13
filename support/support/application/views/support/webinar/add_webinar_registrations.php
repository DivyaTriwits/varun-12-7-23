
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
								<a href="<?php echo base_url('webinar')?>">Webinar</a></li>
							</li>
							<li class="breadcrumb-item">
								<a href="<?php echo base_url('webinar-registration')?>">Webinar List</a></li>
								<li class="breadcrumb-item active">Webinar Registration Form</li>
							</ol>
						</nav>
					</div>
				</div> -->
				<!-- </div> -->
				<div class="row">
					<div class="col-lg-12 col-md-12">
						<div class="card">
							<div class="card-body">
								<div>
									<h6 class="main-content-label mb-1">New Webinar Register Form</h6>

								</div><br>
								<form id=webinarform method="POST" action="<?php echo base_url('add-webinar-registration')?>">
									<div class="row">
										<div class="col-lg-6 form-group">
											<label class="form-label">Institutional Name: <span class="tx-danger">*</span></label>
											<input class="form-control" name="institutional_name" placeholder="Enter Institutional name" required="" type="text">
										</div>
										<div class="col-lg-6 form-group">
											<label class="form-label">Email: </label>
											<input class="form-control" name="email" placeholder="Enter email"  type="email">
										</div>
										<div class="col-lg-6 form-group">
											<label class="form-label">Alternate Email:</label>
											<input class="form-control" name="alternative_email" placeholder="Enter alternate email"  
											type="email">
										</div>
										<div class="col-lg-6 form-group">
											<label class="form-label">Contact No: <span class="tx-danger">*</span></label>

											<input pattern="[0-9]{1,10}"  maxlength="10"  
											oninput="if (!this.checkValidity()) this.value = this.value.slice(0, -1)" class="form-control" name="contact_number" placeholder="Enter contact no." required="" type="text">
										</div>
										<div class="col-lg-6 form-group">
											<label class="form-label">Alternate Contact No: </label>
											<input pattern="[0-9]{1,10}"  maxlength="10"  oninput="if (!this.checkValidity()) this.value = this.value.slice(0, -1)"
											
											    class="form-control" name="alternate_contact_number" placeholder="Enter alternate contact no."  type="text">
										</div>
										<div class="col-lg-6 form-group">
											<label class="form-label">Date Of Webinar: <span class="tx-danger">*</span></label>
											<input class="form-control" name="date" placeholder="Enter date of webinar" required="" type="date">
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
			$(document).ready(function() {
				$('#webinarform').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        // feedbackIcons: {
        // 	valid: 'glyphicon glyphicon-ok',
        // 	invalid: 'glyphicon glyphicon-remove',
        // 	validating: 'glyphicon glyphicon-refresh'
        // },
        fields: {
        	institutional_name: {
        		validators: {
        			notEmpty: {
        				message: 'The institutional name is required'
        			}
        		}
        	},
        // 	email: {
        // 		validators: {
        // 			notEmpty: {
        // 				message: 'The institutional email is required'
        // 			}
        // 		}
        // 	},
        	
        	contact_number: {

        		validators: {
        			notEmpty: {
        				message: 'The institutional number is required'
        			},
        			stringLength: {
        				min: 10,
        				max: 10,
        				message: 'The institutional number. must be 10 digits'
        			},
        			regexp: {
        				regexp: /[0-9]/,
        				message: ' <br >The institutional number. can only consist of digits'
        			}
        		}
        	},   
        	date: {
        		validators: {
        			notEmpty: {
        				message: 'The date is required'
        			}
        		}
        	},       
        }
    }).on('success.form.bv', function(e) {
    	$(this)[0].submit();
    });
});
</script>