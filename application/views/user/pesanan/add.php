<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Tambah Pesanan
                </div>

                <div class="card-body">
                    <form action="" method="post">

                        <div class="mb-3 row">
                            <label for="deskripsi" class="col-sm-2 col-form-label">Tanggal Pemesanan</label>
                            <div class="col-sm-10">
                                <input class="form-control" id="tgl" name="tgl" type="date" placeholder="Tanggal">
                                <div class="form-text text-danger"><?= form_error('tgl'); ?></div>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="deskripsi" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input class="form-control" id="nama" name="nama" type="text" placeholder="Nama">
                                <div class="form-text text-danger"><?= form_error('tgl'); ?></div>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="deskripsi" class="col-sm-2 col-form-label">NIP</label>
                            <div class="col-sm-10">
                                <input class="form-control" id="nip" name="nip" type="number" placeholder="NIP">
                                <div class="form-text text-danger"><?= form_error('tgl'); ?></div>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="deskripsi" class="col-sm-2 col-form-label">Unit Pemesan</label>
                            <div class="col-sm-10">
                                <input class="form-control" id="unit" name="unit" type="text" placeholder="Unit Pemesan">
                                <div class="form-text text-danger"><?= form_error('tgl'); ?></div>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="produk" class="col-sm-2 col-form-label">Upload NDE</label>
                            <div class="col-sm-10">
                                <input class="form-control" id="nde" name="nde" type="file" placeholder="NDE">
                                <div class="form-text text-danger"><?= form_error('file'); ?></div>
                            </div>
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button type="submit" class="btn btn-danger">Save</button>
                            <button type="button" class="btn btn-light">Cancel</button>
                        </div>      
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>