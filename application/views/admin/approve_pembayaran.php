<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800 mt-3">Approve Pembayaran</h1>

    <?php if ($this->session->userdata('sewa')) { ?>
        <div class="flash-data" data-flashdata="<?= $this->session->userdata('sewa') ?>">
            <?php
            $this->session->unset_userdata('sewa');
            ?>
        </div>
    <?php } ?>


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No Bookingan</th>
                            <th>Penyewa</th>
                            <th>Bank</th>
                            <th>Nama</th>
                            <th>Nomor</th>
                            <th>Total Bayar</th>
                            <th width="150">Ktp</th>
                            <th>Bukti</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($konfirmasi as $k) : {
                                if ($k['status'] == 4) {
                                    $ktatus = "Belum di approve";
                                } else if ($k['status'] == 5) {
                                    $ktatus = "Sudah di approve";
                                } else if ($k['status'] == 6) {
                                    $ktatus = "Bookingan di tolak";
                                }
                        ?>
                                <tr>
                                    <td><?= $k['id_sewa'] ?></td>
                                    <td><?= $k['id_user'] ?></td>
                                    <td><?= $k['nama_bank'] ?></td>
                                    <td><?= $k['nama_pemilik_rekening'] ?></td>
                                    <td><?= $k['no_rekening'] ?></td>
                                    <td>Rp. <?= number_format($k['total_bayar']) ?></td>
                                    <td>
                                        <a href="#" onclick="zoomKtp('<?= $k['gambar_ktp'] ?>')" class="gambar_ktp" data-toggle="modal">
                                            <img class="img-thumbnail" width="150" src="<?= base_url() ?>/assets/img/ktp/<?= $k['gambar_ktp'] ?>">
                                        </a>

                                    </td>
                                    <td>
                                        <a href="" class="gambar_bukti" data-toggle="modal" onclick="zoomBukti('<?= $k['gambar_bukti_pembayaran'] ?>')">
                                            <img class=" img-thumbnail" width="150" src="<?= base_url() ?>/assets/img/bukti/<?= $k['gambar_bukti_pembayaran'] ?>">
                                        </a>
                                    </td>
                                    <td><?= $ktatus ?></td>
                                    <td>
                                        <a href="<?= base_url() ?>Admin/detail_booking/<?= $k['id_sewa'] . "/" . $k['id_user'] ?>"></i> Detail</a> |
                                        <a href="<?= base_url() ?>Admin/approve_pembayaran_booking/<?= $k['id_sewa'] ?>"></i> Aprrove</a> |
                                        <a href="<?= base_url() ?>Admin/tolak_pembayaran/<?= $k['id_sewa'] ?>"> Tolak Bookingan</a>
                                    </td>
                                </tr>

                        <?php }
                        endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<div class="modal fade" id="modal_ktp" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="exampleModalLabel">Gambar Ktp</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modal-body">
                <img class="img-thumbnail" width="500" id="foto" src="">
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="modal_bukti" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="exampleModalLabel">Gambar Bukti Pembayaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modal-body">
                <img class="img-thumbnail" width="500" id="bukti" src="">
            </div>

        </div>
    </div>
</div>