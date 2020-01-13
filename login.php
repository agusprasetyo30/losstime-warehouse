<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title>AdminLTE 3 | Log in</title>
   <!-- Tell the browser to be responsive to screen width -->
   <meta name="viewport" content="width=device-width, initial-scale=1">

   <!-- Font Awesome -->
   <link rel="stylesheet" href="./plugins/fontawesome-free/css/all.min.css">
   <!-- icheck bootstrap -->
   <link rel="stylesheet" href="./plugins/icheck-bootstrap/icheck-bootstrap.min.css">
   <!-- Theme style -->
   <link rel="stylesheet" href="./dist/css/adminlte.min.css">
   <!-- Custom CSS -->
   <link rel="stylesheet" href="./dist/css/app.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
   <!-- /.login-logo -->
   <div class="card">
         <div class="login-logo">
            <a href="../../index2.html">
            <b>Warehouse</b>
            <div class="login-logo2">
               PT. Surabaya Autocomp Indonesia
            </div>
         </a>
         </div>
      <div class="card-body login-card-body">
         <!-- <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            Username atau Password gagal
         </div> -->

      <form action="" method="post">
         <div class="input-group mb-3">
            <input type="text" name="id_anggota" class="form-control" maxlength="6" placeholder="Masukan ID Anggota" autofocus=on autocomplete="off">
            <div class="input-group-append">
               <div class="input-group-text">
                  <span class="fas fa-id-card"></span>
               </div>
            </div>
         </div>
         <div class="input-group mb-3">
            <input type="password" name="password" class="form-control" placeholder="Masukan Password" autofocus=on>
            <div class="input-group-append">
               <div class="input-group-text">
                  <span class="fas fa-lock"></span>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-12">
               <button type="submit" name="login" class="btn btn-primary btn-block">
                  <i class="fas fa-sign-in-alt mr-2"></i>
                  Sign In
               </button>
            </div>
            <div class="col-12 mt-2">
               <a href="./" class="btn btn-warning btn-block">
                  <i class="fa fa-undo mr-2" aria-hidden="true"></i>
                  Kembali
               </a>
            </div>
         </div>
      </form>
      </div>
   </div>
</div>
<?php
   if (isset($_POST['login'])) {
      print_r($_POST);
   }
?>
<!-- /.login-box -->

<!-- jQuery -->
<script src="./plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="./plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="./dist/js/adminlte.min.js"></script>

</body>
</html>
