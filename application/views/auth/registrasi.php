<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Registrasi</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url() ?>assets/sbadmin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url() ?>assets/sbadmin/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Buat Akun!</h1>
                            </div>
                            <?= form_open_multipart('Auth/registrasi'); ?>

                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" placeholder="Masukan Nama" name="username" value="<?= set_value('username') ?>" autofocus>
                                <?= form_error('username', '<small class="text-danger ml-1">', '</small>') ?>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" placeholder="Masukan Email" name="email" value="<?= set_value('email') ?>">
                                <?= form_error('email', '<small class="text-danger ml-1">', '</small>') ?>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control form-control-user" placeholder="Masukan Password" name="password" value="<?= set_value('password') ?>">
                                <?= form_error('password', '<small class="text-danger ml-1">', '</small>') ?>
                            </div>
                            <div class="form-group">
                                <div>
                                    <img src="<?= base_url() ?>assets/img/ktp.png" alt="" width="150" class="img-thumbnail img-preview">
                                </div>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="sampul" name="gambar" onchange="previewImg()" required>
                                    <label class="custom-file-label" for="sampul">pilih gambar e-ktp</label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block">Buat Akun</button>

                            <hr>
                            </form>
                            <hr>

                            <div class="text-center">
                                <a class="small" href="<?= base_url() ?>auth">Sudah punya akun? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url() ?>assets/sbadmin/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/sbadmin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url() ?>assets/sbadmin/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url() ?>assets/sbadmin/js/sb-admin-2.min.js"></script>

    <script>
        function previewImg() {
            const sampul = document.querySelector('#sampul');
            const sampulLabel = document.querySelector('.custom-file-label');
            const imgPreview = document.querySelector('.img-preview');

            sampulLabel.textContent = sampul.files[0].name;

            const fileSampul = new FileReader();
            fileSampul.readAsDataURL(sampul.files[0]);

            fileSampul.onload = function(e) {
                imgPreview.src = e.target.result;
            }
        }
    </script>

</body>

</html>