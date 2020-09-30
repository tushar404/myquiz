<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registration extends CI_Controller {
	
	public function __construct()
    {
        parent::__construct();
		$this->load->model('student_model');
    }
	
	public function index(){
		$this->form_validation->set_error_delimiters('<p style="color:red;">', '</p>'); 
		$this->form_validation->set_rules('firstname', 'Firstname', 'trim|required');
		$this->form_validation->set_rules('lastname', 'Lastname', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('confirmpassword', 'Confirmpassword', 'trim|required|matches[password]');
		 if ($this->form_validation->run() == FALSE){
			$this->load->view('studentregistration');
			return false;
		}else{
			$stInsArr = array(
							  "st_firstname"=>$this->input->post('firstname'),
							  "st_lastname"=>$this->input->post('lastname'),
							  "st_email"=>$this->input->post('email'),
							  "st_password"=>md5($this->input->post('password'))
							);
			$response = $this->student_model->addstudent($stInsArr);
			if(isset($response) && !empty($response)){
				$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>Registeration successfully..!</div>');
                redirect('login');
			}else{
				$this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>Registeration failed so,Try Again..!</div>');
                redirect('registration');
			}
		}
	}
}
