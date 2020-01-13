<?php
   $title= "Tambah Pengguna";
   $menu = "Tambah Pengguna";
   $link_menu = "Tambah_Pengguna.php";
   $location = "Index";
   $status_nav_pengguna = 'active';

   include_once "../function.php";
   include_once "./template/header.php";

?>

<hr>

<div class="container-fluid">
   <div class="row justify-content-center">
      <div class="col-md-8">
         <div class="card card-default">
            <div class="card-header">
               <h3 class="card-title mt-2">
                  <i class="fa fa-user-plus" aria-hidden="true"></i>
                  Tambah Pengguna
               </h3>
            </div>
            <form action="" method="post">
               <div class="card-body">
                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group mr-2">
                           <label for="nama">Nama</label>
                           <input type="text" class="form-control" id="nama" autofocus=on placeholder="Masukan nama" autocomplete="off" required>
                        </div>
                        <div class="form-group mr-2">
                           <label for="id_kar">ID Karyawan</label>
                           <input type="text" class="form-control" maxlength="6" id="id_kar" autofocus=on placeholder="Masukan ID Karyawan" autocomplete="off" required>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group ml-2">
                           <label for="password">Password</label>
                           <input type="password" name="password" class="form-control" id="password" autofocus=on placeholder="Masukan password" required>
                        </div>
                        <div class="form-group ml-2">
                           <label for="confirm">Konfirmasi Password</label>
                           <input type="password" name="confirm_password" class="form-control" id="confirm" autofocus=on placeholder="Masukan konfirmasi password" required>
                        </div>

                        <button type="submit" class="btn btn-success float-right">
                           <i class="fas fa-save"></i>
                           Simpan
                        </button>
                     </div>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>

<?php include_once "./template/footer.php" ?>
