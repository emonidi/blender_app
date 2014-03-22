<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{	
		$this->load->model('Textcontent');
		$this->load->model("Venue");
		$data = array();
		
		$texts = $this->Textcontent->getAllByPage('landing_page');
		
		foreach($texts as $t){
			$data['text'][$t->meta_name] = $t->text;
		}
		
		$venues = $this->Venue->getAll();
		
		$this->load->view('partials/head');
		$this->load->view('main',array('data'=>$data,'venues'=>$venues));
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */