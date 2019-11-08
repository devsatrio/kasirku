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
  <h1 class="h3 mb-4 text-gray-800">Laporan Transaksi</h1>
  <div class="row">
    <?php
    if($_POST['tgldua'] && $_POST['tglsatu']){
    ?>
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
              </tr>
            </thead>
            <tbody>
              <?php
              $i =1;
              $tglsatu = $_POST['tglsatu'];
              $tgldua = $_POST['tgldua'];
              $query = mysqli_query($koneksi,"select pembelian.*,user.username from pembelian left join user on user.id = pembelian.id_user where tgl between '$tglsatu' and '$tgldua' order by id desc");
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