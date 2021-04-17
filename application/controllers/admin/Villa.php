<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Villa extends CI_Controller
{
    private $_table = "villa";
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Villa_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["villa"] = $this->Villa_model->getAll();
        $this->load->view("admin/villa/list", $data);
    }

    public function add()
    {
        
        $villa = $this->Villa_model;
        $validation = $this->form_validation;
        $validation->set_rules($villa->rules());

        if ($validation->run()) {
            $villa->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("admin/villa/new_form");
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/villa');
       
        $villa = $this->Villa_model;
        $validation = $this->form_validation;
        $validation->set_rules($villa->rules());

        if ($validation->run()) {
            $villa->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["villa"] = $villa->getById($id);
        if (!$data["villa"]) show_404();
        
        $this->load->view("admin/villa/edit_form", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->Villa_model->delete($id)) {
            redirect(site_url('admin/villa'));
        }
    }
}
