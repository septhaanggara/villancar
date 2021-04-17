<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_About extends CI_Controller {

	public function index()
	{
		$data['user'] = $this->db->get_where('user',['email'=>$this->session->userdata('email')])->row_array();
		$data['title'] = 'Villancar';
		
		$this->load->view('templates/Header',$data);
		$this->load->view('About', $data);
		$this->load->view('templates/Footer');
	}
}
