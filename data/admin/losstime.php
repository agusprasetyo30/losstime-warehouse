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


<?php
   if ($_GET['type'] == 'harian') {
      include_once "./losstime/harian.php";

   } else if ($_GET['type'] == 'bulanan') {
      include_once "./losstime/bulanan.php";
   }   
?>

<?php include_once "./template/footer.php" ?>
