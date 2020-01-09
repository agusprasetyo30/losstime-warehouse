<?php
   // Tergantung penempatan
   $file_location = "/var/www/html/warehouse_sai/data/admin";

?>

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
   <!-- Brand Logo -->
   <a href="./" class="brand-link">
      <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
      <span class="brand-text font-weight-light">WAREHOUSE</span>
   </a>

   <!-- Sidebar -->
   <div class="sidebar">
   <!-- Sidebar user panel (optional) -->
   <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
         <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
         <a href="#" class="d-block">Administrator</a>
      </div>
   </div>
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

   <!-- Sidebar Menu -->
   <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
         
         <li class="nav-header">MENU</li>
         <li class="nav-item">
            <a href="./" class="nav-link <?=$status_nav_dashboard?>">
               <i class="nav-icon fas fa-tachometer-alt"></i>
               <p>Dashboard</p>
            </a>
         </li>
         <li class="nav-item has-treeview <?= $_GET['type'] == 'harian' || $_GET['type'] == 'bulanan' || $_GET['type'] == 'detail' ? 'menu-open' : '' ?>">
            <a href="#"class="nav-link <?= $_GET['type'] == 'harian' || $_GET['type'] == 'bulanan' || $_GET['type'] == 'detail' ? 'active' : '' ?>">
            <i class="nav-icon fas fa-user-clock"></i>
               <p>
                  Loss Time
                  <i class="right fas fa-angle-left"></i>
               </p>
            </a>
            <ul class="nav nav-treeview">
               <li class="nav-item">
                  <a href="losstime.php?type=harian" class="nav-link <?= $_GET['type'] == 'harian' ? 'active' : '' ?>">
                  <i class="far fa-calendar-check nav-icon"></i>
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
            <a href="./summary.php" class="nav-link <?=$status_nav_summary?>">
               <i class="nav-icon fas fa-percent"></i>
               <p>Summary</p>
            </a>
         </li>
         <li class="nav-item">
            <a href="./pengguna.php" class="nav-link <?=$status_nav_pengguna?>">
               <i class="nav-icon fas fa-users"></i>
               <p>Pengguna</p>
            </a>
         </li>
      </ul>
   </nav>
   <!-- /.sidebar-menu -->
   </div>
   <!-- /.sidebar -->
</aside>