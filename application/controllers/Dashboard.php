<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public $session_result;
	public function __construct()
    {
        parent::__construct();
		$this->load->model('student_model');
		if(!$this->session->has_userdata('student_logged_in')){
			redirect('login');
		}
		$this->session_result = $this->session->userdata('student_logged_in');
    }
	
	public function index(){
		$data['dashactive'] = "active";
		$stArr = array('st_id'=>$this->session_result['id']);
		$data['students'] = $this->student_model->getStudent($stArr);
		$data['quizlist'] = $this->student_model->getQuizList();
		$this->load->view('header',$data);
		$this->load->view('studentdashboard');
		$this->load->view('footer');
	}
	
	public function quizStart($id){
		$currentDate = date('Y-m-d h:i:s', time());
		$data['dashactive'] = "active";
		$data['quizId'] = $id;
		$checkQArr = array("sq_student_id"=>$this->session_result['id'],
							"sq_quiz_id"=>$id
							);
		$checkQuizStart = $this->student_model->getStudentQuiz($checkQArr);
		if($checkQuizStart == FALSE || empty($checkQuizStart)){
			$startArr = array(
								"sq_student_id"=>$this->session_result['id'],
								"sq_quiz_id"=>$id,
								"sq_start_date"=>$currentDate,
							);
			$res = $this->student_model->addStudentQuiz($startArr);
		}else{
			$startUpArr = array(
								"sq_student_id"=>$this->session_result['id'],
								"sq_quiz_id"=>$id,
								"sq_start_date"=>$currentDate,
							);
			$sqId = $checkQuizStart['sq_id'];
			$resUp = $this->student_model->updateStudentQuiz($sqId,$startUpArr);
		}
		$data['questions'] = $this->student_model->getQuestionList($id);
		$this->load->view('header',$data);
		$this->load->view('quizquestions');
		$this->load->view('footer');
	}
	
	public function quizSubmit(){
		$quizId = $this->input->post('quiz_id');
		$checkQArr = array("sq_student_id"=>$this->session_result['id'],
							"sq_quiz_id"=>$quizId
							);
		$checkQuizStart = $this->student_model->getStudentQuiz($checkQArr);
		$startUpArr = array(
								"sq_student_id"=>$this->session_result['id'],
								"sq_quiz_id"=>$quizId,
								"sq_end_date"=>$currentDate,
							);
		$sqId = $checkQuizStart['sq_id'];
		$resUp = $this->student_model->updateStudentQuiz($sqId,$startUpArr);
		$getQuizQuestions = $this->student_model->getQuestionList($quizId);
		$sqAnsArr = array();
		foreach($getQuizQuestions as $getQuizQuestion){
			$sqAnsArr[] = array(
							 "st_quiz_id"=>$quizId,
							 "st_question_id"=>$this->input->post('qt_name_'.$getQuizQuestion['quiz_id']),
							 "st_answer"=>$this->input->post('qt_option_'.$getQuizQuestion['quiz_id'])
							);
		}
		$res = $this->student_model->addQuizAnswer($sqAnsArr);
		if(isset($res) && $res == TRUE){
			$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>Quiz submitted..!</div>');
                redirect('dashboard');
		}else{
			$this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>Quiz submition failed so,Try Again..!</div>');
                redirect('startquiz/'.$quizId);
		}
	}
	
	public function quizResult(){
		$data["student_id"]= $this->session_result['id'];
		$data["studentquizlists"]= $this->student_model->getStudentQuizList($this->session_result['id']);
		$this->load->view('header',$data);
		$this->load->view('quizresult');
		$this->load->view('footer');
	}
	
	public function viewQuizResult($id){
		$data["student_id"]= $this->session_result['id'];
		$getArr = array("student_id"=>$this->session_result['id'],"quizId" =>$id);
		$data["quizresults"]= $this->student_model->getquizresult($getArr);
		$this->load->view('header',$data);
		$this->load->view('viewresult');
		$this->load->view('footer');
	}
	
	
}
