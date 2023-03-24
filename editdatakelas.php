<?php

include 'header.php';
include 'koneksi.php';

$namaTabel = "DAFTAR_KELAS";
$msgRef = "hide";


if (isset($_GET['id_kelas'])) {
  $id_kelas = $_GET['id_kelas'];
  $exec = mysqli_query($conn, "DELETE FROM kelas WHERE id_kelas='$id_kelas'");
  if ($exec) {
    // $msg_success = "<h6>Data kelas berhasil dihapus <i class='fad fa-smile-beam'></i></h6>";
    // $msgRef = "show";
    echo "<script>alert('Data kelas berhasil dihapus')
       document.location = 'editdatakelas.php';
       </script>";
  } else {
    // $msg_failed = "<h6>Data kelas gagal dihapus <i class='fad fa-smile-beam'></i></h6>";
    // $msgRef = "show";
    echo "<script>alert('Data kelas gagal dihapus')
       document.location = 'editdatakelas.php';
       </script>";
  }
}

?>

<!-- button triger -->
<button class="btn btn-primary mb-3" data-toggle="modal" data-target="#ModalAddDataKelas">Tambah Data</button>
<!-- button triger -->
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Data Kelas</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTableKelas" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th class="align-middle">No</th>
            <th class="align-middle">Nama Kelas</th>
            <th class="align-middle">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          $query = "SELECT * FROM kelas ";
          $exec = mysqli_query($conn, $query);
          while ($res = mysqli_fetch_assoc($exec)) :

          ?>

            <tr>
              <td class="align-middle"><?= $no++ ?></td>
              <td class="align-middle"><?= $res['nama_kelas'] ?></td>
              <td class="d-flex align-content-sm-between justify-content-center align-middle">
                <a href="editdatakelas.php?id_kelas=<?= $res['id_kelas'] ?>" class="btn btn-sm btn-danger mr-2" onclick="return confirm('Apakah Yakin Ingin Menghapus Data?')"><i class="fad fa-trash"></i></a>
                <a href="#" class="view_data btn btn-sm btn-warning" data-toggle="modal" data-target="#ModalEditDataKelas" id="<?php echo $res['id_kelas']; ?>"><i class="fad fa-edit"></i></a>
              </td>
            </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="ModalAddDataKelas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Data Kelas</h5>
        <i class="btn-danger fad fa-window-close" data-dismiss="modal" aria-label="Close"></i></button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
          <input type="text" name="nama_kelas" placeholder="Nama Kelas" class="form-control">
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
<div class="modal fade" id="ModalEditDataKelas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Data Kelas</h5>
        <i class="btn-danger fad fa-window-close" data-dismiss="modal" aria-label="Close"></i></button>
      </div>
      <div class="modal-body" id="datakelas">


      </div>

    </div>
  </div>
</div>

<?php

if (isset($_POST['simpan'])) {


  if ($_POST['nama_kelas'] <> "") {
    $nama_kelas = htmlentities(strip_tags(strtoupper($_POST['nama_kelas'])));

    $query = "INSERT INTO kelas (nama_kelas) values('$nama_kelas')";
    $exec = mysqli_query($conn, $query);
    if ($exec) {
      // $msg_success = "<h6>Data kelas berhasil disimpan <i class='fad fa-smile-beam'></i></h6>";
      // $msgRef = "show";
      echo "<script>alert('Data kelas berhasil disimpan')
       document.location = 'editdatakelas.php';
       </script>";
    } else {
      // $msg_failed = "<h6>Data kelas gagal disimpan <i class='fad fa-smile-beam'></i></h6>";
      // $msgRef = "show";
      echo "<script>alert('Data kelas Gagal disimpan')
       document.location = 'editdatakelas.php';
       </script>";
    }
  } else {
    // $msg_failed = "<h6>Nama kelas tidak boleh kosong <i class='fad fa-smile-beam'></i></h6>";
    // $msgRef = "show";
    echo "<script>alert('Nama kelas tidak boleh kosong <i class='fad fa-smile-beam'></i>')
    document.location = 'editdatakelas.php';
    </script>";
  }
}



?>


<?php include 'footer.php'; ?>

<script type="text/javascript">
  $('.view_data').click(function() {
    var id_kelas = $(this).attr('id');
    $.ajax({
      url: 'view.php',
      method: 'post',
      data: {
        id_kelas: id_kelas
      },
      success: function(data) {
        $('#datakelas').html(data)
        $('#ModalEditDataKelas').modal('show');
      }
    })

  })
</script>


<?php
if (isset($_POST['edit'])) {

  if ($_POST['nama_kelas'] <> "") {
    $id_kelas = $_POST['id_kelas'];
    $nama_kelas = htmlentities(strip_tags(strtoupper($_POST['nama_kelas'])));
    $query = "UPDATE kelas SET nama_kelas = '$nama_kelas' WHERE id_kelas = '$id_kelas'";
    $exec = mysqli_query($conn, $query);
    if ($exec) {
      // $msg_success = "<h6>Data kelas berhasil diedit <i class='fad fa-smile-beam'></i></h6>";
      // $msgRef = "show";
      echo "<script>alert('Data kelas berhasil diedit')
        document.location = 'editdatakelas.php' </script>;
        ";
    } else {
      // $msg_failed = "<h6>Data kelas gagal diedit <i class='fad fa-smile-beam'></i></h6>";
      // $msgRef = "show";
      echo "<script>alert('Data kelas gagal diedit')
        document.location = 'editdatakelas.php' </script>;
        ";
    }
  } else {
    // $msg_failed = "<h6>Nama kelas tidak boleh kosong <i class='fad fa-smile-beam'></i></h6>";
    // $msgRef = "show";
    echo "<script>alert('Nama kelas tidak boleh kosong')
        document.location = 'editdatakelas.php' </script>;
        ";
  }
}



?>




<!-- TOAST: Success -->
<?php
if ($msg_success <> "" && $msgRef <> "hide") { ?>
  <script>
    $.toast({
      title: "<i class='fas fa-thumbs-up'></i>  INFORMASI",
      dismissible: true,
      stackable: true,
      pauseDelayOnHover: true,
      position: 'top-left',
      content: "<?= $msg_success ?>",
      type: 'success',
      delay: 10000
    });

    setTimeout(() => {
      <?php $msgRef = "hide"; ?>
      document.location = 'editdatakelas.php';
    }, 4000);
  </script>
<?php } ?>


<!-- TOAST: Failed -->
<?php
if ($msg_failed <> "" && $msgRef <> "hide") { ?>
  <script>
    $.toast({
      title: "<i class='fas fa-exclamation-triangle'></i>  INFORMASI",
      dismissible: true,
      stackable: true,
      pauseDelayOnHover: true,
      position: 'top-left',
      content: "<?= $msg_failed ?>",
      type: 'warning',
      delay: 10000
    });

    setTimeout(() => {
      <?php $msgRef = "hide"; ?>
      document.location = 'editdatakelas.php';
    }, 4000);
  </script>
<?php } ?>