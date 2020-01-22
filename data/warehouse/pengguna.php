<?php
   // ini_set("display_errors", 1);

   $title= "Pengguna";
   $menu = "Pengguna";
   $link_menu = "pengguna.php";
   $location = "Index";
   $status_nav_pengguna = 'active';

   include_once "../class/dataDB.php";
   $data = new dataDB();

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
               <?php if ($_SESSION['akses'] == 'ADMIN') { ?>
                  <div class="text-right">
                     <a href="./tambah_pengguna.php" class="btn btn-success btn-sm">
                        <i class="nav-icon fa fa-user-plus" aria-hidden="true"></i>
                        Tambah Pengguna
                     </a>
                  </div>
               <?php } ?>
            </div>
            <div class="card-body">
               <div class="form-group">
                  <label for="nama">Nama</label>
                  <input type="text" class="form-control" id="nama" value="<?= $_SESSION['nama'] ?>" readonly>
               </div>
               <div class="form-group">
                  <label for="id_kar">ID Karyawan</label>
                  <input type="text" class="form-control" id="id_kar" value="<?= $_SESSION['id_karyawan'] ?>" readonly>
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
            <form action="" method="post">
               <div class="card-body">
                  <div class="row">
                     <div class="col-md-4">
                        <div class="form-group">
                           <label for="password-lama">Password Lama</label>
                           <input type="password" class="form-control" name="password_lama" id="password-lama" placeholder="Masukan password lama" required>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <label for="password-baru">Password Baru</label>
                           <input type="password" class="form-control" name="password_baru" id="password-baru" placeholder="Masukan password baru" required>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <label for="konfirmasi_password">Konfirmasi Password Baru</label>
                           <input type="password" class="form-control" id="konfirmasi_password" name="konfirmasi_password" placeholder="Masukan password baru" required>
                        </div>
                     </div>
                  </div>
                  <input type="hidden" name="id_user" value="<?= $_SESSION['id'] ?>">
                  <div class="row">
                     <div class="col-md-12 text-right">
                        <button type="submit" class="btn btn-success" name="ubah">
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

<script>
   function berhasil() {
      Swal.fire({
         type: 'success',
         html: 'Ubah Password Berhasil',
         allowOutsideClick: false,
         allowEscapeKey: false,
         focusConfirm: true,
         showConfirmButton: true
         
      }).then(function() {
         window.location.href = "./pengguna.php"
         console.log("The OK Button was clicked");
      })
   }

   function passwordGagal() {
      Swal.fire({
         title: 'Peringatan!',
         type: 'warning',
         text: 'Tidak dapat mengubah password baru',
         allowOutsideClick: false,
         allowEscapeKey: false,
         focusConfirm: true,
         showConfirmButton: true
         
      }).then(function() {
         window.location.href = "./pengguna.php"
      })
   }
</script>

<?php
   if (isset($_POST['ubah'])) {
      // memanggil fungsi changePassword yang mempunyai fungsi untuk merubah password pengguna
      if ($data->changePassword($_POST, $_POST['id_user'])) {
         echo "<script>berhasil()</script>";
         
      } else {
         echo "<script>passwordGagal()</script>";
         echo mysqli_error($this->koneksi);
      }

   }
?>