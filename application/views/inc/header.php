<header class="main-header">
    <!-- Logo -->
    <a href="<?php echo base_url();?>" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>SITAHAN</b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>SITAHAN</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="<?php echo base_url(); ?>assets/#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- Messages: style can be found in dropdown.less-->
                <li class="dropdown messages-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-envelope-o"></i>
                        <span class="label label-danger" id="count_notif"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">Peminjaman belum diverifikasi</li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">
                                <li id="notifications"></li>
<!--
                                <li>
                                    <a href="#">
                                        <h4>
                                            Namanya (Nimnya)
                                            <small><i class="fa fa-clock-o"></i></small>
                                        </h4>
                                        <p>tanggalnya</p>
                                    </a>
                                </li>
-->
                            </ul>
                        </li>
                        <li class="footer"><a href="<?= base_url('Admin/permohonan/peminjaman_belum_verifikasi')?>">Lihat semua</a></li>
                    </ul>
                </li>
                
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <b>Selamat Datang,  <span class="hidden-xs"><?= $this->session->userdata('username') ?></span></b>
                </a>
                </li>
                <li>
                    <a href="<?= base_url('logout')?>">
                <i class="fa fa-sign-out"></i> <span>Keluar</span>
              </a>
                </li>
            </ul>
        </div>
    </nav>
</header>
