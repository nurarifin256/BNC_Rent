<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800 mt-3">Ubah Data Driver</h1>

    <a href="<?= base_url() ?>Driver" class="btn btn-success btn-sm mb-3">Kembali</a>

    <form method="POST" action="<?= base_url() ?>Driver/ubah/<?= $driver['id_supir'] ?>" autocomplete="off">
        <div class="row">
            <div class="col">
                <input type="text" class="form-control" name="nama_supir" value="<?= $driver['nama_supir'] ?>" autofocus>
                <?= form_error('nama_supir', '<small class="text-danger">', '</small>') ?>
            </div>
            <div class="col">
                <input type="text" class="form-control" name="no_handphone" value="<?= $driver['no_handphone'] ?>" onkeypress="return hanyaAngka(event)">
                <?= form_error('no_handphone', '<small class="text-danger">', '</small>') ?>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col">
                <input type="text" class="form-control" name="alamat" value="<?= $driver['alamat'] ?>">
                <?= form_error('alamat', '<small class="text-danger">', '</small>') ?>
            </div>
        </div>

        <button type="submit" class="btn btn-primary btn-sm mt-3 float-right">Ubah</button>
    </form>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->