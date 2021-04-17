<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Contact extends CI_Controller {
	function __construct() { 
        parent::__construct(); 
        $this->load->model('Villa_model');
    }
	public function index()
	{
		$data['user'] = $this->db->get_where('user',['email'=>$this->session->userdata('email')])->row_array();
		$data['title'] = 'Villancar';

		$this->load->view('templates/Header',$data);
		$this->load->view('Contact', $data);
		$this->load->view('templates/Footer');
	}
}
