<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Akun_model');
    }

    function index()
    {
        $data['judul'] = "Register";

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[user.username]', array(
            'is_unique'     => 'This %s already exists.'
        ));
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[user.email]', array(
            'is_unique'     => 'This %s already exists.'
        ));
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
        $this->form_validation->set_rules('passwordConf', 'Password', 'trim|required|matches[password]');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('register/index');
            $this->load->view('templates/footer');
        } else {
            $input = [
                "nama" => $this->input->post('nama', true),
                "username" => $this->input->post('username', true),
                "email" => $this->input->post('email', true),
                "password" => MD5($this->input->post('password', true)),
                "level" => 0
            ];
            $this->Akun_model->addDataAkun($input);
            $this->session->set_flashdata('username', 'Ditambahkan');
            redirect('login');
        }
    }
}
