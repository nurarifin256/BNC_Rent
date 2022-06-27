    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <h3>BNC Rental Mobil</h3>

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">



                    <li class="nav-item dropdown no-arrow mx-1">
                        <a class="nav-link dropdown-toggle" href="<?= base_url() ?>Keranjang/index" id="messagesDropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <?php
                            if ($this->session->userdata('role_id') == 3) { ?>
                                <i class="fas fa-shopping-cart"></i>

                                <?php
                                $id_user = $this->session->userdata("id_user");
                                $keranjang =  $this->db->query("SELECT COUNT(*) jumlah FROM tb_keranjang A WHERE A.id_user='$id_user'")->row();
                                if ($keranjang->jumlah > 0) { ?>
                                    <span class="badge badge-danger badge-counter"><?= $keranjang->jumlah ?></span>
                                <?php }

                                ?>


                            <?php } ?>
                        </a>
                    </li>


                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">HI <?= $this->session->userdata('username') ?></span>
                            <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                            <div class="dropdown-divider"></div>
                            <?php if ($this->session->userdata('username')) { ?>
                                <a class="dropdown-item" href="<?= base_url() ?>Auth/logout">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            <?php } else { ?>
                                <a class="dropdown-item" href="<?= base_url() ?>Auth">Login<i class="fas fa-sign-in-alt fa-sm fa-fw mr-2 text-gray-400"></i></a>
                            <?php } ?>
                        </div>
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->