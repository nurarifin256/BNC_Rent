<script>
    const flashData = $('.flash-data').data('flashdata');

    if (flashData) {
        Swal.fire({
            icon: 'success',
            title: 'Akun',
            text: 'Berhasil ' + flashData,
            width: '300px',
            height: '300px'
        })
    }
</script>