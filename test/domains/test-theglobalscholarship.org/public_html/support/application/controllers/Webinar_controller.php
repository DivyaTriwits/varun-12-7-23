<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Webinar_controller extends CI_Controller {
    public function webinars() {
        // echo "Asif";exit();
        $this->load->view('support/header');
        $this->load->view('support/webinar/view_webinar');
        $this->load->view('support/footer');
    }
    public function webinarRegister() {
        $this->load->view('support/header');
        $data['getwebinarRegistrations'] = $this->Support_model->getWebinarRegistrations();
        $this->load->view('support/webinar/webinar_register', $data);
        $this->load->view('support/footer');
    }
    public function WebinarRegistationForm() {
        $this->load->view('support/header');
        $this->load->view('support/webinar/add_webinar_registrations');
        $this->load->view('support/footer');
    }
    public function addWebinarRegistation() {
        $this->Support_model->add_webinar_registrations();
       
    }
    public function updateLinks($id) {
        // print_r($id);exit();
        $this->Support_model->update_links($this->input->post('eid'));
        redirect('update-webinar-registration/' . $id);
    }
    public function generateLinksForEachInstitution() {
        $this->Support_model->generateLinksForEachInstitution($this->uri->segment(2));
    }
    public function updateDetailsOfWebinar($id) {
        $this->Support_model->updateDetailsOfWebinar($this->input->post('webuniqueId'), $this->input->post('linksId'));
        redirect('update-webinar-registration/' . $id);
    }
    // public function generateLinksForEachInstitution()
    // {
    // 	$data['getinstituionname']=$this->Support_model->update_webinar_registration($this->uri->segment(2));
    // 	$data['getGeneratedLinks']=$this->Support_model->getGeneratedLinks();
    // }
    public function updateWebinarRegistationForm() {
        $this->load->view('support/header');
        $data['getinstituionname'] = $this->Support_model->update_webinar_registration($this->uri->segment(2));
        $data['getGeneratedLinks'] = $this->Support_model->getGeneratedLinks($this->uri->segment(2));
        $data['getLinks'] = $this->Support_model->getGeneratedLinksinTable($this->uri->segment(2));
        $this->load->view('support/webinar/update_webinar_registrations', $data);
        $this->load->view('support/footer');
    }
    public function deleteLinks($id) {
        // echo "Asif";exit();
        // print_r($this->input->post('did'));exit();
        if ($this->db->where('links_id', $this->input->post('did'))->delete('links')) {
            $this->session->set_flashdata('delete-success', 'Deleted successfully..');
            redirect('update-webinar-registration/' . $id);
        }
    }
    public function deleteWebinarRegistration() {
        // echo "Asif";exit();
        // print_r($this->input->post('did'));exit();
        if ($this->db->where('id', $this->input->post('did'))->delete('webinar_registration')) {
            $this->session->set_flashdata('delete-success', 'Deleted successfully..');
            redirect('webinar-registrations');
        }
    }
    public function generateLinks() {
        $this->load->view('support/header');
        $data['getinstituionname'] = $this->Support_model->update_webinar_registration($this->uri->segment(2));
        $data['webinarList']=$this->Support_model->get_webinar_registration_list($this->uri->segment(2));
        $data['webinarShortName']=$this->Support_model->getWebinarShortName($this->uri->segment(2)); 
        $this->load->view('support/webinar/generate_links', $data);
        $this->load->view('support/footer');
    }
    public function getWebinarName() {
        $webinarid = $this->input->post('id');
        $data = $this->Support_model->get_Webinar_name($webinarid);
        echo json_encode($data);
    }
    public function webinarPage() {
        $this->load->view('support/header');
        $this->load->view('support/webinar/webinar_page');
        $this->load->view('support/footer');
    }
    public function webinarRegisteredStudentList() {
        $this->load->view('support/header');
        $data['list'] = $this->Webinar_model->getWebinarRegisteredStudentList();
        
        $data['webinar'] = $this->Webinar_model->getWebinarNameList();
        $this->load->view('support/webinar/webinar_registered_student_list', $data);
        $this->load->view('support/footer');
    }
    public function deleteWebinarLink()
    {
        $linkId=$this->input->post('did');
        $webinarid=$this->input->post('webinarId');
        $linkTableId=$this->input->post('linksId');



        $this->db->trans_start();

        $this->Webinar_model->deleteWebinarLinkFromLinksTable($linkTableId);
        $this->Webinar_model->deleteWebinarLinkFromGenerateLinksTable($linkId);
       
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE)
        {
            
              $this->session->set_flashdata('webinar-link-delete-error', 'Failed to delete webinar link');  
              redirect("generate-links/$webinarid");
        }
        else
        {

             $this->session->set_flashdata('webinar-link-delete-success', 'Webinar link deleted successfully'); 
             redirect("generate-links/$webinarid");
        }

    }

    //     public function supportWebinarRegistration($webinarName){

          
       
    //      $this->load->view('support/header');
    //     $data['webinarLinks'] = $this->Webinar_model->getWebinarLinksByWebinarName($webinarName);
      
    //     $this->load->view('support/support_webinar_registration',$data);
    //    $this->load->view('support/footer');


    



    // }

     public function uploadStudentsData() {
        $this->load->view('support/header');
        $this->load->view('support/uploaddata');
        $this->load->view('support/footer');
    }

    public function insertCertificateData(){
        
        $this->Webinar_model->storeStudents();
    }

}?>