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
            redirect('user/Homepage');
        }

        $this->load->model('Feedback_model');
        $data['judul'] = "Admin Feedback";
        $data['feedback'] = $this->Feedback_model->getAllFeedback();
        $this->load->view('templates/header', $data);
        $this->load->view('admin/navbar');
        $this->load->view('admin/feedback/index');
        $this->load->view('templates/footer');
    }

    function tambah()
    {
        $session_data = $this->session->userdata('logged_in');
        $lvl = $session_data['level'];
        if ($lvl == "2") {
            redirect('user/Homepage');
        }

        $data['judul'] = "Add Feedback";
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        $this->form_validation->set_rules('link_admin', 'Link Admin', 'required');
        $this->form_validation->set_rules('link_user', 'Link User', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('admin/navbar');
            $this->load->view('admin/feedback/add');
            $this->load->view('templates/footer');
        } else {
            $this->Feedback_model->addDataFeedback();
            $this->session->set_flashdata('feedback', 'Ditambahkan');
            redirect('admin/feedback/index');
        }
    }

    function ubah($id)
    {
        $session_data = $this->session->userdata('logged_in');
        $lvl = $session_data['level'];
        if ($lvl == "2") {
            redirect('user/Homepage');
        }
        
        $data['judul'] = "Edit Feedback";
        $data['feedback'] = $this->Feedback_model->getFeedbackById($id);
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        $this->form_validation->set_rules('link_admin', 'Link Admin', 'required');
        $this->form_validation->set_rules('link_user', 'Link User', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('admin/navbar');
            $this->load->view('admin/feedback/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Feedback_model->editDataFeedback();
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
}
