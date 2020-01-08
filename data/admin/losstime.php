<?php
   if ($_GET['type'] == 'harian') {
      $title= "Losstime Harian";
      $menu = "Losstime Harian";
      $link_menu = "losstime.php?type=harian";
      $location = "Index";

   } else if ($_GET['type'] == 'bulanan') {
      $title= "Losstime Bulanan";
      $menu = "Losstime Bulanan";
      $link_menu = "losstime.php?type=bulanan";
      $location = "Index";
   }

   include_once "./template/header.php"
?>

<link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.css">



<?php
   if ($_GET['type'] == 'harian') {
      include_once "./losstime/harian.php";

   } else if ($_GET['type'] == 'bulanan') {
      include_once "./losstime/bulanan.php";
   }   
?>

<?php include_once "./template/footer.php" ?>

<!-- DataTables -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>

<script>
   $(function () {
      // $("#example1").DataTable();
      $('#example1').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": false,
      "autoWidth": false,
      });
   });
</script>