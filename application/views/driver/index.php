<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800 mt-3">Master Data Driver</h1>

    <?php if ($this->session->userdata('driver')) { ?>
        <div class="flash-data" data-flashdata="<?= $this->session->userdata('driver') ?>">
            <?php
            $this->session->unset_userdata('driver');
            ?>
        </div>
    <?php } ?>

    <a href="<?= base_url() ?>Driver/tambah" class="btn btn-primary btn-sm mb-3">Tambah data driver</a>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>No Handphone</th>
                            <th>Alamat</th>
                            <!-- <th>Status</th> -->
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($driver as $d) : {  ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $d['nama_supir'] ?></td>
                                    <td><?= $d['no_handphone'] ?></td>
                                    <td><?= $d['alamat'] ?></td>
                                    <!-- <td>Free</td> -->
                                    <td>
                                        <a href="#" onclick="hapusDriver('<?= $d['id_supir'] ?>')"><i class="fas fa-backspace mr-1"></i>Hapus</a> |
                                        <a href="<?= base_url() ?>Driver/ubah/<?= $d['id_supir'] ?>"><i class="fas fa-edit mr-1"></i>Ubah</a>
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