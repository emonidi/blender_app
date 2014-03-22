<?php 

	class Question extends CI_Model{

		function __construct(){
			parent::__construct();
		}


		function insert($data){
			$this->db->insert('general_questions',$data);
			return $this->db->insert_id();
		}

		function getGeneral(){
			$this->db->where('position_id','0');
			$res=$this->db->get('general_questions');
			$questions = $res->result();

			foreach($questions as $q){
				$this->db->where('question_id',$q->id);
				$ans_res = $this->db->get('answers');
				$q->answers = $ans_res->result();
				
			}

			return $questions;
		}


		function getSpecific($id){

			$this->db->where('position_id',$id);
			$this->db->select('general_questions.id as question_id,general_questions.*,positions.*');
			$this->db->join('positions', 'general_questions.position_id = positions.id');
			$res = $this->db->get('general_questions');

			$questions = $res->result();
			
			foreach($questions as $q){
				$this->db->where('question_id',$q->question_id);
				$ans_res = $this->db->get('answers');
				
				$q->answers = $ans_res->result();
			
			}
			
			return $questions;
		}

		function getById($id){
			$this->db->where("id",$id);
			$res = $this->db->get('general_questions');
			return $res->result();
		}

		function update($id,$data){
			$this->db->where('id',$id);
			$this->db->update('general_questions',$data);
		}


		function remove($id){
			$this->db->where('id',$id);
			$this->db->delete('general_questions');
		
		}
		

	}

?>