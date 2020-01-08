<?php
   // Tergantung penempatan
   $file_location = "/var/www/html/warehouse_sai/data/admin";

?>

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
   <!-- Brand Logo -->
   <a href="index3.html" class="brand-link">
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

   <!-- Sidebar Menu -->
   <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
         
         <li class="nav-header">MENU</li>
         <li class="nav-item">
         <a href="./" class="nav-link <?=$status_nav?>">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard</p>
         </a>
         </li>
         <li class="nav-item has-treeview <?= $_GET['type'] == 'harian' || $_GET['type'] == 'bulanan' ? 'menu-open' : '' ?>">
            <a href="#"class="nav-link <?= $_GET['type'] == 'harian' || $_GET['type'] == 'bulanan' ? 'active' : '' ?>">
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
                  <a href="losstime.php?type=bulanan" class="nav-link <?= $_GET['type'] == 'bulanan' ? 'active' : '' ?>">
                  <i class="far fa-calendar-alt nav-icon"></i>
                  <p>Bulanan</p>
                  </a>
               </li>
            </ul>
         </li>
         <li class="nav-item has-treeview">
         <a href="#" class="nav-link">
            <i class="nav-icon fas fa-circle"></i>
            <p>
               Level 1
               <i class="right fas fa-angle-left"></i>
            </p>
         </a>
         <ul class="nav nav-treeview">
            <li class="nav-item">
               <a href="#" class="nav-link">
               <i class="far fa-circle nav-icon"></i>
               <p>Level 2</p>
               </a>
            </li>
            <li class="nav-item has-treeview">
               <a href="#" class="nav-link">
               <i class="far fa-circle nav-icon"></i>
               <p>
                  Level 2
                  <i class="right fas fa-angle-left"></i>
               </p>
               </a>
               <ul class="nav nav-treeview">
               <li class="nav-item">
                  <a href="#" class="nav-link">
                     <i class="far fa-dot-circle nav-icon"></i>
                     <p>Level 3</p>
                  </a>
               </li>
               <li class="nav-item">
                  <a href="#" class="nav-link">
                     <i class="far fa-dot-circle nav-icon"></i>
                     <p>Level 3</p>
                  </a>
               </li>
               <li class="nav-item">
                  <a href="#" class="nav-link">
                     <i class="far fa-dot-circle nav-icon"></i>
                     <p>Level 3</p>
                  </a>
               </li>
               </ul>
            </li>
            <li class="nav-item">
               <a href="#" class="nav-link">
               <i class="far fa-circle nav-icon"></i>
               <p>Level 2</p>
               </a>
            </li>
         </ul>
         </li>
         <li class="nav-item">
         <a href="#" class="nav-link">
            <i class="fas fa-circle nav-icon"></i>
            <p>Level 1</p>
         </a>
         </li>
      </ul>
   </nav>
   <!-- /.sidebar-menu -->
   </div>
   <!-- /.sidebar -->
</aside>