<?php
include 'header.php';
include 'koneksi.php';



$namaTabel = "DAFTAR_TAHUN_AJARAN";
$msgRef = "hide";



if (isset($_GET['id_tahun'])) {
  $id_tahun = $_GET['id_tahun'];
  $exec = mysqli_query($conn, "DELETE FROM tahun WHERE id_tahun='$id_tahun'");
  if ($exec) {
    // $msg_success = "<h6>Data tahun ajaran berhasil dihapus <i class='fad fa-smile-beam'></i></h6>";
    // $msgRef = "show";
    echo "<script>alert('Data tahun ajaran berhasil dihapus')
       document.location = 'editdatatahun.php';
       </script>";
  } else {
    // $msg_failed = "<h6>Data tahun ajaran gagal dihapus <i class='fad fa-smile-beam'></i></h6>";
    // $msgRef = "show";
    echo "<script>alert('Data tahun ajaran gagal dihapus')
       document.location = 'editdatatahun.php';
       </script>";
  }
}

?>

<!-- button triger -->
<button class="btn btn-primary mb-3" data-toggle="modal" data-target="#ModalTahunAjaran">Tambah Data</button>
<!-- button triger -->
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Data Tahun Ajaran</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTableTahunAjaran" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th class="align-middle">No</th>
            <th class="align-middle">Tahun Ajaran</th>
            <th class="align-middle">Aksi</th>
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
              <td class="align-middle"><?= $no++ ?></td>
              <td class="align-middle"><?= $res['tahun_ajaran'] ?></td>
              <td class="d-flex align-content-sm-between justify-content-center align-middle">
                <a href="editdatatahun.php?id_tahun=<?= $res['id_tahun'] ?>" class="btn btn-sm btn-danger mr-2" onclick="return confirm('Apakah Yakin Ingin Menghapus Data?')"><i class="fad fa-trash"></i></a>
                <a href="#" class="view_data btn btn-sm btn-warning" data-toggle="modal" data-target="#ModalEditTahunAjaran" id="<?php echo $res['id_tahun']; ?>"><i class="fad fa-edit"></i></a>
              </td>
            </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>


<!-- Modal -->
<!-- Data Tahun Ajaran -->
<div class="modal fade" id="ModalTahunAjaran" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Data Tahun Ajaran</h5>
        <i class="btn-danger fad fa-window-close" data-dismiss="modal" aria-label="Close"></i></button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
          <input type="text" name="tahun_ajaran" placeholder="0000-0001" class="form-control">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="Submit" name="simpan" class="btn btn-primary">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>



<!-- Edit Data Tahun Ajaran -->
<div class="modal fade" id="ModalEditTahunAjaran" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Data Tahun Ajaran</h5>
        <i class="btn-danger fad fa-window-close" data-dismiss="modal" aria-label="Close"></i></button>
      </div>
      <div class="modal-body" id="datatahun">


      </div>

    </div>
  </div>
</div>


<?php



if (isset($_POST['simpan'])) {

  if ($_POST['tahun_ajaran'] <> "") {
    $tahun_ajaran = htmlentities(strip_tags(strtoupper($_POST['tahun_ajaran'])));
    $query = "INSERT INTO tahun (tahun_ajaran) values('$tahun_ajaran')";
    $exec = mysqli_query($conn, $query);
    if ($exec) {
      echo "<script>alert('Data tahun ajaran berhasil disimpan')
       document.location = 'editdatatahun.php';
       </script>";
      // $msg_success = "<h6>Data tahun ajaran berhasil disimpan <i class='fad fa-smile-beam'></i></h6>";
      // $msgRef = "show";
    } else {
      echo "<script>alert('Data tahun ajaran Gagal disimpan')
       document.location = 'editdatatahun.php';
       </script>";
      // $msg_failed = "<h6>Data tahun ajaran gagal disimpan <i class='fad fa-smile-beam'></i></h6>";
      // $msgRef = "show";
    }
  } else {
    echo "<script>alert('Tahun tidak boleh kosong!')
    document.location = 'editdatatahun.php';
    </script>;
    ";
    // $msg_failed = "<h6>Tahun tidak boleh kosong <i class='fad fa-smile-beam'></i></h6>";
    // $msgRef = "show";
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

  if ($_POST['id_tahun'] <> "") {

    $tahun_ajaran = htmlentities(strip_tags(strtoupper($_POST['tahun_ajaran'])));
    if ($_POST['tahun_ajaran'] <> "") {

      $query = "UPDATE tahun SET tahun_ajaran = '$tahun_ajaran' WHERE id_tahun = '$id_tahun'";
      $exec = mysqli_query($conn, $query);
      if ($exec) {
        echo "<script>alert('data tahun ajaran berhasil diedit')
        document.location = 'editdatatahun.php' </script>;
        ";
        // $msg_success = "<h6>Data tahun ajaran berhasil diedit <i class='fad fa-smile-beam'></i></h6>";
        // $msgRef = "show";
      } else {
        echo "<script>alert('data tahun ajaran gagal diedit')
        document.location = 'editdatatahun.php' </script>;
        ";
        // $msg_failed = "<h6>Data tahun ajaran gagal diedit <i class='fad fa-smile-beam'></i></h6>";
        // $msgRef = "show";
      }
    } else {
      echo "<script>alert('Tahun tidak boleh kosong!')
      document.location = 'editdatatahun.php';
      </script>;
      ";
      // $msg_failed = "<h6>Tahun ajaran tidak boleh kosong <i class='fad fa-smile-beam'></i></h6>";
      // $msgRef = "show";
    }
  } else {
    echo "<script>alert('Id Tahun tidak boleh kosong!')
    document.location = 'editdatatahun.php';
    </script>;
    ";
    // $msg_failed = "<h6>Id tahun ajaran tidak boleh kosong <i class='fad fa-smile-beam'></i></h6>";
    // $msgRef = "show";
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
      document.location = 'editdatatahun.php';
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
      document.location = 'editdatatahun.php';
    }, 4000);
  </script>
<?php } ?>