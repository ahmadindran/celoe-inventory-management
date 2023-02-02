<div class="container" style="margin-top: 20px;">
    <div class="row justify-content-between">
        <div class="col-2" style="margin-left: 3%;">
            <h3>Akun</h3>

        </div>

        <div class="col-2">
            <a type="button" href="<?php echo base_url() ?>admin/akun/tambah" class="btn btn-primary">Tambah Akun</a>
        </div>
    </div>

    <div class="row" style="margin-top: 20px;">
        <div class="col-md-12">

            <?php if ($this->session->flashdata('akun')) : ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    Akun <strong><?= $this->session->flashdata('akun'); ?></strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <div class="container">

                <!-- <table class="table table-striped" id="manageAkunTable">
                    <thead>
                        <tr class="table-dark">
                            <th scope="col">Nama</th>
                            <th scope="col">Username</th>
                            <th scope="col">Email</th>
                            <th scope="col" colspan="2">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($akun as $acc) : ?>
                            <tr>
                                <td><?= $acc['nama'] ?></td>
                                <td><?= $acc['username'] ?></td>
                                <td><?= $acc['email'] ?></td>
                                <td><?php if ($acc['level'] == "1") {
                                        echo 'Admin';
                                    } elseif ($acc['level'] == "2") {
                                        echo 'User';
                                    } else {
                                        echo 'Belum Approve';
                                    }  ?>
                                </td>
                                <td>
                                    <a type="button" class="btn btn-warning float-right" href="<?= base_url(); ?>admin/akun/ubah/<?= $acc['username']; ?>">
                                        Ubah
                                    </a>
                                    <a type="button" class="btn btn-danger float-right" href="<?= base_url(); ?>admin/akun/hapus/<?= $acc['username']; ?>" onclick="return confirm('Yakin?')">
                                        <i class="fa-regular fa-trash-can"></i> Hapus
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table> -->

                <table id="table" class="table table-striped table-hover" id="manageBrandTable" width="100%">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Username</th>
                            <th scope="col">Email</th>
                            <th scope="col">Status</th>
                            <th width="20%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                    <tfoot class="table-light">
                        <tr>
                            <th>No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Username</th>
                            <th scope="col">Email</th>
                            <th scope="col">Status</th>
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
                "url": "<?php echo site_url('admin/akun/ajax_list') ?>",
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