<?php
	class Questions extends CI_Controller{

		function __construct(){
			parent::__construct();

			$ci =& get_instance();
			$ci->load->library('session');
			if(!$ci->session->userdata('user_id')){
				redirect(base_url()."index.php/login");
			}
			$ci->load->model('Question');
			$ci->load->model('Answer');
		}


		public function index(){
			$this->load->view('admin/header');
		}

		public function add(){

			$this->load->view('admin/header');
			$this->load->view('admin/questions/add',array('parentId'=>null));
			
		}

		//adds general questions in questions table with position_id = 0;
		public function adder(){
			$post = $this->input->post();
			
			$post['has_parent'] = 0;
			if(!$post['position_id']){
				$post['position_id'] = 0;
				$redirect_url = base_url()."index.php/questions/general_list";
			}else{
				$redirect_url = base_url()."index.php/questions/specific_list/".$post['position_id'];
			}


			$answer_post = $post['answers'];
			$points_post = $post['points'];
			unset($post['answers']);
			unset($post['points']);

			$answers = array();
			$question_id = $this->Question->insert($post);
			for($i = 0; $i < count($answer_post);$i++){
			
				$answer = $answer_post[$i];
				$points = $points_post[$i];
				
				
				$this->Answer->insert(array(
						"question_id"=>$question_id,
						"answer"=>$answer,
						"points"=>$points
				));

				
			}
			
			
			redirect($redirect_url);
			
			
		}


		public function general_list(){
			$questions=$this->Question->getGeneral();
			if(!$questions){

			}
			$this->load->view('admin/header');
			$this->load->view('admin/questions/list_common',array('questions'=>$questions,''));
		}

		public function specific_list(){
			
		
				$id = $this->uri->segment(3);
				
				$questions=$this->Question->getSpecific($id);
				
				//var_dump($questions);exit;
			
			$this->load->view('admin/header');
			$this->load->view('admin/questions/list_common',array('questions'=>$questions));
		}


		public function add_answer(){
			$post = $this->input->post();
			$id = $this->Answer->add($post);
			echo json_encode(array('answer_id'=>$id));
		}

		public function edit_answer(){
			$post = $this->input->post();
			$p = array($post['field']=>$post['value']);
			echo json_encode($p,JSON_FORCE_OBJECT);
			$id = $this->uri->segment('3');
			$this->Answer->update($id,$p);
		}

		public function edit_question(){
			$post = $this->input->post();
			$p = array($post['field']=>$post['value']);
			$id = $this->uri->segment('3');
			$this->Question->update($id,$p);	
		}

		public function delete(){
			$id = $this->uri->segment('3');
			$this->Question->remove($id);
			$this->Answer->removeByQuestionId($id);
			$answers = $this->Answer->getByQuestionId($id);
			
			redirect(base_url()."index.php/questions/general_list");
		}


		public function delete_specific(){
			$id = $this->uri->segment(3);
			$question = $this->Question->getById($id);
			$position_id = $question[0]->position_id;
			$this->Answer->removeByQuestionId($id);
			$this->Question->remove($id);
			redirect(base_url()."index.php/questions/specific_list/".$position_id);
		}


		public function add_specific(){
			$this->load->model('Position');
			$positions = $this->Position->getNames();
			
			$this->load->view('admin/header');
			$this->load->view('admin/questions/add_specific',array('parentId'=>null,'positions'=>$positions));
		}

        public function delete_answer(){
            $position_id = $this->input->get('position_id');
            $id = $this->uri->segment(3);
            $this->Answer->removeById($id);
            if($position_id > 0){
                redirect(base_url()."index.php/questions/specific_list/".$position_id);
            }else{
                redirect(base_url()."index.php/questions/general_list/");
            }
        }

	}	
?>