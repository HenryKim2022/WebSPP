<?php 

$conn = mysqli_connect('localhost','root','','webspp');
if(!$conn) {
	throw new Exception("Database gagal terkoneksi", 1);
	
}


 ?>