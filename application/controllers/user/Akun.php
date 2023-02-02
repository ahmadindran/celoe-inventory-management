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
        if ($lvl == "1") {
            redirect('admin/Homepage');
        }
        $username = $session_data['username'];

        $data['judul'] = "Akun";
        $data['nav_akun'] = 1;

        $data['akun'] = $this->Akun_model->getAkunByUname($username);
        $this->load->view('templates/header', $data);
        $this->load->view('user/navbar', $data);
        $this->load->view('user/akun/index', $data);
        $this->load->view('templates/footer');
    }

    function gantiProfile()
    {
        $session_data = $this->session->userdata('logged_in');
        $lvl = $session_data['level'];
        if ($lvl == "1") {
            redirect('admin/Homepage');
        }
        $username = $session_data['username'];

        $data['judul'] = "Edit Akun";
        $data['nav_akun'] = 1;

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
        $this->form_validation->set_rules('password', 'Password', 'required');

        $this->form_validation->set_message('Username', 'This Username already exists.');
        $this->form_validation->set_message('email', 'This Email already exists.');
        if ($this->form_validation->run() == FALSE || md5($this->input->post('password')) != $akun['password']) {
            $this->load->view('templates/header', $data);
            $this->load->view('user/navbar', $data);
            $this->load->view('user/akun/change_profile', $data);
            $this->load->view('templates/footer');
        } else {
            $input = [
                "nama" => $this->input->post('nama', true),
                "username" => $this->input->post('username', true),
                "email" => $this->input->post('email', true)
            ];
            $this->Akun_model->updateAkun($input);
            $this->session->set_flashdata('username', 'Diubah');
            redirect('user/akun/index');
        }
    }

    function gantiPassword()
    {
        $session_data = $this->session->userdata('logged_in');
        $lvl = $session_data['level'];
        if ($lvl == "1") {
            redirect('admin/Homepage');
        }
        $username = $session_data['username'];

        $data['judul'] = "Ganti Password";
        $data['nav_akun'] = 1;

        $data['akun'] = $this->Akun_model->getAkunByUname($username);
        $akun = $data['akun'];

        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('passwordNew', 'Password', 'required|trim|min_length[8]');
        $this->form_validation->set_rules('passwordConf', 'Password', 'required|trim|matches[passwordNew]');

        if ($this->form_validation->run() == FALSE || md5($this->input->post('password')) != $akun['password']) {
            $this->load->view('templates/header', $data);
            $this->load->view('user/navbar', $data);
            $this->load->view('user/akun/change_password', $data);
            $this->load->view('templates/footer');
        } else {
            $input = [
                "password" => MD5($this->input->post('passwordNew', true))
            ];
            $this->Akun_model->updatePass($input);
            $this->session->set_flashdata('username', 'Password Diubah');
            redirect('user/akun/index');
        }
    }

    
}
