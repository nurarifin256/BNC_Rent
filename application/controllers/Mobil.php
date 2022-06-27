<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mobil extends CI_Controller
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
        $data['judul'] = 'Mobil';
        $data['mobil'] = $this->Model_mobil->GetSemuaData()->result_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar');
        $this->load->view('mobil/index', $data);
        $this->load->view('template/footer');
        $this->load->view('mobil/script');
    }

    public function tambah()
    {
        $this->form_validation->set_rules('nama_mobil', 'Nama mobil', 'required|trim', [
            'required' => 'Nama mobil harus di isi'
        ]);
        $this->form_validation->set_rules('nopol_mobil', 'Nopol mobil', 'required|trim', [
            'required' => 'Nopol mobil harus di isi'
        ]);
        $this->form_validation->set_rules('harga_sewa', 'Harga sewa', 'required|trim', [
            'required' => 'Harga sewa mobil harus di isi'
        ]);
        $this->form_validation->set_rules('kapasitas', 'Kapasitas', 'required|trim', [
            'required' => 'Kapasitas mobil harus di isi'
        ]);

        if ($this->form_validation->run() == false) {

            $data['judul'] = 'Tambah Data Mobil';

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('template/topbar');
            $this->load->view('mobil/tambah');
            $this->load->view('template/footer');
            $this->load->view('mobil/script');
        } else {
            $gambar = $_FILES['gambar']['name'];

            if ($gambar = '') {
            } else {
                $config['max_size']     = '2048';
                $config['upload_path'] = './assets/img/produk';
                $config['allowed_types'] = 'jpg|jpeg|png';

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('gambar')) {
                    echo "Foto Gagal diupload";
                } else {
                    $gambar = $this->upload->data('file_name');
                }
            }

            $data = [
                'nama_mobil' => htmlspecialchars($this->input->post('nama_mobil', true)),
                'nopol_mobil' => htmlspecialchars($this->input->post('nopol_mobil', true)),
                'harga_sewa' => htmlspecialchars($this->input->post('harga_sewa', true)),
                'kapasitas' => htmlspecialchars($this->input->post('kapasitas', true)),
                'status' => 1,
                'gambar' => $gambar
            ];


            $this->Model_mobil->Simpan_data_mobil($data);
            $datas = ['mobil'   => 'di tambahkan'];

            $this->session->set_userdata($datas);
            redirect('Mobil/index');
        }
    }

    public function hapus()
    {
        $id_mobil = $this->input->post('id_mobil');

        $this->Model_mobil->hapus_mobil($id_mobil);
        $pesan["pesan"] = ($this->db->trans_status()) ? "ok" : "gagal";
        echo json_encode($pesan);
    }

    public function ubah($id_mobil)
    {
        $this->form_validation->set_rules('nama_mobil', 'Nama mobil', 'required|trim', [
            'required' => 'Nama mobil harus di isi'
        ]);
        $this->form_validation->set_rules('nopol_mobil', 'Nopol mobil', 'required|trim', [
            'required' => 'Nopol mobil harus di isi'
        ]);
        $this->form_validation->set_rules('harga_sewa', 'Harga sewa', 'required|trim', [
            'required' => 'Harga sewa mobil harus di isi'
        ]);
        $this->form_validation->set_rules('kapasitas', 'Kapasitas', 'required|trim', [
            'required' => 'Kapasitas mobil harus di isi'
        ]);

        $data['judul'] = 'Tambah Data Mobil';
        $data['mobil'] = $this->Model_mobil->get_mobil_by_id($id_mobil)->row_array();

        if ($this->form_validation->run() == false) {

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('template/topbar');
            $this->load->view('mobil/ubah', $data);
            $this->load->view('template/footer');
            $this->load->view('mobil/script');
        } else {
            $gambar_baru = $_FILES['gambar']['name'];

            if ($gambar_baru = '') {
            } else {
                $config['max_size']     = '2048';
                $config['upload_path'] = './assets/img/produk';
                $config['allowed_types'] = 'jpg|jpeg|png';

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('gambar')) {
                    echo "Foto Gagal diupload";
                } else {
                    $gambar_baru = $this->upload->data('file_name');
                }
            }

            if ($gambar_baru != null) {
                $gambar = $gambar_baru;
            } else {
                $gambar = $data['mobil']['gambar'];
            }

            $harga_sewa = htmlspecialchars($this->input->post('harga_sewa', true));
            $harga_set = preg_replace("/[^0-9]/", "", $harga_sewa);

            $data = [
                'nama_mobil' => htmlspecialchars($this->input->post('nama_mobil', true)),
                'nopol_mobil' => htmlspecialchars($this->input->post('nopol_mobil', true)),
                'harga_sewa' => $harga_set,
                'kapasitas' => htmlspecialchars($this->input->post('kapasitas', true)),
                'gambar' => $gambar
            ];


            $this->Model_mobil->Ubah_data_mobil($id_mobil, $data);
            $datas = ['mobil'   => 'di ubah'];

            $this->session->set_userdata($datas);
            redirect('Mobil/index');
        }
    }
}
