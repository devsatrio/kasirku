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
        <h1>Dashboard</h1>
      </div>
      
      <div class="container-fluid">
       <!--  <div class="row-fluid">
          <div class="span12">
            <div class="widget-box">
              <div class="widget-title">
                <span class="icon">
                  <i class="icon-th-list"></i>
                </span>
                <h5>Full Width <code>class=Span12</code></h5>
              </div>
              <div class="widget-content">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
              </div>
            </div>
          </div>
        </div> -->
         
      </div>
    </div>
<?php 
  include'layout/f.php';
?>         