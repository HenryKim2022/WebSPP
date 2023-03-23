<?php 
function format_rupiah($rp) {
	$jumlah = number_format($rp, 0 ,",",".");
	$rupiah = "Rp".$jumlah;
	return $rupiah;

}




 ?>