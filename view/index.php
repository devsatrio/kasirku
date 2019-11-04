<?php
error_reporting(0);
session_start();
include '../php/koneksi.php';
if($_SESSION['username']==''){
echo "<script>window.alert('Maaf, Anda Harus Login'); window.location=('../index.php')</script>";
}
include 'layout/h.php';
include 'layout/n.php';
?>
<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800">Dashboard</h1>
</div>

<?php
include'layout/f.php';
?>