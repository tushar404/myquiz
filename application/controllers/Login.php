<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
        parent::__construct();
		$this->load->model('student_model');
    }
	
	public function index()
	{
		if($this->session->has_userdata('student_logged_in')){
			redirect('dashboard');
		}
		$this->load->view('login');
	}
	
	public function studentLogin(){
		if($this->session->has_userdata('student_logged_in')){
			redirect('dashboard');
		}
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == FALSE){
			$this->load->view('login');
			return false;
		}else{
			$studentArr = array(
									"st_email"=>$this->input->post('email'),
									"st_password"=>md5($this->input->post('password'))
								);
			$response = $this->student_model->getStudent($studentArr);
			if(isset($response) && !empty($response)){
				 $session_data=array(
                                'id'=>$response['st_id'],
                                'firstname'=>$response['st_firstname'],
                                'lastname'=>$response['st_lastname'],
                                'email'=>$response['st_email'],
                            );
                $this->session->set_userdata('student_logged_in', $session_data);
                redirect('dashboard');
			}else{
				$this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>Invalid email or password so,Try Again..!</div>');
                redirect('login');
			}
			
		}
	}
	
	public function logout(){
		$this->session->unset_userdata('student_logged_in');
		redirect('login');
	}
}

