<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesanan extends CI_Controller
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
        if ($lvl == "1") {
            redirect('admin/Homepage');
        }

        $data['judul'] = "User Pesanan";
        $this->load->view('templates/header', $data);
        $this->load->view('user/navbar');
        $this->load->view('user/pesanan/index');
        $this->load->view('templates/footer');
    }

    function tambah()
    {
        $session_data = $this->session->userdata('logged_in');
        $lvl = $session_data['level'];
        if ($lvl == "1") {
            redirect('admin/Homepage');
        }

        $config['allowed_types'] = 'pdf';
        $config['upload_path'] = 'assets/upload/nde/';
        $config['encrypt_name'] = TRUE;
        $this->upload->initialize($config);
        $this->load->library('upload', $config);

        $data['judul'] = "Tambah Pesanan";
        $data['produk'] = $this->Pesanan_model->getAllProduk();

        $session_data = $this->session->userdata('logged_in');
        $data['id'] = $session_data['id'];
        $data['username'] = $session_data['username'];
        $id = $data['id'];
        $username = $data['username'];
        $count = $this->Pesanan_model->countDataUsername($username);
        $count++;

        $this->form_validation->set_rules('tgl', 'Tanggal', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('nip', 'NIP', 'required');
        $this->form_validation->set_rules('unit', 'Unit', 'required');
        $this->form_validation->set_rules('nde', 'Nota Dinas Elektronik', 'required');

        if ($this->form_validation->run() == FALSE && !$this->upload->do_upload('nde')) {
            $this->load->view('templates/header', $data);
            $this->load->view('user/navbar');
            $this->load->view('user/pesanan/add', $data);
            $this->load->view('templates/footer');
            // $this->load->view('user/test', $error);
        } else {
            // mengambil nama file            
            $pdf = $this->upload->data();
            $pdf = $pdf['file_name'];

            // mengambil count hasil username
            // day month year (now) + no urut sekarang
            $id = date('dmy') . sprintf("%03s", $id) . sprintf("%03s", $count);

            $master = array(
                "id" => $id,
                "username" => $username,
                "tanggal" => $this->input->post('tgl', true),
                "nama" => $this->input->post('nama', true),
                "nip" => $this->input->post('nip', true),
                "unit" => $this->input->post('unit', true),
                "nde" => $pdf
            );
            $this->Pesanan_model->addDataPesananMaster($master);
            redirect('user/pesanan/index');
        }
    }

    function printAll()
    {
        $data['judul'] = "Berita Serah Terima";
        $this->load->view('templates/header', $data);
        $this->load->view('user/pesanan/printSerah');
        $this->load->view('user/pesanan/printTerima');
        $this->load->view('templates/footer', $data);
    }

    function printPenyerahan()
    {
        $data['judul'] = "Berita Serah Terima";
        $this->load->view('templates/header', $data);
        $this->load->view('user/pesanan/printSerah');
        $this->load->view('templates/footer', $data);
    }

    function printPengembalian()
    {
        $data['judul'] = "Berita Serah Terima";
        $this->load->view('templates/header', $data);
        $this->load->view('user/pesanan/printTerima');
        $this->load->view('templates/footer', $data);
    }
}
