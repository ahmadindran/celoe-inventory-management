<div class="container">
    <div class="row justify-content-md-center" style="margin-top: 20px;">
        <div class="col-9">
            <div class="card">
                <div class="card-header">
                    <h3>Tambah Pesanan</h3>
                </div>

                <div class="card-body" style="margin-top: 10px;">
                    <form action="" method="post" enctype="multipart/form-data">

                        <div class="mb-3 row" style="padding-bottom: 4px;">
                            <label for="deskripsi" class="col-sm-2 col-form-label">Tanggal</label>
                            <div class="col-sm-10">
                                <div class="row g-3">
                                    <div class="col">
                                        <input class="form-control" id="dpd1" name="tgl-awal" type="text" placeholder="Dari" data-date-format="dd-mm-yyyy">
                                    </div>
                                    <div class="col">
                                        <input class="form-control" id="dpd2" name="tgl-akhir" type="text" placeholder="Sampai" data-date-format="dd-mm-yyyy">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="deskripsi" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input class="form-control" id="nama" name="nama" type="text" placeholder="Nama">
                                <div class="form-text text-danger"><?= form_error('nama'); ?></div>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="deskripsi" class="col-sm-2 col-form-label">NIP</label>
                            <div class="col-sm-10">
                                <input class="form-control" id="nip" name="nip" type="number" placeholder="NIP">
                                <div class="form-text text-danger"><?= form_error('nip'); ?></div>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="deskripsi" class="col-sm-2 col-form-label">Unit Pemesan</label>
                            <div class="col-sm-10">
                                <input class="form-control" id="unit" name="unit" type="text" placeholder="Unit Pemesan">
                                <div class="form-text text-danger"><?= form_error('unit'); ?></div>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="nde" class="col-sm-2 col-form-label">Upload NDE</label>
                            <div class="col-sm-10">
                                <input class="form-control" id="nde" name="nde" type="file" placeholder="NDE">
                                <div class="form-text text-danger"><?= form_error('nde'); ?></div>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="barang" class="col-sm-2 col-form-label">Barang</label>
                            <div class="col-sm-10">
                                <div class="form-group fieldGroup">
                                    <div class="input-group" style="margin-bottom: 5px;">
                                        <select class="form-select" aria-label="Default select example" name="produk[]" style="width: 50%">
                                            <option selected disabled>Pilih Barang</option>
                                            <?php foreach ($produk as $pdk) :
                                                if ($pdk['status'] == "1") { ?>
                                                    <option value="<?= $pdk['id'] ?>"><?= $pdk['nama'] ?></option>
                                            <?php  }
                                            endforeach; ?>
                                        </select>
                                        <input type="number" class="form-control" name="banyak[]" id="banyak">
                                        <div class="input-group-addon ml-3">
                                            <a href="javascript:void(0)" class="btn btn-warning addMore"><i class="fa-solid fa-plus"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <div class="col-sm-10">
                                <div class="form-group fieldGroupCopy" style="display: none;">
                                    <div class="input-group" style="margin-bottom: 5px;">
                                        <select class="form-select" aria-label="Default select example" name="produk[]" style="width: 50%">
                                            <option selected disabled>Pilih Barang</option>
                                            <?php foreach ($produk as $pdk) :
                                                if ($pdk['status'] == "1") { ?>
                                                    <option value="<?= $pdk['id'] ?>"><?= $pdk['nama'] ?></option>
                                            <?php  }
                                            endforeach; ?>
                                        </select>
                                        <input type="number" class="form-control" name="banyak[]" id="banyak">
                                        <div class="input-group-addon ml-3">
                                            <a href="javascript:void(0)" class="btn btn-danger remove"><i class="fa-solid fa-trash"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button type="submit" class="btn btn-danger print" name="submit">Save</button>
                            <button type="submit" class="btn btn-light" onclick="window.history.go(-1); return false;">Cancel</button>
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

        var nowTemp = new Date();
        var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

        var checkin = $('#dpd1').datepicker({
            onRender: function(date) {
                return date.valueOf() < now.valueOf() ? 'disabled' : '';
            }
        }).on('changeDate', function(ev) {
            if (ev.date.valueOf() > checkout.date.valueOf()) {
                var newDate = new Date(ev.date)
                newDate.setDate(newDate.getDate() + 1);
                checkout.setValue(newDate);
            }
            checkin.hide();
            $('#dpd2')[0].focus();
        }).data('datepicker');

        var checkout = $('#dpd2').datepicker({
            onRender: function(date) {
                return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
            }
        }).on('changeDate', function(ev) {
            checkout.hide();
        }).data('datepicker');
    });
</script>