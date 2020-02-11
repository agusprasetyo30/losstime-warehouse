<?php
ini_set("display_errors", 0);
   $title= "Tambah Pengguna";
   $menu = "Tambah Pengguna";
   $link_menu = "Tambah_Pengguna.php";
   $location = "Index";

   include_once "../class/dataDB.php";
   $data = new dataDB();

   include_once "./template/header.php";

   if ($_SESSION['akses'] == 'OPERATOR') {
      echo '<script>
         window.location.href = "./pengguna.php";
      </script>';
   }
?>
<div class="container-fluid" style="border-top: 1px solid lightgrey">
   <div class="row justify-content-center mt-3">
      <div class="col-md-8">
         <div class="card card-default">
            <div class="card-header">
               <h3 class="card-title mt-2">
                  <i class="fa fa-user-plus" aria-hidden="true"></i>
                  Tambah Pengguna
               </h3>

               <a href="./manajemen_pengguna.php?type=man-pengguna" class="btn btn-warning float-right">
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
                           <input name="id_karyawan" type="text" name="id_karyawan" onkeypress="return isNumberKey(event)" class="form-control" maxlength="6" id="id_kar" autofocus=on placeholder="Masukan ID Karyawan" autocomplete="off" required>
                        </div>
                        <div class="form-group mr-2">
                           <label for="akses">Akses</label>
                           <select name="akses" id="akses" class="form-control" style="cursor: pointer">
                              <option value="" selected disabled>Pilih Akses</option>
                              <option value="ADMIN">ADMIN</option>
                              <option value="OPERATOR">OPERATOR</option>
                           </select>
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
         html: 'Pengguna <b> <?php echo($inputNama) ?> </b> berhasil ditambahkan',
         allowOutsideClick: false,
         allowEscapeKey: false,
         focusConfirm: true,
         showConfirmButton: true
         
      }).then(function() {
         window.location.href = "manajemen_pengguna.php?type=man-pengguna"
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

   // Inputan hanya angka
   function isNumberKey(evt)
   {
      var charCode = (evt.which) ? evt.which : evt.keyCode
      if (charCode > 31 && (charCode < 48 || charCode > 57))
      {
         return false;

      } else {
         return true;
      }
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





