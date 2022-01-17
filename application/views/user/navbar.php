<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
    <div class="container">
        <a class="navbar-brand" href="<?php echo base_url() ?>admin/homepage">
            <img src="<?php echo base_url('assets/image/celoe.png') ?>" alt="" width="120" height="40">
        </a>
        <div class="navbar-collapse collapse w-100 order-3 dual-collapse2" id="navbarNavAltMarkup">
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