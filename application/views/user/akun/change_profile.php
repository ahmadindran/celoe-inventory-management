<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Tambah Akun
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
                                <input class="form-control" id="username" name="username" type="text" placeholder="Username" value="<?= $akun['username'] ?>" disabled>
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
                            <label for="brand" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input class="form-control" id="password" name="password" type="password" placeholder="Password">
                                <div class="form-text text-danger"><?= form_error('password'); ?></div>
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