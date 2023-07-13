<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Support_controller extends CI_Controller 
{
  public function __construct()
  {
    parent::__construct();

    $this->load->library("pagination");
    $this->load->model("Response");
    date_default_timezone_set('Asia/Kolkata');
    
  }
  public function index() 
  {
    if (!$this->session->userdata('username')) redirect('support-login');
    
    //print_r($data['activeUsersCount']);exit;
    // $data['activeUsersCount'] = $this->db->where('subscription_validity_datetime >=', date('Y-m-d H:i:s'))->get('student_registration')->num_rows();
    $this->load->view('support/header');
     $data['activeUsersCount'] = $this->db->get('student_registration')->num_rows();
    $this->load->view('support/home',$data);
    $this->load->view('support/footer');
  }
  public function newRegistration() 
  {
    if (!$this->session->userdata('username')) redirect('support-login');
    $this->load->view('support/header');
    $data['sales'] = $this->Support_model->getSaleRegisterData();
    $this->load->view('support/new_registration', $data);
    $this->load->view('support/footer');
  }
  public function youtube() 
  {
    if (!$this->session->userdata('username')) redirect('support-login');
    $this->load->view('support/header');
    $this->load->view('support/generate_vedio_link');
    $this->load->view('support/footer');
  }
  public function insertNewRegiterData() 
  {
    
    if (!$this->session->userdata('username')) redirect('support-login');
    $this->Support_model->newRegister();
  }
  public function updateRegiterData() 
  {
    if (!$this->session->userdata('username')) redirect('support-login');
    $this->Support_model->updateNewData();
  }
  public function deleteRegiterData() 
  {
    if (!$this->session->userdata('username')) redirect('support-login');
    $this->Support_model->deleteData();
  }

  public function failedRegistration() 
  {


    if (!$this->session->userdata('username')) redirect('support-login');
    $this->load->view('support/header');
    $data['getregisterestudents'] = $this->Support_model->getFailedRegisteredStudents();
    $data['getPromotionalStudents'] = $this->Support_model->getPromotionalStudents();
    $this->load->view('support/failed_registration', $data);
    $this->load->view('support/footer');
  }

  
  public function registered() 
  {
    if (!$this->session->userdata('username')) redirect('support-login');
    $this->load->view('support/header');
    $config = array();
    $config["base_url"] = base_url(). "registered-students";
    $config["total_rows"] = $this->Support_model->get_count();
    $number=$this->input->get('number');
    $text=$this->input->get('text');
    if($number!=''||$text!='')
    {
      $config["per_page"] = $number;
      $config["uri_segment"] = 2;
      $text=$this->input->get('text');
    }
    // else if($text!=0)
    // {
    //   $config["per_page"]= 1;
    //   $text=$this->input->get('text');
    // }
    else
    {
      $config["per_page"] = 10; 
      $config["uri_segment"] = 2;
      $text='';
    }
    $config['full_tag_open'] = "<ul class='pagination pull-right'>";
    $config['full_tag_close'] ="</ul>";
    $config['first_link'] = FALSE;
    $config['last_link'] = FALSE;
    $config['anchor_class']= 'class="page-link"';
    $config['prev_tag_open'] = "<li class='page-item'>";
    $config['prev_tag_close'] = "</li>";
    $config['cur_tag_open'] = "<li class='page-item active'><a class='page-link'>"; 
    $config['cur_tag_close'] = '</a></li>'; 
    $config['num_tag_open'] = "<li class='page-item'>";
    $config['num_tag_close'] = '</li>';
    $config['next_tag_open'] = "<li class='page-item'>";
    $config['next_tagl_close'] = "</li>";
    $config['attributes'] = array('class' => 'page-link');

    $config['reuse_query_string'] = true;

    $this->pagination->initialize($config);

    $page = ($this->uri->segment(2))? $this->uri->segment(2) : 0;
        // $start = ($page - 1) * $config['per_page'];
    $data["links"] = $this->pagination->create_links();
    $data['getregisterestudents'] = $this->Support_model->getRegisteredStudents($config["per_page"],$page,$text);
     $data['totalStudents']=$this->db->get('student_registration')->num_rows();
    $this->load->view('support/registered_student', $data);
    $this->load->view('support/footer');
  }
   // create xlsx
public function createXLS($id) {
 
  $fileName = 'TheGlobalScholarship-'.time().'.xlsx';  
    // load excel library
  $this->load->library('excel');
  $new = str_replace('%20', ' ', $id);
  //print_r($new);exit;
  $studentInfo = $this->Support_model->get_state_registered_Student_list($new);
  //print_r($studentInfo);exit;
  $objPHPExcel = new PHPExcel();
  $objPHPExcel->setActiveSheetIndex(0);
        // set Header

  $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Full Name');
  $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Mobile No');
  $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Email');
    $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'State');
  $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Course');
  $objPHPExcel->getActiveSheet()->SetCellValue('F1', 'Register Date');
     
        // set Row
  $rowCount = 2;
  //$i=$rowCount-1;
  foreach ($studentInfo as $element) {
  
   
    $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $element['student_name']);
    $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $element['registered_mobile_no']);
    $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $element['registered_email']);
     $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $element['student_state']);
    $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $element['course_name']);
    $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $element['registration_datetime']);
    $rowCount++;
  }
     
 header('Content-type: application/vnd.ms-excel');
      $filename = $id. date("Y-m-d-H-i-s").".csv";
        header('Content-Type: application/vnd.ms-excel'); 
        header('Content-Disposition: attachment;filename="'.$filename.'"');
        header('Cache-Control: max-age=0'); 
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'CSV');  
        $objWriter->save('php://output'); 
 echo 'done';
}
	 public function deleteStudents(){
       if (!$this->session->userdata('username')) redirect('support-login');
	     if($this->input->post('did')){
	         $studData=$this->db->where('student_username',$this->input->post('did'))->get('student_registration')->row();
	        
	         $data = array(
	             'student_username'=>$studData->student_username,
	             'student_name'=>$studData->student_name,
	             'registered_email'=>$studData->registered_email,
	             'student_password_hashed'=>$studData->student_password_hashed,
	             'registered_mobile_no'=>$studData->registered_mobile_no,
	             'student_state'=>$studData->student_state,
	             'registration_datetime'=>$studData->registration_datetime,
	             'registration_verified_datetime'=>$studData->registration_verified_datetime,
	             'subscription_validity_datetime'=>$studData->subscription_validity_datetime,
	             'amount'=>$studData->amount,
	             'registration_status'=>$studData->registration_status,
	             'referral_code'=>$studData->referral_code
	             );
	             // print_r($data);exit;
	             $this->db->insert('deleteStudent',$data);
	             $this->db->where('student_username',$this->input->post('did'))->delete('student_registration_log');
	             $this->db->where('student_username',$this->input->post('did'))->delete('student_registration');
	             $this->session->set_flashdata('success','Account deleted successfully.... ');
	             redirect('registered-students');
	     }
	 }
  public function promotionRegister() 
  {
    
    if (!$this->session->userdata('username')) redirect('support-login');
    $this->load->view('support/header');
	$data['getregisterestudents'] = $this->Support_model->getPromotionRegister();
    $this->load->view('support/promotion_register',$data);
    $this->load->view('support/footer');
  }
  public function getRequestedCallBackList() 
  {
    if (!$this->session->userdata('username')) redirect('support-login');
    $this->load->view('support/header');
    $data['customer'] = $this->Support_model->getRequestedCallBackList();
    $this->load->view('support/requested_callback_list', $data);
    $this->load->view('support/footer');
  }
  public function changeStatusToContacted($id) 
  {
    if (!$this->session->userdata('username')) redirect('support-login');
    $data = array('status' => 1, 'contacted_date' => date('Y-m-d H:i:sA'));
    $result = $this->Support_model->changeStatusToContacted($id, $data);
    if ($result) {
     $this->session->set_flashdata("status-changed-to-contacted-success", "Status changed to contacted successfully.");
     redirect('requested-callback-list');
   } else {
     $this->session->set_flashdata("status-changed-to-contacted-error", "Failed to change the status to contacted.");
     redirect('requested-callback-list');
   }
 }
 public function changeStatusToNotContacted($id) 
 {
  if (!$this->session->userdata('username')) redirect('support-login');
  $data = array('status' => 0);
  $result = $this->Support_model->changeStatusToNotContacted($id, $data);
  if ($result) {
   $this->session->set_flashdata("status-changed-to-not-contacted-success", "Status changed to not contacted successfully.");
   redirect('requested-callback-list');
 } else {
   $this->session->set_flashdata("status-changed-to-not-contacted-error", "Failed to change the status to not contacted.");
   redirect('requested-callback-list');
 }
}
public function getCandidateFeedback() 
{
  if (!$this->session->userdata('username')) redirect('support-login');
  $this->load->view('support/header');
  $data['customer'] = $this->Support_model->getCandidateFeedbackList();
  $this->load->view('support/candidate_feedback_list', $data);
  $this->load->view('support/footer');
}
public function supportLoginPage() 
{
 
        // $this->load->view('support/header');
  $this->load->view('support/support_login');
        // $this->load->view('support/footer');

}
    public function getNewData(){
     $data=$this->db->get('backbuttonredirection')->result();
      return $data;
    }
public function verifyLogin() 
{
  $username = $this->input->post('username');
  $password = $this->input->post('password');
        // $remember=$this->input->post('rememberme');
  $login_user_details = $this->Support_model->verifyUsername($username);
  if ($login_user_details->num_rows() > 0) {
   $login_user_details = $login_user_details->row();
   if ($login_user_details->password == $password) {
    $_SESSION['username'] = $login_user_details->email;
    $_SESSION['role'] = $login_user_details->role;
    $_SESSION['id'] = $login_user_details->id;
    $_SESSION['name'] = $login_user_details->name;
      $_SESSION['supportid'] = $login_user_details->support_id;
    $this->session->set_flashdata('login-success', 'login success...');
    redirect('support_dashboard');
  } else {
    $this->session->set_flashdata('incorrect-password-error', 'incorrect password!!!');
    redirect('support-login');
  }
} else {
 $this->session->set_flashdata('no-account-found-error', 'no account found with this username..');
 redirect('support-login');
}
}
public function sessionDestroy() 
{
  if (!$this->session->userdata('username')) redirect('support-login');
  $this->session->set_flashdata('logout-success', 'logout successfully');
  $this->session->unset_userdata('id');
  $this->session->unset_userdata('username');
  $this->session->unset_userdata('role');
  $this->session->unset_userdata('name');
        //delete_cookie('remember_me_token');
  redirect('support-login');
}
public function supportForgotPassword() 
{
        // $this->load->view('support/header');
  $this->load->view('support/support_forgot_password');
        // $this->load->view('support/footer');

}
public function supportPasswordRecovery() 
{
  $email = $this->input->post('email');
  $login['details'] = $this->Support_model->verifyUsername($email);
        //print_r($login['details']->num_rows());exit;
  if ($login['details']->num_rows() > 0) {
   $logins['details'] = $login['details']->row();
            //print_r($login['details']->row());exit;
   $username = $logins['details']->email;
   $token = date('Ymdhis');
   $data = array('token' => $token, 'username' => $username, 'status' => 0);
   $this->Support_model->resetPasswordToken($data);
   $this->load->library('email');
   $this->email->from(EMAIL_FROM, 'password recovery');
   $this->email->to($logins['details']->email);
            // $message='your password is <strong>'.$logins['details']->password.' </strong>';
            // $message='please click on this link to reset password <strong><a href="'.base_url('reset-password-link/').$token.'">Resetpasword</a> </strong>';
   $message = ' <strong><a href="' . base_url('reset-password-link/') . $token . '">Reset Password Link</a> </strong>';
   $emailContent = '<!DOCTYPE><html><head></head><body><a>please click on this link to reset password';
            $emailContent.= $message; //   Post message available here
            $emailContent.= "</a></body></html>";
            $this->email->subject('Reset Password');
            // $this->email->message($message);
            $this->email->message($emailContent);
            if ($this->email->send()) {
            	$this->session->set_flashdata('reset-link-send-success', 'reset password link has been sent to your mail');
            	redirect('support-forgot-password');
            } else {
            	$this->session->set_flashdata('reset-link-send-error', 'server problem');
            	redirect('support-forgot-password');
            }
            // $logins['message'] = $message;
            // $this->load->view('support/header');
            // $this->load->view('support/temp',$logins);
            // $this->load->view('support/footer');
            
          } else {
           $this->session->set_flashdata('email-does-not-exists-error', 'email address does not exists ');
           redirect('support-forgot-password');
         }
       }
       public function verifyResetPasswordLink($id) 
       {
         $token = $id;
         $result = $this->Support_model->getTokenTable($token);
         if ($result->status == 0) {
          $_SESSION['dummysession'] = $result->username;
          if (isset($_SESSION['dummysession']) && $_SESSION['dummysession'] == $result->username) {
                // $this->load->view('support/header');
           $this->load->view('support/support-change-password');
                // $this->load->view('support/footer');

         } else {
           $this->session->set_flashdata('session-creation-error', 'error in session creation');
           redirect('support-login');
         }
       } else {
        $this->session->set_flashdata('reset-link-expired-error', 'your link has expired');
        redirect('support-login');
      }
    }
    public function newPassword() 
    {
    	$token = $this->input->post('token');
    	$tokenStatus = array('status' => 1);
    	$result = $this->Support_model->getTokenTable($token);
    	$username = $result->username;
    	$data = array('password' => $this->input->post('confirmNewPassword'));
    	if ($this->Support_model->setNewPassword($username, $data)) {
    		$this->session->set_flashdata('password-reset-success', 'password has been reset successfully');
    		$this->Support_model->updateTokenStatus($token, $tokenStatus);
    		$this->session->unset_userdata('dummysession');
    		redirect('support-login');
    	} else {
    		$this->session->set_flashdata('password-reset-error', 'something went wrong, please try again');
    		$this->session->unset_userdata('dummysession');
    		redirect('support-login');
    	}
    }


    public function supportAdminLoginPage() 
    {
        // print_r("Asif");exit();
        // $this->load->view('support/header');
    	$this->load->view('support/support_admin_login');
        // $this->load->view('support/footer');

    }

    public function verifySupportAdminLogin()
    {


    	$username=$this->input->post('username');
    	$password=$this->input->post('password');
			// $remember=$this->input->post('rememberme');


    	$login_user_details=$this->Support_model->verifySupportAdminUsername($username);


    	if($login_user_details->num_rows()>0)
    	{


    		$login_user_details=$login_user_details->row();

    		if($login_user_details->password==$password)
    		{	


    			$_SESSION['username']=$login_user_details->email;
    			$_SESSION['role']=$login_user_details->role;
    			$_SESSION['id']=$login_user_details->id;
    			$_SESSION['name']=$login_user_details->name;

				//print_r($_SESSION['sale_id']);exit;

    			$this->session->set_flashdata('login-success','login success...');
    			redirect('support_dashboard');
    		}
    		else
    		{	
    			$this->session->set_flashdata('incorrect-password-error', 'incorrect password!!!'); 
    			redirect('support-admin-login');
    		}

    	}
    	else
    	{	

    		$this->session->set_flashdata('no-account-found-error', 'no account found with this username..'); 

    		redirect('support-admin-login');

    	}

    }


    public function supportAdminLogout()
    {

    	if (!$this->session->userdata('username')) redirect('support-admin-login');	
    	$this->session->set_flashdata('logout-success','logout successfully');
    	$this->session->unset_userdata('id');
    	$this->session->unset_userdata('username');
    	$this->session->unset_userdata('role');
    	$this->session->unset_userdata('name');
			//delete_cookie('remember_me_token');
    	redirect('support-admin-login');
    }

    public function supportAdminProfilePage()
    {

    	if (!$this->session->userdata('username')) redirect('support-admin-login');	

    	$this->load->view('support/header');
    	$data['profile']=$this->Support_model->getSupportsAdminProfileDetials()->row();
    	$this->load->view('support/support_admin_profile',$data);
    	$this->load->view('support/footer');


    }


    public function updateSupportAdminProfile()
    {
    	$id=$this->input->post('id');

    	$data=array(
    		'name'=>$this->input->post('fullname'),
    		'password'=>$this->input->post('password')
    	);

    	$result=$this->Support_model->updateSupportAdminProfile($data,$id);

    	if($result)
    	{
    		$this->session->set_flashdata('profile-details-update-success', 'Profile details updated successfully!'); 
    		redirect('support-admin-profile');
    	}
    	else
    	{
    		$this->session->set_flashdata('profile-details-update-error', 'Failed to update profile details!'); 
    		redirect('support-admin-profile');
    	}

    }






    public function studentDetails()
    {
              // print_r('expression');exit;
    	if (!$this->session->userdata('username')) redirect('support-login');
    	if($this->input->get('search')){
    			//print_r($this->input->get('search'));exit;
    		$username = '';
    		$data['student_details'] = $this->Support_model->getStudentDetails($this->input->get('search'));
    		if($data['student_details']->num_rows() > 0){
    			$username = $data['student_details']->row()->student_username;
    			$userdata =$data['student_details']->row();
    				//print_r($username);exit;

    			$this->load->view('support/header');
    			$data['student_details'] = $userdata;
    			$data['personal'] = $personal = $this->db->where('student_email',$userdata->registered_email)->get('student_personal_details')->row();
    			$data['academic'] = $this->Support_model->academiclDetails($username);

    			$data['family'] = $this->Support_model->familyDetails($username);
    			$data['extrac'] = $this->Support_model->extracarricular($username);
    			$data['bank'] =  $this->Support_model->bankAddress($username);
         $data['invoice']=$this->Support_model->getInvoice($username);
    		//print_r($data['family']);exit;
         $data['notified_scholarships'] = $this->Support_model->getNotifiedScholarshipsByUsername($username);
         $data['not_notified_scholarships'] = $this->Support_model->getNotNotifiedLiveScholarships($username);

         $this->load->view('support/student_details',$data);
         $this->load->view('support/footer');
       }else{
        $this->session->set_flashdata('no-data-found','No data found');
         redirect(base_url('support_dashboard'));
       }
     }
   }

   public function supportDeletePushedNotification(){

     if($this->input->post('username') !='' && $this->input->post('scholarship_id') != ''){
      if($this->db->where('student_username',$this->input->post('username'))->where('scholarship_id',$this->input->post('scholarship_id'))->delete('sent_notifications')){
       $this->session->set_flashdata('success-delete','deleted successfully');
       redirect('support-student-details?search='.$this->input->post('redirect_to'));
     }else{
       $this->session->set_flashdata('failure','something went wrong');
       redirect('support-student-details?search='.$this->input->post('redirect_to'));
     }
   }
 }


 public function pushScholarshipToStudent($scholarshipId, $username){

   $this->Support_model->pushScholarshipToStudent($scholarshipId, $username);
 }

 public function profilePage()
 {


   if (!$this->session->userdata('username')) redirect('support-login');
   $this->load->view('support/header');
   $data['profile'] = $this->Support_model->getProfileDetials()->row();
   $this->load->view('support/support_profile', $data);
   $this->load->view('support/footer');
 }



 public function updateProfile()
 {
   $id=$this->input->post('id');

   $data=array(
    'name'=>$this->input->post('fullname'),
    'mobile'=>$this->input->post('phone_number'),
    'password'=>$this->input->post('password')
  );

   $result=$this->Support_model->updateProfile($data,$id);


   if($result)
   {
    $this->session->set_flashdata('profile-details-update-success', 'Profile details updated successfully!'); 
    redirect('support-profile-page');
  }
  else
  {
    $this->session->set_flashdata('profile-details-update-error', 'Failed to update profile details!'); 
    redirect('support-profile-page');
  }

}

public function getSubscriptionExpiredList() 
{
 if (!$this->session->userdata('username')) redirect('support-login');
 $this->load->view('support/header');
 $data['getregisterestudents'] = $this->Support_model->getSubscriptionExpiredList();
 $this->load->view('support/subscription_expired_students_list', $data);
 $this->load->view('support/footer');
}

public function otherDetails()
{
if (!$this->session->userdata('username')) redirect('support-login');
 $this->load->view('support/header');
 $this->load->view('support/other_home');
 $this->load->view('support/footer');
}

public function addreligionForm()
{
if (!$this->session->userdata('username')) redirect('support-login');
 $this->load->view('support/header');
 $data['religion']=$this->Support_model->getReligionNames();
 $this->load->view('support/religion_details',$data);
 $this->load->view('support/footer');
}

public function insertRegligionName()
{
  if (!$this->session->userdata('username')) redirect('support-login');
 $data=array(
  'religion_name'=>ucfirst($this->input->post('religionName'))

);

 $result=$this->Support_model->insertRegligionName($data);
 if($result)
 {
  $this->session->set_flashdata('religion-name-add-success', 'Religion name added successfully!'); 
  redirect('religion');
}
else
{
  $this->session->set_flashdata('religion-name-add-failure', 'Failed to add religion!'); 
  redirect('religion');

}
}

public function updateReligionName()
{
  if (!$this->session->userdata('username')) redirect('support-login');
 $religionId=$this->input->post('rid');

 $data=array(
  'religion_name'=>$this->input->post('editReligionName')
);

 $result=$this->Support_model->updateReligionName($data,$religionId);
 if($result)
 {
  $this->session->set_flashdata('religion-name-update-success', 'Religion name updated successfully!'); 
  redirect('religion');
}
else
{
  $this->session->set_flashdata('religion-name-update-failure', 'Failed to update religion!'); 
  redirect('religion');
}

}


public function qualificationForm()
{
if (!$this->session->userdata('username')) redirect('support-login');
 $this->load->view('support/header');
 $data['qualification']=$this->Support_model->getQualificationNames();
 $this->load->view('support/qualification',$data);
 $this->load->view('support/footer');
}

public function insertQualificationName()
{
  if (!$this->session->userdata('username')) redirect('support-login');
 $data=array(
  'course_name'=>ucfirst($this->input->post('qualificationName'))

);

 $result=$this->Support_model->insertQualificationName($data);
 if($result)
 {
  $this->session->set_flashdata('qualification-name-add-success', 'Qualification name added successfully!'); 
  redirect('qualification');
}
else
{
  $this->session->set_flashdata('qualification-name-add-failure', 'Failed to add qualification name!'); 
  redirect('qualification');

}
}

public function updateQualificationName()
{
  if (!$this->session->userdata('username')) redirect('support-login');
 $qualificationId=$this->input->post('rid');

 $data=array(
  'course_name'=>$this->input->post('editQualificationName')
);

 $result=$this->Support_model->updateQualificationName($data,$qualificationId);
 if($result)
 {
  $this->session->set_flashdata('qualification-name-update-success', 'Qualification name updated successfully!'); 
  redirect('qualification');
}
else
{
  $this->session->set_flashdata('qualification-name-update-failure', 'Failed to update qualification!'); 
  redirect('qualification');
}

}

public function courseForm()
{
  if (!$this->session->userdata('username')) redirect('support-login');
 $this->load->view('support/header');
 $data['qualification']=$this->Support_model->getQualificationNames();
 $data['course']=$this->Support_model->getCourseNames();
 $this->load->view('support/courses',$data);
 $this->load->view('support/footer');
}


public function insertCourseName()
{
  if (!$this->session->userdata('username')) redirect('support-login');
 $data=array(

  'particular_name'=>$this->input->post('coureName'),
  'course_id'=>$this->input->post('qualificationName')

);

 $result=$this->Support_model->insertCourseName($data);
 if($result)
 {
  $this->session->set_flashdata('coure-name-add-success', 'Course name added successfully!'); 
  redirect('course/'.'?qualificationName='.$this->input->post('qualificationName'));
}
else
{
  $this->session->set_flashdata('course-name-add-failure', 'Failed to add course name!'); 
  redirect('course/'.'?qualificationName='.$this->input->post('qualificationName'));

}
}


public function updateCourseName()
{
  if (!$this->session->userdata('username')) redirect('support-login');
 $particularId=$this->input->post('rid');

 $data=array(
  'course_id'=>$this->input->post('editQualificationName'),
  'particular_name'=>$this->input->post('editCourseName')
);

 $result=$this->Support_model->updateCourseName($data,$particularId);
 if($result)
 {
  $this->session->set_flashdata('course-name-update-success', 'Course name updated successfully!'); 
  redirect('course');
}
else
{
  $this->session->set_flashdata('course-name-update-failure', 'Failed to update course name!'); 
  redirect('course');
}

}


public function categoryForm()
{
  if (!$this->session->userdata('username')) redirect('support-login');
 $this->load->view('support/header');
 $data['category']=$this->Support_model->getCategoryNames();
 $this->load->view('support/category',$data);
 $this->load->view('support/footer');
}


public function insertCategoryName()
{
  if (!$this->session->userdata('username')) redirect('support-login');
 $data=array(

  'category_name'=>ucfirst($this->input->post('categoryName')),

);

 $result=$this->Support_model->insertCategoryName($data);
 if($result)
 {
  $this->session->set_flashdata('category-name-add-success', 'Course name added successfully!'); 
  redirect('category-form');
}
else
{
  $this->session->set_flashdata('category-name-add-failure', 'Failed to add course name!'); 
  redirect('category-form');

}
}


public function updateCategoryName()
{
  if (!$this->session->userdata('username')) redirect('support-login');
 $categoryId=$this->input->post('rid');

 $data=array(
  'category_name'=>$this->input->post('editCategoryName')
);

 $result=$this->Support_model->updateCategoryName($data,$categoryId);
 if($result)
 {
  $this->session->set_flashdata('category-name-update-success', 'Category name updated successfully!'); 
  redirect('category-form');
}
else
{
  $this->session->set_flashdata('category-name-update-failure', 'Failed to update category!'); 
  redirect('category-form');
}

}

public function disabilityForm()
{
  if (!$this->session->userdata('username')) redirect('support-login');
 $this->load->view('support/header');
 $data['disability']=$this->Support_model->getDisabilityNames();
 $this->load->view('support/disability',$data);
 $this->load->view('support/footer');
}


public function insertDisabilityName()
{
  if (!$this->session->userdata('username')) redirect('support-login');
 $data=array(

  'disability_name'=>ucfirst($this->input->post('disabilityName')),

);

 $result=$this->Support_model->insertDisabilityName($data);
 if($result)
 {
  $this->session->set_flashdata('disability-name-add-success', 'Disability name added successfully!'); 
  redirect('disability');
}
else
{
  $this->session->set_flashdata('disability-name-add-failure', 'Failed to add disability name!'); 
  redirect('disability');

}
}

public function updateDisabilityName()
{
  if (!$this->session->userdata('username')) redirect('support-login');
 $disabilityId=$this->input->post('rid');

 $data=array(
  'disability_name'=>$this->input->post('editDisabilityName')
);

 $result=$this->Support_model->updateDisabilityName($data,$disabilityId);
 if($result)
 {
  $this->session->set_flashdata('disability-name-update-success', 'Disability name updated successfully!'); 
  redirect('disability');
}
else
{
  $this->session->set_flashdata('disability-name-update-failure', 'Failed to update disability!'); 
  redirect('disability');
}

}


public function activityTypeForm()
{
  if (!$this->session->userdata('username')) redirect('support-login');
 $this->load->view('support/header');
 $data['activity_type']=$this->Support_model->getActivityTypeNames();
 $this->load->view('support/activity_type',$data);
 $this->load->view('support/footer');
}


public function insertActivityTypeName()
{
  if (!$this->session->userdata('username')) redirect('support-login');
 $data=array(

  'activity_type'=>ucfirst($this->input->post('activityTypeName')),

);

 $result=$this->Support_model->insertActivityTypeName($data);
 if($result)
 {
  $this->session->set_flashdata('activity-type-name-add-success', 'Activity Tyoe name added successfully!'); 
  redirect('activity-type');
}
else
{
  $this->session->set_flashdata('activity-type-name-add-failure', 'Failed to add activity type name!'); 
  redirect('activity-type');

}
}

public function updateActivityType()
{
  if (!$this->session->userdata('username')) redirect('support-login');
 $activityTypeId=$this->input->post('rid');

 $data=array(
  'activity_type'=>$this->input->post('editActivityType')
);

 $result=$this->Support_model->updateActivityType($data,$activityTypeId);
 if($result)
 {
  $this->session->set_flashdata('activity-type-update-success', 'Activity type updated successfully!'); 
  redirect('activity-type');
}
else
{
  $this->session->set_flashdata('activity-type-update-failure', 'Failed to update activity type!'); 
  redirect('activity-type');
}

}



public function activityNameForm()
{
  if (!$this->session->userdata('username')) redirect('support-login');
 $this->load->view('support/header');
 $data['activity_type']=$this->Support_model->getActivityTypeNames();
 $data['name']=$this->Support_model->getActivityNames();
 $this->load->view('support/activity_type_name',$data);
 $this->load->view('support/footer');
}


public function insertActivityName()
{	
if (!$this->session->userdata('username')) redirect('support-login');

 $data=array(

  'student_activity_type_id'=>$this->input->post('activityType'),
  'student_activity_name'=>ucfirst($this->input->post('activityName')),

);

 $result=$this->Support_model->insertActivityName($data);
 if($result)
 {
  $this->session->set_flashdata('activity-name-add-success', 'Activity name added successfully!'); 
  redirect('activity-name/'.'?activityType='.$this->input->post('activityType'));
}
else
{
  $this->session->set_flashdata('activity-name-add-failure', 'Failed to add activity name!'); 
  redirect('activity-name/'.'?activityType='.$this->input->post('activityType'));

}
}



public function updateActivityName()
{
  if (!$this->session->userdata('username')) redirect('support-login');
 $activityNameId=$this->input->post('rid');

 $data=array(
  'student_activity_type_id'=>$this->input->post('editActivityType'),
  'student_activity_name'=>$this->input->post('editActivityName')
);

 $result=$this->Support_model->updateActivityName($data,$activityNameId);
 if($result)
 {
  $this->session->set_flashdata('activity-name-update-success', 'Activity name updated successfully!'); 
  redirect('activity-name');
}
else
{
  $this->session->set_flashdata('activity-name-update-failure', 'Failed to update activity name!'); 
  redirect('activity-name');
}

}

public function pushAlertNotifications()
{
  if (!$this->session->userdata('username')) redirect('support-login');
  $this->load->view('support/header');
  $data['notifications']=$this->Support_model->getAlertNotification();
    	// $data['name']=$this->Support_model->getActivityNames();
  $this->load->view('support/push_alert_notifications',$data);
  $this->load->view('support/footer');
}
public function addAlertNotifications()
{
  if (!$this->session->userdata('username')) redirect('support-login');
  $this->Support_model->addAlertNotification();

}
public function updateAlertNotifications()
{   
  
 if (!$this->session->userdata('username')) redirect('support-login');
 $this->Support_model->updateAlertNotification($this->input->post('sid'));        

}
public function deleteAlertNotifications() 
{
  if (!$this->session->userdata('username')) redirect('support-login');
  $this->Support_model->deleteAlertNotifications($this->input->post('did'));
}

public function responseStatus($id,$responseStatus)
{
  if (!$this->session->userdata('username')) redirect('support-login');
  $data='';
  $text='';
  if($responseStatus=='1')
  {
    $data=array(
      'requested_issue'=>'invalid request',
      'updated_date'=>date('Y-m-d H:i:s')
    );

    $text='invalid request';
  }
  else if($responseStatus=='2')
  {
     $data=array(
      'requested_issue'=>'solved',
      'updated_date'=>date('Y-m-d H:i:s')
    );


      $text='solved';
  }

  else if($responseStatus=='3')
  {
     $data=array(
      'requested_issue'=>'not solved',
      'updated_date'=>date('Y-m-d H:i:s')
    );
      $text='not solved';
  }

  else if($responseStatus=='4')
  {
     $data=array(
      'requested_issue'=>'processing',
      'updated_date'=>date('Y-m-d H:i:s')
    );
    $text='processing';
  }

  else
  {
    $data=array(
      'requested_issue'=>'pending',
      'updated_date'=>date('Y-m-d H:i:s')
    );
    $text='pending';

  }

$result=$this->Support_model->addResponse($id,$data);

if($result)
{
    $this->session->set_flashdata("response-update-success", "Response status changed to $text successfully "); 
  redirect('requested-callback-list');
}
else
{
  $this->session->set_flashdata("response-update-failure", "Failed to change the response to $text!"); 
  redirect('requested-callback-list');
}

}

public function redeemRequest() 
{

  if (!$this->session->userdata('username')) redirect('support-login');
  $this->load->view('support/header');
  // $data['redeemrequests']=$this->Support_model->getRedeemRequests();
      // $data['name']=$this->Support_model->getActivityNames();
  $this->load->view('support/redeem_request/redeem_requests');
  $this->load->view('support/footer'); 

}

public function renewRequest() 
{

  if (!$this->session->userdata('username')) redirect('support-login');
  $this->load->view('support/header');
  $data['redeemrequests']=$this->Support_model->getRenewRequests();
  $this->load->view('support/redeem_request/renew_requests',$data);
  $this->load->view('support/footer'); 

}
public function bankRequest() 
{

  if (!$this->session->userdata('username')) redirect('support-login');
  $this->load->view('support/header');
  $data['redeemrequests']=$this->Support_model->getBankRedeemRequests();
  $this->load->view('support/redeem_request/bank_requests',$data);
  $this->load->view('support/footer'); 

}
public function registeredRequest() 
{

  if (!$this->session->userdata('username')) redirect('support-login');
  $this->load->view('support/header');
  $data['redeemrequests']=$this->Support_model->getRegisteredAccountRequests();
  $this->load->view('support/redeem_request/registered_new_account_requests',$data);
  $this->load->view('support/footer'); 

}
public function solvedRedeemRequest()
{
  if (!$this->session->userdata('username')) redirect('support-login');
  $this->Support_model->solvedRedeemRequest();

}

public function exportFailedReferrals(){
  if (!$this->session->userdata('username')) redirect('support-login');
    $sql = "SELECT COUNT(student_registration_log.referral_code) as 'Number of referrals', student_registration_log.referral_code AS 'referred code', student_registration.student_name,student_registration.registered_email,student_registration.registered_mobile_no FROM `student_registration_log` JOIN referral_codes ON student_registration_log.referral_code = referral_codes.referral_code JOIN student_registration on student_registration.student_username = referral_codes.student_username GROUP BY student_registration_log.referral_code";
    $sql = $this->db->query($sql);
    // exit;
    $file_name = 'most_active_referrers_'.date('Ymdhis').'.csv'; 
		header('Content-Description: File Transfer');
		header('Content-Type: application/csv');
		header('Content-Disposition: attachment; filename='.$file_name);
		header('Expires: 0');
		header('Cache-Control: must-revalidate');
		header('Pragma: public');
// 		$CSVdata = $this->db->select('name as Name, gender as Gender, email as Email, num as MobileNo, referral_code as ReferralCode, timestamp as RegDate')->where('referral_code',$this->input->post('referral_code'))->where('status','1')->get('student_register');
		$CSVdata= $sql->result_array();
		$file = fopen('php://output', 'w');
		$header = array('Number of referrals', 'Referred Code' ,'Student Name', 'Email', 'Mobile No');
		fputcsv($file, $header); 
		foreach ($CSVdata as $key => $value){ 
			fputcsv($file,$value);
		}
		fclose($file);
}

public function exportSuccessfulReferrals(){
  if (!$this->session->userdata('username')) redirect('support-login');
    $sql = "SELECT COUNT(student_registration_log.referral_code) as 'Number of referrals', student_registration_log.referral_code AS 'referred code', student_registration.student_name,student_registration.registered_email,student_registration.registered_mobile_no FROM `student_registration_log` JOIN referral_codes ON student_registration_log.referral_code = referral_codes.referral_code JOIN student_registration on student_registration.student_username = referral_codes.student_username WHERE student_registration_log.registration_status = 1 GROUP BY student_registration_log.referral_code";
    $sql = $this->db->query($sql);
    // exit;
        $file_name = 'successful_referrers_'.date('Ymdhis').'.csv'; 
		header('Content-Description: File Transfer');
		header('Content-Type: application/csv');
		header('Content-Disposition: attachment; filename='.$file_name);
		header('Expires: 0');
		header('Cache-Control: must-revalidate');
		header('Pragma: public');
// 		$CSVdata = $this->db->select('name as Name, gender as Gender, email as Email, num as MobileNo, referral_code as ReferralCode, timestamp as RegDate')->where('referral_code',$this->input->post('referral_code'))->where('status','1')->get('student_register');
		$CSVdata= $sql->result_array();
		$file = fopen('php://output', 'w');
		$header = array('Number of referrals', 'Referred Code' ,'Student Name', 'Email', 'Mobile No');
		fputcsv($file, $header); 
		foreach ($CSVdata as $key => $value){ 
			fputcsv($file,$value);
		}
		fclose($file);
}
    public function renewalLogs(){
      if (!$this->session->userdata('username')) redirect('support-login');
     $data['renewalData']=$this->Support_model->renewalStudents();
     $this->load->view('support/header');
     $this->load->view('support/renewal_logs',$data);
     $this->load->view('support/footer');
    }
    
    public function redirectToWhatsApp(){
      if (!$this->session->userdata('username')) redirect('support-login');
        $username = $this->input->get('username');
        $mobile_no = $this->input->get('mobile_no');
        $message = $this->input->get('message');
        $redirect = $this->input->get('redirect');
        $this->Response->redirectToWhatsApp($username,$mobile_no,$message,$redirect);
    }
    public function manualregistration()
    {
	    if (!$this->session->userdata('username')) redirect('support-login');
	    // $data['getRedeemRequests']=$this->Student_model->getRedeemRequests();
    	$this->load->view('support/student_manual_registrations');
        
    }
    public function addManual()
    {
      if (!$this->session->userdata('username')) redirect('support-login');
	$this->Support_model->addmanualRegistrations();
    }
    public function influencerReuests() 
    {

    if (!$this->session->userdata('username')) redirect('support-login');
         $this->load->view('support/header');
        $data['influncerrequests']=$this->Support_model->getInfluencerRedeemRequests();
         $this->load->view('support/redeem_request/influencer_requests',$data);
        $this->load->view('support/footer'); 

     }
public function influencerReuestSolved()
{if (!$this->session->userdata('username')) redirect('support-login');
   $this->Support_model->solvedInfluencerRequest($this->input->post('reqId'));
}


public function exportStudentsList(){
    
     if (!$this->session->userdata('username')) redirect('support-login');
		$file_name = 'tgs_students_list_'.date('Ymdhis').'.csv'; 
		header('Content-Description: File Transfer');
		header('Content-Type: application/csv');
		header('Content-Disposition: attachment; filename='.$file_name);
		header('Expires: 0');
		header('Cache-Control: must-revalidate');
		header('Pragma: public');
		$failedStudents = $this->Support_model->getFailedStudents();
		$webinarRegistered = $this->Support_model->getWebinarRegisteredStudents();
		$promotionRegistered = $this->Support_model->getPromotionRegisteredStudents();
		$oldWebinarRegistered = $this->Support_model->getOldDBWebinarData();
// 		$CSVdata= $CSVdata->result_array();
		$file = fopen('php://output', 'w');
		$header = array('Name','Email','MobileNo','Source','Date');
		fputcsv($file, $header);
		foreach ($failedStudents as $key => $value)
		{ 
			fputcsv($file,$value);
		}
		foreach ($webinarRegistered as $key => $value)
		{ 
			fputcsv($file,$value);
		}
		foreach ($promotionRegistered as $key => $value)
		{ 
			fputcsv($file,$value);
		}
		foreach ($oldWebinarRegistered as $key => $value)
		{ 
			fputcsv($file,$value);
		}
		fclose($file);    
	}
	
	
	public function exportStudentsRegisteredList(){
     if (!$this->session->userdata('username')) redirect('support-login');
		$file_name = 'tgs_students_list_'.date('Ymdhis').'.csv'; 
		header('Content-Description: File Transfer');
		header('Content-Type: application/csv');
		header('Content-Disposition: attachment; filename='.$file_name);
		header('Expires: 0');
		header('Cache-Control: must-revalidate');
		header('Pragma: public');
		$studentsData = $this->Support_model->getAllRegisteredStudents();
// 		print_r($studentsData);exit;
		if($this->input->get('filter') == 'active'){
		    $studentsData = $this->Support_model->getAllRegisteredActiveStudents();
		}
		
// 		$CSVdata= $CSVdata->result_array();
		$file = fopen('php://output', 'w');
		$header = array('Name','Email','MobileNo','Registration Date','Expiry Date');
		fputcsv($file, $header);
		foreach ($studentsData as $key => $value)
		{ 
			fputcsv($file,$value);
		}
		
		fclose($file);    
	}
	
 public function stateRegistered() 
  {
    if (!$this->session->userdata('username')) redirect('support-login');
    $this->load->view('support/header');
    
    $data['getregisterestudents'] = $this->Support_model->getStatesData();
     $data['totalStudents']=$this->Support_model->CountTotalRegisiteredStudents();
    $this->load->view('support/statewise', $data);
    $this->load->view('support/footer');
  }
	public function roles()
	{
	     if(!$this->session->userdata('username')) redirect('support-login');
		$this->load->view('support/header');
		//$data['user']=$this->Support_model->getRole();
		$data['user']=$this->db->select('*')->from('support_new_register')->order_by('id','desc')->get();
		$this->load->view('support/role',$data);
		$this->load->view('support/footer');
	}
	public function insertRoles()
	{
      if (!$this->session->userdata('username')) redirect('support-login');
		$this->Support_model->insertRole();
	}
	public function updateRoles()
	{
      if (!$this->session->userdata('username')) redirect('support-login');
		$this->Support_model->updateRole();
	}
	public function deleteRoles()
	{
	   if (!$this->session->userdata('username')) redirect('support-login');
		$this->Support_model->deleteRole();
	}
	public function access($id)
	{
	        if(!$this->session->userdata('username')) redirect('support-login');
		$this->load->view('support/header');
		$data['routes']=$this->db->select('routes.*,user_access.*')->from('routes')->join('user_access','user_access.route_id=routes.rid')->where('user_access.user_id',$id)->get();
		$this->load->view('support/access',$data);
		$this->load->view('support/footer');
	}
	public function changeUserPermissionStatus()
    {
if (!$this->session->userdata('username')) redirect('support-login');
        $route=$this->input->post('route');
        $role=$this->input->post('role');
        $value=$this->input->post('value');

            $updateUserPermission=array(
                'status'=>$this->input->post('value')
            );
        
        $data=$this->Support_model->changeUserPermissionStatus($route,$role,$updateUserPermission);
        
        //print_r(json_encode($this->db->last_query()));exit;
        echo json_encode($data);

    }
	public function addroute(){
	    if (!$this->session->userdata('username')) redirect('support-login');
	    $q =$this->db->select(array(
            's.support_id'))
            ->from('support_new_register as s')
            ->where('s.support_id NOT IN (select user_id from user_access)',NULL,FALSE)->get();
            if($q->num_rows()>0){
                $users=$q->result();
                foreach($users as $rows){
                    $route=$this->db->get('routes')->result();
                    foreach($route as $r){
                        $data=array(
                             'route_id'=>$r->rid,
                            'user_id'=>$rows->support_id
                            );
                             $this->db->insert('user_access',$data);
                    }
                }
                redirect('roles');
            }
           redirect('roles');
	}
}?>