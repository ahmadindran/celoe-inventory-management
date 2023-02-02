<div class="pagebreak">
    <table align="center" cellpadding="0" cellspacing="0" style="width: 100%;margin-bottom: 10px;">
        <tbody>
            <tr>
                <td colspan="5" style="text-align:center;text-decoration: underline; font-weight: bold; font-size: 25px;">BERITA SERAH TERIMA</td>
            </tr>
            <tr>
                <td colspan="5" style="text-align:center;text-decoration: underline; font-size: 25px;">PENYERAHAN BARANG</td>
            </tr>
            <tr>
                <td rowspan="8" colspan="2" style="" background-image="celo2.png"><img src="<?= base_url('/assets/image/celoe.png') ?>" alt="logo" width="35%;" style="margin:auto;"></td>
                <td colspan="3" style=" text-align: center;">ORIGINAL</td>
            </tr>
            <tr>
                <td colspan="3" style=" text-align: right;">DUPLICATE</td>
            </tr>
            <tr>
                <td colspan="3" style=" text-align: right;font-style: italic;font-weight: 600;text-decoration: underline;font-size: 25px;">CeLOE</td>
            </tr>
            <tr>
                <td colspan="3" style=" text-align: right;">Jl.Telekomunikasi Nomor 1,</td>
            </tr>
            <tr>
                <td colspan="3" style=" text-align: right;">Bandung,Jawa Barat</td>
            </tr>
            <tr>
                <td colspan="3" style=" text-align: right;">Telp: 1234567890</td>
            </tr>
            <tr>
                <td colspan="3" style=" text-align: right;">Email: Telkomuniversity@email.co.in</td>
            </tr>
            <tr>
                <td colspan="3" style=" text-align: right;color: blue;text-decoration: underline;">email0@email.co.in</td>
            </tr>
            <tr>
                <td colspan="2" style="padding: 0px;vertical-align: top;">
                    <table align="left" cellpadding="0" cellspacing="0" style="border: thin solid black; width: 100%">
                        <tbody>
                            <tr>
                                <td style="width: 64px;vertical-align: top;" rowspan="3">Kepada, </td>
                                <td style="border-bottom-style: solid; border-bottom-width: thin; border-bottom-color: black;">&nbsp;<?= $master['nama'] ?></td>
                            </tr>
                            <tr>
                                <td style="border-bottom-style: solid; border-bottom-width: thin; border-bottom-color: black">&nbsp;</td>
                            </tr>
                            <tr>
                                <td style="border-bottom-style: solid; border-bottom-width: thin; border-bottom-color: black">&nbsp;</td>
                            </tr>
                        </tbody>
                    </table>
                    <table align="left" cellspacing="0" style="width: 100%; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-right-width: thin; border-bottom-width: thin; border-left-width: thin; border-right-color: black; border-bottom-color: black; border-left-color: black;">
                        <tbody>
                            <tr>
                                <td style=" border-bottom-style: solid; border-bottom-width: thin; border-bottom-color: black;">NIP: <?= $master['nip'] ?></td>
                                <td style="border-left-style: solid; border-left-width: thin; border-left-color: black; border-bottom-style: solid; border-bottom-width: thin; border-bottom-color: black;color: black;">Unit: <?= $master['unit'] ?></td>
                            </tr>
                        </tbody>
                    </table>
                </td>
                <td style="padding: 0px;vertical-align: top;" colspan="3">
                    <table align="left" cellpadding="0" cellspacing="0" style="width: 100%">
                        <tbody>
                            <tr>
                                <td style="border-bottom-style: solid;border-bottom-width: thin;border-bottom-color: black;border-top: 1px solid black;border-right: 1px solid black;">Bill No : <?= $master['id'] ?></td>
                            </tr>
                            <tr>
                                <td style="border-bottom-style: solid;border-bottom-width: thin;border-bottom-color: black;border-right: 1px solid black;">Tanggal: <?php $tgl1 = strtotime($master['tgl_peminjaman']);
                                                                                                                                                                    echo $day1 . ', ' . date('d-m-Y', $tgl1);
                                                                                                                                                                    // echo $tgl1;
                                                                                                                                                                    ?></td>
                            </tr>
                            <tr>
                                <td style="border-bottom-style: solid;border-bottom-width: thin; border-bottom-width:thin;  border-bottom-color: black;height: 52px;border-right: 1px solid black;">Ditujukan Kepada: Bang.CeLOE</td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="width: 20%;text-align: center;border-right: 1px solid black;border-top-style:solid; border-top-width: thin; border-left: 1px solid black;border-bottom: 1px solid black;-webkit-print-color-adjust: exact;">Nomor</td>
                <td style="width: 60%;text-align: center;border-top-style: solid;border-right-style: solid;border-bottom-style: solid;border-top-width: thin;border-right-width: thin;border-bottom-width: thin;border-top-color: black;border-right-color: black;border-bottom-color: black;-webkit-print-color-adjust: exact;">Barang</td>
                <td style="width: 20%;text-align: center;border-top-style: solid;border-right-style: solid;border-bottom-style: solid;border-top-width: thin;border-right-width: thin;border-bottom-width: thin;border-top-color: black;border-right-color: black;border-bottom-color: black;-webkit-print-color-adjust: exact;">Banyak</td>
            </tr>
            <?php
            $index = 1;
            foreach ($detail as $dtl) : ?>
                <tr>
                    <td style="border-left: 1px solid black;border-right: 1px solid black;height: 27px; text-align: center;border-bottom: 1px solid black;"><?= $index; ?></td>
                    <td style="border-left: 1px solid black;height: 27px;border-bottom: 1px solid black;"><?= $dtl['nama'] ?></td>
                    <td style="border-left: 1px solid black;border-right: 1px solid black;height: 27px; text-align: center;border-bottom: 1px solid black;"><?= $dtl['banyak'] ?></td>
                </tr>
            <?php
                $index++;
            endforeach; ?>

            <!-- <tr style="border-bottom: 1px solid black;">
            <td style="border-left: 1px solid black;border-right: 1px solid black;height: 27px;"></td>
            <td style="border-left: 1px solid black;height: 27px;"></td>
            <td style="border-left: 1px solid black;height: 27px;"></td>
            <td style="width: 149px;border-right-style: solid;border-bottom-style: solid;border-right-width: thin;border-bottom-width: thin;border-right-color: black;border-bottom-color: #000;background-color: black;color: white;padding-left: 5px;-webkit-print-color-adjust: exact;">Total</td>
            <td style="width: 218px; border-top-style: solid; border-right-style: solid; border-bottom-style: solid; border-top-width: thin; border-right-width: thin; border-bottom-width: thin; border-top-color: black; border-right-color: black; border-bottom-color: black;">' . $subTotal . '</td>
        </tr> -->
        </tbody>
    </table>

    <div class="container">
        <table align="center" style="margin-top: 50px; margin-bottom: 50px;">
            <tr style="font-size: 20px;">
                <td>
                    Barang-barang tersebut telah diterima dengan baik dalam kondisi lengkap.
                </td>
            </tr>
        </table>
    </div>

    <div class="container-md">
        <div class="row justify-content-between">
            <div class="col-4">
                <table>
                    <tbody>
                        <tr>
                            <td style="text-align: center;">Pihak Pertama,</td>
                        </tr>
                        <tr style="height: 150px;">
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">
                                ___________________
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-4">
                <table>
                    <tbody>
                        <tr>
                            <td style="text-align: center;">Pihak Kedua,</td>
                        </tr>
                        <tr style="height: 150px;">
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">
                                ____<u><?php echo $master['nama']; ?></u>____
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="row justify-content-center" style="margin-top: 100px;">
        <div class="col-4">
            <table>
                <tbody>
                    <tr>
                        <td style="text-align: center;">Kepala Urusan Pengelolaan Fasilitas Produksi & Komersialisasi <br>Konten CeLOE</td>
                    </tr>
                    <tr style="height: 150px;">
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td style="text-align: center;">
                            ____________________________
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</div>

<script>
    window.print();
</script>