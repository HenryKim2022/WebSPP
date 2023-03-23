<?php 
session_start();
include 'koneksi.php';
if(isset($_GET['act'])) {
if($_GET['act']=='bayar') {
		$idspp = $_GET['id'];
		$nisn   = $_GET['nisn'];
		// tanggal bayar
		$tglbayar = date('Y-m-d');
		$nobayar = date('dmYHisis');
		$id_admin = $_SESSION['admin'];
		
		// id admin
		

		$byr = mysqli_query($conn ,"UPDATE pembayaran SET 
			nobayar = '$nobayar',
			tglbayar = '$tglbayar',
			ket = 'LUNAS',
			id_admin = '$id_admin'
			WHERE idspp = '$idspp'");

		if ($byr) {
			header('location: pembayaran.php?nisn='.$nisn);
		}else {
			echo "
			<script>
			alert('gagal')
			</script>
			";

		}
		
	}
	else if($_GET['act']=='batal'){
	    $idspp = $_GET['id'];
		$nisn   = $_GET['nisn'];

		$batal = mysqli_query($conn ,"UPDATE pembayaran SET 
			nobayar = null,
			tglbayar = null,
			ket = null,
			id_admin = null 
			WHERE idspp = '$idspp'");

			if ($batal) {
				header('location: pembayaran.php?nisn='.$nisn);
		}

	}
}
	?>