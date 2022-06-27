<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sewa extends CI_Controller
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

    public function index($id_mobil)
    {
        $data['judul'] = 'Sewa Mobil';
        $data['mobil'] = $this->Model_mobil->get_mobil_by_id($id_mobil)->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar');
        $this->load->view('sewa/index', $data);
        $this->load->view('template/footer');
        $this->load->view('sewa/script', $data);
    }

    public function sewa_mobil($id_mobil)
    {
        $data = [
            'id_user' => $this->session->userdata('id_user'),
            'id_mobil' => $id_mobil,
            'tanggal_sewa_mulai' => $this->input->post('tanggal_sewa_mulai'),
            'tanggal_sewa_sampai' => $this->input->post('tanggal_sewa_sampai'),
            'total_bayar_keranjang' => $this->input->post('total_bayar_keranjang')
        ];

        $this->Model_keranjang->Simpan_sewaan($data);

        $datas = ['mobil'   => 'di tambahkan ke keranjang'];

        $this->session->set_userdata($datas);
        redirect('Landing_page/index');
    }

    public function booking()
    {
        $id_user = $this->session->userdata('id_user');
        $total_bayar = htmlspecialchars($this->input->post('total_bayar', true));
        $total_bayar_set = preg_replace("/[^0-9]/", "", $total_bayar);

        $data = [
            'id_user'       => $id_user,
            'status'        => 1,
            'total_bayar'   => $total_bayar_set
        ];
        $this->Model_sewa->booking_mobil($data);

        $id_sewa    = $this->db->insert_id();
        $id_booking = $this->Model_keranjang->get_semua_mobil_by_id_user($id_user)->result_array();


        foreach ($id_booking as $b) {
            $data = [
                'id_sewa'  => $id_sewa,
                'id_mobil'          => $b['id_mobil'],
                'id_supir'          => NULL,
                'tanggal_sewa_mulai' => $b['tanggal_sewa_mulai'],
                'tanggal_sewa_sampai' => $b['tanggal_sewa_sampai'],
                'total_bayar_detail' => $b['total_bayar_keranjang'],
            ];

            $this->Model_sewa->booking_mobil_detail($data);
            $this->Model_keranjang->hapus_semua_keranjang_byid($id_user);
        }
        redirect('Sewa/pembayaran');
    }

    public function pembayaran()
    {
        $data['judul'] = 'Pembayaran';

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar');
        $this->load->view('sewa/pembayaran');
        $this->load->view('template/footer');
    }

    function tanggalsudahada()
    {
        $id_mobil = $this->input->post("id_mobil");
        $tanggal = $this->input->post("tanggal");

        $sql = $this->db->query("SELECT A.id_detail_sewa FROM tb_detail_sewa A INNER JOIN tb_sewa B ON B.id_sewa=A.id_sewa
                                WHERE B.status=5 AND A.id_mobil='$id_mobil'
                                AND (A.tanggal_sewa_mulai BETWEEN '$tanggal' AND '$tanggal'
                                    OR A.tanggal_sewa_sampai BETWEEN '$tanggal' AND '$tanggal')");

        $hasil = ($sql->num_rows() > 0) ? "ada" : "ok";
        $data["hasil"] = $hasil;
        echo json_encode($data);
    }
}
