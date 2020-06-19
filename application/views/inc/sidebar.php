<section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
        <div class="pull-left image">
		<!-- disini untuk fotonya, nama fotonya terletak di folder upload, dengan nama gambar pribadi.png -->
		<?php if ($this->session->userdata('level_instansi') == 1) { ?>
			<!-- adminpengadilan -->
            <img src="<?php echo base_url(); ?>uploads/pengadilan.png" class="img-circle" alt="User Image">
		<?php } elseif ($this->session->userdata('level_instansi') == 2) { ?>
			<!-- adminlppm -->
			<img src="<?php echo base_url(); ?>uploads/lapas.png" class="img-circle" alt="User Image">
		<?php } else { ?>
			<!-- superadmin -->
			<img src="<?php echo base_url(); ?>uploads/superadmin.png" class="img-circle" alt="User Image">
			<?php } ?>
        </div>
        <div class="pull-left info">
            <p><?= $this->session->userdata('nama') ?></p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
        <li class="<?= $this->uri->segment(1) == 'dashboard' ? 'active' : '' ?>"><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-home header"></i>Dashboard</a>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-envelope"></i>
                <span>Surat</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <?php if ($this->session->userdata('level_instansi') == 1) { ?>
                    <li><a style="font-size:16px;" href="<?php echo base_url('surat_masuk'); ?>"><i class="fa fa-circle-o"></i> Pemberitahuan dari Lapas</a></li>
                    <li><a style="font-size:16px;" href="<?php echo base_url('surat_keluar'); ?>"><i class="fa fa-circle-o"></i> Pengantar Ke Lapas</a></li>
                    <li><a style="font-size:16px;" href="<?php echo base_url('surat_keluar/add'); ?>"><i class="fa fa-circle-o"></i> Kirim Pengantar</a></li>

                    <!-- lapas  -->
                <?php } elseif ($this->session->userdata('level_instansi') == 2) { ?>
                    <li><a style="font-size:16px;" href="<?php echo base_url('surat_masuk'); ?>"><i class="fa fa-circle-o"></i> Pengantar dari Pengadilan</a></li>
                    <li><a style="font-size:16px;" href="<?php echo base_url('surat_keluar'); ?>"><i class="fa fa-circle-o"></i> Pemberitahuan Ke Pengadilan</a></li>
                    <li><a style="font-size:16px;" href="<?php echo base_url('surat_penahanan/add'); ?>"><i class="fa fa-circle-o"></i> Buat Pemberitahuan</a></li>
                    <li><a style="font-size:16px;" href="<?= base_url('surat_keluar/add') ?>"><i class="fa fa-circle-o"></i> Kirim Pemberitahuan </a></li>

                    <!-- superadmin              -->
                <?php } else { ?>
                    <li><a style="font-size:16px; " href="<?php echo base_url('surat_masuk'); ?>"><i class="fa fa-circle-o"></i> Pemberitahuan dari Lapas</a></li>
                    <li><a style="font-size:16px;" href="<?php echo base_url('surat_keluar'); ?>"><i class="fa fa-circle-o"></i> Pengantar Ke Lapas</a></li>
                    <li><a style="font-size:16px;" href="<?php echo base_url('surat_masuk'); ?>"><i class="fa fa-circle-o"></i> Pengantar dari Pengadilan</a></li>
                    <li><a style="font-size:16px; word-wrap: break-word;" href="<?php echo base_url('surat_keluar'); ?>"><i class="fa fa-circle-o"></i> Pemberitahuan Ke Pengadilan</a></li>
                <?php } ?>
                <!-- <li><a href="<?php echo base_url('surat_penahanan'); ?>"><i class="fa fa-circle-o"></i> Surat Penahanan</a></li> -->
            </ul>
        </li>
        <?php if ($this->session->userdata('level_instansi') == 2) { ?>
            <li class="header" style="font-size:18px;">Tahanan</li>
            <li class="<?= $this->uri->segment(1) == 'tahanan' ? 'active' : '' ?>"><a href="<?php echo base_url('tahanan'); ?>"><i class="fa fa-drivers-license"></i> Tahanan</a></li>
            <li class="<?= $this->uri->segment(1) == 'logs' ? 'active' : '' ?>"><a href="<?php echo base_url('logs'); ?>"><i class="fa fa-unsorted"></i> Logs</a></li>
        <?php } ?>
        <?php if ($this->session->userdata('username') =='superadmin') { ?>
            <li class="<?= $this->uri->segment(1) == 'tahanan' ? 'active' : '' ?>"><a href="<?php echo base_url('tahanan'); ?>"><i class="fa fa-drivers-license"></i> Tahanan</a></li>
        <?php } ?>
        <?php if ($this->role != 3) { ?>
            <li class="header" style="font-size:18px;">Admin Menu</li>
            <!-- <li class="<?= $this->uri->segment(1) == 'surat' ? 'active' : '' ?>"><a href="<?php echo base_url('surat'); ?>"><i class="fa fa-circle-o"></i> Hal Surat</a></li>

            <li class="<?= $this->uri->segment(1) == 'penerima' ? 'active' : '' ?>"><a href="<?php echo base_url('penerima'); ?>"><i class="fa fa-circle-o"></i> Penerima</a></li> -->
            <?php if ($this->role == 1) { ?>
                <li class="<?= $this->uri->segment(1) == 'instansi' ? 'active' : '' ?>"><a href="<?php echo base_url('instansi'); ?>"><i class="fa fa-institution"></i> Instansi</a></li>
            <?php } ?>
            <li class="<?= $this->uri->segment(1) == 'users' ? 'active' : '' ?>"><a href="<?php echo base_url('users'); ?>"><i class="fa fa-users"></i> User</a></li>
            <?php if ($this->session->userdata('level_instansi') == 1) { ?>
                <li class="<?= $this->uri->segment(1) == 'tahanan' ? 'active' : '' ?>"><a href="<?php echo base_url('tahanan'); ?>"><i class="fa fa-drivers-license"></i> Tahanan</a></li>
            <?php } ?>
        <?php } ?>
</section>