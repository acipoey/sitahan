<!DOCTYPE html>
<html>
<?php $this->load->view('inc/head') ?>
<link rel="stylesheet" href="<?= base_url()?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
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

            <div id="myModal" class="modal fade" role="dialog">
              <div class="modal-dialog">
                <!-- konten modal-->
                <div class="modal-content">
                  <!-- heading modal -->
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Pilih Lapas</h4>
                  </div>
                  <!-- body modal -->
                  <div class="modal-body">
                    <table id="tblpenerima" class="table table-bordered table-hover">
                     <thead>
                        <tr>
                            <th>NAMA</th>
                        </tr>
                    </thead>
                      <tbody>
                        <?php foreach ($penerima as $send) { ?>
                            <tr>
                                <td><?= $send->nama;?></td>
                            </tr>
                        <?php }?>
                      </tbody>
                    </table>
                  </div>
                  <!-- footer modal -->
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Pilih</button>
                  </div>
                </div>
              </div>
            </div>

            <div id="myModal2" class="modal fade" role="dialog">
              <div class="modal-dialog">
                <!-- konten modal-->
                <div class="modal-content">
                  <!-- heading modal -->
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Bagian heading modal</h4>
                  </div>
                  <!-- body modal -->
                  <div class="modal-body">
                    <table id="tbltembusan" class="table table-bordered table-hover">
                     <thead>
                        <tr>
                            <th>NAMA</th>
                        </tr>
                    </thead>
                      <tbody>
                        <?php foreach ($penerima as $send) { ?>
                            <tr>
                                <td><?= $send->nama_penerima;?></td>
                            </tr>
                        <?php }?>
                      </tbody>
                    </table>
                  </div>
                  <!-- footer modal -->
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Pilih</button>
                  </div>
                </div>
              </div>
            </div>

          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title"><?= $judul ?></h3>
              </div>

              <form action="<?php echo base_url(); ?>surat_masuk/updataae" method="post" enctype="multipart/form-data"  id="submit">
                <div class="box-body">
                  <div class="box-body pad>
                    <label for="exampleInputEmail1"><b>Nomor Surat</b></label>
                    <input type="text" class="form-control" id="no_surat" name="no_surat" value="<?= $surat->no_surat ?>" readonly>
                    <input type="hidden" class="form-control" id="id_surat" name="id_surat" value="<?= $surat->id_surat ?>">
                    <input type="hidden" class="form-control" id="file_lama" name="file_lama" value="<?= $surat->file ?>">
                  </div>

                  <div class="box-body pad">
                    <label>Tanggal Surat</label>

                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" id="tgl_surat" name="tgl_surat" class="form-control pull-right" id="datepicker" value="<?= date("d-m-Y",strtotime($surat->tgl_surat)) ?>" readonly>
                    </div>
                  </div>

                  <div class="box-body pad>
                    <label for="exampleInputEmail1"><b>Perihal</b></label>
                    <input type="text" class="form-control" id="perihal" name="perihal" placeholder="Masukkan Perihal" value="<?= $surat->perihal ?>" readonly>
                  </div>


                  <div class="box-body pad>
                    <label for="exampleInputEmail1"><b>Kepada</b></label>
                    <input type="text" id="penerima" name="penerima" placeholder="Masukkan Penerima" class="form-control" value="<?= $surat->nama_instansinya  ?>" readonly> 
                  </div>

                  <div class="box-body pad>
                    <label for="exampleInputEmail1"><b>Hal</b></label>
                    <textarea class="form-control" rows="5" id="hal" name="hal" placeholder="Masukkan Hal ..." readonly><?= $surat->hal  ?></textarea>
                  </div>

                  <!-- <div class="box-body pad>
                    <label for="exampleInputEmail1"><b>Tembusan</b></label>
                  </div>
                  <div class="input-group box-body pad">
                    <input type="text" id="tembusan" name="tembusan" placeholder="Masukkan Tembusan" class="form-control">
                    <span class="input-group-addon" style="background-color: #00c0ef"><a style="color: white;" data-toggle="modal" data-target="#myModal23">Tembusan</a></span>
                  </div> -->

                  <div class="box-body pad>
                    <label for="exampleInputEmail1"><b>Tembusan</b></label>
                    <input type="text" class="form-control" id="tembusan" name="tembusan" placeholder="Masukkan tembusan" value="<?= $surat->tembusan ?>" readonly>
                  </div>

                  <div class="box-body pad>
                    <label for="exampleInputFile"><b> Unggahan Surat dan Lampiran</b></label>
                    <br><br>
                    &nbsp;&nbsp;<img style="width: 125px;border: 5px solid #34cff7;" src="<?php echo base_url(); ?>assets/index.jpg"><br>
                    &nbsp;&nbsp;<a style="width: 125px" target="_blank" href="<?= base_url('surat_masuk/donwload/')?><?= $surat->id_surat  ?>" class="btn btn-info"><i class="fa fa-download">&nbsp;Unduh</i></a>
                  </div>

                </div>

                <div class="box-footer">
                  <a href="<?= base_url('surat_keluar')?>" class="btn btn-default pull-left">Kembali</a>
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
  <script src="<?= base_url()?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="<?= base_url()?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
        
  <script>
      $(function () {
      $('#tblpenerima').DataTable();
      $('#tbltembusan').DataTable();
  })
  </script>
<script>
    function detail(id){
        $.ajax({
            url:"<?php echo  base_url();?>surat_keluar/penerima/",
            success: function(response){
                $("#modal").html(response);
            },
            dataType:"html"
        });
        return false;
    }
</script>
<script type="text/javascript">
    var table = document.getElementById('tblpenerima');
    var tbody = table.getElementsByTagName("tbody")[0];
      tbody.onclick = function (e) {
          e = e || window.event;
          var data = [];
          var target = e.srcElement || e.target;
          while (target && target.nodeName !== "TR") {
              target = target.parentNode;
          }
          if (target) {
              var cells = target.getElementsByTagName("td");
              for (var i = 0; i < cells.length; i++) {
                  data.push(cells[i].innerHTML);
              }
          }
          // alert(data);
          $('#penerima').val(data);
      };

    $('#tblpenerima tr').click(function(e) {
        $('#tblpenerima tr').removeClass('highlighted');
        $(this).addClass('highlighted');
    });

    var table = document.getElementById('tbltembusan');
    var tbody = table.getElementsByTagName("tbody")[0];
      tbody.onclick = function (e) {
          e = e || window.event;
          var data = [];
          var target = e.srcElement || e.target;
          while (target && target.nodeName !== "TR") {
              target = target.parentNode;
          }
          if (target) {
              var cells = target.getElementsByTagName("td");
              for (var i = 0; i < cells.length; i++) {
                  data.push(cells[i].innerHTML);
              }
          }
          // alert(data);
          $('#tembusan').val(data);
      };

    $('#tbltembusan tr').click(function(e) {
        $('#tbltembusan tr').removeClass('highlighted');
        $(this).addClass('highlighted');
    });
</script>
</body>
</html>
