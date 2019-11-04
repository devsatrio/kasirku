<?php
error_reporting(0); 
session_start();
include '../php/koneksi.php';
if($_SESSION['username']==''){
  echo "<script>window.alert('Maaf, Anda Harus Login'); window.location=('../index.php')</script>";
} 
include 'layout/h_transaksi.php';
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
          <table class="table table-bordered data-table">
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



    <div id="content">
      <div id="content-header">
        <div id="breadcrumb">
       
      </div>
        <h1>Transaksi</h1>
      </div>
      
      <div class="container-fluid">
        <div class="row-fluid">
          <div class="span6">
            <div class="loading-div" id="panelnya">
            <div class="widget-box">
              <div class="widget-title">
                <span class="icon">
                  <i class="icon-pencil"></i>
                </span>
                <h5>Tambah Transaksi</h5>
              </div>
              <div class="widget-content">
                
              <div class="form-horizontal">
                <div class="control-group">
                <label class="control-label">Kode Transaksi :</label>
                <div class="controls">
                  <input type="text" class="span11" id="kode" readonly>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Cari Barang</label>
                <div class="controls">
                  <select id="cari_barang">
                    <option value="">asdf</option>
                  </select>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Jumlah :</label>
                <div class="controls">
                  <input type="number" min="0" class="span11">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Harga :</label>
                <div class="controls">
                  <input type="text" class="span11" readonly>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Subtotal :</label>
                <div class="controls">
                  <input type="text" class="span11" readonly>
                </div>
              </div>
              <div class="form-actions">
                <button type="button" id="tambahdetail" class="btn btn-success">Tambah</button>
                <button type="button" class="btn btn-danger">Reset</button>
              </div>
            </div>
              </div>
            </div>
            </div>
          </div>
          <div class="span6">
            <div class="widget-box">
              <div class="widget-title">
                <span class="icon">
                  <i class="icon-th-list"></i>
                </span>
                <h5>List Pembelian</h5>
              </div>
              <div class="widget-content nopadding">
               <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Rendering engine</th>
                  <th>Browser</th>
                  <th>Platform(s)</th>
                  <th>Engine version</th>
                  <th>CSS grade</th>
                </tr>
              </thead>
              <tbody>
                <tr class="odd gradeX">
                  <td>Trident</td>
                  <td>Internet
                    Explorer 4.0</td>
                  <td>Win 95+</td>
                  <td class="center"> 4</td>
                  <td class="center">X</td>
                </tr>
                <tr class="even gradeC">
                  <td>Trident</td>
                  <td>Internet
                    Explorer 5.0</td>
                  <td>Win 95+</td>
                  <td class="center">5</td>
                  <td class="center">C</td>
                </tr>
                <tr class="odd gradeA">
                  <td>Trident</td>
                  <td>Internet
                    Explorer 5.5</td>
                  <td>Win 95+</td>
                  <td class="center">5.5</td>
                  <td class="center">A</td>
                </tr>
                <tr class="even gradeA">
                  <td>Trident</td>
                  <td>Internet
                    Explorer 6</td>
                  <td>Win 98+</td>
                  <td class="center">6</td>
                  <td class="center">A</td>
                </tr>
              </tbody>
            </table> 
              </div>
            </div>
            <div class="widget-box">
              <div class="widget-title"><span class="icon"><i class="icon-bookmark"></i></span><h5>Aksi</h5></div>
              <div class="widget-content">
                  <p>
                    <button class="btn btn-primary btn-large">Simpan & Cetak</button>
                  </p>
                                   
                                  
              </div>
            </div>
          </div>
        </div>
         
      </div>
    </div>
<?php 
  include'layout/f_transaksi.php';
?>         