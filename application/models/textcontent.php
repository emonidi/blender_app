<?php

	class Textcontent extends CI_Model{
		
			function __construct(){
				parent::__construct();
			}
			
			function getByMetaNames($metanames){
				$arr = array();
				foreach($metanames as $key=>$value){
					$arr["meta_name"] = $value;
				}
				$query = $this->db->get_where('text_content',$arr);
				return $query->result();
			}	
			
			function update_text($post){
				foreach($post as $key=>$value){
					$this->db->where('meta_name',$key);
					$this->db->update('text_content',array('text'=>$value));
				}
			}
			
			function getAllByPage($pagename){
				$res = $this->db->get_where('text_content',array('page_name'=>$pagename));
				return $res->result();
			}
			
			
			
	}

?>