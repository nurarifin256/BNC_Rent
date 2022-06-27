<!-- Content Wrapper -->
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <?php if ($this->session->userdata('mobil')) { ?>
        <div class="flash-data" data-flashdata="<?= $this->session->userdata('mobil') ?>">
            <?php
            $this->session->unset_userdata('mobil');
            ?>
        </div>
    <?php } ?>

    <div class="row row-cols-1 row-cols-md-3">
        <?php foreach ($mobil as $m) : { ?>
                <div class="col mb-4">
                    <div class="card">
                        <div class="card-header text-center"><b><?= $m['nama_mobil'] ?></b></div>
                        <img src="<?= base_url() ?>assets/img/produk/<?= $m['gambar'] ?>" class="card-img-top" height="200">
                        <div class="card-body">
                            <h5 class="card-text"><i class="fas fa-money-bill"></i> : <?= number_format($m['harga_sewa']) ?> / Hari</h5>
                            <h5 class="card-text"><i class="fas fa-male pr-3"></i> : <?= $m['kapasitas'] ?> Orang</h5>
                            <div class="text-center">
                                <a href="<?= base_url() ?>Sewa/index/<?= $m['id_mobil'] ?>" class="btn btn-primary">Sewa</a>
                            </div>
                        </div>
                    </div>
                </div>
        <?php }
        endforeach; ?>
    </div>

</div>
<!-- /.container-fluid -->