<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Kategori_model');
    }

    function index()
    {
        $this->load->model('Kategori_model');
        $data['judul'] = "Admin Kategori";
        $data['kategori'] = $this->Kategori_model->getAllKategori();
        $this->load->view('templates/header', $data);
        $this->load->view('admin/navbar');
        $this->load->view('admin/kategori/index');
        $this->load->view('templates/footer');
    }

    function tambah()
    {
        $data['judul'] = "Add Kategori";
        $this->form_validation->set_rules('kategori', 'Kategori', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('admin/navbar');
            $this->load->view('admin/kategori/add');
            $this->load->view('templates/footer');
        } else {
            $this->Kategori_model->addDataKategori();
            $this->session->set_flashdata('kategori', 'Ditambahkan');
            redirect('admin/kategori/index');
        }
    }

    function ubah($id)
    {
        $data['judul'] = "Edit Kategori";
        $data['kategori'] = $this->Kategori_model->getKategoriById($id);
        $this->form_validation->set_rules('kategori', 'kategori', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('admin/navbar');
            $this->load->view('admin/kategori/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Kategori_model->editDataKategori();
            $this->session->set_flashdata('kategori', 'Diubah');
            redirect('admin/kategori/index');
        }
    }

    function hapus($id)
    {
        $this->Kategori_model->deleteDataKategori($id);
        $this->session->set_flashdata('kategori', 'Dihapus');
        redirect('admin/kategori/index');
    }
}
