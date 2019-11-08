<?php 
include 'koneksi.php';
$id = $_GET['id'];

$query = mysqli_query($koneksi,"delete from pembelian where id='$id'");
echo "<script>window.alert('Data Berhasil Dihapus'); window.location=('../view/list_transaksi.php')</script>";
?>