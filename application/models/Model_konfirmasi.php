<?php

class Model_konfirmasi extends CI_Model
{

    public function Simpan_data_konfirmasi($data)
    {
        $this->db->insert('tb_konfirmasi', $data);
    }

    public function get_semua_data()
    {
        $this->db->select('*');
        $this->db->from('tb_konfirmasi');
        $this->db->join('tb_sewa', 'tb_sewa.id_sewa = tb_konfirmasi.id_sewa');
        $this->db->join('tb_user', 'tb_user.id_user = tb_sewa.id_user');
        $this->db->where('tb_sewa.status', 4);
        $this->db->or_where('tb_sewa.status', 5);
        $this->db->or_where('tb_sewa.status', 6);
        $this->db->order_by('tb_sewa.id_sewa', 'DESC');
        $query = $this->db->get();

        return $query;
    }

    public function get_ketersediaan_mobil($id_mobil)
    {
        return $this->db->query("SELECT * FROM tb_konfirmasi A INNER JOIN tb_sewa B ON B.id_sewa=A.id_sewa INNER JOIN tb_detail_sewa C ON C.id_sewa=B.id_sewa INNER JOIN tb_mobil D ON D.id_mobil=C.id_mobil WHERE C.id_mobil=$id_mobil AND B.status=5 ORDER BY C.tanggal_sewa_mulai='ASC'");
    }

    public function approve_pembayaran($id_sewa)
    {
        $this->db->set('status', 5);
        $this->db->where('id_sewa', $id_sewa);
        $this->db->update('tb_sewa');
    }

    public function tolak_pembayaran($id_sewa)
    {
        $this->db->set('status', 6);
        $this->db->where('id_sewa', $id_sewa);
        $this->db->update('tb_sewa');
    }
}
