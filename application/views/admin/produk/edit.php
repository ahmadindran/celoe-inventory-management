<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Tambah Produk
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <input type="hidden" name="id-old" id="id-old" value="<?= $produk['id']; ?>">
                        <div class="mb-3 row">
                            <label for="produk" class="col-sm-2 col-form-label">ID</label>
                            <div class="col-sm-10">
                                <input class="form-control" id="id-new" name="id-new" type="text" placeholder="ID" value="<?= $produk['id'] ?>">
                                <div class="form-text text-danger"><?= form_error('produk'); ?></div>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="produk" class="col-sm-2 col-form-label">Nama Produk</label>
                            <div class="col-sm-10">
                                <input class="form-control" id="nama" name="nama" type="text" placeholder="Produk" value="<?= $produk['nama'] ?>">
                                <div class="form-text text-danger"><?= form_error('produk'); ?></div>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="produk" class="col-sm-2 col-form-label">Brand</label>
                            <div class="col-sm-10">
                                <select class="form-select" name="brand" id="brand">
                                    <?php foreach ($brand as $brnd) : ?>
                                        <?php if ($brnd['status'] == "1") { ?>
                                            <option value="<?= $brnd['brand'] ?>" <?php if ($produk['brand'] == $brnd['brand']) {
                                                                                        echo 'selected="selected"';
                                                                                    } ?>><?= $brnd['brand'] ?></option>
                                    <?php  }
                                    endforeach; ?>
                                </select>
                                <!-- <input class="form-control" id="brand" name="brand" type="text" placeholder="Brand"> -->
                                <div class="form-text text-danger"><?= form_error('produk'); ?></div>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="produk" class="col-sm-2 col-form-label">Kategori</label>
                            <div class="col-sm-10">
                                <select class="form-select" name="kategori" id="kategori">
                                    <?php foreach ($kategori as $ctg) : ?>
                                        <?php if ($ctg['status'] == "1") { ?>
                                            <option value="<?= $ctg['categories'] ?>" <?php if ($produk['kategori'] == $ctg['categories']) {
                                                                                            echo 'selected="selected"';
                                                                                        } ?>><?= $ctg['categories'] ?></option>
                                    <?php  }
                                    endforeach; ?>
                                </select>
                                <div class="form-text text-danger"><?= form_error('produk'); ?></div>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="produk" class="col-sm-2 col-form-label">Stock</label>
                            <div class="col-sm-10">
                                <input class="form-control" id="stock" name="stock" type="number" placeholder="Stok" value="<?= $produk['stock'] ?>">
                                <div class="form-text text-danger"><?= form_error('produk'); ?></div>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="produk" class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-10">
                                <select class="form-select" id="active" name="active" aria-label="Default select example">
                                    <option value="1">Tersedia</option>
                                    <option value="2">Tidak</option>
                                </select>
                            </div>
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button type="submit" class="btn btn-danger">Save</button>
                            <button type="button" class="btn btn-light">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>