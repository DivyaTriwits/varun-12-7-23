<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Support_team_controller extends CI_Controller {


	public function index()
	{
		if (!$this->session->userdata('username')) redirect('support-team-login');
		$this->load->view('support/header');
		$this->load->view('support/home');
		$this->load->view('support/footer');
	}
	
	
	public function supportTeamLogin()
	{
		// print_r("Asif");exit();
		// $this->load->view('support/header');
		$this->load->view('support/support_team_login');
		// $this->load->view('support/footer');
	}

	public function verifyLogin()
	{
         //print_r('expression');exit;
		$username=$this->input->post('username');
		$password=$this->input->post('password');
			// $remember=$this->input->post('rememberme');
		$login_user_details=$this->Support_model->verifyUsername($username);

		if($login_user_details->num_rows()>0)
		{
			$login_user_details=$login_user_details->row();

			if($login_user_details->password==$password)
			{

				$_SESSION['username']=$login_user_details->email;
				$_SESSION['role']=$login_user_details->role;
				$_SESSION['id']=$login_user_details->id;
				$this->session->set_flashdata('login-success','login success...');
				redirect(base_url());
			}
			else
			{
				$this->session->set_flashdata('incorrect-password-error', 'incorrect password!!!'); 
				redirect('support-team-login');
			}

		}
		else
		{	
			
			$this->session->set_flashdata('no-account-found-error', 'no account found with this username..'); 

			redirect('support-team-login');
			
		}

	}


	public function sessionDestroy()
	{

		if (!$this->session->userdata('username')) redirect('support-team-login');	
		$this->session->set_flashdata('logout-success','logout successfully');
		$this->session->unset_userdata('id');
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('role');
			//delete_cookie('remember_me_token');
		redirect('support-team-login');
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
				$data['bank'] = $this->Support_model->bankAddress($username);
    		//print_r($data['family']);exit;
				$this->load->view('support/student_details',$data);
				$this->load->view('support/footer');
			}else{
				redirect(base_url());
			}
		}
	}


	public function profilePage()
	{


		if (!$this->session->userdata('username')) redirect('support-team-login-login');
		$this->load->view('support/header');
		$data['profile'] = $this->Support_model->getProfileDetials()->row();
		$this->load->view('support/support_team_profile', $data);
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
			redirect('support-team-profile-page');
		}
		else
		{
			$this->session->set_flashdata('profile-details-update-error', 'Failed to update profile details!'); 
			redirect('support-team-profile-page');
		}

	}

	public function changePassword()
	{
		if (!$this->session->userdata('username')) redirect('support-team-login');
		$this->load->view('support/header');
		$data['profile'] = $this->Support_model->getProfileDetials()->row();
		$this->load->view('support/support-team-change-password', $data);
		$this->load->view('support/footer');
	}


}?>