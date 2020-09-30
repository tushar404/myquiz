<?php
class Student_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
	
	public function addStudent($data){
		if($this->db->insert('mq_students',$data)){
			return true;
		}else{
			return false;	
		}
	}
	
	public function getStudent($data){
		$this->db->select('*');
		$this->db->from('mq_students');
		$this->db->where($data);
		$query = $this->db->get();
		if ($query->num_rows() == 0){
			return false;
		}else{	
			return $query->row_array();
		} 
	}
	
	public function getStudentList(){
		$this->db->select('*');
		$this->db->from('mq_students');
		$query = $this->db->get();
		if ($query->num_rows() == 0){
			return false;
		}else{	
			return $query->result_array();
		} 
	}
	
	public function getQuestionList($id){
		$this->db->select('*');
		$this->db->from('mq_quiz');
		$this->db->join('mq_quiz_quesions','mq_quiz.quiz_id = mq_quiz_quesions.quiz_id');
		$this->db->join('mq_questions','mq_questions.qu_id = mq_quiz_quesions.question_id');
		$this->db->where('mq_quiz.quiz_id',$id);
		$query = $this->db->get();
		if ($query->num_rows() == 0){
			return false;
		}else{	
			return $query->result_array();
		} 
	}
	
	public function addStudentQuiz($data){
		if($this->db->insert('mq_student_quiz',$data)){
			return true;
		}else{
			return false;	
		}
	}
	
	public function updateStudentQuiz($id,$data){
		$this->db->where('sq_id',$id);
		if($this->db->update('mq_student_quiz',$data)){
            return TRUE;
        }else{
            return FALSE;
        }
	}
	
	public function getStudentQuiz($data){
		$this->db->select('*');
		$this->db->from('mq_student_quiz');
		$this->db->where($data);
		$query = $this->db->get();
		if ($query->num_rows() == 0){
			return false;
		}else{	
			return $query->row_array();
		} 
	}
	
	public function getQuizList(){
		$this->db->select('*');
		$this->db->from('mq_quiz');
		$query = $this->db->get();
		if ($query->num_rows() == 0){
			return false;
		}else{	
			return $query->result_array();
		} 
	}
	
	public function addQuizAnswer($data){
		if($this->db->insert_batch('mq_student_quiz_answer',$data)){
			return true;
		}else{
			return false;	
		}
	}
	
	public function getQuizResult($data){
		$this->db->select('*');
		$this->db->from('mq_student_quiz');
		$this->db->join('mq_student_quiz_answer','mq_student_quiz.sq_quiz_id = mq_student_quiz_answer.st_quiz_id');
		$this->db->join('mq_quiz_quesions','mq_student_quiz.sq_quiz_id = mq_quiz_quesions.quiz_id');
		$this->db->join('mq_questions','mq_quiz_quesions.question_id = mq_questions.qu_id');
		$this->db->where('mq_student_quiz.sq_student_id',$data['student_id']);
		$this->db->where('mq_student_quiz.sq_quiz_id',$data['quizId']);
		$this->db->group_by('mq_questions.qu_id');
		$query = $this->db->get();
		if ($query->num_rows() == 0){
			return false;
		}else{	
			return $query->result_array();
		}
	}
	
	public function getStudentQuizList($id){
		$this->db->select('*');
		$this->db->from('mq_student_quiz');
		$this->db->join('mq_quiz','mq_student_quiz.sq_quiz_id = mq_quiz.quiz_id');
		$this->db->where('mq_student_quiz.sq_student_id',$id);
		$query = $this->db->get();
		if ($query->num_rows() == 0){
			return false;
		}else{	
			return $query->result_array();
		}
	}
}