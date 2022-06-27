<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800 mt-3">Master Data Mobil</h1>

    <?php if ($this->session->userdata('mobil')) { ?>
        <div class="flash-data" data-flashdata="<?= $this->session->userdata('mobil') ?>">
            <?php
            $this->session->unset_userdata('mobil');
            ?>
        </div>
    <?php } ?>

    <a href="<?= base_url() ?>Mobil/tambah" class="btn btn-primary btn-sm mb-3">Tambah data mobil</a>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>No Polisi</th>
                            <th>Harga Sewa / Hari</th>
                            <th>Kapasitas</th>
                            <th>Status</th>
                            <th width="150">Gambar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($mobil as $m) : {  ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $m['nama_mobil'] ?></td>
                                    <td><?= $m['nopol_mobil'] ?></td>
                                    <td>Rp. <?= number_format($m['harga_sewa']) ?></td>
                                    <td><?= $m['kapasitas'] ?> Orang</td>
                                    <td><?= $m['status'] ?></td>
                                    <td>
                                        <img class="img-fluid" src="<?= base_url() ?>/assets/img/produk/<?= $m['gambar'] ?>" alt="" srcset="">
                                    </td>
                                    <td>
                                        <a href="#" onclick="hapusMobil('<?= $m['id_mobil'] ?>')"><i class="fas fa-backspace mr-1"></i>Hapus</a>
                                        <a href="<?= base_url() ?>Mobil/ubah/<?= $m['id_mobil'] ?>"><i class="fas fa-edit mr-1"></i>Ubah</a>
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