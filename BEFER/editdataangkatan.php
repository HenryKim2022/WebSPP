<?php
include 'function/function_rupiah.php';
include 'header.php';
include 'koneksi.php';

if (isset($_GET['id_angkatan'])) {
  $id_angkatan = $_GET['id_angkatan'];
  $exec = mysqli_query($conn, "DELETE FROM angkatan WHERE id_angkatan='$id_angkatan'");
  if ($exec) {
    echo "<script>alert('Data angkatan berhasil dihapus')
       document.location = 'editdataangkatan.php';
       </script>";
  } else {
    echo "<script>alert('Data angkatan gagal dihapus')
       document.location = 'editdataangkatan.php';
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
    <h6 class="m-0 font-weight-bold text-primary">Data Angkatan</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>No</th>
            <th>Angkatan Ke</th>
            <th>Biaya</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          $query = "SELECT * FROM angkatan ";
          $exec = mysqli_query($conn, $query);
          while ($res = mysqli_fetch_assoc($exec)) :

          ?>

            <tr>
              <td><?= $no++ ?></td>
              <td><?= $res['nama_angkatan'] ?></td>
              <td><?= format_rupiah($res['biaya']) ?></td>
              <td>
                <a href="editdataangkatan.php?id_angkatan=<?= $res['id_angkatan'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Yakin Ingin Menghapus Data?')">Hapus</a>
                <a href="#" class="view_data btn btn-sm btn-warning" data-toggle="modal" data-target="#myModal" id="<?php echo $res['id_angkatan']; ?>">Edit</a>
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
        <h5 class="modal-title" id="exampleModalLabel">Data Angkatan</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">x</button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
          <input type="text" name="nama_angkatan" placeholder="Nama Angkatan" class="form-control mb-2">
          <input type="text" name="biaya" placeholder="Biaya SPP" class="form-control mb-2">
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
        <h5 class="modal-title" id="exampleModalLabel">Edit Data Angkatan</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">x</button>
      </div>
      <div class="modal-body" id="dataangkatan">


      </div>

    </div>
  </div>
</div>

<?php

if (isset($_POST['simpan'])) {
  $nama_angkatan = htmlentities(strip_tags(strtoupper($_POST['nama_angkatan'])));
  $biaya = htmlentities(strip_tags(strtoupper($_POST['biaya'])));
  $query = "INSERT INTO angkatan (nama_angkatan,biaya) values('$nama_angkatan','$biaya')";
  $exec = mysqli_query($conn, $query);
  if ($exec) {
    echo "<script>alert('Data angkatan berhasil disimpan')
       document.location = 'editdataangkatan.php';
       </script>";
  } else {
    echo "<script>alert('Data angkatan Gagal disimpan')
       document.location = 'editdataangkatan.php';
       </script>";
  }
}



?>


<?php include 'footer.php'; ?>

<script type="text/javascript">
  $('.view_data').click(function() {
    var id_angkatan = $(this).attr('id');
    $.ajax({
      url: 'view.php',
      method: 'post',
      data: {
        id_angkatan: id_angkatan
      },
      success: function(data) {
        $('#dataangkatan').html(data)
        $('#myModal').modal('show');
      }
    })

  })
</script>


<?php
if (isset($_POST['edit'])) {
  $id_angkatan = $_POST['id_angkatan'];
  $nama_angkatan = htmlentities(strip_tags(strtoupper($_POST['nama_angkatan'])));
  $biaya = htmlentities(strip_tags(strtoupper($_POST['biaya'])));
  $query = "UPDATE angkatan SET nama_angkatan = '$nama_angkatan', biaya = '$biaya' WHERE id_angkatan = '$id_angkatan'";
  $exec = mysqli_query($conn, $query);
  if ($exec) {
    echo "<script>alert('data angkatan berhasil diedit')
        document.location = 'editdataangkatan.php' </script>;
        ";
  } else {
    echo "<script>alert('data angkatan gagal diedit')
        document.location = 'editdataangkatan.php' </script>;
        ";
  }
}



?>