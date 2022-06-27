<?php

class Model_mobil extends CI_Model
{
    public function GetSemuaData()
    {
        return $this->db->get('tb_mobil');
    }

    public function Simpan_data_mobil($data)
    {
        $this->db->insert('tb_mobil', $data);
    }

    public function hapus_mobil($id_mobil)
    {
        $this->db->trans_start();
        $this->db->delete('tb_mobil', ['id_mobil' => $id_mobil]);
        $this->db->trans_complete();
    }

    public function get_mobil_by_id($id_mobil)
    {
        return $this->db->get_where('tb_mobil', ['id_mobil' => $id_mobil]);
    }

    public function Ubah_data_mobil($id_mobil, $data)
    {
        $this->db->set($data);
        $this->db->where('id_mobil', $id_mobil);
        $this->db->update('tb_mobil');
    }
}
