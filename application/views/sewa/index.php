<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Sewa Mobil</h1>
    </div>

    <p>Harap cek jadwal booking mobil dengan klik <a href="<?= base_url() ?>Ketersediaan/index/<?= $mobil['id_mobil'] ?>" class="ml-2 mr-2 btn btn-sm btn-warning">Jadwal Booking</a>sebelum memilih tanggal sewa</p>

    <div class="card">
        <div class="card-header text-center">
            <?= $mobil['nama_mobil'] ?>
        </div>
        <div class="card-body">
            <form method="POST" action="<?= base_url() ?>Sewa/sewa_mobil/<?= $mobil['id_mobil'] ?>">
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-4 col-form-label">Tanggal mulai sewa</label>
                    <div class="col-sm-8">
                        <input type="date" class="form-control" id="txtDate" onclick="validasiTanggal()" name="tanggal_sewa_mulai" onchange="tanggalsudahada(this)">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-4 col-form-label">Tanggal sampai sewa</label>
                    <div class="col-sm-8">
                        <input type="date" class="form-control" id="txtDate2" onclick="validasiTanggal2()" onchange="getTanggal(), tanggalsudahada(this)" name="tanggal_sewa_sampai">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-4 col-form-label">Lama Sewa</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control plaintext" readonly id="lama_sewa" name="lama_sewa">
                    </div>
                    <label for="staticEmail" class="col-sm-2 col-form-label">Hari</label>
                </div>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-4 col-form-label">harga Sewa / Hari</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control plaintext" value="<?= number_format($mobil['harga_sewa'])  ?>" readonly name="harga_sewa">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-4 col-form-label">Total Harga</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control plaintext" id="total_harga" readonly name="total_bayar_keranjang">
                    </div>
                </div>
                <button class="btn btn-primary float-right" type="submit">Sewa</button>
            </form>
        </div>

    </div>
</div>