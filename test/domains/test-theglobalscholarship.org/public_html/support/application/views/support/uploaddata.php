
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
								<a href="<?php echo base_url()?>">Support</a>
							</li>
							<li class="breadcrumb-item">
								<a href="<?php echo base_url('scholarship')?>">Scholarship</a></li>
								<li class="breadcrumb-item active">Add Scholarship Form</li>
							</ol>
						</nav>
					</div>
				</div> -->

				<div class="row">
					<div class="col-lg-12 col-md-12">
						<div class="card">
							<div class="card-body">
								<div>
								</div><br>
								<form  id="scholarshipForm" method="POST" enctype="multipart/form-data" action="<?php echo base_url('store-certificate')?>">
									
									<div class="row">
										
									<input type="hidden" name="cid" value="cid">
										<div class="col-lg-6 form-group" >
											<label class="form-label">Upload File </label>
											<input class="form-control" name="files" placeholder=" "  
											type="file" accept=".csv">
										</div>
									 <div class="col-lg-6">
                                     <h5>Download Sample <span class="text-danger">*</span></h5>
                                       <a  type="button" href="<?php echo base_url();?>assets/sample/samplefile.csv" class="btn btn-primary" download>Download Sample</a>
                                        <span style="color: red">Pease download sample file and upload file same as downloaded sample file.</span>
                                  </div>	

						
					</div>
					<button style="background-color: #ff7f45; border-color: #ff7f45" type="Submit" class="btn ripple btn-primary float-left">Submit</button>
				</form>
			</div>
		</div>
	</div>
</div>
</div>
</div>



<?php if($this->session->flashdata('success')){?>		
	<Script>
		swal({
			title: 'Well done!',
			text: 'Uploaded successfully..',
			type: 'success',
			confirmButtonColor: '#57a94f'
		});
	</Script>
<?php }?>
<script>
	$(document).ready(function() {
		$('#scholarshipForm').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        // feedbackIcons: {
        // 	valid: 'glyphicon glyphicon-ok',
        // 	invalid: 'glyphicon glyphicon-remove',
        // 	validating: 'glyphicon glyphicon-refresh'
        // },
        fields: {
        	file: {
        		validators: {
        			notEmpty: {
        				message: 'The file is required '
        			}
        		}
        	},
        	scholarship_name: {
        		validators: {
        			notEmpty: {
        				message: 'The scholarship name is '
        			}
        		}
        	},
        	
        	application_start_date: {
        		validators: {
        			notEmpty: {
        				message: 'The scholarship start date is '
        			}
        		}
        	},
        	application_end_date: {
        		validators: {
        			notEmpty: {
        				message: 'The scholarship start end is '
        			}
        		}
        	},      	
        	scholarship_provider: {
        		validators: {
        			notEmpty: {
        				message: 'The scholarship provider name is '
        			}
        		}
        	}, 
        	scholarship_worth: {
        		validators: {
        			notEmpty: {
        				message: 'The scholarship worth is '
        			}
        		}
        	},
        	scholarship_link: {
        		validators: {
        			notEmpty: {
        				message: 'The scholarship link is '
        			}
        		}
        	},
        	scholarship_description: {
        		validators: {
        			notEmpty: {
        				message: 'The scholarship description is '
        			}
        		}
        	},                  
        }
    }).on('success.form.bv', function(e) {
    	$(this)[0].submit();
    });
});
</script>





















