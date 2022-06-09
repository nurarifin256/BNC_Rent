<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Landing_page extends CI_Controller
{

    public function index()
    {
        $data['judul'] = 'Beranda';

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('landing_page/landing_page');
        $this->load->view('template/footer');
    }
}
