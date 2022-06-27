<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('role_id') == 3) {
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
        $data['judul'] = 'Konfirmasi Bookingan';
        $data['sewaan'] = $this->Model_sewa->get_semua_data()->result_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar');
        $this->load->view('admin/index', $data);
        $this->load->view('template/footer');
        $this->load->view('admin/script');
    }

    public function detail_booking($id_sewa, $id_user)
    {
        $data['judul'] = 'Detail Bookingan';
        $data['mobil'] = $this->Model_sewa->get_detail_sewaan_mobil_byid($id_sewa, $id_user)->result_array();
        $data['supir'] = $this->Model_driver->GetSemuaData()->result_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar');
        $this->load->view('admin/detail_booking', $data);
        $this->load->view('template/footer');
        $this->load->view('admin/script');
    }

    public function update_supir()
    {
        $id_supir = $this->input->post('id_supir');
        $id_detail_sewa = $this->input->post('id_detail_sewa');

        $this->Model_sewa->update_supir($id_supir, $id_detail_sewa);
    }

    public function approve_booking($id_sewa)
    {
        $this->Model_sewa->approve_booking($id_sewa);

        $datas = ['sewa'   => 'di approve'];

        $this->session->set_userdata($datas);
        redirect('Admin/index');
    }

    public function approve_pembayaran_booking($id_sewa)
    {
        $this->Model_konfirmasi->approve_pembayaran($id_sewa);

        $datas = ['sewa'   => 'di approve'];

        $this->session->set_userdata($datas);
        redirect('Admin/approve_pembayaran');
    }

    public function tolak_bookingan($id_sewa)
    {
        $this->Model_sewa->tolak_bookingan($id_sewa);

        $datas = ['sewa'   => 'di tolak'];

        $this->session->set_userdata($datas);
        redirect('Admin/index');
    }

    public function tolak_pembayaran($id_sewa)
    {
        $this->Model_konfirmasi->tolak_pembayaran($id_sewa);

        $datas = ['sewa'   => 'di tolak'];

        $this->session->set_userdata($datas);
        redirect('Admin/approve_pembayaran');
    }

    public function approve_pembayaran()
    {
        $data['judul'] = 'Approve Pembayaran';
        $data['konfirmasi'] = $this->Model_konfirmasi->get_semua_data()->result_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar');
        $this->load->view('admin/approve_pembayaran', $data);
        $this->load->view('template/footer');
        $this->load->view('admin/script');
    }
}
