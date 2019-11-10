<?php
error_reporting(0);
session_start();
include '../php/koneksi.php';
if($_SESSION['username']==''){
echo "<script>window.alert('Maaf, Anda Harus Login'); window.location=('../index.php')</script>";
}else{
  if ($_SESSION['level']=='Admin') {
   echo "<script>window.alert('Maaf, Anda Tidak Punya Akses'); window.location=('../index.php')</script>";
  }
}
include 'layout/h_tabel.php';
include 'layout/n.php';
?>
<div class="container-fluid">
  <h1 class="h3 mb-4 text-gray-800">Laporan Detail Transaksi</h1>
  <div class="row">
    <?php
    if($_POST['tgldua'] && $_POST['tglsatu']){
    ?>
    <div class="col-lg-12">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">
          List Data Detail Transaksi Tanggal <?php echo $_POST['tglsatu'];?> Sampai Tanggal <?php echo $_POST['tgldua'];?>
          </h6>
        </div>
        <div class="card-body">
          <table class="table table-bordered data-table" id="dataTable">
            <thead>
              <tr>
                <th class="text-center">No</th>
                <th class="text-center">Tgl</th>
                <th class="text-center">Kode</th>
                <th class="text-center">Barang</th>
                <th class="text-center">Jumlah</th>
                <th class="text-center">Harga</th>
                <th class="text-center">Subtotal</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $i =1;
              $tglsatu = $_POST['tglsatu'];
              $tgldua = $_POST['tgldua'];
              $query = mysqli_query($koneksi,"SELECT detail_pembelian.*,pembelian.tgl FROM detail_pembelian LEFT JOIN pembelian ON pembelian.kode=detail_pembelian.kode_pembelian WHERE pembelian.tgl between '$tglsatu' and '$tgldua' order by id desc");
              while($row=mysqli_fetch_assoc($query)) { ?>
              <tr class="gradeX">
                <td style="text-align: center;">
                  <?php echo $i++;?>
                </td>
                <td style="text-align: center;">
                  <?php echo $row['kode_pembelian'];?>
                </td>
                <td style="text-align: center;">
                  <?php echo $row['tgl'];?>
                </td>
                <td style="text-align: center;">
                  <?php echo $row['barang'];?>
                </td>
                <td style="text-align: center;">
                  <?php echo $row['jumlah'];?>
                </td>
                <td class="text-right">
                  <?php echo "Rp. ".number_format($row['harga'],0,',','.'); ?>
                </td>
                <td class="text-right">
                  <?php echo "Rp. ".number_format($row['subtotal'],0,',','.'); ?>
                </td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  <?php }else{} ?>
  </div>
</div>

<?php
include'layout/f_tabel.php';
?>