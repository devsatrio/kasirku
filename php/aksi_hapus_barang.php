<?php 
include 'koneksi.php';
$id = $_GET['id'];

$query = mysqli_query($koneksi,"delete from barang where id='$id'");
echo "<script>window.alert('Data Berhasil Dihapus'); window.location=('../view/data_barang.php')</script>";
?>