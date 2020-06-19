<!DOCTYPE html>
<html>
<?php $this->load->view('inc/head') ?>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/select2/dist/css/select2.min.css">
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
          <div id="myModal_u" class="modal fade" role="dialog">
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
                  <table id="tblinstansi" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>NAMA</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($instansi as $send) { ?>
                        <tr>
                          <td><?= $send->nama; ?></td>
                        </tr>
                      <?php } ?>
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

              <form action="<?php echo base_url(); ?>penerima/save" method="post" enctype="multipart/form-data" id="submit">
                <div class="box-body">
                  <div class="box-body pad">
                    <label for=" exampleInputEmail1"><b>Nama Lengkap</b></label>
                    <input type="text" class="form-control" id="nama_penerima" name="nama_penerima" placeholder="Masukkan Nama Lengkap" required>
                  </div>

                  <div class="box-body pad">
                    <label for=" exampleInputEmail1"><b>Jabatan</b></label>
                    <input type="text" class="form-control" id="nama_lengkap" name="jabatan" placeholder="Masukkan Jabatan" required>
                  </div>

                  <div class="box-body pad">
                    <label for=" exampleInputEmail1"><b>NIP</b></label>
                    <input type="text" class="form-control" id="nip" name="nip" placeholder="Masukkan NIP" required>
                  </div>

                  <?php if ($this->role == 3) { ?>
                    <div class="box-body pad">
                      <label for=" exampleInputEmail1"><b>Instansi</b></label>
                    </div>

                    <div class="input-group box-body pad">
                      <input type="text" id="instansi" name="instansi" placeholder="Pilih Instansi" class="form-control">
                      <span class="input-group-addon" style="background-color: #00c0ef"><a style="color: white;" data-toggle="modal" data-target="#myModal_u">Pilih</a></span>
                    </div>
                  <?php } ?>
                </div>
                <div class="box-footer">
                  <a href="<?= base_url('penerima') ?>" class="btn btn-default pull-left">Kembali</a>
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
    <script>
      $(function() {
        //Initialize Select2 Elements
        $('.select2').select2()
      })
    </script>

    <script>
      $(function() {
        $('#tblinstansi').DataTable();
      })
    </script>

    <script type="text/javascript">

      // tabel pengirim
      var table = document.getElementById('tblinstansi');
      var tbody = table.getElementsByTagName("tbody")[0];
      tbody.onclick = function(e) {
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
        $('#instansi').val(data);
      };

      $('#tblinstansi tr').click(function(e) {
        $('#tblinstansi tr').removeClass('highlighted');
        $(this).addClass('highlighted');
      });
    </script>
</body>

</html>