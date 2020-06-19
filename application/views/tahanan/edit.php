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

              <form action="<?php echo base_url(); ?>tahanan/update" method="post" enctype="multipart/form-data"  id="submit">
                <div class="box-body">
                  <div class="box-body pad>
                    <label for="exampleInputEmail1"><b>Nama Lengkap</b></label>
                    <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Masukkan Nama Lengkap"  value="<?= $tahanan->nama ?>" required>
                    <input type="hidden" class="form-control" id="id" name="id" placeholder="Masukkan Nama Lengkap"  value="<?= $tahanan->id ?>" required>
                  </div>

                  <div class="box-body pad>
                    <label for="exampleInputEmail1"><b>Tempat Lahir</b></label>
                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Masukkan Tempat Lahir" value="<?= $tahanan->tempat_lahir ?>" required>
                  </div>

                  <div class="box-body pad">
                    <label>Tanggal Lahir:</label>

                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="date" id="tgl_lahir" name="tgl_lahir" class="form-control pull-right" value="<?= $tahanan->tgl_lahir ?>" id="datepicker">
                    </div>
                  </div>

                  <div class="box-body pad>
                    <label for="exampleInputEmail1"><b>Jenis Kelamin</b></label>
                    <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                       <?php
                          $jk=$tahanan->jenis_kelamin;
                          if ($jk== "laki-laki") echo "<option value='laki-laki' selected>Laki-laki</option>";
                          else echo "<option value='laki-laki'>Laki-laki</option>";
                          if ($jk== "perempuan") echo "<option value='perempuan' selected>Perempuan</option>";
                          else echo "<option value='perempuan'>Perempuan</option>";                 
                        ?>
                    </select>
                  </div>

                  <div class="box-body pad>
                    <label for="exampleInputEmail1"><b>Kebangsaan</b></label>
                    <input type="text" class="form-control" id="kebangsaan" name="kebangsaan" value="<?= $tahanan->kebangsaan ?>" placeholder="Masukkan Kebangsaan" required>
                  </div>

                  <div class="box-body pad>
                    <label for="exampleInputEmail1"><b>Tempat Tinggal</b></label>
                    <textarea class="form-control" rows="3" id="tempat_tinggal" name="tempat_tinggal" placeholder="Masukkan Tempat Tinggal ..."><?php echo $tahanan->tempat_tinggal ?></textarea>
                  </div>

                  <div class="box-body pad>
                    <label for="exampleInputEmail1"><b>Agama</b></label>
                    <input type="text" class="form-control" id="agama" name="agama" placeholder="Masukkan Agama" value="<?= $tahanan->agama ?>" required>
                  </div>

                  <div class="box-body pad>
                    <label for="exampleInputEmail1"><b>Pekerjaan</b></label>
                    <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" value="<?= $tahanan->pekerjaan ?>" placeholder="Masukkan Pekerjaan" required>
                  </div>

                  <div class="box-body pad>
                    <label for="exampleInputEmail1"><b>Pejabat Yang Menahan</b></label>
                    <input type="text" class="form-control" id="pejabat" name="pejabat" value="<?= $tahanan->pejabat ?>"placeholder="Masukkan Pejabat Yang Menahan" required>
                  </div>

                  <div class="box-body pad>
                    <label for="exampleInputEmail1"><b>Perkara Atau Pasal</b></label>
                    <input type="text" class="form-control" id="perkara" name="perkara" value="<?= $tahanan->perkara ?>" placeholder="Masukkan Perkara Atau Pasal" required>
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

                  <div class="box-body pad">
                    <label>Tanggal Surat</label>

                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="hidden" id="end_date_old" name="end_date_old" value="<?php echo date("Y-m-d", strtotime($tahanan->tgl_surat))?>" class="form-control pull-right" id="datepicker">
                      <input type="date" id="tgl_surat" name="tgl_surat" value="<?php echo date("Y-m-d", strtotime($tahanan->tgl_surat))?>" class="form-control pull-right" id="datepicker">
                    </div>
                  </div>

                  <div class="box-body pad>
                    <label for="exampleInputEmail1"><b>No.Surat</b></label>
                    <input type="text" class="form-control" id="no_surat" name="no_surat" value="<?= $tahanan->no_surat ?>" placeholder="Masukkan No.Surat" required>
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
