<?php
   include "../class/dataDB.php";

   // Inisialisasi object
   $data = new dataDB();

   // menampilkan data sesuai dengan type GET
   switch ($_GET['type']) 
   {
      case 'running-text':
         $title= "Running Text";
         $menu = "Running Text";
         $link_menu = "input_data.php?type=running-text";
         $location = "Index";
         break;
      
      case 'edit-running-text':
         $title= "Edit Running Text";
         $menu = "Edit Running Text";
         $link_menu = "input_data.php?type=running-text";
         $location = "Index";
         break;

      case 'line' :
         $title= "Line";
         $menu = "Line";
         $link_menu = "input_data.php?type=line";
         $location = "Index";
         break;
      
      case 'edit-line' :
         $title= "Edit Line";
         $menu = "Edit Line";
         $link_menu = "input_data.php?type=line";
         $location = "Index";
         break;

      case 'masalah-line' :
         $title= "Masalah Line";
         $menu = "Masalah Line";
         $link_menu = "input_data.php?type=masalah-line";
         $location = "Index";
         break;

      case 'edit-masalah-line' :
         $title= "Edit Masalah Line";
         $menu = "Edit Masalah Line";
         $link_menu = "input_data.php?type=edit-masalah-line";
         $location = "Index";
         break;
   }


   include_once "./template/header.php";
?>

<link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.css">

<style>
   .dataTables_filter {
      display: none;
   }
</style>

<?php
   // Cek session, apakah yang login itu admin atau operator

   if ($_SESSION['akses'] == 'OPERATOR') {
      echo '<script>
         window.location.href = "./";
      </script>';
   }
   switch ($_GET['type']) {
      case 'running-text':
         include_once "./tambah-data/running_text.php";
         break;

      case 'edit-running-text':
         include_once "./tambah-data/edit_running_text.php";
         break;

      case 'delete-running-text':
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
         break;
      
      case 'line':
         include_once "./tambah-data/line.php";
         break;

      case 'edit-line':
         include_once "./tambah-data/edit_line.php";
         break;

      case 'delete-line':
         if ($data->deleteLine($_GET['id']) > 0) {
            echo '
               <script>
                  window.location.href = "input_data.php?type=line";
               </script>
            ';
   
         } else {
            echo("<br>");
            echo mysqli_error($data->koneksi);
         }
         break;
      
      case 'masalah-line':
         include_once "./tambah-data/masalah_line.php";
         break;

      case 'edit-masalah-line':
         # code...
         break;

      case 'delete-masalah-line':
         # code...
         break;
   }

?>

<?php include_once "./template/footer.php" ?>

<!-- DataTables -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>

<script>
   // Fungsi untuk menampilkan alert

   function berhasilSimpan(type, text) {
      Swal.fire({
         type: 'success',
         html: text + ' berhasil ditambahkan',
         allowOutsideClick: false,
         allowEscapeKey: false,
         focusConfirm: true,
         showConfirmButton: true,
         
      }).then(function() {
         window.location.href = "input_data.php?type=" + type;
         console.log("The OK Button was clicked");
      });
   };

   function berhasilUbah(type, text) {
      Swal.fire({
         type: 'success',
         html: text + ' berhasil diubah',
         allowOutsideClick: false,
         allowEscapeKey: false,
         focusConfirm: true,
         showConfirmButton: true,
         
      }).then(function() {
         window.location.href = "input_data.php?type=" + type;
      });
   };

   function hapusData(parameter, link, text) {
      Swal.fire({
         title: 'Apakah anda yakin?',
         text: "Anda ingin menghapus " + text + " ini!",
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
               text: text + ' berhasil dihapus.',
               type: 'success',
               allowOutsideClick: false,
               allowEscapeKey: false,
            }).then(function() {
               window.location.href = link;
            })
         }
      })
   };

   // Fungsi untuk menampilkan data table
   lineTable = $('#line_table').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": false,
      "info": false,
      "autoWidth": true,
   });

   $('#cari-line').keyup(function(){
      lineTable.search($(this).val()).draw() ;
   });

   masalahLineTable = $('#masalah_line_table').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": false,
      "info": false,
      "autoWidth": true,
   });

   $('#cari-masalah').keyup(function(){
      masalahLineTable.search($(this).val()).draw() ;
   });



</script>

<?php
// Proses simpan dan ubah

   if (isset($_POST['simpan-running'])) 
   {
      if ($data->addRunningText($_POST) > 0) {
         echo "<script>berhasilSimpan('running-text', 'Running Text')</script>";
      
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

   if (isset($_POST['ubah-running'])) 
   {
      if ($data->updateRunningText($_POST, $_GET['id']) > 0) {
         echo "<script>berhasilUbah('running-text', 'Running Text')</script>";
      
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

   if (isset($_POST['simpan-line'])) 
   {
      if ($data->addLine($_POST) > 0) {
         echo "<script>berhasilSimpan('line', 'Line')</script>";
      
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

   if (isset($_POST['ubah-line'])) 
   {
      if ($data->updateLine($_POST, $_GET['id']) > 0) {
         echo "<script>berhasilUbah('line', 'Line')</script>";
      
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




