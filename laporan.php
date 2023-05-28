<?php
include 'function/function_rupiah.php';
include 'header.php';
include 'koneksi.php';

// $awal = "";
// $akhir = "";
// $spp = "";
?>


<div class="card shadow mb-4">

    <div class="card-body">
        <div class="mb-2">
            <a href="laporan.php"><button class="btn btn-primary"><i class="fad fa-sync-alt"></i></button></a>
        </div>
        <hr>
        <!-- <form action="cetak_laporan.php" method="get" target="_blank"> -->
        <!-- <form id="formX" method="get" target="my_iframe"> -->
        <!-- <form id="formX" action="cetak_laporan.php" method="get" target="my_iframe"> -->


        <form id="formX" action="" method="POST">
            <!-- <form id="formX" action="laporan.php" method="get"> -->
            <!-- <form action="cetak_laporan.php" method="get" target="_blank"> -->
            <?php {
                date_default_timezone_set('Asia/Jakarta');
                // $dateDef = date('Y-m-d', time());
                $past = date("Y-m-d", strtotime("-1 day"));
                $future = date("Y-m-d", strtotime("+3 day"));
                $sameday = date('Y-m-d');
            ?>
                <div class="input-group mb-3">
                    <input id="awal" name="awal" type="date" class="form-control col-sm-6" value="<?= $sameday ?>">
                    <input id="akhir" name="akhir" type="date" class="form-control col-sm-6 mr-2" value="<?= $sameday ?>">
                    <button id="lihat" type="submit" class="btn btn-primary">Lihat</button>
                </div>

            <?php } ?>
        </form>
    </div>
</div>


<div id="reportTABLE">
</div>


</div>
<?php include 'footer.php'; ?>


<script type="text/javascript">
    $("#formX").submit(function(e) {
        var tgl_awal = $("#awal").val();
        var tgl_akhir = $("#akhir").val();

        e.preventDefault();
        if (tgl_awal && tgl_akhir) {
            $.ajax({
                url: 'view.php',
                type: 'post',
                data: {
                    tgl_awal: tgl_awal,
                    tgl_akhir: tgl_akhir

                },
                success: function(data) {
                    $('#reportTABLE').html(data)

                }
            });
        } else {
            window.location.replace("laporan.php");
        }
    });
</script>