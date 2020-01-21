<?php
   // Tergantung penempatan
   $file_location = "/var/www/html/warehouse_sai/data/admin";

?>

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
   <!-- Brand Logo -->
   <a href="./" class="brand-link">
      <img src="../../dist/img/logo/logo-yazaki.png" alt="AdminLTE Logo" width="100%"
            style="opacity: .8;">
      <!-- <span class="brand-text font-weight-light">WAREHOUSE</span> -->
   </a>

   <!-- Sidebar -->
   <div class="sidebar">
   <!-- Sidebar user panel (optional) -->
   <div class="user-panel mt-3 pb-3 mb-3 d-flex" style="width: 100%;">
      <div class="image">
         <i class="fas fa-user-circle text-white" style="font-size: 55px"></i>
      </div>
      <div class="info" >
         <a href="#" class="d-block text-white" style="width: 100%; font-size: 15px">
            <b>
               <?php 
               // Jika jumlah dari nama lebih dari 20 karakter
               if (strlen($_SESSION['nama']) > 16) {
                  $potong = substr($_SESSION['nama'], 0, 16) .'...'; // ditambahkan titik2 untuk efisiensi 
                  
                  echo $potong;
               
               } else { // jika kurang maka yang ditampilkan adalah nama full
                  echo $_SESSION['nama']; 
               }
               ?> 
            </b>
         </a>
         <small class="text-white"><?= $_SESSION['id_karyawan'] ?></small>
      </div>
   </div>
   <!-- Sidebar Menu -->
   <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column user-panel" data-widget="treeview" role="menu" data-accordion="false">
         
         <li class="nav-header">MENU</li>
         <li class="nav-item">
            <a href="./" class="nav-link <?=$status_nav_dashboard?>">
               <i class="nav-icon fas fa-tachometer-alt"></i>
               <p>Dashboard</p>
            </a>
         </li>
         <li class="nav-item has-treeview <?= $_GET['type'] == 'harian' || $_GET['type'] == 'bulanan' || $_GET['type'] == 'detail' ? 'menu-open' : '' ?>">
            <a href="#"class="nav-link <?= $_GET['type'] == 'harian' || $_GET['type'] == 'bulanan' || $_GET['type'] == 'detail' ? 'active' : '' ?>">
            <i class="nav-icon fas fa-percent"></i>
               <p>
                  Summary
                  <i class="right fas fa-angle-left"></i>
               </p>
            </a>
            <ul class="nav nav-treeview">
               <li class="nav-item">
                  <a href="losstime.php?type=harian" class="nav-link <?= $_GET['type'] == 'harian' ? 'active' : '' ?>">
                  <i class="fas fa-calendar-day nav-icon"></i>
                  <p>Harian</p>
                  </a>
               </li>
               <li class="nav-item">
                  <a href="losstime.php?type=bulanan" class="nav-link <?= $_GET['type'] == 'bulanan' || $_GET['type'] == 'detail' ? 'active' : '' ?>">
                  <i class="far fa-calendar-alt nav-icon"></i>
                  <p>Bulanan</p>
                  </a>
               </li>
            </ul>
         </li>
         <li class="nav-item">
            <a href="./pengguna.php" class="nav-link <?=$status_nav_pengguna?>">
               <i class="nav-icon fas fa-users"></i>
               <p>Pengguna</p>
            </a>
         </li>
      </ul>
      <div class="user-panel mt-3 pb-3 mb-3 ">
      <ul class="nav nav-pills nav-sidebar flex-column">
         <li class="nav-header">INPUT DATA LOSS TIME</li>
         <li class="nav-item">
            <a href="./input_losstime.php" class="nav-link <?=$status_nav_input?>">
               <i class="nav-icon fas fa-folder-plus"></i>
               <p>Input Loss Time</p>
            </a>
         </li>
      </ul>
   </div>
   <div class="user-panel mt-3 pb-3 mb-3 ">
      <ul class="nav nav-pills nav-sidebar flex-column">
         <li class="nav-header">INPUT DATA</li>
         <li class="nav-item">
            <!-- Sementara menggunakan input type running text -->
            <a href="./input_data.php?type=running-text" class="nav-link <?=$_GET['type'] == 'running-text' ? 'active' : '' ?>">
               <i class="nav-icon fas fa-text-width"></i>
               <p>Input Running Text</p>
            </a>
         </li>
      </ul>
   </div>
   </nav>
   <!-- /.sidebar-menu -->
   </div>
   <!-- /.sidebar -->
</aside>