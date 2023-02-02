<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Kategori_model');
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

        $this->load->model('Kategori_model');
        $data['judul'] = "Admin Kategori";
        $data['nav_kategori'] = 1;
        $data['kategori'] = $this->Kategori_model->getAllKategori();
        $this->load->view('templates/header', $data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/kategori/index');
        $this->load->view('templates/footer');
    }

    function tambah()
    {
        $session_data = $this->session->userdata('logged_in');
        $lvl = $session_data['level'];
        if ($lvl == "2") {
            redirect('homepage');
        }

        $data['judul'] = "Add Kategori";
        $data['nav_kategori'] = 1;

        $this->form_validation->set_rules('kategori', 'Kategori', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('admin/navbar', $data);
            $this->load->view('admin/kategori/add');
            $this->load->view('templates/footer');
        } else {
            $data = [
                "categories" => $this->input->post('kategori', true),
                "active" => $this->input->post('active', true),
                "status" => '1'
            ];
            $this->Kategori_model->addDataKategori($data);
            $this->session->set_flashdata('kategori', 'Ditambahkan');
            redirect('admin/kategori/index');
        }
    }

    function ubah($id)
    {
        $session_data = $this->session->userdata('logged_in');
        $lvl = $session_data['level'];
        if ($lvl == "2") {
            redirect('homepage');
        }

        $data['judul'] = "Edit Kategori";
        $data['nav_kategori'] = 1;

        $data['kategori'] = $this->Kategori_model->getKategoriById($id);
        $this->form_validation->set_rules('kategori', 'kategori', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('admin/navbar', $data);
            $this->load->view('admin/kategori/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                "categories" => $this->input->post('kategori', true),
                "active" => $this->input->post('active', true),
            ];
            $this->Kategori_model->editDataKategori($data);
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

    public function ajax_list()
    {
        $list = $this->Kategori_model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        $status =  null;
        foreach ($list as $item) {
            $no++;

            if ($item->active == "1") {
                $status = 'Tersedia';
            } elseif ($item->active == "2") {
                $status = 'Tidak Tersedia';
            }
            $row = array();
            $row[] = $no;
            $row[] = $item->categories;
            $row[] = $status;
            $row[] = '<div class="row justify-content-center">
            <div class="col-4"><a type="button" class="btn btn-warning  btn-xs" href="' . site_url('admin/kategori/ubah/' . $item->id) . '">
                        Ubah
                    </a></div>' .
                '<div class="col-4"><a type="button" class="btn btn-danger btn-xs" href="' . site_url('admin/kategori/hapus/'  . $item->id) . '" onclick="return confirm(' . 'Yakin?' . ')">
                                            <i class="fa-regular fa-trash-can"></i> Hapus </a></div>
                                            ';
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Kategori_model->count_all(),
            "recordsFiltered" => $this->Kategori_model->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }
}
