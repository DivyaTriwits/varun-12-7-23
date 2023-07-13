<?php

class Scholarship_model extends CI_Model{

	public function generateRandomString($n) { 
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
		$randomString = '';
		for ($i = 0; $i < $n; $i++) { 
			$index = rand(0, strlen($characters) - 1); 
			$randomString .= $characters[$index]; 
		}
		return $randomString; 
	}
	
	
	public function addScholarship()
	{	
        $scholarshipID="";
		$scholarshipID=$this->generateRandomString(18);
// 		$cities=json_encode($this->input->post('cities'));
		if($this->input->post('scholarship_name'))
		{
		    
		   //print_r($this->input->post());exit;

			// print_r(json_encode($this->input->post('courses')));exit;
			$data=array

			( 	'scholarship_id'				=>$scholarshipID,
				//'scholarship_type'				=>$this->input->post('scholarship_type'),	
				'scholarship_name'				=>$this->input->post('scholarship_name'),
				'scholarship_link'				=>$this->input->post('scholarship_link'),
				'scholarship_description'		=>$this->input->post('scholarship_description'),
				'documents'		=>$this->input->post('scholarship_documents'),
				'courses'						=>json_encode($this->input->post('qualification')),
				//'current_class_or_degree'		=>json_encode($this->input->post('current_class_or_degree')),
				'display_courses'		=>json_encode($this->input->post('display_courses')),
				'is_cgpa_based'					=>$this->input->post('is_cgpa_based'),
				'cgpa_type'						=>$this->input->post('cgpa_type'),
				//'tenth_cgpa_or_percentage'		=>$this->input->post('tenth_cgpa_or_percentage'),
				//'twelfth_cgpa_or_percentage'	=>$this->input->post('twelfth_cgpa_or_percentage'),
				//'diploma_cgpa_or_percentage'	=>$this->input->post('diploma_cgpa_or_percentage'),
				//'domicile'						=>json_encode($this->input->post('domicile')),
				//'previous_year_cgpa_or_percentage'	=>$this->input->post('previous_year_cgpa_or_percentage'),
				//'cities'						=>json_encode($this->input->post('cities')),
				//'religion'						=>json_encode($this->input->post('religion')),
				//'category'						=>json_encode($this->input->post('category')),
				//'is_hosteller'					=>$this->input->post('is_hosteller'),
				//'gender'						=>json_encode($this->input->post('gender')),
				//'minimum_age'					=>$this->input->post('minimum_age'),
				//'maximum_age'					=>$this->input->post('maximum_age'),
				//'parent_occupation'				=>json_encode($this->input->post('parent_occupation')),
				'family_annual_income'			=>$this->input->post('family_annual_income'),
				//'talent'						=>$this->input->post('talent'),
				//'special_talent'				=>json_encode($this->input->post('special_talent')),
				//'disability_type'				=>json_encode($this->input->post('disability_type')),
				//'disability_percentage'			=>$this->input->post('disability_percentage'),
				//'is_for_orphans'				=>$this->input->post('is_for_orphans'),
				//'is_for_single_child'			=>$this->input->post('is_for_single_child'),
				//'is_for_single_girl_child'		=>$this->input->post('is_for_single_girl_child'),
				'application_start_date'		=>$this->input->post('application_start_date'),
				'application_end_date'			=>$this->input->post('application_end_date'),
				'scholarship_provider'			=>$this->input->post('scholarship_provider'),
				'scholarship_worth'				=>$this->input->post('scholarship_worth'),
				'benefits'						=>$this->input->post('benefits'),
				'scholarship_added_by'			=>$this->session->userdata('username'),		
				'scholarship_added_date'		=>date('y-m-d H:i:s'),
				'how_apply'		=>$this->input->post('how_to_apply'),
				'vedio_link'=>$this->input->post('video_link'),
				'seo_keywords'=>$this->input->post('seo_keyword'),
				'title_tag'=>$this->input->post('title_tag'),
				'title_description'=>$this->input->post('title_description'),
				'h_tags'=>$this->input->post('h_tags'),
			);
// 			print_r($data);exit();
			$result=$this->db->insert('scholarships',$data);
			
			if($this->input->post('attachment_type'))
			{
				$filename = '';
				if (!empty($_FILES['attachment_file']['name']))
				{
					
					$path = $_FILES['attachment_file']['name'];
					$newName = "student_attachment".".".pathinfo($path, PATHINFO_EXTENSION); 
			
					$config['upload_path'] = './upload/';
				
					$config['allowed_types'] = '*';
				
					$config['file_name'] = date('YmdHis')."_".$newName;
					$this->load->library('upload', $config);
					$this->upload->initialize($config);
					if (!$this->upload->do_upload('attachment_file'))
					{
						$error = array(
							'error' => $this->upload->display_errors()
						);
						$this->session->set_flashdata('error', 'Something went wrong. Please upload gif | jpg | png | pdf | doc file');
					}
					else
					{
						$data = $this->upload->data();
						$filename = $data['file_name'];
						
					}

					$file_upload_name= array(
						'scholarship_id'=>$scholarshipID,
						'attachment_type'=>$this->input->post('attachment_type'),
						'attachment_file'=>$filename,
						'attachment_text' =>$this->input->post('attachment_text'),
					);
			     //	print_r($file_upload_name);exit();
					$this->db->trans_start();
					$this->db->insert('scholarship_attachment',$file_upload_name);
					$this->db->trans_complete();
					
					if ($this->db->trans_status() === TRUE)
					{
						$this->session->set_flashdata('add-success','Feed back added successfully');
						redirect('scholarship-form');


					}
					else
					{
						$this->session->set_flashdata('add-failure','failed to add feed back');
						redirect('scholarship-form');
					}
					
				}
				else
				{
					$this->session->set_flashdata('add-failure','failed to add feed back');
					redirect('scholarship-form');
				}


			}

		}
		$this->session->set_flashdata("scholarship-add-success","Scholarship added successfully");
		redirect('scholarship-list');
	}
	public function view_scholarship()
	{
	   // 	$result=$this->db->where('status','1')->where('application_end_date >=',date('Y-m-d'))->order_by('scholarship_added_date','desc')->get('scholarships')->result
	   
		$result=$this->db->order_by('application_end_date','desc')->get('scholarships')->result();
		return $result;
	}
	public function live_Scholarship()
	{
	    	$result=$this->db->where('status','1')->where('application_end_date >=',date('Y-m-d'))->order_by('scholarship_added_date','desc')->get('scholarships')->result();
        // 		$result=$this->db->order_by('scholarship_added_date','desc')->get('scholarships')->result();
		return $result;
	}
	public function getScholarship($id)
	{
		$result=$this->db->where('scholarship_id',$id)->get('scholarships')->row();
		//print_r($result);exit;
		return $result;
	}
	public function updateScholarship($id)
	{	
	    
	   // $courses=json_encode($this->input->post('qualification'));
	    //print_r($this->input->post('seo_keyword'));exit;
		if($this->input->post('scholarship_name'))
		{
    //      $str_arr = preg_split ("/\,/", $this->input->post('seo_keyword')); 
    //      $cnt=count($str_arr);
			 //	 print_r($cnt);exit;
			$data=array
			( 
				'scholarship_type'					=>$this->input->post('scholarship_type'),	
				'scholarship_name'					=>$this->input->post('scholarship_name'),
				'scholarship_link'					=>$this->input->post('scholarship_link'),
				'scholarship_description'			=>$this->input->post('scholarship_description'),
				'courses'							=>json_encode($this->input->post('qualification')),
				'documents'		=>$this->input->post('scholarship_documents'),
				'current_class_or_degree'			=>json_encode($this->input->post('current_class_or_degree')),
				'display_courses'		=>json_encode($this->input->post('display_courses')),
				'is_cgpa_based'						=>$this->input->post('is_cgpa_based'),
				'cgpa_type'							=>$this->input->post('cgpa_type'),
				'tenth_cgpa_or_percentage'			=>$this->input->post('tenth_cgpa_or_percentage'),
				'twelfth_cgpa_or_percentage'		=>$this->input->post('twelfth_cgpa_or_percentage'),
				'diploma_cgpa_or_percentage'		=>$this->input->post('diploma_cgpa_or_percentage'),
				'previous_year_cgpa_or_percentage'	=>$this->input->post('previous_year_cgpa_or_percentage'),
				'domicile'							=>json_encode($this->input->post('domicile')),
				'cities'							=>json_encode($this->input->post('cities')),
				'religion'							=>json_encode($this->input->post('religion')),
				'category'							=>json_encode($this->input->post('category')),
				'is_hosteller'						=>$this->input->post('is_hosteller'),
				'gender'							=>json_encode($this->input->post('gender')),
				'minimum_age'						=>$this->input->post('minimum_age'),
				'maximum_age'						=>$this->input->post('maximum_age'),
				'parent_occupation'					=>json_encode($this->input->post('parent_occupation')),
				'family_annual_income'				=>$this->input->post('family_annual_income'),
				'talent'							=>$this->input->post('talent'),
				'special_talent'					=>json_encode($this->input->post('special_talent')),
				'disability_type'					=>json_encode($this->input->post('disability_type')),
				'disability_percentage'				=>$this->input->post('disability_percentage'),
				'is_for_orphans'					=>$this->input->post('is_for_orphans'),
				'is_for_single_child'				=>$this->input->post('is_for_single_child'),
				'is_for_single_girl_child'			=>$this->input->post('is_for_single_girl_child'),
				'application_start_date'			=>$this->input->post('application_start_date'),
				'application_end_date'				=>$this->input->post('application_end_date'),
				'scholarship_provider'				=>$this->input->post('scholarship_provider'),
				'scholarship_worth'					=>$this->input->post('scholarship_worth'),
				'benefits'							=>$this->input->post('benefits'),
				'scholarship_updated_by'			=>$this->session->userdata('username'),		
				'scholarship_updated_date'			=>date('y-m-d H:i:s'),
				'how_apply'		=>$this->input->post('how_to_apply'),
				'vedio_link'=>$this->input->post('video_link'),
				'seo_keywords'=>$this->input->post('seo_keyword'),
				'title_tag'=>$this->input->post('title_tag'),
				'title_description'=>$this->input->post('title_description'),
				'h_tags'=>$this->input->post('h_tags'),
			);
			 // print_r($data);exit();
			$result=$this->db->set($data)->where('scholarship_id',$id)->update('scholarships');
			if($this->input->post('attachment_type'))

			{
				$filename = '';
				if (!empty($_FILES['attachment_file']['name']))
				{
					
					$path = $_FILES['attachment_file']['name'];
					$newName = "student_attachment".".".pathinfo($path, PATHINFO_EXTENSION); 
				// exit;main_assets\document_list
					$config['upload_path'] = './upload/';
					//$config['allowed_types'] = 'image|gif|jpg|png|jpeg|JPG|PNG|JPEG|GIF';
					$config['allowed_types'] = '*';
					//$config['max_size'] = 10000;
					$config['file_name'] = date('YmdHis')."_".$newName;
					$this->load->library('upload', $config);
					$this->upload->initialize($config);
					if (!$this->upload->do_upload('attachment_file'))
					{
						$error = array(
							'error' => $this->upload->display_errors()
						);
						$this->session->set_flashdata('error', 'Something went wrong. Please upload gif | jpg | png | pdf | doc file');
					}
					else
					{
						$data = $this->upload->data();
						$filename = $data['file_name'];
						
					}

					$file_upload_name= array(
				// 		'scholarship_id'	=>$id,
						'attachment_type'	=>$this->input->post('attachment_type'),
						'attachment_file'	=>$filename,
						'attachment_text' 	=>$this->input->post('attachment_text'),
					);
					print_r($file_upload_name);exit();
					$this->db->trans_start();
				$this->db->set($file_upload_name)->where('scholarship_id',$id)->update('scholarship_attachment');
					$this->db->trans_complete();
					
					if ($this->db->trans_status() === TRUE)
					{
						$this->session->set_flashdata('update-success','Feed back added successfully');
						redirect('scholarship-list');


					}
					else
					{
						$this->session->set_flashdata('add-failure','failed to add feed back');
						redirect('scholarship-list');
					}
					
				}
				else
				{
					$this->session->set_flashdata('add-failure','failed to add feed back');
					redirect('scholarship-list');
				}


			}

		}
		$this->session->set_flashdata("scholarship-update-success","Scholarship added successfully");
		redirect('scholarship-list');
	}
    
    public function getscholarshipattachments($id)
    {   
            
        	$result=$this->db->where('scholarship_id',$id)->get('scholarship_attachment')->row();
        	return $result;
    }

	public function getStateList()
	{

		$result=$this->db->get('states');
		return $result;
	}
    public function deleteScholarshipPermanently($id)
	{
		$this->db->where('scholarship_id',$id);
		$this->db->delete('scholarships');
		$this->session->set_flashdata("delete-success","Deleted successfully.");
		redirect('scholarship-list');
	}

public function getStudentBasedonParticularMatchingScholarship($id)
	
	{

		// print_r($id);exit();
		// if($this->input->get('number')!='')
		

		$scholarshipData = $this->db->where('scholarship_id',$id)->get('scholarships')->row();
		$scholarshiptype = $scholarshipData->scholarship_type;
		$courses 		 = json_decode($scholarshipData->courses);
		$current_stream	 = json_decode($scholarshipData->current_class_or_degree);

		// print_r($courses);exit();
		$religion 		 = json_decode($scholarshipData->religion);
		$category 		 = json_decode($scholarshipData->category);
		$domicile 		 = json_decode($scholarshipData->domicile);
		$cities 		 = json_decode($scholarshipData->cities);
		$gender 		 = json_decode($scholarshipData->gender);
		$tenth 			 = $scholarshipData->tenth_cgpa_or_percentage;
		$twelfth 		 = $scholarshipData->twelfth_cgpa_or_percentage;
		$diploma 		 = $scholarshipData->diploma_cgpa_or_percentage;
		$previous_year 	 = $scholarshipData->previous_year_cgpa_or_percentage;
        $minimum_age     = $scholarshipData->minimum_age;
		$maximum_age     = $scholarshipData->maximum_age;
		$parentIncome    = $scholarshipData->maximum_age;
// 		$semester1=1;
// 		$semester2=2;
// 			print_r($scholarshiptype);exit;



		// if(in_array('All', $gender)){
		// 	echo "yes"; exit;

		$limit=$this->input->get('number');
	
		// }		
		$this->db->select('registration.*,personal.*,academic.*,family.*');
		$this->db->from('student_registration as registration');
		$this->db->join('student_academic_details as academic','academic.student_username=registration.student_username');
		// $this->db->join('sent_scholarships as sent','sent.student_username=registration.student_username');
		// $this->db->from('scholarships as scholar','scholar.courses=academic.current_stream');
		$this->db->join('student_personal_details as personal','personal.student_username=registration.student_username');
		$this->db->join('student_family_details as family','family.student_username=registration.student_username');
		$this->db->where('registration.registration_status','1');
// 		$this->db->where('registration.subscription_validity_datetime >=',date('Y-m-d'));
		if($scholarshiptype == 'Special Abled'){
			$this->db->where('personal.is_specially_abled','1');
		}



		if($scholarshiptype == 'All'){
			$this->db->where('registration.student_username NOT IN (SELECT student_username from sent_notifications where scholarship_id="'.$id.'")');
				//$this->db->limit($limit);
			$result=$this->db->get()->result();
			return $result;
		}

			// Filteration of Education Based

		if($scholarshiptype == 'Educational Based'){

			if(is_array($religion) && !in_array("All",$religion)){

				$this->db->group_start();
				foreach ($religion as $eachReligion) {
					$this->db->or_where('family.religion',$eachReligion);	
				}
				$this->db->group_end();
			}
			
		// Filteration of category
			if(is_array($category) && !in_array("All",$category)){
				$this->db->group_start();
				foreach ($category as $eachCategory) {
					$this->db->or_where('family.category',$eachCategory);	
				}
				$this->db->group_end();
			}	
		// Filteration of category
			if(is_array($courses) && !in_array("All",$courses)){
				$this->db->group_start();
				// $this->db->or_where('academic.qualification','Bachelor');
				foreach ($courses as $eachCourse) {
				    if($eachCourse == 'Bachelors'){
				        $this->db->or_where('academic.qualification','Bachelor');
				    }
				    if(($eachCourse == 'Diploma in Health')||($eachCourse == 'Diploma in Technical')){
				      $this->db->or_where('academic.qualification','Diploma');  
				    }
					$this->db->or_where('academic.qualification',$eachCourse);
				}
				$this->db->group_end();
		
			}

		    if(!empty(is_array($current_stream))&& !in_array("All",$current_stream))
			{
			$this->db->group_start();
			if(is_array($current_stream) && (in_array("B.Tech (All)",$current_stream)) || (in_array("B.E (All)",$current_stream))||(in_array("Bachelors (All)",$current_stream)) ||(in_array("Masters (All)",$current_stream))||(in_array("Diploma in Health (All)",$current_stream))||(in_array("Diploma in Technical (All)",$current_stream))||(in_array("PHD (All)",$current_stream))||(in_array("PG Diploma (All)",$current_stream)))
			{
				if(is_array($current_stream) && in_array("Bachelors (All)",$current_stream)){
				$this->db->or_like('academic.current_class_or_degree','Bachelor','after');
				}
				if(is_array($current_stream) && in_array("B.Tech (All)",$current_stream)){
				$this->db->or_like('academic.current_class_or_degree','B.Tech','after');
				}
				if(is_array($current_stream) && in_array("B.E (All)",$current_stream)){
					$this->db->or_like('academic.current_class_or_degree','B.E','after');	
				}
				if(is_array($current_stream) && in_array("Masters (All)",$current_stream)){
					$this->db->or_like('academic.current_class_or_degree','M','after');
				}
				if(is_array($current_stream) && in_array("Diploma in Health (All)",$current_stream)){
					$this->db->or_like('academic.current_class_or_degree','D.Health','after');
					$this->db->or_like('academic.current_class_or_degree','Diploma in Health','after');
					$this->db->or_like('academic.current_class_or_degree','Diploma In Pharmacy','after');
					$this->db->or_like('academic.current_class_or_degree','Diploma In Nursing','after');
					$this->db->or_like('academic.current_class_or_degree','Diploma In Dermatology','after');
					$this->db->or_like('academic.current_class_or_degree','Diploma In Ophthalmology','after');
					$this->db->or_like('academic.current_class_or_degree','Diploma In Ayurvedic','after');
					$this->db->or_like('academic.current_class_or_degree','Diploma In Dental','after');
				}
				if(is_array($current_stream) && in_array("Diploma in Technical (All)",$current_stream)){
					$this->db->or_like('academic.current_class_or_degree','D.Tech','after');
				// 	$this->db->or_like('academic.current_class_or_degree','Diploma in Technical','after');
				}
				if(is_array($current_stream) && in_array("PHD (All)",$current_stream)){
					$this->db->or_like('academic.current_class_or_degree','Ph.D','after');
					$this->db->or_like('academic.current_class_or_degree','Doctorate','after');
				}
				if(is_array($current_stream) && in_array("PG Diploma (All)",$current_stream)){
					$this->db->or_like('academic.current_class_or_degree','Post','after');
				}
			}
			if(is_array($current_stream)){
				foreach ($current_stream as $eachCurrentCourse) {
					$this->db->or_where('academic.current_class_or_degree',$eachCurrentCourse);
				}
			}
		
			$this->db->group_end();
			}
		

			
		// 	// Filteration of cities
			if(is_array($domicile) && !in_array("All",$domicile)){
				$this->db->group_start();
				foreach ($domicile as $eachDomicile) {
					$this->db->or_where('academic.student_studying_state',$eachDomicile);	
				}
				$this->db->group_end();
			}
			
			
			if(is_array($gender) && !in_array("All",$gender)){
				$this->db->group_start();
				foreach ($gender as $eachGender) {
					$this->db->or_where('personal.student_gender',$eachGender);
				}
				$this->db->group_end();
			}
// 			print_r($cities);exit;

// 			if((is_array($cities) && !in_array("All",$cities)) || (is_array($domicile) && !in_array("All",$domicile)) || !empty($cities) ){
// 				$this->db->group_start();
// 				foreach ($cities as $eachCities) {
// 					$this->db->or_where('academic.student_studying_district',$eachCities);
// 				}
// 				$this->db->group_end();
// 			}

// 			if($semester>1){
// 				$this->db->group_start();
// 				$this->db->or_where('academic.current_semester',$semester1);	
// 				$this->db->group_end();
// 			}
// 			if($semester>2){
// 				$this->db->group_start();
// 				$this->db->or_where('academic.current_semester',$semester2);	
// 				$this->db->group_end();
// 			}

			if($tenth>0){
				$this->db->group_start();
				$this->db->or_where('academic.tenth_cgpa_or_percentage >=',$tenth);	
				$this->db->group_end();
			}
			
			if($twelfth>0||$diploma>0){
			$this->db->group_start();
			if($twelfth>0){
				$this->db->or_group_start();

				$this->db->where('academic.twelfth_cgpa_or_percentage >',0);
				$this->db->where('academic.twelfth_cgpa_or_percentage >=',$twelfth);

				$this->db->group_end();
			}

			if($diploma>0){
				$this->db->or_group_start();
				$this->db->where('academic.diploma_cgpa_or_percentage >',0);
				$this->db->group_start();
				$this->db->where('academic.diploma_cgpa_or_percentage >=',$diploma);
				$this->db->group_end();		

				$this->db->group_end();
			}
			$this->db->group_end();
			}
			// Filteration of previous_year
			if($previous_year>0){
				$this->db->group_start();

				$this->db->or_where('academic.previous_year_result >=',$previous_year);	

				$this->db->group_end();	
			}
			
// 			$this->db->group_start();

// 				$this->db->or_where('academic.current_semester =',1);	

// 				$this->db->group_end();
				

			$this->db->where('registration.student_username NOT IN (SELECT student_username from sent_notifications where scholarship_id="'.$id.'")');
				//$this->db->limit($limit);

			$result=$this->db->get()->result();
// 			print_r($this->db->last_query());exit;
			return $result;
		}
		// Educational Based Filteration End

			// Talent Based Filteration Start
		if($scholarshiptype == 'Talent Based'){
		    
		    	if(is_array($courses) && !in_array("All",$courses)){
				$this->db->group_start();
				foreach ($courses as $eachCourse) {
				    if($eachCourse == 'Bachelors'){
				        $this->db->or_where('academic.qualification','Bachelor');
				    }
					$this->db->or_where('academic.qualification',$eachCourse);
				}
				$this->db->group_end();
		
			}
				if(is_array($domicile) && !in_array("All",$domicile)){
				$this->db->group_start();
				foreach ($domicile as $eachDomicile) {
					$this->db->or_where('academic.student_studying_state',$eachDomicile);	
				}
				$this->db->group_end();
			}
			
			
			if(is_array($gender) && !in_array("All",$gender)){
				$this->db->group_start();
				foreach ($gender as $eachGender) {
					$this->db->or_where('personal.student_gender',$eachGender);
				}
				$this->db->group_end();
			}
			

// 			if(is_array($cities) && !in_array("All",$cities)){
// 				$this->db->group_start();
// 				foreach ($cities as $eachCities) {
// 					$this->db->or_where('academic.student_studying_district',$eachCities);
// 				}
// 				$this->db->group_end();
// 			}
			if($minimum_age>0||$maximum_age>0){
				$this->db->group_start();
				$this->db->or_where("personal.age BETWEEN $minimum_age AND $maximum_age");	
				$this->db->group_end();
			}

			if(($tenth!='')||($tenth>0))
			{
			   
				$this->db->group_start();
				$this->db->or_where('academic.tenth_cgpa_or_percentage >=',$tenth);	
				$this->db->group_end();
			}
			
			if($twelfth>0||$diploma>0){
			$this->db->group_start();
			if($twelfth>0){
				$this->db->or_group_start();

				$this->db->where('academic.twelfth_cgpa_or_percentage >',0);
				$this->db->where('academic.twelfth_cgpa_or_percentage >=',$twelfth);

				$this->db->group_end();
			}
    
			if($diploma>0){
				$this->db->or_group_start();
				$this->db->where('academic.diploma_cgpa_or_percentage >',0);
				$this->db->group_start();
				$this->db->where('academic.diploma_cgpa_or_percentage >=',$diploma);
				$this->db->group_end();		

				$this->db->group_end();
			}
			$this->db->group_end();
			}
			// Filteration of previous_year
			if(($previous_year!='')||($previous_year>0)){
				$this->db->group_start();

				$this->db->or_where('academic.previous_year_result >=',$previous_year);	

				$this->db->group_end();	
			}

			$this->db->where('registration.student_username NOT IN (SELECT student_username from sent_notifications where scholarship_id="'.$id.'")');
			$result=$this->db->get()->result();

// 			print_r($this->db->last_query());exit;
			return $result;
		}

		// Talent Based Filteration END
		if($scholarshiptype == 'Special Abled'){

			// Filteration of cities
			if(!in_array("All",$domicile)){
				$this->db->group_start();
				foreach ($domicile as $eachDomicile) {
					$this->db->or_where('academic.student_studying_state',$eachDomicile);	
				}
				$this->db->group_end();
			}
			if(!in_array("All",$gender)){
				$this->db->group_start();
				foreach ($gender as $eachGender) {
					$this->db->or_where('personal.student_gender',$eachGender);
				}
				$this->db->group_end();
			}	

			if(!in_array("All",$cities)){
				$this->db->group_start();
				foreach ($cities as $eachCities) {
					$this->db->or_where('academic.student_studying_district',$eachCities);
				}
				$this->db->group_end();
			}

			if($tenth>0){
				$this->db->group_start();
				$this->db->or_where('academic.tenth_cgpa_or_percentage >=',$tenth);	
				$this->db->group_end();
			}
				
				
			if($twelfth>0||$diploma>0){
			$this->db->group_start();
			if($twelfth>0){
				$this->db->or_group_start();

				$this->db->where('academic.twelfth_cgpa_or_percentage >',0);
				$this->db->where('academic.twelfth_cgpa_or_percentage >=',$twelfth);

				$this->db->group_end();
			}

			if($diploma>0){
				$this->db->or_group_start();
				$this->db->where('academic.diploma_cgpa_or_percentage >',0);
				$this->db->group_start();
				$this->db->where('academic.diploma_cgpa_or_percentage >=',$diploma);
				$this->db->group_end();		

				$this->db->group_end();
			}
			$this->db->group_end();
			}
			// Filteration of previous_year
			if($previous_year>0){
				$this->db->group_start();

				$this->db->or_where('academic.previous_year_result >=',$previous_year);	

				$this->db->group_end();	
			}


			$this->db->where('registration.student_username NOT IN (SELECT student_username from sent_notifications where scholarship_id="'.$id.'")');
				//$this->db->limit($limit);
			$result=$this->db->get()->result();
				// print_r($this->db->last_query());exit;
			return $result;
		}
	}
	public function getDisabilityType()
	{
		$result=$this->db->get('disability_type');
		return $result;


	}
	public function student_activity()
	{

		$result=$this->db->get('student_activity');

		return $result;

	}



	public function sendScholarship($id)
	{	
	   // print_r($id);exit;
		if($this->input->post('student_username'))
		{
		    
			$student_username=$this->input->post('student_username');
			// $limit=$this->input->post('numberId');
			// print_r($links);exit();
			$data = array();
			$mobileNumbers = '';
			foreach ($student_username as $stud) {
				if($stud == ''){
					continue;
				}
				$getStudentData = $this->db->where('student_username',$stud)->get('student_registration')->row();
				$instituteId = $getStudentData->student_institute_userid;
				$getMobileNumber = $getStudentData->registered_mobile_no;
				// print_r($webinarregistrationId);ex
				$updateArray = array(
					'scholarship_id'=>$id,
					'student_username' => $stud,
					'month'=>date('Y-m'),
					'date_time'=>date('Y-m-d H:i:s'),
					'ins_added_by'=> $instituteId
				);
				$data[]=$updateArray;
				
				if($getStudentData->subscription_validity_datetime >= date('Y-m-d')){
				    $mobileNumbers .= $getMobileNumber.',';
				}
			}
			$mobileNumbers .= '8660044962';
			
			if(!empty($data)){
			    
			 //   Hey! Here's a new scholarship for you, please click on the link https://www.theglobalscholarship.org/redirect-me-to/{#var#} Good luck-TGS
			    $message = "Hey! Here's a new scholarship for you, please click on the link".HOME_PATH."redirect-me-to/".$id." Good luck-TGS";
			   
			    $this->db->insert_batch('sent_notifications',$data);
			    $this->send_sms($mobileNumbers, $message,SCHOLARSHIP_SENT_SMS_TEMPLATE_ID);
			}
			
			 
// 			if($this->db->insert_batch('sent_notifications',$data)){
// 				$row = array();
// 				$scholar=$this->db->where('scholarship_id',$id)->get('scholarships')->row();
// 				foreach ($student_username as $stud) {
// 					$pushNotification = array(
// 						'student_id'=>$stud,
// 						'scholaship_id'=>$id,
// 						'link'=>$scholar->scholarship_link,
// 						'datetime'=> date('y-m-d H:i:s'),
// 						'read_status'=>1,
// 						'date'=>date('y-m-d H:i:s')
// 					);
// 					$row[]=$pushNotification;
// 				}

// 				$this->db->insert_batch('push_notification',$row);
// 			}

            $this->session->set_flashdata("push-success","Push successfully.");
            //  print_r($this->db->last_query());exit();
			redirect('push-scholarship/'.$id);
		}
			// print_r($updateArray);exit();
		
		else
		{
			redirect('push-scholarship/'.$id);
		}
	}

	public function getSpecialTalentList($talentType)
	{

		$this->db->where('student_activity_type_id',$talentType);
		$result=$this->db->get('student_activity_name');
		return $result;
	}
	public function getCities()
	{
		$result=$this->db->get('cities');
		return $result;
	}
	public function getCourse()
	{

		$result=$this->db->query("select * from  courses order by id asc");
  // $this->db->select('*')->from('courses')->get()->result();
  // print_r($result);exit()
  // $result=$this->db->get('states');
		return $result;
	}
	public function getParticularCourse($id)
	{
	   // print_r($id);exit;
		$this->db->select('*')->from('course_particulars')->join('courses','courses.id = course_particulars.course_id');
		
		if(isset($id) && !empty($id) ){
		    foreach($id as $eachCourse){
		        if($eachCourse != 'All'){
		            $this->db->or_where('courses.course_name',$eachCourse);
		        }
		    
		}
		}
		
		$result = $this->db->get();
		return $result;

	}
	
	public function getParticularCities($id)
	{
	   // print_r($id);exit;
		$this->db->select('*')->from('cities')->join('states','states.id = cities.state_id');
		
		if(isset($id) && !empty($id) ){
			foreach($id as $eachState){
				if($eachState != 'All'){
					$this->db->or_where('states.name',$eachState);
				}
				
			}
		}
		
		$result = $this->db->get();
		return $result;

	}
	
	
	
	
	public function getParticularCourseName()
	{

  // print_r("in");exit;

   // $result=$this->db->query("select * from course_particulars where course_id='$id' order by particular_name asc ");
		$result=$this->db->get('course_particulars');
  // $this->db->where('state_id',$id);
  // $result=$this->db->get('cities');
		return $result;

	}

	public function getInstitutionList()
	{

		$result=$this->db->get('institute_registration');
		return $result;

	}
	public function addInstitutionalScholarshipDetails($data)
	{
		$result=$this->db->insert('institution_scholarship',$data);
		return $result;

	}
	public function addInstitutionalDetails($institutionDetails)
	{
		$result=$this->db->insert_batch('send_institution_scholarship',$institutionDetails);
		return $result;

	}
	public function addScholarshipDocuments($scholarshipFiles)
	{
		$result=$this->db->insert_batch('multiple_file_institute_scholarship',$scholarshipFiles);
		return $result;
	}

	public function getInstitutionScholarshipDetails()
	{
		$institutionId=$this->input->get('institutionId');
		
		if($institutionId!='')
		{
			$status=0;
			$result=$this->db->query("select * from institution_scholarship join send_institution_scholarship on institution_scholarship.scholarship_id=send_institution_scholarship.scholarship_reference_id
				join institute_registration on send_institution_scholarship.institution_id= institute_registration.institute_userid 
				where institution_scholarship.scholarship_status='$status' and send_institution_scholarship.institution_id='$institutionId' order by institution_scholarship.last_date asc

				");
			return $result;

		}
		else
		{

			$status=0;
			$result=$this->db->query("select * from institution_scholarship join send_institution_scholarship on institution_scholarship.scholarship_id=send_institution_scholarship.scholarship_reference_id
				join institute_registration on send_institution_scholarship.institution_id= institute_registration.institute_userid 
				where institution_scholarship.scholarship_status='$status' order by institution_scholarship.last_date asc

				");
			return $result;
		}


	}

	public function getScholarshipBasedOnScholarshipId($id)
	{
		$status=0;
		$result=$this->db->query("select * from institution_scholarship join send_institution_scholarship on institution_scholarship.scholarship_id=send_institution_scholarship.scholarship_reference_id
			join institute_registration on send_institution_scholarship.institution_id= institute_registration.institute_userid 
			where institution_scholarship.scholarship_status='$status' and institution_scholarship.scholarship_id='$id'

			");
		return $result;

	}

	public function getDocumentsBasedOnScholarshipId($id)
	{

		$status=0;
		$result=$this->db->query("select * from institution_scholarship join send_institution_scholarship on institution_scholarship.scholarship_id=send_institution_scholarship.scholarship_reference_id
			join multiple_file_institute_scholarship on institution_scholarship.scholarship_id=multiple_file_institute_scholarship.	scholarship_refer_id
			join institute_registration on send_institution_scholarship.institution_id= institute_registration.institute_userid 
			where institution_scholarship.scholarship_status='$status' and institution_scholarship.scholarship_id='$id'

			");
		return $result;
	}

	public function updateInstitutionalScholarshipDetails($scholarshipId,$data)
	{

		$this->db->set($data);
		$this->db->where('scholarship_id',$scholarshipId);
		$result=$this->db->update('institution_scholarship',$data);
		return $result;

	}

	public function UpdateInstitutionalDetails($scholarshipId,$data2)
	{
		$this->db->set($data2);
		$this->db->where('scholarship_reference_id',$scholarshipId);
		$result=$this->db->update('send_institution_scholarship',$data2);
		return $result;
	}

	public function updateScholarshipDocument($scholarshipAttachmentFile,$scholarshipId,$oldFileName,$fileId)
	{
		$path='./attachment_files/institution_scholarship_files/'.$oldFileName;
		@unlink($path);

		$this->db->set($scholarshipAttachmentFile);
		$this->db->where('file_id',$fileId);
		$this->db->where('scholarship_refer_id',$scholarshipId);
		$result=$this->db->update('multiple_file_institute_scholarship',$scholarshipAttachmentFile);
		return $result;

	}
	// public function()
	// {
	// 	$this->db->select('*')
	// 	->from('sent_notifications')
	// 	->where('')
	// }
	public function studentWhoNotGotScholarshipInMonth()
	{
		
	    $result = $this->db->query("select distinct sent_notifications.student_username, student_registration.student_name,student_registration.course_name,student_registration.registered_mobile_no ,count(sent_notifications.scholarship_id)
			from sent_notifications
			join student_registration ON student_registration.student_username = sent_notifications.student_username
			where sent_notifications.month = date('Y-m') and
			student_registration.subscription_validity_datetime >= date('Y-m-d')
			group by sent_notifications.student_username,student_registration.student_name,student_registration.course_name,student_registration.registered_mobile_no 
			having count(sent_notifications.scholarship_id) < 3");
		return $result->result();

    
    
//         	$result = $this->db->query("select distinct sent_notifications.student_username, student_registration.* , count(sent_notifications.scholarship_id)
// 			from sent_notifications
// 			join student_registration ON student_registration.student_username = sent_notifications.student_username
// 			where sent_notifications.month = date('Y-m') and
// 			student_registration.subscription_validity_datetime >= date('Y-m-d')
// 			group by sent_notifications.student_username 
// 			having count(sent_notifications.scholarship_id) < 3");
// 		return $result->result();




		// $result=$this->db->get()->result();
		// return $result;

		// $result=$this->db->query("SELECT DISTINCT sent_notifications.student_username, student_registration.* , count(sent_notifications.scholarship_id) 'Number of scholarships sent',FROM sent_notifications,
		// JOIN student_registration ON student_registration.student_username = sent_notifications.student_username,
		// WHERE sent_notifications.month = date('Y-m')
		// AND
		// student_registration.subscription_validity_datetime >= date('y-m-d')
		// GROUP BY sent_notifications.student_username 
		// HAVING count(sent_notifications.scholarship_id) < 3");
		// $result=$this->db->get()->result();
		// return $result;
	}
	
	
	
	
	public function send_sms($mobileNumberArray,$messageToSend,$tempId){
            // print_r('in sms function');exit;
            $username = '9620030302';
            $hash = 'G6bdgLBhH';
            $sender = urlencode('TRITGS');
            $message = rawurlencode($messageToSend);

            $numbers = $mobileNumberArray;
            
            // Prepare data for POST request
            $data = array('username' => $username, 'password' => $hash, 'to' => $numbers, "from" => $sender, "msg" => $message,"type" => "1","template_id" => $tempId);
            
            // Send the POST request with cURL
            $ch = curl_init('https://sms.office24by7.com/API/sms.php');
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);
            curl_close($ch);
            //print_r($response);exit;
            // Process your response here
            return $response;
        }
	    public function CountReceviedScholarshipNotifications($id)
	{
		return $this->db->where('scholarship_id',$id)->get('sent_notifications')->num_rows();
	}
	
	//FUNCTION USED TO CHANGE WEBSITE VISISBLE STATUS
      public function approved($scholarid,$status){
        $this->db->set('web_status',$status);
        $this->db->where('scholarship_id',$scholarid);
        $this->db->update('scholarships');
        $this->session->set_flashdata('success','Website visibility status changed successfully');
        redirect('scholarship-list');
      }


}
?>