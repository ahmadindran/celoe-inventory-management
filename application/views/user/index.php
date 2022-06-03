<div class="container">

    <div class="d-flex flex-row-reverse bd-highlight">
        <div class="col-4 search">
            <form action="<?= base_url('user/homepage') ?>" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="keyword" autocomplete="off" autofocus>
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-danger" name="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <?php foreach ($produk as $pdk) :
                if ($pdk['status'] == "1") { ?>
                    <div class="col-md-4 clearfix">
                        <div class="card">
                            <img class="card-img-top" src="<?php echo base_url() ?>assets/upload/produk/<?= $pdk['foto'] ?>" alt="">
                            <div class="card-body">
                                <h5 class="card-title"><?= $pdk['id'] ?> - <?= $pdk['nama'] ?></h5>
                                <!-- <h6 class="card-subtitle mb-2 text-muted"><?= $pdk['categories'] ?> - <?= $pdk['brand'] ?></h6> -->
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

    <!-- <div class="product-item" style="background:#fff;">
        <form method="post" action="mens.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
            <div class="product-image">
                <img style="max-height: 250px;max-width: 250px;" src="accessesoris/product/
                <?php echo $product_array[$key]["image"]; ?>">
            </div>
            <div>
                <strong>TYPE:<?php echo $product_array[$key]["name"]; ?></strong>
            </div>
            <div>
                <strong>MADE IN:<?php echo $product_array[$key]["madein"]; ?></strong>
            </div>

            <div class="product-price"><?php echo $product_array[$key]["price"] . "Birr"; ?></div>
        </form>
    </div> -->

    <?= $this->pagination->create_links(); ?>
</div>