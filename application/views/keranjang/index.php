<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800 mt-3">Keranjang</h1>

    <?php if ($this->session->userdata('keranjang')) { ?>
        <div class="flash-data" data-flashdata="<?= $this->session->userdata('keranjang') ?>">
            <?php
            $this->session->unset_userdata('keranjang');
            ?>
        </div>
    <?php } ?>


    <!-- DataTales Example -->
    <form action="<?= base_url() ?>Sewa/booking" method="post">
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Mobil</th>
                                <th>Tanggal Mulai Sewa</th>
                                <th>Tanggal Sampai Sewa</th>
                                <th>Harga Sewa / Hari</th>
                                <th>Lama Sewa / Hari</th>
                                <th>Total / Rp</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php


                            $no = 1;
                            foreach ($keranjang as $k) : {
                                    $tgl1 = new DateTime($k['tanggal_sewa_mulai']);
                                    $tgl2 = new DateTime($k['tanggal_sewa_sampai']);
                                    $jarak = $tgl2->diff($tgl1);
                                    $jarak->d;

                                    @$total_harga = $jarak->d * $k['harga_sewa'];

                                    @$grand_total += $total_harga;
                            ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $k['nama_mobil'] ?></td>
                                        <td><?= $k['tanggal_sewa_mulai'] ?></td>
                                        <td><?= $k['tanggal_sewa_sampai'] ?></td>
                                        <td>Rp. <?= number_format($k['harga_sewa'])  ?></td>
                                        <td><?= $jarak->d ?></td>
                                        <td><?= number_format(@$total_harga); ?></td>
                                        <td>
                                            <a class="btn btn-sm btn-danger" href="#" onclick="hapusKeranjangMobil('<?= $k['id_keranjang'] ?>')"></i>Hapus</a>

                                        </td>
                                    </tr>

                            <?php }
                            endforeach; ?>
                            <tr>
                                <td colspan="6" class="text-center">Total</td>
                                <td colspan="2">
                                    <input type="text" class="form-control-plaintext" readonly name="total_bayar" value="<?= number_format(@$grand_total) ?>">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary btn-sm float-right">Booking</button>
    </form>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->