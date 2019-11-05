<?php
error_reporting(0);
session_start();
include '../php/koneksi.php';
if($_SESSION['username']==''){
echo "<script>window.alert('Maaf, Anda Harus Login'); window.location=('../index.php')</script>";
}
include 'layout/h_tabel.php';
include 'layout/n.php';
?>
<div class="container-fluid">
  <h1 class="h3 mb-4 text-gray-800">Data Barang</h1>
  <div class="row">
    <div class="col-lg-8">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">
          List Data Barang
          </h6>
        </div>
        <div class="card-body">
          <table class="table table-bordered data-table" id="dataTable">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Harga</th>
                <th class="text-center">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $i =1;
              $query = mysqli_query($koneksi,"select * from barang order by id desc");
              while($row=mysqli_fetch_assoc($query)) { ?>
              <tr class="gradeX">
                <td style="text-align: center;">
                  <?php echo $i++;?>
                </td>
                <td style="text-align: center;">
                  <?php echo $row['nama_barang'];?>
                </td>
                <td style="text-align: center;">
                  <?php echo "Rp. ".number_format($row['harga'],0,',','.'); ?>
                </td>
                <td style="text-align: center;">
                  <a href="#modaledit<?php echo $row[id];?>" data-toggle="modal" class="btn btn-mini btn-primary">edit</a>
                  <a href="../php/aksi_hapus_barang.php?id=<?php echo $row[id];?>" class="btn btn-mini btn-danger" onclick="return confirm('Hapus data ?')">hapus
                  </a>
                </td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="col-lg-4">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Tambah Data</h6>
        </div>
        <div class="card-body">
          <form action="../php/aksi_tambah_barang.php" method="post">
            <div class="form-group">
                  <label for="email">Nama Barang</label>
                  <input type="text" class="form-control" name="nama" required>
                </div>
                <div class="form-group">
                  <label for="email">Harga Barang</label>
                  <input type="number" min="0" class="form-control" name="harga" required>
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
$query2 = mysqli_query($koneksi,"select * from barang order by id desc");
while($row2=mysqli_fetch_assoc($query2)) { ?>
<div class="modal fade" id="modaledit<?php echo $row2['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
        
      </div>
      <div class="modal-body">
        <form action="../php/aksi_edit_barang.php" method="post">
            <div class="form-group">
                  <label for="email">Nama Barang</label>
                  <input type="text" class="form-control" name="nama" value="<?php echo $row2['nama_barang']?>" required>
                  <input type="hidden" name="kode" value="<?php echo $row2['id']?>" required>
                </div>
                <div class="form-group">
                  <label for="email">Harga Barang</label>
                  <input type="number" min="0" class="form-control" name="harga" required value="<?php echo $row2['harga']?>">
                </div>
            <div class="form-actions text-center">
              <button type="submit" class="btn btn-success btn-large">Simpan</button>
              <button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-danger btn-large">Close</button>
            </div>
          </form>
      </div>
    </div>
  </div>
</div>
<?php } ?>
<?php
include'layout/f_tabel.php';
?>