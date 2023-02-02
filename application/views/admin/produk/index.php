<div class="container" style="margin-top: 20px;">
    <div class="row justify-content-between">
        <div class="col-2" style="margin-left: 3%;">
            <h3>Produk</h3>
        </div>

        <div class="col-2">
            <a type="button" href="<?php echo base_url() ?>admin/produk/tambah" class="btn btn-primary float-right">Tambah Produk</a>
        </div>
    </div>

    <div class="row" style="margin-top: 20px;">
        <div class="col-md-12">

            <?php if ($this->session->flashdata('produk')) : ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    Produk <strong><?= $this->session->flashdata('produk'); ?></strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

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
                                        <a type="button" class="btn btn-warning float-right ml-2" href="<?= base_url(); ?>admin/produk/ubah/<?= $pdk['id']; ?>">
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
