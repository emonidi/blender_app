<?php 
	class User extends CI_Model{
		
	function __construct()
    {
        parent::__construct();
    }
		
	function getByUsername($username){
			$this->load->library('encrypt');
			$res = $this->db->get_where('users',array('username'=>$username));
			$res =  $res->result();
			if(!$res || $res[0]->password == null){
				return null;	
			}else{
				$res[0]->password = $this->encrypt->decode($res[0]->password);
				return $res;
			}
	}

	function getByUserId($id){
		$this->db->where('id',$id);
		$user = $this->db->get('users');
		return $user->result();
	}


	function get(){
		$res = $this->db->get('users');	
		return $res->result();
	}

	function update($id,$p)
	{
		$this->db->where('id',$id);
		$this->db->update('users',$p);
	}

	function getById($id){
		$this->db->where('id',$id);
		$res = $this->db->get('users');
		return $res->result();
	}

	function delete($id){
		$this->db->where('id',$id);
		$this->db->delete('users');
	}

	function insert($post){
		$this->db->insert('users',$post);
		return $this->db->insert_id();
	}

}
?>