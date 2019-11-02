<?php
error_reporting(0);	
session_start();

include 'koneksi.php';
$kode 	= $_POST['kode'];
$nama 	= $_POST['nama'];
$harga 	= $_POST['harga'];

$query = mysqli_query($koneksi,"update barang set nama_barang='$nama', harga='$harga' where id='$kode'");
echo "<script>window.alert('Data Berhasil Disimpan'); window.location=('../view/data_barang.php')</script>";


?>