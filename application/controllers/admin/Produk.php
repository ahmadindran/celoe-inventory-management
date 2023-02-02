<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Produk_model');
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
            redirect('homepage');
        }
        $data['judul'] = "Admin Produk";
        $data['nav_produk'] = 1;
        $data['produk'] = $this->Produk_model->getAllProduk();

        $this->load->view('templates/header', $data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/produk/index');
        $this->load->view('templates/footer');
    }

    function tambah()
    {
        $session_data = $this->session->userdata('logged_in');
        $lvl = $session_data['level'];
        if ($lvl == "2") {
            redirect('homepage');
        }

        $config['allowed_types'] = 'jpeg|jpg|png';
        $config['upload_path'] = 'assets/upload/produk/';
        $config['encrypt_name'] = TRUE;
        $config['max_size'] = 2048;
        $this->upload->initialize($config);
        $this->load->library('upload', $config);

        $data['judul'] = "Add Produk";
        $data['nav_produk'] = 1;
        $data['brand'] = $this->Produk_model->getBrandForProduk();
        $data['kategori'] = $this->Produk_model->getKategoriForProduk();

        $this->form_validation->set_rules('id', 'ID', 'required');
        $this->form_validation->set_rules('nama', 'Nama Produk', 'required');
        $this->form_validation->set_rules('stock', 'Stock', 'required');
        $this->form_validation->set_rules('file', 'Foto', 'required');

        if ($this->form_validation->run() == FALSE && !$this->upload->do_upload('file')) {
            $this->form_validation->set_message('file', $this->upload->display_errors());
            $this->load->view('templates/header', $data);
            $this->load->view('admin/navbar', $data);
            $this->load->view('admin/produk/add');
            $this->load->view('templates/footer');
        } else {
            $gambar = $this->upload->data();
            $gambar = $gambar['file_name'];
            $input = array(
                "id" => $this->input->post('id', true),
                "nama" => $this->input->post('nama', true),
                "brand_id" => $this->input->post('brand', true),
                "kategori_id" => $this->input->post('kategori', true),
                "stock" => $this->input->post('stock', true),
                "aktif" => $this->input->post('active', true),
                "status" => '1',
                "foto" => $gambar
            );
            $this->Produk_model->addDataProduk($input);
            $this->session->set_flashdata('produk', 'Ditambahkan');
            redirect('admin/produk/index');
        }
    }

    function ubah($id)
    {
        $session_data = $this->session->userdata('logged_in');
        $lvl = $session_data['level'];
        if ($lvl == "2") {
            redirect('homepage');
        }
        $config['allowed_types'] = 'jpeg|jpg|png';
        $config['upload_path'] = 'assets/upload/produk/';
        $config['encrypt_name'] = TRUE;
        $config['max_size'] = 2048;
        $this->upload->initialize($config);
        $this->load->library('upload', $config);

        $data['judul'] = "Edit Produk";
        $data['nav_produk'] = 1;
        $data['produk'] = $this->Produk_model->getProdukById($id);
        $data['brand'] = $this->Produk_model->getBrandForProduk();
        $data['kategori'] = $this->Produk_model->getKategoriForProduk();

        $produk = $data['produk'];
        $data_foto = $produk['foto'];

        if ($this->input->post('id-new') != $id) {
            $is_unique_id =  '|is_unique[produk.id]';
        } else {
            $is_unique_id =  '';
        }

        $this->form_validation->set_rules('id-new', 'ID', 'required' . $is_unique_id);
        $this->form_validation->set_rules('nama', 'Nama Produk', 'required');
        $this->form_validation->set_rules('stock', 'Stock', 'required');
        $this->form_validation->set_rules('file', 'Foto');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('admin/navbar', $data);
            $this->load->view('admin/produk/edit', $data);
            $this->load->view('templates/footer');
        } else {

            if ($_FILES["file"]['name'] == TRUE) {
                if ($this->upload->do_upload('file')) {
                    $file_baru = $this->upload->data();

                    $foto_old = 'assets/upload/produk/' . $data_foto;

                    if (file_exists($foto_old)) {
                        unlink($foto_old);
                    }
                    $image_uploaded = $this->upload->data();
                } else {
                    print_r($this->upload->display_errors());
                    $this->load->view('templates/header', $data);
                    $this->load->view('admin/navbar');
                    $this->load->view('admin/produk/edit', $data);
                    $this->load->view('templates/footer');
                }
                $gambar = $file_baru['file_name'];
            } else {
                $gambar = $this->input->post('file-old');
            }
            $input = array(
                "id" => $this->input->post('id-new', true),
                "nama" => $this->input->post('nama', true),
                "brand_id" => $this->input->post('brand', true),
                "kategori_id" => $this->input->post('kategori', true),
                "stock" => $this->input->post('stock', true),
                "aktif" => $this->input->post('active', true),
                "status" => '1',
                "foto" => $gambar
            );
            $foto_old = 'assets/upload/produk/' . $produk['foto'];

            $this->Produk_model->editDataProduk($input);
            $this->session->set_flashdata('produk', 'Diubah');
            redirect('admin/produk/index');
        }
    }

    function hapus($id)
    {
        $this->Produk_model->deleteDataProduk($id);
        $this->session->set_flashdata('brand', 'Dihapus');
        redirect('admin/produk/index');
    }
}
