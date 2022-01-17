<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesanan extends CI_Controller
{
    function index()
    {
        $data['judul'] = "Admin Pesanan";
        $this->load->view('templates/header', $data);
        $this->load->view('admin/navbar');
        $this->load->view('admin/pesanan/index');
        $this->load->view('templates/footer');
    }
}
