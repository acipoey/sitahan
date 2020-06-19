<!DOCTYPE html>
<html>
<?php $this->load->view('inc/head') ?>
<link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<style type="text/css">
  .highlighted {
    background: #00c0ef;
  }
</style>

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
                <h3 class="box-title">&nbsp;</h3>
              </div>

              <form action="<?php echo base_url(); ?>surat_penahanan/next" method="post" enctype="multipart/form-data" id="submit">
                <div class="box-body pad">
                  <label for=" exampleInputEmail1"><b>Pilih Jenis Pemberitahuan</b></label>
                  <select class="form-control" id="jenis" name="jenis">
                      <option value="3">Pemberitahuan 3 Hari </option>
                      <option value="10">Pemberitahuan 10 Hari </option>
                  </select>
                </div>

                <div class="box-footer">
                  <a href="<?= base_url('surat_masuk') ?>" class="btn btn-default pull-left">Kembali</a>
                  <button type="submit" id="submit" class="btn btn-primary pull-right">Lanjut</button>
                  <!-- <button onclick="alert('Under construction!!')" class="btn btn-primary pull-right">Submit</button> -->
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