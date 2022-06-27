<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800 mt-3">Jadwal Booking Mobil <?= $nama_mobil["nama_mobil"] ?></h1>



    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No Bookingan</th>
                            <th>Tanggal Mulai Sewa</th>
                            <th>Tanggal Sampai Sewa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($mobil as $m) : {  ?>
                                <tr>
                                    <td><?= $m['id_sewa'] ?></td>
                                    <td><?= $m['tanggal_sewa_mulai'] ?></td>
                                    <td><?= $m['tanggal_sewa_sampai'] ?></td>
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