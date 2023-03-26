<?php
include 'function/function_rupiah.php';
include 'koneksi.php';
include 'header.php';
$query = "SELECT * FROM pembayaran WHERE ket = 'LUNAS'";
$exec = mysqli_query($conn, $query);
$totalspp = mysqli_num_rows($exec);
$totaltrx  = 0;
while ($res = mysqli_fetch_assoc($exec)) {
    $totaltrx += $res['jumlah'];
}

$today = date('Y-m-d');
$harini = 0;
$query2 = "SELECT * from pembayaran WHERE tglbayar = '$today' AND ket = 'LUNAS'";
$exec2 = mysqli_query($conn, $query2);
while ($res =  mysqli_fetch_assoc($exec2)) {
    $harini += $res['jumlah'];
}
?>
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dasbor</h1>

</div>

<!-- Content Row -->
<div class="row">
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Banyak Keseluruhan Transaksi</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $totalspp ?>x</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Total Keseluruhan Dana Transaksi</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= format_rupiah($totaltrx) ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Total Pemasukan Hari ini</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= format_rupiah($harini) ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- GROUP 3 -->
<div class="card border-left-primary shadow h-100 py-2 w-100">
    <div class="col-xl-12 col-md-6 mb-4 text-center mt-3">
        <!-- <h3 class="text-green"> -->
        <h3 class="">
            <u class="cust-u">
                GRUP3 - REKAYASA PERANGKAT LUNAK
            </u>
        </h3>
    </div>
    <div class="row">
        <!-- Group Logo  -->
        <div class="col-xl-12 col-md-6 mb-4 justify-content-center">
            <!-- <div class="card border-left-primary shadow h-100 py-2"> -->
            <div class="card-body">
                <style>
                    .Group3Logo {
                        text-align: right;
                    }
                </style>
                <div class="row">
                    <div class="col-5 mr-2 Group3Logo">
                        <table>
                            <tr>
                                <td class="d-flex align-content-sm-between justify-content-end align-middle">
                                    <img src="/img/GroupLogo.png" alt="Group3Logo" style="height: 42%; width: 32%">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="text-xs font-weight-bold text-uppercase mb-1 mt-1 justify-content-center" style="color:#f6503b;">
                                        <a>
                                            Mo~Tec (Modern Technology)
                                        </a>
                                        <div class="text-xs font-weight-lighter text-uppercase mb-1 mt-1">
                                            <a>
                                                <i>
                                                    The Perfect Tech Experience
                                                </i>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </table>



                    </div>
                    <div class="col-6">
                        <!-- <i class="fas fa-calendar fa-2x text-gray-300"></i> -->
                        <div class="text-md text-green font-weight-bold text-uppercase mb-1">
                            <a class="text-orange">
                                Anggota:
                            </a>
                        </div>

                        <style>
                            .cust-ul {
                                list-style-type: none;
                                /* margin-left: 2.5em; */
                            }

                            .cust-i {
                                left: 0.5em;
                                position: absolute;
                                text-align: center;
                                width: 2em;
                                line-height: inherit;

                            }

                            .grad-txt-1 {
                                /* font-size: 72px; */
                                background: -webkit-linear-gradient(#4f78ef, #7a3aeb);
                                -webkit-background-clip: text;
                                /* -webkit-text-fill-color: transparent; */
                            }

                            .grad-txt-2 {
                                /* font-size: 72px; */
                                background: -webkit-linear-gradient(#4f78ef, #7a3aeb);
                                -webkit-background-clip: text;
                                /* -webkit-text-fill-color: transparent; */
                            }


                            .cust-u {
                                text-decoration: underline;
                                text-underline-position: under;
                                text-decoration-color: #f75139;
                            }

                            .text-green {
                                color: green;
                            }

                            .text-orange {
                                color: #f75139;
                            }

                            .cust-ul .cust-i {
                                color: #f75139;
                            }
                        </style>
                        <ul class="cust-ul pl-0 ml-4 grad-txt-2 text-md">
                            <li><i class="cust-i fas fa-diagnoses"></i>
                            </li>Project Manager | <i class="fa-duotone fa-arrow-right-from-arc"></i>
                            Akhmad Hafizh Dzulfikar (1152120001)

                            <li><i class="cust-i fad fa-laptop-code"></i>
                            </li> Programmer | <i class="fa-duotone fa-arrow-right-from-arc"></i>
                            Hendri (1152125001)

                            <li><i class="cust-i fad fa-analytics"></i>
                            </li> Analis | </i>
                            Dani Hasbiarta (1152225003)

                            <li><i class="cust-i fad fa-vials"></i>
                            </li> Tester | <i class="fa-duotone fa-arrow-right-from-arc"></i>
                            Hariawan Maulana (1152125005)

                            <li><i class="cust-i fad fa-drafting-compass"></i>
                            </li>Designer 1 | <i class="fa-duotone fa-arrow-right-from-arc"></i>
                            Aditya Bagaskara (1152025001)

                            <li><i class="cust-i fad fa-drafting-compass"></i>
                            </li> Designer 2 | <i class="fa-duotone fa-arrow-right-from-arc"></i>
                            Seli Adinda Mutiara (1152120008)

                            <li><i class="cust-i fad fa-folders"></i>
                            </li> Dokumenter | <i class="fa-duotone fa-arrow-right-from-arc"></i>
                            Phaundra Sidi Isasky R (1152220004)
                        </ul>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                    </div>
                </div>
            </div>
            <!-- </div> -->
        </div>


    </div>
</div>




</div>

<!-- Content Row -->
<?php include 'footer.php'; ?>