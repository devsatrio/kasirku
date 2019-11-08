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
<div class="container-fluid">
	<h1 class="h3 mb-4 text-gray-800">Laporan Transaksi</h1>
	<div class="row">
		<div class="col-lg-12">
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-primary">Pilih Data</h6>
				</div>
				<div class="card-body">
					<form action="tampil_laporan_transaksi.php" method="post">
						<div class="form-group">
							<label for="email">Tanggal Mulai</label>
							<input type="date" class="form-control" name="tglsatu" required>
						</div>
						<div class="form-group">
							<label for="email">Sampai Tanggal</label>
							<input type="date" class="form-control" name="tgldua" required>
						</div>
						<div class="form-actions text-center">
							<button type="submit" class="btn btn-success btn-large">Simpan</button>
							<button type="reset" class="btn btn-danger btn-large">Reset</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
include'layout/f.php';
?>