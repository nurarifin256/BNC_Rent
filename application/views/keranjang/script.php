<script>
    function hapusKeranjangMobil(id_keranjang) {
        Swal.fire({
            title: 'Apakah Anda Yakin ?',
            text: "Keranjang mobil akan dihapus!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.post("<?= base_url('Keranjang/hapus_keranjang_mobil') ?>", {
                    id_keranjang: id_keranjang
                }, function(data) {
                    if (data.pesan == "ok") {
                        reload()
                    }
                }, "json").fail(function(data) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Keranjang',
                        text: 'Mobil gagal di hapus',
                        width: '300px',
                        height: '300px'
                    })
                    return false;
                })
            }
        })
    }

    function reload() {
        Swal.fire({
            icon: 'success',
            title: 'Hapus!',
            text: 'Keranjang mobil berhasil dihapus.',
            width: '300px',
            height: '300px'
        }).then((result) => {
            if (result.isConfirmed) {
                location.reload()
            }
        });
    }
</script>