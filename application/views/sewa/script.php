<script>
    function tanggalsudahada(data) {
        id = data.id
        tanggal = data.value

        // console.log(tanggal);

        $.post("<?php echo base_url('sewa/tanggalsudahada') ?>", {
            tanggal: tanggal,
            id_mobil: '<?php echo $mobil['id_mobil'] ?>'
        }, function(data) {
            if (data.hasil == "ada") {
                Swal.fire({
                    icon: 'warning',
                    title: 'Peringatan',
                    text: 'Di tanggal tersebut mobil sudah di booking',
                    width: '300px',
                    height: '300px'
                })
                $("#" + id).val("")
                return false
            }
        }, "json")
    }

    function validasiTanggal() {
        // var dtToday = new Date();
        var dtToday = new Date();

        var month = dtToday.getMonth() + 1;
        var day = dtToday.getDate();
        var year = dtToday.getFullYear();
        if (month < 10)
            month = '0' + month.toString();
        if (day < 10)
            day = '0' + day.toString();

        var minDate = year + '-' + month + '-' + day;

        $('#txtDate').attr('min', minDate);
    }

    function validasiTanggal2() {
        // var dtToday = new Date();
        var dtToday = new Date();

        var month = dtToday.getMonth() + 1;
        var day = dtToday.getDate();
        var year = dtToday.getFullYear();
        if (month < 10)
            month = '0' + month.toString();
        if (day < 10)
            day = '0' + day.toString();

        var minDate = year + '-' + month + '-' + day;

        $('#txtDate2').attr('min', minDate);

    }

    function getTanggal() {
        var date = $('#txtDate').val().split('-');
        var date2 = $('#txtDate2').val().split('-');
        var day = date[2];
        var day2 = date2[2];
        var hargaSewa = <?= $mobil['harga_sewa']; ?>
        // var hasil_sewa;

        if (day2 - day == 0) {
            var hasil_sewa = 1
        } else {
            var hasil_sewa = day2 - day;
        }

        var lama_sewa = hasil_sewa;
        var total_harga = hasil_sewa * hargaSewa;

        var reverse = total_harga.toString().split('').reverse().join(''),
            ribuan = reverse.match(/\d{1,3}/g);
        ribuan = ribuan.join('.').split('').reverse().join('');
        // console.log(ribuan);

        $("#lama_sewa").val(hasil_sewa);
        $("#total_harga").val(total_harga);

    }
</script>