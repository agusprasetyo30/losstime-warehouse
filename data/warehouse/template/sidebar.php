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
         <i class="fas fa-user-circle text-white" style="font-size: 55px;"></i>
      </div>
      <div class="info" >
         <a href="./pengguna.php" class="d-block text-white" style="width: 100%; font-size: 15px">
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
            <div>
               <small class="text-white"><?= $_SESSION['id_karyawan'] ?></small>
            </div>
         </a>
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
         <li class="nav-item has-treeview <?= $_GET['type'] == 'harian' || $_GET['type'] == 'bulanan' || 
            $_GET['type'] == 'detail' || $_GET['type'] == 'edit-losstime-harian' || $_GET['type'] == 'edit-losstime-bulanan' ? 'menu-open' : '' ?>">
            
            <a href="#"class="nav-link <?= $_GET['type'] == 'harian' || $_GET['type'] == 'bulanan' || 
               $_GET['type'] == 'detail' || $_GET['type'] == 'edit-losstime-harian' || $_GET['type'] == 'edit-losstime-bulanan' ? 'active' : '' ?>">
            <i class="nav-icon fas fa-percent"></i>
               <p>
                  Summary
                  <i class="right fas fa-angle-left"></i>
               </p>
            </a>
            <ul class="nav nav-treeview">
               <li class="nav-item">
                  <a href="losstime.php?type=harian" class="nav-link <?= $_GET['type'] == 'harian' || $_GET['type'] == 'edit-losstime-harian' ? 'active' : '' ?>">
                  <i class="fas fa-calendar-day nav-icon"></i>
                  <p>Harian</p>
                  </a>
               </li>
               <li class="nav-item">
                  <a href="losstime.php?type=bulanan" class="nav-link <?= $_GET['type'] == 'bulanan' || $_GET['type'] == 'detail' || $_GET['type'] == 'edit-losstime-bulanan' ? 'active' : '' ?>">
                  <i class="far fa-calendar-alt nav-icon"></i>
                  <p>Bulanan</p>
                  </a>
               </li>
            </ul>
         </li>
         <!-- dicek apakah user miliki akses ADMIN atau OPERATOR -->
         <?php if ($_SESSION['akses'] == "OPERATOR") { ?>
         <!-- OPERATOR -->
         <li class="nav-item">
            <a href="./pengguna.php" class="nav-link <?=$status_nav_pengguna?>">
               <i class="nav-icon fas fa-users"></i>
               <p>Pengguna</p>
            </a>
         </li>
         <!-- OPERATOR -->
         <?php } else { ?>
         <!-- ADMIN -->
         <li class="nav-item has-treeview <?= $_GET['type'] == 'pengguna' || $_GET['type'] == 'man-pengguna' || $_GET['type'] == 'edit-pengguna' ? 'menu-open' : ''  ?>">
            <a href="#" class="nav-link <?= $_GET['type'] == 'pengguna' || $_GET['type'] == 'man-pengguna' || $_GET['type'] == 'edit-pengguna' ? 'active' : ''  ?>">
               <i class="nav-icon fas fa-users"></i>
               <p>
                  Pengguna
                  <i class="right fas fa-angle-left"></i>
               </p>
            </a>
            <ul class="nav nav-treeview">
               <li class="nav-item">
                  <a href="./pengguna.php?type=pengguna" class="nav-link <?= $_GET['type'] == 'pengguna' ? 'active' : '' ?>">
                  <i class="fas fa-user nav-icon"></i>
                  <p>Data Pengguna</p>
                  </a>
               </li>
               <li class="nav-item">
                  <a href="manajemen_pengguna.php?type=man-pengguna" class="nav-link <?= $_GET['type'] == 'man-pengguna' || $_GET['type'] == 'edit-pengguna' ? 'active' : '' ?>">
                  <i class="fas fa-user-check nav-icon"></i>
                  <p>Manajemen Pengguna</p>
                  </a>
               </li>
            </ul>
         </li>
         <!-- ADMIN -->
         <?php } ?>
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
   <!-- dicek apakah user miliki akses ADMIN atau bukan -->
   <?php if ($_SESSION['akses'] == "ADMIN") { ?>
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
   <?php } ?>
   </nav>
   <!-- /.sidebar-menu -->
   </div>
   <!-- /.sidebar -->
</aside>