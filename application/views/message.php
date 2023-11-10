<?php if ($this->session->has_userdata('flashdata')) { ?>
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
        <i class="icon fa fa-check"></i>
        <?= $this->session->flashdata('flashdata'); ?>
    </div>
<?php } ?>