<nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color:#f1f4f5;">
    <div class="container container-fluid">
        <a class="navbar-brand" href="<?php echo base_url() ?>user/homepage">
            <img src="<?php echo base_url('assets/image/celoe.png') ?>" alt="" width="120" height="40">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url() ?>user/homepage">Homepage</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url() ?>user/pesanan">Pemesanan</a>
                </li>
                <a href="<?php echo base_url() ?>/login/logout_proses" class="btn btn-warning" role="button">Logout</a>
            </ul>
        </div>
    </div>
</nav>