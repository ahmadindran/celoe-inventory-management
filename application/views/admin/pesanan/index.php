<div class="container">
    <h3>Pesanan</h3>

    <div class="row">
        <div class="col-md-12">

            <?php if ($this->session->flashdata('pesanan')) : ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    Pesanan <strong><?= $this->session->flashdata('pesanan'); ?></strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <a type="button" href="<?php echo base_url() ?>admin/pesanan/tambah" class="btn btn-primary">Tambah Pesanan</a>
            <div class="container">

                <table id="datapesanan" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr class="table-dark">
                            <th>No</th>
                            <th>Bill No.</th>
                            <th>Tanggal Peminjaman</th>
                            <th>Nama</th>
                            <th>NIP</th>
                            <th>Unit</th>
                            <th>NDE</th>
                            <th>Status</th>
                            <th>Surat Berita</th>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($pesanan as $psn) : ?>
                            <tr>
                                <td><?= $i ?></td>
                                <td><?= $psn['id'] ?></td>
                                <td><?= $psn['tanggal'] ?></td>
                                <td><?= $psn['nama'] ?></td>
                                <td><?= $psn['nip'] ?></td>
                                <td><?= $psn['unit'] ?></td>
                                <td><a type="button" class="btn btn-light" href="<?php echo base_url() ?>admin/pesanan/downloadNde/<?= $psn['nde'] ?>">Download</a></td>
                                <td>
                                    <?php if ($psn['status'] == 1) { ?>
                                        Proses
                                        <a type="button" class="btn btn-danger" href="<?php echo base_url() ?>admin/pesanan/updateStatus1/<?= $psn['id'] ?>" onclick="return confirm('Yakin?')">Update</a>
                                    <?php } elseif ($psn['status'] == 2) { ?>
                                        Peminjaman
                                        <a type="button" class="btn btn-warning" href="<?php echo base_url() ?>admin/pesanan/updateStatus2/<?= $psn['id'] ?>" onclick="return confirm('Yakin?')">Update</a>
                                    <?php } else { ?>
                                        <button type="button" class="btn btn-light">Selesai</button>
                                    <?php } ?>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <div class="dropdown">
                                            <a class="btn btn-danger dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                                Surat Berita
                                            </a>

                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <li><a class="dropdown-item" href="<?php echo base_url() ?>admin/pesanan/printAll/<?= $psn['id']; ?>" target="_blank">
                                                        Print Semua Berita
                                                    </a></li>
                                                <li><a class="dropdown-item" href="<?= base_url(); ?>admin/pesanan/printPenyerahan/<?= $psn['id']; ?>" target="_blank">
                                                        Print Penyerahan
                                                    </a></li>
                                                <li><a class="dropdown-item" href="<?php echo base_url() ?>admin/pesanan/printPengembalian/<?= $psn['id']; ?>" target="_blank">
                                                        Print Pengembalian
                                                    </a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php
                            $i++;
                        endforeach; ?>
                    </tbody>
                    <!-- <tbody>
                        <?php foreach ($pesanan as $psn) : ?>
                            <tr>
                                <td><?= $psn['id'] ?></td>
                                <td><?= $psn['tanggal'] ?></td>
                                <td><?= $psn['nama'] ?></td>
                                <td><?= $psn['nip'] ?></td>
                                <td><?= $psn['unit'] ?></td>
                                <td>
                                    <a href="<?php echo base_url() ?>admin/pesanan/downloadNde/<?= $psn['nde']; ?>" class="link-primary">Download NDE</a>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <a class="btn btn-danger dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                            Surat Berita
                                        </a>

                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <li><a class="dropdown-item" href="<?php echo base_url() ?>admin/pesanan/printAll/<?= $psn['id']; ?>" target="_blank">
                                                    Print Semua Berita
                                                </a>
                                            </li>
                                            <li><a class="dropdown-item" href="<?= base_url(); ?>admin/pesanan/printPenyerahan/<?= $psn['id']; ?>" target="_blank">
                                                    Print Penyerahan
                                                </a>
                                            </li>
                                            <li><a class="dropdown-item" href="<?php echo base_url() ?>admin/pesanan/printPengembalian/<?= $psn['id']; ?>" target="_blank">
                                                    Print Pengembalian
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                                </td>
                            </tr>

                        <?php endforeach; ?>
                    </tbody> -->
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Bill No.</th>
                            <th>Tanggal Peminjaman</th>
                            <th>Nama</th>
                            <th>NIP</th>
                            <th>Unit</th>
                            <th>NDE</th>
                            <th>Status</th>
                            <th>Surat Berita</th>
                        </tr>
                    </tfoot>
                </table>

                <!-- <h1>echo JSON: <?= $output ?></h1> -->
            </div>
        </div>
    </div>
</div>

<!-- <script src="<?php echo base_url('assets/jquery/jquery-3.6.0.min.js') ?>"></script>
<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/DataTables-1.11.5/js/jquery.dataTables.min.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/DataTables-1.11.5/js/dataTables.bootstrap.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/DataTables/datatables.min.js"></script> -->


<script type="text/javascript">
    // var table;

    // $(document).ready(function() {
    //     $('#datapesanan').DataTable({
    //         "processing": true,
    //         "serverSide": true,
    //         "ajax":
    //     })
    // })

    // $(document).ready(function() {

    //     //datatables
    //     table = $('#datapesanan').dataTable({
    //         responsive: true,
    //         "destroy": true,
    //         "processing": true,
    //         "serverSide": true,
    //         "order": [],

    //         "ajax": {
    //             "url": "<?= site_url('admin/pesanan/ambildata') ?>",
    //             "type": "POST"
    //         },

    //         "columnDefs": [{
    //             "targets": [0],
    //             "orderable": false,
    //             "width": 5
    //         }],

    //     });

    // });
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/datatables/datatables.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/datatables/lib/js/dataTables.bootstrap.min.js') ?>"></script>
<script src="http://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" defer></script>