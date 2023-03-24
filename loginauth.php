<?php
$Site_Logo = "img/Logo.jpg";

session_start();
if (isset($_SESSION['admin'])) {
    header('location: index.php');
}
include 'koneksi.php';
if (isset($_POST['login'])) {
    $user = htmlentities(strip_tags($_POST['user']));
    $pass = htmlentities(strip_tags($_POST['pass']));

    $query = "SELECT * FROM admin WHERE user_admin = '$user'";
    $exec = mysqli_query($conn, $query);
    if (mysqli_num_rows($exec) !== 0) {
        $query = "SELECT * FROM admin WHERE pass_admin = '$pass'";
        $exec = mysqli_query($conn, $query);
        if (mysqli_num_rows($exec) !== 0) {
            $res = mysqli_fetch_assoc($exec);
            $_SESSION['admin'] = $res['id_admin'];
            $_SESSION['nama_admin'] = $res['nama_admin'];
            header('location: index.php');
        } else {
            echo "<script>alert('Password Yang Anda Masukan Salah');
            document.location = 'loginauth.php';
            </script>";
        }
    } else {
        echo "<script>alert('User Admin Tidak Tersedia')
        document.location = 'loginauth.php';
        </script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Login | AP SPP</title>
    <link href="img/mi.jpg" rel="icon" type="images/x-icon">


    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">


    <style>
        /*  */
        /*  */
        /* CENTERING LOGIN FORM */
        .dgrid {
            display: grid;
        }

        .container1 {
            width: 100vw;
            height: 100vh;
            justify-content: center;
            align-content: center;
            grid-template-columns: 80%;
            grid-template-rows: repeat(3, max-content);
            row-gap: 10px;
        }

        .container1 .title {
            text-align: center;
        }


        /*  */
        /*  */
    </style>
</head>

<body class="bg-gradient-success">
    <div class="container1 dgrid">
        <div class="container">
            <!-- Outer Row -->
            <div class="row justify-content-center">
                <div class="col-xl-10 col-lg-12 col-md-9">
                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="row">
                                <div class="col-lg-6 d-none d-lg-block bg-logo-image">
                                    <img width="100%" height="100%" src="<?= $Site_Logo ?>">
                                </div>
                                <div class="col-lg-6">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4">Aplikasi Pembayaran SPP</h1>
                                        </div>
                                        <form class="user" method="post" action="">
                                            <div class="form-group">
                                                <input type="text" autocomplete="off" required name="user" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Masukkan Username...">
                                            </div>
                                            <div class="form-group">
                                                <input autocomplete="off" type="password" required name="pass" class="form-control form-control-user" id="exampleInputPassword" placeholder="Masukkan Password">
                                            </div>

                                            <button type="submit" name="login" class="btn btn-primary btn-user btn-block">Masuk</button>
                                            <hr>
                                        </form>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>


    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <script type="text/javascript">
        $('input').attr('autocomplete', 'off');
    </script>

</body>

</html>