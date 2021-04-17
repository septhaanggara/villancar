<?php 

class C_Detail extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('Villa_model');
        
    }
   
    public function index($id = null){
        $data['title'] = 'Detail Villa';
        
        if (!isset($id)) redirect('C_Villa');
       
        $villa = $this->Villa_model;
        $validation = $this->form_validation;
        $validation->set_rules($villa->rules());

        if ($validation->run()) {
            $villa->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["villa"] = $villa->getById($id);
        if (!$data["villa"]) show_404();
        $data['sesi'] = $this->session->userdata('name');
        $this->load->view('templates/Header',$data);
		$this->load->view('Detail', $data);
		$this->load->view('templates/Footer');

    }
    public function tambah(){
        $villa_id = $this->input->post('villa_id');
        $this->review_m->tambahReview($villa_id);
        redirect("inputReview?villa_id=$villa_id");
    }

    public function hapusReview($id){
        $villa_id= $this->input->get('villa_id');
        $this->review_m->hapusReview($id,$villa_id);
        redirect("inputReview?villa_id=$villa_id");
    }
    public function edit(){
        $villa_id = $this->input->post('villa_id');
        $this->review_m->editReview($villa_id);
        redirect("inputReview?villa_id=$villa_id");
    }

}

?>
