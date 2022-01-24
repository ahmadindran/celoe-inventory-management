<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesanan extends CI_Controller
{
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
        $this->load->view('templates/header', $data);
        $this->load->view('user/navbar');
        $this->load->view('user/pesanan/add');
        $this->load->view('templates/footer');
    }
}
