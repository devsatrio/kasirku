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
        <h1>Transaksi</h1>
      </div>
      
      <div class="container-fluid">
        <div class="row-fluid">
          <div class="span6">
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
                  <input type="text" class="span11" readonly>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Cari Barang :</label>
                <div class="controls">
                  <input type="text" class="span11">
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