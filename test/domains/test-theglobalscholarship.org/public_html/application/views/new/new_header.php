<!DOCTYPE html>
<html lang="zxx">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <!--========= Basic Page Needs =========-->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <?php $sessionuri=$this->uri->segment(1);
  $details=$this->New_model->getScholarshipDetails($sessionuri=$this->uri->segment(2));
  //print_r($details);exit;
  if($sessionuri='scholarships-details'){
   // print_r($sessionuri);exit;
    if($details->h_tags!=''){
    $titles=$details->h_tags;
    }else{
     //  print_r('k');exit;
      $titles=$details->scholarship_name;
    }
  }else{
    $titles='The Global Scholarship';
  }

  $tags='The Global Scholarship';
  if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
         $url = "https://";   
    else  
         $url = "http://";   
    // Append the host(domain name, ip) to the URL.   
    $url.= $_SERVER['HTTP_HOST'];   
    
    // Append the requested resource location to the URL   
    $url.= $_SERVER['REQUEST_URI'];    
      
  if($details){
     if($details->title_description!=''){
    $decstitles=$details->title_description;
    }else{
     //  print_r('k');exit;
      $decstitles=$details->scholarship_name;
    }
  }
   if($details){
     if($details->title_tag!=''){
    $titletags=$details->title_tag;
    }else{
     //  print_r('k');exit;
      $titletags=$details->scholarship_name;
    }
  }
  ?>
  <link rel="canonical" href="<?php echo $url?>" />
  <?php if($details){?>
  <meta name="description" content="<?php echo $decstitles?>" />
    <?php }else{?>
  <meta name="description" content="TGS - A smart scholarships alert engine which matches your profile with the scholarship's criteria and sends you alerts on mobile. " />
  <?php }?>
  <?php if($details){?>
  <meta name="keywords" content="<?php echo $details->seo_keywords?>" />
    <?php }else{?>
  <meta name="keywords" content="TGS - A smart scholarships alert engine which matches your profile with the scholarship's criteria and sends you alerts on mobile. " />
  <?php }?>
  <meta property="og:type"               content="<?php echo $tags?>"/>
  <?php if($details){?>
  <meta property="og:title"              content="<?php echo $titletags?>" />
   <?php }else{?>
  <meta property="og:title"              content="Scholarships At Your Fingertips" />
  <?php }?>
   <?php if($details){?>
   <meta property="og:description"              content="<?php echo $decstitles?>"/>
   <?php }else{?>
  <meta property="og:description"        content="TGS - A smart scholarships alert engine which matches your profile with the scholarship's criteria and sends you alerts on mobile. " />
   <?php }?>
    <meta property="og:site_name" content="The Global Scholarship" />
  <meta property="og:url" content="<?php echo $url?>" />
  <meta property="og:image"              content="<?php echo base_url()?>assets/img/brand/sc logo.png" />

  <!--======== Page Title===========-->
  <?php if($details){?>
  <title><?php echo $titles?></title>
  <?php }else{?>
  <title>The Global Scholarship</title>
  <?php }?>
  <!--========== Favicons =========-->
  <link rel="shortcut icon" sizes="70x70" href="<?php echo base_url();?>website_assets/sc logo.png">
  <!--======== Font icon Css ============-->
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
  <link href="<?php echo base_url();?>website_assets/css/themify-icons.css" rel="stylesheet">
  <!--======= Bootstrap Main Css =============-->
  <link href="<?php echo base_url();?>website_assets/css/bootstrap.min.css" rel="stylesheet">
  <!--====== Plugins Css ================-->
  <link href="<?php echo base_url();?>website_assets/css/plugins.css" rel="stylesheet">
  <!--====== intern Css ================-->
 <!--  <link href="<?php echo base_url();?>assets/css/newtgs.css" rel="stylesheet"> -->
  <!-- new testimonial carousel css -->
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  
  <link rel="stylesheet" type="text/css" href="https://themes.audemedia.com/html/goodgrowth/css/owl.theme.default.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>website_assets/new/new.css">
  <!-- Multislider css -->
  <link href="<?php echo base_url();?>website_assets/plugins/multislider/multislider.css" rel="stylesheet">
  <!-- cash icon source-->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/iconfonts/ionicons/ionicons.css">
  <!-- social media icons css link below-->
  <!-- Scholarship deatails page css-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>website_assets/css/style.css">
  <!--====== Custom CSS for themes =======-->
  <link rel="stylesheet" type="text/css" href="https://www.theglobalscholarship.org//assets/css/style.css">
  <link href="<?php echo base_url();?>website_assets/style.css" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo base_url();?>website_assets/build/css/intlTelInput.css">
  
  <link href="<?php echo base_url();?>website_assets/tags.css" rel="stylesheet" />
  <link href="<?php echo base_url();?>website_assets/css/perfect-scrollbar.css" rel="stylesheet" />
  <link href="<?php echo base_url();?>website_assets/css/tables.css" rel="stylesheet" />
  <link href="<?php echo base_url();?>website_assets/css/amabassador.css" rel="stylesheet" />
  <link href="<?php echo base_url();?>website_assets/css/floating-button.css" rel="stylesheet" />
    <!--[if lt IE 8]>
    <![endif]-->
    <!-- jQuery Latest Version -->
    <link rel="stylesheet" href="<?php echo base_url();?>website_assets/testimonial/css/plugins/animate.min.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>website_assets/testimonial/css/plugins/swiper-bundle.min.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>website_assets/testimonial/css/plugins/aos.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>website_assets/testimonial/css/plugins/selectric.css" />
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="<?php echo base_url();?>website_assets/js/vendor/modernizr-2.8.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.js"></script>
    <!-- Switcher css-->
    <link href="<?php echo base_url();?>website_assets/switcher/css/switcher.css" rel="stylesheet">
    <link href="<?php echo base_url();?>website_assets/switcher/demo.css" rel="stylesheet">
    <script type="text/javascript">
    (function(c,l,a,r,i,t,y){
        c[a]=c[a]||function(){(c[a].q=c[a].q||[]).push(arguments)};
        t=l.createElement(r);t.async=1;t.src="https://www.clarity.ms/tag/"+i;
        y=l.getElementsByTagName(r)[0];y.parentNode.insertBefore(t,y);
    })(window, document, "clarity", "script", "er1toismxs");
</script>
    <script>
      $(function () {
        $('[data-toggle="tooltip"]').tooltip()
      })
    </script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-T1Y2L3C6VT"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      
      gtag('config', 'G-T1Y2L3C6VT');
    </script>
    <script defer src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-8408941960924322"
    crossorigin="anonymous"></script>
     <style>
      
      .icon-bar a {
        display: block;
        text-align: center;
        padding: 10px;
        transition: all 0.3s ease;
        color: white;
        font-size: 20px;
        background-color:#ff7f45;
      }
      .icon-bar a:hover {
        background-color: #000;
      }
      .facebook {
        background: #3B5998;
        color: white;
      }
      .twitter {
        background: #55ACEE;
        color: white;
      }
      .google {
        background: #dd4b39;
        color: white;
      }
      .linkedin {
        background: #007bb5;
        color: white;
      }
      .youtube {
        background: #bb0000;
        color: white;
      }
    </style>
    <style>
      .reg-button:hover {
        animation-name: shakeAnim;
      }
      @keyframes shakeAnim {
        0% {left: 0}
        1% {left: -3px}
        2% {left: 5px}
        3% {left: -8px}
        4% {left: 8px}
        5% {left: -5px}
        6% {left: 3px}
        7% {left: 0}
      }
      @keyframes shake {
        0% {left: 0}
        1% {left: -3px}
        2% {left: 5px}
        3% {left: -8px}
        4% {left: 8px}
        5% {left: -5px}
        6% {left: 3px}
        7% {left: 0}
      }
    </style>
    <style type="text/css">
      .registerbutton{
        font-size: 14px;
        display: inline-block;
        background: #F2B625;
        color: #41044D;
        /*background-color:#FF854E;*/
        text-transform: uppercase;
        padding: 5px 10px;
        border-radius: 10px;
        border-color:#F2B625;
        box-shadow: 0px 10px 5px -5px rgba(0,0,0,0.4);
        cursor: pointer;
        transition: all ease-in-out 300ms;
      }
      ul, li {
          color: #F2B625; !important;
      }
    </style>
    <style type="text/css">
     .registerbutton:hover{
      background:#ffffff;
      box-shadow: 0px 37px 20px -20px rgba(0,0,0,0.2);
      transform: translate(0px, -10px) scale(1.2);
    }
    @media only screen and (max-width: 600px) {
      .registerbutton:hover
      {
       box-shadow: 0px 37px 20px -20px rgba(0,0,0,0.2);
       transform: translate(0px, -10px) scale(1.0);
            }
            
           .section-heading {
        font-size: 25px;
    }
   }  
   @media only screen and (max-width: 767px)
.section-heading {
    font-size: 25px;
}
 </style>
 <!--====Asif intern css start from below Area ====================================-->
 <style>
   .number{
    padding-left: 30px;
    padding-right: 30px;
    padding-top: 50px;
    padding-bottom: 50px;
    background-color: #ff7f45;
    margin-right: 10px;
    border-radius: 14px;
    color: white;
    font-size: 30px;
    font-weight: bold;
  }
  /* new clss added to 33cr number*/
  .num{
    padding-left: 20px;
    padding-right: 30px;
    padding-top: 50px;
    padding-bottom: 50px;
    background-color: #ff7f45;
    margin-left: 10px;
    border-radius: 14px;
    color: white;
    font-size: 30px;
    font-weight: bold;
  }
  .btn-primary:hover {
    border-color: #ff7f45;
  }
</style>
<style>
  @media screen and (max-width: 650px) {
    section {
     padding: 10px 5px 20px 5px ;
     display: block;
   }
   .displayButton{
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
  }
  .watchLink{
    margin: 10px;
  }
  .Add{
    margin-top: 5px;
    height: 260px;
    width: 100%;
    background-image: url('assets/images/add/ads-logo.png');
    background-size: 100% 100%; 
  }
  .number,.num{
    display: block;
  }
  .count{
  display: none;
}

  .states{
    margin-top: 10px; 
    height: 350px;
    width: 100%; 
    background-image: url('assets/images/add/ads-logo.png'); 
    background-size: 100% 100%;
  }
  .Add1{
    margin-top: 10px;
    height: 260px;
    width: 100%;
    background-image: url('assets/images/add/ads-logo.png');
    background-size: 100% 100%;
  }
  .add{
    display: none;
  }
  .card-height{
  height: auto;
}
.card-h6-content{
  display: flex;
  justify-content:left;
  align-items: center;
   margin: 5px;
   font-weight: 500;
   font-size: 16px;
}
.font{
  font-size: 17px;
  letter-spacing: 0; 
  text-transform:capitalize;
}
.icon-margin{
    margin-right: 15px; 
}
.dekstop-card{
  display: none;
}
.footer-top-area{
  background-color: #ff7f45;
  padding: 15px 0;
}
.icon_aTop{
  border-top-right-radius:10px; 
}
.icon_aBottom{
  border-bottom-right-radius:10px; 
}
}
@media screen and (min-width: 650px) {
  section {
   padding: 10px 40px 20px 40px ;
   display: flex;
 }
 .displayButton{
  display: flex;
  justify-content: center;
  align-items: center;
}
.watchLink{
  margin-left: 10px;
}
.indent{
  text-indent: 21rem;
}
.justify{
  text-align: justify;
}
.count{
  display: none;
}
.Add{
  margin-top: 64px;
  background-color: #ff7f45;
  height: 260px;
  width: 300px;
  background-image: url('assets/images/add/ads-logo.png');
  background-size: 100% 100%; 
}
.states{
  margin-top: 10px; 
  background-color: #ff7f45;
  height: 350px;
  width: 300px; 
  background-image: url('assets/images/add/ads-logo.png'); 
  background-size: 100% 100%;
}
.Add1{
  margin-top: 64px;
  background-color: #ff7f45;
  height: 650px;
  width: 300px;
  background-image: url('assets/images/add/ads-logo.png');
  background-size: 100% 100%;
}
.card-height{
  height: auto;
}
.card-content{
  display: flex;
  flex-wrap: wrap;
}
.card-h6-content{
  display: flex;
  justify-content:left;
  align-items: center;
   margin:0 5px 1px 5px;
   font-weight: 500;
}
.font{
  font-size: 15px;
  letter-spacing: 0; 
  text-transform:capitalize;
}
.mobile-card{
  display: none;
}
.footer-top-area{
  background-color: #ff7f45;
  padding: 35px 0;
}
.icon_aTop{
  border-top-right-radius:10px; 
}
.icon_aBottom{
  border-bottom-right-radius:10px; 
}
}
</style>
<style>
 @media screen and (max-width: 650px) {
  header {
   margin-bottom: 30px;
 }
}
@media screen and (min-width: 650px) {
  header {
    margin-bottom: 100px;
  }
}
#myBtn {
  display: none;
  position: fixed;
  bottom: 20px;
  right: 30px;
  z-index: 99;
  font-size: 18px;
  border: none;
  outline: none;
  background-color: #480057;
  color: white;
  cursor: pointer;
  padding-bottom: 6px;
  padding-top: 6px;
  padding-right: 15px;
  padding-left: 15px;
  border-radius: 4px;
  font-weight: bold;
}
.ion { 
    size:10px;
font-weight: bold;
}
.mobile-logo {
    position: absolute;
    top: 0px;
    z-index: 999999;
    left: 10;
    height: 100%;
    display: block;
    width: 50%;
}
</style> 
<!--====Asif intern css end ====================================-->
  </head>
  <body style="background-color: #F2B625;">
        <a id="myBtn"  style="font-weight: bold;"><i class="ion ion-ios7-arrow-thin-up" ></i></a>
   <!-- Switcher -->
   <!-- End Switcher -->
  <!--====Header Area ====================================-->
  <header id="site-header" class="header-area" >
    <div class="header-inner"id="sticky" style="background-color:#41044D">
           <div class="container-fluid">
            <div class="row">
              <div class="col-lg-12">
                <div class="logo-menu-wrap hidden-xs hidden-sm">
                  <div class="logo">
                    <a href="<?php echo base_url();?>">
                      <img src="<?php echo base_url();?>website_assets/sc logo.png" alt="logo" style="max-width:125px;margin-left:60px">
                    </a>
                  </div><!--/.logo-->
                  <nav class="menu">
                    <ul id="nav">
                      <li><a href="<?php echo base_url('about-us');?>">BLog</a></li>
                      <li><a href="<?php echo base_url('faq');?>">FAQ</a></li>
                      <li><a href="<?php echo base_url('about-us#contact');?>">Why us?</a></li>
                      <?php if($this->uri->segment(1) != ''){?>
                      
                      <?php }?>
                      <?php if($this->uri->segment(1) != 'about-us'){?>
                      <li><a href="<?php echo base_url();?>about-us">About us</a></li>
                   <?php }?>
                      <?php if($this->session->userdata('student_username')){ 
                        ?>
                        <li class="dropdown-trigger"><a href="#"><?php echo $this->session->userdata('student_name');?></a>
                          <ul class="dropdown-content" style="width: 115% !important;">
                             <li><a href="<?php echo base_url();?>student-home">Dashboard</a></li>
                           <li><a href="<?php echo base_url();?>logout">Logout</a></li>
                         </ul>
                       </li>
                     <?php }else{?>     
                        <li><a href="<?php echo base_url();?>student-login">Login</a></li>
                        <li style="padding:0 px !important"><a align="right" class="btn registerbutton"  href="<?php echo base_url();?>student-register"><b>Register</b></a></li>
                     
                    <?php }?>
                  </ul>
                </nav><!--/.menu-->
              </div><!--/.logo-menu-wrap-->
            </div><!--/.col-lg-12-->
          </div><!--/.row-->
        </div><!--/.container-fluid-->
      </div><!--/.headier-inner-->
      <style>
        #sticky {
          position: fixed;
          top: 0;
          width: 100%;
          z-index:9999;
          background-color:#ffff;

        }
          .modal {
    z-index: 1000000000;
    padding-top: 220px !important;
    /* height: 6500px; */
}
      </style>

      <!--Mobile Menu-->
      <div class="mobile-menu"id="sticky" style="background-color:#41044D !important">
              <div class="row" >
                <div class="col-lg-12" >
                  <div class="mobile-logo" style="width:20px">
                    <a href="<?php echo base_url();?>">
                      <img src="<?php echo base_url();?>website_assets/sc logo.png" alt="logo" style="max-width:100px;margin-left:10px">
                    </a>
                  </div>
                  <div class="float-right" style="padding:20px;">
                    <?php if($this->session->userdata('student_username')){ 
                      ?>
                       <a href="<?php echo base_url();?>student-home" style="padding-right: 15px">
                        <button class="btn registerbutton btn-sm"style="font-size:12px">Dashboard</button> </a>
              
                      <a href="<?php echo base_url();?>logout" style="padding-right: 10px">
                        <button class="btn registerbutton btn-sm"style="font-size:12px">Logout</button></a>
                      <?php }else{?>
                         <a style="color: #F2B625;font-size: 16px;font-weight: bold;text-transform: uppercase;letter-spacing: 0.5px;padding-right: 15px" href="<?php echo base_url();?>student-login">Login</a>
                        <a style="padding-right: 15px"  href="<?php echo base_url();?>student-register">
                          <button class="btn registerbutton btn-sm">Register</button></a>                
                       <a style="color:#F2B625;font-size:20px" data-target="#modaldemo1" data-toggle="modal" href="#"><i class="fa fa-bars"></i></a> 
                        <?php }?>
                   
                      </div>
                    </div>
                  </div>
                </div>
            <div align="center" >
  
<div class="row" >
    
    <!-- Form Modal -->
    <div class="modal" id="modaldemo1" >
        <div class="modal-dialog wd-xl-900" role="document" style="margin: 2rem">
            <div class="modal-content">
                <div class="modal-body pd-20 pd-sm-40" style="background-color: none !important;">
                    <button aria-label="Close" class="close pos-absolute t-15 r-20 tx-26" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span>
                    </button>
                        <ul id="nav" >
                           <li style=""><a style="font-size: 20px;color:black" href="<?php echo base_url();?>about-us"><b>About us</b></a></li><br>
                      <li style=""><a style="font-size: 20px;color:black" href="<?php echo base_url('about-us#contact');?>"><b>Why us?</b></a></li><br>
                      <li style=""><a style="font-size: 20px;color:black" href="<?php echo base_url('faq');?>"><b>FAQ</b></a></li><br>
                     
                       <li style=""><a style="font-size: 20px;color:black" href="<?php echo base_url('about-us');?>"><b>BLog</b></a></li><br>
                  </ul>  
                   
                </div>
            </div>
        </div>
    </div>
</div>
</div>
          </header><!--/.header-area-->
          <script>
            $(window).scroll(function() {
              if ($(this).scrollTop() > 0) {
                $('.socio').fadeOut();
              } else {
                $('.socio').fadeIn();
              }
            });
          </script>
             <script>
             var btn = $('#myBtn');

$(window).scroll(function() {
  if ($(window).scrollTop() > 20) {
    btn.addClass('show');
  } else {
    btn.removeClass('show');
  }
});

btn.on('click', function(e) {
  e.preventDefault();
  $('html, body').animate({scrollTop:0}, '20');
});
               closebtn.on('click', function() {
   visibility: invisible;
});
</script>