<div class="container" style="margin-top: 20px;">
    <div class="row justify-content-between">
        <div class="col-2" style="margin-left: 3%;">
            <h3>Brand</h3>
        </div>

        <div class="col-2">
            <a type="button" href="<?php echo base_url() ?>admin/brand/tambah" class="btn btn-primary">Tambah Brand</a>

        </div>
    </div>

    <div class="row" style="margin-top: 20px;">
        <div class="col-md-12">

            <?php if ($this->session->flashdata('brand')) : ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    Brand <strong><?= $this->session->flashdata('brand'); ?></strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <div class="container">
                <!-- <table class="table table-striped" id="manageBrandTable">
                    <thead>
                        <tr class="table-dark">
                            <th scope="col">Brand</th>
                            <th scope="col" colspan="2">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($brand as $brnd) : ?>
                            <?php if ($brnd['status'] == "1") { ?>
                                <tr>
                                    <td><?= $brnd['brand'] ?></td>
                                    <td><?php if ($brnd['active'] == "1") {
                                            echo 'Tersedia';
                                        } else {
                                            echo 'Tidak Tersedia';
                                        }  ?>
                                    </td>
                                    <td>
                                        <a type="button" class="btn btn-warning float-right ml-2" href="<?= base_url(); ?>admin/brand/ubah/<?= $brnd['id']; ?>">
                                            Ubah
                                        </a>
                                        <a type="button" class="btn btn-danger float-right" href="<?= base_url(); ?>admin/brand/hapus/<?= $brnd['id']; ?>" onclick="return confirm('Yakin?')">
                                            <i class="fa-regular fa-trash-can"></i> Hapus
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        <?php endforeach; ?>
                    </tbody>
                </table> -->

                <table id="tableBrnd" class="table table-striped table-hover" id="manageBrandTable" width="100%">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Brand</th>
                            <th>Status</th>
                            <th width="20%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                    <tfoot class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Brand</th>
                            <th>Status</th>
                            <th>Aksi</th>
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
        table = $('#tableBrnd').DataTable({

            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.

            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo site_url('admin/brand/ajax_list') ?>",
                "type": "POST",
                
            },

            //Set column definition initialisation properties.
            "columnDefs": [{
                "targets": [0], //first column / numbering column
                "orderable": false, //set not orderable
            }, ],

        });

    });

    document.getElementById("hapus").addEventListener("click", function(event) {
        event.preventDefault()
        window.confirm("Yakin?")
    });
</script>