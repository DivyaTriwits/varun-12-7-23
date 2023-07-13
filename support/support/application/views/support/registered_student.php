

<script src="https://cdn.jsdelivr.net/gh/linways/table-to-excel@v1.0.4/dist/tableToExcel.js"></script>

<!-- Main Content-->
<div class="main-content pt-5 mt-5">
	<div class="container-fluid">

		<!-- Page Header -->
<!-- 		<div class="text-wrap">
			<div class="example">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb breadcrumb-style1 mg-b-0">

						
						<li class="breadcrumb-item">
							<a href="<?php echo base_url('webinar')?>">Support</a></li>
							<li class="breadcrumb-item active">Registered Student</li>
						</ol>
					</nav>
				</div>
			</div> -->
			<!-- <div align="right"><a class="btn ripple btn-info" href="<?php echo base_url('eachStudents-form')?>"style="background-color: #ff7f45;
				border-color: #ff7f45">Add eachStudents</a></div> -->

				<!-- End Page Header -->

				<!-- Row -->
				<div class="row">
					<div class="col-12">
						<div class="card ">
							<div class="card-body">
								<form id="searchCallbackStatus" >
									<div class="row">

										<div class="col-md-6">
											<div class="form-group">
												<label for="callbackStatus">Search</label>
												<input type="text" name="text" placeholder="" class="form-control">
												
											</div>
										</div>

										<div class="form-actions">
											<div class="card-body">

												<input class="btn ripple btn-primary " type="submit" style="background-color: #ff7f45; border-color: #ff7f45" value="Search">

												<a href="<?php echo base_url()?>registered-students" class="btn waves-effect waves-light m-t-30" style="background-color:#460056;border-color:#460056">Reset</a>
												
												<!-- <a href="<?php echo base_url()?>push-scholarship/<?php echo $this->uri->segment(2)?>" class="btn waves-effect waves-light btn-secondary m-t-30 ">Reset</a> -->
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<div class="card overflow-hidden">
							<div class="card-body">
								
								<!-- 	<button id="exportBtn1">Export To Excel</button><br><br> -->
								<div>
									<h6 class="main-content-label mb-1">Registered Student List</h6>
									<span style="padding-top:10px"><strong>Total Students : <?php echo $totalStudents?></strong></span>
								</div>
							<!-- 	<input type="button" class="btn ripple btn-primary pull-left " style="background-color:#ECEDEF;border-color:#ECEDEF;color:black" onclick="tableToExcel('testTable', 'W3C Example Table')" value="Export to Excel"> -->
								<div class="table-responsive">
									<div class="row">
										<div class="col-12">
											<form id="searchCallbackStatus" >
												<div class="row float-right">

													<div class="col-md-6">
														<div class="form-group">

															<label for="callbackStatus">Select Limit Of Student</label>
															<!-- 	<input type="number" name="number" placeholder="" class="form-control"> -->
															<select class="form-control select2-no-search" name="number" id="number">
																<option selected="" disabled="">Select Limit
																</option>
																<option  <?php echo ($this->input->get('number')=="10")? 'selected' : ''?> value="10">10</option>
																<option <?php echo ($this->input->get('number')=="20")? 'selected' : ''?> value="20">20
																</option>

																<option <?php echo ($this->input->get('number')=="50")? 'selected' : ''?> value="50">
																	50
																</option>
																<option <?php echo ($this->input->get('number')=="100")? 'selected' : ''?> value="100">
																	100
																</option>
																	<option <?php echo ($this->input->get('number')=="1000")? 'selected' : ''?> value="1000">
																	1000
																</option>
																<option <?php echo ($this->input->get('number')=="7000")? 'selected' : ''?> value="7000">
																	7000
																</option>
															</select>
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-actions">
															<div class="card-body">

																<input class="btn ripple btn-primary " type="submit" style="background-color: #ff7f45; border-color: #ff7f45" value="Search">




																<!-- <a href="<?php echo base_url()?>push-scholarship/<?php echo $this->uri->segment(2)?>" class="btn waves-effect waves-light btn-secondary m-t-30 ">Reset</a> -->
															</div>
														</div>
													</div>
												</div>
											</form>
										</div>
									</div>
									<table id="testTable" class="table table-bordered border-t0 key-buttons text-nowrap w-100" >


										<!-- <a class="pull-right btn btn-warning btn-large" style="margin-right:40px" href="<?php echo base_url('export-excel');?>"><i class="fa fa-file-excel-o"></i> Export to Excel</a> -->
										<thead>
											<tr>
											    <th>Sl No.</th>
												<th >Name </th>
												<th >Mobile Number</th>
                                                <th >Email Id</th>
												<th >Whatsapp Number</th>
                                              <!--<th>Course</th>-->
											<!--<th >Refferal Code</th>-->
												<th>State</th>
												<th>Course</th>
            
												<th style="width:10%;">Registration Date</th>
												
												<!--<th>Amount</th>-->
												<th>Profile</th>
												<!--<th>Delete</th>-->
											</tr>
										</thead>
										<tbody>
											<?php $index=1;  if(!empty($getregisterestudents)){
											
											foreach($getregisterestudents as $eachStudents){?>
												<tr>
										            <td><?php echo $index?></td>
													<td><?php echo $eachStudents->student_name?></td>
													<td><?php echo $eachStudents->registered_mobile_no?></td>
													<td><?php echo $eachStudents->registered_email?></td>
                                                    
                                                   <?php if($eachStudents->registered_whatsapp_mobile_no!=''){?>
											     
														<td style="text-align: center;">
															<a target = "_blank"
															class="whatsapp"
														href="<?php echo base_url('redirect-to-whatsapp?username='.$eachStudents->student_username.'&mobile_no='.$eachStudents->registered_whatsapp_mobile_no).'&message=Hello '.$eachStudents->student_name.'&redirect='.$this->uri->segment(1);?>" data-action="share/whatsapp/share">
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
											<td><?php echo $eachStudents->student_state;?></td>
											<td><?php echo $eachStudents->course_name;?></td>
                    
											<td><?php echo $eachStudents->registration_datetime;?></td>
											
											<td>
												<a target="_blank"href="<?php echo base_url()?>support-student-details?search=<?php echo $eachStudents->registered_mobile_no;?>">
													<button class="btn ripple btn-primary" style="background-color: #ff7f45; border-color: #ff7f45">view profile</button>
												</a>
											</td>
				

										</tr>
									<?php $index++; }}?>


								</tbody>
							</table>
							<p class="float-right"><?php echo $links; ?></p>
						</div>
					
					</div>
					<div class="modal fade" id="delete">
						<div class="modal-dialog modal-dialog-centered" role="document">
							<div class="modal-content tx-size-sm">
								<div class="modal-body tx-center pd-y-20 pd-x-20">
									<form method="post"action="<?php echo base_url('delete-students')?>">
										<input type="text" name="did" id="did" hidden>	
										<button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button> <i class="icon icon ion-ios-close-circle-outline tx-100 tx-danger lh-1 mg-t-20 d-inline-block"></i>
										<h4 class="tx-danger mg-b-20">Are you sure, you want to delete this account?</h4>
										<!--<p class="mg-b-20 mg-x-20">You won't be able to revert back this!</p>-->
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

<script>
	$(function () {
            // $("#select2").select2();
            // $(".select2").select2();
            // $('#myTable').DataTable();
            // var table = $('#example').DataTable({
            //     "columnDefs": [{
            //         "visible": false,
            //         "targets": 2
            //     }],
            //     "order": [
            //         [2, 'asc']
            //     ],
            //     "displayLength": 25,
            //     "drawCallback": function (settings) {
            //         var api = this.api();
            //         var rows = api.rows({
            //             page: 'current'
            //         }).nodes();
            //         var last = null;
            //         api.column(2, {
            //             page: 'current'
            //         }).data().each(function (group, i) {
            //             if (last !== group) {
            //                 $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
            //                 last = group;
            //             }
            //         });
            //     }
            // });
            // // Order by the grouping
            // $('#example tbody').on('click', 'tr.group', function () {
            //     var currentOrder = table.order()[0];
            //     if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
            //         table.order([2, 'desc']).draw();
            //     } else {
            //         table.order([2, 'asc']).draw();
            //     }
            // });
            // responsive table
            $('#datatable').DataTable({
            	responsive: true,
            	dom: 'Bfrtip',
            	buttons: [
            	'copy', 'csv', 'excel', 'pdf', 'print'
            	]
            });
            

            //  // responsive table
            // $('#config-table1').DataTable({
            //     responsive: true,


            // });
        });

    </script>
<!-- <script>
    $(document).ready(function () {
        var table = $('#reminders').DataTable({
            //"dom": 'Blfrtip',
            "lengthMenu": [
                [50, 100, 1000, -1],
                [50, 100, 1000, "All"]
            ],
            "initComplete": function () {
                $("#reminders").show();
            },
            "buttons": ['copy', 'csv', 'excel', 'pdf', 'print', 'colvis']
        });
        table.buttons().container().appendTo('#reminders_wrapper .col-md-6:eq(0)');
    });
</script> -->








<script type="text/javascript">
	var tableToExcel = (function() {
		var uri = 'data:application/vnd.ms-excel;base64,'
		, template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>'
		, base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) }
		, format = function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; }) }
		return function(table, name) {
			if (!table.nodeType) table = document.getElementById(table)
				var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML}

			window.location.href = uri + base64(format(template, ctx))
		}
	})()
</script>

<!-- <h1>tableToExcel Demo</h1>
<p>Exporting the W3C Example Table</p>

<input type="button" onclick="tableToExcel('testTable', 'W3C Example Table')" value="Export to Excel">

<table id="testTable" summary="Code page support in different versions of MS Windows." rules="groups" frame="hsides" border="2"><caption>CODE-PAGE SUPPORT IN MICROSOFT WINDOWS</caption><colgroup align="center"></colgroup><colgroup align="left"></colgroup><colgroup span="2" align="center"></colgroup><colgroup span="3" align="center"></colgroup><thead valign="top"><tr><th>Code-Page<br>ID</th><th>Name</th><th>ACP</th><th>OEMCP</th><th>Windows<br>NT 3.1</th><th>Windows<br>NT 3.51</th><th>Windows<br>95</th></tr></thead><tbody><tr><td>1200</td><td style="background-color: #00f; color: #fff">Unicode (BMP of ISO/IEC-10646)</td><td></td><td></td><td>X</td><td>X</td><td>*</td></tr><tr><td>1250</td><td style="font-weight: bold">Windows 3.1 Eastern European</td><td>X</td><td></td><td>X</td><td>X</td><td>X</td></tr><tr><td>1251</td><td>Windows 3.1 Cyrillic</td><td>X</td><td></td><td>X</td><td>X</td><td>X</td></tr><tr><td>1252</td><td>Windows 3.1 US (ANSI)</td><td>X</td><td></td><td>X</td><td>X</td><td>X</td></tr><tr><td>1253</td><td>Windows 3.1 Greek</td><td>X</td><td></td><td>X</td><td>X</td><td>X</td></tr><tr><td>1254</td><td>Windows 3.1 Turkish</td><td>X</td><td></td><td>X</td><td>X</td><td>X</td></tr><tr><td>1255</td><td>Hebrew</td><td>X</td><td></td><td></td><td></td><td>X</td></tr><tr><td>1256</td><td>Arabic</td><td>X</td><td></td><td></td><td></td><td>X</td></tr><tr><td>1257</td><td>Baltic</td><td>X</td><td></td><td></td><td></td><td>X</td></tr><tr><td>1361</td><td>Korean (Johab)</td><td>X</td><td></td><td></td><td>**</td><td>X</td></tr></tbody><tbody><tr><td>437</td><td>MS-DOS United States</td><td></td><td>X</td><td>X</td><td>X</td><td>X</td></tr><tr><td>708</td><td>Arabic (ASMO 708)</td><td></td><td>X</td><td></td><td></td><td>X</td></tr><tr><td>709</td><td>Arabic (ASMO 449+, BCON V4)</td><td></td><td>X</td><td></td><td></td><td>X</td></tr><tr><td>710</td><td>Arabic (Transparent Arabic)</td><td></td><td>X</td><td></td><td></td><td>X</td></tr><tr><td>720</td><td>Arabic (Transparent ASMO)</td><td></td><td>X</td><td></td><td></td><td>X</td></tr></tbody></table>

</body>
</html> -->






<!-- <script type="text/javascript">
  $(document).ready(function () {
      $("#exportBtn1").click(function(){
        TableToExcel.convert(document.getElementById("testTable"), {
            name: "Traceability.xlsx",
            sheet: {
            name: "Sheet1"
            }
          });
        });
  });
</script> -->




