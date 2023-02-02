<div class="container" style="margin-top: 20px;">
    <div class="row justify-content-between">
        <div class="col-2" style="margin-left: 3%;">
            <h3>Feedback</h3>
        </div>

        <div class="col-2">
            <a type="button" href="<?php echo base_url() ?>admin/feedback/tambah" class="btn btn-primary">Tambah feedback</a>
        </div>
    </div>

    <div class="row" style="margin-top: 20px;">
        <div class="col-md-12">

            <?php if ($this->session->flashdata('feedback')) : ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    Feedback <strong><?= $this->session->flashdata('feedback'); ?></strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <div class="container">

                <!-- <table class="table table-striped" id="manageReportTable">
                    <thead>
                        <tr class="table-dark">
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Link Admin</th>
                            <th scope="col" colspan="2">Link User</th>
                            </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($feedback as $rpt) : ?>
                            <?php if ($rpt['status'] == "1") { ?>
                                <tr>
                                    <td><?= $rpt['deskripsi'] ?></td>
                                    <td><a href="<?= $rpt['link_admin'] ?>" class="link-primary" target="_blank">Klik disini</a></td>
                                    <td><a href="<?= $rpt['link_user'] ?>" class="link-primary" target="_blank">Klik disini</a></td>
                                    <td>
                                        <a type="button" class="btn btn-warning float-right ml-2" href="<?= base_url(); ?>admin/feedback/ubah/<?= $rpt['id']; ?>">
                                            Ubah
                                        </a>
                                        <a type="button" class="btn btn-danger float-right" href="<?= base_url(); ?>admin/feedback/hapus/<?= $rpt['id']; ?>" onclick="return confirm('Yakin?')">
                                            <i class="fa-regular fa-trash-can"></i> Hapus
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        <?php endforeach; ?>
                    </tbody>
                </table> -->

                <table id="table" class="table table-striped table-hover" id="manageBrandTable" width="100%">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Link Admin</th>
                            <th scope="col">Link User</th>
                            <th width="20%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                    <tfoot class="table-light">
                        <tr>
                            <th>No</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Link Admin</th>
                            <th scope="col">Link User</th>
                            <th width="20%">Aksi</th>
                        </tr>
                    </tfoot>
                </table>


            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    var table;

    $(document).ready(function() {

        //datatables
        table = $('#table').DataTable({

            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.

            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo site_url('admin/feedback/ajax_list') ?>",
                "type": "POST"
            },

            //Set column definition initialisation properties.
            "columnDefs": [{
                "targets": [0], //first column / numbering column
                "orderable": false, //set not orderable
            }, ],

        });

    });
</script>