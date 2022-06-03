<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Edit Feedback
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <input type="hidden" name="id" id="id" value="<?= $feedback['id']; ?>">
                        <div class="mb-3 row">
                            <label for="brand" class="col-sm-2 col-form-label">Deskripsi</label>
                            <div class="col-sm-10">
                                <input class="form-control" id="deskripsi" name="deskripsi" type="text" placeholder="Deskripsi" value="<?= $feedback['deskripsi'] ?>">
                                <div class="form-text text-danger"><?= form_error('deskripsi'); ?></div>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="brand" class="col-sm-2 col-form-label">Link Admin</label>
                            <div class="col-sm-10">
                                <input class="form-control" id="link_admin" name="link_admin" type="url" placeholder="Link Admin" value="<?= $feedback['link_admin'] ?>">
                                <div class="form-text text-danger"><?= form_error('link_admin'); ?></div>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="brand" class="col-sm-2 col-form-label">Link User</label>
                            <div class="col-sm-10">
                                <input class="form-control" id="link_user" name="link_user" type="url" placeholder="Link User" value="<?= $feedback['link_user'] ?>">
                                <div class="form-text text-danger"><?= form_error('link_user'); ?></div>
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