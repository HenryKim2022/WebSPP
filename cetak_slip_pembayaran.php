<?php

session_start();
include 'function/function_rupiah.php';
if (isset($_SESSION['admin'])) {
	include 'koneksi.php';
?>
	<!DOCTYPE html>
	<html>

	<head>
		<title>Slip Pembayaran SPP</title>

		<style>
			body {
				font-family: arial;
			}

			table {
				border-collapse: collapse;
			}
		</style>
	</head>

	<body onload="window.print();">
		<div class="row">
			<div style="text-align: center;">
				<h3 class="text-center">
					LAPORAN PEMBAYARAN SPP
					<br>
					<b>
						MADRASAH IBTIDAIYAH AL-MUKHLISIN
					</b>
				</h3>
				<hr>

			</div>
		</div>


		<?php
		// QUERY
		$nis = $_GET['nis'];
		$siswa = mysqli_query($conn, "SELECT siswa.*,angkatan.*,tahun.*,kelas.* FROM siswa,angkatan,tahun,kelas WHERE siswa.id_angkatan = angkatan.id_angkatan AND siswa.id_tahun = tahun.id_tahun AND  siswa.id_kelas = kelas.id_kelas AND siswa.nis = '$nis'");
		$sw = mysqli_fetch_assoc($siswa);
		$idspp = $_GET['id'];
		?>

		<!--  -->
		<!-- HTML TABLE -->
		<table>
			<tr>
				<td>Nama Siswa </td>
				<td>:</td>
				<td> <?= $sw['nama'] ?></td>
			</tr>
			<tr>
				<td>Nis </td>
				<td>:</td>
				<td> <?= $sw['nis'] ?></td>
			</tr>
			<tr>
				<td>Kelas </td>
				<td>:</td>
				<td> <?= $sw['nama_kelas'] ?></td>
			</tr>
			<tr>
				<td>Angkatan </td>
				<td>:</td>
				<td> <?= $sw['nama_angkatan'] ?></td>
			</tr>
			<tr>
				<td>Tahun Ajaran</td>
				<td>:</td>
				<td> <?= $sw['tahun_ajaran'] ?></td>
			</tr>
		</table>
		<hr>
		<table border="1" cellspacing="" cellpadding="4" width="100%">
			<tr>
				<th>NO</th>
				<th>NO. BAYAR</th>
				<th>PEMBAYARAN BULAN</th>
				<th>JUMLAH</th>
				<th>KETERANGAN</th>
			</tr>
			<?php
			$spp = mysqli_query($conn, "SELECT siswa.*,pembayaran.* FROM siswa,pembayaran WHERE pembayaran.id_siswa = siswa.id_siswa AND pembayaran.idspp = '$idspp' ORDER BY nobayar ASC");
			$i = 1;
			$total = 0;
			while ($dta = mysqli_fetch_assoc($spp)) :
			?>
				<tr>
					<td align="center"><?= $i ?></td>
					<td align=""><?= $dta['nobayar'] ?></td>
					<td align=""><?= $dta['bulan'] ?></td>
					<td align="right"><?= format_rupiah($dta['jumlah']) ?></td>
					<td align="center"><?= $dta['ket'] ?></td>
				</tr>
				<?php $i++; ?>
				<?php $total += $dta['jumlah'] ?>
			<?php endwhile; ?>
			<tr>
				<td colspan="4" align="right"><b>TOTAL</b></td>
				<td align="center"><b><?= format_rupiah($total) ?></b></td>
			</tr>
		</table>
		<table width="100%">
			<tr>
				<td></td>
				<td width="200px">
					<BR />
					<p>Tangerang, <?= date('d/m/y') ?> <br />
						Operator,
						<br />
						<br />
						<br />
					<p>__________________________</p>
				</td>
			</tr>
		</table>

	</body>

	</html>


<?php
} else {
	header("location : loginauth.php");
}
?>