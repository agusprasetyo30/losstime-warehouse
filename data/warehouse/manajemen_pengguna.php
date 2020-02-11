<?php
ini_set("display_errors", 0);
   $title= "Manajemen Pengguna";
   $menu = "Manajemen Pengguna";
   $link_menu = "manajemen_pengguna.php";
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

<style>
   .dataTables_filter {
      display: none;
   }
</style>

<link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.css">

<div class="container-fluid" style="border-top: 1px solid lightgrey">
   <div class="row justify-content-center mt-3">
      <div class="col-md-10">
         <div class="card card-default">
            <div class="card-header">
               <h3 class="card-title mt-2">
                  <i class="fas fa-user-check mr-2" aria-hidden="true"></i>
                  Manajemen Pengguna
               </h3>

               <div class="text-right">
                  <a href="./tambah_pengguna.php?type=man-pengguna" class="btn btn-success">
                     <i class="nav-icon fa fa-user-plus" aria-hidden="true"></i>
                     Tambah Pengguna
                  </a>
               </div>
            </div>
            <div class="card-body">
               <div class="row">
                  <div class="col-md-8">
                     <div class="btn-group btn-group-toggle">
                        <ul class="nav nav-pills">
                           <!-- button navbar untuk sorting berdasarkan jabatan -->
                           <li class="nav-item"><a class="nav-link <?= $_GET['akses'] == null ? 'active' : '' ?>" href="manajemen_pengguna.php?type=man-pengguna">ALL</a></li>
                           <li class="nav-item"><a class="nav-link <?= $_GET['akses'] == 'ADMIN' ? 'active' : '' ?>" href="manajemen_pengguna.php?type=man-pengguna&akses=ADMIN">ADMIN</a></li>
                           <li class="nav-item"><a class="nav-link <?= $_GET['akses'] == 'OPERATOR' ? 'active' : '' ?>" href="manajemen_pengguna.php?type=man-pengguna&akses=OPERATOR">OPERATOR</a></li>
                           <li class="nav-item"><a class="nav-link <?= $_GET['akses'] == 'NONAKTIF' ? 'active' : '' ?>" href="manajemen_pengguna.php?type=man-pengguna&akses=NONAKTIF">NON AKTIF</a></li>
                        </ul>
                     </div>
                  </div>
                  <div class="col-md-4 text-right">
                     <input type="text" id="myInputTextField" class="form-control" placeholder="Cari data">
                  </div>
               </div>
               <table id="example1" class="table table-bordered table-hover table-striped text-center">
                  <thead>
                     <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>ID Karyawan</th>
                        <th>Akses</th>
                        <th>Status</th>
                        <th>Aksi</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php 
                     $nomer = 1;
                     foreach ($data->getUsersData($_GET['akses']) as $file) { ?>

                     <tr>
                        <td><?= $nomer++ ?>.</td>
                        <td class="text-left"><?= $file['nama'] ?></td>
                        <td><?= $file['id_karyawan'] ?></td>
                        <td><?= $file['akses'] ?></td>
                        <td><span class="label <?= $file['status'] == 'AKTIF' ? 'bg-primary' : 'bg-danger' ?> "><?= $file['status'] ?></span> </td>
                        <td>
                           <a href="edit_pengguna.php?type=edit-pengguna&id=<?= $file['id'] ?>" class="btn btn-warning btn-sm btn-block">
                              <i class="fas fa-pencil-alt"></i>
                              Edit
                           </a>
                        </td>
                     </tr>

                     <?php } ?>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</div>


<?php include_once "./template/footer.php"; ?>

<!-- DataTablesLibrary -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>

<script>
   
   oTable = $('#example1').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": false,
      "info": false,
      "autoWidth": true,
   });

   $('#myInputTextField').keyup(function(){
      oTable.search($(this).val()).draw() ;
   });

</script>