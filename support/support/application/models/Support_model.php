<?php

class Support_model extends CI_Model{

	public function generateRandomString($n) { 
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
		$randomString = '';
		for ($i = 0; $i < $n; $i++) { 
			$index = rand(0, strlen($characters) - 1); 
			$randomString .= $characters[$index]; 
		}
		return $randomString; 
	}
	public function generateDiscountCode($n) { 
		$characters = 'SCHOLARSHIPS'; 
		$randomString = '';
		for ($i = 0; $i < $n; $i++) { 
			$index = rand(0, strlen($characters) - 1); 
			$randomString .= $characters[$index]; 
		}
		return $randomString; 
	}
public function getStatesData(){
    $this->db->distinct();
    $this->db->select('student_state')
    ->from('student_registration');
    $data=$this->db->get();
    return $data;
    }
//     public function CountTotalRegisiteredStudents()
// {
// 	$result=$this->db->where('registration_status','1')->where('subscription_validity_datetime>=',date('Y-m-d'))->get('student_registration')->num_rows();
// 	return $result;
// }
	public function newRegister(){
		if($this->input->post('firstname')){
        	// echo "njfhjf";exit;
			$supportId = $this->generateRandomString(18);
			$regId = $this->generateDiscountCode(12);
			$uniqueemail=0;
			
			if($this->input->post('role')=="Sales")
			{
			$uniqueemail = $this->db->where('email',$this->input->post('email'))->where('role','Sales')->get('support_new_register')->num_rows();
			}
			else
			{
			$uniqueemail = $this->db->where('email',$this->input->post('email'))->where('role','Support')->get('support_new_register')->num_rows();
			}
			
			if($uniqueemail > 0 ){
				$this->session->set_flashdata("failes","Added successfully.");
				redirect('new_regsitration');				
			}
			else{
			//print_r($discountId);exit;
				$data = array(
					'support_id' => $supportId,
					'name'=>$this->input->post('firstname'),
					'email' => $this->input->post('email'),
					'mobile'=>$this->input->post('mobile'),
					'date_of_joining'=>$this->input->post('date'),
					'password'=>$this->input->post('password'),
					'role'          =>$this->input->post('role'),
					'status'=>1
				);
            // print_r($data);exit;
				if($this->db->insert('support_new_register', $data))
				{
					$role = $this->db->where('support_id',$supportId)->get('support_new_register')->row();
				//print_r($role);exit;
					if($role->role == 'Sales'){
						$ddata = array(
							array(
								'sales_username' => $supportId,
								'discount_code' =>'TGS'.$this->generateDiscountCode(7).'00',
								'discount_amt' => 000,
								'created_date'=> date('Y-m-d H:i:s'),
								'created_by'=>$this->session->userdata('username'),
								'status'=>1,
							),
							array(
								'sales_username' => $supportId,
								'discount_code' => 'TGS'.$this->generateDiscountCode(7).'50',
								'discount_amt' => 50,
								'created_date'=> date('Y-m-d H:i:s'),
								'created_by'=>$this->session->userdata('username'),
								'status'=>1,
							),
							array(
								'sales_username' => $supportId,
								'discount_code' => 'TGS'.$this->generateDiscountCode(6).'100',
								'discount_amt' => 100,
								'created_date'=> date('Y-m-d H:i:s'),
								'created_by'=>$this->session->userdata('username'),
								'status'=>1,
							),
							array(
								'sales_username' => $supportId,
								'discount_code' => 'TGS'.$this->generateDiscountCode(6).'150',
								'discount_amt' => 150,
								'created_date'=> date('Y-m-d H:i:s'),
								'created_by'=>$this->session->userdata('username'),
								'status'=>1,
							)
						);
				//print_r($ddata);exit;

						$this->db->insert_batch('sales_discount_code', $ddata);
					}
                   $routes = $this->db->get('routes')->result();
                            foreach($routes as $role){
                            $data=array(
                            'route_id'=>$role->rid,
                      'user_id'=>$supportId
                           );
                         $this->db->insert('user_access',$data);
                            }
				}
				$this->session->set_flashdata("success","Added successfully.");
				redirect('new_regsitration');
			}
		}
	}
	public function getSaleRegisterData(){
		$this->db->select('*')->from('support_new_register')->order_by('id','DESC');
		$data = $this->db->get()->result();
		return $data;
	}
	public function updateNewData(){
		if($this->input->post('efirstname')){
        	// echo "njfhjf";exit;
			$data = array(
				'name'=>$this->input->post('efirstname'),
				'email' => $this->input->post('eemail'),
				'mobile'=>$this->input->post('emobile'),
				'date_of_joining'=>$this->input->post('edate'),
				'role'          =>$this->input->post('erole'),
              'password' =>$this->input->post('epassword'),
			);
            // print_r($data);exit;
			$this->db->where('support_id',$this->input->post('sid'));
			$this->db->update('support_new_register', $data);
			$this->session->set_flashdata("update-success","Updated successfully.");
			redirect('new_regsitration');
		}
	}
	public function deleteData(){
		$this->db->where('support_id',$this->input->post('did'));
		$this->db->delete('support_new_register');
		$this->session->set_flashdata("deletesuccess","Deleted successfully.");
		redirect('new_regsitration');
	}
	// Created By Asif This Function is used to add webinar registration

	public function add_webinar_registrations()
	{
		if($this->input->post('institutional_name')){

			$webinarId = rand(000000, 999999);
			$data=array(
				'webinar_uniqueid'			=>$webinarId,
				'institutional_name'		=>$this->input->post('institutional_name'),
				'email'						=>$this->input->post('email'),
				'alternative_email'			=>$this->input->post('alternative_email'),
				'contact_number'			=>$this->input->post('contact_number'),
				'alternate_contact_number'	=>$this->input->post('alternate_contact_number'),
				'date'						=>$this->input->post('date')
			);
		// print_r($data);exit();
			$result=$this->db->insert('webinar_registration',$data);
			$this->session->set_flashdata("webinar-success","webinar registration created successfully.");
			redirect('webinar-registrations');
		}

	}
	public function getWebinarRegistrations()
	{
		$result=$this->db->order_by('date','ASC')->get('webinar_registration')->result();
		return $result;
	}
	public function update_webinar_registration($id)
	{
		$result=$this->db->where('webinar_uniqueid',$id)->get('webinar_registration')->row();
		return $result;
	}

	public function getWebinarShortName($id)
	{
		$result=$this->db->where('webinar_id',$id)->get('generate_links')->row();
		return $result;
	}

	public function get_webinar_registration_list($id)
	{
		// $result=$this->db->where('webinar_uniqueid',$id)->get('webinar_registration');
		// return $result;


		$result=$this->db->query("select * from webinar_registration join generate_links on  generate_links.webinar_id=webinar_registration.webinar_uniqueid join links on links.generate_links_id=generate_links.institutional_link_id	 where webinar_registration.webinar_uniqueid='$id' order by links.links_id desc ");

		return $result;

		// $this->db->select('*');
		// $this->db->from('webinar_registration');
		// $this->db->join('generate_links', 'generate_links.webinar_id = webinar_registration.webinar_uniqueid');
		// $this->db->join('links', 'links.links_webinarid = generate_links.webinar_id');
		// $this->db->where('webinar_uniqueid',$id);
		// $result = $this->db->get();

		// return $result;



	}

	public function WebinarNameVerification($webinarName)
	{
		$this->db->where('webinar_name',$webinarName);
		$result=$this->db->get('generate_links');

		if($result->num_rows()>0)
		{
			return true;
		}
		else
		{
			return false;
		}

	}

	public function generateLinksForEachInstitution($id)
	{

		$webinarName=strtolower($this->input->post('webinar_name'));

		$verifyWebinarName=$this->Support_model->WebinarNameVerification($webinarName);
		if(!$verifyWebinarName)
		{


			if($this->input->post('institutional_name'))
			{	
				$webinarregistrationId=$this->input->post('webinarId');
				$instituionalId = rand(000000, 999999);
				$data=array(
					'institutional_link_id'	=> $instituionalId,
					'webinar_id'			=> $webinarregistrationId,
					'institutional_name'	=> $this->input->post('institutional_name'),
					'webinar_name'			=> strtolower($this->input->post('webinar_name')),
					'link_type'				=> $this->input->post('link_type'),
				);
				$result=$this->db->insert('generate_links',$data);

				$links=$this->input->post('generate_links');
				// print_r($links);exit();
				foreach ($links as $key => $value) {
					if($value == ''){
						continue;
					}
					// print_r($webinarregistrationId);ex
					$linkData['links_webinarid'] 	= $webinarregistrationId;
					$linkData['generate_links_id '] = $instituionalId;
					$linkData['links'] 				= $links[$key];
					// print_r($linkData);exit();
					$result=$this->db->insert('links',$linkData);
					$this->session->set_flashdata('success', 'Your Link Generated Added');
					
				}

			}
			redirect('generate-links/'.$id);
			//redirect('webinar-registrations');

		}
		else
		{	
			
			$this->db->where('webinar_id',$id);
			$this->db->where('webinar_name',$webinarName);
			$result1=$this->db->get('generate_links');

			if($result1->num_rows()>0)
			{
				if($this->input->post('institutional_name'))
				{	
					$webinarregistrationId=$this->input->post('webinarId');
					$instituionalId = rand(000000, 999999);
					$data=array(
						'institutional_link_id'	=> $instituionalId,
						'webinar_id'			=> $webinarregistrationId,
						'institutional_name'	=> $this->input->post('institutional_name'),
						'webinar_name'			=> strtolower($this->input->post('webinar_name')),
						'link_type'				=> $this->input->post('link_type'),
					);
					$result=$this->db->insert('generate_links',$data);

					$links=$this->input->post('generate_links');
					// print_r($links);exit();
					foreach ($links as $key => $value) {
						if($value == ''){
							continue;
						}
						// print_r($webinarregistrationId);ex
						$linkData['links_webinarid'] 	= $webinarregistrationId;
						$linkData['generate_links_id '] = $instituionalId;
						$linkData['links'] 				= $links[$key];
						// print_r($linkData);exit();
						$result=$this->db->insert('links',$linkData);
						$this->session->set_flashdata('success', 'Your Link Generated Added');
						
					}

				}
				redirect('generate-links/'.$id);
			}

			else
			{

				$this->session->set_flashdata('webinar-name-aleady-exists', 'Sorry, this webinar name is already taken, try something else');
				redirect('generate-links/'.$id);

			}
		}
	}

	public function getGeneratedLinks($id)
	{
		
		$result=$this->db->join('generate_links','generate_links.institutional_link_id=links.generate_links_id')->where('links_webinarid',$id)->get('links')->row();
		// print_r($result);exit();
		return $result;
	}
	public function getGeneratedLinksinTable($id)
	{
		
		$result=$this->db->join('generate_links','generate_links.institutional_link_id=links.generate_links_id')->where('links_webinarid',$id)->order_by('links.links_id','DESC')->get('links')->result();
		// print_r($result);exit();
		return $result;
	}
	public function update_links($id)
	{
		if($this->input->post('links_name'))
		{	
			$data=array(
				'links'	=>$this->input->post('links_name'),	
			);
			 // print_r($data);exit();
			$result=$this->db->set($data)->where('links_id',$id)->update('links');
			$this->session->set_flashdata('update-success', 'Your link update successfully');
			return $result;
		}
		// redirect('update-webinar-registration/'.$webinarid);


	}
	public function updateDetailsOfWebinar($webuniqueId,$linksId)
	{
		// $webinarresult=0;
		if($this->input->post('institutional_name'))
		{	
			$webinardata=array(
				'institutional_name'	=> $this->input->post('institutional_name'),
				'contact_number'		=> $this->input->post('contact_number'),
				'email'					=> $this->input->post('email'),
				'date'					=> $this->input->post('date'),
			);
			$webinarresult=$this->db->set($webinardata)->where('id',$webuniqueId)->update('webinar_registration');
			
			$generatedlinks=array(
				'institutional_name'	=> $this->input->post('institutional_name'),
				'webinar_name'			=> $this->input->post('webinar_name'),
				'link_type'				=> $this->input->post('link_type'),
			);
			$linksresult=$this->db->set($generatedlinks)->where('id',$linksId)->update('generate_links');
			
		}
		redirect('webinar-registrations');
	}
	public function get_Webinar_name($id)
	{
		$this->db->select('*');
		$this->db->from('generate_links');
		$this->db->where('webinar_name',$id);
		$data = $this->db->get();
		if($data->num_rows()>0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function getRequestedCallBackList()
	{


		$callbackStatus=$this->input->get('callbackStatus');

		if($callbackStatus=='contacted')
		{
			$status=1;
			$this->db->where('status',$status);
			$this->db->order_by('id','ASC');
			$result=$this->db->get('contact_us');

			return $result;
		}
		else if($callbackStatus=='notContacted')
		{
			$status=0;
			$this->db->where('status',$status);
			$this->db->order_by('id','ASC');
			$result=$this->db->get('contact_us');

			return $result;
		}

		else
		{

// 			$status=0;
// 			$this->db->where('status',$status);
			$this->db->order_by('id','ASC');
			$result=$this->db->get('contact_us');

			return $result;

		}

	}

	public function changeStatusToContacted($id,$data)
	{

		$this->db->set($data);
		$this->db->where('id',$id);
		$result=$this->db->update('contact_us',$data);

		return $result;
	}

	public function changeStatusToNotContacted($id,$data)
	{

		$this->db->set($data);
		$this->db->where('id',$id);
		$result=$this->db->update('contact_us',$data);

		return $result;

	}

	public function getCandidateFeedbackList()
	{
		$feedbackStatus=$this->input->get('feedbackStatus');

		if($feedbackStatus=='goodFeedback')
		{	
			$goodRating=4;
			$result=$this->db->query("select * from  feed_back where student_rating>='$goodRating' order by feed_back_id desc");

			return $result;
		}

		else if($feedbackStatus=='badFeedback')
		{
			$badRating=3;
			$result=$this->db->query("select * from  feed_back where student_rating<='$badRating' order by feed_back_id desc");

			return $result;
		}



		else
		{
			$result=$this->db->query("select * from  feed_back order by feed_back_id desc");

			return $result;
		}
	}

	public function  verifySupportAdminUsername($username)
	{
		
		$role="Admin";
		$this->db->where('email',$username);
		$this->db->where('role',$role);
		$result=$this->db->get('support_admin');
		return $result;
	}

	public function getSupportsAdminProfileDetials()
	{

		$username=$this->session->userdata('username');
		$role=$this->session->userdata('role');

		$this->db->where('email',$username);
		$this->db->where('role',$role);
		$result=$this->db->get('support_admin');
		return $result;


	}
	public function updateSupportAdminProfile($data,$id)
	{

		$this->db->set($data);
		$this->db->where('id',$id);
		$result=$this->db->update('support_admin',$data);
		return $result;

	}

	public function  verifyUsername($username)
	{
		
		$role="Support";
		$this->db->where('email',$username);
		$this->db->where('role',$role);
		$result=$this->db->get('support_new_register');
		return $result;
	}

	public function setCookeToken($token,$username)
	{	
		$role="Support";

		$this->db->set($token);
		$this->db->where('email',$username);
		$this->db->where('role',$role);
		$this->db->update('support_new_register',$token);
	}

	public function resetPasswordToken($data)
	{
		$this->db->insert('reset_password',$data);
	}

	public function  getTokenTable($token)
	{
		$this->db->where('token',$token);
		$result=$this->db->get('reset_password');
		return $result->row();
	}

	public function setNewPassword($username,$data)
	{	
		$role="Support";

		$this->db->set($data);
		$this->db->where('email',$username);
		$this->db->where('role',$role);
		$result=$this->db->update("support_new_register",$data);
		return $result;
	}

	public function updateTokenStatus($token,$tokenStatus)
	{
		$this->db->set($tokenStatus);
		$this->db->where('token',$token);
		$this->db->update('reset_password',$tokenStatus);
	}
	public function getParentsOccupation()
	{
		$result=$this->db->get('parent_occupations')->result();
		return $result;
	}
	public function getDisabilityTypes()
	{
		$result=$this->db->get('disability_type')->result();
		return $result;
	}
	



	public function getRegisteredStudents($limit,$start,$text)

	{	 if($limit!=0){
		$this->db->limit($limit, $start);
		$result=$this->db->order_by('id','desc')->get('student_registration');
		return $result->result();
	}
	else if($text!=0)
	{
		// $result=$this->db->where('registration_status','1')->where('registered_mobile_no',$text)->order_by('registration_datetime','desc')->get('student_registration');
		// return $result->result();




		$mobileNumber=$this->db->where('registered_mobile_no',$text)->order_by('id','desc')->get('student_registration');

		$studentName=$this->db->where('student_name',$text)->order_by('id','desc')->get('student_registration');

		$studentEmail=$this->db->where('registered_email',$text)->order_by('id','desc')->get('student_registration');


		if ($mobileNumber->num_rows()>0)
		{
			return $mobileNumber->result();
		}
		else if($studentName->num_rows()>0)
		{
			return $studentName->result();
		}
		else 
		{
			return $studentEmail->result();
		}



	}
	else
	{
		$this->db->limit(10, $start);
		$result=$this->db->order_by('id','desc')->get('student_registration');
		return $result->result();
	}

}
public function registered_Student_list()
{	 
	$this->db->select(array('e.id','e.student_username','e.student_name', 'e.registered_mobile_no','e.registered_whatsapp_mobile_no','e.registered_email', 'e.amount'));
	$this->db->from('student_registration as e');
	$query = $this->db->get();
	  return $query->result_array();
}
public function get_state_registered_Student_list($id)
{	 
$this->db->select(array('e.id','e.student_username','e.student_name', 'e.registered_mobile_no','e.student_state','e.registered_email', 'e.course_name','e.registration_datetime'));
	$this->db->from('student_registration as e');
	$this->db->where('e.student_state',$id);
	$query = $this->db->get();
	  return $query->result_array();
}
public function getFailedRegisteredStudents()
{
    
// 	$result=$this->db->where('registration_status<>','1')->order_by('registration_initiated_datetime','desc')->get('student_registration_log')->result();
// 	return $result;
$source=$this->input->get('source');
	// print_r($source);exit;
	if($source)
	{
		$result=$this->db->where('page_source',$source)->where('registration_status<>','1')->order_by('registration_initiated_datetime','desc')->get('student_registration_log')->result();
		return $result;
	}
	else
	{
		$result=$this->db->where('registration_status<>','1')->order_by('id','desc')->get('student_registration_log')->result();
// 		print_r($result);exit;
		return $result;
	}
	
	
}
public function getPromotionalStudents()
{
	$result=$this->db->select('page_source')->distinct('page_source')->from('student_registration_log')->where('page_source!=','')->where('registration_status<>','1')->get();
	// print_r($this->db->last_query());exit();
	return $result;
	
	
}
public function CountTotalRegisiteredStudents()
{
// 	$result=$this->db->where('registration_status','1')->where('subscription_validity_datetime>=',date('Y-m-d'))->get('student_registration')->num_rows();
// 	return $result;
		$result=$this->db->where('registration_status','1')->get('student_registration')->num_rows();
	return $result;
}
public function getSubscriptionExpiredList()
{
	$result=$this->db->where('subscription_validity_datetime<=',date('y-m-d'))->order_by('subscription_validity_datetime','ASC')->get('student_registration')->result();
	return $result;
}



public function getProfileDetials()
{

	$username=$this->session->userdata('username');
	$role=$this->session->userdata('role');

	$this->db->where('email',$username);
	$this->db->where('role',$role);
	$result=$this->db->get('support_new_register');
	return $result;


}

public function updateProfile($data,$id)
{

	$this->db->set($data);
	$this->db->where('support_id',$id);
	$result=$this->db->update('support_new_register',$data);
	return $result;

}

public function getStudentDetails($input){
	return $this->db->group_start()->where('registered_mobile_no',$input)->or_where('registered_email',$input)->group_end()->get('student_registration');
}

public function academiclDetails($username){
	return $this->db->where('student_username',$username)->get('student_academic_details')->row();
}

public function familyDetails($username){
	return $this->db->where('student_username',$username)->get('student_family_details')->row();
}
public function extracarricular($username){
	return $this->db->where('student_username',$username)->get('student_extracarricular_details')->result();
}
public function bankAddress($username){
	return $this->db->where('student_username',$username)->get('bank_and_address_details')->row();
} 

public function getNotifiedScholarshipsByUsername($username){
	$this->db->distinct();
	$this->db->select('scholarships.*,sent_notifications.*');
	$this->db->from('sent_notifications');
	$this->db->join('scholarships','scholarships.scholarship_id = sent_notifications.scholarship_id');
            // $this->db->join('student_register','student_register.email = sent_notifications.student_id');
	$this->db->where('sent_notifications.student_username',$username);
// 	$this->db->order_by('sent_notifications.date_time','DESC');
    $this->db->order_by('scholarships.application_end_date','ASC');
	$data = $this->db->get()->result();
	return $data;
} 
public function getNotNotifiedLiveScholarships($username){
	return  $this->db->query("SELECT * FROM `scholarships` WHERE application_end_date !='NULL' AND application_end_date >= '".date('Y-m-d')."'AND status='1' AND  scholarship_id NOT IN(SELECT scholarships.scholarship_id FROM sent_notifications JOIN scholarships ON scholarships.scholarship_id = sent_notifications.scholarship_id WHERE sent_notifications.student_username = '".$username."') order by scholarships.application_end_date asc");
}

public function pushScholarshipToStudent($scholarshipId, $username){
	$checkScholarship = $this->db->where('scholarship_id',$scholarshipId)->get('scholarships');
	$checkStudent = $this->db->where('student_username',$username)->where('registration_status',1)->get('student_registration');
        // print_r($username);exit;
	if($checkScholarship->num_rows() > 0 &&  $checkStudent->num_rows() > 0){
		$checkStudent = $checkStudent->row();
		$pushScholarship = array(
			'scholarship_id' => $scholarshipId,
			'student_username' => $username,
                //'ins_added_by' => $checkStudent->added_by,
			'month' => date('Y-m'),
			'date_time' => date('Y-m-d')
		);

                // print_r($pushScholarship);exit;

		if($this->db->insert('sent_notifications',$pushScholarship)){
			$this->session->set_flashdata('success','Pushed scholarship.... ');
			redirect('support-student-details?search='.$checkStudent->registered_mobile_no);
		}else{
			$this->session->set_flashdata('failure','Something went wrong.... ');
			redirect('support-student-details?search='.$checkStudent->registered_mobile_no);
		}
	}
}  

public function insertRegligionName($data)
{
	$result=$this->db->insert('religions',$data);
	return $result;

}  	

public function getReligionNames()
{
	$result=$this->db->query("select * from religions order by religion_id desc ");
	return $result;
}

public function updateReligionName($data,$religionId)
{
	$this->db->set($data);
	$this->db->where('religion_id',$religionId);
	$result=$this->db->update('religions',$data);
	return $result;
}

public function getQualificationNames()
{
	$result=$this->db->query("select * from courses order by id desc ");
	return $result;
}

public function insertQualificationName($data)
{
	$result=$this->db->insert('courses',$data);
	return $result;
}



public function updateQualificationName($data,$qualificationId)
{
	$this->db->set($data);
	$this->db->where('id',$qualificationId);
	$result=$this->db->update('courses',$data);
	return $result;

}

public function getCourseNames()
{
	$result=$this->db->query("select * from course_particulars join courses on course_particulars.course_id=courses.id order by course_particulars.particular_id desc 
		");
	return $result;
}

public function insertCourseName($data)
{
	$result=$this->db->insert('course_particulars',$data);
	return $result;
}

public function updateCourseName($data,$particularId)
{
	$this->db->set($data);
	$this->db->where('particular_id',$particularId);
	$result=$this->db->update('course_particulars',$data);
	return $result;
}
public function getCategoryNames()
{
	$result=$this->db->query("select * from categories order by id desc");
	return $result;

}
public function insertCategoryName($data)
{
	$result=$this->db->insert('categories',$data);
	return $result;
}

public function updateCategoryName($data,$categoryId)
{

	$this->db->set($data);
	$this->db->where('id',$categoryId);
	$result=$this->db->update('categories',$data);
	return $result;

}

public function getDisabilityNames()
{
	$result=$this->db->query("select * from disability_type order by id desc");
	return $result;

}

public function insertDisabilityName($data)
{
	$result=$this->db->insert('disability_type',$data);
	return $result;
}

public function updateDisabilityName($data,$disabilityId)
{
	$this->db->set($data);
	$this->db->where('id',$disabilityId);
	$result=$this->db->update('disability_type',$data);
	return $result;

}
public function getActivityTypeNames()
{
	$result=$this->db->query("select * from student_activity order by id desc");
	return $result;

}
public function insertActivityTypeName($data)
{
	$result=$this->db->insert('student_activity',$data);
	return $result;

}

public function updateActivityType($data,$activityTypeId)
{
	$this->db->set($data);
	$this->db->where('id',$activityTypeId);
	$result=$this->db->update('student_activity',$data);
	return $result;
}


public function getActivityNames()
{
	$result=$this->db->query("select * from student_activity_name order by id desc ");
	return $result;
}

public function insertActivityName($data)
{
	$result=$this->db->insert('student_activity_name',$data);
	return $result;

}

public function updateActivityName($data,$activityNameId)
{
	$this->db->set($data);
	$this->db->where('id',$activityNameId);
	$result=$this->db->update('student_activity_name',$data);
	return $result;
}

	public function getPromotionRegister()
	{
	    $status=$this->input->get('status');
	    
	   

		if($status=='New')
		{
			$result=$this->db->where('student_status',$status)->order_by('registration_initiated_datetime','DESC')->get('promotion_register');
			return $result;
		}
		else if($status=='Already Registered')
		{
			$result=$this->db->where('student_status',$status)->order_by('registration_initiated_datetime','DESC')->get('promotion_register');
			return $result;
		}
		else if($status=='Failed Registration')
		{
			$result=$this->db->where('student_status',$status)->order_by('registration_initiated_datetime','DESC')->get('promotion_register');
			return $result;
		}
		else
		{
// 			$result=$this->db->order_by('registration_initiated_datetime','DESC')->get('promotion_register');
			$result=$this->db->distinct('promotions.registered_mobile_no')->select('promotions.student_username,promotions.registered_mobile_no,promotions.registration_initiated_datetime,promotions.student_name,promotions.registered_email,promotions.registered_mobile_no,promotions.registered_whatsapp_mobile_no,promotions.source,promotions.student_status')->from('promotion_register as promotions')->where('promotions.registered_mobile_no NOT IN (SELECT registered_mobile_no from student_registration)')->order_by('promotions.registration_initiated_datetime','DESC')->get();
			 //$result=$this->db->select('promotions.*')->from('promotion_register as promotions')->where('promotions.registered_mobile_no NOT IN (SELECT registered_mobile_no from student_registration)')->order_by('promotions.registration_initiated_datetime','DESC')->get('promotion_register');
			 //print_r($this->db->last_query());exit;
			return $result;
			
		}
	    
	}

public function getAlertNotification()
{
	$result=$this->db->order_by('added_date','DESC')->get('alert_notifications')->result();
	return $result;
}
public function addAlertNotification()
{
	if($this->input->post('add_message'))
	{
		$username=$this->session->userdata('registered_email');
		$data=array(

			'message' =>$this->input->post('add_message'),
			'added_date'=>date('Y-m-d H:i:s'),
			'navigate_to'=>$this->input->post('add_link'),
			'added_by'=>$username
		);
		$result=$this->db->insert('alert_notifications',$data);
		$this->session->set_flashdata('success','Notification added successfully.... ');
		redirect('push-alert-notifications');        
	}
}
public function updateAlertNotification($id)
{
	if($this->input->post('add_emessage'))
	{
		$data=array(
			'message' =>$this->input->post('add_emessage'),
			'navigate_to'=>$this->input->post('add_elink'),
		);
		$this->db->set($data);
		$this->db->where('id',$id);
		$result=$this->db->update('alert_notifications',$data);
		$this->session->set_flashdata('update-success','Notification added successfully.... ');
		redirect('push-alert-notifications');     
	}
}
public function deleteAlertNotifications($id){
	$this->db->where('id',$id);
	$this->db->delete('alert_notifications');
	$this->session->set_flashdata("delete-success","Notification deleted successfully.");
	redirect('push-alert-notifications');       
}



public function supportWebinarRegistration(){
	if($this->input->post('num')){
		$existence = $this->db->where('mobile_no',$this->input->post('num'))->get('students_webinar_registration');
		if($existence->num_rows() > 0){
			$_SESSION['user_added_allow_qr_and_link'] = 'true';
			redirect('web/'.$this->input->post('segment_name'));
		}else{
			$dataArray = array(
				'mobile_no' => $this->input->post('num'),
				'email' => $this->input->post('email'),
				'full_name' => $this->input->post('fname'),
				'class' => $this->input->post('degree'),
				'webinar_name' => $this->input->post('segment_name'),
				'registered_date'=>date('Y-m-d H:i:s')
			);
			$this->db->insert('students_webinar_registration',$dataArray);
			$_SESSION['user_added_allow_qr_and_link'] = 'true';
		}
		redirect('web/'.$this->input->post('segment_name'));
	}
}

public function getInvoice($username){
	return $this->db->join('student_registration','student_registration.student_username=invoice.student_id')->where('student_id',$username)->get('invoice')->row();
}

public function getbackbuttonredirection($id)
{
	$backUrl = base_url();
	$result=$this->db->where('child_uri',$id)->get('backbuttonredirection');
	if($result->num_rows() > 0 ){
		$backUrl = $result->row()->parent_uri;
	}

	return $backUrl;
}
public function get_count() 
{
	// return $this->db->count_all("student_registration");

	return $this->db->get("student_registration")->num_rows();

}


public function addResponse($id,$data)
{

	$this->db->set($data);
	$this->db->where('id',$id);
	$result=$this->db->update('contact_us');
	return $result;
}
public function getRenewRequests()
{

	
	$result=$this->db->select('r.*,registration.*')->from('redeem_request as r')->join('student_registration as registration','registration.student_username=r.student_username' )->where('redeem_option','Renew My Account For Next Year')->order_by('request_date','desc')->get();
	return $result;
}
public function getBankRedeemRequests()
{

	$result=$this->db->select('r.*,registration.*,bank.*')->from('redeem_request as r')->join('student_registration as registration','registration.student_username=r.student_username' )->join('bank_and_address_details as bank ','bank.student_username=r.student_username')->where('redeem_option','Redeem Amount To Bank')->order_by('request_date','desc')->get();
	return $result;
}
public function getRegisteredAccountRequests()
{

	$result=$this->db->select('r.*,registration.*')->from('redeem_request as r')->join('student_registration as registration','registration.student_username=r.student_username' )->where('redeem_option','Registered a new Account')->order_by('request_date','desc')->get();
	return $result;
	
	
}
public function verifyIsSubscriptionDateisExpired($id)
{
	return $this->db->where('student_username',$id)->where('subscription_validity_datetime<=',date('Y-m-d'))->get('student_registration');
}
public function solvedRedeemRequest()
{
	// print_r($id);exit();
	$sub_date=$this->input->post('subscription_registered_date');
	
  // echo "m";exit();
	if($this->input->post('eid'))
	{
		// print_r($this->input->post('eid'));exit();
		$sub_date=$this->input->post('subscription_registered_date');
		$currentDate=date('Y-m-d');
		$verify=$this->verifyIsSubscriptionDateisExpired($this->input->post('eid'));
		if($verify->num_rows()>0)
		{
		// print_r($this->input->post('eid'));exit();
// 			echo "package expired";
		$data=array
		(

			
			'subscription_validity_datetime'=>date('Y-m-d H:i:s', strtotime($currentDate. ' +1 year'))

		);
		$renewData=array
		(
			'student_username'=>$this->input->post('eid'),
			'renewal_date'=>date('Y-m-d'),
			'renewal_amount'=>499,
		);
		$renewDataResult=$this->db->insert('renewal_log',$renewData);
		// print_r($data);exit();
		$result=$this->db->set($data)->where('student_username',$this->input->post('eid'))->update('student_registration');
		}
		else
		{
			// echo "inside not expired";exit();
			$data=array
		(
			
			'subscription_validity_datetime'=>date('Y-m-d H:i:s', strtotime($sub_date. ' +1 year'))

		);
		
		// print_r($data);exit();
		$result=$this->db->set($data)->where('student_username',$this->input->post('eid'))->update('student_registration');

		}
		$updateRenew=array(
			'request_solved_status'=>1,
			'request_solved_date'=>date('Y-m-d'),
		);
		$renewResult=$this->db->set($updateRenew)->where('student_username',$this->input->post('eid'))->update('redeem_request');
     $this->session->set_flashdata("renew-success","congrats");
	 redirect('renew-requests');
	}
	else if($this->input->post('bid'))
	{
// 		echo "inside bank";exit();
		$updateRedeem=array(
			'request_solved_status'=>1,
			'request_solved_date'=>date('Y-m-d'),
		);
		$updateResult=$this->db->set($updateRedeem)->where('student_username',$this->input->post('bid'))->update('redeem_request');
		 $this->session->set_flashdata("renew-success","congrats");
	     redirect('bank-requests');
	}
	else if($this->input->post('rid'))
	{
	   
		// print_r($this->input->post('rid'));exit();
		$regdDate=date('Y-m-d');
		$manualAccount=array
		(
			'student_username'=>$this->input->post('registered_account_username'),
			'student_name'=>$this->input->post('registered_account_name'),
			'registered_mobile_no'=>$this->input->post('registered_account_mobile'),
			'registered_email'=>$this->input->post('registered_account_email'),
			'student_password_hashed'=>$this->input->post('student_password_hashed'),
			'registration_status'=>1,
			'amount'=>499.00,
			'registration_datetime'=>$regdDate,
			'subscription_validity_datetime'=>date('Y-m-d H:i:s', strtotime($regdDate. ' +1 year'))
		);

		$manualResult=$this->db->insert('student_registration',$manualAccount);
		if($manualAccount){
			$uniqueRefferal=$this->generateRandomString(12);
			$refferalCode=array(
				'student_username' =>$this->input->post('registered_account_username') , 
				'referral_code'=>$uniqueRefferal,
				'is_student_code'=>1,
				'referral_code_status'=>1,
			);
			$refferalCodeResult=$this->db->insert('referral_codes',$refferalCode);
			
			$updateRequest=array(
				'request_solved_status'=>1,
				'request_solved_date'=>date('Y-m-d'),
			);
			$requestResult=$this->db->set($updateRequest)->where('student_username',$this->input->post('rid'))->update('redeem_request');

		}
	     $this->session->set_flashdata("renew-success","congrats");
	    redirect('registered-account-request');	
	}

	
}
    public function checkMobile($mobile)
    {
        $result= $this->db->where('registered_mobile_no',$mobile)->where('registration_status',0)->get('student_registration_log');
        return $result;
    }
    public function renewalStudents()
	{
		return $this->db->join('student_registration','student_registration.student_username=renewal_log.student_username')->order_by('renewal_log.renewal_date','desc')->get('renewal_log')->result();
	}
	
	public function addmanualRegistrations()
	{

		    $CheckMobileNo=$this->checkMobile($this->input->post('mobile_number'));
		 
			if($CheckMobileNo->num_rows()>0)
			{

				$this->db->where('registered_mobile_no',$this->input->post('mobile_number'))->delete('student_registration_log');
	
			}
		
		$username=$this->generateRandomString(18);
		$subscriptiondate="";
		$regDate = date('Y-m-d H:i:s');
		if($this->input->post('subscription')== '1'){
			$subscriptiondate = date('Y-m-d H:i:s', strtotime($regDate. ' +1 Months'));
		}
		else if($this->input->post('subscription')== '3'){
			$subscriptiondate = date('Y-m-d H:i:s', strtotime($regDate. ' +3 Months'));
		}
		else if($this->input->post('subscription')== '6'){
			$subscriptiondate = date('Y-m-d H:i:s', strtotime($regDate. ' +6 Months'));
		}

		else{
			$subscriptiondate = date('Y-m-d H:i:s', strtotime($regDate. ' +1 year'));
		}
   // print_r($subscriptiondate) ;exit();
		$data=array
		(
			'student_username'              => $username,
			'student_name'              => $this->input->post('fullname'),
			'registered_email'                 => $this->input->post('email'),
			'student_password_hashed'       => $this->input->post('password'),
			'registered_mobile_no'             => $this->input->post('mobile_number'),
			'registration_datetime'         => $regDate,
			'subscription_validity_datetime'=> $subscriptiondate,
			'registration_status'           =>1,
			'amount'                        =>$this->input->post('amount'),
			'referral_code'                 =>$this->input->post('referral_code'),
			'registration_verified_datetime'=>$regDate,
		);
        //  print_r($data) ;
		
		$result=$this->db->insert('student_registration',$data);
		

		if($result)
 		{
			$uniqueRefferal=$this->generateRandomString(18);
			$refferalArray=array
			('student_username' =>$username , 
				'referral_code'=>$uniqueRefferal,
				'is_student_code'=>1,
				'referral_code_status'=>1,
			);
// 			print_r($refferalArray) ;
 			$refferalResult=$this->db->insert('referral_codes',$refferalArray);

			$invoiceid=$this->generateRandomString(8);
			$payment=$this->generateRandomString(6);
			$invoice=array(
				'invoice_id' =>'TGS'.date('Y').$invoiceid,
				'payment_id' => $this->input->post('payement_mode').$payment,
				'student_id' => $username,
				'amount'     => $this->input->post('amount'),
				'date'       => $regDate
			);
    // print_r($invoice) ;
			$invoice=$this->db->insert('invoice',$invoice);
			$refferalLogs = array
			(
				'referral_code' =>$this->input->post('referral_code'), 
				'registered_student_username'=>$username,
				
			);
// 			print_r($refferalLogs) ;exit;
 			$this->db->insert('referral_logs',$refferalLogs);
			
			
// 		}

	}
	redirect('manual');
	}
	
    public function getInfluencerRedeemRequests()
        {

	        $result=$this->db->select('r.*,influencer.*,bank.*')->from('influencer_redeem_request as r')->join('influencers` as influencer','influencer.influencer_username=r.influencer_username')->join('influencer_bank_details` as bank','bank.influencer_username=r.influencer_username' )->where('redeem_option','Redeem Amount To Bank')->order_by('request_date','desc')->get();
	        return $result;
        }
    public function solvedInfluencerRequest($id)
    {

	if($this->input->post('reqId'))
	{
		// echo "inside bank";exit();
		$updateRedeem=array(
			'request_solved_status'=>1,
			'request_solved_date'=>date('Y-m-d'),
			
		);
// 		print_r($id);exit;
		$updateResult=$this->db->set($updateRedeem)->where('influencer_request_id',$id)->update('influencer_redeem_request');
	}
	$this->session->set_flashdata("renew-success","congrats");
	redirect('influencer-request');
    }
    
    // Refferal Registration through Functions Start here
    public function getRefferalRegistration($code)
        {

	     return $this->db->join('student_registration','student_registration.student_username=referral_codes.student_username')->where('referral_codes.referral_code',$code)->where('is_student_code',1)->get('referral_codes');
        }
    public function getRefferalByInfluncerRegistration($influncer)
        {

        	return $this->db->join('influencers as influncer','influncer.influencer_username=referral_codes.influencer_username')->where('referral_codes.referral_code',$influncer)->where('is_influencer_code',1)->get('referral_codes');
        }

    public function getSalesDiscountCode($scode)
        {
        	return $this->db->distinct('sd.sales_username')->select('sd.sales_username,support_new_register.email')->from('sales_discount_code as sd')->join('support_new_register','support_new_register.support_id=sd.sales_username')->where('sd.discount_code',$scode)->get('sales_discount_code');
        }
    
    
    public function getFailedStudents(){
       $query =  $this->db->query('SELECT student_registration_log.student_name, student_registration_log.registered_email,student_registration_log.registered_mobile_no, student_registration_log.page_source, student_registration_log.registration_initiated_datetime FROM student_registration_log WHERE student_registration_log.student_username NOT in (SELECT student_registration.student_username FROM student_registration WHERE student_registration.subscription_validity_datetime >='.date("Y-m-d").')');
        return $query->result_array();
    }
    
    public function getWebinarRegisteredStudents(){
        return $this->db->select('full_name,email,mobile_no,webinar_name,registered_date')->get('students_webinar_registration')->result_array();
    }
    
    public function getPromotionRegisteredStudents(){
        return $this->db->select('student_name,registered_email,registered_mobile_no,source,registration_initiated_datetime')->get('promotion_register')->result_array();
    }
    
    public function getOldDBWebinarData(){
        $db2 = $this->load->database('old', TRUE);
        return $db2->select('full_name,email,mobile_no,webinar_name,created_date')->get('webinar_registrations')->result_array();
    }
    
    public function getAllRegisteredStudents(){
        return $this->db->select('student_name,registered_email,registered_mobile_no,registration_datetime,subscription_validity_datetime')->get('student_registration')->result_array();
    }
    
    public function getAllRegisteredActiveStudents(){
        return $this->db->select('student_name,registered_email,registered_mobile_no,registration_datetime,subscription_validity_datetime')->where('subscription_validity_datetime >=',date('Y-m-d'))->get('student_registration')->result_array();
    }
      public function getTotalRegister($states){
    
    	$this->db->select('student_registration.*')->from('student_registration')
    	->where('student_state',$states);
       $data = $this->db->get();
      // print_r($data);exit;
       return $data;
    }
       public function insertRole(){
    	if($this->input->post('name')){

    		$roleid=$this->generateRandomString(18);
        //   $get=$this->db->get('routes');
        //   if($get->num_rows()>0){

        //   	$gets=$get->result();

        //   	foreach($gets as $rows){

        //   		$access=array(
        //         'roleid'=>$roleid,
        //         'route_id'=>$rows->rt_id
        //   		);

        //   		$this->db->insert('access',$access);
        //   	}
        //   }
    		$data=array(
    			'roleid'=>$roleid,
                'role' =>$this->input->post('name') , 
    		);
    		$this->db->insert('role',$data);
    		redirect('roles');
    	}
    }
    public function getRole(){
    	$data=$this->db->get('role');
    	return $data;
    }
       public function updateRole(){
       //	print_r($this->input->post('id'));exit;
    	if($this->input->post('id')){

    		$data=array(
               'role' =>$this->input->post('ename') , 
    		);
    		$this->db->where('id',$this->input->post('id'));
    		$this->db->update('role',$data);
    		redirect('roles');
    	}
    }
    public function deleteRole(){
    	if($this->input->post('did')){
    	    //print_r($this->input->post('did'));exit;
    		$this->db->where('id',$this->input->post('did'))->delete('role');
    		redirect('roles');
    	}
    }
    public function changeUserPermissionStatus($route,$role,$updateUserPermission)
    {

        $this->db->set($updateUserPermission);
        $this->db->where('route_id',$route);
        $this->db->where('user_id',$role);
        $result=$this->db->update('user_access',$updateUserPermission);
        return $result;
    }
    public function getaccess($id,$rid){
        $data=$this->db->where('user_id',$id)->where('route_id',$rid)->get('user_access');
        if($data->num_rows()>0){
            $statusaccess=$data->row();
            $access=$statusaccess->status;
        }else{
            $statu=0;
            $access=$statu;
        }
        return $access;
    }
}?>