<div class="container-fluid">


    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800 mt-3">Bookingan Saya</h1>

    <?php if ($this->session->userdata('konfirmasi')) { ?>
        <div class="flash-data" data-flashdata="<?= $this->session->userdata('konfirmasi') ?>">
            <?php
            $this->session->unset_userdata('konfirmasi');
            ?>
        </div>
    <?php }

    foreach ($mobil as $m) {
        if ($m['status'] == 1) {
            $status = 'Sedang pengecekan jadwal oleh admin';
        } else if ($m['status'] == 2) {
            $status = 'Sudah di approve, silahkan konfirmasi pembayaran';
        } else if ($m['status'] == 3) {
            $status = 'Di tolak, di tanggal tersebut mobil tidak tersedia. Harap cek ketersedian sebelum booking';
        } else if ($m['status'] == 4) {
            $status = 'Dana sedang di cek oleh admin';
        } else if ($m['status'] == 5) {
            $status = 'Bookingan di setujui';
        } else if ($m['status'] == 6) {
            $status = 'Di tolak, data konfirmasi pembayaran tidak sesuai. Mohon hubungi admin di menu kontak';
        } ?>
        <table class="table table-striped mt-3 mb-3">

            <tbody>
                <tr>
                    <td width="200">No Bookingan</td>
                    <td width="20">:</td>
                    <td width="600"><?= $m['id_sewa'] ?></td>
                </tr>
                <tr>
                    <td width="200">Penyewa</td>
                    <td width="20">:</td>
                    <td width="600"><?= $m['username'] ?></td>
                </tr>
                <tr>
                    <td width="200">Total Bayar</td>
                    <td width="20">:</td>
                    <td width="600">Rp. <?= number_format($m['total_bayar']) ?></td>
                </tr>
                <tr>
                    <td width="200">status</td>
                    <td width="20">:</td>
                    <td width="600"><?= $status ?></td>
                </tr>
            </tbody>
        </table>


        <div class="float-right mb-3">
            <a href="<?= base_url() ?>Konfirmasi/detail_booking/<?= $m['id_sewa'] ?>" class="btn btn-sm btn-warning">
                <i class="fas fa-info-circle"></i>
                <span>Detail Bookingan</span>
            </a> |
            <?php if ($m['status'] == 2) { ?>
                <a href="<?= base_url() ?>Konfirmasi/konfirmasi_pembayaran/<?= $m['id_sewa'] ?>" class="btn btn-sm btn-primary">
                    <i class="fas fa-check-square"></i>
                    <span>Konfirmasi Pembayaran</span>
                </a>
            <?php } ?>
        </div>
    <?php } ?>