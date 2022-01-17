<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Tambah Feedback
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="mb-3 row">
                            <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                            <div class="col-sm-10">
                                <input class="form-control" id="deskripsi" name="deskripsi" type="text" placeholder="Deskripsi">
                                <div class="form-text text-danger"><?= form_error('deskripsi'); ?></div>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="link-admin" class="col-sm-2 col-form-label">Link Admin</label>
                            <div class="col-sm-10">
                                <input class="form-control" id="link_admin" name="link_admin" type="url" placeholder="Link Admin">
                                <div class="form-text text-danger"><?= form_error('link_admin'); ?></div>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="link-user" class="col-sm-2 col-form-label">Link User</label>
                            <div class="col-sm-10">
                                <input class="form-control" id="link_user" name="link_user" type="url" placeholder="Link User">
                                <div class="form-text text-danger"><?= form_error('link_user'); ?></div>
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