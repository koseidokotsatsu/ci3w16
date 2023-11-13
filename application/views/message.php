<?php if ($this->session->flashdata('flashdata')): ?>
    <div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
        <i class="icon fa fa-check"></i>
        <?= $this->session->flashdata('flashdata'); ?>
    </div>
<?php endif; ?>
