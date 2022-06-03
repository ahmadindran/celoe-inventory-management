<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Akun extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Akun_model');
        if (!$this->session->userdata('logged_in')) {
            $pemberitahuan = "<div class='alert alert-warning'>Anda harus login dulu </div>";
            $this->session->set_flashdata('pemberitahuan', $pemberitahuan);
            redirect('login');
        }
    }

    function index()
    {
        $session_data = $this->session->userdata('logged_in');
        $lvl = $session_data['level'];
        if ($lvl == "2") {
            redirect('user/Homepage');
        }
        $data['judul'] = "Admin Akun";
        $data['akun'] = $this->Akun_model->getAllAkun();
        $this->load->view('templates/header', $data);
        $this->load->view('admin/navbar');
        $this->load->view('admin/akun/index', $data);
        $this->load->view('templates/footer');
    }

    function tambah()
    {
        $session_data = $this->session->userdata('logged_in');
        $lvl = $session_data['level'];
        if ($lvl == "2") {
            redirect('user/Homepage');
        }
        $data['judul'] = "Tambah Akun";

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
            $this->load->view('admin/navbar');
            $this->load->view('admin/akun/add');
            $this->load->view('templates/footer');
        } else {
            $this->Akun_model->addDataAkun();
            $this->session->set_flashdata('username', 'Ditambahkan');
            redirect('admin/akun/index');
        }
    }

    function ubah($username)
    {
        $session_data = $this->session->userdata('logged_in');
        $lvl = $session_data['level'];
        if ($lvl == "2") {
            redirect('user/Homepage');
        }

        $data['judul'] = "Edit Akun";
        $data['akun'] = $this->Akun_model->getAkunByUname($username);
        $akun = $data['akun'];

        if ($this->input->post('username') != $akun['username']) {
            $is_unique_uname =  '|is_unique[user.username]';
        } else {
            $is_unique_uname =  '';
        }
        if ($this->input->post('email') != $akun['email']) {
            $is_unique_email =  '|is_unique[user.email]';
        } else {
            $is_unique_email =  '';
        }

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required' . $is_unique_uname);
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email' . $is_unique_email);
        $this->form_validation->set_rules('password', 'Password', 'trim|min_length[8]');
        $this->form_validation->set_rules('passwordConf', 'Password', 'trim|matches[password]');

        $this->form_validation->set_message('Username', 'This Username already exists.');
        $this->form_validation->set_message('email', 'This Email already exists.');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('admin/navbar');
            $this->load->view('admin/akun/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Akun_model->editDataAkun();
            $this->session->set_flashdata('username', 'Diubah');
            redirect('admin/akun/index');
        }
    }

    function hapus($username)
    {
        $this->Akun_model->deleteDataAkun($username);
        $this->session->set_flashdata('brand', 'Dihapus');
        redirect('admin/akun/index');
    }
}
