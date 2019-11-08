<?php
error_reporting(0);	
session_start();

include 'koneksi.php';
$kode 	= $_POST['kode'];
$subtotal = $_POST['subtotal'];
$potongan 	= $_POST['potongan'];
$total = $_POST['total'];
$dibayar 	= $_POST['dibayar'];
$kembali 	= $_POST['kembali'];

$query = mysqli_query($koneksi,"select * from pembelian where kode='$kode'");
$cek = mysqli_num_rows($query);

if($cek>0){
	$insertdetail = mysqli_query($koneksi,"update pembelian set subtotal='$subtotal', potongan='$potongan', total='$total', dibayar='$dibayar', kembali='$kembali' where kode='$kode'");
}else{
	$insert = mysqli_query($koneksi,"insert into pembelian (kode,subtotal,potongan,total,dibayar,kembali) values ('$kode','$subtotal','$potongan','$total','$dibayar','$kembali')");
}

?>