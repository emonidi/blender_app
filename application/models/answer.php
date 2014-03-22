<?php 
	class Answer extends CI_Model{

		function __construct(){
			parent::__construct();
		}

		function insert($data){
			//var_dump($data[0]);exit;
			$this->db->insert('answers',$data);
		}

		function add($data){
			$this->db->insert('answers',$data);
			return $this->db->insert_id();
		}

		function update($id,$data){
			$this->db->where('id',$id);
			$this->db->update('answers',$data);
			
		}

		function getByQuestionId($questionId){
			$this->db->where('question_id',$questionId);
			$res=$this->db->get('answers');
			return $res->result();
		}

		function removeByQuestionId($questionId){
			$this->db->where('question_id',$questionId);
			$this->db->delete('answers');
		}

        function removeById($id){
            $this->db->where('id',$id);
            $this->db->delete('answers');
        }

	}
?>