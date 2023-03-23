<?php include 'header.php';
include 'koneksi.php';

if (isset($_GET['id_tahun'])) {
  $id_tahun = $_GET['id_tahun'];
  $exec = mysqli_query($conn, "DELETE FROM tahun WHERE id_tahun='$id_tahun'");
  if ($exec) {
    echo "<script>alert('Data tahun ajaran berhasil dihapus')
       document.location = 'editdatatahun.php';
       </script>";
  } else {
    echo "<script>alert('Data tahun ajaran gagal dihapus')
       document.location = 'editdatatahun.php';
       </script>";
  }
}

?>

<!-- button triger -->
<button class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal">Tambah Data</button>
<!-- button triger -->
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Data Tahun Ajaran</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>No</th>
            <th>Tahun Ajaran</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          $query = "SELECT * FROM Tahun ";
          $exec = mysqli_query($conn, $query);
          while ($res = mysqli_fetch_assoc($exec)) :

          ?>

            <tr>
              <td><?= $no++ ?></td>
              <td><?= $res['tahun_ajaran'] ?></td>
              <td>
                <a href="editdatatahun.php?id_tahun=<?= $res['id_tahun'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Yakin Ingin Menghapus Data?')">Hapus</a>
                <a href="#" class="view_data btn btn-sm btn-warning" data-toggle="modal" data-target="#myModal" id="<?php echo $res['id_tahun']; ?>">Edit</a>
              </td>
            </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Data Tahun Ajaran</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">x</button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
          <input type="text" name="tahun_ajaran" placeholder="Tahun Ajaran" class="form-control mb-2">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="Submit" name="simpan" class="btn btn-primary">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal edit data siswa -->
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Data Tahun Ajaran</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">x</button>
      </div>
      <div class="modal-body" id="datatahu">


      </div>

    </div>
  </div>
</div>

<?php

if (isset($_POST['simpan'])) {
  $tahun_ajaran = htmlentities(strip_tags(strtoupper($_POST['tahun_ajaran'])));

  $query = "INSERT INTO tahun (tahun_ajaran) values('$tahun_ajaran')";
  $exec = mysqli_query($conn, $query);
  if ($exec) {
    echo "<script>alert('Data tahun ajaran berhasil disimpan')
       document.location = 'editdatatahun.php';
       </script>";
  } else {
    echo "<script>alert('Data tahun ajaran Gagal disimpan')
       document.location = 'editdatatahun.php';
       </script>";
  }
}



?>


<?php include 'footer.php'; ?>

<script type="text/javascript">
  $('.view_data').click(function() {
    var id_tahun = $(this).attr('id');
    $.ajax({
      url: 'view.php',
      method: 'post',
      data: {
        id_tahun: id_tahun
      },
      success: function(data) {
        $('#datatahun').html(data)
        $('#myModal').modal('show');
      }
    })

  })
</script>


<?php
if (isset($_POST['edit'])) {
  $id_tahun = $_POST['id_tahun'];
  $tahun_ajaran = htmlentities(strip_tags(strtoupper($_POST['tahun_ajaran'])));
  $query = "UPDATE tahun SET tahun_ajaran = '$tahun_ajaran' WHERE id_tahun = '$id_tahun'";
  $exec = mysqli_query($conn, $query);
  if ($exec) {
    echo "<script>alert('data tahun ajaran berhasil diedit')
        document.location = 'editdatatahun.php' </script>;
        ";
  } else {
    echo "<script>alert('data tahun ajaran gagal diedit')
        document.location = 'editdatatahun.php' </script>;
        ";
  }
}



?>