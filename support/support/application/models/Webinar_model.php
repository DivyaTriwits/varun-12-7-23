<?php

class Webinar_model extends CI_Model{

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
				'support_id' 	  => $regId,
				'name'			  => $this->input->post('firstname'),
				'email' 		  => $this->input->post('email'),
				'mobile'		  => $this->input->post('mobile'),
				'date_of_joining' => $this->input->post('date'),
				'password'		  => $this->input->post('password'),
				'role'            => $this->input->post('role')
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
				'name'				=> $this->input->post('efirstname'),
				'email' 			=> $this->input->post('eemail'),
				'mobile'			=> $this->input->post('emobile'),
				'date_of_joining'	=> $this->input->post('edate'),
				'role'          	=> $this->input->post('erole')
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
		$this->session->set_flashdata('webinar-success','webinar registration created successfully..');
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
		}
		// redirect('update-webinar-registration/'.$webinarid);


	}
	public function updateDetailsOfWebinar($webuniqueId,$linksId)
	{
		if($this->input->post('institutional_name'))
		{	
			$webinardata=array(
				'institutional_name'	=> $this->input->post('institutional_name'),
				'contact_number'		=> $this->input->post('contact_number'),
				'email'					=> $this->input->post('email'),
				'date'					=> $this->input->post('date'),
			);
			$webinarresult=$this->db->set($webinardata)->where('id',$webuniqueId)->update('webinar_registration');
			return $webinarresul;
			$generatedlinks=array(
				'institutional_name'	=> $this->input->post('institutional_name'),
				'webinar_name'			=> $this->input->post('webinar_name'),
				'link_type'				=> $this->input->post('link_type'),
			);
			$linksresult=$this->db->set($generatedlinks)->where('id',$linksId)->update('generate_links');
			return $linksresult;
		}
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


	public function getWebinarRegisteredStudentList()
	{
		$webinarName=$this->input->get('webinarList');
		if($webinarName !='' ){
		    $this->db->where('webinar_name',$webinarName);
		}
		$result = $this->db->get('students_webinar_registration');
		return $result;
		
// 		if($webinarName!='')
// 		{
// 			$result=$this->db->query("select * from students_webinar_registration join generate_links on generate_links.webinar_name=students_webinar_registration.webinar_name where students_webinar_registration.webinar_name='$webinarName' order by students_webinar_registration.table_id desc ");
// 			return $result;
// 		}
// 		else
// 		{
// 			$result=$this->db->query("select * from students_webinar_registration join generate_links on generate_links.webinar_name=students_webinar_registration.webinar_name order by students_webinar_registration.table_id desc ");
// 			return $result;
// 		}
	}

	public function getWebinarNameList()
	{
		$result=$this->db->query("select distinct webinar_name from students_webinar_registration ");
	
		return $result;

	}

	public function deleteWebinarLinkFromGenerateLinksTable($linkId)
	{

		$this->db->where('generate_links_id',$linkId);
		$verify=$this->db->get('links');
		if($verify->num_rows()>0)
		{
			return "continue";
		}
		else
		{
			$this->db->where('institutional_link_id',$linkId);
			$result=$this->db->delete('generate_links');
			return $result;
		}


		
	}
	public function deleteWebinarLinkFromLinksTable($linkTableId)
	{
		$this->db->where('links_id',$linkTableId);
		$result=$this->db->delete('links');
		return $result;

	}


	  public function getWebinarLinksByWebinarName($webinarName){
     


	  		$result=$this->db->query("select * from webinar_registration join generate_links on  generate_links.webinar_id=webinar_registration.webinar_uniqueid join links on links.generate_links_id=generate_links.institutional_link_id	

	  			where generate_links.webinar_name='$webinarName'


	  		  ");

		return $result;


    }

        //THIS FUNCTION IS USED TO STORE BULK STUDENT DETAILS OF CERTIFICATE'S
    public function storeStudents(){
            if($this->input->post('cid')){
            	//print_r($this->input->post('cid'));exit;
               
                $filename=$_FILES["files"]["tmp_name"];
               // print_r($filename);exit;
                if($_FILES["files"]["size"] > 0){
                    $index =1;
                    $file = fopen($filename, "r");
                    while (($importdata = fgetcsv($file, 10000, ",")) !== FALSE){
                        if($index == 1){
                            $index++;
                            continue;
                        }
                  // print_r(count($importdata));exit;
             $mobilecheck=$this->db->where('registered_mobile_no',$importdata[1])->get('student_registration');
                      if($mobilecheck->num_rows()>0){
                        $mobilenum=$mobilecheck->row();
                        
                        $productArray = array(  
                    'student_state'       => $importdata[2],
                
                        );
                     //print_r($mobilenum);exit;
                        $this->db->where('registered_mobile_no',$importdata[1]);
                        $this->db->update('student_registration',$productArray);
                      
                            //print_r($productArray);exit;
                        $index++;
                      }
                    }
                    fclose($file);
                    $this->session->set_flashdata('success', ' Added successfully..');
                     redirect('upload-student-data-for-certificate');
                }else{
                    $this->session->set_flashdata('failure', 'Something went wrong..');
                    redirect('upload-student-data-for-certificate');
                }
            }
        
    }




}?>