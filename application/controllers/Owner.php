<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Owner extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('role_id') != 1) {
            $this->session->set_flashdata('pesan_auth', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Login terlebih dahulu
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');

            redirect('Auth/index');
        }
    }

    public function index()
    {
        $data['judul'] = 'Laporan';

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar');
        $this->load->view('owner/index');
        $this->load->view('template/footer');
    }

    public function laporan()
    {
        $tgl1 = $this->input->get('tanggal1');
        $tgl2 = $this->input->get('tanggal2');

        $data['judul'] = 'Laporan';
        $data['laporan'] = $this->Model_laporan->getLaporan($tgl1, $tgl2)->result_array();
        $data["tgl1"] = $tgl1;
        $data["tgl2"] = $tgl2;

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar');
        $this->load->view('owner/laporan', $data);
        $this->load->view('template/footer');
    }

    public function detail_laporan($id_mobil, $tgl1, $tgl2)
    {
        $data['judul'] = 'Detail Laporan';
        $data['laporan'] = $this->Model_laporan->get_detail_laporan($id_mobil, $tgl1, $tgl2)->result_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar');
        $this->load->view('owner/detail_laporan', $data);
        $this->load->view('template/footer');
    }

    public function print_laporan()
    {
        $this->load->library('Mypdf');
        $tgl1 = $this->input->post("tgl1");
        $tgl2 = $this->input->post("tgl2");
        $data = [
            'tgl1' => $tgl1,
            'tgl2' => $tgl2
        ];
        $data['data'] = $this->Model_laporan->getLaporan($tgl1, $tgl2)->result_array();

        $this->mypdf->generate('owner/print_laporan', $data, 'laporan', 'A4', 'landscape');
    }
}
