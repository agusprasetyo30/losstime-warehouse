<?php
   $title= "Tambah Pengguna";
   $menu = "Tambah Pengguna";
   $link_menu = "Tambah_Pengguna.php";
   $location = "Index";
   $status_nav_pengguna = 'active';

   include_once "../class/dataDB.php";
   $data = new dataDB();

   include_once "./template/header.php";
?>
<!-- CSS Sweetalert2 -->
<link rel="stylesheet" href="../../plugins/sweetalert2/sweetalert2.min.css">

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

               <a href="./pengguna.php" class="btn btn-warning float-right">
                  <i class="nav-icon fas fa-undo"></i>
                  Kembali
               </a>
            </div>
            <form action="" method="post">
               <div class="card-body">
                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group mr-2">
                           <label for="nama">Nama</label>
                           <input name="nama" type="text" class="form-control" id="nama" autofocus=on placeholder="Masukan nama" autocomplete="off" required>
                        </div>
                        <div class="form-group mr-2">
                           <label for="id_kar">ID Karyawan</label>
                           <input name="id_karyawan" type="text" name="id_karyawan" class="form-control" maxlength="6" id="id_kar" autofocus=on placeholder="Masukan ID Karyawan" autocomplete="off" required>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group ml-2">
                           <label for="password">Password</label>
                           <input type="password" name="password" class="form-control" id="password" autofocus=on placeholder="Masukan password" required>
                        </div>
                        <div class="form-group ml-2" >
                           <label for="confirm">Konfirmasi Password</label>
                           <input type="password" name="confirm_password" class="form-control" id="confirm" autofocus=on placeholder="Masukan konfirmasi password" required>
                        </div>
                        <button type="submit" name="simpan" class="btn btn-success float-right">
                           <i class="fas fa-save"></i>
                           Simpan
                        </button>
                        <?php
                           
                        ?>
                        
                     </div>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>

<?php 
   include_once "./template/footer.php"; 

   $inputNama = $_POST["nama"];
?>


<script>
   function berhasil() {
      Swal.fire({
         type: 'success',
         html: 'Pengguna <b> <?= $inputNama ?> </b> berhasil ditambahkan',
         allowOutsideClick: false,
         allowEscapeKey: false,
         focusConfirm: true,
         showConfirmButton: true
         
      }).then(function() {
         window.location.href = "pengguna.php"
         console.log("The OK Button was clicked");
      })
   }

   function idKaryawanInfo() {
      Swal.fire({
         title: 'Peringatan!',
         type: 'warning',
         text: 'ID Karyawan sudah terdaftar',
         allowOutsideClick: false,
         allowEscapeKey: false,
         focusConfirm: true,
         showConfirmButton: true
         
      }).then(function() {
         window.location.href = "tambah_pengguna.php"
      })
   }

   function passwordInfo() {
      Swal.fire({
         title: 'Peringatan!',
         type: 'warning',
         text: 'Tidak dapat menambahkan pengguna',
         allowOutsideClick: false,
         allowEscapeKey: false,
         focusConfirm: true,
         showConfirmButton: true
         
      }).then(function() {
         window.location.href = "tambah_pengguna.php"
      })
   }
</script>

<?php
   

   if (isset($_POST['simpan'])) {
      if ($data->addUser($_POST) > 0) {
         echo "<script>berhasil()</script>";

      } else if ($data->addUser($_POST) == 'id_kar') { // jika terdapat id karyawan yang sama, mereturn String 'id_kar'
         echo "<script>idKaryawanInfo()</script>";

      } else if ($data->addUser($_POST) == 'pass') { // jika password & konfirmasi password tidak sama, mereturn String 'pass'
         echo "<script>passwordInfo()</script>";

      } else  {
         echo("<br>");
         echo mysqli_error($data->koneksi);
      }
   }
?>





