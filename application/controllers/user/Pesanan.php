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
        $data['judul'] = "Pemesanan";
        $data['nav_psn'] = 1;
        $data['pesanan'] = $this->Pesanan_model->getPesananUser($username);
        $data['feedback'] = $this->Feedback_model->getLink();
        $this->load->view('templates/header', $data);
        $this->load->view('user/navbar', $data);
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
        $data['nav_psn'] = 1;

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
            $this->load->view('user/navbar', $data);
            $this->load->view('user/pesanan/add', $data);
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

            // id pesanan = day month year (now) + no urut sekarang
            $id = date('dmy') . sprintf("%03s", $id) . sprintf("%03s", $count);

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

            redirect('user/pesanan/index');
        }
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

        $day1A = strtotime($day1);
        $day2B = strtotime($day2);

        $day1 = date('D', $day1A);
        $day2 = date('D', $day2B);

        $dayList = array(
            'Sun' => 'Minggu',
            'Mon' => 'Senin',
            'Tue' => 'Selasa',
            'Wed' => 'Rabu',
            'Thu' => 'Kamis',
            'Fri' => 'Jumat',
            'Sat' => 'Sabtu'
        );

        // $bulan = array(
        //     1 =>   'Januari',
        //     'Februari',
        //     'Maret',
        //     'April',
        //     'Mei',
        //     'Juni',
        //     'Juli',
        //     'Agustus',
        //     'September',
        //     'Oktober',
        //     'November',
        //     'Desember'
        // );
        // $pecahkan = explode('-', $day1A);

        // // variabel pecahkan 0 = tanggal
        // // variabel pecahkan 1 = bulan
        // // variabel pecahkan 2 = tahun

        // $data['tgl'] = $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];

        $data['day1'] = $dayList[$day1];
        $data['day2'] = $dayList[$day2];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/printTerima', $data);
        $this->load->view('templates/footer');
    }

    public function ajax_list()
    {
        $session_data = $this->session->userdata('logged_in');
        $keyword = $session_data['username'];
        $list = $this->Pesanan_model->get_datatables();
        $data = $this->Feedback_model->getLink();
        $link = $data['link_user'];
        $data = array();
        $no = $_POST['start'];
        $status =  null;
        foreach ($list as $item) {
            if ($item->username == $keyword) {
                $no++;

                if ($item->status == "1") {
                    $status = '<button type="button" class="btn btn-secondary">Proses</button>';
                } elseif ($item->status == "2") {
                    $status = '<button type="button" class="btn btn-info">Dalam Peminjaman</button>';
                } elseif ($item->status == "3") {
                    $status = '<a type="button" class="btn btn-success" href="' . $link . '">Feedback</a>';
                }
                $row = array();
                $row[] = $no;
                $row[] = $item->id;
                $row[] = $item->tgl_peminjaman;
                $row[] = $item->tgl_pengembalian;
                $row[] = '<div class="row justify-content-center">
            <div class="col-4"><div class="dropdown">
            <a class="btn btn-danger dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                Surat Berita
            </a>

            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <li><a class="dropdown-item" href="' . site_url('pesanan/printAll/' . $item->id) . '" target="_blank">
                        Print Semua Berita
                    </a></li>
                <li><a class="dropdown-item" href="' . site_url('pesanan/printPenyerahan/' . $item->id) . '" target="_blank">
                        Print Penyerahan
                    </a></li>
                <li><a class="dropdown-item" href="' . site_url('pesanan/printPengembalian/' . $item->id) . '" target="_blank">
                        Print Pengembalian
                    </a></li>
            </ul>
        </div></div><div class="col-4">' . $status . '</div>';
                $data[] = $row;
            }
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Pesanan_model->count_all(),
            "recordsFiltered" => $this->Pesanan_model->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    // function tanggal_indonesia($tanggal)
    // {

    //     $bulan = array(
    //         1 =>       'Januari',
    //         'Februari',
    //         'Maret',
    //         'April',
    //         'Mei',
    //         'Juni',
    //         'Juli',
    //         'Agustus',
    //         'September',
    //         'Oktober',
    //         'November',
    //         'Desember'
    //     );

    //     $var = explode('-', $tanggal);

    //     return $var[2] . ' ' . $bulan[(int)$var[1]] . ' ' . $var[0];
    //     // var 0 = tanggal
    //     // var 1 = bulan
    //     // var 2 = tahun
    // }
}
