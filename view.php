<?php include 'koneksi.php';

if (isset($_POST['id_siswa'])) {
  $id_siswa = $_POST['id_siswa'];
  $query = "SELECT siswa.*,angkatan.*,tahun.*,kelas.* FROM siswa,angkatan,tahun,kelas WHERE siswa.id_angkatan = angkatan.id_angkatan AND siswa.id_tahun = tahun.id_tahun AND  siswa.id_kelas = kelas.id_kelas and siswa.id_siswa = $id_siswa";
  $exec = mysqli_query($conn, $query);
  $res = mysqli_fetch_assoc($exec);
?>

  <form action="editdatasiswa.php" method="POST">
    <input type="hidden" name="id_siswa" value="<?= $res['id_siswa'] ?>">
    <input type="hidden" name="nis" value="<?= $res['nis'] ?>">
    <input type="text" class="form-control mb-2" name="" disabled="" value="<?= $res['nis'] ?>">
    <input type="text" class="form-control mb-2" name="nama" value="<?= $res['nama'] ?>">
    <input type="text" name="tempat_lahir" placeholder="Tempat Lahir" class="form-control mb-2" value="<?= $res['tempat_lahir'] ?>">
    <input type="date" name="tanggal_lahir" placeholder="Tanggal Lahir" class="form-control mb-2" value="<?= $res['tanggal_lahir'] ?>">
    <select class="form-control mb-2" name="gender">
      <option selected="">Jenis Kelamin</option>
      <option value="L" <?php if ($res['gender'] == 'L') { ?> selected="selected" <?php } ?>>Laki-laki</option>
      <option value="P" <?php if ($res['gender'] == 'P') { ?> selected="selected" <?php } ?>>Perempuan</option>
    </select>
    <input type="text" name="agama" placeholder="Agama" class="form-control mb-2" value="<?= $res['agama'] ?>">
    <input type="text" name="pendidikan_sebelum" placeholder="Pendidikan Sebelumnya" class="form-control mb-2" value="<?= $res['pendidikan_sebelum'] ?>">
    <input type="text" name="nama_ayah" placeholder="Nama Ayah" class="form-control mb-2" value="<?= $res['nama_ayah'] ?>">
    <input type="text" name="nama_ibu" placeholder="Nama Ibu" class="form-control mb-2" value="<?= $res['nama_ibu'] ?>">
    <input type="text" name="nama_wali" placeholder="Nama Wali (optional)" class="form-control mb-2" value="<?= $res['nama_wali'] ?>">
    <input type="text" name="pekerjaan_ayah" placeholder="Pekerjaan Ayah" class="form-control mb-2" value="<?= $res['pekerjaan_ayah'] ?>">
    <input type="text" name="pekerjaan_ibu" placeholder="Pekerjaan Ibu" class="form-control mb-2" value="<?= $res['pekerjaan_ibu'] ?>">
    <input type="text" name="pekerjaan_wali" placeholder="Pekerjaan Wali (optional)" class="form-control mb-2" value="<?= $res['pekerjaan_wali'] ?>">
    <select class="form-control mb-2" name="id_angkatan">
      <option selected="">Pilih Angkatan</option>
      <?php
      $selected = "";
      $exec = mysqli_query($conn, "SELECT * FROM angkatan order by id_angkatan");
      while ($angkatan = mysqli_fetch_assoc($exec)) :
        if ($res['id_angkatan'] == $angkatan['id_angkatan']) {
          $selected = 'selected';
        } else {
          $selected = "";
        }
        echo "<option $selected value=" . $angkatan['id_angkatan'] . ">" . $angkatan['nama_angkatan'] . "</option>";
      endwhile;
      ?>
    </select>
    <select class="form-control mb-2" name="id_kelas">
      <option selected="">Pilih Kelas</option>
      <?php
      $exec = mysqli_query($conn, "SELECT * FROM kelas order by id_kelas");
      while ($angkatan = mysqli_fetch_assoc($exec)) :
        if ($res['id_kelas'] == $angkatan['id_kelas']) {
          $selected = 'selected';
        } else {
          $selected = "";
        }
        echo "<option $selected value=" . $angkatan['id_kelas'] . ">" . $angkatan['nama_kelas'] . "</option>";
      endwhile;
      ?>
    </select>
    <select class="form-control" name="id_tahun">
      <option selected="">Pilih Tahun</option>
      <?php
      $exec = mysqli_query($conn, "SELECT * FROM tahun order by tahun_ajaran");
      while ($angkatan = mysqli_fetch_assoc($exec)) :
        if ($res['id_tahun'] == $angkatan['id_tahun']) {
          $selected = 'selected';
        } else {
          $selected = "";
        }
        echo "<option $selected value=" . $angkatan['id_tahun'] . ">" . $angkatan['tahun_ajaran'] . "</option>";
      endwhile;
      ?>
    </select>
    <textarea class="form-control mt-2" name="alamat" placeholder="Alamat Siswa"><?= $res['alamat'] ?></textarea>

    <div class="modal-footer">
      <button id="closemodal" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      <button type="Submit" name="edit" class="btn btn-primary">Simpan</button>
  </form>
  <script type="text/javascript">
    $('#closemodal').click(function() {
      $('#ModalEditDataSiswa').modal('hide');
    });
  </script>

<?php } ?>
<?php

if (isset($_POST['id_kelas'])) {
  $id_kelas = $_POST['id_kelas'];
  $exec = mysqli_query($conn, "SELECT * FROM kelas WHERE id_kelas= '$id_kelas'");
  $res = mysqli_fetch_assoc($exec);
?>
  <form action="editdatakelas.php" method="POST">
    <input type="hidden" name="id_kelas" value="<?= $res['id_kelas'] ?>">
    <input type="text" name="nama_kelas" class="form-control" value="<?= $res['nama_kelas'] ?>">
    <div class="modal-footer">
      <button id="closemodal" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      <button type="Submit" name="edit" class="btn btn-primary">Simpan</button>
  </form>
  <script type="text/javascript">
    $('#closemodal').click(function() {
      $('#ModalEditDataKelas').modal('hide');
    });
  </script>

<?php }
if (isset($_POST['id_tahun'])) {
  $id_tahun = $_POST['id_tahun'];
  $exec = mysqli_query($conn, "SELECT * FROM tahun WHERE id_tahun= '$id_tahun'");
  $res = mysqli_fetch_assoc($exec);
?>
  <form action="editdatatahun.php" method="POST">
    <input type="hidden" name="id_tahun" value="<?= $res['id_tahun'] ?>">
    <input type="text" name="tahun_ajaran" class="form-control" value="<?= $res['tahun_ajaran'] ?>">
    <div class="modal-footer">
      <button id="closemodal" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      <button type="Submit" name="edit" class="btn btn-primary">Simpan</button>
  </form>
  <script type="text/javascript">
    $('#closemodal').click(function() {
      $('#ModalEditTahunAjaran').modal('hide');
    });
  </script>


<?php }
if (isset($_POST['id_angkatan'])) {
  $id_angkatan = $_POST['id_angkatan'];
  $exec = mysqli_query($conn, "SELECT * FROM angkatan WHERE id_angkatan= '$id_angkatan'");
  $res = mysqli_fetch_assoc($exec);
?>
  <form action="editdataangkatan.php" method="POST">
    <input type="hidden" name="id_angkatan" value="<?= $res['id_angkatan'] ?>">
    <input type="text" name="nama_angkatan" class="form-control mb-2" value="<?= $res['nama_angkatan'] ?>">
    <input type="text" name="biaya" class="form-control" value="<?= $res['biaya'] ?>">
    <div class="modal-footer">
      <button id="closemodal" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      <button type="Submit" name="edit" class="btn btn-primary">Simpan</button>
  </form>
  <script type="text/javascript">
    $('#closemodal').click(function() {
      $('#ModalEditDataAngkatan').modal('hide');
    });
  </script>

<?php }




include 'function/function_rupiah.php';
$awal = "";
$akhir = "";
$spp = "";

if (!empty($_POST['tgl_awal']) || !empty($_POST['tgl_akhir'])) {
  if (!empty($_POST['tgl_awal']) && empty($_POST['tgl_akhir'])) {
    $awal = $_POST['tgl_awal'];
    $akhir = $_POST['tgl_awal'];

    $spp = mysqli_query($conn, "SELECT siswa.*,pembayaran.*,kelas.* FROM siswa,pembayaran,kelas WHERE pembayaran.id_siswa = siswa.id_siswa AND tglbayar IN('$awal', '$akhir') order by nama ASC");
  } else if (empty($_POST['tgl_awal']) && !empty($_POST['tgl_akhir'])) {
    $awal = $_POST['tgl_akhir'];
    $akhir = $_POST['tgl_akhir'];

    $spp = mysqli_query($conn, "SELECT siswa.*,pembayaran.*,kelas.* FROM siswa,pembayaran,kelas WHERE pembayaran.id_siswa = siswa.id_siswa AND tglbayar IN('$awal', '$akhir') order by nama ASC");
  } else if (!empty($_POST['tgl_awal']  && !empty($_POST['tgl_akhir']))) {
    $awal = $_POST['tgl_awal'];
    $akhir = $_POST['tgl_akhir'];

    if ($awal == $akhir) {
      $spp = mysqli_query($conn, "SELECT siswa.*,pembayaran.*,kelas.* FROM siswa,pembayaran,kelas WHERE pembayaran.id_siswa = siswa.id_siswa AND tglbayar IN('$awal', '$akhir') order by nama ASC");
    } else {
      $spp = mysqli_query($conn, "SELECT siswa.*,pembayaran.*,kelas.* FROM siswa,pembayaran,kelas WHERE pembayaran.id_siswa = siswa.id_siswa AND tglbayar BETWEEN '$awal' AND '$akhir' order by nama ASC");
    }
    // $spp = mysqli_query($conn, "SELECT siswa.*,pembayaran.*,kelas.* FROM siswa,pembayaran,kelas WHERE pembayaran.id_siswa = siswa.id_siswa AND tglbayar BETWEEN '$awal' AND '$akhir' order by nama ASC");
    // $spp = mysqli_query($conn, "SELECT siswa.*,pembayaran.*,kelas.* FROM siswa,pembayaran,kelas WHERE pembayaran.id_siswa = siswa.id_siswa AND tglbayar IN('$awal', '$akhir') order by nama ASC");
    // $spp = mysqli_query($conn, "SELECT siswa.*,pembayaran.*,kelas.* FROM siswa,pembayaran,kelas WHERE pembayaran.id_siswa = siswa.id_siswa AND tglbayar >= $awal AND tglbayar <= $akhir order by nama ASC");
  }


  $i = 1;
  $total = 0;
?>
  <div class="card shadow mb-4" style="display:block">
    <div class="card-body">
      <div class="row w-100 mb-2">
        <div class="col-sm-12 col-sm-push-1">
          <form id="formX" action="cetak_laporan.php" method="get" target="_blank">
            <div class="input-group mb-3">
              <input name="awal" type="hidden" class="form-control col-sm-6" value="<?= $awal ?>">
              <input name="akhir" type="hidden" class="form-control col-sm-6 mr-2" value="<?= $akhir ?>">
              <button id="cetak" type="submit" class="btn btn-primary">Cetak</button>
            </div>

          </form>
        </div>
      </div>

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
        $tanggalAwal = date('Y-m-d', strtotime($_POST['tgl_awal']));
        $tanggalAwal = tanggal_indo($tanggalAwal, false);

        // OUTPUT AKHIR
        $tanggalAkhir = date('Y-m-d', strtotime($_POST['tgl_akhir']));
        $tanggalAkhir = tanggal_indo($tanggalAkhir, false);
        ?>

        <!-- <b>?= "Tanggal " . ($awal) . " sampai " . ($akhir) ?></b> -->
        <?= "Tgl " . ($tanggalAwal) . " s.d Tgl " . ($tanggalAkhir) ?>
        <!-- <b>?= "Tgl " . ($tanggalAwal) . " s.d Tgl " . ($tanggalAkhir) ?></b> -->
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
                <td class='align-middle'><?= $dta['nis'] ?></td>
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



<?php }
// else {
//   echo "<script>alert('Tanggal Awal & Tanggal Akhir harus di isi!')
//         document.location = 'laporan.php';
//         </script>";
// } 
?>