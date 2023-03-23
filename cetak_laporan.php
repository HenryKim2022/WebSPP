<?php
session_start();
$total = 0;
include 'function/function_rupiah.php';
if (isset($_SESSION['admin'])) {
	include 'koneksi.php';

?>
	<!DOCTYPE html>
	<html>

	<head>
		<title>Laporan Pembayaran</title>

		<style>
			body {
				font-family: arial;
			}



			table {
				border-collapse: collapse;
			}
		</style>
	</head>

	<!-- <body> -->

	<body onload="window.print()">
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


				<?php
				// DATE CONV INDO
				$tanggalAwal = "";
				$tanggalAkhir = "";

				function tanggal_indo($tanggal = "", $cetak_hari = false)
				{
					$hari = array(
						1 =>    'Senin',
						'Selasa',
						'Rabu',
						'Kamis',
						'Jumat',
						'Sabtu',
						'Minggu'
					);

					$bulan = array(
						1 =>   'Januari',
						'Februari',
						'Maret',
						'April',
						'Mei',
						'Juni',
						'Juli',
						'Agustus',
						'September',
						'Oktober',
						'November',
						'Desember'
					);
					$split    = explode('-', $tanggal);
					$tgl_indo = $split[2] . ' ' . $bulan[(int)$split[1]] . ' ' . $split[0];

					if ($cetak_hari) {
						$num = date('N', strtotime($tanggal));
						return $hari[$num] . ', ' . $tgl_indo;
					}
					return $tgl_indo;
				}

				// IF GET
				if (isset($_GET['awal']) && isset($_GET['akhir'])) {
					// OUTPUT AWAL
					$tanggalAwal = date('Y-m-d', strtotime($_GET['awal']));
					$tanggalAwal = tanggal_indo($tanggalAwal, false);

					// OUTPUT AKHIR
					$tanggalAkhir = date('Y-m-d', strtotime($_GET['akhir']));
					$tanggalAkhir = tanggal_indo($tanggalAkhir, false);


					// IF POST
				} else if (isset($_POST['awal']) && isset($_POST['akhir'])) {
					$tanggalAwal = date('Y-m-d', strtotime($_POST['awal']));
					$tanggalAwal = tanggal_indo($tanggalAwal, false);

					// OUTPUT AKHIR
					$tanggalAkhir = date('Y-m-d', strtotime($_POST['akhir']));
					$tanggalAkhir = tanggal_indo($tanggalAkhir, false);
				}
				?>

				<?php {
					echo "Tgl " .  $tanggalAwal . " Sampai Tgl " . $tanggalAkhir;
				}
				?>


			</div>
		</div>


		<br>
		<br>
		<table id="reportTable" border="1" cellspacing="" cellpadding="4" width="100%">
			<thead>
				<tr>
					<th>NO</th>
					<th>NIS</th>
					<th>NAMA SISWA</th>
					<th>KELAS</th>
					<th>NO. BAYAR</th>
					<th>PEMBAYARAN BULAN</th>
					<th>JUMLAH</th>
					<th>KETERANGAN</th>
				</tr>
			</thead>

			<tbody>
				<?php if (!empty($_GET['awal']) && !empty($_GET['akhir'])) {
					$awal = $_GET['awal'];
					$akhir = $_GET['akhir'];

					if ($awal == $akhir) {
						$spp = mysqli_query($conn, "SELECT siswa.*,pembayaran.*,kelas.* FROM siswa,pembayaran,kelas WHERE pembayaran.id_siswa = siswa.id_siswa AND tglbayar='$awal' order by nama ASC");
					} else {
						$spp = mysqli_query($conn, "SELECT siswa.*,pembayaran.*,kelas.* FROM siswa,pembayaran,kelas WHERE pembayaran.id_siswa = siswa.id_siswa AND tglbayar BETWEEN '$awal' AND '$akhir' order by nama ASC");
					}

					// $spp = mysqli_query($conn, "SELECT siswa.*,pembayaran.*,kelas.* FROM siswa,pembayaran,kelas WHERE pembayaran.id_siswa = siswa.id_siswa AND tglbayar BETWEEN '$awal' AND '$akhir' order by nobayar");
					$i = 1;
					$total = 0;
					while ($dta = mysqli_fetch_assoc($spp)) :
				?>
						<tr>
							<td align="center"><?= $i++ ?></td>
							<td align="center"><?= $dta['nis'] ?></td>
							<td align="center"><?= $dta['nama'] ?></td>
							<td align=""><?= $dta['nama_kelas'] ?></td>
							<td align=""><?= $dta['nobayar'] ?></td>
							<td align=""><?= $dta['bulan'] ?></td>
							<td align="right"><?= format_rupiah($dta['jumlah']) ?></td>
							<td align="center"><?= $dta['ket'] ?></td>
						</tr>

						<?php $total += $dta['jumlah']; ?>

					<?php endwhile; ?>

					<?php } else if ((isset($_POST['awal']) && $_POST['awal'] != '') && ((isset($_POST['akhir']) && $_POST['akhir'] != ''))) {
					$awal = $_POST['awal'];
					$akhir = $_POST['akhir'];

					$spp = mysqli_query($conn, "SELECT siswa.*,pembayaran.*,kelas.* FROM siswa,pembayaran,kelas WHERE pembayaran.id_siswa = siswa.id_siswa AND tglbayar BETWEEN '$awal' AND '$akhir' order by nobayar");
					$i = 1;
					$total = 0;
					while ($dta = mysqli_fetch_assoc($spp)) : ?>

						<tr>
							<td align="center"><?= $i++ ?></td>
							<td align="center"><?= $dta['id_siswa'] ?></td>
							<td align="center"><?= $dta['nama'] ?></td>
							<td align=""><?= $dta['nama_kelas'] ?></td>
							<td align=""><?= $dta['nobayar'] ?></td>
							<td align=""><?= $dta['bulan'] ?></td>
							<td align="right"><?= format_rupiah($dta['jumlah']) ?></td>
							<td align="center"><?= $dta['ket'] ?></td>
						</tr>

						<?php $total += $dta['jumlah']; ?>

				<?php endwhile;
				} ?>
			</tbody>


			<tr>
				<td colspan="7" align="right"><b>TOTAL</b></td>
				<td align="center">
					<b>
						<?= format_rupiah($total); ?>
						<!-- ?php if (!$total) {
							format_rupiah($total);
						} ?> -->
					</b>
				</td>
			</tr>

			<table width="100%" class="mt-8">
				<tr>
					<td></td>
					<td width="200px">
						<br>
						<p>Tangerang, <?= date('d/m/y') ?><br>Operator,
							<br><br>
						<p>__________________________</p>
					</td>
				</tr>
			</table>
			<tfoot>
				<!-- <div class="container" style="text-align: right">
					<div class="row">
						<div class="col-xs-12">
							<div class="invoice-title">
								<h2>Invoice</h2>
								<h3 class="pull-right">Order # 12345</h3>
							</div>
							<hr>
							<div class="row">
								<div class="col-xs-6">
									<address>
										<strong>Billed To:</strong><br>
										John Smith<br>
										1234 Main<br>
										Apt. 4B<br>
										Springfield, ST 54321
									</address>
								</div>
								<div class="col-xs-6 text-right">
									<address>
										<strong>Shipped To:</strong><br>
										Jane Smith<br>
										1234 Main<br>
										Apt. 4B<br>
										Springfield, ST 54321
									</address>
								</div>
							</div>
						</div>
					</div>
				</div> -->
			</tfoot>





		</table>
	</body>




	</html>


<?php
} else {
	header("location : login.php");
}
?>