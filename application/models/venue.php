<?php
	class Venue extends CI_Model{
		
		function __construct(){
			parent::__construct();
		}
		
		function getAll(){
			$res = $this->db->get('venues');
			return $res->result();
		}
		
		function add($data){
			$this->db->insert('venues',$data);
		}
		
		function getById($id){
			$this->db->where('id',$id);
			$res = $this->db->get('venues');
			return $res->result();	
		}
		
		function update($id,$post){
			$this->db->where('id',$id);
			$this->db->update('venues',$post);
		}
		
		function delete($id){
			$this->db->where('id',$id);
			$this->db->delete('venues');
		}


		
	}
?>