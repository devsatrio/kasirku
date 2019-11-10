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
	<div class="row">
		<!-- Earnings (Monthly) Card Example -->
		<div class="col-xl-4 col-md-4 mb-4">
			<div class="card border-left-primary shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Pengguna</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800">
								<?php $datapengguna = mysqli_query($koneksi,"select * from user");
								echo mysqli_num_rows($datapengguna);?>
							</div>
						</div>
						<div class="col-auto">
							<i class="fas fa-users fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Earnings (Monthly) Card Example -->
		<div class="col-xl-4 col-md-4 mb-4">
			<div class="card border-left-success shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-success text-uppercase mb-1">Jumlah Barang</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?php $databarang = mysqli_query($koneksi,"select * from barang");
								echo mysqli_num_rows($databarang);?></div>
						</div>
						<div class="col-auto">
							<i class="fas fa-th-large fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Earnings (Monthly) Card Example -->
		<div class="col-xl-4 col-md-4 mb-4">
			<div class="card border-left-info shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jumlah transaksi</div>
							<div class="row no-gutters align-items-center">
								<div class="col-auto">
									<div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php $datatransaksi = mysqli_query($koneksi,"select * from pembelian");
								echo mysqli_num_rows($datatransaksi);?></div>
								</div>
							</div>
						</div>
						<div class="col-auto">
							<i class="fas fa-list-alt fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl-12 col-md-12 mb-12">
			<div class="card shadow mb-12">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-primary">Statistik Mingguan</h6>
				</div>
				<div class="card-body">
					<div class="chart-bar">
						<canvas id="myBarChart"></canvas>
					</div>
				</div>
			</div>
			<br><br>
		</div>
	</div>
</div>
<?php
include'layout/f_dashboard.php';
?>