<!-- <div class="container">
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
            <a href="<?= base_url() ?>login/register"><strong><u>REGISTER</u></strong></a>
        </div>
    </form>
</div> -->
<style type="text/css">
  .bc {
    background-image: linear-gradient(to bottom right, #f28d8d, #FF0721, #FF0721, #000000);
  }

  .login {
    min-height: 100vh;
  }

  .bg-image {
    background-image: url("<?php echo base_url() ?>assets/image/Background-02.png");
    background-position: center;
  }

  .login-heading {
    font-weight: 300;
  }

  .btn-login {
    font-size: 0.9rem;
    letter-spacing: 0.05rem;
    padding: 0.75rem 1rem;
  }

  .jdl {
    margin-top: 150px;
    padding-left: 200px;
    padding-right: 40px;
  }

  h3 {
    color: #C2272D;
    text-align: center;
  }

  .submit {
    color: #ffffff;
  }

  img {
    size: 200%;
  }

  h5 {
    color: #ffffff;
  }

  .separator {
    color: #ffffff;
  }

  p .text {
    color: #ffffff;
    font-size: small;
  }

  .form-center {
    text-align: center;
  }

  .btn {
    color: #ffffff;
    background-color: #f58c02;
    border-radius: 20px;
  }

  .text {
    color: #ffffff;
  }

  div .alert {
    padding-top: 6px;
    padding-bottom: 0px;
    text-align: center;

  }

  .box1 {
    width: 100px;
    height: 100px;
    background: #C2272D;
    border-radius: 15px;
  }

  .box2 {
    width: 100px;
    height: 100px;
    border: 1px solid #C2272D;
    border-radius: 15px;
  }

  .table1 {
    margin: 15px;
    width: 65%;
  }
</style>

<div class="container-fluid ps-md-0">

  <div class="row">
    <div class="d-none d-md-flex col-md-3 col-lg-6">

      <div class="jdl">
        <h3 align="center">Alur Peminjaman Perangkat Studio <br> Center of E-learning and Open Education <br> Telkom University</h3>
        <br>
        <div align="center">
          <table class="table1">
            <tr>
              <th>
                <div class="box1"></div>
              </th>
              <th>
                <div class="box1"></div>
              </th>
              <th>
                <div class="box2"></div>
              </th>
            </tr>
          </table>
          <table class="table1">
            <tr>
              <td>
                <div class="box1"></div>
              </td>
              <td>
                <div class="box2"></div>
              </td>
              <td>
                <div class="box1"></div>
              </td>
            </tr>
          </table>
          <table class="table1">
            <tr>
              <td>
                <div class="box2"></div>
              </td>
              <td>
                <div class="box1"></div>
              </td>
              <td>
                <div class="box2"></div>
              </td>
            </tr>
          </table>

        </div>
      </div>
    </div>

    <div class="col-md-5 col-lg-6 bc">
      <div class="login py-4">
        <div class="container ">
          <div class="row ">
            <div class="mx-auto">
              <div class="logo-area">
                <img id="header_logo" class="logo" src="<?php echo base_url() ?>assets/image/logo celoe white.png">
              </div>
              <div align="center">
                <h5>Inventory Management System</h5>
              </div>
              <?php echo $this->session->flashdata('pemberitahuan'); ?>

              <hr class="separator">
              <?php if (validation_errors()) { ?>
                <div class="alert alert-danger align-item-center mb-1 mt-1 ">
                  <?php echo validation_errors(); ?>
                </div>
              <?php
              } ?>

              <div class="col-md-6 col-lg-6 mx-auto text-center">
                <form method="post" action="<?php echo base_url() ?>login">
                  <p class="text" align="center"><i>Silahkan login menggunakan akun SSO anda</i></p>
                  <div class="form-group mb-2">
                    <input type="text" class="form-control collectes-ville rounded-pill text-center" id="username" name="username" placeholder="Username">
                  </div>
                  <div class="form-group mb-2">
                    <input type="password" class="form-control collectes-ville rounded-pill text-center" id="password" name="password" placeholder="Password">
                  </div>
                  <!-- <div class="form-group form-floating mb-2">
                    <input type="password" class="form-control auth-input collectes-ville rounded-pill text-center" id="password" name="password" placeholder="Masukan Password"> -->
                  <!-- <label for="floatingInput text-center">Password</label> -->
                  <!-- </div> -->
                  <div align="center">
                    <div class="form-group col-lg-7">
                      <button type="submit" class="btn auth-btn mt-2 mb-3" name="tombol_login" value="Login">Login</button>
                    </div>
                  </div>
                </form>
              </div>

              <p class="text">Belum Punya Akun? <a href="<?php echo base_url() ?>register" class="text-link">Daftar</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>