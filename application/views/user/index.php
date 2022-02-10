<div class="container">

    <div class="row justify-content-between">
        <div class="col-4">
            <div class="alert alert-danger" role="alert">
                Total Pinjaman : 0
            </div>
        </div>
        <div class="col-4">
            <form action="<?= base_url('user/homepage') ?>" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="keyword" autocomplete="off" autofocus>
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-danger" name="submit"><i class="bi bi-search"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <?php foreach ($produk as $pdk) :
                if ($pdk['status'] == "1") { ?>
                    <div class="col-md-4">
                        <div class="card">
                            <img class="img-fluid" src="<?php echo base_url() ?>assets/upload/produk/<?= $pdk['foto'] ?>" alt="" width="500px" height="500px">
                            <div class="card-body">
                                <h5 class="card-title"><?= $pdk['id'] ?> - <?= $pdk['nama'] ?></h5>
                                <h6 class="card-subtitle mb-2 text-muted"><?= $pdk['kategori_id'] ?> - <?= $pdk['brand_id'] ?></h6>
                                <p class="card-text"><?php if ($pdk['aktif'] == "1") {
                                                            echo 'Tersedia';
                                                        } else {
                                                            echo 'Tidak Tersedia';
                                                        }  ?></p>
                                <p class="text-end">Stock <?= $pdk['stock'] ?></p>

                            </div>
                        </div>
                    </div>
            <?php }
            endforeach; ?>
        </div>
    </div>

    <?= $this->pagination->create_links(); ?>
</div>