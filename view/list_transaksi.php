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
  <h1 class="h3 mb-4 text-gray-800">Data Transaksi</h1>
  <div class="row">
    <div class="col-lg-12">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">
          List Data Transaksi
          </h6>
        </div>
        <div class="card-body">
          <table class="table table-bordered data-table" id="dataTable">
            <thead>
              <tr>
                <th class="text-center">No</th>
                <th class="text-center">Kode</th>
                <th class="text-center">Pembuat</th>
                <th class="text-center">Tgl</th>
                <th class="text-center">Subtotal</th>
                <th class="text-center">Potongan</th>
                <th class="text-center">Total</th>
                <th class="text-center">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $i =1;
              $query = mysqli_query($koneksi,"select pembelian.*,user.username from pembelian left join user on pembelian.id_user = user.id order by id desc");
              while($row=mysqli_fetch_assoc($query)) { ?>
              <tr class="gradeX">
                <td style="text-align: center;">
                  <?php echo $i++;?>
                </td>
                <td style="text-align: center;">
                  <?php echo $row['kode'];?>
                </td>
                <td style="text-align: center;">
                  <?php echo $row['username'];?>
                </td>
                <td style="text-align: center;">
                  <?php echo $row['tgl'];?>
                </td>
                <td class="text-right">
                  <?php echo "Rp. ".number_format($row['subtotal'],0,',','.'); ?>
                </td>
                <td class="text-right">
                  <?php echo "Rp. ".number_format($row['potongan'],0,',','.'); ?>
                </td>
                <td class="text-right">
                  <?php echo "Rp. ".number_format($row['total'],0,',','.'); ?>
                </td>
                <td style="text-align: center;">
                  <button
                  class="btn btn-sm btn-primary tampildetail"
                  data-kodenota="<?php echo $row['kode']?>"
                  data-tanggal="<?php echo $row['tgl']?>"
                  data-pembuat="<?php echo $row['username']?>"
                  data-subtotal="<?php echo $row['subtotal']?>"
                  data-potongan="<?php echo $row['potongan']?>"
                  data-total="<?php echo $row['total']?>"
                  data-dibayar="<?php echo $row['dibayar']?>"
                  data-kembali="<?php echo $row['kembali']?>"><i class="fa fa-eye"></i></button>
                  <a href="../php/aksi_hapustransaksi.php?id=<?php echo $row[id];?>" class="btn btn-sm btn-danger" onclick="return confirm('Hapus data ?')"><i class="fa fa-trash"></i>
                  </a>
                </td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade bd-example-modal-lg" id="detailmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Transaksi</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <table>
          <tr>
            <td>Kode</td>
            <td>&nbsp;:&nbsp;</td>
            <td id="printkode"></td>
          </tr>
          <tr>
            <td>Tanggal</td>
            <td>&nbsp;:&nbsp;</td>
            <td id="printtgl"></td>
          </tr>
          <tr>
            <td>Pembuat</td>
            <td>&nbsp;:&nbsp;</td>
            <td id="printpembuat"></td>
          </tr>
        </table>
        <table class="table table-bordered data-table">
          <thead>
            <tr>
              <th class="text-center">No</th>
              <th class="text-center">Barang</th>
              <th class="text-center">Harga</th>
              <th class="text-center">Jumlah</th>
              <th class="text-center">Subtotal</th>
            </tr>
          </thead>
          <tbody id="tubuhnya">
          </tbody>
          <tfoot>
          <tr>
            <td colspan="4" class="text-right">Total</td>
            <td id="cetaktotal" class="text-right"></td>
          </tr>
          <tr>
            <td colspan="4" class="text-right">Potongan</td>
            <td id="cetakpotongan" class="text-right"></td>
          </tr>
          <tr>
            <td colspan="4" class="text-right">Total Akhir</td>
            <td id="cetaktotalakhir" class="text-right"></td>
          </tr>
          <tr>
            <td colspan="4" class="text-right">Dibayar</td>
            <td id="cetakdibayar" class="text-right"></td>
          </tr>
          <tr>
            <td colspan="4" class="text-right">Kembalian</td>
            <td id="cetakkembalian" class="text-right"></td>
          </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
</div>
<?php
include'layout/f_datatransaksi.php';
?>