<?php
class Scholarship_controller extends CI_Controller {
    public function __construct() {
        parent::__construct();
        date_default_timezone_set("Asia/Calcutta");
    }
    public function scholarshipPage() {
        $this->load->view('support/header');
        $this->load->view('support/scholarship/scholarship');
        $this->load->view('support/footer');
    }
    public function liveScholarships() {
        $this->load->view('support/header');
        $data['getscholarships'] = $this->Scholarship_model->live_Scholarship();
        $this->load->view('support/scholarship/live_scholarships', $data);
        $this->load->view('support/footer');
    }
    public function pushScholarship() {
        $this->load->view('support/header');
        $data['getStudents']     = $this->Scholarship_model->getStudentBasedonParticularMatchingScholarship($this->uri->segment(2));
        $data['getscholarships'] = $this->Scholarship_model->view_scholarship();
        $this->load->view('support/scholarship/push_scholarship', $data);
        $this->load->view('support/footer');
    }
    public function addScholarship() {
        // print_r("in");exit();
        $this->Scholarship_model->addScholarship();
        redirect('scholarship-form');
    }
    public function scholarshipForm() {
        $this->load->view('support/header');
        $data['getparentoccupation'] = $this->Support_model->getParentsOccupation();
        $data['getCities']           = $this->Scholarship_model->getCities();
        $data['states']              = $this->Scholarship_model->getStateList();
        $data['getDisabilityType']   = $this->Scholarship_model->getDisabilityType();
        $data['talentIn']            = $this->Scholarship_model->student_activity();
        $data['getCourse']           = $this->Scholarship_model->getCourse();
        $data['getParticularCourse'] = $this->Scholarship_model->getParticularCourseName();
        $this->load->view('support/scholarship/add_scholarship', $data);
        $this->load->view('support/footer');
    }
    public function viewScholarship() {
        $this->load->view('support/header');
        $data['getscholarships'] = $this->Scholarship_model->view_scholarship();
        $this->load->view('support/scholarship/view_scholarship', $data);
        $this->load->view('support/footer');
    }
    public function updateScholarship() {
        $this->load->view('support/header');
        $data['getscholarships']        = $this->Scholarship_model->getScholarship($this->uri->segment(2));
        $data['getparentoccupation']    = $this->Support_model->getParentsOccupation();
        $data['getCities']              = $this->Scholarship_model->getCities();
        // $data['getDisabilityType']      = $this->Scholarship_model->getDisabilityType();
        $data['getdisabilitytype']      = $this->Support_model->getDisabilityTypes();
        $data['states']                 = $this->Scholarship_model->getStateList();
        $data['talentIn']               = $this->Scholarship_model->student_activity();
        $data['getCourse']              = $this->Scholarship_model->getCourse();
        $data['getParticularCourse']    = $this->Scholarship_model->getParticularCourseName();
        $data['getscholarshipattachments']= $this->Scholarship_model->getscholarshipattachments($this->uri->segment(2));
        $this->load->view('support/scholarship/update_scholarship', $data);
        $this->load->view('support/footer');
    }
    public function editScholarship() {
        $this->Scholarship_model->updateScholarship($this->input->post('scholarshipId'));
    }
    public function deleteScholarship() {
        // echo "Asif";exit();
        // print_r($this->input->post('did'));exit();
        if ($this->db->set('status', '0')->where('id', $this->input->post('did'))->update('scholarships')) {
            $this->session->set_flashdata('delete-success', 'Deleted successfully..');
            redirect('scholarship-list');
        }
    }
     public function deleteScholarshipPermanently() {
        // echo "Asif";exit();
        // print_r($this->input->post('did'));exit();
    //   if (!$this->session->userdata('username')) redirect('support-login');
        $this->Scholarship_model->deleteScholarshipPermanently($this->input->post('pdid'));
        }
    public function viewMoreScholarship() 
    {
        $this->load->view('support/header');

        $data['getscholarships']     = $this->Scholarship_model->getScholarship($this->uri->segment(2));
        $data['getparentoccupation'] = $this->Support_model->getParentsOccupation();
        $data['getCities']           = $this->Scholarship_model->getCities();
        $data['getdisabilitytype']   = $this->Support_model->getDisabilityTypes();
        $data['states']              = $this->Scholarship_model->getStateList();
        $data['talentIn']            = $this->Scholarship_model->student_activity();
        $data['getCourse']           = $this->Scholarship_model->getCourse();
        $data['getParticularCourse'] = $this->Scholarship_model->getParticularCourseName();
        $data['getscholarshipattachments']= $this->Scholarship_model->getscholarshipattachments($this->uri->segment(2));
        
        $this->load->view('support/scholarship/view_more_scholarship', $data);
        $this->load->view('support/footer');
    }
    public function sendScholarship($id) {
        $this->Scholarship_model->sendScholarship($id);
    }
    public function getSpecialTalentList() {
        $talentType = $this->input->post('id');
        $data = $this->Scholarship_model->getSpecialTalentList($talentType)->result();
        echo json_encode($data);
    }
    public function getParticularCourse() {
        $id = $this->input->post('id');
        $data = $this->Scholarship_model->getParticularCourse($id)->result();
        // print_r($data);exit();
        echo json_encode($data);
    }
    
    public function getParticularCities() {
        $id = $this->input->post('id');
        $data = $this->Scholarship_model->getParticularCities($id)->result();
        // print_r($data);exit();
        echo json_encode($data);
    }

    public function institutionScholarshipForm()
    {
        $this->load->view('support/header');

        $data['institutionDetails']     = $this->Scholarship_model->getInstitutionList();  
        $this->load->view('support/scholarship/add_institution_scholarship', $data);
        $this->load->view('support/footer');

    }


    public function addInstitutionalScholarship()
    {   
        $studentId=$this->Scholarship_model->generateRandomString(18);
        $institutionIDs=$this->input->post('institutionId');

        $institutionDetails=array();
        $scholarshipFiles=array();



        $data=array(
        'scholarship_id'=>$studentId,
        'scholarship_name'=>$this->input->post('scholarship_name'),
        'website_link'=>$this->input->post('scholarship_link'),
        'start_date'=>$this->input->post('application_start_date'),
        'last_date'=>$this->input->post('application_end_date'),
        'criteria'=>ucfirst($this->input->post('criteria')),
        'scholarship_status'=>0,
        'created_date'=>date('Y-m-d H:i:s')

        );

        foreach($institutionIDs as $id)
        {
            $data2=array(
            'scholarship_reference_id'=>$studentId,
            'institution_id'=>$id


                );

            array_push($institutionDetails, $data2);


        }

            // If file upload form submitted
            if ($_FILES['scholarship_document']['name'][0] != '') {
                $filesCount = count($_FILES['scholarship_document']['name']);
               
                for ($i = 0;$i < $filesCount;$i++) {
                    $path = $_FILES['scholarship_document']['name'][$i];
                    $newName = "scholarship" . "." . pathinfo($path, PATHINFO_EXTENSION);
                    $_FILES['file']['name'] = date('Ymdhis') . "_" . $newName;
                    $_FILES['file']['type'] = $_FILES['scholarship_document']['type'][$i];
                    $_FILES['file']['tmp_name'] = $_FILES['scholarship_document']['tmp_name'][$i];
                    $_FILES['file']['error'] = $_FILES['scholarship_document']['error'][$i];
                    $_FILES['file']['size'] = $_FILES['scholarship_document']['size'][$i];
                    // File upload configuration
                    $uploadPath = './attachment_files/institution_scholarship_files/';
                    $config['upload_path'] = $uploadPath;
                    $config['allowed_types'] = '*';
                    // $config['max_width']        = 950;
                    // $config['max_height']       = 450;
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                  
                    if ($this->upload->do_upload('file')) {
                        // Uploaded file data
                        $fileData = $this->upload->data();
                        $uploadData[$i]['file_name'] = $fileData['file_name'];
                        $data3 = array('scholarship_refer_id' => $studentId, 'file' => $uploadData[$i]['file_name'], );
                        array_push($scholarshipFiles,$data3);
                        // $this->db->insert('slider_images', $sliderImages);
                    } else {
                       
                        //print_r($this->upload->display_errors());
                        $this->session->set_flashdata('failure', 'Something went wrong, please check image resolutions & extensions.');
                        redirect('institution-scholarship');
                    }
                }
                        $this->db->trans_start();
                        
                        $this->Scholarship_model->addInstitutionalScholarshipDetails($data);
                        $this->Scholarship_model->addInstitutionalDetails($institutionDetails);
                        $this->Scholarship_model->addScholarshipDocuments($scholarshipFiles);

                        $this->db->trans_complete();

                        if ($this->db->trans_status() === FALSE)
                        {
                             $this->session->set_flashdata('institution-scholarship-add-failure', 'failed to add institution scholarship details ');
                            redirect('institution-scholarship');    
                        }
                        else
                        {
                            $this->session->set_flashdata('institution-scholarship-add-success', 'institution scholarship details added successfully');
                             redirect('view-institution-scholarship-list');   
                        }

            }
            else
            {       
                        
                        $this->db->trans_start();
                        
                        $this->Scholarship_model->addInstitutionalScholarshipDetails($data);
                        $this->Scholarship_model->addInstitutionalDetails($institutionDetails);
                        $this->db->trans_complete();

                        if ($this->db->trans_status() === FALSE)
                        {
                             $this->session->set_flashdata('institution-scholarship-add-failure', 'failed to add institution scholarship details ');
                            redirect('institution-scholarship');    
                        }
                        else
                        {
                            $this->session->set_flashdata('institution-scholarship-add-success', 'institution scholarship details added successfully');
                            redirect('view-institution-scholarship-list');  
                        }
            }




         

    }


    public function viewInstitutionScholarshipList()
    {
        $this->load->view('support/header');
        $data['institutionDetails']  = $this->Scholarship_model->getInstitutionList();  
        $data['scholarshipDetails'] =  $this->Scholarship_model->getInstitutionScholarshipDetails();
        $this->load->view('support/scholarship/view_institution_scholarship', $data);
        $this->load->view('support/footer');
    }

    public function viewInstituteScholarshipDetails($id)
    {
        if (!$this->session->userdata('username')) redirect('support-login');
        $this->load->view('support/header');
        $data['scholarshipDetails'] = $this->Scholarship_model->getScholarshipBasedOnScholarshipId($id)->row();
        $data['document'] = $this->Scholarship_model->getDocumentsBasedOnScholarshipId($id);
        $this->load->view('support/scholarship/complete_scholarship_details', $data);
        $this->load->view('support/footer');
    }

    public function editInstitutionSchloarshipDetails($id)
    {
         if (!$this->session->userdata('username')) redirect('support-login');
        $this->load->view('support/header');
         $data['institutionDetails']  = $this->Scholarship_model->getInstitutionList();  
        $data['scholarshipDetails'] = $this->Scholarship_model->getScholarshipBasedOnScholarshipId($id)->row();
        $data['document'] = $this->Scholarship_model->getDocumentsBasedOnScholarshipId($id);
        $this->load->view('support/scholarship/edit_insttition_scholarship', $data);
        $this->load->view('support/footer');
    }


    public function updateInstitutionScholarshipDetails()
    {   

        $scholarshipId=$this->input->post('scholarshipId');


        $data=array(
        'scholarship_name'=>$this->input->post('scholarship_name'),
        'website_link'=>$this->input->post('scholarship_link'),
        'start_date'=>$this->input->post('application_start_date'),
        'last_date'=>$this->input->post('application_end_date'),
        'criteria'=>$this->input->post('criteria')
        );

        $data2=array(
            'institution_id'=>$this->input->post('institutionId')
        );

            $this->db->trans_start();
                        
            $this->Scholarship_model->updateInstitutionalScholarshipDetails($scholarshipId,$data);
            $this->Scholarship_model->UpdateInstitutionalDetails($scholarshipId,$data2);
            $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE)
            {
                 $this->session->set_flashdata('institution-scholarship-update-failure', 'failed to update institution scholarship details ');
                redirect("edit-institution-schloarship-details/$scholarshipId");    
            }
            else
            {
                $this->session->set_flashdata('institution-scholarship-update-success', 'institution scholarship details updated successfully');
                 redirect('view-institution-scholarship-list');  
            }


    }
    public function updateScholarshipDocument()
    {
        $scholarshipId=$this->input->post('scholarshipIdForFileUpload');
        $oldFileName=$this->input->post('oldFile');
        $fileId=$this->input->post('fileId');

       
            $filename = '';
            if (!empty($_FILES['scholarshipDocument']['name']))
            {
                $path = $_FILES['scholarshipDocument']['name'];
                $newName = "scholarship" . "." . pathinfo($path, PATHINFO_EXTENSION);

            // exit;main_assets\document_list
                $uploadPath = './attachment_files/institution_scholarship_files/';
                $config['upload_path'] = $uploadPath;
                //$config['allowed_types'] = 'image|gif|jpg|png|jpeg|JPG|PNG|JPEG|GIF';
                $config['allowed_types'] = '*';
                //$config['max_size'] = 10000;
                $config['file_name'] =date('Ymdhis') . "_" . $newName;
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('scholarshipDocument'))
                {
                    $error = array(
                        'error' => $this->upload->display_errors()
                    );
                    $this->session->set_flashdata('error', 'Something went wrong. Please upload file again');
                }
                else
                {
                    $data = $this->upload->data();
                    $filename = $data['file_name'];
                    
                }

                $scholarshipAttachmentFile= array(
                    'file'=>$filename   
                );

                 $this->db->trans_start();
                        
                    $this->Scholarship_model->updateScholarshipDocument($scholarshipAttachmentFile,$scholarshipId,$oldFileName,$fileId);
                    $this->db->trans_complete();

                    if ($this->db->trans_status() === FALSE)
                    {
                         $this->session->set_flashdata('scholarship-document-update-success', 'scholarship document updated successfully ');
                         redirect('view-institution-scholarship-list');  
                    }
                    else
                    {
                        $this->session->set_flashdata('scholarship-document-update-failure', ' failed to update scholarship document');
                        redirect("edit-institution-schloarship-details/$scholarshipId");  
                    }

            }
            else
            {
                  $this->session->set_flashdata('scholarship-document-update-failure', 'failed to update scholarship document');
                redirect("edit-institution-schloarship-details/$scholarshipId"); 
            }

    }
    public function scholarship_alert_students()
    {
        $this->load->view('support/header');
        $data['scholarships']= $this->Scholarship_model->studentWhoNotGotScholarshipInMonth();  
        $this->load->view('support/scholarship/scholarship_alert_students',$data);
        $this->load->view('support/footer');

    }
    
    
    
    public function updateOldTrialUsersSubscriptionEndDate(){
        $trialUsersList = $this->oldDBtrialUsernameList();
        $query = 'UPDATE `student_registration` SET subscription_validity_datetime = DATE_ADD(`registration_datetime`, INTERVAL 3 MONTH) WHERE `student_username` = "59OzLvAiqFLa"';
        foreach($trialUsersList as $eachUsername){
            $query.=' OR `student_username` = "'.$eachUsername.'"';
        }
        print_r($query);
    }
    


public function getAllZeroDates(){
    $data = $this->db->where('scholarship_added_date','0000-00-00 00:00:00')->get('scholarships')->result();
    foreach($data as $eachData){
        print_r($eachData->scholarship_name);
        echo "<br>";
        $this->db->set('scholarship_added_date',NULL)->where('id',$eachData->id)->update('scholarships');
    }
    print_r('DONE');
}

public function redirectTo($scholarshipId){
    redirect(HOME_PATH."redirect-me-to/".$scholarshipId);
}

public function addScholarshipToFreemiumDB($scholarshipId){
    $freemium = $this->load->database('freemium', TRUE);
    $scholarshipData=$this->db->where('scholarship_id',$scholarshipId)->get('scholarships')->row_array();
    unset($scholarshipData['id']);
    $checkExist = $freemium->where('scholarship_id',$scholarshipId)->get('scholarships');
    if($checkExist->num_rows() == 0){
        $freemium->insert('scholarships',$scholarshipData);
    }
    redirect('scholarship-list');
}



public function testSMS($number,$message){
    $message = "Hey! Here's a new scholarship for you, please click on the link".HOME_PATH."redirect-me-to/SdfsSDS Good luck-TGS";
    $this->Scholarship_model->send_sms($number,$message,SCHOLARSHIP_SENT_SMS_TEMPLATE_ID);
}
  	//FUNCTION USED TO CHANGE WEBSITE VISISBLE STATUS
	public function websiteVisibility($scholarid,$status){
	
			$this->Scholarship_model->approved($scholarid,$status);
		
	}    
}
?>