<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800 mt-3 text-center">Laporan</h1>

    <form action="<?= base_url() ?>Owner/laporan" method="get">
        <div class="row justify-content-center">
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="tanggal1">Dari</label>
                    <input type="date" class="form-control" name="tanggal1" value="<?= date('Y-m-01') ?>">
                </div>
            </div>

            <div class="col-sm-4">
                <div class="form-group">
                    <label for="">Sampai</label>
                    <input type="date" class="form-control" name="tanggal2" value="<?= date('Y-m-d') ?>">
                </div>
            </div>

        </div>
        <div class="text-center">

            <button type="submit" class="btn btn-primary">Lihat</button>
        </div>
    </form>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->