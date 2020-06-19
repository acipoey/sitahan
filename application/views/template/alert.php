<div class="row">
    <div class="col-md-12">
    <?php if ($this->session->flashdata('pesan_ggl')) { ?>
        <div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <?php echo $this->session->flashdata('pesan_ggl'); ?>
        </div>
    <?php } ?>
    <?php if ($this->session->flashdata('pesan_sks')) { ?>
        <div class="alert alert-info alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <?php echo $this->session->flashdata('pesan_sks'); ?>
        </div>
    <?php } ?>
    </div>
</div>