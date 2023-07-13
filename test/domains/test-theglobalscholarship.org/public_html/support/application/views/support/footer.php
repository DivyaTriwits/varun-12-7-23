 <?php 
 $backbutton=$this->Support_model->getbackbuttonredirection($this->uri->segment(1));
 ?>
 <style type="text/css">
 	.footer
 	{
 		display: none;
 	}
 	@media only screen and (max-width: 600px) {
 		.footer {
 			display: block;
 			background-color:#ECEDEF;
 		}
 	}
 </style>
 <!-- Main Footer-->
 <div class="main-footer text-center">
 	<div class="container">
 		<div class="row">
 			<div class="col-md-12">
 				<span>Copyright © <?php echo date('Y');?> <a href="#">The Global Scholarship</a>.</span>
 			</div>
 		</div>
 	</div>
 </div>
 <footer class="footer mr-5" id="footer">
 	<div id="buttonGroup" class="btn-group selectors" role="group" aria-label="Basic example">
 		<a  href="<?php if($backbutton!='') echo base_url('/'.$backbutton)?>" type="button" class="btn button-inactive">
 			<!-- <button> -->
 				<div class="selector-holder">
 					<i class="material-icons">arrow_back</i>
 					<span>Back</span>
 				</div>
 				<!-- </button> -->
 			</a>


 			<a  id="account" type="button" class="btn button-inactive" href="<?php echo base_url('support_dashboard')?>">
 				<!-- <button> -->
 					<div class="selector-holder">
 						<i class="material-icons">home</i>
 						<span>home</span>
 					</div>
 					<!-- </button> -->
 				</a>


 				<a  id="account" type="button" class="btn button-inactive" href="<?php echo base_url('failed-registrations')?>">
 					<!-- <button> -->
 						<div class="selector-holder">
 							<i class="material-icons">account_circle</i>
 							<span>Failed</span>
 						</div>
 						<!-- </button> -->
 					</a>
 				</div>
 			</footer>
 			<a href="#top" id="back-to-top"><i class="fe fe-arrow-up"></i></a>
 			<!--End Footer-->

 			<!-- Sidebar -->

 			<!-- End Sidebar -->

 		</div>
 		<!-- End Page -->
 		<!-- <script src="<?php echo base_url()?>assets/plugins/sweet-alert/jquery.sweet-alert.js"></script> -->
 		<!-- Back-to-top -->
 		<!-- <a href="#top" id="back-to-top"><i class="fe fe-arrow-up"></i></a> -->


 		<!--Internal Apexchart js-->
 		<script src="<?php echo base_url()?>assets/js/apexcharts.js"></script>

 		<!-- Internal Chart.Bundle js-->
 		<script src="<?php echo base_url()?>assets/plugins/chart.js/Chart.bundle.min.js"></script>

 		<!-- Peity js-->
 		<script src="<?php echo base_url()?>assets/plugins/peity/jquery.peity.min.js"></script>

 		<!-- Internal Data Table js -->
 		<script src="<?php echo base_url()?>assets/plugins/datatable/jquery.dataTables.min.js"></script>
 		<script src="<?php echo base_url()?>assets/plugins/datatable/dataTables.bootstrap4.min.js"></script>
 		<script src="<?php echo base_url()?>assets/plugins/datatable/dataTables.responsive.min.js"></script>
 		<script src="<?php echo base_url()?>assets/plugins/datatable/fileexport/dataTables.buttons.min.js"></script>
 		<script src="<?php echo base_url()?>assets/plugins/datatable/fileexport/buttons.bootstrap4.min.js"></script>
 		<script src="<?php echo base_url()?>assets/plugins/datatable/fileexport/jszip.min.js"></script>
 		<script src="<?php echo base_url()?>assets/plugins/datatable/fileexport/pdfmake.min.js"></script>
 		<script src="<?php echo base_url()?>assets/plugins/datatable/fileexport/vfs_fonts.js"></script>
 		<script src="<?php echo base_url()?>assets/plugins/datatable/fileexport/buttons.html5.min.js"></script>
 		<script src="<?php echo base_url()?>assets/plugins/datatable/fileexport/buttons.print.min.js"></script>
 		<script src="<?php echo base_url()?>assets/plugins/datatable/fileexport/buttons.colVis.min.js"></script>
 		<script src="<?php echo base_url()?>assets/js/table-data.js"></script>

 		<!-- Perfect-scrollbar js -->
 		<script src="<?php echo base_url()?>assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>

 		<!-- Select2 js-->

 		<script src="<?php echo base_url()?>assets/js/select2.js"></script>

 		<!-- Sidebar js -->
 		<script src="<?php echo base_url()?>assets/plugins/sidebar/sidebar.js"></script>

 		<!-- INTERNAL INDEX js -->
 		<script src="<?php echo base_url()?>assets/js/index.js"></script>

 		<!-- Sticky js -->
 		<script src="<?php echo base_url()?>assets/js/sticky.js"></script>

 		<!-- Custom js -->
 		<script src="<?php echo base_url()?>assets/js/custom.js"></script>

 		<!-- Switcher js -->
 		<script src="<?php echo base_url()?>assets/switcher/js/switcher.js"></script>

 		<!-- Internal Clipboard js-->
 		<script src="<?php echo base_url()?>assets/plugins/clipboard/clipboard.min.js"></script>
 		<script src="<?php echo base_url()?>assets/plugins/clipboard/clipboard.js"></script>

 		<!-- Internal Prism js-->
 		<script src="<?php echo base_url()?>assets/plugins/prism/prism.js"></script>
 		<!-- Internal Gallery js-->
 		<script src="<?php echo base_url()?>assets/plugins/gallery/picturefill.js"></script>
 		<script src="<?php echo base_url()?>assets/plugins/gallery/lightgallery.js"></script>
 		<script src="<?php echo base_url()?>assets/plugins/gallery/lightgallery-1.js"></script>
 		<script src="<?php echo base_url()?>assets/plugins/gallery/lg-pager.js"></script>
 		<script src="<?php echo base_url()?>assets/plugins/gallery/lg-autoplay.js"></script>
 		<script src="<?php echo base_url()?>assets/plugins/gallery/lg-fullscreen.js"></script>
 		<script src="<?php echo base_url()?>assets/plugins/gallery/lg-zoom.js"></script>
 		<script src="<?php echo base_url()?>assets/plugins/gallery/lg-hash.js"></script>
 		<script src="<?php echo base_url()?>assets/plugins/gallery/lg-share.js"></script>
 		<!-- Internal Sweet-Alert js-->
 		
 		<!-- Internal Owl Carousel js-->
 		<script src="<?php echo base_url()?>assets/plugins/owl-carousel/owl.carousel.js"></script>

 		<!-- Internal Form-elements js-->
 		<script src="<?php echo base_url()?>assets/js/form-elements.js"></script>
 		<!-- Internal Jquery-Ui js-->
 		<script src="<?php echo base_url()?>assets/plugins/bootstrap-daterangepicker/moment.min.js"></script>
 		<script src="<?php echo base_url()?>assets/plugins/jquery-ui/ui/widgets/datepicker.js"></script>

 		<!-- Internal Jquery.maskedinput js-->
 		<script src="<?php echo base_url()?>assets/plugins/jquery.maskedinput/jquery.maskedinput.js"></script>

 		<!-- Internal Specturm-colorpicker js-->
 		<script src="<?php echo base_url()?>assets/plugins/spectrum-colorpicker/spectrum.js"></script>

 		<!-- Internal Ion-rangeslider js-->
 		<script src="<?php echo base_url()?>assets/plugins/ion-rangeslider/js/ion.rangeSlider.min.js"></script>

 		<script src="<?php echo base_url()?>assets/plugins/rating/jquery.barrating.js"></script>
 		<script src="<?php echo base_url()?>assets/plugins/rating/ratings.js"></script>

 		<!-- Internal Summernote js-->

 		<!-- Multislider js -->
 		<script src="<?php echo base_url()?>assets/plugins/multislider/multislider.js"></script>
 		<script src="<?php echo base_url()?>assets/js/carousel.js"></script>

 		
 		<!-- Internal Summernote js-->
 		<script src="<?php echo base_url()?>assets/plugins/summernote/summernote-bs4.js"></script>
 		<!-- footer navbar -->
 		<!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
 		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
 		<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script> -->
 		<!-- JS needed for this page -->
 		<script src="<?php echo base_url()?>assets/footernav/js/main.js"></script>
 		<!-- Footer navbar -->
 		<script>
 			$(document).ready(function () {
 				var table = $('#reminders').DataTable({

 					"buttons": ['copy', 'csv', 'excel', 'pdf', 'print', 'colvis']
 				});
 				table.buttons().container().appendTo('#reminders_wrapper .col-md-6:eq(0)');
 			});
 			
 		</script>


 		<script type="text/javascript">
 			

 			$('#example-pill').barrating('show', {
 				theme: 'bars-pill',
 				initialRating: 'A',
 				showValues: true,
 				showSelectedRating: false,
 				allowEmpty: true,
 				emptyValue: '-- no rating selected --',
 				onSelect: function(value, text) {
 					alert('Selected rating: ' + value);

 					document.getElementById('actualRating').value=value;
 				}
 			});

 			$('#summernote').summernote({
 				placeholder: 'Enter criteria for scholarship',
 				tabsize: 3,
 				height: 300
 			});


     			$(document).ready(function(){
           var table = $('#failed-registrations').DataTable( {
       	// lengthChange: false,
       	buttons: [ 'copy', 'excel', 'pdf'],
       	"order": [[ 3, "desc" ]],
    
       	responsive: true,
    		language: {
    			searchPlaceholder: 'Search...',
    			sSearch: '',
    			lengthMenu: '_MENU_ items/page',
    		}
    
    
       });
       table.buttons().container()
       .appendTo( '#failed-registrations_wrapper .col-md-6:eq(0)' );
    })


 			$(document).ready(function(){
			// $('#failed-registrations').Datatable({
   //      "order": [[ 3, "desc" ]]
   // 		});	

   var table = $('#testTable').DataTable( {
   	lengthChange: false,
   	bPaginate: false,
   buttons: [
       {
           extend: 'pdf',
           footer: true,
           exportOptions: {
                columns: [0,1,3,4,5]
            }
       },
       {
           extend: 'excel',
            footer: true,
           exportOptions: {
                 columns:[0,1,2,4,5,6]
            }
       }         
    ], 
   	//"order": [[ 4, "desc" ]],
   
   	responsive: true,
		language: {
			searchPlaceholder: 'Search from below table...',
			sSearch: '',
			// lengthMenu: '_MENU_ items/page',
		}


   });
   table.buttons().container()
   .appendTo( '#testTable_wrapper .col-md-6:eq(0)' );
})
		
      $(document).ready(function(){
      // $('#failed-registrations').Datatable({
   //      "order": [[ 3, "desc" ]]
   //     }); 

   var table = $('#scholarshiplist').DataTable( {
    // lengthChange: false,
    buttons: [ 'copy', 'excel', 'pdf'],
    "order": [[ 0, "desc" ]],

    responsive: true,
    language: {
      searchPlaceholder: 'Search...',
      sSearch: '',
      lengthMenu: '_MENU_ items/page',
    }


   });
   table.buttons().container()
   .appendTo( '#scholarshiplist_wrapper .col-md-6:eq(0)' );
})
		
      $(document).ready(function(){
      // $('#failed-registrations').Datatable({
   //      "order": [[ 3, "desc" ]]
   //     }); 

   var table = $('#live_scholarshipslist').DataTable( {
    // lengthChange: false,
    buttons: [ 'copy', 'excel', 'pdf'],
    "order": [[ 1, "asc" ]],

    responsive: true,
    language: {
      searchPlaceholder: 'Search...',
      sSearch: '',
      lengthMenu: '_MENU_ items/page',
    }


   });
   table.buttons().container()
   .appendTo( '#live_scholarshipslist_wrapper .col-md-6:eq(0)' );
})
</script>

</body>


</html>