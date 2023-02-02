<div class="container" style="margin-top: 20px;">
    <div class="row justify-content-between">
        <div class="col-2" style="margin-left: 3%;">
            <h3>Pesanan</h3>
        </div>

        <div class="col-2">
            <a type="button" href="<?php echo base_url() ?>pesanan/tambah" class="btn btn-primary">Tambah Pesanan</a>
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

            <!-- <table class="table table-striped" id="managepesananTable">
                <thead>
                    <tr class="table-dark">
                        <th scope="col">Bill No.</th>
                        <th scope="col">Tanggal Peminjaman</th>
                        <th scope="col" colspan="2">Tanggal Pengembalian</th>
                        </trb>
                </thead>
                <tbody>
                    <?php foreach ($pesanan as $psn) : ?>
                        <tr>
                            <td><?= $psn['id'] ?></td>
                            <td><?= $psn['tgl_peminjaman'] ?></td>
                            <td><?= $psn['tgl_pengembalian'] ?></td>
                            <td style="width: 30%;">
                                <div class="btn-group">
                                    <div class="dropdown">
                                        <a class="btn btn-danger dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                            Surat Berita
                                        </a>

                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <li><a class="dropdown-item" href="<?php echo base_url() ?>user/pesanan/printAll/<?= $psn['id']; ?>" target="_blank">
                                                    Print Semua Berita
                                                </a></li>
                                            <li><a class="dropdown-item" href="<?= base_url(); ?>user/pesanan/printPenyerahan/<?= $psn['id']; ?>" target="_blank">
                                                    Print Penyerahan
                                                </a></li>
                                            <li><a class="dropdown-item" href="<?php echo base_url() ?>user/pesanan/printPengembalian/<?= $psn['id']; ?>" target="_blank">
                                                    Print Pengembalian
                                                </a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="btn-group">
                                    <?php if ($psn['status'] == 1) { ?>
                                        <button type="button" class="btn btn-secondary">Proses</button>
                                    <?php } elseif ($psn['status'] == 2) { ?>
                                        <button type="button" class="btn btn-info">Dalam Peminjaman</button>
                                    <?php } else { ?>
                                        <a type="button" class="btn btn-success" href="<?= $feedback['link_user'] ?>">Feedback</a>
                                    <?php } ?>
                                </div>
                            </td>
                        </tr>

                    <?php endforeach; ?>

                </tbody>
            </table> -->

            <table id="table" class="table table-striped table-hover" id="manageBrandTable" width="100%">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th scope="col">Bill</th>
                        <th scope="col">Tanggal Peminjaman</th>
                        <th scope="col">Tanggal Pengembalian</th>
                        <th width="40%">Aksi</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
                <tfoot class="table-light">
                    <tr>
                        <th>No</th>
                        <th scope="col">Bill</th>
                        <th scope="col">Tanggal Peminjaman</th>
                        <th scope="col">Tanggal Pengembalian</th>
                        <th width="40%">Aksi</th>
                    </tr>
                </tfoot>
            </table>

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
                "url": "<?php echo site_url('user/pesanan/ajax_list') ?>",
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