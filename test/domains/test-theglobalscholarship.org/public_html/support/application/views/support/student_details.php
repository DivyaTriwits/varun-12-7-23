
<!-- Main Content-->
<div class="main-content pt-4 mt-5 mb-4">
    <div class="container-fluid">

      <!-- Page Header -->
  <!-- <div class="text-wrap">
            <div class="example">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-style1 mg-b-0">

                        
                        <li class="breadcrumb-item">
                            <a href="<?php echo base_url()?>">Home</a>
                            
                            <li class="breadcrumb-item active">Student Profile</li>
                        </ol>
                    </nav>
                </div>
            </div> -->
            <!-- End Page Header -->

            <div class="row square">
             <div class="col-lg-12 col-md-12">
                <div class="card">
                   <div class="card-body">


                      <div class="profile-tab tab-menu-heading">
                         <nav class="nav main-nav-line p-3 tabs-menu profile-nav-line bg-gray-100 rounded-11">
                            <a class="nav-link" data-toggle="tab" href="#about">Personal Details</a>
                            <a class="nav-link" data-toggle="tab" href="#edit">Academic Details</a>
                            <a class="nav-link" data-toggle="tab" href="#timeline">Family Details</a>
                            <a class="nav-link" data-toggle="tab" href="#gallery">Extracurricular</a>
                            <!--<a class="nav-link" data-toggle="tab" href="#friends">Bank And Address</a>-->
                            <!--<a class="nav-link" data-toggle="tab" href="#invoice">Invoice</a>-->
                            <!-- <a class="nav-link" data-toggle="tab" href="#settings">Documents</a> -->
                        </nav>

                    </div>

                    <!--<a href="<?php echo base_url('support_dashboard')?>">-->
                    <!--    <button type="button" class="btn ripple btn-dark float-left mt-3" style="margin-right: 5px;background-color:#460056;border-color:#460056">Back</button>-->
                    <!--</a>-->

                </div>

            </div>

        </div>
    </div>

    <!-- Row -->
    <div class="row">
     <div class="col-lg-12 col-md-12">
        <div class="card main-content-body-profile">
           <div class="tab-content">
              <div class="main-content-body tab-pane p-4 border-top-0 active" id="about">
                 <div class="card-body p-0 border p-0 rounded-11">
                    <div class="card-body">
                       <div class="row">

                          <div class="col-md-3 col-xs-6 b-r"> <strong>Name</strong>
                             <br>
                             <p class="text-muted"><?php if($personal!='')echo $personal->student_fullname;?></p>
                         </div>
                         <div class="col-md-3 col-xs-6 b-r"> <strong>Mobile No.</strong>
                             <br>
                             <p class="text-muted"> <?php  if($student_details!='')echo $student_details->registered_mobile_no;?> </p>
                         </div>
                         <div class="col-md-3 col-xs-6 b-r"> <strong>Email Id</strong>
                             <br>
                             <p class="text-muted"><?php  if($student_details!='')echo $student_details->registered_email ;?></p>
                         </div>
                         <div class="col-md-3 col-xs-6 b-r"> <strong>Whatsapp No.</strong>
                             <br>
                             <p class="text-muted"> <?php  if($student_details!='')echo $student_details->registered_whatsapp_mobile_no;?> </p>
                         </div>
                      
                     </div>
                     <div class="row">
                      <div class="col-md-3 col-xs-6 b-r"> <strong>Gender</strong>
                         <br>
                         <p class="text-muted"><?php if($personal!='')echo $personal->student_gender;?></p>
                     </div>
                     <div class="col-md-3 col-xs-6 b-r"> <strong>Date of Birth</strong>
                         <br>
                         <p class="text-muted"><?php if($personal!='')echo $personal->date_of_birth;?></p>
                     </div>
                     <div class="col-md-3 col-xs-6 b-r"> <strong>State</strong>
                         <br>
                         <p class="text-muted"><?php if($personal!='') echo $student_details->student_state;?></p>
                     </div>
                        <!--<div class="col-md-3 col-xs-6"> <strong>Aadhaar no</strong>-->
                        <!--     <br>-->
                        <!--     <p class="text-muted"><?php if($personal!='')echo $personal->adharno;?></p>-->
                        <!-- </div>-->
                        <div class="col-md-3 col-xs-6 b-r"> <strong>Hosteller?</strong>
                                          <br>
                                         <!--<p class="text-muted"><?php echo ($student_details->is_hosteller == 1) ? 'Yes' : 'No' ;?></p>-->
                                         
                                         <p class="text-muted"><?php if($academic!='') echo ($academic->is_hosteller == 1) ? 'Yes' : 'No';?></p>
                                           </div>
                    
                
                                          
                                            <div class="col-md-3 col-xs-6 b-r"> <strong>Orphan? </strong>
                                              <br>
                                              <p class="text-muted"><?php if($family!='') echo ($family->is_orphans == 1) ? 'Yes' : 'No';?></p>
                                            </div>
                                          
                                            <div class="col-md-3 col-xs-6"> <strong>Single child?</strong>
                                              <br>
                                              <p class="text-muted"><?php if($personal!='')echo ($personal->is_single_child == 1) ? 'Yes' : 'No';?></p>
                                            </div>
                                               <div class="col-md-3 col-xs-6 b-r"> <strong>Single girl child?</strong>
                                            <br>
                                            <p class="text-muted"><?php if($personal!='') echo ($personal->is_single_girl_child == 1) ? 'Yes' : 'No';?></p>
                                          </div>
                                          <div class="col-md-3 col-xs-6 b-r"> <strong>Handicap?</strong>
                                              <br>
                                              <p class="text-muted"><?php if($personal!='')echo ($personal->is_specially_abled == 1) ? 'Yes' : 'No';?></p>
                                            </div>
                                      
                                          
                                          
                                          
                                          <div class="col-md-3 col-xs-6 b-r"> <strong>Handicap Type? </strong>
                                            <br>
                                            <p class="text-muted"><?php if($personal!='') echo $personal->specially_abled_type?></p>
                                          </div>
                                          <div class="col-md-3 col-xs-6 b-r"> <strong>Handicap Percentage?</strong>
                                            <br>
                                            <p class="text-muted"><?php if($personal!='') echo $personal->specially_abled_percentage  ?></p>
                                          </div>
                                          <div class="col-md-3 col-xs-6"> <strong>Registration Date</strong>
                                            <br>
                                            <p class="text-muted"><?php if($student_details!='') echo $student_details->registration_datetime;?></p>
                                          </div>
                                             <div class="col-md-3 col-xs-6 b-r"> <strong>Status</strong>
                                                <br>
                                                   <?php if($student_details->subscription_validity_datetime<=date('Y-m-d H:i:s')){?>
                                                 <p class="text-success">InActive</p>
                                            <?php }else{?>
                                               <p class="text-danger">Active</p> 
                                            <?php }?>
                                            </div>
                                        </div>
                                        <div class="row">
                                              <div class="col-md-3 col-xs-6"> <strong>Amount Paid</strong>
                                          <br>
                                             <p class="text-muted"><?php if($invoice!='')echo $invoice->amount;?></p>
                                          </div>
                                         
                                           <!--   <div class="col-md-3 col-xs-6 b-r"> <strong>Status</strong>
                                                <br>
                                                   <?php if($student_details->subscription_validity_datetime>=date('y-m-d')){?>
                                                 <p class="text-success">Active</p>
                                            <?php }else{?>
                                               <p class="text-danger">Inactive</p> 
                                            <?php }?>
                                            </div> -->
                                          <!--  <div class="col-md-3 col-xs-6 b-r"> <strong>Expire Date</strong>-->
                                          <!--  <br>-->
                                          <!--  <p class="text-muted"><?php if($student_details!='') echo $student_details->subscription_validity_datetime ?></p>-->
                                          <!--</div>-->
                                        <div class="col-md-3 col-xs-6 b-r"> <strong>Registered Through</strong>
                                            <br>
                                            <p class="text-muted">

                                              <?php $rcode=$this->Support_model->getRefferalRegistration($student_details->referral_code)?>

                                              <?php $scode=$this->Support_model->getSalesDiscountCode($student_details->referral_code)?>

                                              <?php $influncer=$this->Support_model->getRefferalByInfluncerRegistration($student_details->referral_code)?>


                                              <?php if($rcode->num_rows()>0){
                                                $rcode=$rcode->row()?>
                                                Refferal : <?php echo $rcode->student_name;?>
                                              <?php } else if($scode->num_rows()>0){
                                               $scode=$scode->row()?>
                                               Sales : <?php echo $scode->email;?>
                                               
                                             <?php }else if($influncer->num_rows()>0){
                                              $influncer=$influncer->row();
                                              ?>
                                              Influncer : <?php echo $influncer->full_name?>
                                            <?php } else{?>
                                              TGS Portal
                                            <?php }?>




                                          </p>
                                        </div>

                                      
                                    </div>

                                </div>
                            </div>
                            </div>
                            <div class="main-content-body tab-pane p-4 border-top-0" id="edit">
                              <div class="card-body border rounded-11">
                                <div class="mb-4 main-content-label">Academic Details</div>
                                <div class="card-body">
                                  <div class="row">

                                    <div class="col-md-3 col-xs-6 b-r"> <strong>Current School Name</strong>
                                      <br>
                                      <p class="text-muted"><?php if($academic!='')echo $academic->student_current_school_name  ;?> </p>
                                    </div>
                                    <div class="col-md-3 col-xs-6 b-r"> <strong>Studying State</strong>
                                      <br>
                                      <p class="text-muted"><?php if($academic!='')echo $academic->student_studying_state ;?> </p>
                                    </div>
                                    <div class="col-md-3 col-xs-6 b-r"> <strong>Studying District</strong>
                                      <br>
                                      <p class="text-muted"><?php if($academic!='')echo $academic->student_studying_district;?></p>
                                    </div>
                                    <div class="col-md-3 col-xs-6"> <strong>Stream</strong>
                                      <br>
                                      <p class="text-muted"><?php if($academic!='')echo $academic->qualification;?></p>
                                    </div>
                                  </div>
                                  <div class="row">

                                    <div class="col-md-3 col-xs-6 b-r"> <strong>Current Class</strong>
                                      <br>
                                      <p class="text-muted"><?php if($academic!='')echo $academic->current_class_or_degree  ;?> </p>
                                    </div>
                                    <div class="col-md-3 col-xs-6 b-r"> <strong>Current Semester</strong>
                                      <br>
                                      <p class="text-muted"><?php if($academic!='')echo $academic->current_semester ;?> </p>
                                    </div>
                                    <div class="col-md-3 col-xs-6 b-r"> <strong>Quota</strong>
                                      <br>
                                      <p class="text-muted"><?php if($academic!='')echo $academic->quota;?></p>
                                    </div>
                                           <!--  <div class="col-md-3 col-xs-6"> <strong>Qualification</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $academic->qualification;?></p>
                                            </div> -->
                                        </div>
                                        <h5><u>10th Details</u></h5>
                                        <div class="row">

                                          <div class="col-md-3 col-xs-6 b-r"> <strong>10th Board</strong>
                                            <br>
                                            <p class="text-muted"><?php if($academic!='')echo $academic->tenth_board  ;?> </p>
                                          </div>
                                          <div class="col-md-3 col-xs-6 b-r"> <strong>10th Result Type</strong>
                                            <br>
                                            <p class="text-muted"><?php if($academic!='')echo $academic->tenth_cgpa_type  ;?> </p>
                                          </div>
                                          <div class="col-md-3 col-xs-6 b-r"> <strong>10th class Result</strong>
                                            <br>
                                            <p class="text-muted"><?php if($academic!='')echo $academic->tenth_cgpa_or_percentage;?></p>
                                          </div>
                                          <div class="col-md-3 col-xs-6"> <strong>10th Year Of Passing</strong>
                                            <br>
                                            <p class="text-muted"><?php if($academic!='')echo $academic->tenth_year_of_passing;?></p>
                                          </div>
                                        </div>
                                        <h5><u>12th Details</u></h5>
                                        <div class="row">

                                          <div class="col-md-3 col-xs-6 b-r"> <strong>12th Board</strong>
                                            <br>
                                            <p class="text-muted"><?php if($academic!='')echo $academic->twelfth_board  ;?> </p>
                                          </div>
                                          <div class="col-md-3 col-xs-6 b-r"> <strong>12th Result Type</strong>
                                            <br>
                                            <p class="text-muted"><?php if($academic!='')echo $academic->twelfth_cgpa_type  ;?> </p>
                                          </div>
                                          <div class="col-md-3 col-xs-6 b-r"> <strong>12th class Result</strong>
                                            <br>
                                            <p class="text-muted"><?php if($academic!='')echo $academic->twelfth_cgpa_or_percentage;?></p>
                                          </div>
                                          <div class="col-md-3 col-xs-6"> <strong>12th Year Of Passing</strong>
                                            <br>
                                            <p class="text-muted"><?php if($academic!='')echo $academic->twelfth_year_of_passing;?></p>
                                          </div>
                                        </div>
                                        <h5><u>Diploma Details</u></h5>
                                        <div class="row">

                                          <div class="col-md-3 col-xs-6 b-r"> <strong>Diploma Cgpa Type</strong>
                                            <br>
                                            <p class="text-muted"><?php if($academic!='')echo $academic->diploma_cgpa_type  ;?> </p>
                                          </div>

                                          <div class="col-md-3 col-xs-6 b-r"> <strong>Diploma Cgpa or Percentage</strong>
                                            <br>
                                            <p class="text-muted"><?php if($academic!='')echo $academic->diploma_cgpa_or_percentage;?></p>
                                          </div>
                                          <div class="col-md-3 col-xs-6"> <strong>Diploma Year Of Passing</strong>
                                            <br>
                                            <p class="text-muted"><?php if($academic!='')echo $academic->diploma_year_of_passing;?></p>
                                          </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="main-content-body  tab-pane p-4 border-top-0" id="timeline">
                              <div class="card-body border rounded-11">
                                <div class="mb-4 main-content-label">Family Details</div>
                                <div class="card-body">
                                <!--  <?php if($family == ''){?>
                                  <div class="row">

                                    <div class="col-lg-12 col-xlg-9 col-md-7">

                                      <div class="card">
                                        <div class="card-body">
                                          <h2>no familiy data found</h2>
                                        </div>
                                      </div>
                                    </div>
                                  </div> <?php }else{?> -->

                                  <div class="row">


                                    <div class="col-md-3 col-xs-6 b-r"> <strong>Father Name</strong>
                                      <br>
                                      <p class="text-muted"><?php if($family!='') echo $family->father_fullname;?></p>
                                    </div>
                                    <div class="col-md-3 col-xs-6 b-r"> <strong>Mother Name</strong>
                                      <br>
                                      <p class="text-muted"><?php if($family!='')echo $family->mother_fullname;?></p>
                                    </div>
                                    <div class="col-md-3 col-xs-6 b-r"> <strong>Religion</strong>
                                      <br>
                                      <p class="text-muted"><?php if($family!='')echo $family->religion;?></p>
                                    </div>
                                    <div class="col-md-3 col-xs-6"> <strong>Category</strong>
                                      <br>
                                      <p class="text-muted"><?php if($family!='')echo $family->category ;?></p>
                                    </div>
                                  </div>
                                  <div class="row">

                                    <div class="col-md-3 col-xs-6 b-r"> <strong>Family Income</strong>
                                      <br>
                                      <p class="text-muted"><?php if($family!='') echo $family->family_annual_income;?></p>
                                    </div>
                                    <div class="col-md-3 col-xs-6 b-r"> <strong>Number Of Siblings</strong>
                                      <br>
                                      <p class="text-muted"><?php if($family!='')echo $family->number_of_siblings;?></p>
                                    </div>
                                    <div class="col-md-3 col-xs-6 b-r"> <strong>Parent Occupation</strong>
                                      <br>
                                      <p class="text-muted"><?php if($family!='')echo $family->parent_occupation;?></p>
                                    </div>
                                    <div class="col-md-3 col-xs-6"> <strong>Single Parent?</strong>
                                      <br>
                                      <p class="text-muted"><?php if($family!='')echo $family->is_single_parent;?></p>
                                    </div>
                                  </div><!-- <?php }?> -->
                                </div>
                              </div>
                            </div>
                            <div class="main-content-body  tab-pane p-4 border-top-0" id="gallery">
                         <!--     <div class="card-body border rounded-11">
                                <div class="mb-4 main-content-label">Extracurricular</div>
                                <div class="card-body">
                                  
                                            <div class="table-responsive">
                                              <table class="table" id="example3">

                                                  <thead>

                                                     <tr>
                                                        <th>Activity Name</th>
                                                       <th>Activity Achievement</th>

                                                   </tr>
                                               </thead>

                                               <tbody>
                                                 <?php foreach($extrac as $extra){?>
                                                     <tr>
                                                      <td><?php echo $extra->student_activity_name?></td>
                                                      <td ><?php echo $extra->student_activity_achievement?></td>
                                                  </tr>
                                              <?php }?>
                                          </tbody>
                                      </table>
                                  
                              </div>
                          </div>
                      </div> -->

                      <div class="row">
                        <div class="col-12">
                            <!-- table responsive -->
                            <div class="card">
                                <div class="card-body">
                                    <h6 class="main-content-label mb-1">Extracurricular</h6> 

                                    <div class="table-responsive">
                                      <table class="table" id="example3" style="width: 100%">
                                        <thead>
                                            <tr>
                                                <th class="wd-20p">Sl No.</th>
                                                <th class="wd-20p">Activity Name</th>
                                                <th class="wd-20p">Activity Achievement</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php  
                                            $index = 1; if($extrac!='')
                                            foreach($extrac as $extra){ ?>
                                                <tr>
                                                    <td><?php echo $index;?></td>
                                                    <td><?php echo $extra->student_activity_name?></td>
                                                    <td ><?php echo $extra->student_activity_achievement?></td>
                                                </tr>
                                                <?php $index++; }?>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="main-content-body  tab-pane p-4 border-top-0" id="friends">
                 <div class="card-body border rounded-11">
                  <div class="mb-4 main-content-label">Bank And Address</div>
                  <div class="card-body">
                      <h5><u>Bank Details</u></h5>
                      <div class="row">

                         <div class="col-md-3 col-xs-6 b-r"> <strong>Beneficiary Name</strong>
                          <br>
                          <p class="text-muted"><?php if($bank!='')echo $bank->bank_beneficiary_name  ;?> </p>
                      </div>
                       <div class="col-md-3 col-xs-6 b-r"> <strong>Bank Name</strong>
                          <br>
                          <p class="text-muted"><?php if($bank!='')echo $bank->bank_name ;?> </p>
                      </div>
                      <div class="col-md-3 col-xs-6 b-r"> <strong>Account Type</strong>
                          <br>
                          <p class="text-muted"><?php if($bank!='')echo $bank->bank_account_type  ;?> </p>
                      </div>
                      <div class="col-md-3 col-xs-6 b-r"> <strong>Account Number</strong>
                          <br>
                          <p class="text-muted"><?php if($bank!='')echo $bank->bank_account_no;?></p>
                      </div>
                      <div class="col-md-3 col-xs-6"> <strong>IFSC Code</strong>
                          <br>
                          <p class="text-muted"><?php if($bank!='') echo $bank->bank_ifsc_code;?></p>
                      </div>
                      <div class="col-md-3 col-xs-6"> <strong>Branch</strong>
                          <br>
                          <p class="text-muted"><?php if($bank!='')echo $bank->bank_branch_name;?></p>
                      </div>
                  </div>
                  <h5><u>Address Details</u></h5>
                  <div class="row">

                     <div class="col-md-3 col-xs-6 b-r"> <strong>Native State</strong>
                      <br>
                      <p class="text-muted"><?php if($bank!='')echo $bank->student_native_state ;?> </p>
                  </div>

                  <div class="col-md-3 col-xs-6 b-r"> <strong>Native District</strong>
                      <br>
                      <p class="text-muted"><?php if($bank!='')echo $bank->student_native_district;?></p>
                  </div>
                  <div class="col-md-3 col-xs-6 b-r"> <strong>City</strong>
                      <br>
                      <p class="text-muted"><?php if($bank!='')echo $bank->student_studying_city;?></p>
                  </div>
                  <div class="col-md-3 col-xs-6"> <strong>Rural</strong>
                      <br>
                      <p class="text-muted"><?php if($bank!='')echo $bank->is_from_rural;?></p>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <div class="main-content-body  tab-pane p-4 border-top-0" id="invoice">
     <div class="card-body border rounded-11">
      <div class="mb-4 main-content-label">Invoice</div>
      <div class="card-body">
          <h5><u>Payment Details</u></h5>
          <div class="row">

             <div class="col-md-3 col-xs-6 b-r"> <strong>Invoice Id</strong>
              <br>
              <p class="text-muted"><?php if($invoice!='')echo $invoice->invoice_id;?></p>
          </div>
          <div class="col-md-3 col-xs-6 b-r"> <strong>Payment Date</strong>
              <br>
              <p class="text-muted"><?php if($invoice!='')echo $invoice->date;?></p>
          </div>
          <div class="col-md-3 col-xs-6 b-r"> <strong>Subscription Expired Date</strong>
              <br>
              <p class="text-muted"><?php if($invoice!='')echo $invoice->subscription_validity_datetime;?></p>
          </div>
          <div class="col-md-3 col-xs-6 b-r"> <strong>Amount</strong>
              <br>
              <p class="text-muted"><?php if($invoice!='')echo $invoice->amount;?></p>
          </div>
        <!--   <div class="col-md-3 col-xs-6 b-r"> <strong>Account Number</strong>
              <br>
              <p class="text-muted"><?php if($bank!='')echo $bank->bank_account_no;?></p>
          </div>
          <div class="col-md-3 col-xs-6"> <strong>IFSC Code</strong>
              <br>
              <p class="text-muted"><?php if($bank!='') echo $bank->bank_ifsc_code;?></p>
          </div>
          <div class="col-md-3 col-xs-6"> <strong>Branch</strong>
              <br>
              <p class="text-muted"><?php if($bank!='')echo $bank->bank_branch_name;?></p>
          </div> -->
      </div>
  </div>
</div>
</div>

</div>
</div>
</div>
</div>
<!-- End Row -->


</style>
<div class="row">

    <div class="col-12">
        <!-- table responsive -->
        <div class="card">
            <div class="card-body">
               <h6 class="main-content-label mb-1">Pushed Scholarships</h6> 
               <?php if($this->session->flashdata('applied-scholarship-success')){?>
                <div class="alert alert-success">
                    <h5 style="text-align: center;">
                        <?php echo $this->session->flashdata('applied-scholarship-success');?>
                    </h5>
                </div>
            <?php }?>
            <div class="table-responsive">
              <table class="table" id="example1">
                <thead>
                    <tr>
                        <th class="wd-20p">Scholarship Name</th>
                        <th class="wd-20p">Scholarship Reward</th>
                        <?php if($this->session->userdata('role')!='' && $this->session->userdata('role')=="Admin"){?>
                        <th class="wd-20p">URl</th>
                      <?php } ?>
                        <!--<th class="wd-20p">Notification sent date</th>-->
                      
                         <th class="wd-20p">Start date</th>
                        <th class="wd-20p">End Date</th>
                        <th class="wd-20p">Scholarship status</th>
                      <!--   <th class="wd-20p">Status</th>
                        <th class="wd-20p">Recieved?</th> -->

                        <th class="wd-20p">Status</th>
                        
                          <th class="wd-20p">Notified date</th>
                        <?php if($this->session->userdata('role')!='' && $this->session->userdata('role')=="Admin"){?>
                        <th class="wd-20p">Remove</th>
                      <?php } ?>
                    </tr>
                </thead>
                <tbody>
                    <?php  
                    $index = 1;
                    foreach($notified_scholarships as $row){ ?>
                        <tr>
                            <td class='fname'>
                                <?php echo $row->scholarship_name;?>
                            </td>
                            <td>
                                <?php echo $row->scholarship_worth;?>
                            </td>
                            <?php if($this->session->userdata('role')!='' && $this->session->userdata('role')=="Admin"){?>
                            <td>
                                <a target="_blank" href="
                                <?php echo $row->scholarship_link;?>">
                                Go To Scholarship Link
                            </a>
                        </td>
                      <?php } ?>
                       
                          <td>
                            <?php echo $row->application_start_date ;;?>
                        </td>
                        <td>
                            <?php echo $row->application_end_date; ?>
                        </td>
                          <?php $last = $row->application_end_date;
                            $now = date('Y-m-d');
                            if($last >= $now){?>
                             <td>Active</td>
                         <?php } else {?>
                           <td>Closed</td>
                       <?php }?>
                    
             <!--            <td>
                            <?php if($row->applied_status == '1'){ ?>
                                <label>Applied</label>
                            <?php }else{?>
                             <label>Not Applied</label>
                         <?php }?>
                     </td>
                     <td>
                        <?php if($row->reward_received_status == '1'){ ?>
                            <label>Received</label>
                        <?php }else{?>
                            <label>Not Applied</label>
                        <?php }?>
                    </td> -->
            


                    <td>

                          <?php if($row->link_visit_status  == '1'){ ?>
                                <label>Visited <i style="color:green" class="fa fa-check"></i> </label><br >
                            <?php }else{?>
                             <label>Visited <i style="color:red" class="fa fa-close"></i></label><br >
                         <?php }?>

                          <?php if($row->applied_status == '1'){ ?>
                                <label>Applied  <i style="color:green" class="fa fa-check"></i></label><br >
                            <?php }else{?>
                             <label>Applied <i style="color:red" class="fa fa-close"></i> </label><br >
                         <?php }?>

                           <?php if($row->reward_received_status == '1'){ ?>
                            <label>Received <i style="color:green" class="fa fa-check"></i> </label><br >
                        <?php }else{?>
                            <label>Received <i style="color:red" class="fa fa-close"></i> </label><br >
                        <?php }?>




                    </td>



                    <td>
                            <?php echo $row->date_time;?>
                             
                        </td>
               <?php if($this->session->userdata('role')!='' && $this->session->userdata('role')=="Admin"){?>
               <td><button style="background-color: #ff7f45; border-color: #ff7f45" class="btn btn-sm btn-danger" onclick="deletePop('<?php echo $student_details->student_username;?>','<?php echo $row->scholarship_id;?>')" data-toggle="modal" data-target="#delete-modal" >Remove</button></td>
             <?php } ?>
           </tr>
           <?php $index++; }?>
       </tbody>
   </table>

</div>
</div>
</div>
</div>
</div>
<?php if($this->session->userdata('role')!='' && $this->session->userdata('role')=="Admin"){?>
<div class="row">
   <div class="col-12">
    <!-- table responsive -->
    <div class="card">
     <div class="card-body">
         <h6 class="main-content-label mb-1">Live scholarships</h6>
         <div class="table-responsive">
           <table class="table" id="example2">
            <thead>
             <tr>
              <th class="wd-20p">Scholarship Name</th>
              <th class="wd-20p">Last Date</th>
              <th class="wd-20p">Description</th>
              <th class="wd-20p">Who's offering</th>
              <th class="wd-20p">Gender</th>
              <th class="wd-20p">Benefits</th>
              <th class="wd-20p">Level Of Study</th>
              <th class="wd-20p">Hosteller?</th>
              <th class="wd-20p">Orphan?</th>
              <th class="wd-20p">Handicap?</th>
              <th class="wd-20p">Scholarship category</th>
              <th class="wd-20p">Religion</th>
              <th class="wd-20p">Caste</th>
              <th class="wd-20p">City</th>
              <th class="wd-20p">Course</th>
              <th class="wd-20p">Sports</th>
              <th class="wd-20p">Talent</th>
              <th class="wd-20p">Percentage criteria</th>
              <th class="wd-20p">Family income</th>
              <th class="wd-20p">Added date</th>
              <th class="wd-20p">Min age</th>
              <th class="wd-20p">Max age</th>
              <th class="wd-20p">Worth</th>
              <th class="wd-20p">URL</th>
              <th class="wd-20p">Push</th>
          </tr>
      </thead>
      <tbody>
         <?php  
         $index = 1;
         foreach($not_notified_scholarships->result() as $row){ ?>
             <?php $replacedDesc=''; if($row->scholarship_description !== ''){
              $replacedDesc = str_replace('"','&quot;',$row->scholarship_description);
          }?>
          <tr>
              <td><?php echo $row->scholarship_name;?></td>
              <td><?php echo $row->application_end_date;?></td>
              <td><?php echo $row->scholarship_description;?></td>
              <td><?php echo $row->scholarship_provider;?></td>
              <td><?php if(is_array(json_decode($row->gender))){ foreach(json_decode($row->gender) as $eachEntry){ echo $eachEntry.', ';}}?></td>
              <td><?php echo $row->benefits;?></td>
              <td><?php if(is_array(json_decode($row->courses))){ foreach(json_decode($row->courses) as $eachEntry){ echo $eachEntry.', ';}}?></td>
              <td><?php if(is_array(json_decode($row->is_hosteller))){ foreach(json_decode($row->is_hosteller) as $eachEntry){ echo $eachEntry.', ';}} ?></td>
              <td><?php echo ($row->is_for_orphans) ? 'Yes': 'No';?></td>
              <td><?php echo $row->disability_type?></td>
              <td><?php echo $row->scholarship_type;?></td>
              <td><?php if(is_array(json_decode($row->religion))){ foreach(json_decode($row->religion) as $eachEntry){ echo $eachEntry.', ';}}?></td>
              <td><?php if(is_array(json_decode($row->caste))){ foreach(json_decode($row->caste) as $eachEntry){ echo $eachEntry.', ';}}?></td>
              <td><?php if(is_array(json_decode($row->cities))){ foreach(json_decode($row->cities) as $eachEntry){ echo $eachEntry.', ';}}?></td>
              <td><?php if(is_array(json_decode($row->current_class_or_degree))){ foreach(json_decode($row->current_class_or_degree) as $eachEntry){ echo $eachEntry.', ';}}?></td>
              <td><?php echo $row->special_talent;?></td>
              <td><?php echo $row->talent;?></td>
              <td><?php echo $row->previous_year_cgpa_or_percentage;?></td>
              <td><?php echo $row->family_annual_income;?></td>
              <td><?php echo $row->scholarship_added_date;?></td>
              <td><?php echo $row->minimum_age;?></td>
              <td><?php echo $row->maximum_age;?></td>
              <td><?php echo $row->scholarship_worth;?></td>
              <td><a style="background-color: #ff7f45; border-color: #ff7f45" href="<?php echo $row->scholarship_link;?>" class="btn btn-sm btn-primary">Visit Link</a></td>
              <td><a style="background-color: #ff7f45; border-color: #ff7f45" class="btn btn-sm btn-primary" href="<?php echo base_url('support-push-scholarship/'.$row->scholarship_id.'/'.$student_details->student_username)?>">Push</a></td>
          </tr>
          <?php $index++; }?>
      </tbody>
  </table>
</div>
</div>
</div>
</div>
</div>
<?php } ?>
<div id="delete-modal" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Are You Sure?</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form method="post" action="<?php echo base_url('support-delete-pushed-scholarship');?>">
                <div class="modal-body">
                    <input type="hidden" class="form-control" name="scholarship_id" id="scholarship_id">
                    <input type="hidden" class="form-control" name="username" id="username">
                    <input type="hidden" class="form-control" value="<?php echo $this->input->get('search')?>" name="redirect_to" id="redirect_to">
                </div>
                <div class="modal-footer">
                    <label class="btn btn-default waves-effect" data-dismiss="modal">Close</label>
                    <button type="submit" class="btn btn-danger waves-effect waves-light">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
</div>
<!-- End Main Content-->



<script>
    function deletePop(student_username,scholarshipId){
                // alert(username);
                $('#scholarship_id').val(scholarshipId);
                $('#username').val(student_username);
            }
        </script>
        
        <style type="text/css">
            .table-responsive > #config-table > .row{
                display: flex;
                flex-wrap: unset;
                margin-right: -10px;
                margin-left: -10px
            }
        </style>


        <script>
            <?php if($this->session->flashdata('success')){?>
                Swal({
                    position: 'top-end',
                    type: 'success',
                    title: 'Pushed Scholarship',
                    showConfirmButton: false,
                    timer: 4000,
                });
            <?php }?>
            
            <?php if($this->session->flashdata('success-delete')){?>
                Swal({
                    position: 'top-end',
                    type: 'success',
                    title: 'Deleted successfully..',
                    showConfirmButton: false,
                    timer: 4000,
                });
            <?php }?>
            
            <?php if($this->session->flashdata('failure')){?>
                Swal({
                    position: 'top-end',
                    type: 'error',
                    title: 'Something went wrong!!!',
                    showConfirmButton: false,
                    timer: 4000,

                });
            <?php }?>
        </script>