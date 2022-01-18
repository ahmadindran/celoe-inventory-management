<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Produk_model');
    }

    function index()
    {
        $this->load->model('Produk_model');
        $data['judul'] = "Admin Produk";
        $data['produk'] = $this->Produk_model->getAllProduk();
        $this->load->view('templates/header', $data);
        $this->load->view('admin/navbar');
        $this->load->view('admin/produk/index');
        $this->load->view('templates/footer');
    }

    function tambah()
    {
        $img = 'assets/uploads/' . $this->input->post('id');
        $config['allowed_types'] = 'jpg|png';
        $config['upload_path'] = 'assets/upload/';
        $config['max_size'] = 50000;
        $this->upload->initialize($config);
        $this->load->library('upload', $config);

        $data['judul'] = "Add Produk";
        $data['brand'] = $this->Produk_model->getBrandForProduk();
        $data['kategori'] = $this->Produk_model->getKategoriForProduk();
        $this->form_validation->set_rules('id', 'ID', 'required');
        $this->form_validation->set_rules('nama', 'Nama Produk', 'required');
        $this->form_validation->set_rules('stock', 'Stock', 'required');
        if ($this->form_validation->run() == FALSE && !$this->upload->do_upload('file')) {
            print_r($this->upload->display_errors());
            $this->load->view('templates/header', $data);
            $this->load->view('admin/navbar');
            $this->load->view('admin/produk/add');
            $this->load->view('templates/footer');
        } else {
            $this->upload->do_upload('file');
            $this->Produk_model->addDataProduk();
            $this->session->set_flashdata('produk', 'Ditambahkan');
            redirect('admin/produk/index');
        }
    }

    function ubah($id)
    {
        $data['judul'] = "Edit Produk";
        $data['produk'] = $this->Produk_model->getProdukById($id);
        $data['brand'] = $this->Produk_model->getBrandForProduk();
        $data['kategori'] = $this->Produk_model->getKategoriForProduk();
        $this->form_validation->set_rules('id-new', 'ID', 'required');
        $this->form_validation->set_rules('nama', 'Nama Produk', 'required');
        $this->form_validation->set_rules('stock', 'Stock', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('admin/navbar');
            $this->load->view('admin/produk/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Produk_model->editDataProduk();
            $this->session->set_flashdata('brand', 'Diubah');
            redirect('admin/produk/index');
        }
    }

    function hapus($id)
    {
        $this->Produk_model->deleteDataProduk($id);
        $this->session->set_flashdata('brand', 'Dihapus');
        redirect('admin/brand/index');
    }
}
