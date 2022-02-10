<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Homepage extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Pesanan_model');
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

        $data['judul'] = "Homepage Admin";
        $session_data = $this->session->userdata('logged_in');
        $sesi['nama'] = $session_data['nama'];
        $sesi['username'] = $session_data['username'];
        $sesi['email'] = $session_data['email'];
        $this->load->view('templates/header', $data);
        $this->load->view('admin/navbar');
        $this->load->view('admin/index', $sesi);
        $this->load->view('templates/footer');
    }
}
