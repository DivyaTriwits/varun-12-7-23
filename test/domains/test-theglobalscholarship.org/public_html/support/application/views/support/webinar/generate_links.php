
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
								<li class="breadcrumb-item active">Generate Links</li>
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
							<form id="defaultForm" method="POST" action="<?php echo base_url('generate-links-for-each-institutions/'.$this->uri->segment(2))?>">
								<input type="hidden" name="webinarId" value="<?php echo $this->uri->segment(2)?>">
								<div class="row">
									<div class="col-lg-6 form-group">
										<label class="form-label">Institutional Name<span class="tx-danger">*</span></label>
										<input class="form-control" name="institutional_name" placeholder="Enter Institutional name" value="<?php echo $getinstituionname->institutional_name?>"required="" type="text">
									</div>

									<?php if($webinarShortName!=''){ ?>
									<div class="col-lg-6 form-group">
										<label class="form-label">Webinar Short Name<span class="tx-danger">*</span></label>
										<input class="form-control" value="<?php echo $webinarShortName->webinar_name;?>" name="webinar_name" id="webinar_name" placeholder="Enter webinar name" required="" type="text" readonly>
									</div>

								<?php } else {?>


									<div class="col-lg-6 form-group">
										<label class="form-label">Webinar Short Name<span class="tx-danger">*</span></label>
										<input class="form-control" name="webinar_name" id="webinar_name" placeholder="Enter webinar name" required="" type="text">
										<span  id="webinarname" style="color:red"></span>
									</div>

								<?php } ?>
									


									<div class="col-lg-6 form-group">
										<label class="form-label">Link Type<span class="tx-danger">*</span></label>
										<!-- <input class="form-control" name="email" placeholder="Enter alternate email" required="" type="email"> -->
										<select class="form-control select2" name="link_type" id="link_type" required="">
											<option label="Choose one">
											</option>
											<option selected="" disabled="">
											</option>
											<option value="Whatsapp">
												Whatsapp
											</option>
											<option value="Webinar">
												Webinar
											</option>
										</select>

									</div>
								</div>
								<div class="row">
									<div class="col-md-8">
										<div class="form-group">
											<label class="form-label">Links<span class="tx-danger">*</span></label>
											
											<input class="form-control" name="generate_links[]" placeholder="Enter Link" required="" type="text">
										</div>
									</div>
									<div  class="col-lg-3">
										<div class="form-group">
											<p class="mg-b-10">Add More</p>
											<button id="addMoreButton" type="button" class="btn btn-primary addButton" data-template="textbox"><i class="fe fe-plus"></i></button>
										</div>
									</div>
								</div>
								<!-- <div class="row"> -->
									<div class="form-group hide row" id="textboxTemplate">
										<div class="col-md-8">
											<div class="form-group">
												<label class="form-label">Links<span class="tx-danger">*</span></label>
												
												<input  class="form-control " name="generate_links[]" placeholder="Enter Link" required="" type="text">
											</div>
										</div>
										<br>
										<div class="col-lg-4">
											<p class="mg-b-10" style="visibility: hidden;">Add More</p>
											<button id="removeLink" type="button" class="btn btn-danger removeButton removeLink "><i class="fe fe-minus"></i></button>
										</div>
									</div>
									<button style="background-color: #ff7f45; border-color: #ff7f45" type="submit"  class="btn ripple btn-primary float-right check-webinar">Submit</button>
								<!-- <input  style="background-color: #ff7f45; border-color: #ff7f45" type="Submit" class="btn ripple btn-primary float-right" name="submit" value="Submit">
								-->							
							</form>

				

						</div>

					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-12 col-md-12">
					<div class="card overflow-hidden">
						<div class="card-body">


							<div  id="content-mobile">
								<div class="row">
									<!-- <h6 class="text-center">If share button not working then copied this link and share</h6> -->
									<div class="col-md-8">
										<div class="input-group telephone-input">
											<input type="text"class="form-control" readonly=""value="<?php echo HOME_PATH?>web/<?php if($webinarShortName!=''){ echo $webinarShortName->webinar_name;} ?>" id="myInput">
											<span class="input-group-btn">
												<button class="btn ripple " onclick="myFunction()" style="background-color:#ff7f45">Copy</button>
											</span>
										</div>
									</div>
								</div>
								<!-- <div id="message" ></div> -->
							</div>
							<br>

							<div>
								<h2 class="main-content-label mb-1">Webinar Links</h2>

							</div><br>
					
							

							<div class="table-responsive">
								<table id="exportexample" class="table table-bordered border-t0 key-buttons text-nowrap w-100" >
									<thead>
										<tr>
											<th>Sl No.</th>
											<th>Name Of Institution</th>
											<th>Webinar</th>
											<th>Link</th>
											<th>Delete</th>
										
										<!-- 	<th>Links</th>
										
											<th>Delete</th> -->
										</tr>
									</thead>
									<tbody>
										<?php if($webinarList->num_rows()>0){$index=1;  foreach($webinarList->result() as $row){?>

											<tr>
												<td><?php echo $index;?> </td>
												<td><?php echo $row->institutional_name;?> </td>
												<td><?php echo $row->webinar_name;?> </td>
												<td><a class="btn btn-info" href="<?php echo $row->links;?>" target="_blank">link</a> </td>
												<td>
													<a onclick="setDeleteFunction('<?php echo $row->institutional_link_id; ?>','<?php echo $row->webinar_uniqueid?>','<?php echo $row->links_id; ?>')" data-target="#modaldemo5" data-toggle="modal" href="" ><i class="fe fe-trash" style="cursor: pointer; color: red" ></i></a>
												</td>
											</tr>
										<?php $index=$index+1;} } ?>
									</tbody>
								</table>
							</div>







						</div>
					</div>
				</div>
			</div>

			<div class="modal fade" id="modaldemo5">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content tx-size-sm">
						<div class="modal-body tx-center pd-y-20 pd-x-20">
							<form method="post"action="<?php echo base_url('delete-webinar-link')?>">
								<input type="text" name="did" id="did" hidden="">	
								<input type="text" name="webinarId" id="webinarId" hidden="">
								<input type="text" name="linksId" id="linksId" hidden="">
								
								
								<button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button> <i class="icon icon ion-ios-close-circle-outline tx-100 tx-danger lh-1 mg-t-20 d-inline-block"></i>
								<h4 class="tx-danger mg-b-20">Warning: Are you sure,you want to delete it?</h4>
								<p class="mg-b-20 mg-x-20">You won't be able to revert back this!</p>
								<input type="submit" value="Delete" class="btn btn-danger">
							</form>
						</div>
					</div>
				</div>
			</div>	



		</div>
	</div>
	<script type="text/javascript">
		$(document).ready(function() {
			$('.addButton').on('click', function() {
				var index = $(this).data('index');
				if (!index) {
					index = 1;
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
							},
							uri: {
                     		   message: 'The link is not valid'
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





	<?php if($this->session->flashdata('webinar-link-delete-success')){?>		
		<Script>
			swal({
				title: 'Well done!',
				text: 'Webinar link deleted successfully',
				type: 'success',
				timer: 3000,
        		showConfirmButton: false
			});
		</Script>
	<?php }?>

		<?php if($this->session->flashdata('webinar-link-delete-error')){?>		
		<Script>
			swal({
				title: 'Alas!',
				text: 'Failed to delete webinar link',
				type: 'error',
				timer: 3000,
        		showConfirmButton: false
			});
		</Script>
	<?php }?>


	<?php if($this->session->flashdata('webinar-name-aleady-exists')){?>		
		<Script>
			swal({
				title: 'Alas!',
				text: 'Sorry, this webinar name is already taken, try something else',
				type: 'error',
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


	<script>
		function setDeleteFunction(id,webinarId,linksId) {
        // alert(id);
        $('#did').val(id);
        $('#webinarId').val(webinarId);
         $('#linksId').val(linksId);
    }
</script>


<!-- <script type="text/javascript">
	

var linkType =document.getElementById('link_type').value;
alert(linkType);
if(linkType=='Webinar')
{
	document.getElementById("addMoreButton").disabled = true;
}


</script> -->


<script type="text/javascript">

document.getElementById('link_type').onchange = function() {

  var linkType  =document.getElementById('link_type').value;

   if(linkType=='Webinar')
   {
    	document.getElementById("addMoreButton").disabled = true;
    		
    	    $(".removeLink").each(function()
    	    {
         
          		 $(this).click();
         
       		});
					
  
   }
   else
   {
   	document.getElementById("addMoreButton").disabled = false;
  
   }
};
</script>



<script>
	function myFunction() {
		/* Get the text field */
		var copyText = document.getElementById("myInput");

		/* Select the text field */
		copyText.select();
		copyText.setSelectionRange(0, 99999); /* For mobile devices */

		/* Copy the text inside the text field */
		document.execCommand("copy");

		/* Alert the copied text */
//   alert("Copied the text: " + copyText.value);
document.getElementById("message").innerHTML = "Link is copied";
document.getElementById("message").style.color = "#ff7f45";
}
</script>