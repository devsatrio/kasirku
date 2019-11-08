<?php 
include 'koneksi.php';
$id = $_GET['kode'];

$query = mysqli_query($koneksi,"delete from detail_pembelian where id='$id'");
?>