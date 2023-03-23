<?php


$namaTabel = "PEMBAYARAN";

include 'function/function_rupiah.php';
include 'koneksi.php';
include 'header.php';
?>



<div class="card shadow mb-4">
    <div class="card-body">

        <table class="table mb-0">
            <thead>
                <div class="mb-3">
                    <a href="pembayaran.php"><button class="btn btn-primary"><i class="fad fa-sync-alt"></i></button></a>
                </div>
            </thead>
            <tbody>
                <tr class="justify-contents-center align-items-sm-center">
                    <form method="get">
                        <td class="align-middle">Nis</td>
                        <td class="align-middle">:</td>
                        <td class="w-100">
                            <input type="text" name="nis" placeholder="Masukan Nomor Induk Siswa" class="form-control"></input>
                        </td>
                        <td>
                            <button type="submit" class="btn btn-primary" name="">Lihat</button>
                        </td>
                    </form>

                    <!-- <td>
                        <a href="pembayaran.php"><button class="btn btn-primary"><i class="fad fa-sync-alt"></i></button></a>
                    </td> -->
                </tr>
            </tbody>

        </table>

    </div>
</div>


<?php if (isset($_GET['nis']) && $_GET['nis'] != '') {
    $nis = $_GET['nis'];
    $query = "SELECT siswa.*,angkatan.*,tahun.*,kelas.* FROM siswa,angkatan,tahun,kelas WHERE siswa.id_angkatan = angkatan.id_angkatan AND siswa.id_tahun = tahun.id_tahun AND  siswa.id_kelas = kelas.id_kelas AND siswa.nis ='$nis' ";
    $exec = mysqli_query($conn, $query);

    $siswa = mysqli_fetch_assoc($exec);

    // die();
    if (mysqli_num_rows($exec) !== 0) {
        // $siswa = mysqli_fetch_assoc($exec);
        // $id_siswa = $siswa['id_siswa'];
        // $nis = $siswa['nis'];
        $id_siswa = $siswa['id_siswa'];
        $nis = $siswa['nis'];

        $nama = $siswa['nama'];
        $namaTabel = "TAGIHAN_SISWA_" . "NIS_" . $nis . "_NAMA_" . $nama;
?>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Biodata Siswa</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTableSubDetails" width="100%" cellspacing="0">
                        <caption style="border: inherit; background-color: lightgrey;">
                            <span class="align-left align-items-center text-center" style="padding-left: 1%;"><strong>Laporan Tagihan Bulanan</strong></span>
                            <!-- <button type="button" id="printBtn" class="btn btn-default btn-sm" title="Print">
                                <span class="glyphicon glyphicon-print"></span>
                            </button> -->
                        </caption>


                        <tr>
                            <td class="align-middle">Nis</td>
                            <td class="align-middle"><?= $siswa['nis'] ?></td>
                        </tr>
                        <tr>
                            <td class="align-middle">Nama Siswa</td>
                            <td class="align-middle"><?= $siswa['nama'] ?></td>
                        </tr>
                        <tr>
                            <td class="align-middle">Kelas</td>
                            <td class="align-middle"><?= $siswa['nama_kelas'] ?></td>
                        </tr>
                        <tr>
                            <td class="align-middle">Angkatan</td>
                            <td class="align-middle"><?= $siswa['nama_angkatan'] ?></td>
                        </tr>


                    </table>
                </div>
            </div>
        </div>

        <!-- Begin Page Content -->



        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Pembayaran</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">

                    <table class="table table-bordered" id="dataSiswaTransaksiTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="align-middle">NO</th>
                                <th class="align-middle">Bulan</th>
                                <th class="align-middle">Jatuh Tempo</th>
                                <th class="align-middle">No Bayar</th>
                                <th class="align-middle">Tanggal Bayar</th>
                                <th class="align-middle">Jumlah</th>
                                <th class="align-middle">Keterangan</th>
                                <th class="align-middle">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $no = 1;
                            $query = "SELECT * from pembayaran WHERE id_siswa = '$id_siswa' order by jatuhtempo ASC";
                            $exec = mysqli_query($conn, $query);
                            while ($res = mysqli_fetch_assoc($exec)) { ?>
                                <tr>
                                    <td class="align-middle"><?= $no++ ?></td>
                                    <td class="align-middle"><?= $res['bulan'] ?></td>
                                    <td class="align-middle"><?= $res['jatuhtempo'] ?></td>
                                    <td class="align-middle"><?= $res['nobayar'] ?></td>
                                    <td class="align-middle"><?= $res['tglbayar'] ?></td>
                                    <td class="align-middle"><?= format_rupiah($res['jumlah']) ?></td>
                                    <td class="align-middle">
                                        <?php
                                        if ($res['ket']) { ?>
                                            <div class="bg-success rounded-lg text-sm-center text-white font-weight-light"><?= $res['ket'] ?></div>
                                        <?php } else { ?>
                                            <div class="bg-danger rounded-lg text-sm-center text-white font-weight-light">BELUM</div>
                                        <?php } ?>

                                    </td>
                                    <td class="align-middle">
                                        <?php
                                        if ($res['nobayar'] == '') {
                                            echo "<a href='proses_transaksi.php?nis=$nis&act=bayar&id=$res[idspp]'></a> ";
                                            echo "<div class='d-flex align-content-sm-between justify-content-center'>";
                                            echo "<a class='btn btn-success btn-sm' href='proses_transaksi.php?nis=$nis&act=bayar&id=$res[idspp]'><i class='far fa-money-check-edit-alt fa-xs'></i></a> ";
                                            echo "</div>";
                                        } else {
                                            echo "</a>";
                                            echo "<div class='d-flex align-content-sm-between justify-content-center'>";
                                            echo "<a class='btn btn-danger btn-sm mr-2' href='proses_transaksi.php?nis=$nis&act=batal&id=$res[idspp]'><i class='fad fa-window-close'></i></a> ";
                                            echo "<a class='btn btn-secondary btn-sm' href='cetak_slip_pembayaran.php?nis=$nis&act=cetak&id=$res[idspp]' target='_blank'><i class='fad fa-print'></i></a> ";
                                            echo "</div>";
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>

                    </table>

                </div>
            </div>
        <?php } else { ?>
            <div class="card shadow mb-4">
                <div class="card-body">
                    <h5>Data Tidak Tersedia</h5>
                </div>
            </div>
        <?php } ?>

    <?php } ?>


    <?php if (isset($_GET['nis']) == '') {
        $namaTabel = "DAFTAR_SISWA";
    ?>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Siswa</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="align-middle">Nis</th>
                                <th class="align-middle">Nama Siswa</th>
                                <th class="align-middle">Angkatan</th>
                                <th class="align-middle">Kelas</th>
                                <th class="align-middle">Tahun ajaran</th>
                                <th class="align-middle">Alamat</th>
                                <th class="align-middle">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT siswa.*,angkatan.*,tahun.*,kelas.* FROM siswa,angkatan,tahun,kelas WHERE siswa.id_angkatan = angkatan.id_angkatan AND siswa.id_tahun = tahun.id_tahun AND  siswa.id_kelas = kelas.id_kelas ORDER BY id_siswa";
                            $exec = mysqli_query($conn, $query);
                            while ($res = mysqli_fetch_assoc($exec)) :

                            ?>

                                <tr>
                                    <td class="align-middle"><?= $res['nis'] ?></td>
                                    <td class="align-middle"><?= $res['nama'] ?></td>
                                    <td class="align-middle"><?= $res['nama_angkatan'] ?></td>
                                    <td class="align-middle"><?= $res['nama_kelas'] ?></td>
                                    <td class="align-middle"><?= $res['tahun_ajaran'] ?></td>
                                    <td class="align-middle"><?= $res['alamat'] ?></td>
                                    <td class="align-middle d-flex align-content-sm-between justify-content-center">
                                        <a href="" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#detailModal<?php echo $res['id_siswa']; ?>" id=""><i class="fad fa-info-square"></i> Detail</a>
                                        <!-- Modal detail data siswa-->
                                        <div class="modal fade" id="detailModal<?php echo $res['id_siswa']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Detail Data Siswa</h5>
                                                        <i class="btn-danger fad fa-window-close" data-dismiss="modal" aria-label="Close"></i></button>
                                                    </div>
                                                    <div class="modal-body" id="detailsiswa">
                                                        <?php
                                                        #$query = "SELECT siswa.*,angkatan.*,tahun.*,kelas.* FROM siswa,angkatan,tahun,kelas WHERE siswa.id_angkatan = angkatan.id_angkatan AND siswa.id_tahun = tahun.id_tahun AND  siswa.id_kelas = kelas.id_kelas ORDER BY id_siswa";
                                                        #$exec = mysqli_query($conn,$query);
                                                        #$res = mysqli_fetch_assoc($exec);
                                                        ?>
                                                        <table class="table table-borderless">
                                                            <tbody>
                                                                <tr>
                                                                    <th>Nomor Induk Siswa</th>
                                                                    <td>:</td>
                                                                    <td><?= $res['nis'] ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Tahun Ajaran</th>
                                                                    <td>:</td>
                                                                    <td><?= $res['tahun_ajaran'] ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Nama Siswa</th>
                                                                    <td>:</td>
                                                                    <td><?= $res['nama'] ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Jenis Kelamin</th>
                                                                    <td>:</td>
                                                                    <td>
                                                                        <?php echo ($res['gender'] == "L") ? "Laki-laki" : "Perempuan"; ?>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Alamat Siswa</th>
                                                                    <td>:</td>
                                                                    <td><?= $res['alamat'] ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Tempat, Tanggal Lahir</th>
                                                                    <td>:</td>
                                                                    <td><?= $res['tempat_lahir'], ", ", $res['tanggal_lahir'] ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Kelas</th>
                                                                    <td>:</td>
                                                                    <td><?= $res['nama_kelas'] ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Nama Ayah</th>
                                                                    <td>:</td>
                                                                    <td><?= $res['nama_ayah'] ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Nama Ibu</th>
                                                                    <td>:</td>
                                                                    <td><?= $res['nama_ibu'] ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Nama Wali</th>
                                                                    <td>:</td>
                                                                    <td><?= $res['nama_wali'] ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Pekerjaan Ayah</th>
                                                                    <td>:</td>
                                                                    <td><?= $res['pekerjaan_ayah'] ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Pekerjaan Ibu</th>
                                                                    <td>:</td>
                                                                    <td><?= $res['pekerjaan_ibu'] ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Pekerjaan Wali</th>
                                                                    <td>:</td>
                                                                    <td><?= $res['pekerjaan_wali'] ?></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <?php } ?>

        </div>
        <?php include 'footer.php'; ?>