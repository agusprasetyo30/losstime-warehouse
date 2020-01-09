
<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title><?=$title?> | Warehouse PT. SAI</title>
   <!-- Tell the browser to be responsive to screen width -->
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <!-- Font Awesome -->
   <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
   <!-- Tempusdominus Bbootstrap 4 -->
   <link rel="stylesheet" href="../../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
   <!-- iCheck -->
   <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
   <!-- Theme style -->
   <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
   <!-- overlayScrollbars -->
   <link rel="stylesheet" href="../../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
   <!-- summernote -->
   <link rel="stylesheet" href="../../plugins/summernote/summernote-bs4.css">
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
         <div class="dashboard-nav-link">PT. SURABAYA AUTOCOMP INDONESIA</div>
      </li>
      <li class="nav-item" style="text-align: right; width: 120px; height: auto">
         <a href="#" class="btn btn-danger">
            <i class="nav-icon fas fa-door-open"></i>
            Logout
         </a>
      </li>
      </ul>
   </nav>
   <!-- /.navbar -->

   <!--  data Sidebar -->
   <?php include_once "./template/sidebar.php" ?>

   <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper">
      <!-- Data Breadcrumb -->
      <?php include_once "./template/breadcrumb.php"  ?>

      <!-- Section Awal -->
      <section class="content">
