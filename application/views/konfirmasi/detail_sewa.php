<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800 mt-3">Detail Bookingan</h1>

    <a href="<?= base_url() ?>Konfirmasi/index" class="btn btn-success btn-sm mb-3">Kembali</a>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Mobil</th>
                            <th>Nama Supir</th>
                            <th>Tanggal Sewa Mulai</th>
                            <th>Tanggal Sewa Sampai</th>
                            <th>Lama Sewa</th>
                            <th>Harga Sewa / Hari</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($mobil as $m) : {
                                if ($m['id_supir'] == NULL) {
                                    $supir = "-";
                                } else {
                                    $supir = $m['nama_supir'];
                                }

                                $tgl1 = new DateTime($m['tanggal_sewa_mulai']);
                                $tgl2 = new DateTime($m['tanggal_sewa_sampai']);
                                $jarak = $tgl2->diff($tgl1);
                                $jarak->d;

                                @$total_harga = $jarak->d * $m['harga_sewa'];

                                @$grand_total += $total_harga;
                        ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $m['nama_mobil'] ?></td>
                                    <td><?= $supir ?></td>
                                    <td><?= $m['tanggal_sewa_mulai'] ?></td>
                                    <td><?= $m['tanggal_sewa_sampai'] ?></td>
                                    <td><?= $jarak->d ?></td>
                                    <td><?= number_format($m['harga_sewa']) ?></td>
                                    <td><?= number_format($total_harga) ?></td>
                                </tr>

                        <?php }
                        endforeach; ?>
                    </tbody>
                    <tr>
                        <td class="text-center" colspan="7">Total Harga</td>
                        <td><?= number_format($grand_total) ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->