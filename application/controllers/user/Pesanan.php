<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesanan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Pesanan_model');
        $this->load->model('Feedback_model');
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

        $username = $session_data['username'];
        $data['judul'] = "User Pesanan";
        $data['pesanan'] = $this->Pesanan_model->getPesananUser($username);
        $data['feedback'] = $this->Feedback_model->getLink();
        $this->load->view('templates/header', $data);
        $this->load->view('user/navbar');
        $this->load->view('user/pesanan/index', $data);
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

        $data['json'] = $this->Pesanan_model->getJson();

        // echo json_encode(json_decode($json), JSON_PRETTY_PRINT);

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
            $session_data = $this->session->userdata('logged_in');
            $data['id'] = $session_data['id'];
            $data['username'] = $session_data['username'];
            $id = $data['id'];
            $username = $data['username'];
            $count = $this->Pesanan_model->countDataUsername($username);
            $count++;

            // id day month year (now) + no urut sekarang
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

            $produk = $this->input->post('produk', true);
            $banyak = $this->input->post('banyak', true);

            $detil = array();

            $index = 0;
            foreach ($produk as $produkid) {
                array_push($detil, array(
                    'id' => $id,
                    'produk_id' => $produkid,
                    'banyak' => $banyak[$index],
                ));

                $index++;
            }

            $this->Pesanan_model->addDataPesananMaster($master);
            $this->Pesanan_model->addDataPesananDetil($detil);

            redirect('user/pesanan/index');
        }
    }

    function printAll($id)
    {
        $data['judul'] = "Berita Serah Terima";
        $this->load->view('templates/header', $data);
        $data['master'] = $this->Pesanan_model->getMasterData($id);
        $data['detail'] = $this->Pesanan_model->getDetailData($id);
        $this->load->view('templates/printSerah', $data);
        $this->load->view('templates/printTerima', $data);
        $this->load->view('templates/footer');
    }

    function printPenyerahan($id)
    {
        $data['judul'] = "Berita Serah Terima";
        $data['master'] = $this->Pesanan_model->getMasterData($id);
        $data['detail'] = $this->Pesanan_model->getDetailData($id);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/printSerah', $data);
        $this->load->view('templates/footer');
    }

    function printPengembalian($id)
    {
        $data['judul'] = "Berita Serah Terima";
        $data['master'] = $this->Pesanan_model->getMasterData($id);
        $data['detail'] = $this->Pesanan_model->getDetailData($id);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/printTerima', $data);
        $this->load->view('templates/footer');
    }
}
