<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation'); /*melakukan form*/
    }
    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        if($this->form_validation->run() == false) {

            $data['title'] = 'Login'; /*mengganti judul halaman */
            $this->load->view('templates/Header', $data);
            $this->load->view('auth/Login');
            $this->load->view('templates/Footer');

        } else {

            // validasi sukses
            $this->_login(); // kelas login private
        }
    }

    private function _login() {

        // mengambil email yang sudah lolos validasi
        $email = $this->input->post('email'); // email di kolom login
        $password = $this->input->post('password'); //password di kolom login

        // query ke database mencari email yg sesuai dengan database

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        //usernya ada

        if($user ){

            // usernya aktif

            if($user['is_active']==1){
                //cek password
                if(password_verify($password, $user['password'])){ // mencocokkan password di kolom login dgn password yg sudah d hash
                        $data = [
                            'id'=>$user['id'],
                            'email' => $user['email'],
                            'role_id' => $user['role_id'],
                            'name'=>$user['name']

                        ];
                        $this->session->set_userdata($data);
                        if($user['role_id']==1){ //redirect berbeda role
                            redirect('admin/villa');
                        }else if($user['role_id']==2){
                            redirect('C_Home');
                        }else{
                            redirect('C_Home');
                        }

                } else {

                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Wrong password</div> ');
                    redirect('auth');
                }

            }else {

                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                this email is not activated</div> ');
                redirect('auth');
            }


        } else {

            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Email is not registered</div> ');
            redirect('auth');

        }

    }


    public function registration()
    {
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]',[
            'is_unique' => 'this email has already registered'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'password dont match',
            'min_length' => 'password to short'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
        /* trim = spasi tidak masuk kedalam database
            valid_email = format sesuai dengan format email
            */
        if($this->form_validation->run() == false) { /* validation */

            $data['title'] = 'Register'; /*mengganti judul halaman */
            $this->load->view('templates/Header', $data);
            $this->load->view('auth/Registration');
            $this->load->view('templates/Footer');
        } else {
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'no' => htmlspecialchars($this->input->post('no', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 2,
                'is_active' => 1,
                'date_created' => time()

            ];
            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Your account has been created.</div> ');
            redirect('auth');
        }
    }


    public function logout()

    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->unset_userdata('name');
        $this->session->unset_userdata('id');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        You have been logged out</div> ');
        redirect('C_Home');
        
    }
}

