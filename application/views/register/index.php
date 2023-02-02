<div class="page-content d-flex align-items-center">
    <!-- <?php if (validation_errors()) { ?>
        <div class="alert alert-danger">
            <?php echo validation_errors(); ?>
        </div>
    <?php
            } ?>
    <?php echo $this->session->flashdata('pemberitahuan'); ?> -->
    <div class="container d-flex justify-content-center">

        <div class="col-12 col-sm-10 col-md-8 col-lg-7 col-xl-6 col-xxl-5">

            <div class="auth-card">

                <div class="logo-area">
                    <img id="header_logo" class="logo" src="<?php echo base_url() ?>assets/image/celoe.png" />
                </div>

                <hr class="separator">

                <form method="post" action="">

                    <div class="form-group form-floating mb-2 mt-5">
                        <input type="text" class="form-control auth-input" id="floatingInput nama" name="nama" placeholder="Masukan Username">
                        <label for="floatingInput">Nama</label>
                        <div class="form-text text-danger"><?= form_error('nama'); ?></div>
                    </div>

                    <div class="form-group form-floating mb-3">
                        <input type="text" class="form-control auth-input" id="floatingInput username" name="username" placeholder="Masukan Password">
                        <label for="floatingInput">Username</label>
                        <div class="form-text text-danger"><?= form_error('username'); ?></div>
                    </div>

                    <div class="form-group form-floating mb-3">
                        <input type="email" class="form-control auth-input" id="floatingInput email" name="email" placeholder="Masukan Password">
                        <label for="floatingInput">Email</label>
                        <div class="form-text text-danger"><?= form_error('email'); ?></div>
                    </div>

                    <div class="form-group form-floating mb-3">
                        <input type="password" class="form-control auth-input" id="floatingInput password" name="password" placeholder="Masukan Password">
                        <label for="floatingInput">Password</label>
                        <div class="form-text text-danger"><?= form_error('password'); ?></div>
                        <div class="small text-muted mt-2">&#9432; Minimal 8 Karakter</div>
                    </div>

                    <div class="form-group form-floating mb-3">
                        <input type="password" class="form-control auth-input" id="floatingInput passwordConf" name="passwordConf" placeholder="Masukan Password">
                        <label for="floatingInput">Password Confirm</label>
                        <div class="form-text text-danger"><?= form_error('passwordConf'); ?></div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary auth-btn mt-2 mb-4">Register</button>
                    </div>
                </form>

                <p class="text mb-4">Sudah Punya Akun? <a href="<?= base_url() ?>login" class="text-link">Login</a></p>

            </div>
        </div>
    </div>
</div>