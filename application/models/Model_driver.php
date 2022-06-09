<?php

class Model_driver extends CI_Model
{
    public function Simpan_data_supir($data)
    {
        $this->db->insert('tb_supir', $data);
    }

    public function GetSemuaData()
    {
        return $this->db->get('tb_supir');
    }

    public function hapus_driver($id_supir)
    {
        $this->db->trans_start();
        $this->db->delete('tb_supir', ['id_supir' => $id_supir]);
        $this->db->trans_complete();
    }

    public function get_data_supir_byId($id_supir)
    {
        return $this->db->get_where('tb_supir', ['id_supir' => $id_supir]);
    }

    public function Ubah_data_supir($id_supir, $data)
    {
        $this->db->set($data);
        $this->db->where('id_supir', $id_supir);
        $this->db->update('tb_supir');
    }
}
