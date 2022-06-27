<?php

class Model_auth extends CI_Model
{
    public function Simpan_data_user($data)
    {
        $this->db->insert('tb_user', $data);
    }

    public function get_user_by_email($email)
    {
        return $this->db->get_where('tb_user', ['email' => $email]);
    }
}
