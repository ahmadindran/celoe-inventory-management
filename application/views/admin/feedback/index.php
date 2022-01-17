<div class="container">
    <h3>Feedback</h3>
    <div class="row">
        <div class="col-md-12">

            <?php if ($this->session->flashdata('feedback')) : ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    Feedback <strong><?= $this->session->flashdata('feedback'); ?></strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <a type="button" href="<?php echo base_url() ?>admin/feedback/tambah" class="btn btn-primary">Tambah feedback</a>
            <div class="container">

                <table class="table table-striped" id="manageReportTable">
                    <thead>
                        <tr class="table-dark">
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Link Admin</th>
                            <th scope="col" colspan="2">Link User</th>
                            </trb>
                    </thead>
                    <tbody>
                        <?php foreach ($feedback as $rpt) : ?>
                            <?php if ($rpt['status'] == "1") { ?>
                                <tr>
                                    <td><?= $rpt['deskripsi'] ?></td>
                                    <td><a href="<?= $rpt['link_admin'] ?>" class="link-primary" target="_blank">Klik disini</a></td>
                                    <td><a href="<?= $rpt['link_user'] ?>" class="link-primary" target="_blank">Klik disini</a></td>
                                    <td>
                                        <a type="button" class="btn btn-warning float-right" href="<?= base_url(); ?>admin/feedback/ubah/<?= $rpt['id']; ?>">
                                            Ubah
                                        </a>
                                        <a type="button" class="btn btn-danger float-right" href="<?= base_url(); ?>admin/feedback/hapus/<?= $rpt['id']; ?>" onclick="return confirm('Yakin?')">
                                            <i class="bi bi-trash"></i>Hapus
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>