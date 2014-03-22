<?php 
	class Landingpage extends CI_Controller{
		function __construct(){
			parent::__construct();
			$ci = CI_Controller::get_instance();
			$ci->load->library('session');
			$ci->load->model("Textcontent");
				
			if(!$ci->session->userdata('user_id')){
				redirect('/');
			}
		}
		
		public function index(){
			
			$metanames = array('first_page_slogan','first_page_text');
			$data = $this->Textcontent->getAllByPage('landing_page');		
			$this->load->view('admin/header');
			$d = array();
			foreach($data as $data){
				$d[$data->meta_name]=$data->text;
			};
			$this->load->view('admin/content/landingpage',array('data'=>$d));
			
			
		}
		
		public function addtext(){
			$post = $this->input->post();
			$this->Textcontent->update_text($post);
			redirect('landingpage');
		}
	}
?>