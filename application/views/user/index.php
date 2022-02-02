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

    <!-- <div class="row">
        <div class="col-md-4">
            <div class="card text-center">
                <img class="img-fluid" src="<?php echo base_url() ?>assets/upload/sony a6000.jpg" alt="">
                <div class="card-body">
                    <h5 class="card-title">SONY A6000</h5>
                    <h6 class="card-title">Kamera</h6>
                    <p class="card-text">Kamera Mirrorless + Charger</p>
                    <p class="text-end">Stock 14</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-center">
                <img class="img-fluid" src="<?php echo base_url() ?>assets/upload/yn 600.jpg" alt="">
                <div class="card-body">
                    <h5 class="card-title">Yong-Nuo</h5>
                    <h6 class="card-title">Lighting</h6>
                    <p class="card-text">YN-600 + Charger</p>
                    <p class="text-end">Stock 6</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-center">
                <img class="img-fluid" src="<?php echo base_url() ?>assets/upload/tp link gigabit.jpg" alt="">
                <div class="card-body">
                    <h5 class="card-title">Gigabit TP-Link</h5>
                    <h6 class="card-title">Switch</h6>
                    <p class="card-text">LAN Switch</p>
                    <p class="text-end">Stock 1</p>
                </div>
            </div>
        </div>
    </div> -->

    <!-- <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav> -->
</div>