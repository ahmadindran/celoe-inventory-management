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

            <a type="button" href="<?php echo base_url() ?>user/pesanan/tambah" class="btn btn-primary">Tambah Pesanan</a>
            <div class="container">

                <table class="table table-striped" id="managepesananTable">
                    <thead>
                        <tr class="table-dark">
                            <th scope="col">Bill No.</th>
                            <th scope="col" colspan="2">Tanggal Peminjaman</th>
                            </trb>
                    </thead>
                    <tbody>
                        <?php foreach ($pesanan as $psn) : ?>
                            <tr>
                                <td><?= $psn['id'] ?></td>
                                <td><?= $psn['tanggal'] ?></td>
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
                </table>

            </div>
        </div>
    </div>
</div>