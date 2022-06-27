<title>Laporan Pendapatan</title>

<style>
    .line-title {
        border: 0;
        border-style: inset;
        border-top: 1px solid #000;
    }

    .table {
        width: 100%;
        margin-bottom: 1rem;
        color: #212529
    }

    .table-bordered {
        border: 1px solid #dee2e6
    }

    .table-bordered td,
    .table-bordered th {
        border: 1px solid #dee2e6
    }

    td {
        text-align: center;
    }

    td.tgl {
        text-align: left;
    }

    .table-bordered thead td,
    .table-bordered thead th {
        border-bottom-width: 2px
    }
</style>

<table style="width: 100%;">
    <tr>
        <td align="center">
            <span style="line-height: 1.6; font-weight: bold;">
                BNC Rent
            </span>
        </td>
    </tr>
</table>

<hr class="line-title">
<p align="center">
    LAPORAN PENDAPATAN <br>
</p>
<table>
    <tr>
        <td style="text-align: left;">Dari Tanggal</td>
        <td>:</td>
        <td class="tgl"><?= $tgl1 ?></td>
    </tr>
    <tr>
        <td>Sampai Tanggal</td>
        <td>:</td>
        <td class="tgl"><?= $tgl2 ?> <br></td>
    </tr>
</table>
<br>
<table cellspacing="0" class="table table-bordered">
    <tr>
        <th>Nama Mobil</th>
        <th>Tanggal Konfirmasi Pembayaran</th>
        <th>Total Pendapatan</th>
    </tr>
    <?php
    foreach ($data as $l) : {
            @$grand_total += $l['pendapatan'];
    ?>
            <tr>
                <td><?= $l['namaMobil'] ?></td>
                <td><?= $l['tanggalKonfirmasi'] ?></td>
                <td>Rp. <?= number_format($l['pendapatan']) ?></td>
            </tr>

    <?php }
    endforeach; ?>
    </tbody>
    <tr>
        <td class="text-center" colspan="2">Total</td>
        <td colspan="2">Rp. <?= number_format($grand_total) ?></td>
    </tr>
</table>