<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800 mt-3">Detail Bookingan</h1>


    <!-- <a href="<//?= base_url() ?>Admin/index" class="btn btn-success btn-sm mb-3">Kembali</a> -->

    <!-- DataTales Example -->
    <form id="detail_booking" method="POST">
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nama Mobil</th>
                                <th>Nama Supir</th>
                                <th>Tanggal Sewa Mulai</th>
                                <th>Tanggal Sewa Sampai</th>
                                <th>Lama Sewa</th>
                                <th>Harga Sewa / Hari</th>
                                <th>Total</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($mobil as $m) : {

                                    $tgl1 = new DateTime($m['tanggal_sewa_mulai']);
                                    $tgl2 = new DateTime($m['tanggal_sewa_sampai']);
                                    $jarak = $tgl2->diff($tgl1);
                                    $jarak->d;

                                    @$total_harga = $jarak->d * $m['harga_sewa'];

                                    @$grand_total += $total_harga;

                            ?>
                                    <tr>

                                        <?php $no++ ?>
                                        <td><?= $m['nama_mobil'] ?></td>
                                        <td>
                                            <select class="form-control" name="id_supir" id="id_supir_<?= $no ?>" onchange="updateSupir('<?= $no ?>')">
                                                <?php

                                                if ($m['id_supir'] == NULL) { ?>

                                                    <option value="">Pilih Supir</option>
                                                    <?php foreach ($supir as $s) { ?>
                                                        <option value="<?= $s['id_supir'] ?>"><?= $s['nama_supir'] ?></option>
                                                    <?php  }
                                                } else { ?>

                                                    <option value=""><?= $m['nama_supir'] ?></option>
                                                    <?php foreach ($supir as $s) { ?>
                                                        <option value="<?= $s['id_supir'] ?>"><?= $s['nama_supir'] ?></option>
                                                <?php  }
                                                } ?>
                                            </select>
                                        </td>

                                        <input type="hidden" id="id_detail_sewa_<?= $no ?>" value="<?= $m['id_detail_sewa'] ?>">

                                        <td><?= $m['tanggal_sewa_mulai'] ?></td>
                                        <td><?= $m['tanggal_sewa_sampai'] ?></td>
                                        <td><?= $jarak->d ?></td>
                                        <td><?= number_format($m['harga_sewa']) ?></td>
                                        <td><?= number_format($total_harga) ?></td>

                                        <td>
                                            <h5>
                                                <a class="btn btn-sm btn-warning" href="<?= base_url() ?>Ketersediaan/index/<?= $m['id_mobil'] ?>">Jadwal Booking</a>
                                            </h5>
                                        </td>
                                    </tr>

                            <?php }
                            endforeach; ?>
                        </tbody>
                        <tr>
                            <td class="text-center" colspan="6">Total Harga</td>
                            <td colspan="2"><?= number_format($grand_total) ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </form>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->