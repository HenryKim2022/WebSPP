<?php include 'koneksi.php'; 

if(isset($_POST['id_siswa'])) {
  $id_siswa = $_POST['id_siswa'];
   $query = "SELECT siswa.*,angkatan.*,tahun.*,kelas.* FROM siswa,angkatan,tahun,kelas WHERE siswa.id_angkatan = angkatan.id_angkatan AND siswa.id_tahun = tahun.id_tahun AND  siswa.id_kelas = kelas.id_kelas and siswa.id_siswa = $id_siswa";
     $exec = mysqli_query($conn,$query);
     $res = mysqli_fetch_assoc($exec);
     ?>

      <form action="editdatasiswa.php" method="POST">
        <input type="hidden" name="id_siswa" value="<?= $res['id_siswa'] ?>">
        <input type="hidden" name="nisn" value="<?= $res['nisn'] ?>">
        <input type="text" class="form-control mb-2" name="" disabled="" value="<?= $res['nisn'] ?>">
        <input type="text" class="form-control mb-2" name="nama" value="<?= $res['nama'] ?>">
        <input type="text" name="tempat_lahir" placeholder="Tempat Lahir" class="form-control mb-2" value="<?= $res['tempat_lahir'] ?>">
        <input type="text" name="tangal_lahir" placeholder="Tanggal Lahir" class="form-control mb-2" value="<?= $res['tanggal_lahir'] ?>">
        <select class="form-control mb-2" name="gender">
          <option selected="">Jenis Kelamin</option>
          <option value="L"<?php if($res['gender'] == 'L') { ?> selected="selected"<?php } ?>>Laki-laki</option>
          <option value="P"<?php if($res['gender'] == 'P') { ?> selected="selected"<?php } ?>>Perempuan</option>
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
                  $selected="";
                    $exec = mysqli_query($conn,"SELECT * FROM angkatan order by id_angkatan");
                    while ($angkatan = mysqli_fetch_assoc($exec)) :
                    if($res['id_angkatan'] == $angkatan['id_angkatan']) {
                      $selected = 'selected';
                    }else {
                      $selected="";
                    }
                    echo "<option $selected value=".$angkatan['id_angkatan'].">".$angkatan['nama_angkatan']."</option>";
                endwhile;
                 ?>
            </select>
            <select class="form-control mb-2" name="id_kelas">
                <option selected="">Pilih Kelas</option>
                <?php 
                    $exec = mysqli_query($conn,"SELECT * FROM kelas order by id_kelas");
                    while ($angkatan = mysqli_fetch_assoc($exec)) :
                   if($res['id_kelas'] == $angkatan['id_kelas']) {
                      $selected = 'selected';
                    }else {
                      $selected="";
                    }
                    echo "<option $selected value=".$angkatan['id_kelas'].">".$angkatan['nama_kelas']."</option>";
                endwhile;
                 ?>
            </select>
             <select class="form-control" name="id_tahun">
                <option selected="">Pilih Tahun</option>
                <?php 
                    $exec = mysqli_query($conn,"SELECT * FROM tahun order by id_tahun");
                    while ($angkatan = mysqli_fetch_assoc($exec)) :
                    if($res['id_tahun'] == $angkatan['id_tahun']) {
                      $selected = 'selected';
                    }else {
                      $selected="";
                    }
                    echo "<option $selected value=".$angkatan['id_tahun'].">".$angkatan['nama_tahun']."</option>";
                endwhile;
                 ?>
            </select>
             <textarea class="form-control mt-2" name="alamat" placeholder="Alamat Siswa"><?= $res['alamat'] ?></textarea>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="Submit" name="edit" class="btn btn-primary">Simpan</button>
        </form>

<?php } ?>
        <?php 

        if(isset($_POST['id_kelas'])) {
            $id_kelas = $_POST['id_kelas'];
            $exec = mysqli_query($conn,"SELECT * FROM kelas WHERE id_kelas= '$id_kelas'");
            $res = mysqli_fetch_assoc($exec);
            ?>
                 <form action="editdatakelas.php" method="POST">
                 <input type="hidden" name="id_kelas" value="<?= $res['id_kelas'] ?>">
                 <input type="text" name="nama_kelas" class="form-control" value="<?= $res['nama_kelas'] ?>">
                 <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="Submit" name="edit" class="btn btn-primary">Simpan</button>
                </form>

        <?php }
        if(isset($_POST['id_tahun'])) {
            $id_tahun = $_POST['id_tahun'];
            $exec = mysqli_query($conn,"SELECT * FROM tahun WHERE id_tahun= '$id_tahun'");
            $res = mysqli_fetch_assoc($exec);
            ?>
                 <form action="editdatatahun.php" method="POST">
                 <input type="hidden" name="id_tahun" value="<?= $res['id_tahun'] ?>">
                 <input type="text" name="nama_tahun" class="form-control" value="<?= $res['nama_tahun'] ?>">
                 <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="Submit" name="edit" class="btn btn-primary">Simpan</button>
                </form>

        <?php }
        if(isset($_POST['id_angkatan'])) {
            $id_angkatan = $_POST['id_angkatan'];
            $exec = mysqli_query($conn,"SELECT * FROM angkatan WHERE id_angkatan= '$id_angkatan'");
            $res = mysqli_fetch_assoc($exec);
            ?>
                 <form action="editdataangkatan.php" method="POST">
                 <input type="hidden" name="id_angkatan" value="<?= $res['id_angkatan'] ?>">
                 <input type="text" name="nama_angkatan" class="form-control" value="<?= $res['nama_angkatan'] ?>">
                    <input type="text" name="biaya" class="form-control" value="<?= $res['biaya'] ?>">
                 <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="Submit" name="edit" class="btn btn-primary">Simpan</button>
                </form>

        <?php }

?>

