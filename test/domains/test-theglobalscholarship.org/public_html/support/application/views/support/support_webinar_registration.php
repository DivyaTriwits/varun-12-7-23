<?php if($webinarLinks->num_rows() > 0 ){
    $webinarLinksCount = $webinarLinks->num_rows();
    $webinarDetails = $webinarLinks->row();
    $regCount = $this->db->where('webinar_name', $webinarDetails->webinar_name)->get('students_webinar_registration')->num_rows();

    if($webinarDetails->link_type == 'Whatsapp'){
        $webinarLinksResult = $webinarLinks->result();
        $index = 1; $min = 0; $max = 250; $increase = 250;
         foreach($webinarLinksResult as $eachLink){
             if($index == 1){
                if($regCount >= $min && $regCount <= $max){
                    
                    $urlLink = $eachLink->links;
                }
             }else{
                if($regCount > $min && $regCount <= $max-1){
                
                    $urlLink = $eachLink->links;
                }
             }
            $min = $max;
            $max += 250;
            $index++;
        }
}else{
  
    $urlLink = $webinarDetails->links;

}
}else{
    redirect('not-found');
}?>
<!--=======Page Heading =================================-->
<div class="main-content pt-5 mt-5">
  <div class="container-fluid">
<div class="register-page page-wrapper " style="padding: 10px 0;">
  <div class="container">
    <div class="row justify-content-center">
        <?php if(!$this->session->userdata('user_added_allow_qr_and_link')){?>
       <div class="col-lg-6 col-md-6 col-sm-6 animated fadeInRight delay-4s" id="registration">
        <div class="login-form-area register-form-area">
         <form autocomplete="off" method="post" class="needs-validation" novalidate action="<?php echo base_url('support-webinar-registration')?>">
          <!--<h2 style="font-size:14px !important" class="customH2">"Awareness about unknown scholarships"</h2>-->
          <h2 class="customH2">Webinar Registration</h2>
          <div class="row">
           <div class="col-md-12 mb-3 animated fadeInLeft delay-4s">
            <label for="validationCustom01"><b>Full Name <!-- <span style="color: red">*</span> --></b></label>
            <input class="form-control" type="text" name="fname" id="validationCustom01" pattern="[a-zA-Z\s]+" placeholder="Full Name">
            <div class="invalid-feedback">
             <small>Please enter your full name (e.g : John Doe)</small>
           </div>
         </div>
       </div>
       <div class="row">
         <div class="col-md-12 mb-3 animated fadeInLeft delay-4s">
          <label for="validationCustom03"><b>Email Address<!--  <span style="color: red">*</span> --></b></label>
          <input class="form-control" type="email" required autofill="false" name="email" id="validationCustom03" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,63}$" placeholder="Please enter your email address">
          <div class="invalid-feedback">
           <small>Please enter your email..</small>
         </div>
       </div>
       <div class="col-md-12 mb-3 animated fadeInRight delay-4s">
        <label for="validationCustom04"><b>Mobile Number <span style="color: red">*</span></b></label>
        <input type="tel" id="" minlength="10" maxLength="10" class="form-control" required name="num">
        <span id="valid-msg" class="hide">✓ Valid</span>
        <span id="error-msg" class="hide"></span>
        <div class="invalid-feedback" style="display:block;">
         <small id="span-warning-mob"></small>
       </div>
        <div class="invalid-feedback">
           <small>Please enter mobile number..</small>
         </div>
       <input type="hidden" id="countryCode" name ="countryCode">
     </div>

     <div class="col-md-12 mb-3 animated fadeInLeft delay-4s">
      <label for="validationCustom03"><b>Class<!--  <span style="color: red">*</span> --></b></label>
      <select class="select2 form-control form-control-line" id="degree" name="degree" style="width: 100%; height:36px;">
        <option  selected="" disabled="">--Please Select--</option>
        <option  value="Diploma">Diploma</option>
        <option  value="Bachelor">Bachelors</option>
        <option  value="Masters">Masters</option>
        <option  value="PH.D">PH.D</option>
        <option  value="Post Doc">Post Doc</option>
        <option  value="Other">Other</option>
      </select>
      
      <input type='hidden' name='segment_name' value='<?php echo $this->uri->segment(2);?>'>
      <div class="invalid-feedback">
       <small>Please enter your email as (e.g : johndeo@gmail.com)</small>
     </div>
   </div>

 </div>               
 <label>For any queries, dial +91-8892278892 / +91-8660044962</label>
 <div class="col-md-8 mb-3" style="margin-left:auto;margin-right:auto;">
   <button class="btn btn-primary btn-default" name="stud" id="register-button"  type="submit">Submit</button>
 </div>
</form>
</div>
</div>
<?php }?>

<?php if($this->session->userdata('user_added_allow_qr_and_link') == 'true'){?>
  <div class="col-lg-6 col-md-6 col-sm-6 text-center" >
    <h2 class="customH2 animated fadeInLeft delay-1s" align="center" style="font-weight: bold;font-size: 36px;letter-spacing: 0.05em;"></h2><br>
    <img style="max-width:75% !important" src="<?php echo base_url('/landing_assets/helpdesk.jpg')?>">
    <h2 class="customH2 animated fadeInLeft delay-1s" align="center" style="font-weight: bold;font-size: 26px;letter-spacing: 0.05em;">CLICK ON OPEN</h2><br>
        <!--<input id="webinar_link" type="text" readonly style="color: #000 !important;" class="form-control" value="<?php echo $urlLink?>"><button class="button" onclick="copyToClipBoard()">COPY</button> or <a target="_blank" class="button " href="<?php echo $urlLink?>">OPEN</a>-->
        <a target="_blank" class="button " href="<?php echo $urlLink;?>">JOIN <i class="fa fa2 fa-whatsapp"></i></a>
    <div style="display: none;" class="alert alert-primary text-center">Copied...</div>
  </div>
  <?php }?>



<!--/.col-lg-4-->
</div>
<!--/.row-->
</div>
<!--/.container-->
</div>
<!--/.login-page-->
</div>
</div>

<script>
   // Example starter JavaScript for disabling form submissions if there are invalid fields
   (function() {
     'use strict';
     window.addEventListener('load', function() {
       // Fetch all the forms we want to apply custom Bootstrap validation styles to
       var forms = document.getElementsByClassName('needs-validation');
       // Loop over them and prevent submission
       var validation = Array.prototype.filter.call(forms, function(form) {
         form.addEventListener('submit', function(event) {
           if (form.checkValidity() === false) {
             event.preventDefault();
             event.stopPropagation();
           }
           form.classList.add('was-validated');
         }, false);
       });
     }, false);
   })();
 </script>
 <style>
  input{
    color: #000000;
  }
</style>
<script>
 var check = function() {
   if (document.getElementById('validationCustom06').value == document.getElementById('validationCustom07').value) {
     document.getElementById('message').style.color = 'green';
     document.getElementById('message').innerHTML = 'Matching';
   } else {
     document.getElementById('message').style.color = 'red';
     document.getElementById('message').innerHTML = 'Not Matching';
   }
 }
</script>
<style>
 select.form-control:not([size]):not([multiple]) {
   height: calc(2.25rem + 15px); 
 }
 @media screen and (max-width: 900px) and (min-width: 200px){
  .poster {
    width: 100%;
    height: auto !important;
    margin-left: auto;
    margin-right: auto;
  }
  .customH2{
    margin-top: 20px !important;
  }
  .s-pd100 {
    padding: 15px 0;
  }
}

.button {
  background-color: #ff7f45;
  border: none;
  color: white;
  padding: 5px 12px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 12px;
  margin: 4px 2px;
  cursor: pointer;
</style>

<script>
  function copyToClipBoard() {
    var copyText = document.getElementById("webinar_link");
    copyText.select();
    copyText.setSelectionRange(0, 99999)
    document.execCommand("copy");
    $('.alert').show();
  // alert("Copied the text: " + copyText.value);
}
</script>