<style>
    .navbar .navbar-nav .nav-link {
        color: #000000;
        font-size: 1.1em;
    }

    .navbar .navbar-nav .nav-link:hover {
        color: dimgrey;
    }

    .navbar .navbar-nav .nav-item {
        position: relative;
    }

    .navbar .navbar-nav .nav-item::after {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        margin: auto;
        background-color: #000000;
        width: 0%;
        content: "";
        height: 4px;
        transition: all 0.5s;
    }

    .navbar .navbar-nav .nav-item:hover::after {
        width: 100%;
    }
</style>

<nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color:#f1f4f5;">
    <div class="container container-fluid">
        <a class="navbar-brand" href="<?php echo base_url() ?>admin/homepage">
            <img src="<?php echo base_url('assets/image/celoe.png') ?>" alt="" width="120" height="40">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul id="navb" class="navbar-nav ml-auto mt-2 position-relative menu">
                <li class="nav-item">
                    <a class="nav-link <?php if (isset($nav_homepage)) {
                                            echo 'active fw-bold';
                                        } ?>" href="<?php echo base_url() ?>admin/homepage">Homepage</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if (isset($nav_brand)) {
                                            echo 'active fw-bold';
                                        } ?>" href="<?php echo base_url() ?>admin/brand">Brand</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if (isset($nav_kategori)) {
                                            echo 'active fw-bold';
                                        } ?>" href="<?php echo base_url() ?>admin/kategori">Kategori</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if (isset($nav_produk)) {
                                            echo 'active fw-bold';
                                        } ?>" href="<?php echo base_url() ?>admin/produk">Produk</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if (isset($nav_pesanan)) {
                                            echo 'active fw-bold';
                                        } ?>" href="<?php echo base_url() ?>admin/pesanan">Pesanan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if (isset($nav_feedback)) {
                                            echo 'active fw-bold';
                                        } ?>" href="<?php echo base_url() ?>admin/feedback">Feedback</a>
                </li>
                <li class="dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Akun
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item nav-link" href="<?php echo base_url() ?>admin/akun">Akun</a>
                        <a class="dropdown-item nav-link" href="<?php echo base_url() ?>/login/logout_proses">Log Out</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>