<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800 mt-3">Tambah Data Mobil</h1>

    <a href="<?= base_url() ?>Mobil" class="btn btn-success btn-sm mb-3">Kembali</a>


    <?= form_open_multipart('Mobil/tambah'); ?>
    <div class="row">
        <div class="col">
            <input type="text" class="form-control" placeholder="Masukan Nama Mobil" name="nama_mobil" value="<?= set_value('nama_mobil') ?>" autofocus>
            <?= form_error('nama_mobil', '<small class="text-danger">', '</small>') ?>
        </div>
        <div class="col">
            <input type="text" class="form-control" placeholder="Masukan Nopol Mobil" name="nopol_mobil" value="<?= set_value('nopol_mobil') ?>">
            <?= form_error('nopol_mobil', '<small class="text-danger">', '</small>') ?>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col">
            <input type="number" class="form-control" placeholder="Masukan Harga Sewa" name="harga_sewa" value="<?= set_value('harga_sewa') ?>">
            <?= form_error('harga_sewa', '<small class="text-danger">', '</small>') ?>
        </div>
        <div class="col">
            <input type="number" class="form-control" placeholder="Masukan kapasitas" name="kapasitas" value="<?= set_value('kapasitas') ?>">
            <?= form_error('kapasitas', '<small class="text-danger">', '</small>') ?>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col">
            <div>
                <img src="<?= base_url() ?>assets/img/default.png" alt="" width="150" class="img-thumbnail img-preview">
            </div>
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="sampul" name="gambar" onchange="previewImg()" required>
                <label class="custom-file-label" for="sampul">pilih gambar</label>
            </div>
        </div>
    </div>

    <button type="submit" class="btn btn-primary btn-sm mt-3 float-right">Simpan</button>
    </form>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->