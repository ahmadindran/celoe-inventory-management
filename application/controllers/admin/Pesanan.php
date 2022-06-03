<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesanan extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Pesanan_model');
        $this->load->helper('download');
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
            redirect('user/Homepage');
        }

        $data['judul'] = "Admin Pesanan";
        $data['pesanan'] = $this->Pesanan_model->getAllPesanan();
        $this->load->view('templates/header', $data);
        $this->load->view('admin/navbar');
        $this->load->view('admin/pesanan/index', $data);
        $this->load->view('templates/footer');
    }

    public function ajax_list()
    {
        // $list = $this->Pesanan_model->get_datatables();
        // $data = array();
        // $no = $_POST['start'];
        // foreach ($list as $pesanan) {
        //     $no++;
        //     $row = array();
        //     $row[] = $no;
        //     $row[] = $pesanan->id;
        //     $row[] = $pesanan->tanggal;
        //     $row[] = $pesanan->nama;
        //     $row[] = $pesanan->nip;
        //     $row[] = $pesanan->unit;
        //     $row[] = $pesanan->nde;

        //     $data[] = $row;
        // }

        // $output = array(
        //     "draw" => $_POST['draw'],
        //     "recordsTotal" => $this->pesanan->count_all(),
        //     "recordsFiltered" => $this->pesanan->count_filtered(),
        //     "data" => $data,
        // );
        // //output to json format
        // echo json_encode($output);
    }

    function get_ajax()
    {
        $list = $this->Pesanan_model->get_datatables();
        $data = array();
        $no = @$_POST['start'];
        foreach ($list as $item) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $item->id;
            $row[] = $item->tanggal;
            $row[] = $item->nama;
            $row[] = $item->nip;
            $row[] = $item->unit;
            $row[] = $item->nde;
            // $row[] = $no . ".";
            // $row[] = $item->barcode . '<br><a href="' . site_url('item/barcode_qrcode/' . $item->item_id) . '" class="btn btn-default btn-xs">Generate <i class="fa fa-barcode"></i></a>';
            // $row[] = $item->name;
            // $row[] = $item->category_name;
            // $row[] = $item->unit_name;
            // $row[] = indo_currency($item->price);
            // $row[] = $item->stock;
            // $row[] = $item->image != null ? '<img src="' . base_url('uploads/product/' . $item->image) . '" class="img" style="width:100px">' : null;
            // // add html for action
            // $row[] = '<a href="' . site_url('item/edit/' . $item->item_id) . '" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Update</a>
            //         <a href="' . site_url('item/del/' . $item->item_id) . '" onclick="return confirm(\'Yakin hapus data?\')"  class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</a>';
            $data[] = $row;
        }
        $output = array(
            "draw" => @$_POST['draw'],
            "recordsTotal" => $this->item_m->count_all(),
            "recordsFiltered" => $this->item_m->count_filtered(),
            "data" => $data,
        );
        // output to json format
        echo json_encode($output);
    }

    public function ambildata()
    {
        // header('Content-Type: application/json');
        if ($this->input->is_ajax_request() == TRUE) {
            $this->load->model('Pesanan_model', 'pesanan');
            $list = $this->pesanan->get_datatables();
            $data = array();
            $no = $_POST['start'];
            foreach ($list as $field) {

                $no++;
                $row = array();
                // array(null, 'id', 'tanggal', 'nama', 'nip', 'unit', 'nde')
                $row[] = $no;
                $row[] = $field->id;
                $row[] = $field->tanggal;
                $row[] = $field->nama;
                $row[] = $field->nip;
                $row[] = $field->unit;
                $row[] = $field->nde;
                $data[] = $row;
            }

            $output = array(
                "draw" => $_POST['draw'],
                "recordsTotal" => $this->pesanan->count_all(),
                "recordsFiltered" => $this->pesanan->count_filtered(),
                "data" => $data,
            );
            //output dalam format JSON
            echo json_encode($output);
        } else {
            exit('Maaf data tidak bisa ditampilkan');
        }
    }

    function tambah()
    {
        $session_data = $this->session->userdata('logged_in');
        $lvl = $session_data['level'];
        if ($lvl == "2") {
            redirect('user/Homepage');
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
            $this->load->view('admin/navbar');
            $this->load->view('admin/pesanan/add', $data);
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

            redirect('admin/pesanan/index');
        }
    }

    function downloadNde($nde)
    {
        force_download('assets/upload/nde/' . $nde, NULL);
    }

    function updateStatus1($id)
    {
        $this->Pesanan_model->updateStatus1($id);
        redirect('admin/pesanan/index');
    }

    function updateStatus2($id)
    {
        $this->Pesanan_model->updateStatus2($id);
        redirect('admin/pesanan/index');
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
