<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesanan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Pesanan_model');
    }

    function index()
    {
        $data['judul'] = "User Pesanan";
        $this->load->view('templates/header', $data);
        $this->load->view('user/navbar');
        $this->load->view('user/pesanan/index');
        $this->load->view('templates/footer');
    }

    function tambah()
    {
        $data['judul'] = "Tambah Pesanan";
        $data['produk'] = $this->Pesanan_model->getAllProduk();
        $this->load->view('templates/header', $data);
        $this->load->view('user/navbar');
        $this->load->view('user/pesanan/add', $data);
        $this->load->view('templates/footer');
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
