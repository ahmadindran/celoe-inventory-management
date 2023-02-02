<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Homepage extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Pesanan_model');
        $this->load->model('Homepage_model');
        if (!$this->session->userdata('logged_in')) {
            $pemberitahuan = '<div class="alert alert-light mx-auto" style="width: 45%;" role="alert">
            <i class="fa-solid fa-circle-exclamation"></i>
            <strong> Anda harus login terlebih dahulu!</strong>
            </div>';
            $this->session->set_flashdata('pemberitahuan', $pemberitahuan);
            redirect('login');
        }
    }

    function index()
    {
        $session_data = $this->session->userdata('logged_in');
        $lvl = $session_data['level'];
        if ($lvl == "2") {
            redirect('homepage');
        }

        $data['judul'] = "Homepage Admin";
        $session_data = $this->session->userdata('logged_in');
        $data['nama'] = $session_data['nama'];
        $data['username'] = $session_data['username'];
        $data['email'] = $session_data['email'];
        $data['akun'] = $this->Homepage_model->countUser();
        $data['pesanan'] = $this->Homepage_model->countPesanan();
        $data['proses'] = $this->Homepage_model->countProses();
        $data['selesai'] = $this->Homepage_model->countSelesai();
        $data['nav_homepage'] = 1;

        $this->load->view('templates/header', $data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/connect');
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }
}
