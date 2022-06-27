<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url() ?>Landing_page">
        <div class="sidebar-brand-icon">
            <i class="fas fa-car"></i>
        </div>
        <div class="sidebar-brand-text mx-3">BNC Rent</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <li class="nav-item <?php if ($this->uri->segment(1) == "Landing_page") {
                            echo "active";
                        } ?>">
        <a class="nav-link" href="<?= base_url() ?>Landing_page">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">


    <?php

    if ($this->session->userdata('role_id') == 2 or $this->session->userdata('role_id') == 1) { ?>
        <li class="nav-item <?php if ($this->uri->segment(1) == "Mobil" or $this->uri->segment(1) == "Driver") {
                                echo "active";
                            } ?>">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-database"></i>
                <span>Master</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Master:</h6>
                    <a class="collapse-item" href="<?= base_url() ?>Driver">Driver</a>
                    <a class="collapse-item" href="<?= base_url() ?>Mobil">Mobil</a>
                </div>
            </div>
        </li>

        <?php

        $sewa =  $this->db->query("SELECT COUNT(*) jumlah FROM tb_sewa A WHERE A.status=1")->row();
        $sewa2 =  $this->db->query("SELECT COUNT(*) jumlah2 FROM tb_sewa A WHERE A.status=4")->row();

        ?>

        <li class="nav-item <?php if ($this->uri->segment(1) == "Admin") {
                                echo "active";
                            } ?>">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-check"></i>
                <span>Approve <sup class="badge badge-danger"><?= $sewa->jumlah + $sewa2->jumlah2 ?></sup></span>
            </a>
            <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Approve:</h6>
                    <a class="collapse-item" href="<?= base_url() ?>Admin/index">Booking <sup class="badge badge-danger"><?= $sewa->jumlah ?></sup></a>
                    <a class="collapse-item" href="<?= base_url() ?>Admin/approve_pembayaran">Pembayaran <sup class="badge badge-danger"><?= $sewa2->jumlah2 ?></sup></a>
                </div>
            </div>
        </li>
    <?php }

    if ($this->session->userdata('role_id') == 1) { ?>
        <hr class="sidebar-divider">

        <!-- Nav Item - Charts -->
        <li class="nav-item <?php if ($this->uri->segment(1) == "Owner") {
                                echo "active";
                            } ?>">
            <a class="nav-link" href="<?= base_url() ?>Owner/index">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Laporan</span></a>
        </li>

    <?php  } ?>




    <?php

    if ($this->session->userdata('role_id') == 3) {
        $id_user = $this->session->userdata('id_user');
        $sewa =  $this->db->query("SELECT COUNT(*) jumlah FROM tb_sewa A WHERE A.id_user=$id_user
    AND A.status BETWEEN '2' AND '6'")->row(); ?>
        <li class="nav-item <?php if ($this->uri->segment(1) == "Konfirmasi") {
                                echo "active";
                            } ?>">
            <a class="nav-link" href="<?= base_url() ?>Konfirmasi">
                <i class="fas fa-car"></i>
                <span>Bookingan Saya <sup class="badge badge-danger"><?= $sewa->jumlah ?></sup></span>
            </a>
        </li>
    <?php } ?>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <li class="nav-item <?php if ($this->uri->segment(2) == "kontak") {
                            echo "active";
                        } ?>">
        <a class="nav-link" href="<?= base_url() ?>Landing_page/kontak">
            <i class="fas fa-address-book"></i>
            <span>Kontak</span>
        </a>
    </li>

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->