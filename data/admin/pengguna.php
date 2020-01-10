<?php
   $title= "Pengguna";
   $menu = "Pengguna";
   $link_menu = "pengguna.php";
   $location = "Index";
   $status_nav_pengguna = 'active';

   include_once "../function.php";
   include_once "./template/header.php";

?>

<hr>

<div class="container-fluid">
   <div class="row justify-content-center">
      <div class="col-md-6">
         <div class="card card-default">
            <div class="card-header">
               <h3 class="card-title">
                  <i class="fa fa-user" aria-hidden="true"></i>
                  Pengguna
               </h3>
            </div>
            <div class="card-body">
               <label for="">Nama</label>
               <input type="text" class="form-control" name="" id="">
            </div>
         </div>
      </div>
   </div>
</div>

<?php include_once "./template/footer.php" ?>
