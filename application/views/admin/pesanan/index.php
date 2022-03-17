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

                <table class="table table-striped" id="managepesananTable">
                    <thead>
                        <tr class="table-dark">
                            <th scope="col">Bill No.</th>
                            <th scope="col">Tanggal Peminjaman</th>
                            <th scope="col">Nama</th>
                            <th scope="col">NIP</th>
                            <th scope="col" colspan="3">Unit</th>
                            </trb>
                    </thead>
                    <tbody>
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
                                                </a></li>
                                            <li><a class="dropdown-item" href="<?= base_url(); ?>admin/pesanan/printPenyerahan/<?= $psn['id']; ?>" target="_blank">
                                                    Print Penyerahan
                                                </a></li>
                                            <li><a class="dropdown-item" href="<?php echo base_url() ?>admin/pesanan/printPengembalian/<?= $psn['id']; ?>" target="_blank">
                                                    Print Pengembalian
                                                </a></li>
                                        </ul>
                                    </div>

                                </td>
                            </tr>

                        <?php endforeach; ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>