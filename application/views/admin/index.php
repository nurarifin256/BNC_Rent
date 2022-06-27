<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800 mt-3">Bookingan</h1>

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
                            <th>Total Bayar</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($sewaan as $s) : {
                                if ($s['status'] == 1) {
                                    $status = "Belum di approve";
                                } else if ($s['status'] == 2) {
                                    $status = "Sudah di approve";
                                } else if ($s['status'] == 3) {
                                    $status = "Bookingan di tolak";
                                }
                        ?>
                                <tr>
                                    <td><?= $s['id_sewa'] ?></td>
                                    <td><?= $s['username'] ?></td>
                                    <td>Rp. <?= number_format($s['total_bayar']) ?></td>
                                    <td><?= $status ?></td>
                                    <td>
                                        <a href="<?= base_url() ?>Admin/detail_booking/<?= $s['id_sewa'] . "/" . $s['id_user'] ?>"><i class="fas fa-info-circle"></i> Detail</a> |
                                        <a href="<?= base_url() ?>Admin/approve_booking/<?= $s['id_sewa'] ?>"><i class="fas fa-check-square"></i> Aprrove</a> |
                                        <a href="<?= base_url() ?>Admin/tolak_bookingan/<?= $s['id_sewa'] ?>"><i class="fas fa-times-circle"></i> Tolak Bookingan</a>
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