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
                    <h4 class="modal-title" id="myModalLabel">Hapus Surat Masuk</h4>
                </div>
                <form class="form-horizontal">
                <div class="modal-body">
                                       
                        <input type="hidden" name="kode" id="textkode" value="">
                        <div class="alert alert-warning"><p>Apakah Anda yakin mau menghapus Surat Masuk ini?</p></div>
                                     
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    <button class="btn_hapus btn btn-danger" id="btn_hapus">Hapus</button>
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
                        <table id="mydata"  class="table table-striped table-bordered dt-responsive nowrap" style="width:100%" >
                          <thead>
                          <tr>
                            <th>No</th>
                            <th style="text-align: center;word-wrap: break-word;">No Surat</th>
                            <th style="width:15%;word-wrap: break-word;text-align: center;">Tanggal Masuk</th>
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
    $(document).ready(function(){
        tampil_data();
         
        $('#mydata').dataTable();
        function tampil_data(){
            $.ajax({
                type  : 'GET',
                url   : '<?= base_url('surat_masuk/datatables')?>',
                async : false,
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                       var c = parseInt(i+1);
                        html += '<tr>'+
                                '<td style="word-wrap: break-word;">'+c+'</td>'+
                                '<td style="word-wrap: break-word;">'+data[i].no_surat+'</td>'+
                                '<td style="word-wrap: break-word;">'+data[i].tgl_diterima+'</td>'+
                                '<td style="word-wrap: break-word;">'+data[i].pengirimnya+'</td>'+
                                '<td style="word-wrap: break-word;">'+data[i].nama_instansinya+'</td>'+
                                '<td style="word-wrap: break-word;">'+data[i].perihal+'</td>'+
                                '<td style="word-wrap: break-word;text-align:center;">'+
                                    '<a href="javascript:;" class="btn-sm btn-warning item_edit" data="'+data[i].id_surat+'">Download Berkas</a><br><br>'+' '+
                                    '<a href="javascript:;" class="btn-sm btn-info item_detail" data="'+data[i].id_surat+'">Lihat</a>'+' '+
                                    '<a href="javascript:;" class="btn-sm btn-danger item_hapus" data="' + data[i].id_surat + '">Hapus</a>' +
                                '</td>'+
                                '</tr>';
                        
                    }
                    $('#show_data').html(html);
                }
 
            });
        }
        $('#show_data').on('click','.item_hapus',function(){
            var id=$(this).attr('data');
            $('#ModalHapus').modal('show');
            $('[name="kode"]').val(id);
        });

        $('#btn_hapus').on('click',function(){
            var id=$('#textkode').val();
            $.ajax({
            type : "POST",
            url  : "<?= base_url('surat_masuk/hapus')?>",
            dataType : "JSON",
                data : {id: id},
                success: function(data){
                  $('#ModalHapus').modal('hide');
                    window.location.reload();
                    tampil_data();
                  }
              });
              return false;
        });
        $('#show_data').on('click','.item_edit',function(){
          var id=$(this).attr('data');
          // window.location.href = ;
          window.open("<?php echo site_url('surat_masuk/donwload/');?>"+id,"_blank");
      });

     $('#show_data').on('click','.item_detail',function(){
          var id=$(this).attr('data');
          console.log(id);
           window.location.href = "<?php echo site_url('surat_masuk/detail/');?>"+id;
      });
  
 
    });
 
</script>




</body>
</html>
