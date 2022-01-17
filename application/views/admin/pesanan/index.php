<?= var_dump($pesanan) ?>
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
                            <th scope="col">pesanan</th>
                            <th scope="col" colspan="2">Status</th>
                            </trb>
                    </thead>
                    <tbody>
                        <?php foreach ($pesanan as $psn) : ?>
                            <?php if ($psn['status'] == "1") { ?>
                                <tr>
                                    <td><?= $psn['pesanan'] ?></td>
                                    <td><?php if ($psn['active'] == "1") {
                                            echo 'Tersedia';
                                        } else {
                                            echo 'Tidak Tersedia';
                                        }  ?>
                                    </td>
                                    <td>
                                        <a type="button" class="btn btn-warning float-right" href="<?= base_url(); ?>admin/pesanan/ubah/<?= $psn['id']; ?>">
                                            Ubah
                                        </a>
                                        <a type="button" class="btn btn-danger float-right" href="<?= base_url(); ?>admin/pesanan/hapus/<?= $psn['id']; ?>" onclick="return confirm('Yakin?')">
                                            <i class="bi bi-trash"></i>Hapus
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>