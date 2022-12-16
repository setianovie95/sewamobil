<body>
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>

                    </ul>
                    <div class="search-element">

                        <div class="search-backdrop"></div>

                    </div>
                </form>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <div class="d-sm-none d-lg-inline-block">
                                Halo, <?php echo $this->session->userdata('nama') ?>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item has-icon" href="<?php echo base_url('auth/ganti_password') ?>">
                                <i class="fas fa-lock"></i> <span>Ganti Password</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="<?php echo base_url('auth/logout') ?>" class="dropdown-item has-icon text-danger">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="<?php echo base_url('rental/dashboard') ?>">
                            <img src="<?php echo base_url('assets/logo') ?>/logo-dark.png" alt="JSOFT">
                        </a>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href="<?php echo base_url('rental/dashboard') ?>">
                            <img src="<?php echo base_url('assets/logo') ?>/favicon.png" alt="JSOFT">
                        </a>
                    </div>
                    <ul class="sidebar-menu">

                        <li class="<?php echo (strpos(current_url(), "rental/dashboard") !== false) ? "active" : "" ?>">
                            <a class="nav-link" href="<?php echo base_url('rental/dashboard') ?>"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a>
                        </li>

                        <li class="<?php echo (strpos(current_url(), "rental/data_mobil") !== false) ? "active" : "" ?>">
                            <a class="nav-link" href="<?php echo base_url('rental/data_mobil') ?>"><i class="fas fa-car"></i> <span>Data Mobil</span></a>
                        </li>

                        <li class="<?php echo (strpos(current_url(), "rental/transaksi") !== false) ? "active" : "" ?>">
                            <a class="nav-link" href="<?php echo base_url('rental/transaksi') ?>"><i class="fas fa-random"></i> <span>Transaksi</span></a>
                        </li>

                        <li class="<?php echo (strpos(current_url(), "rental/laporan") !== false) ? "active" : "" ?>"><a class="nav-link" href="<?php echo base_url('rental/laporan') ?>"><i class="fas fa-clipboard-list"></i> <span>Laporan</span></a></li>

                        <li class="<?php echo (strpos(current_url(), "rental/payment") !== false) ? "active" : "" ?>"><a class="nav-link" href="<?php echo base_url('rental/payment') ?>"><i class="fas fa-money-bill-alt"></i> <span>Metode Pembayaran</span></a></li>

                    </ul>
                </aside>
            </div>