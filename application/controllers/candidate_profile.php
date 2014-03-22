<?php

       class Candidate_profile extends CI_Controller{

            public function index(){
                $this->load->view('partials/head');
                $this->load->view('fe/profile/index');
            }


            public function submit(){
                $post = $this->input->post();
                var_dump($post);
            }

       }

?>