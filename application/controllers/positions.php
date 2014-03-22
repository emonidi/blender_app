<?php
	class Positions extends CI_Controller{

		function __construct(){
			parent::__construct();

			$ci = CI_Controller::get_instance();
			$ci->load->library('session');
			if(!$this->session->userdata('user_id')){
				redirect(base_url()."index.php/login");
			}
			$ci->load->model("Position");
			$ci->load->helper("url");
		}
		
		public function index(){
			$this->load->view('admin/header');
			$positions = $this->Position->getNames();	
			$this->load->view('admin/positions/index',array('positions'=>$positions));	
			$this->load->view('admin/footer');
		}
		
		public function add(){
			$this->load->view('admin/header');
			$this->load->view('admin/positions/add');
		}

		public function adder(){
			$post = $this->input->post();

			$config = array(
				'upload_path'=>'./assets/images/positions/',
				'allowed_types' => 'jpg|png',
				'overwrite' => true
			);

			if($_FILES['image']['name'] !== ''){
				$this->load->library('upload',$config);
			
				if(!$this->upload->do_upload("image")){
					var_dump($this->upload->display_errors());
				}else{
					$upload_data = $this->upload->data();
					$post['image_url']	= $upload_data['file_name'];
					
				}
			}

			$post['available'] = 0;
			$this->Position->insert($post);
			redirect(base_url()."index.php/positions");				
		}
		
		
		public function activate(){
			$id = $this->uri->segment(3);
			$val = 1;
			$this->Position->changeAvailability($id,$val);
			if(!$this->input->get('redirect')){

				redirect(base_url()."index.php/positions");
			}else{
				redirect(base_url()."index.php/positions/view/".$this->input->get('redirect'));
			}
		}
		
		public function deactivate(){
			$id = $this->uri->segment(3);
			$val = 0;
			$this->Position->changeAvailability($id,$val);
			if(!$this->input->get('redirect')){

				redirect(base_url()."index.php/positions");
			}else{
				redirect(base_url()."index.php/positions/view/".$this->input->get('redirect'));
			}
		}
		
		
		public function edit(){
			$post = $this->input->post();
			$id = $this->uri->segment(3);
			echo json_encode(array('id',$id));
			$this->Position->update($id,array($post['field']=>$post['value']));	

		}
		
		public function view(){
			$id = $this->uri->segment('3');
			$position = $this->Position->getById($id);
			$this->load->view('admin/header');
			$this->load->view('admin/positions/view',array('position'=>$position));
		}	


		public function image_adder(){
			$position_id = $this->uri->segment(3);
			if($_FILES){
				$config['upload_path'] = './assets/images/positions';
				$config['allowed_types'] = 'jpg|png';
				$cofig['overwrite'] = true;
				
				$this->load->library('upload', $config);
				
				if ( ! $this->upload->do_upload("image")){
					$error = array('error' => $this->upload->display_errors());
				}
				else{
					$data =  $this->upload->data();
					$post = array("image_url"=>$data['file_name']);
					$this->Position->update($position_id,$post);	
				};
			}
				redirect(base_url()."index.php/positions/view/".$position_id);
		
		}

		public function delete(){

			$id = $this->uri->segment('3');

			$position =  $this->Position->getById($id);
			$img_url  = $position[0]->image_url;
			
			if(unlink("assets/images/positions/".$img_url)){
				$this->Position->delete($id);
				redirect(base_url()."index.php/positions");
			}


			
		}	

		public function get_names(){
			$res = $this->Position->getNames();
			echo json_encode($res,JSON_FORCE_OBJECT);
		}
		
		
		
	}
?>