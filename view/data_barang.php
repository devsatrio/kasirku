<?php
error_reporting(0); 
session_start();
include '../php/koneksi.php';
if($_SESSION['username']==''){
  echo "<script>window.alert('Maaf, Anda Harus Login'); window.location=('../index.php')</script>";
} 
include 'layout/h.php';
?>
    <div id="content">
      <div id="content-header">
        <div id="breadcrumb">
       
      </div>
        <h1>Data Barang</h1>
      </div>
      
      <div class="container-fluid">
        <div class="row-fluid">
          <div class="span8">
            <div class="widget-box">
              <div class="widget-title">
                <span class="icon">
                  <i class="icon-th-list"></i>
                </span>
                <h5>List Data Barang</h5>
              </div>
              <div class="widget-content nopadding">
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
          <div class="span4">
            <div class="widget-box">
              <div class="widget-title">
                <span class="icon">
                  <i class="icon-pencil"></i>
                </span>
                <h5>Tambah Data Barang</h5>
              </div>
              <div class="widget-content">
                <form action="../php/aksi_tambah_barang.php" method="post" class="form-vertical">
                  <div class="control-group">
                    <label class="control-label">Nama Barang :</label>
                    <div class="controls">
                      <input type="text" name="nama" class="span12" required/>
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">Harga Barang :</label>
                    <div class="controls">
                      <input type="number" min="0" name="harga" class="span12" required/>
                    </div>
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
      <div id="modaledit<?php echo $row2['id'];?>" class="modal hide">
              <div class="modal-header">
                <button data-dismiss="modal" class="close" type="button">×</button>
                <h3>Edit Data Barang</h3>
              </div>
              <div class="modal-body">
                <div class="row-fluid">
                <div class="span12">
                <form action="../php/aksi_edit_barang.php" method="post" style="max-width: 100%;">
                  <div class="control-group">
                    <label class="control-label">Nama Barang :</label>
                    <div class="controls">
                      <input type="text" name="nama" value="<?php echo $row2['nama_barang'];?>" class="span12" required/>
                      <input type="hidden" name="kode" value="<?php echo $row2['id'];?>"/>
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">Harga Barang :</label>
                    <div class="controls">
                      <input type="number" name="harga" min="0" value="<?php echo $row2['harga'];?>" class="span12" required/>
                    </div>
                  </div>
                  <div class="form-actions text-center">
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <button type="button" data-dismiss="modal" class="btn btn-danger">Close</button>
                  </div>
                </form>
              </div>
            </div>
              </div>
            </div>
        <?php } ?>
    </div>
<?php 
  include'layout/f.php';
?>         