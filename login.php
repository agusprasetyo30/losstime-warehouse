<?php
   session_start();
   include "./data/class/dataDB.php";

   $data = new dataDB();
?>

<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title>LOG IN | PT. SAI</title>
   <!-- Tell the browser to be responsive to screen width -->
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <!-- Title Icon -->
   <link rel="icon" href="./dist/img/logo/logo-title.png">

   <!-- Font Awesome -->
   <link rel="stylesheet" href="./plugins/fontawesome-free/css/all.min.css">
   <!-- icheck bootstrap -->
   <link rel="stylesheet" href="./plugins/icheck-bootstrap/icheck-bootstrap.min.css">
   <!-- Theme style -->
   <link rel="stylesheet" href="./dist/css/adminlte.min.css">
   <!-- CSS Sweetalert2 -->
   <link rel="stylesheet" href="./plugins/sweetalert2/sweetalert2.min.css">
   <!-- Custom CSS -->
   <link rel="stylesheet" href="./dist/css/app.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
   <!-- /.login-logo -->
   <div class="card">
         <div class="login-logo">
            <a href="./">
            <b>Warehouse</b>
            <div class="login-logo2">
               PT. Surabaya Autocomp Indonesia
            </div>
         </a>
         </div>
      <div class="card-body login-card-body">
         <form action="" method="post">
            <div class="input-group mb-3">
               <input type="text" name="id_anggota" class="form-control" maxlength="6" placeholder="Masukan ID Anggota" autofocus=on autocomplete="off" required>
               <div class="input-group-append">
                  <div class="input-group-text">
                     <span class="fas fa-id-card"></span>
                  </div>
               </div>
            </div>
            <div class="input-group mb-3">
               <input type="password" name="password" class="form-control" placeholder="Masukan Password" autofocus=on required>
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

<!-- /.login-box -->

<!-- jQuery -->
<script src="./plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="./plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="./dist/js/adminlte.min.js"></script>
<!-- Sweetalert2 -->
<script src="./plugins/sweetalert2/sweetalert2.min.js"></script>

<script>
   function loginBerhasil() {
      Swal.fire({
         type: 'success',
         html: 'Login Sukses',
         allowOutsideClick: false,
         allowEscapeKey: false,
         focusConfirm: true,
         showConfirmButton: true
         
      }).then(function() {
         window.location.href = "./data/warehouse/";
         console.log("The OK Button was clicked");
      })
   }

   function loginGagal() {
      Swal.fire({
         title: 'Peringatan!',
         type: 'warning',
         text: 'Username/Password Salah!',
         allowOutsideClick: false,
         allowEscapeKey: false,
         focusConfirm: true,
         showConfirmButton: true
         
      }).then(function() {
         window.location.href = "login.php"
      })
   }

   function userNonaktif() {
      Swal.fire({
         title: 'Peringatan!',
         type: 'error',
         text: 'Pengguna di Nonaktifkan!',
         allowOutsideClick: false,
         allowEscapeKey: false,
         focusConfirm: true,
         showConfirmButton: true
         
      }).then(function() {
         window.location.href = "login.php"
      })
   }
</script>


<?php
   if (isset($_POST['login'])) {
      
      if ($data->login($_POST) == 'success') {
         echo "<script>loginBerhasil()</script>";
         
      } else if ($data->login($_POST) == 'non') {
         echo "<script>userNonaktif()</script>";

      } else if ($data->login($_POST) == 'fail') {
         echo "<script>loginGagal()</script>";
      }
   }
?>
</body>
</html>
