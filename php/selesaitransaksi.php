<?php
error_reporting(0);	
session_start();

include 'koneksi.php';
$kode 	= $_POST['kode'];
$user = $_SESSION['id'];
$tgl = date('Y-m-d');
$query = mysqli_query($koneksi,"select * from pembelian where kode='$kode'");
$cek = mysqli_num_rows($query);

if($cek>0){
	$insertdetail = mysqli_query($koneksi,"update pembelian set status='Y', id_user='$user', tgl='$tgl' where kode='$kode'");
}

?>