<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-9">
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
                            <label for="nde" class="col-sm-2 col-form-label">Upload NDE</label>
                            <div class="col-sm-10">
                                <input class="form-control" id="nde" name="nde" type="file" placeholder="NDE">
                                <div class="form-text text-danger"><?= form_error('file'); ?></div>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="barang" class="col-sm-2 col-form-label">Barang</label>
                            <div class="form-group fieldGroup">
                                <div class="input-group">
                                    <input type="text" name="username[]" class="form-control" placeholder="Enter Your Username" />
                                    <div class="input-group-addon ml-3">
                                        <a href="javascript:void(0)" class="btn btn-warning addMore"><i class="bi bi-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <div class="form-group fieldGroupCopy" style="display: none;">
                                <div class="input-group">
                                    <input type="text" name="username[]" class="form-control" placeholder="Enter Your Username" />
                                    <input type="text" name="email[]" class="form-control" placeholder="Enter Your email" />
                                    <div class="input-group-addon">
                                        <a href="javascript:void(0)" class="btn btn-danger remove"><i class="bi bi-trash"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- <div class="mb-3 row">
                            <div class="form-group fieldGroup">
                                <div class="input-group">
                                    <input type="text" name="username[]" class="form-control" placeholder="Enter Your Username" />
                                    <input type="text" name="email[]" class="form-control" placeholder="Enter Your email" />
                                    <div class="input-group-addon ml-3">
                                        <a href="javascript:void(0)" class="btn btn-warning addMore"><i class="bi bi-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div> -->

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

<script>
    $(document).ready(function() {
        // membatasi jumlah inputan
        var maxGroup = 10;

        //melakukan proses multiple input 
        $(".addMore").click(function() {
            if ($('body').find('.fieldGroup').length < maxGroup) {
                var fieldHTML = '<div class="form-group fieldGroup">' + $(".fieldGroupCopy").html() + '</div>';
                $('body').find('.fieldGroup:last').after(fieldHTML);
            } else {
                alert('Maximum ' + maxGroup + ' groups are allowed.');
            }
        });

        //remove fields group
        $("body").on("click", ".remove", function() {
            $(this).parents(".fieldGroup").remove();
        });
    });
</script>