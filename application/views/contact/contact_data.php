<section class="content-header">
    <h1>
        Contact
        <small>Contact data</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= base_url('dashboard') ?>"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Contact</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data Contact</h3>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped" id="table1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Message</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $results = $row->result(); // Get the results
                    $results = array_reverse($results); // Reverse the array to display the newest message first

                    foreach ($results as $key => $data) { ?>
                    <tr>
                        <td style="width:5%;"><?= $no++ ?></td>
                        <td><?= $data->firstname ?></td>
                        <td><?= $data->lastname ?></td>
                        <td><?= $data->email ?></td>
                        <td><?= $data->subject ?></td>
                        <td>
                            <?php
                                $message = $data->message;
                                if (strlen($message) > 50) {
                                    echo substr($message, 0, 50) . '...';
                                    echo '<a href="#" class="read-more" data-message="' . $message . '">Read more</a>';
                                } else {
                                    echo $message;
                                }
                                ?>
                        </td>
                        <td>
                            <?php if ($data->readed == 0) : ?>
                            <a href="<?= base_url('contact/read/' . $data->id_contact) ?>" class="btn btn-primary btn-xs">Read</a>
                            <?php else : ?>
                            <span class="label label-info">Readed</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>

            </table>
        </div>
    </div>
</section>

<!-- Modal -->
<div class="modal fade" id="messageModal" tabindex="-1" role="dialog" aria-labelledby="messageModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="messageModalLabel">Message</h4>
            </div>
            <div class="modal-body">
                <p id="messageContent"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.read-more').click(function(e) {
            e.preventDefault();
            var message = $(this).data('message');
            $('#messageContent').text(message);
            $('#messageModal').modal('show');
        });
    });
</script>