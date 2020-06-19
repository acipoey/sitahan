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

              <form action="<?php echo base_url(); ?>tahanan/update_masa" method="post" enctype="multipart/form-data"  id="submit">
                <div class="box-body">
                  <div class="box-body pad>
                    <label for="exampleInputEmail1"><b>Nama Lengkap</b></label>
                    <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Masukkan Nama Lengkap"  value="<?= $tahanan->nama ?>" readonly>
                    <input type="hidden" class="form-control" id="id" name="id" placeholder="Masukkan Nama Lengkap"  value="<?= $tahanan->id ?>" required>
                  </div>

                  <div class="box-body pad">
                    <label>Terhitung Mulai Tanggal:</label>

                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="hidden" id="start_date_old" name="start_date_old" value="<?php echo date("Y-m-d", strtotime($tahanan->start_date))?>" class="form-control pull-right">
                      <input type="date" id="start_date" name="start_date" value="<?php echo date("Y-m-d", strtotime($tahanan->start_date))?>" class="form-control pull-right">
                    </div>
                  </div>

                <div class="box-body pad">
                  <label>Dan Berakhir:</label>

                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="hidden" id="end_date_old" name="end_date_old" value="<?php echo date("Y-m-d", strtotime($tahanan->end_date))?>" class="form-control pull-right" id="datepicker">
                    <input type="date" id="end_date" name="end_date" value="<?php echo date("Y-m-d", strtotime($tahanan->end_date))?>" class="form-control pull-right" id="datepicker">
                  </div>
                </div>

              </div>

                <div class="box-footer">
                  <a href="<?= base_url('tahanan')?>" class="btn btn-default pull-left">Kembali</a>
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
