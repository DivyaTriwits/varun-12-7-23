
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
								<li class="breadcrumb-item active">Update Webinar Links</li>
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
								<h2 class="main-content-label mb-1">Generate Links For Webinar</h2>

							</div><br>
							<form id=defaultForm method="POST" action="<?php echo base_url('update-webinar-details-for-institutions/'.$this->uri->segment(2))?>">
								<input type="hidden" name="webuniqueId" value="<?php if($getinstituionname!=''){ echo $getinstituionname->id;}?>">
								<input type="hidden" name="linksId" value="<?php if($getGeneratedLinks!=''){echo $getGeneratedLinks->id;}?>">
								<div class="row">
									<div class="col-lg-6 form-group">
										<label class="form-label">Institutional Name<span class="tx-danger">*</span></label>
										<input class="form-control" name="institutional_name" placeholder="Enter Institutional name" value="<?php if($getinstituionname!=''){ echo $getinstituionname->institutional_name;}?>"required="" type="text">
									</div>
									<div class="col-lg-6 form-group">
										<label class="form-label">Email</label>
										<input class="form-control" name="email"placeholder="Enter email" value="<?php if($getinstituionname!=''){echo $getinstituionname->email;}?>" type="email">
									</div>
									<div class="col-lg-6 form-group">
										<label class="form-label">Contact No.: <span class="tx-danger">*</span></label>
										
										<input   pattern="[0-9]{1,10}"  maxlength="10" oninput="if (!this.checkValidity()) this.value = this.value.slice(0, -1)" class="form-control" name="contact_number" placeholder="Enter contact no." required="" value="<?php if($getinstituionname!=''){echo $getinstituionname->contact_number;}?>"type="text">
									</div>
									<div class="col-lg-6 form-group">
										<label class="form-label">Date Of Webinar<span class="tx-danger">*</span></label>
										<input class="form-control"name="date" placeholder="Enter date of webinar" required="" type="date"value="<?php if($getinstituionname!=''){echo $getinstituionname->date;}?>">
									</div>
									<div class="col-lg-6 form-group">
										<label class="form-label">Webinar Short Name<span class="tx-danger">*</span></label>
										<input class="form-control" name="webinar_name"id="webinar_name" placeholder="Enter webinar name" readonly="" type="text"value="<?php if($getGeneratedLinks!=''){echo $getGeneratedLinks->webinar_name;}?>">
										<span  id="webinarname" style="color:red"></span>

									</div>
									<div class="col-lg-6 form-group">
										<label class="form-label">Link Type<span class="tx-danger">*</span></label>
										<!-- <input class="form-control" name="email" placeholder="Enter alternate email" required="" type="email"> -->
										<select class="form-control select2" name="link_type" required="" style="background-color: black">
											<option label="Choose one">
											</option>
											
											<option selected="" disabled="">Select Link Type</option>
											<option value="Whatsapp" <?php if($getGeneratedLinks!='') echo ($getGeneratedLinks->link_type == 'Whatsapp')? 'selected' :''; ?>>Whatsapp</option>
											<option value="Webinar" <?php if($getGeneratedLinks!='') echo ($getGeneratedLinks->link_type == 'Webinar')? 'selected' :''; ?>>Webinar</option>
										</select>
									</div>
								</div>

								<button style="background-color: #ff7f45; border-color: #ff7f45" type="submit" class="btn ripple btn-primary float-right">Submit</button>
								<!-- <input  style="background-color: #ff7f45; border-color: #ff7f45" type="Submit" class="btn ripple btn-primary float-right" name="submit" value="Submit">
								-->							
							</form>

				
						
						</div>

					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12 col-md-12">
					<div class="card">
						<div class="card-body">
							<div>
								<h2 class="main-content-label mb-1">Generate Links For Webinar</h2>
							</div><br>
							<div class="table-responsive">
								<table id="exportexample" class="table table-bordered border-t0 key-buttons text-nowrap w-100" >
									<thead>
										<th>Sl.No</th>
										<th>Links</th>
										<th>Edit</th>	
										<th>Delete</th>											
									</thead>
									<tbody>
										<?php $index=1;foreach ($getLinks as $eachLinks) {?>
											<tr>
												<td><?php echo $index?></td>
												<td><?php echo $eachLinks->links?></td>
												

												<td><a style="cursor: pointer;" onclick="setDataFunction('<?php echo $eachLinks->links_id; ?>',
												'<?php echo $eachLinks->links; ?>')"
												data-target="#modaldemo3" data-toggle="modal" href="">
												<i class="fa fa-edit" style="color: green;"></i>
											</a></td>
											<!-- <td><i class="fe fe-trash"data-target="#modaldemo5" data-toggle="modal" href=""style="color: red"></i></td> -->
											<td><a onclick="setDeleteFunction('<?php echo $eachLinks->links_id; ?>'
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
										<form method="post"action="<?php echo base_url('delete-links/'.$this->uri->segment(2))?>">
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
			<div class="modal fade" id="modaldemo3">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content modal-content-demo">
						<div class="modal-header">
							<h6 class="modal-title">Update Links</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
						</div>
						<form method="Post" action="<?php echo base_url('update-links/'.$this->uri->segment(2))?>">
							<div class="modal-body">

								<input type="text" name="eid" id="eid"hidden="">
								<input type="hidden" name="webinarid" value="<?php $this->uri->segment(2)?>">
								<div class="row">
									<div class="col-lg-8 form-group">
										<label class="form-label">Links<span class="tx-danger">*</span></label>
										<input class="form-control" name="links_name" id="links_name" placeholder="" required="" type="text">
									</div>
								</div>
								<div class="modal-footer">
									<button class="btn ripple btn-primary" type="submit"style="background-color: #ff7f45; border-color: #ff7f45">Submit</button>
									<button class="btn ripple btn-outline-light" data-dismiss="modal" type="button">Close</button>
								</div>
							</div>
						</form>
					</div>
				</div>
				<!--End Large Modal -->

			</div>
		</div>
	</div>
	


<script>
	function setDeleteFunction(links_id) {
	// alert(links_id);
	$('#did').val(links_id);
}
</script>

<script>
	function setDataFunction(links_id, links) {
						// alert(links_id);
	$('#eid').val(links_id);
	$('#links_name').val(links);
	}
</script>
<script type="text/javascript">
	$(document).ready(function() {
		$('.addButton').on('click', function() {
			var index = $(this).data('index');
			if (!index) {
				$(this).data('index', 1);
			}
			index++;
			$(this).data('index', index);

			var template     = $(this).attr('data-template'),
			$templateEle = $('#' + template + 'Template'),
			$row         = $templateEle.clone().removeAttr('id').insertBefore($templateEle).removeClass('hide');

        // $el          = $row.find('input').eq(0).attr('name', 'generate_links[]');
        // console.log($row.find('input').eq(0));
        $('#defaultForm').bootstrapValidator('addField', 'generate_links[]');

        // $(".select2").select2();
        // $el.attr('placeholder', 'Textbox #' + index);
        $row.on('click', '.removeButton', function(e) {
          // $('#defaultForm').bootstrapValidator('removeField', $el);
        //   $('#defaultForm').bootstrapValidator('removeField', 'generate_links[]');
        // $('#defaultForm').bootstrapValidator('removeField', 'student_activity_achievement[]');
        // $('#defaultForm').bootstrapValidator('removeField', 'rateperunit[]');
        // $('#defaultForm').bootstrapValidator('removeField', 'totalamount[]');
        $row.remove();
    });
    });

	$('#defaultForm').bootstrapValidator({
		// message: 'This value is not valid',
		// feedbackIcons: {
		// 	valid: 'glyphicon glyphicon-ok',
		// 	invalid: 'glyphicon glyphicon-remove',
		// 	validating: 'glyphicon glyphicon-refresh'
		// },

		fields: {
		    
		    	institutional_name: {
				validators: {
					notEmpty: {
						message: 'The institution name is required'
					}
				}
			},
			
			contact_number: {
				validators: {
								notEmpty: {
									message: 'The contact no is required  '
								},
								stringLength: {
									min: 10,
									max: 10,
									message: 'The contact no must be 10 digits'
								},
								regexp: {
									regexp: /[0-9]/,
									message: 'The contact no. can only consist of digits'
								}
							}
			},
			
			date: {
				validators: {
					notEmpty: {
						message: 'The date of webinar is required'
					}
				}
			},
			webinar_name: {
				validators: {
					notEmpty: {
						message: 'The webinar name is required'
					}
				}
			},
			link_type: {
				validators: {
					notEmpty: {
						message: 'The type of link is required'
					}
				}
			},
			'generate_links[]': {
				validators: {
					notEmpty: {
						message: 'The link is required'
					}
				}
			},
			college_name: {
				validators: {
					notEmpty: {
						message: 'The college name is required'
					}
				}
			},


		}

	})

	.on('error.field.bv', function(e, data) {
		console.log('error.field.bv', data.element);
	})
	.on('success.field.bv', function(e, data) {
                //console.log('success.field.bv -->', data.element);
            })
	.on('added.field.bv', function(e, data) {
                //console.log('Added element -->', data.field, data.element);
            })
	.on('removed.field.bv', function(e, data) {
                //console.log('Removed element -->', data.field, data.element);
            });

});
</script>


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


<?php if($this->session->flashdata('update-success')){?>		
<Script>
	swal({
		title: 'Well done!',
		text: 'Links updated successfully..',
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
		text: 'Link deleted successfully..',
		type: 'success',
		timer: 3000,
        showConfirmButton: false
	});
</Script>
<?php }?>

	<script type="text/javascript">
	$(document).ready(function(){
		$('#webinar_name').keyup(function(){ 

			var id=$(this).val();
			// alert(id);
                //var id=document.getElementById('academic_year').value;
                $.ajax({

                	url : "<?php echo site_url('get-webinar-names');?>",
                	method : "POST",
                	data : {id: id},
                	async : true,
                	dataType : 'json',
                	success: function(data){

                		// var html = '<option value="" selected disabled>Select Category</option>';
                		var i;
                		// for(i=0; i<data.length; i++){

                		// 	html += '<option value="'+data[i].categ_id+'">'+data[i].category_name+'</option>';

                		// }
                		// alert(data);
                		if(data)
                		{
                			
                			$('#webinarname').html('this webinar name already exist');
                			$('.check-webinar').prop('disabled',true);
                			
                		}
                		else
                		{
							$('#webinarname').html('');
							$('.check-webinar').prop('disabled',false);

                		}

                		

                	}
                });
                return false;
            
            }); 

	});
</script>