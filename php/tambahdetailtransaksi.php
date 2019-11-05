<?php
error_reporting(0);	
session_start();

include 'koneksi.php';
$kode 	= $_POST['kode'];
$namabarang = $_POST['namabarang'];
$hargabarang 	= $_POST['harga'];
$jumlah = $_POST['jumlah'];
$subtotal 	= $_POST['subtotal'];

$query = mysqli_query($koneksi,"select * from pembelian where kode='$kode'");
$cek = mysqli_num_rows($query);

if($cek>0){
	$insertdetail = mysqli_query($koneksi,"insert into detail_pembelian (kode_pembelian,barang,jumlah,harga,subtotal) values ('$kode','$namabarang','$jumlah','$hargabarang','$subtotal')");
}else{
	$insert = mysqli_query($koneksi,"insert into pembelian (kode) values ('$kode')");
	$insertdetail = mysqli_query($koneksi,"insert into detail_pembelian (kode_pembelian,barang,jumlah,harga,subtotal) values ('$kode','$namabarang','$jumlah','$hargabarang','$subtotal')");
}

?>