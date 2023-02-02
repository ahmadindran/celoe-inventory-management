<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    //Fungsi __construct akan dieksekusi terlebih dahulu saat class login di panggil
    function __construct()
    {
        parent::__construct();
        $this->load->model('Login_model');
    }

    // fungsi utama pada class login
    function index()
    {
        if ($this->input->post('tombol_login')) {
            $this->form_validation->set_rules('username', 'Username', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|callback_check_database');

            if ($this->form_validation->run() == FALSE) {
                $data['judul'] = 'Login';
                $this->load->view('templates/header', $data);
                $this->load->view('login/index');
            }
        } else {
            $data['judul'] = 'Login';
            $this->load->view('templates/header', $data);
            $this->load->view('login/index');
        }
    }


    // fungsi untuk mengecek ke database, username dan password yang diinputkan oleh user 
    function check_database($password)
    {
        $username = $this->input->post('username');
        $result = $this->Login_model->user($username, $password);
        if ($result) {
            $sess_array = array();
            foreach ($result as $row) {
                $sess_array = array(
                    'id' => $row->id,
                    'username' => $row->username,
                    'nama' => $row->nama,
                    'email' => $row->email,
                    'level' => $row->level
                );
                $this->session->set_userdata('logged_in', $sess_array);
            }
            if ($sess_array['level'] == "1") {
                redirect('admin/homepage');
            } elseif ($sess_array['level'] == "3") {
                redirect('admin/homepage');
            } elseif ($sess_array['level'] == "2") {
                redirect('homepage');
            } elseif ($sess_array['level'] == "0") {
                redirect('404_error');
            }
            return TRUE;
        } else {
            $this->form_validation->set_message('check_database', 'Username atau Password salah');
            return false;
        }
    }

    //fungsi untuk logout
    function logout_proses()
    {
        $this->session->unset_userdata('logged_in');
        session_destroy();
        redirect('login');
    }
}
