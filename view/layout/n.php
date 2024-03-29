<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion toggled" id="accordionSidebar">
      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Kasirku <sup>1.0</sup></div>
      </a>
      <!-- Divider -->
      <hr class="sidebar-divider my-0">
      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
        </li>
        <?php if($_SESSION['level']!='Admin'){?>
        <li class="nav-item">
          <a class="nav-link" href="data_user.php">
            <i class="fas fa-fw fa-users"></i>
            <span>User</span></a>
          </li>
          <?php } ?>
          <li class="nav-item">
            <a class="nav-link" href="data_barang.php">
              <i class="fas fa-fw fa-th-large"></i>
              <span>Barang</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="transaksi.php">
                <i class="fas fa-fw fa-shopping-cart"></i>
                <span>Transaksi</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="list_transaksi.php">
                  <i class="fas fa-fw fa-list-alt"></i>
                  <span>List Transaksi</span></a>
                </li>
                <?php if($_SESSION['level']!='Admin'){?>
                <li class="nav-item">
                  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-file"></i>
                    <span>Laporan</span>
                  </a>
                  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                      <h6 class="collapse-header">Jenis Laporan:</h6>
                      <a class="collapse-item" href="laporan_transaksi.php">Transaksi</a>
                      <a class="collapse-item" href="laporan_detailtransaksi.php">Detail Transaksi</a>
                    </div>
                  </div>
                </li>
              <?php } ?>
                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">
                <!-- Sidebar Toggler (Sidebar) -->
                <!-- <div class="text-center d-none d-md-inline">
                  <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div> -->
              </ul>
              <!-- End of Sidebar -->
              <!-- Content Wrapper -->
              <div id="content-wrapper" class="d-flex flex-column">
                <!-- Main Content -->
                <div id="content">
                  <!-- Topbar -->
                  <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                    </button>
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                      <div class="topbar-divider d-none d-sm-block"></div>
                      <!-- Nav Item - User Information -->
                      <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['username'];?></span>
                          <img class="img-profile rounded-circle" src="../assets/img/user.png">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                          
                          <a class="dropdown-item" href="../php/aksi_logout.php">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                          </a>
                        </div>
                      </li>
                    </ul>
                  </nav>
                  <!-- End of Topbar -->