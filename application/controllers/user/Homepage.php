<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Homepage extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Homepage_model');
        $this->load->library('pagination');
        if (!$this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $level = $session_data['level'];
            if ($level == '1') {
                $pemberitahuan = "<div class='alert alert-warning'>Anda harus login dulu </div>";
                $this->session->set_flashdata('pemberitahuan', $pemberitahuan);
                redirect('login');
            }
        }
    }

    function index()
    {
        $session_data = $this->session->userdata('logged_in');
        $lvl = $session_data['level'];
        if ($lvl == "1") {
            redirect('admin/Homepage');
        }

        if (isset($_POST['submit'])) {
            $data['keyword'] = $this->input->post('keyword');
            $this->session->get_userdata('keyword', $data['keyword']);
        } else {
            $data['keyword'] = $this->session->userdata('keyword');
        }

        $data['judul'] = "Homepage User";
        $session_data = $this->session->userdata('logged_in');
        $sesi['nama'] = $session_data['nama'];
        $sesi['username'] = $session_data['username'];
        $sesi['email'] = $session_data['email'];

        $data['uname'] = $sesi['username'];

        $config['base_url'] = 'http://localhost/magang-ci3/user/homepage/index';
        $this->db->like('nama', $data['keyword']);
        $this->db->or_like('id', $data['keyword']);
        $this->db->from('produk');
        $config['total_rows'] = $this->db->count_all_results();
        $config['per_page'] = 6;

        $config['full_tag_open'] = '<nav aria-label="Page navigation example"><ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul></nav>';

        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';

        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';

        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="page-item active" aria-current="page"> <a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';

        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';

        $config['attributes'] = array('class' => 'page-link');

        $this->pagination->initialize($config);

        $data['start'] = $this->uri->segment(4);
        $data['produk'] = $this->Homepage_model->getProduk($config['per_page'], $data['start'], $data['keyword']);

        $this->load->view('templates/header', $data);
        $this->load->view('user/navbar');
        $this->load->view('user/index', $sesi);
        $this->load->view('templates/footer');
    }
}
