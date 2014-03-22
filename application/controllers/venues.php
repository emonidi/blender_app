<?php
	class Venues extends CI_Controller{
		
		function __construct(){
			parent::__construct();
			$ci = CI_Controller::get_instance();
			$ci->load->library('session');
			if(!$this->session->userdata('user_id')){
				redirect('/');
			}
			$ci->load->model('Venue');
		}
		
		public function index(){
			
			$data = $this->Venue->getAll();
			$this->load->view('admin/header');
			$this->load->view('admin/venues/index',array('data'=>$data));
		}
		
		
		public function add(){
			$this->load->view('admin/header');
			$this->load->view('admin/venues/add');
		}

		public function update(){
			$post = $this->input->post();
			$id = $this->uri->segment(3);
			echo json_encode(array('id',$id));
			$this->Venue->update($id,array($post['field']=>$post['value']));	

		}

		public function delete(){
			$id = $this->uri->segment(3);
			$venue=$this->Venue->getById($id);
			$img_url = $venue[0]->img_url;
			
			if(unlink('assets/images/venues/'.$img_url)){
				$this->Venue->delete($id);
			}
			redirect(base_url()."index.php/venues");
		}
		
		public function adder(){
			$post = $this->input->post();			
			$config = array(
				'upload_path'=>'./assets/images/venues/',
				'allowed_types'=>'jpg|png',
				'overwrite' => true
			);
			
			$this->load->library("upload",$config);
			
			if(!$this->upload->do_upload('picture')){
				var_dump($this->upload->display_errors());
			}else{
				$upload_data = $this->upload->data();
				$post['img_url'] = $upload_data['file_name'];
				$this->Venue->add($post);
				redirect('venues');
			}
		}
	}
?>