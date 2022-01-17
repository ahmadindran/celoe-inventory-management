<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Brand extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Brand_model');
    }

    function index()
    {
        $this->load->model('Brand_model');
        $data['judul'] = "Admin Brand";
        $data['brand'] = $this->Brand_model->getAllBrand();
        $this->load->view('templates/header', $data);
        $this->load->view('admin/navbar');
        $this->load->view('admin/brand/index');
        $this->load->view('templates/footer');
    }

    function tambah()
    {
        $data['judul'] = "Add Brand";
        $this->form_validation->set_rules('brand', 'Brand', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('admin/navbar');
            $this->load->view('admin/brand/add');
            $this->load->view('templates/footer');
        } else {
            $this->Brand_model->addDataBrand();
            $this->session->set_flashdata('brand', 'Ditambahkan');
            redirect('admin/brand/index');
        }
    }

    function ubah($id)
    {
        $data['judul'] = "Edit Brand";
        $data['brand'] = $this->Brand_model->getBrandById($id);
        $this->form_validation->set_rules('brand', 'Brand', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('admin/navbar');
            $this->load->view('admin/brand/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Brand_model->editDataBrand();
            $this->session->set_flashdata('brand', 'Diubah');
            redirect('admin/brand/index');
        }
    }

    function hapus($id)
    {
        $this->Brand_model->deleteDataBrand($id);
        $this->session->set_flashdata('brand', 'Dihapus');
        redirect('admin/brand/index');
    }
}
