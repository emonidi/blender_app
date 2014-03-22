<?php 
	
	class Users extends CI_Controller{

		function __construct(){
			parent::__construct();
			$CI =& get_instance();
			$CI->load->library('session');
			if(!$CI->session->userdata('user_id')){
				redirect(base_path()."index.php/admin");
			}
			$CI->load->model('User');
		}

		public function index(){
			$this->load->view('admin/header');
			$users = $this->User->get('users');
			$this->load->view('admin/users/index',array('users'=>$users));
		}

		public function edit(){
			$post = $this->input->post();
           // echo json_encode($post);exit;
			$p = array($post['field']=>$post['value']);
			$id = $this->uri->segment('3');
			$this->User->update($id,$p);
		}

		public function delete(){
			$id = $this->uri->segment('3');
			$error =array('error'=>'');
			if($id === $this->session->userdata('user_id')){
				$error['error'] = "Не можеш да изтриеш себе си.";
				echo json_encode($error);
			}else{
				$this->User->delete($id);
				$error['error'] = false;
				echo json_encode($error);
			}
		}


		public function change_pass(){
			$this->load->library("encrypt");
			$post = $this->input->post();
			$id = $this->uri->segment('3');
			$user = $this->User->getByUserId($id);
			
			$old_pass = $this->encrypt->decode($user[0]->password);
			
			if($old_pass === $post['new_pass']){
				echo json_encode(array('error'=>'Новата парола е същата като старата'),JSON_FORCE_OBJECT);
				return false;
			}else if($post['new_pass'] !== $post['new_pass_repeat']){
				echo json_encode(array('error'=>'Паролите не съвпадат'),JSON_FORCE_OBJECT);
				return false;
			}

			$this->User->update($id,array('password'=>$this->encrypt->encode($post['new_pass'])))	;
			echo json_encode(array('status'=>'ok'));
			
		}


		public function add(){
			
			if($this->input->post()){
				$post = $this->input->post();
				$user = $this->User->getByUsername($post['username']);
			
				if($user){
					$this->load->view('admin/header');
					$this->load->view('admin/users/add',array('error'=>'password_exists','message'=>'Потребител с такова име вече съществува'));
					return false;
				}

				$this->load->library("encrypt");
			
				unset($post['password_repeat']);
				$post['password'] = $this->encrypt->encode($post['password']);
				$user_id = $this->User->insert($post);

				redirect(base_url()."index.php/users/index");
			}else{
				$this->load->view('admin/header');
				$this->load->view('admin/users/add',array('error'=>null,'message'=>null));
			}
		}

		public function adder(){

		}
	}

?>