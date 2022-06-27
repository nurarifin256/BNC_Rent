<?php

class Model_laporan extends CI_Model
{
    public function getLaporan($tgl1, $tgl2)
    {
        return $this->db->query("SELECT SUM(C.total_bayar_detail) AS pendapatan, D.nama_mobil AS namaMobil, D.id_mobil AS idMobil , A.tanggal_konfirmasi AS tanggalKonfirmasi
        FROM tb_konfirmasi A
        INNER JOIN tb_sewa B ON B.id_sewa=A.id_sewa 
        INNER JOIN tb_detail_sewa C ON C.id_sewa=B.id_sewa 
        INNER JOIN tb_mobil D ON D.id_mobil=C.id_mobil
        WHERE B.status=4 OR B.status=5
        AND A.tanggal_konfirmasi BETWEEN '$tgl1' AND '$tgl2'
        GROUP BY D.nama_mobil");
    }

    public function get_detail_laporan($id_mobil, $tgl1, $tgl2)
    {
        return $this->db->query("SELECT *
        FROM tb_konfirmasi A
        INNER JOIN tb_sewa B ON B.id_sewa=A.id_sewa 
        INNER JOIN tb_detail_sewa C ON C.id_sewa=B.id_sewa 
        INNER JOIN tb_mobil D ON D.id_mobil=C.id_mobil
        INNER JOIN tb_user E ON E.id_user=B.id_user
        WHERE D.id_mobil=$id_mobil
        AND A.tanggal_konfirmasi BETWEEN '$tgl1' AND '$tgl2'");
    }
}
