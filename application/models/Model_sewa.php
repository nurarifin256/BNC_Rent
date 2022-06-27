<?php

class Model_sewa extends CI_Model
{
    public function booking_mobil($data)
    {
        $this->db->insert('tb_sewa', $data);
    }

    public function booking_mobil_detail($data)
    {
        $this->db->insert('tb_detail_sewa', $data);
    }

    public function get_sewaan_mobil_byid($id_user)
    {
        $this->db->select('*');
        $this->db->from('tb_sewa');
        $this->db->join('tb_user', 'tb_user.id_user = tb_sewa.id_user');
        $this->db->where('tb_sewa.id_user', $id_user);
        $this->db->order_by('tb_sewa.id_sewa', 'DESC');
        $query = $this->db->get();

        return $query;
    }

    public function get_detail_sewaan_mobil_byid($id_sewa, $id_user)
    {
        $this->db->select('*');
        $this->db->from('tb_detail_sewa');
        $this->db->join('tb_sewa', 'tb_sewa.id_sewa = tb_detail_sewa.id_sewa');
        $this->db->join('tb_user', 'tb_user.id_user = tb_sewa.id_user');
        $this->db->join('tb_mobil', 'tb_mobil.id_mobil = tb_detail_sewa.id_mobil');
        $this->db->join('tb_supir', 'tb_supir.id_supir = tb_detail_sewa.id_supir',  'left');
        $this->db->where('tb_sewa.id_user', $id_user);
        $this->db->where('tb_detail_sewa.id_sewa', $id_sewa);
        $query = $this->db->get();

        return $query;
    }

    public function get_semua_data()
    {
        $this->db->select('*');
        $this->db->from('tb_sewa');
        $this->db->join('tb_user', 'tb_user.id_user = tb_sewa.id_user');
        $this->db->where('tb_sewa.status', 1);
        $this->db->or_where('tb_sewa.status', 2);
        $this->db->or_where('tb_sewa.status', 3);
        $query = $this->db->get();

        return $query;
    }

    public function update_supir($id_supir, $id_detail_sewa)
    {
        $this->db->set('id_supir', $id_supir);
        $this->db->where('id_detail_sewa', $id_detail_sewa);
        $this->db->update('tb_detail_sewa');
    }

    public function approve_booking($id_sewa)
    {
        $this->db->set('status', 2);
        $this->db->where('id_sewa', $id_sewa);
        $this->db->update('tb_sewa');
    }

    public function tolak_bookingan($id_sewa)
    {
        $this->db->set('status', 3);
        $this->db->where('id_sewa', $id_sewa);
        $this->db->update('tb_sewa');
    }

    public function Update_konfirmasi($id_sewa)
    {
        $this->db->set('status', 4);
        $this->db->where('id_sewa', $id_sewa);
        $this->db->update('tb_sewa');
    }
}
