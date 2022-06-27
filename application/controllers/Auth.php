<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_emails', [
            'required' => 'Email harus di isi',
            'valid_emails' => 'Email harus di isi dengan benar',
        ]);

        $this->form_validation->set_rules('password', 'Password', 'required|trim', [
            'required' => 'Password harus di isi',
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view('auth/login');
            $this->load->view('auth/script');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $email = htmlspecialchars($this->input->post('email', true));
        $password = htmlspecialchars($this->input->post('password', true));

        $user = $this->Model_auth->get_user_by_email($email)->row_array();


        // usernya ada
        if ($user) {

            // cek password
            if (password_verify($password, $user['password'])) {

                $data = [
                    'id_user'   => $user['id_user'],
                    'email'     => $user['email'],
                    'role_id'   => $user['role_id'],
                    'username'      => $user['username']
                ];
                $this->session->set_userdata($data);
                redirect('Landing_page');
            } else {
                $this->session->set_flashdata('pesan_auth', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Password salah
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>');
                redirect('Auth/index');
            }
        } else {
            $this->session->set_flashdata('pesan_auth', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Email belum terdaftar. Silahkan klik buat akun
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('Auth/index');
        }
    }

    public function registrasi()
    {
        $this->form_validation->set_rules('username', 'Nama', 'required|trim', [
            'required' => 'Nama harus di isi'
        ]);

        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_emails|is_unique[tb_user.email]', [
            'required' => 'Email harus di isi',
            'valid_emails' => 'Email harus di isi dengan benar',
            'is_unique' => 'Email sudah terdaftar'
        ]);

        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]', [
            'required' => 'Password harus di isi',
            'min_length' => 'Password minimal 6 karakter'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('auth/registrasi');
        } else {
            $gambar = $_FILES['gambar']['name'];

            if ($gambar = '') {
            } else {
                $config['max_size']     = '2048';
                $config['upload_path'] = './assets/img/ktp';
                $config['allowed_types'] = 'jpg|jpeg|png';

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('gambar')) {
                    echo "Foto Gagal diupload";
                } else {
                    $gambar = $this->upload->data('file_name');
                }
            }

            $data = [
                'username' => htmlspecialchars($this->input->post('username', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role_id' => 3,
                'gambar_ktp' => $gambar
            ];

            $this->Model_auth->Simpan_data_user($data);
            $datas = ['akun'   => 'di daftarkan'];

            $this->session->set_userdata($datas);
            redirect('Auth/index');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('Landing_page');
    }
}
