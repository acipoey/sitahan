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
    <h1>
      <?= $judul ?>
    </h1>
  </section>
    <section class="content">
     <div class="row">
        <div class="col-md-12">
          <!-- The time line -->
          <ul class="timeline">
            <?php foreach ($tahanan as $tahan) { ?>
              <li>
                <i class="fa fa-comments bg-yellow"></i>

                <div class="timeline-item">
                  <span class="time"><i class="fa fa-clock-o"></i><?=$tahan->created ?></span>

                  <h3 class="timeline-header"><a href="#"><?=$tahan->nama ?></a> mengganti Masa Tahanan</h3>

                  <div class="timeline-body">
                    Tahanan : <?= $tahan->tahanan ?> <br>
                    Masa Tahanan Sebelumnya = <?= date("d-m-Y", strtotime($tahan->start_date_old)) ?> s.d <?= date("d-m-Y", strtotime($tahan->end_date_old)) ?> <br> 
                    Masa Tahanan Sekarang = <?= date("d-m-Y", strtotime($tahan->start_date_new)) ?> s.d <?=date("d-m-Y", strtotime($tahan->end_date_new)) ?> 
                  </div>
                </div>
              </li>
            <?php } ?>
            <li>
              <i class="fa fa-clock-o bg-gray"></i>
            </li>
          </ul>
        </div>
        <!-- /.col -->
      </div>
    </section>
  </div>


<?php $this->load->view('inc/footer') ?>
</body>
</html>
