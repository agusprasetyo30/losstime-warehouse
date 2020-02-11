<?php
ini_set("display_errors", 0);
   $title= "Edit Pengguna";
   $menu = "Edit Pengguna";
   $link_menu = "manajemen_pengguna.php?type=man-pengguna";
   $location = "Index";

   include_once "../class/dataDB.php";
   $data = new dataDB();

   include_once "./template/header.php";

   if ($_SESSION['akses'] == 'OPERATOR') {
      echo '<script>
         window.location.href = "./";
      </script>';
   }
?>

<div class="container-fluid" style="border-top: 1px solid lightgrey">
   <div class="row justify-content-center mt-3">
      <div class="col-md-8">
         <div class="card card-default">
            <div class="card-header">
               <h3 class="card-title mt-2">
                  <i class="fas fa-pencil-alt mr-2"></i>
                  Edit Pengguna
               </h3>

               <a href="./manajemen_pengguna.php?type=man-pengguna" class="btn btn-warning float-right">
                  <i class="nav-icon fas fa-undo"></i>
                  Kembali
               </a>
            </div>
            <?php
               // mengambil data pada class fungsi untuk mengambil data user berdasarkan ID
               $file = $data->getUsersDataByID($_GET['id']);
            ?>
            <form action="" method="post">
               <div class="card-body">
                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group mr-2">
                           <label for="nama">Nama</label>
                           <input name="nama" type="text" class="form-control" value="<?= $file['nama'] ?>" 
                              id="nama" autofocus=on placeholder="Masukan nama" autocomplete="off" required>
                        </div>
                        <div class="form-group mr-2">
                           <label for="id_kar">ID Karyawan</label>
                           <input name="id_karyawan" type="text" name="id_karyawan" onkeypress="return isNumberKey(event)" class="form-control" value="<?= $file['id_karyawan'] ?>" 
                              maxlength="6" id="id_kar" autofocus=on placeholder="Masukan ID Karyawan" autocomplete="off" required>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group ml-2">
                           <label for="akses">Akses</label>
                           <select name="akses" id="akses" class="form-control" style="cursor: pointer">
                              <option value="" selected disabled>Pilih Akses</option>
                              <option value="ADMIN" <?= $file['akses'] == "ADMIN" ? " selected" : "" ?> >ADMIN</option>
                              <option value="OPERATOR" <?= $file['akses'] == "OPERATOR" ? " selected" : "" ?>>OPERATOR</option>
                           </select>
                        </div>
                        <div class="form-group ml-2">
                           <label for="status">Status</label>
                           <select name="status" id="status" class="form-control" style="cursor: pointer">
                              <option value="" selected disabled>Pilih Status</option>
                              <option value="AKTIF" <?= $file['status'] == "AKTIF" ? "selected" : '' ?> >AKTIF</option>
                              <option value="NON AKTIF" <?= $file['status'] == "NON AKTIF" ? "selected" : '' ?> >NON AKTIF</option>
                           </select>
                        </div>
                        <button type="submit" name="update" class="btn btn-success float-right">
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

<?php include_once "./template/footer.php"; ?>

<script>
   function berhasil() {
      Swal.fire({
         type: 'success',
         html: 'Data berhasil diupdate!',
         allowOutsideClick: false,
         allowEscapeKey: false,
         focusConfirm: true,
         showConfirmButton: true
         
      }).then(function() {
         window.location.href = "manajemen_pengguna.php?type=man-pengguna"
         console.log("The OK Button was clicked");
      })
   }

   function gagal() {
      Swal.fire({
         title: 'Peringatan!',
         type: 'warning',
         text: 'Pengguna tidak dapat diupdate!',
         allowOutsideClick: false,
         allowEscapeKey: false,
         focusConfirm: true,
         showConfirmButton: true
         
      }).then(function() {
         window.location.href = "manajemen_pengguna.php?type=man-pengguna"
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
   if (isset($_POST['update'])) {
      if ($data->updateUsers($_POST, $_GET['id'])) {
         echo '<script>berhasil()</script>';
      
      } else {
         echo '<script>gagal()</script>';
      }
   }
?>