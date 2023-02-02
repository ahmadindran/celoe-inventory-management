<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <?php echo $judul; ?>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="mb-3 row">
                            <label for="brand" class="col-sm-2 col-form-label">Brand</label>
                            <div class="col-sm-10">
                                <input class="form-control" id="brand" name="brand" type="text" placeholder="Brands">
                                <div class="form-text text-danger"><?= form_error('brand'); ?></div>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="brand" class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-10">
                                <select class="form-select" id="active" name="active" aria-label="Default select example">
                                    <option value="1">Tersedia</option>
                                    <option value="2">Tidak</option>
                                </select>
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