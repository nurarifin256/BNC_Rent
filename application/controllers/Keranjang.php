<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Keranjang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('role_id') != 3) {
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
        $id_user = $this->session->userdata('id_user');

        $data['judul'] = 'Keranjang';
        $data['keranjang'] = $this->Model_keranjang->get_semua_mobil_by_id_user($id_user)->result_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar');
        $this->load->view('keranjang/index', $data);
        $this->load->view('template/footer');
        $this->load->view('keranjang/script');
    }

    public function hapus_keranjang_mobil()
    {
        $id_keranjang = $this->input->post('id_keranjang');

        $this->Model_keranjang->hapus_keranjang_mobil($id_keranjang);
        $pesan["pesan"] = ($this->db->trans_status()) ? "ok" : "gagal";
        echo json_encode($pesan);
    }
}
