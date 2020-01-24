<?php
   session_start();
   include "../../class/dataDB.php";

   $data = new dataDB();

   if (!isset($_SESSION['id'])) {
      echo '
         <script>
         window.location.href = "../../login.php";
         </script>
      ';
   }
?>
<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title><?=$title?> | Warehouse PT. SAI</title>
   <!-- Tell the browser to be responsive to screen width -->
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="icon" href="../../dist/img/logo/logo-title.png">
   <!-- Font Awesome -->
   <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
   <!-- Select2 -->
   <link rel="stylesheet" href="../../plugins/select2/css/select2.min.css">
   <!-- Theme style -->
   <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
   <!-- overlayScrollbars -->
   <link rel="stylesheet" href="../../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
   <!-- Sweetalert2 -->
   <link rel="stylesheet" href="../../plugins/sweetalert2/sweetalert2.min.css">
   <!-- Custom CSS -->
   <link rel="stylesheet" href="../../dist/css/app.css">

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

   <!-- Navbar -->
   <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav" style="width: 100%">
      <li class="nav-item">
         <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item" style="width: 100%;">
         <div class="dashboard-nav-link">WAREHOUSE SECTION PT. SURABAYA AUTOCOMP INDONESIA</div>
      </li>
      <li class="nav-item" style="text-align: right; width: 100%">
         <form action="" method="post">
            <a href="../../" class="btn btn-primary" target="_blank">
               <i class="fas fa-chart-bar mr-2"></i>
               Dashboard
            </a>
            <button type="submit" class="btn btn-danger" name="logout">
               <i class="nav-icon fas fa-door-open mr-2"></i>
               Logout
            </button>
         </form>
      </li>
      </ul>
   </nav>

   <!--  data Sidebar -->
   <?php include_once "./template/sidebar.php" ?>

   <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper">
      <!-- Data Breadcrumb -->
      <?php include_once "./template/breadcrumb.php"  ?>

      <!-- Section Awal -->
      <section class="content">