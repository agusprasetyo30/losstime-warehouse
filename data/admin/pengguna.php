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
      <div class="col-md-8">
         <div class="card card-default">
            <div class="card-header">
               <h3 class="card-title mt-2">
                  <i class="fa fa-user" aria-hidden="true"></i>
                  Pengguna
               </h3>
               <div class="text-right">
                  <a href="./tambah_pengguna.php?type=tambah-pengguna" class="btn btn-success btn-sm">
                     <i class="nav-icon fa fa-user-plus" aria-hidden="true"></i>
                     Tambah Pengguna
                  </a>
               </div>
            </div>
            <div class="card-body">
               <div class="form-group">
                  <label for="nama">Nama</label>
                  <input type="text" class="form-control" id="nama" value="Agus Prasetyo" readonly>
               </div>
               <div class="form-group">
                  <label for="id_kar">ID Karyawan</label>
                  <input type="text" class="form-control" id="id_kar" value="800832" readonly>
               </div>

            </div>
         </div>
         
         <div class="card card-default">
            <div class="card-header">
               <h3 class="card-title mt-2">
                  <i class="fa fa-lock" aria-hidden="true"></i>
                  Ubah Password
               </h3>
            </div>
            <div class="card-body">
               <div class="row">
                  <div class="col-md-4">
                     <div class="form-group">
                        <label for="password-lama">Password Lama</label>
                        <input type="password" class="form-control" name="password-lama" id="password-lama" placeholder="Masukan password lama" required>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="form-group">
                        <label for="password-baru">Password Baru</label>
                        <input type="password" class="form-control" name="password-baru" id="password-baru" placeholder="Masukan password baru" required>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="form-group">
                        <label for="konfirmasi-password">Konfirmasi Password Baru</label>
                        <input type="password" class="form-control" id="konfirmasi-password" name="konfirmasi-password" placeholder="Masukan password baru" required>
                     </div>
                  </div>
               </div>
               
               <div class="row">
                  <div class="col-md-12 text-right">
                     <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i>
                        Simpan
                     </button>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<?php include_once "./template/footer.php" ?>
