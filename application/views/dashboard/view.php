<!DOCTYPE html>
<html>
<?php $this->load->view('inc/head') ?>
<!-- <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css"> -->
<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/jquery.dataTables.css') ?>">
<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/jquery.dataTables.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/responsive.dataTables.min.css') ?>">

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <?php $this->load->view('inc/header') ?>
    <aside class="main-sidebar">
      <?php $this->load->view('inc/sidebar') ?>
    </aside>

    <div class="content-wrapper">
      <section class="content-header">
        <h1>
          <b><?= $judul ?></b>
        </h1>
        <!-- <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol> -->
      </section>
      <section class="content">
    <!-- /.row -->
        <div class="box col-sm-12">
          <div class="col-sm-12">
            <center>
              <h2>
              Selamat Datang
              </h2> 
              <br><br>
              <br><br><br><br>
            </center>
          </div>
        </div>
      </section>

    </div>


    <?php $this->load->view('inc/footer') ?>
</body>

</html>