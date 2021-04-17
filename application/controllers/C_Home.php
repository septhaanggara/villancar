<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Home extends CI_Controller {

	public function index()
	{
		$data['user'] = $this->db->get_where('user',['email'=>$this->session->userdata('email')])->row_array();
        $data['title'] = 'Home';
	   
		$this->load->view('templates/Header',$data);
        $this->load->view('LandingPage',$data);
        $this->load->view('templates/Footer');
	}
}
