<?php
	class Admin extends CI_Controller{
		
		function __construct(){
			parent::__construct();
			$ci = CI_Controller::get_instance();
			$ci->load->library('session');
			if(!$ci->session->userdata('user_id')){
				redirect('/');
			}
		}
		
		public function index(){
			$this->load->view('admin/header');
		}
		
		
	}
?>