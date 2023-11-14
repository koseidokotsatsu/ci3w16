<?php if ($this->session->has_userdata('error')) { ?>
    <div class="alert alert-error alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
        <i class="icon fa fa-ban"></i>
        <?= $this->session->flashdata('error'); ?>
    </div>
<?php } ?>
