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

	public function newRegister(){
		if($this->input->post('firstname')){
        	// echo "njfhjf";exit;
			$regId = $this->generateRandomString(18);
			$data = array(
				'support_id' => $regId,
				'name'=>$this->input->post('firstname'),
				'email' => $this->input->post('email'),
				'mobile'=>$this->input->post('mobile'),
				'date_of_joining'=>$this->input->post('date'),
				'password'=>$this->input->post('password'),
				'role'          =>$this->input->post('role')
			);
            // print_r($data);exit;
			$this->db->insert('support_new_register', $data);
			$this->session->set_flashdata("success","Added successfully.");
			redirect('new_regsitration');
		}
	}
	public function getSaleRegisterData(){
		$this->db->select('*')->from('support_new_register');
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
				'role'          =>$this->input->post('erole')
			);
            // print_r($data);exit;
			$this->db->where('support_id',$this->input->post('sid'));
			$this->db->update('support_new_register', $data);
			$this->session->set_flashdata("success","Updated successfully.");
			redirect('new_regsitration');
		}
	}
	public function deleteData(){
		$this->db->where('support_id',$this->input->post('did'));
		$this->db->delete('support_new_register');
		$this->session->set_flashdata("success","Deleted successfully.");
		redirect('new_regsitration');
	}
	// Created By Asif This Function is used to add webinar registration

	public function add_webinar_registrations()
	{
		if($this->input->post('institutional_name'))
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
		$this->session->set_flashdata("success","webinar registration created successfully.");
		redirect('webinar-registrations');
	}
	public function getWebinarRegistrations()
	{
		$result=$this->db->get('webinar_registration')->result();
		return $result;
	}
	public function update_webinar_registration($id)
	{
		$result=$this->db->where('webinar_uniqueid',$id)->get('webinar_registration')->row();
		return $result;
	}

	public function generateLinksForEachInstitution($id)
	{

		if($this->input->post('institutional_name'))
		{	
			$webinarregistrationId=$this->input->post('webinarId');
			$instituionalId = rand(000000, 999999);
			$data=array(
				'institutional_link_id'	=> $instituionalId,
				'webinar_id'			=> $webinarregistrationId,
				'institutional_name'	=> $this->input->post('institutional_name'),
				'webinar_name'			=> $this->input->post('webinar_name'),
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
				$linkData['links_webinarid'] 	=	$webinarregistrationId;
				$linkData['generate_links_id '] = 	$instituionalId;
				$linkData['links'] = $links[$key];
				// print_r($linkData);exit();
				$result=$this->db->insert('links',$linkData);
				$this->session->set_flashdata('success', 'Your Link Generated Added');
				
			}

		}
		// redirect('generate-links/'.$id);
		redirect('webinar-registrations');
		

	}

	public function getGeneratedLinks($id)
	{
		
		$result=$this->db->join('generate_links','generate_links.institutional_link_id=links.generate_links_id')->where('links_webinarid',$id)->get('links')->row();
		// print_r($result);exit();
		return $result;
	}
	public function getGeneratedLinksinTable($id)
	{
		
		$result=$this->db->join('generate_links','generate_links.institutional_link_id=links.generate_links_id')->where('links_webinarid',$id)->get('links')->result();
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
			$result=$this->db->get('contact_us');

			return $result;
		}
		else if($callbackStatus=='notContacted')
		{
			$status=0;
			$this->db->where('status',$status);
			$result=$this->db->get('contact_us');

			return $result;
		}

		else
		{

			$status=0;
			$this->db->where('status',$status);
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


	public function  verifyUsername($username)
	{

		$this->db->where('email',$username)->where('role','Support');
		$result=$this->db->get('support_new_register');
		return $result;
	}

	public function setCookeToken($token,$username)
	{
		$this->db->set($token);
		$this->db->where('email',$username);
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
		$this->db->set($data);
		$this->db->where('email',$username);
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
	
	public function getRegisteredStudents()
	{
		$result=$this->db->where('registration_status','1')->get('student_registration')->result();
		return $result;
	}
		public function getFailedRegisteredStudents()
	{
		$result=$this->db->where('registration_status<>','1')->get('student_registration_log')->result();
		return $result;
	}
	public function getCourses()
    	{
    		$result=$this->db->get('courses');
    		return $result;
    	}

    	public function getStudentDetails($input){
    		return $this->db->where('registration_status',1)->group_start()->where('registered_mobile_no',$input)->or_where('registered_email',$input)->group_end()->get('student_registration');
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

}?>