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
  <h1 class="h3 mb-4 text-gray-800">Transaksi</h1>
  <div class="row">
    <div class="col-lg-4">
      <div class="loading-div" id="panelnya">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Detail Transaksi</h6>
          </div>
          <div class="card-body">
            <div class="form-group">
              <label for="email">Kode Transaksi</label>
              <input type="text" class="form-control" id="kode" readonly>
            </div>
            <div class="form-group">
              <label for="email">Cari barang</label>
            <select id="cari_barang" class="form-control"></select>
          </div>
          <div class="form-group">
            <label for="email">Jumlah</label>
            <input type="number" min="0" class="form-control" id="jumlah" onchange="hitungsubtotal()">
            <input type="hidden" id="namabarang">
          </div>
          <div class="form-group">
            <label for="email">Harga Barang</label>
            <input type="number" value="0" min="0" class="form-control" id="hargabarang" readonly>
          </div>
          <div class="form-group">
            <label for="email">Subtotal</label>
            <input type="number" value="0" min="0" class="form-control" id="subtotal" readonly>
          </div>
          <div class="form-actions text-center">
            <button type="button" id="tambahdetail" class="btn btn-success btn-large">Tambah</button>
            <button type="button" id="bersihdetail" class="btn btn-danger btn-large">Reset</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-8">
    
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">
        List Transaksi
        </h6>
      </div>
      <div class="card-body">
        <div class="loading-div" id="paneldatanya">
          <table class="table table-bordered data-table">
            <thead>
              <tr>
                <th class="text-center">#</th>
                <th class="text-center">No</th>
                <th class="text-center">Barang</th>
                <th class="text-center">Jumlah</th>
                <th class="text-center">Harga</th>
                <th class="text-center">Subtotal</th>
              </tr>
            </thead>
            <tbody id="tubuh">
            </tbody>
            <tfoot>
            <tr>
              <td colspan="5" class="text-right">total</td>
              <td class="text-right" id="total">Rp. 0</td>
            </tr>
            <tr>
              <td colspan="5" class="text-right">Potongan</td>
              <td class="text-right" id="potongannya">Rp. 0</td>
            </tr>
            <tr>
              <td colspan="5" class="text-right"><b>Total Akhir</b></td>
              <td class="text-right"><b id="totalakhir">Rp. 0</b></td>
            </tr>
            <tr>
              <td colspan="5" class="text-right"><b>Dibayar</b></td>
              <td class="text-right"><b id="dibayar">Rp. 0</b></td>
            </tr>
            <tr>
              <td colspan="5" class="text-right"><b>Kembalian</b></td>
              <td class="text-right"><b id="kembalian">Rp. 0</b></td>
            </tr>
            </tfoot>
          </table>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="email">Potongan</label>
                <input type="number" value="0" min="0" class="form-control" id="potongan" onchange="hitungtotal()">
                <input type="hidden" id="totalnya">
                <input type="hidden" id="totalakhirnya">
                <input type="hidden" id="kembaliannya">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="email">Dibayar</label>
                <input type="number" min="0" class="form-control" id="dibayarnya" onchange="hitungkembalian()">
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-actions text-center">
                <button type="button" id="simpancetak" class="btn btn-primary btn-large">Simpan & Cetak</button>
                <button type="button" id="selesaitransaksi" class="btn btn-success btn-large">Selesai</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<?php
include'layout/f_transaksi.php';
?>