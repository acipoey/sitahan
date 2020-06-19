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
            <!-- general form elements -->
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title"><?= $judul ?></h3>
              </div>

              <form action="<?php echo base_url(); ?>surat/save" method="post" enctype="multipart/form-data"  id="submit">
                <div class="box-body">
                  <div class="box-body pad>
                    <label for="exampleInputEmail1"><b>Kode</b></label>
                    <input type="text" class="form-control" id="kode" name="kode" placeholder="Masukkan Kode" required>
                  </div>

                  <div class="box-body pad>
                    <label for="exampleInputEmail1"><b>Nama</b></label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama" required>
                  </div>

                </div>

                <div class="box-footer">
                  <a href="<?= base_url('surat')?>" class="btn btn-default pull-left">Kembali</a>
                  <button type="submit" id="submit" class="btn btn-primary pull-right">Submit</button>
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
