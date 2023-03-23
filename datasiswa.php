<?php

include 'header.php';
include 'koneksi.php';
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
                        <th>Nis</th>
                        <th>Nama Siswa</th>
                        <th>Angkatan</th>
                        <th>Kelas</th>
                        <th>Tahun ajaran</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT siswa.*,angkatan.*,tahun.*,kelas.* FROM siswa,angkatan,tahun,kelas WHERE siswa.id_angkatan = angkatan.id_angkatan AND siswa.id_tahun = tahun.id_tahun AND siswa.id_kelas = kelas.id_kelas ORDER BY id_siswa";
                    $exec = mysqli_query($conn, $query);
                    while ($res = mysqli_fetch_assoc($exec)) :

                    ?>

                        <tr>
                            <td><?= $res['nis'] ?></td>
                            <td><?= $res['nama'] ?></td>
                            <td><?= $res['nama_angkatan'] ?></td>
                            <td><?= $res['nama_kelas'] ?></td>
                            <td><?= $res['tahun_ajaran'] ?></td>
                            <td><?= $res['alamat'] ?></td>
                            <td>
                                <a href="" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#detailModal<?php echo $res['id_siswa']; ?>" id="">Detail</a>
                                <!-- Modal detail data siswa-->
                                <div class="modal fade" id="detailModal<?php echo $res['id_siswa']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Detail Data Siswa</h5>
                                                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">x</button>
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
<?php include 'footer.php'; ?>