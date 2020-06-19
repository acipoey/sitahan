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

              <form action="<?php echo base_url(); ?>surat/update" method="post" enctype="multipart/form-data"  id="submit">
                <div class="box-body">
                  <div class="box-body pad>
                    <label for="exampleInputEmail1"><b>Kode</b></label>
                    <input type="hidden" class="form-control" id="id" name="id" value="<?= $data->id ?>" required>
                    <input type="text" class="form-control" id="kode" name="kode" placeholder="Masukkan Nama Kode" value="<?= $data->kode ?>" required>
                  </div>

                   <div class="box-body pad>
                    <label for="exampleInputEmail1"><b>Nama</b></label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama" value="<?= $data->nama ?>" required>
                  </div>

                </div>

                <div class="box-footer">
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
