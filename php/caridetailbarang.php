<?php
error_reporting(1);	
session_start();
include 'koneksi.php';
$result = array();
if($_GET['kode']){
	$kode = $_GET['kode'];
	$query = mysqli_query($koneksi,"select * from barang where id='$kode'");
	while($row=$query->fetch_assoc()) { 
    $result[]=$row;
	}
	echo json_encode($result);
}
?>