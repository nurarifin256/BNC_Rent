<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800 mt-3">Konfirmasi Pembayaran</h1>

    <a href="<?= base_url() ?>Konfirmasi" class="btn btn-success btn-sm mb-3">Kembali</a>


    <?= form_open_multipart('Konfirmasi/konfirmasi_pembayaran/' . $id_sewaa); ?>
    <div class="row">

        <div class="col">
            <input type="hidden" name="id_sewa" value="<?= $id_sewaa ?>">
            <input type="text" class="form-control-plaintext" placeholder="<?= $id_sewaa ?>" value="No Bookingan <?= $id_sewaa ?>">
        </div>
        <div class="col">
            <select class="form-control" required name="nama_bank">
                <option>Pilih Bank</option>
                <option value="BCA">BCA</option>
                <option value="BNI">BNI</option>
                <option value="BRI">BRI</option>
                <option value="BSI">BSI</option>
                <option value="GANESHA">GANESHA</option>
                <option value="MANDIRI">MANDIRI</option>
                <option value="MAYORA">MAYORA</option>
                <option value="PERMATA">PERMATA</option>
            </select>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col">
            <input type="text" class="form-control" placeholder="Masukan Nama Pemilik Rekening" name="nama_pemilik_rekening" value="<?= set_value('nama_pemilik_rekening') ?>">
            <?= form_error('nama_pemilik_rekening', '<small class="text-danger">', '</small>') ?>
        </div>
        <div class="col">
            <input type="number" class="form-control" placeholder="Masukan Nomor Rekening" name="no_rekening" value="<?= set_value('no_rekening') ?>">
            <?= form_error('no_rekening', '<small class="text-danger">', '</small>') ?>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col">
            <div>
                <img src="<?= base_url() ?>assets/img/kwitansi.png" width="150px" class="img-thumbnail img-preview">
            </div>
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="sampul" name="gambar" onchange="previewImg()" required>
                <label class="custom-file-label" for="sampul">pilih gambar bukti pembayayan</label>
            </div>
        </div>
    </div>

    <button type="submit" class="btn btn-primary btn-sm mt-3 float-right">Konfirmasi</button>
    </form>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->