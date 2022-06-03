<div class="container">
    <h3>Produk</h3>
    <div class="row">
        <div class="col-md-12">

            <?php if ($this->session->flashdata('produk')) : ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    Produk <strong><?= $this->session->flashdata('produk'); ?></strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <a type="button" href="<?php echo base_url() ?>admin/produk/tambah" class="btn btn-primary float-right">Tambah produk</a>

            <!-- <div class="container">
                <table class="table table-striped" id="manageprodukTable">
                    <thead>
                        <tr class="table-dark">
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Brand</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Stock</th>
                            <th scope="col" colspan="2">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($produk as $pdk) :
                            if ($pdk['status'] == "1") { ?>
                                <tr>
                                    <td><?= $pdk['id'] ?></td>
                                    <td><?= $pdk['nama'] ?></td>
                                    <td><?= $pdk['brand'] ?></td>
                                    <td><?= $pdk['kategori'] ?></td>
                                    <td><?= $pdk['stock'] ?></td>
                                    <td><?php if ($pdk['aktif'] == "1") {
                                            echo 'Tersedia';
                                        } else {
                                            echo 'Tidak Tersedia';
                                        }  ?>
                                    </td>
                                    <td>
                                        <a type="button" class="btn btn-warning float-right" href="<?= base_url(); ?>admin/produk/ubah/<?= $pdk['id']; ?>">
                                            Ubah
                                        </a>
                                        <a type="button" class="btn btn-danger float-right" href="<?= base_url(); ?>admin/produk/hapus/<?= $pdk['id']; ?>" onclick="return confirm('Yakin?')">
                                            <i class="bi bi-trash"></i>Hapus
                                        </a>
                                    </td>
                                </tr>
                        <?php }
                        endforeach; ?>
                    </tbody>
                </table>
            </div> -->

            <div class="container">
                <div class="row">
                    <?php foreach ($produk as $pdk) :
                        if ($pdk['status'] == "1") { ?>
                            <div class="col-md-4">
                                <div class="card">
                                    <img class="img-fluid" src="<?php echo base_url() ?>assets/upload/produk/<?= $pdk['foto'] ?>" alt="" width="500px" height="500px">
                                    <div class="card-body">
                                        <h5 class="card-title"><?= $pdk['id'] ?> - <?= $pdk['nama'] ?></h5>
                                        <h6 class="card-subtitle mb-2 text-muted"><?= $pdk['categories'] ?> - <?= $pdk['brand'] ?></h6>
                                        <p class="card-text"><?php if ($pdk['aktif'] == "1") {
                                                                    echo 'Tersedia';
                                                                } else {
                                                                    echo 'Tidak Tersedia';
                                                                }  ?></p>
                                        <p class="text-end">Stock <?= $pdk['stock'] ?></p>
                                        <a type="button" class="btn btn-warning float-right" href="<?= base_url(); ?>admin/produk/ubah/<?= $pdk['id']; ?>">
                                            Ubah
                                        </a>
                                        <a type="button" class="btn btn-danger float-right" href="<?= base_url(); ?>admin/produk/hapus/<?= $pdk['id']; ?>" onclick="return confirm('Yakin?')">
                                            <i class="fa-regular fa-trash-can"></i> Hapus
                                        </a>
                                    </div>
                                </div>
                            </div>
                    <?php }
                    endforeach; ?>
                </div>
            </div>

        </div>
    </div>
</div>