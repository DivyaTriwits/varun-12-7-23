<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class New_controller extends CI_Controller
{
   public function __construct() {
        parent::__construct();
        
        $this->load->library("pagination");
        date_default_timezone_set("Asia/Calcutta");
    }
    public function index()
    {
        $this->load->view('new/new_header');
        $data['data']         = $this->db->get('scholarships');
        $data['student']      = $this->db->get('student_registration');
       // $data['contributors'] = $this->db->get('contributors');
        $this->load->view('new/new_home', $data);
        $this->load->view('new/footer');
    }
  public function scholarships($id)
    {   
       $this->load->view('new/new_header');
        $data['scholarships']=$this->New_model->searchEducationBased($id);
        if($id=='Scholarship'){
            $newid='Abroad';
        }else{
            $newid='Scholarship';
        }
         $data['other_scholarships']=$this->New_model->serachOtherScholarship($newid);
        $this->load->view('new/new_scholarship',$data);
       $this->load->view('new/footer');
    }
    
    public function pageInformation($id,$name)
    {
         $this->load->view('new/new_header');
        $data['details']=$this->New_model->getScholarshipDetails($id);
        $data['attachment']=$this->New_model->getScholarshipAttachment($id);
        //print_r($data);exit();
        $data['some']=$this->New_model->someOtherScholarship($data['details']->scholarship_type);
        $this->load->view('new/new_scholarship_details',$data);
         $this->load->view('new/footer');
    }
     public function about()
    {
        $this->load->view('new/new_header');
        $this->load->view('new/about');
         $this->load->view('new/footer');
    }
     public function youtube()
    {
       
        $this->load->view('new/youtube');
    }
  public function telegram()
    {
       
        $this->load->view('new/telegram');
    }
  
    public function privacy()
    {
        $this->load->view('new/new_header');
        $this->load->view('new/privacy');
         $this->load->view('new/footer');
    }
    public function discaimer()
    {
        $this->load->view('new/new_header');
        $this->load->view('new/discaimer');
        $this->load->view('new/footer');
    }
     public function contactUs()
    {
        $this->load->view('new/new_header');
        $this->Base_model->contact_us_form();
        $this->load->view('website/contact');
        $this->load->view('new/footer');
    }
    public function faq(){
        $this->load->view('new/new_header');
        $this->load->view('new/faq');
        $this->load->view('new/footer');
    }

    public function forgotPassword()
    {
       $this->load->view('new/new_header');
        $this->Auth->forget_password();
        $this->load->view('new/forgot_password');
        $this->load->view('new/footer');
    }
    
    public function confirmforgotPassword($otp, $id)
    {
     // print_r('hi');exit;
        $this->Auth->confirm_password($otp, $id);
    }
    public function reset()
    {
        $this->Auth->reset_password();
    }
}
?>