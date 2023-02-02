<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <?php echo $judul; ?>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <input type="hidden" name="id" id="id" value="<?= $akun['id'] ?>">
                        <div class="mb-3 row">
                            <label for="brand" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input class="form-control" id="nama" name="nama" type="text" placeholder="Nama" value="<?= $akun['nama'] ?>">
                                <div class="form-text text-danger"><?= form_error('nama'); ?></div>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="brand" class="col-sm-2 col-form-label">Username</label>
                            <div class="col-sm-10">
                                <input class="form-control" id="username" name="username" type="text" placeholder="Username" value="<?= $akun['username'] ?>">
                                <div class="form-text text-danger"><?= form_error('username'); ?></div>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="brand" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input class="form-control" id="email" name="email" type="text" placeholder="Email" value="<?= $akun['email'] ?>">
                                <div class="form-text text-danger"><?= form_error('email'); ?></div>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="brand" class="col-sm-2 col-form-label">Status</label>
                            <!-- level user
                            0 = belum approved
                            1 = admin
                            2 = user
                            3 = super admin -->
                            <div class="col-sm-10">
                                <select class="form-select" id="level" name="level" aria-label="Default select example">
                                    <option value="0" <?php if ($akun['level'] == '0') {
                                                            echo 'selected';
                                                        }?>>Belum Approved</option>
                                    <option value="1" <?php if ($akun['level'] == '1') {
                                                            echo 'selected';
                                                        } ?>>Admin</option>
                                    <option value="2" <?php if ($akun['level'] == '2') {
                                                            echo 'selected';
                                                        } ?>>User</option>
                                    <option value="3" <?php if ($akun['level'] == '3') {
                                                            echo 'selected ';
                                                        }
                                                        if ($level == 1) {
                                                            echo 'disabled';
                                                        } ?>>Super Admin</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                            <label class="form-check-label" for="flexCheckDefault">
                                Ganti Password
                            </label>
                        </div>
                        <div class="collapse" id="collapseExample">
                            <div class="mb-3 row">
                                <label for="brand" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                    <input class="form-control" id="password" name="password" type="password" placeholder="Password">
                                    <div class="form-text text-danger"><?= form_error('password'); ?></div>
                                    <div class="small text-muted mt-2">&#9432; Minimal 8 Karakter</div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="brand" class="col-sm-2 col-form-label">Konfirmasi Password</label>
                                <div class="col-sm-10">
                                    <input class="form-control" id="passwordConf" name="passwordConf" type="password" placeholder="Ulangi Password">
                                    <div class="form-text text-danger"><?= form_error('passwordConf'); ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button type="submit" class="btn btn-danger">Save</button>
                            <button class="btn btn-light" onclick="window.history.go(-1); return false;" type="submit">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>