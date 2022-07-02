<script>
    const flashData = $('.flash-data').data('flashdata');

    if (flashData) {
        Swal.fire({
            icon: 'success',
            title: 'Booking',
            text: 'Berhasil ' + flashData,
            width: '300px',
            height: '300px'
        })
    }

    function updateSupir(no) {
        id_supir = $("#id_supir_" + no).val();
        id_detail_sewa = $("#id_detail_sewa_" + no).val();



        $.ajax({
            url: "<?= base_url('Admin/update_supir') ?>",
            type: "post",
            data: $("#detail_booking").serialize() + "&id_supir=" + id_supir + "&id_detail_sewa=" + id_detail_sewa,
        })
    }

    function zoomKtp(gambar) {

        $('#foto').attr("src", "<?= base_url('assets/img/ktp/') ?>" + gambar);
        $('#modal_ktp').modal('show');
    }

    function zoomBukti(bukti) {

        $('#bukti').attr("src", "<?= base_url('assets/img/bukti/') ?>" + bukti);
        $('#modal_bukti').modal('show');
    }

    // $(document).ready(function() {

    //     $(".gambar_ktp").on('click', function() {
    //         const gambar = $(this).data('gambar');

    //         $('#foto').attr("src", "<//?= base_url('assets/img/ktp/') ?>" + gambar);
    //         $('#modal_ktp').modal('show');
    //     });

    //     $(".gambar_bukti").on('click', function() {
    //         const bukti = $(this).data('bukti');

    //         $('#bukti').attr("src", "<//?= base_url('assets/img/bukti/') ?>" + bukti);
    //         $('#modal_bukti').modal('show');
    //     });


    // })
</script>