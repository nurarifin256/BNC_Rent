<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Konfirmasi extends CI_Controller
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

        $data['judul'] = 'Bookingan Saya';
        $data['mobil'] = $this->Model_sewa->get_sewaan_mobil_byid($id_user)->result_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar');
        $this->load->view('konfirmasi/index', $data);
        $this->load->view('template/footer');
        $this->load->view('konfirmasi/script');
    }

    public function detail_booking($id_sewa)
    {
        $id_user = $this->session->userdata('id_user');

        $data['judul'] = 'Detail Bookingan Saya';
        $data['mobil'] = $this->Model_sewa->get_detail_sewaan_mobil_byid($id_sewa, $id_user)->result_array();
        // var_dump($data);
        // die;

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar');
        $this->load->view('konfirmasi/detail_sewa', $data);
        $this->load->view('template/footer');
    }

    public function konfirmasi_pembayaran($id_sewa)
    {
        $this->form_validation->set_rules('nama_pemilik_rekening', 'Nama Pemilik Rekening', 'required|trim', [
            'required' => 'Nama pemilik rekening harus di isi'
        ]);

        $this->form_validation->set_rules('no_rekening', 'No Rekening', 'required|trim', [
            'required' => 'Nomor rekening harus di isi'
        ]);

        if ($this->form_validation->run() == false) {

            $data['judul'] = 'Konfirmasi Pembayaran';
            $data['id_sewaa'] = $id_sewa;

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('template/topbar');
            $this->load->view('konfirmasi/komfirmasi_pembayaran', $data);
            $this->load->view('template/footer');
            $this->load->view('konfirmasi/script', $data);
        } else {
            $gambar = $_FILES['gambar']['name'];

            if ($gambar = '') {
            } else {
                $config['max_size']     = '2048';
                $config['upload_path'] = './assets/img/bukti';
                $config['allowed_types'] = 'jpg|jpeg|png';

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('gambar')) {
                    echo "Foto Gagal diupload";
                } else {
                    $gambar = $this->upload->data('file_name');
                }
            }

            date_default_timezone_set("Asia/Jakarta");

            $id_sewa = htmlspecialchars($this->input->post('id_sewa', true));

            $data = [
                'id_sewa' => $id_sewa,
                'nama_bank' => htmlspecialchars($this->input->post('nama_bank', true)),
                'nama_pemilik_rekening' => htmlspecialchars($this->input->post('nama_pemilik_rekening', true)),
                'no_rekening' => htmlspecialchars($this->input->post('no_rekening', true)),
                'gambar_bukti_pembayaran' => $gambar,
                'tanggal_konfirmasi' => date('Y-m-d')
            ];


            $this->Model_konfirmasi->Simpan_data_konfirmasi($data);
            $this->Model_sewa->Update_konfirmasi($id_sewa);
            $datas = ['konfirmasi'   => 'di konfirmasi'];

            $this->session->set_userdata($datas);
            redirect('Konfirmasi/index');
        }
    }
}
