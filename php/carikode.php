<?php
error_reporting(1);	
session_start();
include 'koneksi.php';

$tgl = date('Ymd');
$query = mysqli_query($koneksi,"select max(kode) as oldkode from pembelian where kode like '%$tgl%' limit 0,1");
$jumlah = mysqli_num_rows($query);
if($jumlah > 0){
	while ($row = mysqli_fetch_assoc($query)) {
		$newkode = explode("-", $row['oldkode']);
		$nomer = sprintf("%03s",$newkode[1]+1);
		$final = "P".$tgl."-".$nomer;
		echo json_encode(array($final));
	}
	
}else{
	
	$nomer = sprintf("%03s",1);
	$final = "P".$tgl."-".$nomer;
	echo json_encode(array($final));
}
?>