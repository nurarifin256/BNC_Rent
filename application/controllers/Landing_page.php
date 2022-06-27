<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Landing_page extends CI_Controller
{

    public function index()
    {
        $data['judul'] = 'Beranda';
        $data['mobil'] = $this->Model_mobil->GetSemuaData()->result_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar');
        $this->load->view('landing_page/landing_page', $data);
        $this->load->view('template/footer');
        $this->load->view('landing_page/script');
    }

    public function kontak()
    {
        $data['judul'] = 'Kontak';

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar');
        $this->load->view('landing_page/kontak');
        $this->load->view('template/footer');
    }
}
