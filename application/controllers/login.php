<?php
	class Login extends CI_Controller{
		
		function __construct(){
			parent::__construct();
			$ci = CI_Controller::get_instance();
			$ci->load->library('session');
		}
		
		public function index(){
			
			$this->load->library('encrypt');
			$this->load->view("login/index",array('error'=>''));
		}
		
		public function loginer(){
			$this->load->library('encrypt');
			$this->load->model('User');
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			
			
			$user=$this->User->getByUsername($username);
			$user = $user[0];
			
			if(!$user){
				$data = array(
					'error'=>"������ ���������� ��� ������",
				);
				$this->load->view('login/index',$data);
				return false;
			}elseif ($user->password !== $password){
				$data = array(
						'error'=>"true",
				);
				$this->load->view('login/index',$data);
				
			}else{
				$this->setSession($user);
				redirect(base_url().'index.php/admin');
			}
	    }
	    
	    private function setSession($data){
	    	$session_data  = array(
	    		"user_id" => $data->id,
	    		"user_name" => $data->name." ".$data->surname,
	    		"user_role" => $data->role
	    	);

	    	
	    	$this->session->set_userdata($session_data);
	    }
	    
	    
	    public function logout(){
			$this->session->sess_destroy();
			redirect(base_url());	    	
	    }
	    
		
	}
?>