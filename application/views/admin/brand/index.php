<div class="container">
    <h3>Brand</h3>
    <div class="row">
        <div class="col-md-12">

            <?php if ($this->session->flashdata('brand')) : ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    Brand <strong><?= $this->session->flashdata('brand'); ?></strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <a type="button" href="<?php echo base_url() ?>admin/brand/tambah" class="btn btn-primary">Tambah Brand</a>
            <div class="container">

                <table class="table table-striped" id="manageBrandTable">
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
                                        <a type="button" class="btn btn-warning float-right" href="<?= base_url(); ?>admin/brand/ubah/<?= $brnd['id']; ?>">
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
                </table>

            </div>
        </div>
    </div>
</div>