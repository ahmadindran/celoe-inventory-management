<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Brand extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Brand_model');
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

        $this->load->model('Brand_model');
        $data['judul'] = "Admin Brand";
        $data['brand'] = $this->Brand_model->getAllBrand();
        $data['nav_brand'] = 1;

        $this->load->view('templates/header', $data);
        $this->load->view('admin/navbar');
        $this->load->view('admin/brand/index');
        $this->load->view('templates/footer');
    }

    function tambah()
    {
        $session_data = $this->session->userdata('logged_in');
        $lvl = $session_data['level'];
        if ($lvl == "2") {
            redirect('homepage');
        }

        $data['judul'] = "Add Brand";
        $data['nav_brand'] = 1;

        $this->form_validation->set_rules('brand', 'Brand', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('admin/navbar', $data);
            $this->load->view('admin/brand/add');
            $this->load->view('templates/footer');
        } else {
            $data = [
                "brand" => $this->input->post('brand', true),
                "active" => $this->input->post('active', true),
                "status" => '1'
            ];
            $this->Brand_model->addDataBrand($data);
            $this->session->set_flashdata('brand', 'Ditambahkan');
            redirect('admin/brand/index');
        }
    }

    function ubah($id)
    {
        $session_data = $this->session->userdata('logged_in');
        $lvl = $session_data['level'];
        if ($lvl == "2") {
            redirect('homepage');
        }

        $data['judul'] = "Edit Brand";
        $data['nav_brand'] = 1;
        $data['brand'] = $this->Brand_model->getBrandById($id);
        $this->form_validation->set_rules('brand', 'Brand', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('admin/navbar', $data);
            $this->load->view('admin/brand/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                "brand" => $this->input->post('brand', true),
                "active" => $this->input->post('active', true),
            ];
            $this->Brand_model->editDataBrand($data);
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

    public function ajax_list()
    {
        $list = $this->Brand_model->get_datatables();
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
            $row[] = $item->brand;
            $row[] = $status;
            $row[] = '<div class="row justify-content-center">
            <div class="col-4"><a type="button" class="btn btn-warning  btn-xs" href="' . site_url('admin/brand/ubah/' . $item->id) . '">
                        Ubah
                    </a></div>' .
                '<div class="col-4"><a type="button" id="hapus" class="btn btn-danger btn-xs" href="' . site_url('admin/brand/hapus/'  . $item->id) . '" onclick="return confirm(' . 'Yakin?' . ')">
                                            <i class="fa-regular fa-trash-can"></i> Hapus </a></div>
                                            ';
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Brand_model->count_all(),
            "recordsFiltered" => $this->Brand_model->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }
}
