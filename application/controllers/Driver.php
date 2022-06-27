<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Driver extends CI_Controller
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
        $data['judul'] = 'Driver';
        $data['driver'] = $this->Model_driver->GetSemuaData()->result_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar');
        $this->load->view('driver/index', $data);
        $this->load->view('template/footer');
        $this->load->view('driver/script');
    }

    public function tambah()
    {
        $this->form_validation->set_rules('nama_supir', 'Nama', 'required|trim', [
            'required' => 'Nama driver harus di isi'
        ]);

        $this->form_validation->set_rules('no_handphone', 'No Handphone', 'required|trim|min_length[12]|max_length[13]', [
            'required' => 'No handphone harus di isi',
            'min_length' => 'No handphone minimal 12 digit',
            'max_length' => 'No handphone maksimal 13 digit',
        ]);

        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', [
            'required' => 'Alamat harus di isi'
        ]);

        if ($this->form_validation->run() == false) {

            $data['judul'] = 'Tambah Data Driver';

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('template/topbar');
            $this->load->view('driver/tambah');
            $this->load->view('template/footer');
            $this->load->view('driver/script');
        } else {
            $data = [
                'nama_supir' => htmlspecialchars($this->input->post('nama_supir', true)),
                'no_handphone' => htmlspecialchars($this->input->post('no_handphone', true)),
                'alamat' => htmlspecialchars($this->input->post('alamat', true)),
                'status' => 1,
            ];

            $this->Model_driver->Simpan_data_supir($data);
            $datas = ['driver'   => 'di tambahkan'];

            $this->session->set_userdata($datas);
            redirect('Driver/index');
        }
    }

    public function hapus()
    {
        $id_supir = $this->input->post('id_supir');

        $this->Model_driver->hapus_driver($id_supir);
        $pesan["pesan"] = ($this->db->trans_status()) ? "ok" : "gagal";
        echo json_encode($pesan);
    }

    public function ubah($id_supir)
    {
        $this->form_validation->set_rules('nama_supir', 'Nama', 'required|trim', [
            'required' => 'Nama driver harus di isi'
        ]);

        $this->form_validation->set_rules('no_handphone', 'No Handphone', 'required|trim|min_length[12]|max_length[13]', [
            'required' => 'No handphone harus di isi',
            'min_length' => 'No handphone minimal 12 digit',
            'max_length' => 'No handphone maksimal 13 digit',
        ]);

        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', [
            'required' => 'Alamat harus di isi'
        ]);

        if ($this->form_validation->run() == false) {

            $data['judul'] = 'Ubah Data Driver';
            $data['driver'] = $this->Model_driver->get_data_supir_byId($id_supir)->row_array();

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('template/topbar');
            $this->load->view('driver/ubah');
            $this->load->view('template/footer');
            $this->load->view('driver/script');
        } else {
            $id_supir = $id_supir;
            $data = [
                'nama_supir' => htmlspecialchars($this->input->post('nama_supir', true)),
                'no_handphone' => htmlspecialchars($this->input->post('no_handphone', true)),
                'alamat' => htmlspecialchars($this->input->post('alamat', true)),
            ];

            $this->Model_driver->Ubah_data_supir($id_supir, $data);
            $datas = ['driver'   => 'di ubah'];

            $this->session->set_userdata($datas);
            redirect('Driver/index');
        }
    }
}
