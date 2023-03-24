<?php
include 'function/function_rupiah.php';
include 'header.php';
include 'koneksi.php';

$namaTabel = "DAFTAR_ANGKATAN";
$msgRef = "hide";



if (isset($_GET['id_angkatan'])) {
  $id_angkatan = $_GET['id_angkatan'];
  $exec = mysqli_query($conn, "DELETE FROM angkatan WHERE id_angkatan='$id_angkatan'");
  if ($exec) {
    // $msg_success = "<h6>Data angkatan berhasil dihapus <i class='fad fa-smile-beam'></i></h6>";
    // $msgRef = "show";
    echo "<script>alert('Data angkatan berhasil dihapus')
    document.location = 'editdataangkatan.php';
    </script>";
  } else {
    // $msg_failed = "<h6>Data angkatan gagal dihapus <i class='fad fa-smile-beam'></i></h6>";
    // $msgRef = "show";
    echo "<script>alert('Data angkatan gagal dihapus')
    document.location = 'editdataangkatan.php';
    </script>";
  }
}

?>

<!-- button triger -->
<button class="btn btn-primary mb-3" data-toggle="modal" data-target="#ModalAddDataAngkatan">Tambah Data</button>
<!-- button triger -->
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Data Angkatan</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTableAngkatan" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th class="align-middle">No</th>
            <th class="align-middle">Angkatan</th>
            <th class="align-middle">Biaya</th>
            <th class="align-middle">Aksi</th>
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
              <td class="align-middle"><?= $no++ ?></td>
              <td class="align-middle"><?= $res['nama_angkatan'] ?></td>
              <td class="align-middle"><?= format_rupiah($res['biaya']) ?></td>
              <td class="d-flex align-content-sm-between justify-content-center align-middle">
                <a href="editdataangkatan.php?id_angkatan=<?= $res['id_angkatan'] ?>" class="btn btn-sm btn-danger mr-2" onclick="return confirm('Apakah Yakin Ingin Menghapus Data?')"><i class="fad fa-trash"></i></a>
                <a href="#" class="view_data btn btn-sm btn-warning" data-toggle="modal" data-target="#ModalEditDataAngkatan" id="<?php echo $res['id_angkatan']; ?>"><i class="fad fa-edit fa-md"></i></a>
              </td>
            </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- Modal: Add Data Angkatan -->
<div class="modal fade" id="ModalAddDataAngkatan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Data Angkatan</h5>
        <!-- <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">x</button> -->
        <i class="btn-danger fad fa-window-close" data-dismiss="modal" aria-label="Close"></i></button>
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
<div class="modal fade" id="ModalEditDataAngkatan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Data Angkatan</h5>
        <!-- <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">x</button> -->
        <i class="btn-danger fad fa-window-close" data-dismiss="modal" aria-label="Close"></i></button>
      </div>
      <div class="modal-body" id="dataangkatan">


      </div>

    </div>
  </div>
</div>



<?php



if (isset($_POST['simpan'])) {
  $nama_angkatan = htmlentities(strip_tags(strtoupper($_POST['nama_angkatan'])));

  if ($_POST['nama_angkatan'] != "") {
    $biaya = htmlentities(strip_tags(strtoupper($_POST['biaya'])));

    if ($_POST['biaya'] != "") {
      if (is_numeric($_POST['biaya'])) {
        $query = "INSERT INTO angkatan (nama_angkatan,biaya) values('$nama_angkatan','$biaya')";
        $exec = mysqli_query($conn, $query);
        if ($exec) {

          // $msg_success = "<h6>Data angkatan berhasil disimpan <i class='fad fa-smile-beam'></i></h6>";
          // $msgRef = "show";
          echo "<script>alert('Data angkatan berhasil disimpan')
          document.location = 'editdataangkatan.php';
          </script>";
        } else {

          // $msg_failed = "<h6>Data angkatan Gagal disimpan <i class='fad fa-smile-beam'></i></h6>";
          // $msgRef = "show";
          echo "<script>alert('Data angkatan Gagal disimpan')
          document.location = 'editdataangkatan.php';
          </script>";
        }
      } else {

        // $msg_failed = "<h6>Biaya harus berupa angka & tanpa tanda titik/koma <i class='fad fa-smile-beam'></i></h6>";
        // $msgRef = "show";
        echo "<script>alert('Biaya harus berupa angka & tanpa tanda titik/koma!')
        document.location = 'editdataangkatan.php';
        </script>;
        ";
      }
    } else {

      // $msg_failed = "<h6>Biaya SPP Angkatan tidak boleh kosong <i class='fad fa-smile-beam'></i></h6>";
      // $msgRef = "show";
      echo "<script>alert('Biaya SPP Angkatan tidak boleh kosong!')
      document.location = 'editdataangkatan.php';
      </script>;
      ";
    }
  } else {

    // $msg_failed = "<h6>Nama angkatan tidak boleh kosong <i class='fad fa-smile-beam'></i></h6>";
    // $msgRef = "show";
    echo "<script>alert('Nama angkatan tidak boleh kosong!')
    document.location = 'editdataangkatan.php';
    </script>;
    ";
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
        $('#ModalEditDataAngkatan').modal('show');


      },

    })

  })
</script>


<?php

if (isset($_POST['edit'])) {
  $id_angkatan = $_POST['id_angkatan'];

  if ($_POST['nama_angkatan'] != "") {

    $nama_angkatan = htmlentities(strip_tags(strtoupper($_POST['nama_angkatan'])));
    if ($_POST['biaya'] != "") {

      if (is_numeric($_POST['biaya'])) {
        $biaya = htmlentities(strip_tags(strtoupper($_POST['biaya'])));
        $query = "UPDATE angkatan SET nama_angkatan = '$nama_angkatan', biaya = '$biaya' WHERE id_angkatan = '$id_angkatan'";
        $exec = mysqli_query($conn, $query);
        if ($exec) {
          echo "<script>alert('data angkatan berhasil diedit')
          document.location = 'editdataangkatan.php' </script>;
          ";
          // $msg_success = "<h6>Data angkatan berhasil diedit <i class='fad fa-smile-beam'></i></h6>";
          // $msgRef = "show";
        } else {
          echo "<script>alert('data angkatan gagal diedit')
          document.location = 'editdataangkatan.php' </script>;
          ";
          // $msg_failed = "<h6>Data angkatan gagal diedit <i class='fad fa-smile-beam'></i></h6>";
          // $msgRef = "show";
        }
      } else {
        echo "<script>alert('Biaya harus berupa angka & tanpa tanda titik/koma!')
        document.location = 'editdataangkatan.php';
        </script>;
        ";
        // $msg_failed = "<h6>Biaya harus berupa angka & tanpa tanda titik/koma <i class='fad fa-smile-beam'></i></h6>";
        // $msgRef = "show";
      }
    } else {
      echo "<script>alert('Biaya SPP Angkatan tidak boleh kosong!')
        document.location = 'editdataangkatan.php';
        </script>;
      ";
      // $msg_failed = "<h6>Biaya SPP Angkatan tidak boleh kosong <i class='fad fa-smile-beam'></i></h6>";
      // $msgRef = "show";
    }
  } else {
    echo "<script>alert('Nama angkatan tidak boleh kosong!')
    document.location = 'editdataangkatan.php';
    </script>;
    ";
    // $msg_failed = "<h6>Nama angkatan tidak boleh kosong <i class='fad fa-smile-beam'></i></h6>";
    // $msgRef = "show";
  }
}



?>




<!-- TOAST: Success -->
<?php
if ($msg_success <> "" && $msgRef != "hide") { ?>
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


    // document.location = 'editdataangkatan.php';
    setTimeout(() => {
      <?php
      // $msgRef = "hide";
      ?>
      document.location = 'editdataangkatan.php';
    }, 4000);
  </script>
<?php } ?>


<!-- TOAST: Failed -->
<?php
if ($msg_failed <> "" && $msgRef != "hide") { ?>
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
      <?php
      // $msgRef = "hide"; 
      ?>
      document.location = 'editdataangkatan.php';
    }, 4000);
  </script>
<?php } ?>