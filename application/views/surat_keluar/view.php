<!DOCTYPE html>
<html>
<?php $this->load->view('inc/head') ?>
<style type="text/css">
  .file-upload{display:block;text-align:center;font-family: Helvetica, Arial, sans-serif;font-size: 12px;}
.file-upload .file-select{display:block;border: 2px solid #dce4ec;color: #34495e;cursor:pointer;height:40px;line-height:40px;text-align:left;background:#FFFFFF;overflow:hidden;position:relative;}
.file-upload .file-select .file-select-button{background:#dce4ec;padding:0 10px;display:inline-block;height:40px;line-height:40px;}
.file-upload .file-select .file-select-name{line-height:40px;display:inline-block;padding:0 10px;}
.file-upload .file-select:hover{border-color:#34495e;transition:all .2s ease-in-out;-moz-transition:all .2s ease-in-out;-webkit-transition:all .2s ease-in-out;-o-transition:all .2s ease-in-out;}
.file-upload .file-select:hover .file-select-button{background:#34495e;color:#FFFFFF;transition:all .2s ease-in-out;-moz-transition:all .2s ease-in-out;-webkit-transition:all .2s ease-in-out;-o-transition:all .2s ease-in-out;}
.file-upload.active .file-select{border-color:#3fa46a;transition:all .2s ease-in-out;-moz-transition:all .2s ease-in-out;-webkit-transition:all .2s ease-in-out;-o-transition:all .2s ease-in-out;}
.file-upload.active .file-select .file-select-button{background:#3fa46a;color:#FFFFFF;transition:all .2s ease-in-out;-moz-transition:all .2s ease-in-out;-webkit-transition:all .2s ease-in-out;-o-transition:all .2s ease-in-out;}
.file-upload .file-select input[type=file]{z-index:100;cursor:pointer;position:absolute;height:100%;width:100%;top:0;left:0;opacity:0;filter:alpha(opacity=0);}
.file-upload .file-select.file-select-disabled{opacity:0.65;}
.file-upload .file-select.file-select-disabled:hover{cursor:default;display:block;border: 2px solid #dce4ec;color: #34495e;cursor:pointer;height:40px;line-height:40px;margin-top:5px;text-align:left;background:#FFFFFF;overflow:hidden;position:relative;}
.file-upload .file-select.file-select-disabled:hover .file-select-button{background:#dce4ec;color:#666666;padding:0 10px;display:inline-block;height:40px;line-height:40px;}
.file-upload .file-select.file-select-disabled:hover .file-select-name{line-height:40px;display:inline-block;padding:0 10px;}
</style>
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
      <div class="modal fade" id="ModalHapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
              <h4 class="modal-title" id="myModalLabel">Hapus Surat Keluar</h4>
            </div>
            <form class="form-horizontal">
              <div class="modal-body">

                <input type="hidden" name="kode" id="textkode" value="">
                <div class="alert alert-warning">
                  <p>Apakah Anda yakin mau menghapus Surat Keluar ini?</p>
                </div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                <button class="btn_hapus btn btn-danger" id="btn_hapus">Hapus</button>
              </div>
            </form>
          </div>
        </div>
      </div>

      <div class="modal fade" id="Modalupload" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
              <h4 class="modal-title" id="myModalLabel">Upload Berkas</h4>
            </div>
            <form class="form-horizontal" action="<?php echo base_url(); ?>surat_keluar/upload_bekas" method="post" enctype="multipart/form-data" id="submit">
              <div class="modal-body">
                <input type="hidden" name="kode" id="textkode" value="">
                <div class="file-upload">
                <div class="file-select">
                  <div class="file-select-button" id="fileName">Choose File</div>
                  <div class="file-select-name" id="noFile">No file chosen...</div> 
                  <input type="file" name="chooseFile" id="chooseFile">
                </div>
              </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                <button type="submit" id="submit" class="btn btn-primary pull-right" >Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>

      <div class="modal fade" id="Modalkirim" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
              <h4 class="modal-title" id="myModalLabel">Kirim Surat Keluar</h4>
            </div>
            <form class="form-horizontal">
              <div class="modal-body">

                <input type="hidden" name="kode" id="textkode2" value="">
                <div class="alert alert-info">
                  <p>Apakah Anda yakin mau mengirim Surat Keluar ini?</p>
                </div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                <button class="btn_kirim2 btn btn-info" id="btn_kirim2">Kirim</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <section class="content">
        <?php $this->load->view('template/alert'); ?>
        <div class="row">
          <div class="col-md-12">
            <div class="nav-tabs-custom">
              <div class="tab-content">
                <div class="active tab-pane" id="activity">
                  <div class="post">
                    <div class="row margin-bottom">
                      <div class="box-body">
                        <div id="reload">
                          <table id="mydata" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                            <thead>
                              <tr>
                                <th>No</th>
                                <th style="text-align: center;word-wrap: break-word;">No Surat</th>
                                <th style="width:15%;word-wrap: break-word;text-align: center;">Tanggal Surat</th>
                                <th style="width:15%;word-wrap: break-word;text-align: center;">Pengirim</th>
                                <th style="width:15%;word-wrap: break-word;text-align: center;">Penerima</th>
                                <th style="width:15%;word-wrap: break-word;text-align: center;">Kode Hal</th>
                                <th style="width:15%;text-align: center;">Aksi</th>
                              </tr>
                            </thead>
                            <tbody id="show_data">
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- /.post -->
                </div>
              </div>
              <!-- /.tab-content -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- Main row -->
      </section><!-- /.content -->

    </div>


    <?php $this->load->view('inc/footer') ?>
    <script type="text/javascript">
    $('#chooseFile').bind('change', function () {
      var filename = $("#chooseFile").val();
      if (/^\s*$/.test(filename)) {
        $(".file-upload").removeClass('active');
        $("#noFile").text("No file chosen..."); 
      }
      else {
        $(".file-upload").addClass('active');
        $("#noFile").text(filename.replace("C:\\fakepath\\", "")); 
      }
    });
  </script>
    <script type="text/javascript">
      $(document).ready(function() {
        tampil_data();

        $('#mydata').dataTable();

        function tampil_data() {
          $.ajax({
            type: 'GET',
            url: '<?= base_url('surat_keluar/datatables') ?>',
            async: false,
            dataType: 'json',
            success: function(data) {
              var html = '';
              var i;
              for (i = 0; i < data.length; i++) {
                var c = parseInt(i+1);
                if (data[i].status_kirim == 1 || data[i].status_kirim == 1) {
                  html += '<tr>' +
                    '<td style="word-wrap: break-word;">' + c + '</td>' +
                    '<td style="word-wrap: break-word;">' + data[i].no_surat + '</td>' +
                    '<td style="word-wrap: break-word;">' + data[i].tgl_surat + '</td>' +
                    '<td style="word-wrap: break-word;">' + data[i].pengirimnya + '</td>' +
                    '<td style="word-wrap: break-word;">' + data[i].nama_instansinya + '</td>' +
                    '<td style="word-wrap: break-word;">' + data[i].perihal + '</td>' +
                    '<td style="word-wrap: break-word;text-align:center;">' +
                    '<a href="javascript:;" class="btn-sm btn-info item_detail" data="'+data[i].id_surat+'">Lihat</a>'+' '+
                    '</td>' +
                    '</tr>';
                }else if(data[i].upload_berkas != 1){
                  html += '<tr>' +
                  '<td style="word-wrap: break-word;">' + c + '</td>' +
                    '<td style="word-wrap: break-word;">' + data[i].no_surat + '</td>' +
                    '<td style="word-wrap: break-word;">' + data[i].tgl_surat + '</td>' +
                    '<td style="word-wrap: break-word;">' + data[i].pengirimnya + '</td>' +
                    '<td style="word-wrap: break-word;">' + data[i].nama_instansinya + '</td>' +
                    '<td style="word-wrap: break-word;">' + data[i].perihal + '</td>' +
                    '<td style="word-wrap: break-word;text-align:center;">' +
                    '<a href="javascript:;" class="btn-sm btn-warning item_upload" data="' + data[i].id_surat + '">Upload Berkas</a><br><br>' + ' ' +
                    '<a href="javascript:;" class="btn-sm btn-info item_edit" data="' + data[i].id_surat + '">Edit</a><br><br>' + ' ' +
                    '<a href="javascript:;" class="btn-sm btn-danger item_hapus" data="' + data[i].id_surat + '">Hapus</a>' +
                    '</td>' +
                    '</tr>';
                }else if(data[i].upload_berkas == 1 || data[i].status_kirim == ''){ 
                  html += '<tr>' +
                    '<td style="word-wrap: break-word;">' + c + '</td>' +
                    '<td style="word-wrap: break-word;">' + data[i].no_surat + '</td>' +
                    '<td style="word-wrap: break-word;">' + data[i].tgl_surat + '</td>' +
                    '<td style="word-wrap: break-word;">' + data[i].pengirimnya + '</td>' +
                    '<td style="word-wrap: break-word;">' + data[i].nama_instansinya + '</td>' +
                    '<td style="word-wrap: break-word;">' + data[i].perihal + '</td>' +
                    '<td style="word-wrap: break-word;text-align:center;">' +
                    '<a href="javascript:;" class="btn-sm btn-success item_kirim" data="' + data[i].id_surat + '">Kirim</a>' + ' ' +
                    '<a href="javascript:;" class="btn-sm btn-info item_edit" data="' + data[i].id_surat + '">Edit</a><br><br>' + ' ' +
                    '<a href="javascript:;" class="btn-sm btn-danger item_hapus" data="' + data[i].id_surat + '">Hapus</a>' +
                    '</td>' +
                    '</tr>';
                }

              }
              $('#show_data').html(html);
            }

          });
        }
        $('#show_data').on('click', '.item_hapus', function() {
          var id = $(this).attr('data');
          $('#ModalHapus').modal('show');
          $('[name="kode"]').val(id);
        });

        $('#btn_hapus').on('click', function() {
          var id = $('#textkode').val();
          $.ajax({
            type: "POST",
            url: "<?= base_url('surat_keluar/hapus') ?>",
            dataType: "JSON",
            data: {
              id: id
            },
            success: function(data) {
              $('#ModalHapus').modal('hide');
              window.location.reload();
              tampil_data();
            }
          });
          return false;
        });

        $('#show_data').on('click', '.item_edit', function() {
          var id = $(this).attr('data');
          window.location.href = "<?php echo site_url('surat_keluar/edit/'); ?>" + id;
        });

        // $('#show_data').on('click', '.item_detail', function() {
        //   var id = $(this).attr('data');
        //   console.log(id);
        //   window.location.href = "<?php echo site_url('surat_keluar/detailnya/'); ?>" + id;
        // });

        $('#show_data').on('click', '.item_upload', function() {
          var id = $(this).attr('data');
          $('#Modalupload').modal('show');
          $('[name="kode"]').val(id);
        });

        $('#show_data').on('click', '.item_kirim', function() {
          var id = $(this).attr('data');
          $('#Modalkirim').modal('show');
          $('[name="kode"]').val(id);
        });

        $('#btn_kirim2').on('click', function() {
          var id = $('#textkode2').val();
          $.ajax({
            type: "POST",
            url: "<?= base_url('surat_keluar/kirim') ?>",
            dataType: "JSON",
            data: {
              id: id
            },
            success: function(data) {
              $('#Modalkirim').modal('hide');
              window.location.reload();
              tampil_data();
            }
          });
          return false;
        });

        $('#show_data').on('click','.item_detail',function(){
          var id=$(this).attr('data');
          console.log(id);
           window.location.href = "<?php echo site_url('surat_keluar/detail/');?>"+id;
      });

      });
    </script>




</body>

</html>