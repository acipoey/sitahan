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

              <form action="<?php echo base_url(); ?>tahanan/save" method="post" enctype="multipart/form-data"  id="submit">
                <div class="box-body">
                  <div class="box-body pad>
                    <label for="exampleInputEmail1"><b>Nama Lengkap</b></label>
                    <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Masukkan Nama Lengkap" required>
                  </div>

                  <div class="box-body pad>
                    <label for="exampleInputEmail1"><b>Tempat Lahir</b></label>
                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Masukkan Tempat Lahir" required>
                  </div>

                  <div class="box-body pad">
                    <label>Tanggal Lahir:</label>

                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="date" id="tgl_lahir" name="tgl_lahir" class="form-control pull-right" id="datepicker">
                    </div>
                  </div>

                  <div class="box-body pad>
                    <label for="exampleInputEmail1"><b>Jenis Kelamin</b></label>
                    <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                      <option value="laki-laki">Laki-laki</option>
                      <option value="perempuan">Perempuan</option>
                    </select>
                  </div>

                  <div class="box-body pad>
                    <label for="exampleInputEmail1"><b>Kebangsaan</b></label>
                    <input type="text" class="form-control" id="kebangsaan" name="kebangsaan" placeholder="Masukkan Kebangsaan" required>
                  </div>

                  <div class="box-body pad>
                    <label for="exampleInputEmail1"><b>Tempat Tinggal</b></label>
                    <textarea class="form-control" rows="3" id="tempat_tinggal" name="tempat_tinggal" placeholder="Masukkan Tempat Tinggal ..."></textarea>
                  </div>

                  <div class="box-body pad>
                    <label for="exampleInputEmail1"><b>Agama</b></label>
                    <input type="text" class="form-control" id="agama" name="agama" placeholder="Masukkan Agama" required>
                  </div>

                  <div class="box-body pad>
                    <label for="exampleInputEmail1"><b>Pekerjaan</b></label>
                    <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" placeholder="Masukkan Pekerjaan" required>
                  </div>

                  <div class="box-body pad>
                    <label for="exampleInputEmail1"><b>Pejabat Yang Menahan</b></label>
                    <input type="text" class="form-control" id="pejabat" name="pejabat" placeholder="Masukkan Pejabat Yang Menahan" required>
                  </div>

                  <div class="box-body pad>
                    <label for="exampleInputEmail1"><b>Perkara Atau Pasal</b></label>
                    <input type="text" class="form-control" id="perkara" name="perkara" placeholder="Masukkan Perkara Atau Pasal" required>
                  </div>

                  <!-- <div class="box-body pad>
                    <label for="exampleInputFile">Dokumen</label>
                    <input type="file" id="imgInp" name="file_upload" accept="image/*" title="Select Images To Be Uploaded" required /> 
                  </div>
                  <img id='img-upload'/> -->

                  <div class="box-body pad">
                    <label>Terhitung Mulai Tanggal:</label>

                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="date" id="start_date" name="start_date" class="form-control pull-right" id="datepicker">
                    </div>
                  </div>

                  <div class="box-body pad">
                    <label>Dan Berakhir:</label>

                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="date" id="end_date" name="end_date" class="form-control pull-right" id="datepicker">
                    </div>
                  </div>

                  <div class="box-body pad">
                    <label>Tanggal Surat</label>

                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="date" id="tgl_surat" name="tgl_surat" class="form-control pull-right" id="datepicker">
                    </div>
                  </div>

                  <div class="box-body pad>
                    <label for="exampleInputEmail1"><b>No. Surat</b></label>
                    <input type="text" class="form-control" id="no_surat" name="no_surat" placeholder="Masukkan Np. Surat" required>
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
