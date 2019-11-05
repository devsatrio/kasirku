<?php
error_reporting(1);	
session_start();
include 'koneksi.php';
$result = array();
if($_GET['q']){
	$barang = $_GET['q'];
	$query = mysqli_query($koneksi,"select * from barang where nama_barang like '%$barang%' limit 0,1");
	while($row=$query->fetch_assoc()) { 
    $result[]=$row;
	}
	echo json_encode($result);
}
?>