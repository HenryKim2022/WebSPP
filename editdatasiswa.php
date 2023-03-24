<?php
include 'header.php';
include 'koneksi.php';

$namaTabel = "DAFTAR_SISWA";

if (isset($_GET['id_siswa'])) {

    $id_siswa = $_GET['id_siswa'];
    $exec = mysqli_query($conn, "DELETE FROM siswa WHERE id_siswa='$id_siswa'");
    if ($exec) {
        echo "<script>alert('Data siswa berhasil dihapus');</script>";

        mysqli_query($conn, "DELETE FROM pembayaran WHERE id_siswa='$id_siswa' AND ket='LUNAS' ");
        echo "<script>document.location = 'editdatasiswa.php';</script>";
    } else {
        echo "<script>alert('Data siswa gagal dihapus')
       document.location = 'editdatasiswa.php';
       </script>";
    }
}

?>

<!-- button triger -->
<button class="btn btn-primary mb-3" data-toggle="modal" data-target="#ModalAddDataSiswa">Tambah Data</button>
<!-- button triger -->
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Siswa</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTableSiswa" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th class="align-middle">Nis</th>
                        <th class="align-middle">Nama Siswa</th>
                        <th class="align-middle">Angkatan</th>
                        <th class="align-middle">Kelas</th>
                        <th class="align-middle">Tahun Ajaran</th>
                        <th class="align-middle">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT siswa.*,angkatan.*,tahun.*,kelas.* FROM siswa,angkatan,tahun,kelas WHERE siswa.id_angkatan = angkatan.id_angkatan AND siswa.id_tahun = tahun.id_tahun AND  siswa.id_kelas = kelas.id_kelas ORDER BY nis ASC";
                    $exec = mysqli_query($conn, $query);
                    while ($res = mysqli_fetch_assoc($exec)) :

                    ?>

                        <tr>
                            <td class="align-middle"><?= $res['nis'] ?></td>
                            <td class="align-middle"><?= $res['nama'] ?></td>
                            <td class="align-middle"><?= $res['nama_angkatan'] ?></td>
                            <td class="align-middle"><?= $res['nama_kelas'] ?></td>
                            <td class="align-middle"><?= $res['tahun_ajaran'] ?></td>
                            <td class="align-middle">
                                <div class="d-flex align-content-sm-between justify-content-center align-middle">
                                    <a href="editdatasiswa.php?id_siswa=<?= $res['id_siswa'] ?>" class="btn btn-sm btn-danger mr-2" onclick="return confirm('Apakah Yakin Ingin Menghapus Data?')"><i class="fad fa-trash"></i></a>
                                    <a href="#" class="view_data btn btn-sm btn-warning mr-2" data-toggle="modal" data-target="#ModalEditDataSiswa" id="<?php echo $res['id_siswa']; ?>"><i class="fad fa-edit"></i></a>
                                    <a href="" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#detailModal<?php echo $res['id_siswa']; ?>" id=""><i class="fad fa-info-square"></i></a>

                                </div>
                                <!-- Modal detail data siswa-->
                                <div class="modal fade" id="detailModal<?php echo $res['id_siswa']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Detail Data Siswa</h5>
                                                <i class="btn-danger fad fa-window-close" data-dismiss="modal" aria-label="Close"></i>
                                            </div>
                                            <div class="modal-body" id="detailsiswa">
                                                <?php
                                                // #$query = "SELECT siswa.*,angkatan.*,tahun.*,kelas.* FROM siswa,angkatan,tahun,kelas WHERE siswa.id_angkatan = angkatan.id_angkatan AND siswa.id_tahun = tahun.id_tahun AND  siswa.id_kelas = kelas.id_kelas ORDER BY id_siswa";
                                                // #$exec = mysqli_query($conn,$query);
                                                // #$res = mysqli_fetch_assoc($exec);
                                                ?>
                                                <table class="table table-borderless">
                                                    <tbody>
                                                        <tr>
                                                            <th>NISN</th>
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
</div>

<!-- Modal -->
<div class="modal fade" id="ModalAddDataSiswa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Data Siswa</h5>
                <i class="btn-danger fad fa-window-close" data-dismiss="modal" aria-label="Close"></i></button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    <input type="text" name="nisn_siswa" placeholder="NISN" class="form-control mb-2">
                    <input type="text" name="nama_siswa" placeholder="Nama Peserta Didik" class="form-control mb-2">
                    <input type="text" name="tempat_lahir" placeholder="Tempat Lahir" class="form-control mb-2">
                    <input type="date" name="tanggal_lahir" placeholder="Tanggal Lahir" class="form-control mb-2">
                    <select class="form-control mb-2" name="gender">
                        <option selected="">Jenis Kelamin</option>
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                    <input type="text" name="agama" placeholder="Agama" class="form-control mb-2">
                    <input type="text" name="pendidikan_sebelum" placeholder="Pendidikan Sebelumnya" class="form-control mb-2">
                    <input type="text" name="nama_ayah" placeholder="Nama Ayah" class="form-control mb-2">
                    <input type="text" name="nama_ibu" placeholder="Nama Ibu" class="form-control mb-2">
                    <input type="text" name="nama_wali" placeholder="Nama Wali (optional)" class="form-control mb-2">
                    <input type="text" name="pekerjaan_ayah" placeholder="Pekerjaan Ayah" class="form-control mb-2">
                    <input type="text" name="pekerjaan_ibu" placeholder="Pekerjaan Ibu" class="form-control mb-2">
                    <input type="text" name="pekerjaan_wali" placeholder="Pekerjaan Wali (optional)" class="form-control mb-2">
                    <select class="form-control mb-2" name="id_angkatan">
                        <option selected="">Angkatan</option>
                        <?php
                        $exec = mysqli_query($conn, "SELECT * FROM angkatan order by id_angkatan");
                        while ($angkatan = mysqli_fetch_assoc($exec)) :
                            echo "<option value=" . $angkatan['id_angkatan'] . ">" . $angkatan['nama_angkatan'] . "</option>";
                        endwhile;
                        ?>
                    </select>
                    <select class="form-control mb-2" name="id_kelas">
                        <option selected="">Kelas</option>
                        <?php
                        $exec = mysqli_query($conn, "SELECT * FROM kelas order by id_kelas");
                        while ($angkatan = mysqli_fetch_assoc($exec)) :
                            echo "<option value=" . $angkatan['id_kelas'] . ">" . $angkatan['nama_kelas'] . "</option>";
                        endwhile;
                        ?>
                    </select>
                    <select class="form-control" name="id_tahun">
                        <option selected="">Tahun Ajaran</option>
                        <?php
                        $exec = mysqli_query($conn, "SELECT * FROM tahun order by id_tahun");
                        while ($angkatan = mysqli_fetch_assoc($exec)) :
                            echo "<option value=" . $angkatan['id_tahun'] . ">" . $angkatan['tahun_ajaran'] . "</option>";
                        endwhile;
                        ?>
                    </select>
                    <textarea class="form-control mt-2" name="alamat" placeholder="Alamat Peserta Didik"></textarea>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                <?php {
                    $query = "SELECT * from angkatan";
                    $exec = mysqli_query($conn, $query);
                    if (mysqli_num_rows($exec) == 0) {
                        $msg_failed = "<h6>Silahkan input data angkatan terlebih dahulu <i class='fad fa-smile-beam'></i></h6>"  ?>
                        <button name="simpan" class="btn btn-primary">Simpan</button>
                        <!-- $calonArr = "";
                        array_push($arrPesan, $calonArr); -->
                    <?php } else { ?>

                        <button type="Submit" name="simpan" class="btn btn-primary">Simpan</button>
                <?php }
                } ?>


                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal edit data siswa -->
<div class="modal fade" id="ModalEditDataSiswa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data Siswa</h5>
                <i class="btn-danger fad fa-window-close" data-dismiss="modal" aria-label="Close"></i></button>
            </div>
            <div class="modal-body" id="datasiswa">


            </div>

        </div>
    </div>
</div>



<?php

if (isset($_POST['simpan'])) {
    $nama_siswa = htmlentities(strip_tags(ucwords($_POST['nama_siswa'])));
    $nama_ayah = htmlentities(strip_tags(ucwords($_POST['nama_ayah'])));
    $nama_ibu = htmlentities(strip_tags(ucwords($_POST['nama_ibu'])));
    $nama_wali = htmlentities(strip_tags(ucwords($_POST['nama_wali'])));
    $pekerjaan_ayah = htmlentities(strip_tags(ucwords($_POST['pekerjaan_ayah'])));
    $pekerjaan_ibu = htmlentities(strip_tags(ucwords($_POST['pekerjaan_ibu'])));
    $pekerjaan_wali = htmlentities(strip_tags(ucwords($_POST['pekerjaan_wali'])));
    $tempat_lahir = htmlentities(strip_tags(ucwords($_POST['tempat_lahir'])));
    $tanggal_lahir = htmlentities(strip_tags(ucwords($_POST['tanggal_lahir'])));
    $agama = htmlentities(strip_tags(ucwords($_POST['agama'])));
    $pendidikan_sebelum = htmlentities(strip_tags(ucwords($_POST['pendidikan_sebelum'])));
    $gender = htmlentities(strip_tags(ucwords($_POST['gender'])));
    $id_kelas = htmlentities(strip_tags($_POST['id_kelas']));
    $id_tahun = htmlentities(strip_tags($_POST['id_tahun']));
    $id_angkatan = htmlentities(strip_tags($_POST['id_angkatan']));
    $alamat = htmlentities(strip_tags(ucwords($_POST['alamat'])));
    $nis = htmlentities(strip_tags(ucwords($_POST['nisn_siswa'])));

    $query = "INSERT INTO siswa (nis,nama,id_angkatan,id_tahun,id_kelas,alamat,tempat_lahir,tanggal_lahir,gender,agama,pendidikan_sebelum,nama_ayah,nama_ibu,nama_wali,pekerjaan_ayah,pekerjaan_ibu,pekerjaan_wali) values('$nis','$nama_siswa','$id_angkatan','$id_tahun','$id_kelas','$alamat','$tempat_lahir','$tanggal_lahir','$gender','$agama','$pendidikan_sebelum','$nama_ayah','$nama_ibu','$nama_wali','$pekerjaan_ayah','$pekerjaan_ibu','$pekerjaan_wali')";
    $exec = mysqli_query($conn, $query);
    if ($exec) {

        $bulanIndo = [
            '01' => 'Januari',
            '02' => 'Februari',
            '03' => 'Maret',
            '04' => 'April',
            '05' => 'Mei',
            '06' => 'Juni',
            '07' => 'Juli',
            '08' => 'Agustus',
            '09' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember'
        ];

        $query = "SELECT siswa.*,angkatan.* FROM siswa,angkatan WHERE siswa.id_angkatan = angkatan.id_angkatan ORDER BY siswa.id_siswa DESC LIMIT 1";
        $exec = mysqli_query($conn, $query);
        $res = mysqli_fetch_assoc($exec);
        $biaya = $res['biaya'];
        $id_siswa  = $res['id_siswa'];
        $awaltempo = date('Y-m-d');
        for ($i = 0; $i < 36; $i++) {
            // tanggal jatuh tempo
            $jatuhtempo = date("Y-m-d", strtotime("+$i month", strtotime($awaltempo)));

            $bulan  = $bulanIndo[date('m', strtotime($jatuhtempo))] . "  " . date('Y', strtotime($jatuhtempo));
            // simpan data
            $add = mysqli_query($conn, "INSERT INTO pembayaran(id_siswa , jatuhtempo, bulan, jumlah) VALUES ('$id_siswa','$jatuhtempo','$bulan','$biaya')");
        }

        echo "<script>alert('Data siswa berhasil disimpan')
       document.location = 'editdatasiswa.php';
       </script>";
    } else {
        echo "<script>alert('Data siswa Gagal disimpan')
       document.location = 'editdatasiswa.php';
       </script>";
    }
}



?>


<?php include 'footer.php'; ?>

<script type="text/javascript">
    $('.view_data').click(function() {
        var id_siswa = $(this).attr('id');
        $.ajax({
            url: 'view.php',
            method: 'post',
            data: {
                id_siswa: id_siswa
            },
            success: function(data) {
                $('#datasiswa').html(data)
                $('#ModalEditDataSiswa').modal('show');
            }
        })

    })
</script>


<?php
if (isset($_POST['edit'])) {
    $id_siswa = $_POST['id_siswa'];
    $nis = $_POST['nis'];
    $nama_siswa = htmlentities(strip_tags(ucwords($_POST['nama'])));
    $tempat_lahir = htmlentities(strip_tags(ucwords($_POST['tempat_lahir'])));
    $tanggal_lahir = htmlentities(strip_tags($_POST['tanggal_lahir']));
    $gender = htmlentities(strip_tags(ucwords($_POST['gender'])));
    $agama = htmlentities(strip_tags(ucwords($_POST['agama'])));
    $pendidikan_sebelum = htmlentities(strip_tags(ucwords($_POST['pendidikan_sebelum'])));
    $nama_ayah = htmlentities(strip_tags(ucwords($_POST['nama_ayah'])));
    $nama_ibu = htmlentities(strip_tags(ucwords($_POST['nama_ibu'])));
    $nama_wali = htmlentities(strip_tags(ucwords($_POST['nama_wali'])));
    $pekerjaan_ayah = htmlentities(strip_tags(ucwords($_POST['pekerjaan_ayah'])));
    $pekerjaan_ibu = htmlentities(strip_tags(ucwords($_POST['pekerjaan_ibu'])));
    $pekerjaan_wali = htmlentities(strip_tags(ucwords($_POST['pekerjaan_wali'])));
    $id_angkatan = htmlentities(strip_tags($_POST['id_angkatan']));
    $id_tahun = htmlentities(strip_tags($_POST['id_tahun']));
    $id_kelas = htmlentities(strip_tags($_POST['id_kelas']));
    $alamat = htmlentities(strip_tags(ucwords($_POST['alamat'])));
    $query = "UPDATE siswa SET 
                id_siswa = '$id_siswa',
                nis = '$nis', 
                nama = '$nama_siswa',
                nama_ayah = '$nama_ayah',
                nama_ibu = '$nama_ibu',
                nama_wali = '$nama_wali',
                pekerjaan_ayah = '$pekerjaan_ayah',
                pekerjaan_ibu = '$pekerjaan_ibu',
                tempat_lahir = '$tempat_lahir',
                tanggal_lahir = '$tanggal_lahir',
                pekerjaan_ayah = '$pekerjaan_ayah',
                agama = '$agama',
                pendidikan_sebelum = '$pendidikan_sebelum',
                gender = '$gender',
                id_tahun = '$id_tahun',
                id_angkatan = '$id_angkatan',
                id_kelas = '$id_kelas',
                alamat = '$alamat',
                pekerjaan_wali = '$pekerjaan_wali' WHERE nis = '$nis'";
    $exec = mysqli_query($conn, $query);
    if ($exec) {
        echo "<script>alert('data siswa berhasil diedit')
        document.location = 'editdatasiswa.php' </script>;
        ";
    } else {
        echo "<script>alert('data siswa gagal diedit')
        document.location = 'editdatasiswa.php' </script>;
        ";
    }
}



?>