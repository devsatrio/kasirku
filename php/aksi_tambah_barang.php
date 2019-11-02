<?php
error_reporting(0);	
session_start();

include 'koneksi.php';
$nama 	= $_POST['nama'];
$harga 	= $_POST['harga'];
$query = mysqli_query($koneksi,"insert into barang (nama_barang,harga) values ('$nama','$harga')");
echo "<script>window.alert('Data Berhasil Disimpan'); window.location=('../view/data_barang.php')</script>";

?>