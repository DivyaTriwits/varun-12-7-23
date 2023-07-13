



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
							<a href="<?php echo base_url('scholarship')?>">scholarship</a></li>
							<li class="breadcrumb-item active">Push Scholarship</li>
						</ol>
					</nav>
				</div>
			</div> -->
		<!-- 	<div class="row">
				<div class="col-12">
					<div class="card ">
						<div class="card-body">
							<form id="searchCallbackStatus" >
								<div class="row">

									<div class="col-md-2">
										<div class="form-group">
											<label for="callbackStatus">Select Limit Of Student</label>
											<input type="number" name="number" placeholder="" class="form-control">
										</div>
									</div>
								
										<div class="form-actions">
											<div class="card-body">

												<input class="btn ripple btn-primary " type="submit" style="background-color: #ff7f45; border-color: #ff7f45" value="Search">
												<a href="<?php echo base_url()?>push-scholarship/<?php echo $this->uri->segment(2)?>" class="btn waves-effect waves-light btn-secondary m-t-30 ">Reset</a>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div> -->

			<!-- <div align="right"><a class="btn ripple btn-info" href="<?php echo base_url('scholarship-form')?>"style="background-color: #ff7f45;
				border-color: #ff7f45">Add Scholarship</a></div> -->

				<!-- End Page Header -->

				<!-- Row -->
				<div class="row">
					<div class="col-12">
						<div class="card">
							<div class="card-body">
								
								<div class="table-responsive">
									<form method="Post"id="pushForm" action="<?php echo base_url('send-scholarship/'.$this->uri->segment(2))?>">
										<input type="hidden" name="numberId" value="<?php echo $this->input->get('number')?>">	
										<table id="exportexample1" class="table table-bordered border-t0 key-buttons text-nowrap w-100" >
											<thead>
												<tr>
												    
													<th ><input name="select_all" value="1" id="example-select-all" class="select-checkbox" type="checkbox"/> Select All</th>
													<!--<th><label for="select_all"><input name="select_all" id="select_all"value="1" id="example-select-all" class="select-checkbox" type="checkbox"/>&nbsp;&nbsp;Select All</label></th>-->
													
													<th >student Name</th>
													<th >Gender</th>
													<th >Qualification</th>
													<th >Current Class/Course/Degree</th>
												</tr>
											</thead>
											<tbody>
												<?php $index=1;
												if($getStudents!='')foreach ($getStudents as $students) {?>
													<tr>
														<td style="width: 5%"><input name="student_username[]" class="update_std" type="checkbox" value="<?php echo $students->student_username;?>" /></td>
														<td><?php echo $students->student_fullname;?></td>
														<td style="width: 20%"><?php echo $students->student_gender;?></td>
														<td ><?php echo $students->qualification;?></td>
														<td style="width: 25%"><?php echo $students->current_class_or_degree;?></td>
													</tr>
												<?php }?>
											</tbody>
										</table>
										<p><button type="submit" class="btn ripple btn-info" style="background-color: #ff7f45">Submit</button></p>
									</form>
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

<?php if($this->session->flashdata('push-success')){?>		
	<Script>
		swal({
			title: 'Well done!',
			text: 'Scholarship Pushed successfully..',
			type: 'success',
			timer: 3000,
        	showConfirmButton: false
		});
	</Script>
<?php }?>

<script>
	$(document).ready(function (){   
		var table = $('#exportexample1').DataTable({
			responsive: true,
			'columnDefs': [{
				'targets': 0,
				'searchable':false,
				'orderable':false,
				'className': 'select-checkbox',
			}],
			select: {
				style: 'os',
				selector: 'td:first-child'
			},

			'order':[ 
			[1, 'asc']
			]
		});

		$('#example-select-all').on('click', function(){
			var rows = table.rows({ 'search': 'applied' }).nodes();
			$('input[type="checkbox"]', rows).prop('checked', this.checked);
		});

		$('#example tbody').on('change', 'input[type="checkbox"]', function(){
			if(!this.checked){
				var el = $('#example-select-all').get(0);
				if(el && el.checked && ('indeterminate' in el)){
					el.indeterminate = true;
				}
			}
		});

		$('#pushForm').on('submit', function(e){
			var form = this;
			table.$('input[type="checkbox"]').each(function(){
				if(!$.contains(document, this)){
					if(this.checked){
						$(form).append(
							$('<input>')
							.attr('type', 'hidden')
							.attr('name', this.name)
							.val(this.value)
							);
					}
				} 
			});
			$('#example-console').text($(form).serialize()); 
			console.log("Form submission", $(form).serialize()); 
		});
	});

	


</script>