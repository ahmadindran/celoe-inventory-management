<div class="container">
    <h2>Login</h2><br>
    <?php if (validation_errors()) { ?>
        <div class="alert alert-danger">
            <?php echo validation_errors(); ?>
        </div>
    <?php
    } ?>
    <?php echo $this->session->flashdata('pemberitahuan'); ?>
    <!-- <div class="container">
        <table class="table table-borderless">
            <thead>
                <tr>
                    <th scope="col">Username</th>
                    <th scope="col">Password</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>admin</td>
                    <td>12345</td>
                </tr>
                <tr>
                    <td>user</td>
                    <td>12345</td>
                </tr>
            </tbody>
        </table>
    </div> -->
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