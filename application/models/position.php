<?php

	class Position extends CI_Model{

		function __construct(){
			parent::__construct();
		}

		function insert($data){
			$this->db->insert('positions',$data);
		}
		
		function getAll(){
			$res = $this->db->get('positions');
			var_dump($res->result());
		}
		
		function getNames(){
			$this->db->select('id');
			$this->db->select('name');
			$this->db->select('available');
			$res = $this->db->get('positions');
			return $res->result();
		}
		
		function changeAvailability($id,$val){
			
			$this->db->where('id',$id);
			$this->db->update('positions',array('available'=>$val));
		}
		
		function getById($id){
			$this->db->where('id',$id);
			$res = $this->db->get('positions');
			return $res->result();
		}

		function update($id,$post){
			$this->db->where('id',$id);
			$this->db->update('positions',$post);

		}

		function delete($id){
			$this->db->where('id',$id);
			$this->db->delete('positions');
		}
	}

?>