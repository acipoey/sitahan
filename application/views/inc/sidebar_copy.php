<section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
        <div class="pull-left image">
            <img src="<?php echo base_url(); ?>assets/uns.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
            <p><?= $this->session->userdata('nama')?></p>
            <a href="<?php echo base_url(); ?>assets/#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
    </div>
    <!-- search form -->
    <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Search...">
            <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
    </form>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
        <?php if($this->session->userdata('role')==1){?>
        <li class="header">DATA MASTER</li>
        <li>
            <a href="<?php echo base_url(); ?>dashboard">
                <i class="fa fa-home"></i> <span>Dashboard</span>
              </a>
        </li>
        <li class="<?= $this->uri->segment(1)=='barang' ? 'active':'' ?>">
            <a href="<?php echo base_url(); ?>barang">
            <i class="fa fa-th"></i> <span>Data Barang</span>
          </a>
        </li>
        <li class="<?= $this->uri->segment(1)=='kategori' ? 'active':'' ?>">
            <a href="<?php echo base_url(); ?>kategori">
            <i class="fa fa-th"></i> <span>Kategori Barang</span>
          </a>
        </li>
        <li class="<?= $this->uri->segment(1)=='mahasiswa' ? 'active':'' ?>">
            <a href="<?php echo base_url(); ?>mahasiswa">
            <i class="fa fa-th"></i> <span>Data Mahasiswa</span>
          </a>
        </li>
        <li class="<?= $this->uri->segment(1)=='jurusan' ? 'active':'' ?>">
            <a href="<?php echo base_url(); ?>jurusan">
            <i class="fa fa-th"></i> <span>Data Jurusan</span>
          </a>
        </li>
        <li class="<?= $this->uri->segment(1)=='semester' ? 'active':'' ?>">
            <a href="<?php echo base_url(); ?>semester">
            <i class="fa fa-th"></i> <span>Data Semester</span>
          </a>
        </li>
        <li class="<?= $this->uri->segment(1)=='dosen' ? 'active':'' ?>">
            <a href="<?php echo base_url(); ?>dosen">
            <i class="fa fa-th"></i> <span>Data Dosen</span>
          </a>
        </li>
        <li class="<?= $this->uri->segment(1)=='lab' ? 'active':'' ?>">
            <a href="<?php echo base_url(); ?>lab">
            <i class="fa fa-th"></i> <span>Data lab</span>
          </a>
            <li class="<?= $this->uri->segment(1)=='lokasi' ? 'active':'' ?>">
                <a href="<?php echo base_url(); ?>lokasi">
            <i class="fa fa-th"></i> <span>Data Lokasi</span>
          </a>
                <li class="<?= $this->uri->segment(1)=='jenis_kegiatan' ? 'active':'' ?>">
                    <a href="<?php echo base_url(); ?>jenis_kegiatan">
            <i class="fa fa-th"></i> <span>Data Kegiatan</span>
          </a>
                </li>

                <li class="header">PEMINJAMAN</li>
                <li class="<?= $this->uri->segment(2)=='permohonan' ? 'active':'' ?>">
                    <a href="<?php echo base_url('Admin/permohonan');?>"><i class="fa fa-book"></i> <span>Permohonan</span></a>
                </li>
        
        <?php }else if($this->session->userdata('role')==3){?>
            <li class="header">DATA MASTER</li>
            <li class="<?= $this->uri->segment(1)=='permohonan' && $this->uri->segment(2)=='' ? 'active':'' ?>">
                <a href="<?php echo base_url('permohonan');?>"><i class="fa fa-table"></i> <span>Histori penelitian</span></a>
            </li>
            <li class="<?= $this->uri->segment(1)=='permohonan' && $this->uri->segment(2)=='tambah' ? 'active':'' ?>">
                <a href="<?php echo base_url('permohonan/tambah');?>"><i class="fa fa-book"></i> <span>Tambah Permohonan</span></a>
            </li>
        <?php } ?>
    </ul>
</section>