<div class="container" style="margin-top: 20px;">
    <div class="row justify-content-between">
        <div class="col-2" style="margin-left: 3%;">
            <h3>Pesanan</h3>
        </div>

        <div class="col-2">
            <a type="button" href="<?php echo base_url() ?>admin/pesanan/tambah" class="btn btn-primary">Tambah Pesanan</a>
        </div>
    </div>

    <div class="row" style="margin-top: 20px;">
        <div class="col-md-12">

            <?php if ($this->session->flashdata('pesanan')) : ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    Pesanan <strong><?= $this->session->flashdata('pesanan'); ?></strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>
            <div class="container">

                <table id="table" class="table table-striped table-hover" id="manageBrandTable" width="100%">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Bill No.</th>
                            <th>Peminjaman</th>
                            <th>Pengembalian</th>
                            <th>Nama</th>
                            <th>NIP</th>
                            <th>Unit</th>
                            <th>NDE</th>
                            <th>Status</th>
                            <th>Surat Berita</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                    <tfoot class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Bill No.</th>
                            <th>Peminjaman</th>
                            <th>Pengembalian</th>
                            <th>Nama</th>
                            <th>NIP</th>
                            <th>Unit</th>
                            <th>NDE</th>
                            <th>Status</th>
                            <th>Surat Berita</th>
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
                "url": "<?php echo site_url('admin/pesanan/ajax_list') ?>",
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