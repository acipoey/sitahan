<!DOCTYPE html>
<html>
<?php $this->load->view('inc/head') ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

<?php $this->load->view('inc/header') ?>
  <aside class="main-sidebar">
<?php $this->load->view('inc/sidebar') ?>
  </aside>

  <div class="content-wrapper">
  <section class="content-header">
        </section>
            <section class="content">
          <!-- Small boxes (Stat box) -->
         <div class="row">
          <!-- left column -->
          <div class="col-md-12">
          <?php $this->load->view('template/alert'); ?>
            
            <!-- general form elements -->
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title"><?= $judul ?></h3>
              </div>

              <form action="<?php echo base_url(); ?>instansi/update" method="post" enctype="multipart/form-data"  id="submit">
                <div class="box-body">
                  <div class="box-body pad>
                    <label for="exampleInputEmail1"><b>Kode</b></label>
                    <input type="text" class="form-control" id="kode" name="kode" placeholder="Masukkan Nama Kode" value="<?= $instansi->kode ?>" required>
                    <input type="hidden" class="form-control" id="id" name="id" placeholder="Masukkan Nama Kode" value="<?= $instansi->id ?>" required>
                  </div>

                   <div class="box-body pad>
                    <label for="exampleInputEmail1"><b>Nama</b></label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama" value="<?= $instansi->nama ?>" required>
                  </div>

                  <div class="box-body pad>
                  <label for=" alamat"><b>Alamat Instansi</b></label>
                    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat Instansi" value="<?= $instansi->alamat ?>"required>
                  </div>

                  <div class="box-body pad">
                    <label for=" exampleInputEmail1"><b>Jenis</b></label>
                    <select class="form-control" id="level" name="level">
                      <?php
                        $jk=$data->level;
                        if ($jk== "0") echo "<option value='0' selected>Superadmin</option>";
                        else echo "<option value='0'>Superadmin</option>";
                        if ($jk== "1") echo "<option value='1' selected>Pengadilan</option>";
                        else echo "<option value='1'>Pengadilan</option>";
                        if ($jk== "2") echo "<option value='2' selected>Lembaga Pemasyarakatan</option>";
                        else echo "<option value='2'>Lembaga Pemasyarakatan</option>";                 
                      ?>
                    </select>
                  </div>

                </div>

                <div class="box-footer">
                  <a href="<?= base_url('instansi') ?>" class="btn btn-default pull-left">Kembali</a>
                  <button type="submit" id="submit" class="btn btn-primary pull-right">Update</button>
                </div>
              </form>
            </div>
          </div>
        <!-- /.col -->
      </div>
        <!-- Main row -->
      </section><!-- /.content -->

  </div>



<?php $this->load->view('inc/footer') ?>
</body>
</html>
