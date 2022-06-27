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
</script>