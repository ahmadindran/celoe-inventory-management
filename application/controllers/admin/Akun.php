<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Akun extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Akun_model');
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
        $data['judul'] = "Admin Akun";
        $data['akun'] = $this->Akun_model->getAllAkun();
        $this->load->view('templates/header', $data);
        $this->load->view('admin/navbar');
        $this->load->view('admin/akun/index', $data);
        $this->load->view('templates/footer');
    }

    function tambah()
    {
        $session_data = $this->session->userdata('logged_in');
        $lvl = $session_data['level'];
        if ($lvl == "2") {
            redirect('user/Homepage');
        }
        $data['judul'] = "Tambah Akun";

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[user.username]', array(
            'is_unique'     => 'This %s already exists.'
        ));
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[user.email]', array(
            'is_unique'     => 'This %s already exists.'
        ));
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
        $this->form_validation->set_rules('passwordConf', 'Password', 'trim|required|matches[password]');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('admin/navbar');
            $this->load->view('admin/akun/add');
            $this->load->view('templates/footer');
        } else {
            $input = [
                "nama" => $this->input->post('nama', true),
                "username" => $this->input->post('username', true),
                "email" => $this->input->post('email', true),
                "password" => MD5($this->input->post('password', true)),
                "level" => $this->input->post('level', true)
            ];
            $this->Akun_model->addDataAkun($input);
            $this->session->set_flashdata('username', 'Ditambahkan');
            redirect('admin/akun/index');
        }
    }

    function ubah($username)
    {
        $session_data = $this->session->userdata('logged_in');
        $lvl = $session_data['level'];
        if ($lvl == "2") {
            redirect('user/Homepage');
        }

        $data['judul'] = "Edit Akun";
        $data['level'] = $lvl;
        $data['akun'] = $this->Akun_model->getAkunByUname($username);
        $akun = $data['akun'];

        if ($this->input->post('username') != $akun['username']) {
            $is_unique_uname =  '|is_unique[user.username]';
        } else {
            $is_unique_uname =  '';
        }
        if ($this->input->post('email') != $akun['email']) {
            $is_unique_email =  '|is_unique[user.email]';
        } else {
            $is_unique_email =  '';
        }

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required' . $is_unique_uname);
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email' . $is_unique_email);
        $this->form_validation->set_rules('password', 'Password', 'trim|min_length[8]');
        $this->form_validation->set_rules('passwordConf', 'Password', 'trim|matches[password]');

        $this->form_validation->set_message('username', 'This Username already exists.');
        $this->form_validation->set_message('email', 'This Email already exists.');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('admin/navbar');
            $this->load->view('admin/akun/edit', $data);
            $this->load->view('templates/footer');
        } else {
            if ($this->input->post('password') != $akun['password']) {
                $input = [
                    "nama" => $this->input->post('nama', true),
                    "username" => $this->input->post('username', true),
                    "email" => $this->input->post('email', true),
                    "password" => MD5($this->input->post('password', true)),
                    "level" => $this->input->post('level', true)
                ];
            } else {
                $input = [
                    "nama" => $this->input->post('nama', true),
                    "username" => $this->input->post('username', true),
                    "email" => $this->input->post('email', true),
                    "level" => $this->input->post('level', true)
                ];
            }
            $this->Akun_model->editDataAkun($input);
            $this->session->set_flashdata('username', 'Diubah');
            redirect('admin/akun/index');
        }
    }

    function hapus($username)
    {
        $this->Akun_model->deleteDataAkun($username);
        $this->session->set_flashdata('Akun', 'Dihapus');
        redirect('admin/akun/index');
    }

    public function ajax_list()
    {
        $list = $this->Akun_model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        $status = null;
        foreach ($list as $item) {
            $no++;
            if ($item->level == "1") {
                $status = 'Admin';
            } elseif ($item->level == "2") {
                $status = 'User';
            } elseif ($item->level == "3") {
                $status = 'Super Admin';
            } elseif ($item->level == "0") {
                $status = 'Belum Approve';
            }
            $row = array();
            $row[] = $no;
            $row[] = $item->nama;
            $row[] = $item->username;
            $row[] = $item->email;
            $row[] = $status;
            $row[] = '<div class="row justify-content-center">
            <div class="col-4"><a type="button" class="btn btn-warning  btn-xs" href="' . site_url('admin/akun/ubah/' . $item->username) . '">
                        Ubah
                    </a></div>' .
                '<div class="col-4"><a type="button" class="btn btn-danger btn-xs" href="' . site_url('admin/akun/hapus/'  . $item->username) . '" onclick="return confirm(' . 'Yakin?' . ')">
                                            <i class="fa-regular fa-trash-can"></i> Hapus </a></div>
                                            ';
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Akun_model->count_all(),
            "recordsFiltered" => $this->Akun_model->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }
}
