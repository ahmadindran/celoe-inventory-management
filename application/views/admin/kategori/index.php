<div class="container">
    <h3>Kategori</h3>
    <div class="row">
        <div class="col-md-12">

            <?php if ($this->session->flashdata('kategori')) : ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    Kategori <strong><?= $this->session->flashdata('kategori'); ?></strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <a type="button" href="<?php echo base_url() ?>admin/kategori/tambah" class="btn btn-primary">Tambah kategori</a>
            <div class="container">

                <table class="table table-striped" id="managekategoriTable">
                    <thead>
                        <tr class="table-dark">
                            <th scope="col">Kategori</th>
                            <th scope="col" colspan="2">Status</th>
                            </trb>
                    </thead>
                    <tbody>
                        <?php foreach ($kategori as $ctg) : ?>
                            <?php if ($ctg['status'] == "1") { ?>
                                <tr>
                                    <td><?= $ctg['categories'] ?></td>
                                    <td><?php if ($ctg['active'] == "1") {
                                            echo 'Tersedia';
                                        } else {
                                            echo 'Tidak Tersedia';
                                        }  ?>
                                    </td>
                                    <td>
                                        <a type="button" class="btn btn-warning float-right" href="<?= base_url(); ?>admin/kategori/ubah/<?= $ctg['id']; ?>">
                                            Ubah
                                        </a>
                                        <a type="button" class="btn btn-danger float-right" href="<?= base_url(); ?>admin/kategori/hapus/<?= $ctg['id']; ?>" onclick="return confirm('Yakin?')">
                                            <i class="fa-regular fa-trash-can"></i> Hapus
                                        </a>
                                    </td>
                                </tr>
                        <?php }
                        endforeach; ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>