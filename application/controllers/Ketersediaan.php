<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ketersediaan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('role_id')) {
            $this->session->set_flashdata('pesan_auth', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Login terlebih dahulu
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');

            redirect('Auth/index');
        }
    }

    public function index($id_mobil)
    {
        $data['judul'] = "Ketersediaan Mobil";
        $data['mobil'] = $this->Model_konfirmasi->get_ketersediaan_mobil($id_mobil)->result_array();
        $data['nama_mobil'] = $this->Model_mobil->get_mobil_by_id($id_mobil)->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar');
        $this->load->view('ketersediaan/index', $data);
        $this->load->view('template/footer');
    }
}
