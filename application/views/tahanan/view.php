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
                    <h4 class="modal-title" id="myModalLabel">Hapus Tahanan</h4>
                </div>
                <form class="form-horizontal">
                <div class="modal-body">
                                       
                        <input type="hidden" name="kode" id="textkode" value="">
                        <div class="alert alert-warning"><p>Apakah Anda yakin mau menghapus Tahanan ini?</p></div>
                                     
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
                  <div class="user-block">
                    <?php if ($this->session->userdata('username') =='superadmin' || $this->session->userdata('username') =='adminpengadilan') { ?>
                    <a href="<?= base_url('tahanan/add')?>" class="btn-sm btn-info pull-left"><i class="fa fa-plus"> Tambah Tahanan</i></a>
                    <?php } ?>
                  </div>
                  <div class="row margin-bottom">
                    <div class="box-body">
                       <div id="reload">
                        <table id="mydata"  class="table table-striped table-bordered dt-responsive nowrap" style="width:100%" >
                          <thead>
                            <?php if ($this->session->userdata('level_instansi') !=1) { ?>
                            <tr>
                              <th style="text-align: center;word-wrap: break-word;">Nama Lengkap</th>
                              <th style="word-wrap: break-word;">Tgl dan NO.SURAT PENAHANAN</th>
                              <th style="width:15%;word-wrap: break-word;text-align: center;">Jenis Kelamin</th>
                              <th style="width:15%;word-wrap: break-word;text-align: center;">Kebangsaan</th>
                              <th style="width:15%;word-wrap: break-word;text-align: center;">Mulai Tanggal</th>
                              <th style="width:15%;word-wrap: break-word;text-align: center;">Berakhir Tanggal</th>
                              <th style="width:15%;text-align: center;">Aksi</th>
                            </tr>
                          <?php }else{ ?>
                            <tr>
                              <th style="text-align: center;word-wrap: break-word;">Nama Lengkap</th>
                              <th style="word-wrap: break-word;">Tgl dan NO.SURAT PENAHANAN</th>
                              <th style="width:15%;word-wrap: break-word;text-align: center;">Jenis Kelamin</th>
                              <th style="width:15%;word-wrap: break-word;text-align: center;">Kebangsaan</th>
                              <th style="width:15%;word-wrap: break-word;text-align: center;">Berakhir Tanggal</th>
                              <th style="width:15%;word-wrap: break-word;text-align: center;">Asal Lapas</th>
                              <th style="width:15%;text-align: center;">Aksi</th>
                            </tr>
                          <?php } ?>
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
                url   : '<?= base_url('tahanan/datatables')?>',
                async : false,
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var i;
                    if (<?php echo $this->session->userdata('level_instansi');?> == 1) {
                        for(i=0; i<data.length; i++){
                          if (data[i].status_change == 1) {
                            html += '<tr>'+
                                    '<td style="word-wrap: break-word;">'+data[i].nama+'</td>'+
                                    '<td style="word-wrap: break-word;">'+new Date(data[i].tgl_surat).toDateString("dd-MM-yyyy")+'<b> - </b>'+data[i].no_surat+'</td>'+
                                    '<td style="word-wrap: break-word;">'+data[i].jenis_kelamin+'</td>'+
                                    '<td style="word-wrap: break-word;">'+data[i].kebangsaan+'</td>'+
                                    '<td style="word-wrap: break-word;">'+new Date(data[i].start_date).toDateString("dd-MM-yyyy")+'</td>'+
                                    '<td style="word-wrap: break-word;">'+data[i].nama_instansi+'</td>'+
                                    '<td style="text-align:center;">'+
                                        '<a href="javascript:;" class="btn btn-xs btn-warning item_edit" data="'+data[i].id+'">Edit</a>'+' '+
                                        '<a href="javascript:;" class="btn btn-xs btn-primary item_detail" data="'+data[i].id+'">Detail</a>'+' '+
                                        '<a href="javascript:;" class="btn btn-xs btn-success item_logs" data="'+data[i].id+'">Logs</a>'+' '+
                                        '<a href="javascript:;" class="btn btn-xs btn-danger item_hapus" data="'+data[i].id+'">Hapus</a>'+
                                    '</td>'+
                                    '</tr>';
                            }else{
                              html += '<tr>'+
                                    '<td style="word-wrap: break-word;">'+data[i].nama+'</td>'+
                                    '<td style="word-wrap: break-word;">'+new Date(data[i].tgl_surat).toDateString("dd-MM-yyyy")+'<b> - </b>'+data[i].no_surat+'</td>'+
                                    '<td style="word-wrap: break-word;">'+data[i].jenis_kelamin+'</td>'+
                                    '<td style="word-wrap: break-word;">'+data[i].kebangsaan+'</td>'+
                                    '<td style="word-wrap: break-word;">'+new Date(data[i].start_date).toDateString("dd-MM-yyyy")+'</td>'+
                                    '<td style="word-wrap: break-word;">'+data[i].nama_instansi+'</td>'+
                                    '<td style="text-align:center;">'+
                                        '<a href="javascript:;" class="btn btn-xs btn-warning item_edit" data="'+data[i].id+'">Edit</a>'+' '+
                                        '<a href="javascript:;" class="btn btn-xs btn-primary item_detail" data="'+data[i].id+'">Detail</a>'+' '+
										 '<a href="javascript:;" class="btn btn-xs btn-success item_logs" data="'+data[i].id+'">Logs</a>'+' '+
                                        '<a href="javascript:;" class="btn btn-xs btn-danger item_hapus" data="'+data[i].id+'">Hapus</a>'+
                                    '</td>'+
                                    '</tr>';
                            }
                        }
                    }else{
                        for(i=0; i<data.length; i++){
                          if (data[i].status_change == 1) {
                            html += '<tr>'+
                                    '<td style="word-wrap: break-word;">'+data[i].nama+'</td>'+
                                    '<td style="word-wrap: break-word;">'+new Date(data[i].tgl_surat).toDateString("dd-MM-yyyy")+'<b> - </b>'+data[i].no_surat+'</td>'+
                                    '<td style="word-wrap: break-word;">'+data[i].jenis_kelamin+'</td>'+
                                    '<td style="word-wrap: break-word;">'+data[i].kebangsaan+'</td>'+
                                    '<td style="word-wrap: break-word;">'+new Date(data[i].start_date).toDateString("dd-MM-yyyy")+'</td>'+
                                    '<td style="word-wrap: break-word;">'+new Date(data[i].end_date).toDateString("dd-MM-yyyy")+'</td>'+
                                    '<td style="text-align:center;">'+
                                        '<a href="javascript:;" class="btn btn-xs btn-warning item_edit" data="'+data[i].id+'">Edit</a>'+' '+
                                        '<a href="javascript:;" class="btn btn-xs btn-warning item_edit_masa" data="'+data[i].id+'">Edit Masa Tahanan</a>'+' '+
                                        '<a href="javascript:;" class="btn btn-xs btn-success item_logs" data="'+data[i].id+'">logs</a>'+' '+
                                        '<a href="javascript:;" class="btn btn-xs btn-primary item_detail" data="'+data[i].id+'">Detail</a>'+' '+
                                        '<a href="javascript:;" class="btn btn-xs btn-danger item_hapus" data="'+data[i].id+'">Hapus</a>'+
                                    '</td>'+
                                    '</tr>';
                            }else{
                              html += '<tr>'+
                                  '<td style="word-wrap: break-word;">'+data[i].nama+'</td>'+
                                  '<td style="word-wrap: break-word;">'+new Date(data[i].tgl_surat).toDateString("dd-MM-yyyy")+'<b> - </b>'+data[i].no_surat+'</td>'+
                                  '<td style="word-wrap: break-word;">'+data[i].jenis_kelamin+'</td>'+
                                  '<td style="word-wrap: break-word;">'+data[i].kebangsaan+'</td>'+
                                  '<td style="word-wrap: break-word;">'+new Date(data[i].start_date).toDateString("dd-MM-yyyy")+'</td>'+
                                  '<td style="word-wrap: break-word;">'+new Date(data[i].end_date).toDateString("dd-MM-yyyy")+'</td>'+
                                  '<td style="text-align:center;">'+
                                      '<a href="javascript:;" class="btn btn-xs btn-warning item_edit" data="'+data[i].id+'">Edit</a>'+' '+
                                      '<a href="javascript:;" class="btn btn-xs btn-warning item_edit_masa" data="'+data[i].id+'">Edit Masa Tahanan</a>'+' '+
                                      '<a href="javascript:;" class="btn btn-xs btn-primary item_detail" data="'+data[i].id+'">Detail</a>'+' '+
									   '<a href="javascript:;" class="btn btn-xs btn-success item_logs" data="'+data[i].id+'">Logs</a>'+' '+
                                      '<a href="javascript:;" class="btn btn-xs btn-danger item_hapus" data="'+data[i].id+'">Hapus</a>'+
                                  '</td>'+
                                  '</tr>';
                            }
                        }
                      
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
            url  : "<?= base_url('tahanan/hapus')?>",
            dataType : "JSON",
                data : {id: id},
                success: function(data){
                  $('#ModalHapus').modal('hide');
                    tampil_data();
                  }
              });
              return false;
        });
        $('#show_data').on('click','.item_edit',function(){
          var id=$(this).attr('data');
          console.log(id);
           window.location.href = "<?php echo site_url('tahanan/edit/');?>"+id;
        });

        $('#show_data').on('click','.item_edit_masa',function(){
          var id=$(this).attr('data');
          console.log(id);
           window.location.href = "<?php echo site_url('tahanan/edit_masa/');?>"+id;
        });

        $('#show_data').on('click','.item_logs',function(){
          var id=$(this).attr('data');
          console.log(id);
           window.location.href = "<?php echo site_url('tahanan/logs/');?>"+id;
        });

       $('#show_data').on('click','.item_detail',function(){
            var id=$(this).attr('data');
            console.log(id);
             window.location.href = "<?php echo site_url('tahanan/detail/');?>"+id;
        });
 
    });
 
</script>




</body>
</html>
