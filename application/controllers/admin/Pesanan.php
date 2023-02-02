<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesanan extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Pesanan_model');
        $this->load->model('PesananA_model');
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
            redirect('homepage');
        }

        $data['judul'] = "Admin Pesanan";
        $data['nav_pesanan'] = 1;
        $data['pesanan'] = $this->Pesanan_model->getAllPesanan();

        $this->load->view('templates/header', $data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/pesanan/index', $data);
        $this->load->view('templates/footer');
    }

    public function ajax_list()
    {
        $list = $this->PesananA_model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        $status =  null;
        foreach ($list as $item) {
            $no++;

            if ($item->status == "1") {
                $status = '<div class="row justify-content-evenly"><div class="col-4">Proses</div>
                <div class="col-4"><a type="button" class="btn btn-danger" href="' . site_url('admin/pesanan/updateStatus1/' . $item->id) . '" onclick="return confirm(' . 'Yakin?' . ')">Update</a></div>';
            } elseif ($item->status == "2") {
                $status = '<div class="row justify-content-evenly"><div class="col-4">Peminjaman</div>
                <div class="col-4">
                <a type="button" class="btn btn-warning" href="' . site_url('admin/pesanan/updateStatus2/' . $item->id) . '" onclick="return confirm(' . 'Yakin?' . ')">Update</a></div>';
            } elseif ($item->status == "3") {
                $status = '<div class="row justify-content-evenly"><div class="col-4"><button type="button" class="btn btn-primary">Selesai</button>';
            }
            $row = array();
            // <th>No</th>
            $row[] = $no;
            // <th>Bill No.</th>
            $row[] = $item->id;
            // <th>Peminjaman</th>
            $row[] = $item->tgl_peminjaman;
            // <th>Pengembalian</th>
            $row[] = $item->tgl_pengembalian;
            // <th>Nama</th>
            $row[] = $item->nama;
            // <th>Unit</th>
            $row[] = $item->nip;
            // <th>NIP</th>
            $row[] = $item->unit;
            // <th>NDE</th>
            $row[] = '<a type="button" class="btn btn-light" href="' . $item->nde . '">Download</a>';
            // <th>Status</th>
            $row[] = $status;
            // <th>Surat Berita</th>
            $row[] = '<div class="col-4">
            <div class="dropdown">
                <a class="btn btn-danger dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                    Surat Berita
                </a>

            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <li><a class="dropdown-item" href="' . site_url('admin/pesanan/printAll/' . $item->id) . '" target="_blank">
                        Print Semua Berita
                    </a></li>
                <li><a class="dropdown-item" href="' . site_url('admin/pesanan/printPenyerahan/' . $item->id) . '" target="_blank">
                        Print Penyerahan
                    </a></li>
                <li><a class="dropdown-item" href="' . site_url('admin/pesanan/printPengembalian/' . $item->id) . '" target="_blank">
                        Print Pengembalian
                    </a></li>
            </ul>
        </div>';
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->PesananA_model->count_all(),
            "recordsFiltered" => $this->PesananA_model->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    function tambah()
    {
        $session_data = $this->session->userdata('logged_in');
        $lvl = $session_data['level'];
        if ($lvl == "2") {
            redirect('homepage');
        }

        $config['allowed_types'] = 'pdf';
        $config['upload_path'] = 'assets/upload/nde/';
        $config['encrypt_name'] = TRUE;
        $this->upload->initialize($config);
        $this->load->library('upload', $config);

        $data['judul'] = "Tambah Pesanan";
        $data['nav_pesanan'] = 1;
        $data['produk'] = $this->Pesanan_model->getAllProduk();

        $this->form_validation->set_rules('tgl-awal', 'Tanggal', 'required');
        $this->form_validation->set_rules('tgl-akhir', 'Tanggal', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('nip', 'NIP', 'required');
        $this->form_validation->set_rules('unit', 'Unit', 'required');
        $this->form_validation->set_rules('nde', 'Nota Dinas Elektronik', 'required');

        if ($this->form_validation->run() == FALSE && !$this->upload->do_upload('nde')) {
            $this->load->view('templates/header', $data);
            $this->load->view('admin/navbar', $data);
            $this->load->view('admin/pesanan/add', $data);
            $this->load->view('templates/footer');
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

            // id pesanan = day month year (now) + id + no urut sekarang
            $id = date('ymd') . sprintf("%03s", $id) . sprintf("%03s", $count);

            $master = array(
                "id" => $id,
                "username" => $username,
                "tgl_peminjaman" => $this->input->post('tgl-awal', true),
                "tgl_pengembalian" => $this->input->post('tgl-akhir', true),
                "nama" => $this->input->post('nama', true),
                "nip" => $this->input->post('nip', true),
                "unit" => $this->input->post('unit', true),
                "nde" => $pdf,
                "status" => "1"
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
        $data['master'] = $this->Pesanan_model->getMasterData($id);
        $data['detail'] = $this->Pesanan_model->getDetailData($id);

        $master = $data['master'];
        $day1 = $master['tgl_peminjaman'];
        $day2 = $master['tgl_pengembalian'];

        $day1 = strtotime($day1);
        $day2 = strtotime($day2);

        $day1 = date('D', $day1);
        $day2 = date('D', $day2);

        $dayList = array(
            'Sun' => 'Minggu',
            'Mon' => 'Senin',
            'Tue' => 'Selasa',
            'Wed' => 'Rabu',
            'Thu' => 'Kamis',
            'Fri' => 'Jumat',
            'Sat' => 'Sabtu'
        );

        $data['day1'] = $dayList[$day1];
        $data['day2'] = $dayList[$day2];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/printSerah', $data);
        $this->load->view('templates/printTerima', $data);
        $this->load->view('templates/footer');
    }

    function printPenyerahan($id)
    {
        $data['judul'] = "Berita Serah Terima";
        $data['master'] = $this->Pesanan_model->getMasterData($id);
        $data['detail'] = $this->Pesanan_model->getDetailData($id);

        $master = $data['master'];
        $day1 = $master['tgl_peminjaman'];
        $day2 = $master['tgl_pengembalian'];

        $day1 = strtotime($day1);
        $day2 = strtotime($day2);

        $day1 = date('D', $day1);
        $day2 = date('D', $day2);

        $dayList = array(
            'Sun' => 'Minggu',
            'Mon' => 'Senin',
            'Tue' => 'Selasa',
            'Wed' => 'Rabu',
            'Thu' => 'Kamis',
            'Fri' => 'Jumat',
            'Sat' => 'Sabtu'
        );

        $data['day1'] = $dayList[$day1];
        $data['day2'] = $dayList[$day2];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/printSerah', $data);
        $this->load->view('templates/footer');
    }

    function printPengembalian($id)
    {
        $data['judul'] = "Berita Serah Terima";
        $data['master'] = $this->Pesanan_model->getMasterData($id);
        $data['detail'] = $this->Pesanan_model->getDetailData($id);

        $master = $data['master'];
        $day1 = $master['tgl_peminjaman'];
        $day2 = $master['tgl_pengembalian'];

        $day1 = strtotime($day1);
        $day2 = strtotime($day2);

        $day1 = date('D', $day1);
        $day2 = date('D', $day2);

        $dayList = array(
            'Sun' => 'Minggu',
            'Mon' => 'Senin',
            'Tue' => 'Selasa',
            'Wed' => 'Rabu',
            'Thu' => 'Kamis',
            'Fri' => 'Jumat',
            'Sat' => 'Sabtu'
        );

        $data['day1'] = $dayList[$day1];
        $data['day2'] = $dayList[$day2];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/printTerima', $data);
        $this->load->view('templates/footer');
    }
}
