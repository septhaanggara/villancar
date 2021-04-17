<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Villa_model extends CI_Model
{
    private $_table = "villa";

    public $villa_id;
    public $nama_villa;
    public $no;
    public $harga;
    public $image = "default.jpg";
    public $deskripsi;

    public function rules()
    {
        return [
            ['field' => 'nama_villa',
            'label' => 'Nama villa',
            'rules' => 'required'],

            ['field' => 'alamat',
            'label' => 'Alamat',
            'rules' => 'required'],

            ['field' => 'harga',
            'label' => 'Harga',
            'rules' => 'numeric'],
            
            ['field' => 'deskripsi',
            'label' => 'Deskripsi',
            'rules' => 'required']
        ];
    }
    public function tampil_data()

    {
        return $this->db->get('villa');
    }
    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["villa_id" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        
        $this->nama_villa = $post["nama_villa"];
        $this->harga = $post["harga"];
        $this->alamat = $post["alamat"];
        $this->no = uniqid();
		$this->image = $this->_uploadImage();
        $this->deskripsi = $post["deskripsi"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->villa_id = $post["id"];
        $this->nama_villa = $post["nama_villa"];
        $this->harga = $post["harga"];
        $this->alamat = $post["alamat"];
		
		
		if (!empty($_FILES["image"]["name"])) {
            $this->image = $this->_uploadImage();
        } else {
            $this->image = $post["old_image"];
		}

        $this->deskripsi = $post["deskripsi"];
        $this->db->update($this->_table, $this, array('villa_id' => $post['id']));
    }

    public function delete($id)
    {
		$this->_deleteImage($id);
        return $this->db->delete($this->_table, array("villa_id" => $id));
	}
	
	private function _uploadImage()
	{
		$config['upload_path']          = './upload/villa/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['file_name']            = $this->no;
		$config['overwrite']			= true;
		$config['max_size']             = 1024; // 1MB
		// $config['max_width']            = 1024;
		// $config['max_height']           = 768;

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('image')) {
			return $this->upload->data("file_name");
		}
		
		return "default.jpg";
	}

	private function _deleteImage($id)
	{
		$villa = $this->getById($id);
		if ($villa->image != "default.jpg") {
			$filenama_villa = explode(".", $villa->image)[0];
			return array_map('unlink', glob(FCPATH."upload/villa/$filenama_villa.*"));
		}
	}

}
