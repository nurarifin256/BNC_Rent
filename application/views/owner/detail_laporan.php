<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800 mt-3">Detail Laporan</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama Penyewa</th>
                            <th>Tanggal Mulai Sewa</th>
                            <th>Tanggal Sampai Sewa</th>
                            <th>Lama Sewa</th>
                            <th>Harga Sewa / Hari</th>
                            <th>Total Bayar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($laporan as $l) : {
                                $tgl1 = new DateTime($l['tanggal_sewa_mulai']);
                                $tgl2 = new DateTime($l['tanggal_sewa_sampai']);
                                $jarak = $tgl2->diff($tgl1);
                                $jarak->d;

                                @$total_harga = $jarak->d * $l['harga_sewa'];

                                @$grand_total += $total_harga;
                        ?>
                                <tr>
                                    <td><?= $l['username'] ?></td>
                                    <td><?= $l['tanggal_sewa_mulai'] ?></td>
                                    <td><?= $l['tanggal_sewa_sampai'] ?></td>
                                    <td><?= $jarak->d; ?> Hari</td>
                                    <td>Rp. <?= number_format($l['harga_sewa']) ?></td>
                                    <td>Rp. <?= number_format($total_harga) ?></td>
                                </tr>

                        <?php }
                        endforeach; ?>
                    </tbody>
                    <tr>
                        <td colspan="5" class="text-center">Total</td>
                        <td>Rp. <?= number_format($grand_total) ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->