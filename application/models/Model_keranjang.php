<?php

class Model_keranjang extends CI_Model
{
    public function Simpan_sewaan($data)
    {
        $this->db->insert('tb_keranjang', $data);
    }

    public function get_semua_mobil_by_id_user($id_user)
    {
        $this->db->select('*');
        $this->db->from('tb_keranjang');
        $this->db->join('tb_mobil', 'tb_mobil.id_mobil = tb_keranjang.id_mobil');
        $this->db->join('tb_user', 'tb_user.id_user = tb_keranjang.id_user');
        $this->db->where('tb_keranjang.id_user', $id_user);
        $query = $this->db->get();

        return $query;
    }

    public function hapus_keranjang_mobil($id_keranjang)
    {
        $this->db->trans_start();
        $this->db->delete('tb_keranjang', ['id_keranjang' => $id_keranjang]);
        $this->db->trans_complete();
    }

    public function hapus_semua_keranjang_byid($id_user)
    {
        $this->db->where('id_user', $id_user);
        $this->db->delete('tb_keranjang');
    }
}
