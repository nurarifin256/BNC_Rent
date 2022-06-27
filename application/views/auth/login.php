<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url() ?>assets/sbadmin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url() ?>assets/sbadmin/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">
            <?php if ($this->session->userdata('akun')) { ?>
                <div class="flash-data" data-flashdata="<?= $this->session->userdata('akun') ?>">
                    <?php
                    $this->session->unset_userdata('akun');
                    ?>
                </div>
            <?php } ?>

            <div class="col-lg-7">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg">
                                <div class="p-5">

                                    <?php if ($this->session->flashdata('pesan_auth')) : ?>
                                        <div class="row">
                                            <div class="col pesan">
                                                <?= $this->session->flashdata('pesan_auth') ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Login</h1>
                                    </div>
                                    <form class="user" autocomplete="off" method="POST" action="<?= base_url() ?>Auth/index">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" placeholder="Masukan Email" name="email" autofocus value="<?= set_value('email') ?>">
                                            <?= form_error('email', '<small class="text-danger ml-1">', '</small>') ?>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user" placeholder="Masukan Password" value="<?= set_value('password') ?>">
                                            <?= form_error('password', '<small class="text-danger ml-1">', '</small>') ?>
                                        </div>

                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                        <hr>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="<?= base_url() ?>Auth/registrasi">Buat Akun!</a>
                                    </div>
                                </div>
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
    <script src="<?= base_url() ?>assets/sbadmin/vendor/sweetalert/sweetalert2.all.min.js"></script>

</body>

</html>