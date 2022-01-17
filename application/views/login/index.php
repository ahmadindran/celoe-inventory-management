<div class="container">
    <h2>Login</h2><br>
    <?php if (validation_errors()) { ?>
        <div class="alert alert-danger">
            <?php echo validation_errors(); ?>
        </div>
    <?php
    } ?>
    <?php echo $this->session->flashdata('pemberitahuan'); ?>
    <form method="post" action="<?php echo base_url() ?>login">
        <div class="form-group">
            <label>Username:</label>
            <input type="text" class="form-control" name="username" placeholder="Masukan Username">
        </div>
        <div class="form-group">
            <label>Password:</label>
            <input type="password" class="form-control" name="password" placeholder="Masukan Password">
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" name="tombol_login" value="Login">
        </div>
    </form>
</div>