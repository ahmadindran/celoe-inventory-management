<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Edit Brand
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <input type="hidden" name="id" id="brand" value="<?= $brand['id']; ?>">
                        <div class="mb-3 row">
                            <label for="brand" class="col-sm-2 col-form-label">Brand</label>
                            <div class="col-sm-10">
                                <input class="form-control" id="brand" name="brand" type="text" placeholder="Brands" value="<?= $brand['brand'] ?>">
                                <div class="form-text text-danger"><?= form_error('brand'); ?></div>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="brand" class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-10">
                                <select class="form-select" id="active" name="active" aria-label="Default select example">
                                    <option value="1" <?php if ($brand['active'] == "1") {
                                                            echo 'selected="selected"';
                                                        } ?>>Tersedia</option>
                                    <option value="2" <?php if ($brand['active'] == "2") {
                                                            echo 'selected="selected"';
                                                        } ?>>Tidak Tersedia</option>
                                </select>
                            </div>
                        </div>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button type="submit" name="edit" class="btn btn-danger">Save</button>
                            <button type="button" class="btn btn-light">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>