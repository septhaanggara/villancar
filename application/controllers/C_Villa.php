<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Villa extends CI_Controller {
	function __construct() { 
        parent::__construct(); 
        $this->load->model('Villa_model');
    }
	public function index()
	{
		$data['user'] = $this->db->get_where('user',['email'=>$this->session->userdata('email')])->row_array();
		$data['title'] = 'Villancar';
		$data['villa'] = $this->Villa_model->tampil_data()->result();
		$this->load->view('templates/Header',$data);
		$this->load->view('Villa', $data);
		$this->load->view('templates/Footer');
	}
}
