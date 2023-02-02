<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Feedback extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
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
        if ($lvl == "2") {
            redirect('homepage');
        }

        $this->load->model('Feedback_model');

        $data['judul'] = "Admin Feedback";
        $data['nav_feedback'] = 1;
        $data['feedback'] = $this->Feedback_model->getAllFeedback();

        $this->load->view('templates/header', $data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/feedback/index');
        $this->load->view('templates/footer');
    }

    function tambah()
    {
        $session_data = $this->session->userdata('logged_in');
        $lvl = $session_data['level'];
        if ($lvl == "2") {
            redirect('homepage');
        }

        $data['judul'] = "Add Feedback";
        $data['nav_feedback'] = 1;

        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        $this->form_validation->set_rules('link_admin', 'Link Admin', 'required');
        $this->form_validation->set_rules('link_user', 'Link User', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('admin/navbar', $data);
            $this->load->view('admin/feedback/add');
            $this->load->view('templates/footer');
        } else {
            $data = [
                "deskripsi" => $this->input->post('deskripsi', true),
                "link_admin" => $this->input->post('link_admin', true),
                "link_user" => $this->input->post('link_user', true),
                "status" => '1'
            ];
            $this->Feedback_model->addDataFeedback($data);
            $this->session->set_flashdata('feedback', 'Ditambahkan');
            redirect('admin/feedback/index');
        }
    }

    function ubah($id)
    {
        $session_data = $this->session->userdata('logged_in');
        $lvl = $session_data['level'];
        if ($lvl == "2") {
            redirect('homepage');
        }

        $data['judul'] = "Edit Feedback";
        $data['nav_feedback'] = 1;
        $data['feedback'] = $this->Feedback_model->getFeedbackById($id);

        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        $this->form_validation->set_rules('link_admin', 'Link Admin', 'required');
        $this->form_validation->set_rules('link_user', 'Link User', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('admin/navbar', $data);
            $this->load->view('admin/feedback/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                "deskripsi" => $this->input->post('deskripsi', true),
                "link_admin" => $this->input->post('link_admin', true),
                "link_user" => $this->input->post('link_user', true),
            ];
            $this->Feedback_model->editDataFeedback($data);
            $this->session->set_flashdata('feedback', 'Diubah');
            redirect('admin/feedback/index');
        }
    }

    function hapus($id)
    {
        $this->Feedback_model->deleteDataFeedback($id);
        $this->session->set_flashdata('feedback', 'Dihapus');
        redirect('admin/Feedback/index');
    }

    public function ajax_list()
    {
        $list = $this->Feedback_model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $item) {
            $no++;

            $row = array();
            $row[] = $no;
            $row[] = $item->deskripsi;
            $row[] = '<a href="' . $item->link_admin . '" class="link-primary" target="_blank">Klik disini</a>';
            $row[] = '<a href="' . $item->link_user . '" class="link-primary" target="_blank">Klik disini</a>';
            $row[] = '<div class="row justify-content-center">
            <div class="col-4"><a type="button" class="btn btn-warning  btn-xs" href="' . site_url('admin/feedback/ubah/' . $item->id) . '">
                        Ubah
                    </a></div>' .
                '<div class="col-4"><a type="button" class="btn btn-danger btn-xs" href="' . site_url('admin/feedback/hapus/'  . $item->id) . '" onclick="return confirm(' . 'Yakin?' . ')">
                                            <i class="fa-regular fa-trash-can"></i> Hapus </a></div>
                                            ';
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Feedback_model->count_all(),
            "recordsFiltered" => $this->Feedback_model->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }
}
