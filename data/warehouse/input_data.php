<?php
   include "../class/dataDB.php";

   $data = new dataDB();

   if ($_GET['type'] == 'running-text') {
      $title= "Running Text";
      $menu = "Running Text";
      $link_menu = "input_data.php?type=running-text";
      $location = "Index";

   } else if ($_GET['type'] == 'edit-running-text') {
      $title= "Edit Running Text";
      $menu = "Edit Running Text";
      $link_menu = "input_data.php?type=edit-running-text";
      $location = "Index";

   }
   
   include_once "./template/header.php";
?>

<link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.css">

<?php
   if ($_GET['type'] == 'running-text') {
      include_once "./tambah-data/running_text.php";

   } else if ($_GET['type'] == 'edit-running-text') {
      include_once "./tambah-data/edit_running_text.php";

   } else if ($_GET['type'] == 'delete-running-text') {
      
      if ($data->deleteRunningText($_GET['id']) > 0) {
         echo '
            <script>
               window.location.href = "input_data.php?type=running-text";
            </script>
         ';

      } else {
         echo("<br>");
         echo mysqli_error($data->koneksi);
      }
   }
?>

<?php include_once "./template/footer.php" ?>

<!-- DataTables -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>

<script>
   function berhasilSimpan() {
      Swal.fire({
         type: 'success',
         html: 'Running text berhasil ditambahkan',
         allowOutsideClick: false,
         allowEscapeKey: false,
         focusConfirm: true,
         showConfirmButton: true,
         
      }).then(function() {
         window.location.href = "input_data.php?type=running-text";
         console.log("The OK Button was clicked");
      });
   };

   function berhasilUbah() {
      Swal.fire({
         type: 'success',
         html: 'Running text berhasil diubah',
         allowOutsideClick: false,
         allowEscapeKey: false,
         focusConfirm: true,
         showConfirmButton: true,
         
      }).then(function() {
         window.location.href = "input_data.php?type=running-text";
      });
   };

   function hapusRunning(parameter, link) {
      Swal.fire({
         title: 'Apakah anda yakin?',
         text: "Anda ingin menghapus running text ini!",
         type: 'warning',
         showCancelButton: true,
         confirmButtonColor: '#3085d6',
         cancelButtonColor: '#d33',
         cancelButtonText: 'Batal',
         confirmButtonText: 'Hapus data',
         allowOutsideClick: false,
         allowEscapeKey: false,
      }).then((result) => {
         // console.log('input_data.php?id='+ parameter +'&type=delete-running-text');
         if (result.value) {
            Swal.fire({
               title: 'Terhapus!',
               text: 'Running text berhasil dihapus.',
               type: 'success',
               allowOutsideClick: false,
               allowEscapeKey: false,
            }).then(function() {
               window.location.href = link;
            })
         }
      })
   };


</script>

<?php
   if (isset($_POST['simpan'])) {
      if ($data->addRunningText($_POST) > 0) {
         echo "<script>berhasilSimpan()</script>";
      
      } else {
         echo "
            <script>
               alert('Gagal');
            </script>
         ";
         
         echo("<br>");
         echo mysqli_error($data->koneksi);
      }
   }

   if (isset($_POST['ubah'])) {
      if ($data->updateRunningText($_POST, $_GET['id']) > 0) {
         echo "<script>berhasilUbah()</script>";
      
      } else {
         echo "
            <script>
               alert('Gagal');
            </script>
         ";
         
         echo("<br>");
         echo mysqli_error($data->koneksi);
      }
   }


?>




