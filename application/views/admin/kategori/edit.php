<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Edit Kategori
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <input type="hidden" name="id" id="kategori" value="<?= $kategori['id']; ?>">
                        <div class="mb-3 row">
                            <label for="kategori" class="col-sm-2 col-form-label">kategori</label>
                            <div class="col-sm-10">
                                <input class="form-control" id="kategori" name="kategori" type="text" placeholder="kategoris" value="<?= $kategori['categories'] ?>">
                                <div class="form-text text-danger"><?= form_error('kategori'); ?></div>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="kategori" class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-10">
                                <select class="form-select" id="active" name="active" aria-label="Default select example">
                                    <option value="1" <?php if ($kategori['active'] == "1") {
                                                            echo 'selected="selected"';
                                                        } ?>>Tersedia</option>
                                    <option value="2" <?php if ($kategori['active'] == "2") {
                                                            echo 'selected="selected"';
                                                        } ?>>Tidak Tersedia</option>
                                </select>
                            </div>
                        </div>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button type="submit" name="edit" class="btn btn-danger">Save</button>
                            <button type="submit" class="btn btn-light" onclick="window.history.go(-1); return false;">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>