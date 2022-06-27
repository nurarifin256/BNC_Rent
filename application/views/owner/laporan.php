<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800 mt-3">Laporan</h1>

    <p>Periode <?= $tgl1 ?> Sampai <?= $tgl2 ?></p>

    <form action="<?= base_url() ?>Owner/print_laporan" autocomplete="off" method="post">
        <input type="hidden" name="tgl1" value="<?php echo $tgl1 ?>" readonly>
        <input type="hidden" name="tgl2" value="<?php echo $tgl2 ?>" readonly>
        <button type="submit" class="btn btn-sm btn-primary mb-3"><i class="fas fa-print"></i> Print</button>
    </form>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama Mobil</th>
                            <th>Tanggal Konfirmasi Pembayaran</th>
                            <th>Total Pendapatan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($laporan as $l) : {
                                @$grand_total += $l['pendapatan'];
                        ?>
                                <tr>
                                    <td><?= $l['namaMobil'] ?></td>
                                    <td><?= $l['tanggalKonfirmasi'] ?></td>
                                    <td>Rp. <?= number_format($l['pendapatan']) ?></td>
                                    <td>
                                        <a href="<?= base_url() ?>Owner/detail_laporan/<?= $l['idMobil'] . "/" . $tgl1 . "/" . $tgl2 ?>"><i class="fas fa-info-circle"></i> Detail</a>
                                    </td>
                                </tr>

                        <?php }
                        endforeach; ?>
                    </tbody>
                    <tr>
                        <td class="text-center" colspan="2">Total</td>
                        <td colspan="2">Rp. <?= number_format($grand_total) ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->