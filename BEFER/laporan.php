<?php
include 'function/function_rupiah.php';
include 'header.php';
include 'koneksi.php';

?>


<div class="card shadow mb-4">

    <div class="card-body">
        <div class="mb-2">
            <a href="laporan.php"><button class="btn btn-primary"><i class="fad fa-sync-alt"></i></button></a>
        </div>
        <hr>
        <!-- <form action="cetak_laporan.php" method="get" target="_blank"> -->
        <!-- <form id="formX" method="get" target="my_iframe"> -->
        <!-- <form id="formX" action="cetak_laporan.php" method="get" target="my_iframe"> -->
        <form id="formX" action="laporan.php" method="get">
            <div class="input-group mb-3">
                <input name="awal" type="date" class="form-control col-sm-6">
                <input name="akhir" type="date" class="form-control col-sm-6 mr-2">
                <button id="lihat" type="submit" class="btn btn-primary">Lihat</button>
            </div>

        </form>
    </div>
</div>


<?php if ((isset($_GET['awal']) && $_GET['awal'] != '') && ((isset($_GET['akhir']) && $_GET['akhir'] != ''))) {
    $awal = $_GET['awal'];
    $akhir = $_GET['akhir'];
    $spp = mysqli_query($conn, "SELECT siswa.*,pembayaran.*,kelas.* FROM siswa,pembayaran,kelas WHERE pembayaran.id_siswa = siswa.id_siswa AND tglbayar BETWEEN '$awal' AND '$akhir' order by nama ASC");



    $i = 1;
    $total = 0;
?>
    <div class="card shadow mb-4" style="display:block">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Preview</h6>
        </div>
        <div class="card-body">
            <div class="d-flex align-items-center justify-content-center">
                <h3 class="text-center">LAPORAN PEMBAYARAN SPP<br>
                    <b>MADRASAH IBTIDAIYAH AL-MUKHLISIN</b>
                </h3>


            </div>
            <hr>
            <h6 class="text-center">

                <?php
                // DATE CONV INDO
                function tanggal_indo($tanggal, $cetak_hari = false)
                {
                    $hari = array(
                        1 =>    'Senin',
                        'Selasa',
                        'Rabu',
                        'Kamis',
                        'Jumat',
                        'Sabtu',
                        'Minggu'
                    );

                    $bulan = array(
                        1 =>   'Januari',
                        'Februari',
                        'Maret',
                        'April',
                        'Mei',
                        'Juni',
                        'Juli',
                        'Agustus',
                        'September',
                        'Oktober',
                        'November',
                        'Desember'
                    );
                    $split       = explode('-', $tanggal);
                    $tgl_indo = $split[2] . ' ' . $bulan[(int)$split[1]] . ' ' . $split[0];

                    if ($cetak_hari) {
                        $num = date('N', strtotime($tanggal));
                        return $hari[$num] . ', ' . $tgl_indo;
                    }
                    return $tgl_indo;
                }

                // OUTPUT AWAL
                $tanggalAwal = date('Y-m-d', strtotime($_GET['awal']));
                $tanggalAwal = tanggal_indo($tanggalAwal, false);

                // OUTPUT AKHIR
                $tanggalAkhir = date('Y-m-d', strtotime($_GET['akhir']));
                $tanggalAkhir = tanggal_indo($tanggalAkhir, false);
                ?>

                <!-- <b>?= "Tanggal " . ($awal) . " sampai " . ($akhir) ?></b> -->
                <b><?= "Tgl " . ($tanggalAwal) . " s.d Tgl " . ($tanggalAkhir) ?></b>
            </h6>
            <br>
            <br>

            <div class="table-responsive">
                <table id="reportTable" class="table table-bordered table-striped table-sm text-sm w-100" cellspacing="0">
                    <!-- <table id="reportTable" border="1" cellspacing="" cellpadding="4" width="100%"> -->

                    <thead>
                        <tr>
                            <th scope='row' class='align-middle text-center'>NO</th>
                            <th class="align-middle text-sm">NIS</th>
                            <th class="align-middle text-sm">NAMA SISWA</th>
                            <th class="align-middle text-sm">KELAS</th>
                            <th class="align-middle text-sm">NO.BAYAR</th>
                            <th class="align-middle text-sm">PEMBAYARAN BULAN</th>
                            <th class="align-middle text-sm">JUMLAH</th>
                            <th class="align-middle text-sm">KETERANGAN</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($dta = mysqli_fetch_assoc($spp)) : ?>
                            <tr>
                                <td scope='row' class='align-middle text-center'><?= $i++ ?></td>
                                <td class='align-middle'><?= $dta['nisn'] ?></td>
                                <td class='align-middle'><?= $dta['nama'] ?></td>
                                <td class='align-middle'><?= $dta['nama_kelas'] ?></td>
                                <td class='align-middle'><?= $dta['nobayar'] ?></td>
                                <td class='align-middle'><?= $dta['bulan'] ?></td>
                                <td class='align-middle'><?= format_rupiah($dta['jumlah']) ?></td>
                                <td class='align-middle'><?= $dta['ket'] ?></td>
                            </tr>

                            <?php $total += $dta['jumlah']; ?>
                        <?php endwhile; ?>

                    </tbody>


                    <tfoot>
                        <tr>
                            <!-- <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td> -->
                            <td colspan="7" align="right"><b>TOTAL</b></td>
                            <!-- <td align="right"><b>TOTAL</b></td> -->
                            <td align="center">
                                <b>
                                    <?= format_rupiah($total); ?>
                                </b>
                            </td>
                        </tr>

                        <!-- <tr>
                            <td class="text-right table-borderless" colspan="8">
                                <br><br><br>
                                <p>Tangerang, ?= date('d/m/y') ?>
                                    <br>Admin,<br><br>
                                <p>__________________________</p>
                            </td>
                        </tr> -->

                    </tfoot>



                </table>
            </div>

        </div>
    </div>




    <div class="card shadow mb-4 h-100" style="display: none;">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Cetak Data Laporan</h6>
        </div>
        <div class="card-body">

            <!-- when the form is submitted, the server response will appear in this iframe -->
            <!-- <iframe name="my_iframe" class="w-100" src="cetak_laporan.php"></iframe> -->
            <iframe name="myiframe" class="w-100" src="<?php $Base_Url ?>/cetak_laporan.php"></iframe>
            <!-- <div class="page-content view-snippets-page d-flex flex pl-0 pr-0">
                <div class="container-fluid">
                    <div class="flex bg-light ">
                        <div class="d-flex flex flex-column">

                            <div class="flex">
                                <div class="p-3 pt-0 pb-0">
                                    <div class="row">
                                        <div class="col-xl-12 col-lg-12 col-md-12 preview-content" id="preview">
                                            <iframe name="iframe_a" id="snippet-preview" class="preview-iframe" src="https://www.bootdey.com/snippets/preview/bs4-invoice"></iframe>
                                        </div>


                                        <p><a href="https://ide.geeksforgeeks.org/" target="iframe_a">
                                                Click Here
                                            </a>
                                        </p>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
    </div>




<?php } ?>


</div>
<?php include 'footer.php'; ?>