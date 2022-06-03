<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Tambah Produk
                </div>
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">

                        <input type="hidden" name="id-old" id="id-old" value="<?= $produk['id']; ?>">
                        <div class="mb-3 row">
                            <label for="produk" class="col-sm-2 col-form-label">ID</label>
                            <div class="col-sm-10">
                                <input class="form-control" id="id-new" name="id-new" type="text" placeholder="ID" value="<?= $produk['id'] ?>">
                                <div class="form-text text-danger"><?= form_error('id-new'); ?></div>
                            </div>

                        </div>
                        <div class="mb-3 row">
                            <label for="produk" class="col-sm-2 col-form-label">Nama Produk</label>
                            <div class="col-sm-10">
                                <input class="form-control" id="nama" name="nama" type="text" placeholder="Produk" value="<?= $produk['nama'] ?>">
                                <div class="form-text text-danger"><?= form_error('nama'); ?></div>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="produk" class="col-sm-2 col-form-label">Brand</label>
                            <div class="col-sm-10">
                                <select class="form-select" name="brand" id="brand">
                                    <?php foreach ($brand as $brnd) : ?>
                                        <?php if ($brnd['status'] == "1") { ?>
                                            <option value="<?= $brnd['id'] ?>" <?php if ($produk['brand_id'] == $brnd['id']) {
                                                                                        echo 'selected="selected"';
                                                                                    } ?>><?= $brnd['brand'] ?></option>
                                    <?php  }
                                    endforeach; ?>
                                </select>
                                <!-- <input class="form-control" id="brand" name="brand" type="text" placeholder="Brand"> -->
                                <!-- <div class="form-text text-danger"><?= form_error('produk'); ?></div> -->
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="produk" class="col-sm-2 col-form-label">Kategori</label>
                            <div class="col-sm-10">
                                <select class="form-select" name="kategori" id="kategori">
                                    <?php foreach ($kategori as $ctg) : ?>
                                        <?php if ($ctg['status'] == "1") { ?>
                                            <option value="<?= $ctg['id'] ?>" <?php if ($produk['kategori_id'] == $ctg['id']) {
                                                                                            echo 'selected="selected"';
                                                                                        } ?>><?= $ctg['categories'] ?></option>
                                    <?php  }
                                    endforeach; ?>
                                </select>
                                <!-- <div class="form-text text-danger"><?= form_error('produk'); ?></div> -->
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="produk" class="col-sm-2 col-form-label">Stock</label>
                            <div class="col-sm-10">
                                <input class="form-control" id="stock" name="stock" type="number" placeholder="Stok" value="<?= $produk['stock'] ?>">
                                <div class="form-text text-danger"><?= form_error('stock'); ?></div>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="produk" class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-10">
                                <select class="form-select" id="active" name="active" aria-label="Default select example">
                                    <option value="1" <?php if ($produk['aktif'] == "1") {
                                                            echo 'selected="selected"';
                                                        } ?>>Tersedia</option>
                                    <option value="2" <?php if ($produk['aktif'] == "2") {
                                                            echo 'selected="selected"';
                                                        } ?>>Tidak Tersedia</option>
                                </select>
                            </div>
                        </div>


                        <div class="mb-3 row">
                            <img src="<?php echo base_url() ?>assets/upload/produk/<?= $produk['foto'] ?>" alt="..." class="img-thumbnail">
                        </div>

                        <div class="mb-3 row">
                            <label for="produk" class="col-sm-2 col-form-label">Upload Foto</label>
                            <div class="col-sm-10">
                                <input class="form-control" id="file" name="file" type="file" placeholder="Foto">
                            </div>
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button type="submit" class="btn btn-danger">Save</button>
                            <button type="submit" class="btn btn-light" onclick="window.history.go(-1); return false;">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>