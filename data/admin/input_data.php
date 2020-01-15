<?php
   include "../function.php";

   if ($_GET['type'] == 'running-text') {
      $title= "Running Text";
      $menu = "Running Text";
      $link_menu = "input_data.php?type=running-text";
      $location = "Index";
   }

   include_once "./template/header.php";
?>

<link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.css">


<?php
   if ($_GET['type'] == 'running-text') {
      include_once "./tambah-data/running_text.php";

   }
?>

<?php include_once "./template/footer.php" ?>

<!-- DataTables -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>

<script>
   $(function () {
      // $('#running_text').DataTable({
      //    "paging": false,
      //    "lengthChange": false,
      //    "searching": false,
      //    "ordering": false,
      //    "info": false,
      //    "autoWidth": false,
      // });
   });
</script>