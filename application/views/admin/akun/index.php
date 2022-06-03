<div class="container">
    <h3>Akun</h3>
    <div class="row">
        <div class="col-md-12">

            <?php if ($this->session->flashdata('akun')) : ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    Akun <strong><?= $this->session->flashdata('akun'); ?></strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <a type="button" href="<?php echo base_url() ?>admin/akun/tambah" class="btn btn-primary">Tambah Akun</a>
            <div class="container">

                <table class="table table-striped" id="manageAkunTable">
                    <thead>
                        <tr class="table-dark">
                            <th scope="col">Nama</th>
                            <th scope="col">Username</th>
                            <th scope="col">Email</th>
                            <th scope="col" colspan="2">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($akun as $acc) : ?>
                            <tr>
                                <td><?= $acc['nama'] ?></td>
                                <td><?= $acc['username'] ?></td>
                                <td><?= $acc['email'] ?></td>
                                <td><?php if ($acc['level'] == "1") {
                                        echo 'Admin';
                                    } else {
                                        echo 'User';
                                    }  ?>
                                </td>
                                <td>
                                    <a type="button" class="btn btn-warning float-right" href="<?= base_url(); ?>admin/akun/ubah/<?= $acc['username']; ?>">
                                        Ubah
                                    </a>
                                    <a type="button" class="btn btn-danger float-right" href="<?= base_url(); ?>admin/akun/hapus/<?= $acc['username']; ?>" onclick="return confirm('Yakin?')">
                                        <i class="fa-regular fa-trash-can"></i> Hapus
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>