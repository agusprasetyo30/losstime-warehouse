<?php
   // ini_set("display_errors", 1);

   include_once "./data/function.php";

   $data_lossTime = [65, 59, 80, 81, 56, 55, 40, 50, 30, 40, 50, 40];
   $data_bulan = ['Januari', 'Pebruari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'Nopember', 'Desember'];

   $bulan = json_encode($data_bulan, JSON_NUMERIC_CHECK);
   $lossTime = json_encode($data_lossTime, JSON_NUMERIC_CHECK);
?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Warehouse | PT. SAI</title>
      <!-- Tell the browser to be responsive to screen width -->
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <!-- Template bawaan dan bootstrap 4 -->
      <link rel="stylesheet" href="./dist/css/adminlte.min.css">
      <!-- Font Awesome -->
      <link rel="stylesheet" href="./plugins/fontawesome-free/css/all.min.css">
      <!-- Ionicons -->
      <link rel="stylesheet" href="./plugins/ion-icon/css/ionicons.min.css">
      <!-- Custom CSS -->
      <link rel="stylesheet" href="./dist/css/app.css">

      <style>
         /* body, html {
            height: 100%;
            margin: 0;
         } */
         /* .valign {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
         } */
      </style>
   </head>

   <body class="main-content-dashboard" style="height: 100%; max-height: 100%">
   <!-- Navbar atas -->
   <nav class="navbar navbar-expand bg-navbar-dashboard">
      <div class="container mt-3 mb-3">
         <ul class="nav navbar-nav" style="width: 100%">
            <li class="nav-item" style="width: 50%">
               <div class="d-inline">
                  <img src="./dist/img/logo/logo-yazaki.png" class="img-fluid img-responsive" width="250px" height="100%">   
               </div>
            </li>
            <li class="nav-item" style="width: 50%; text-align: right">
               <a href="./login.php" class="btn btn-success btn-lg">
                  <i class="nav-icon fas fa-sign-in-alt mr-2"></i>
                  Login
               </a>
            </li>
         </ul>
      </div>
   </nav>

   <div id="container">
      <div class="container-fluid p-3 mt-2 mb-3">
         <div class="card" style="transition: all 0.15s ease 0s; height: inherit; width: inherit;">
            <div class="card-body">
            <h3 class="text-center m-3">Loss time Warehouse periode Januari - Desember <?= date('Y') ?></h3>
               <div class="row">
                  <div class="col-md-12">
                     <div class="chart">
                        <canvas id="barChart" style="min-height: 300px; height: 300px; max-height: 300px; max-width: 100%;"></canvas>
                     </div>
                     <?php
                        $ambilBulan = getBulan(date("m"));
                     ?>
                  </div>
               </div>
            </div>
            <div class="card-footer">
               <div class="container-fluid mt-3">
                  <div class="row justify-content-center">
                     <div class="col-4">
                        <div class="small-box red-flat">
                           <div class="inner description-text ml-3">
                              <h3 style="margin-top: 0.5rem">53<sup style="font-size: 20px"> Menit</sup></h3>

                              <p>Losstime Harian (<?= date("d/M/Y") ?>)</p>
                           </div>
                           <div class="icon text-white">
                              <i class="fas fa-calendar-day mr-3"></i>
                           </div>
                        </div>
                     </div>
                     <div class="col-4">
                        <div class="small-box orange-flat">
                           <div class="inner description-text ml-3">
                              <h3 style="margin-top: 0.5rem">53<sup style="font-size: 20px"> Menit</sup></h3>

                              <p>Losstime Bulan (<?= getBulan(date("m")) ?>)</p>
                           </div>
                           <div class="icon text-white">
                              <i class="far fa-calendar-alt mr-3"></i>
                           </div>
                        </div>
                     </div>
                     <div class="col-4 ">
                        <div class="small-box green-flat">
                           <div class="inner description-text ml-3">
                              <h3 style="margin-top: 0.5rem">53<sup style="font-size: 20px"> Menit</sup></h3>

                              <p>Losstime Tahun (<?= date("Y") ?>)</p>
                           </div>
                           <div class="icon text-white">
                              <i class="far fa-calendar-check mr-3"></i>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
         <footer class="footer bg-navbar-dashboard">
            <div class="container">
               <div class="row">
                  <marquee scrolldelay=60 onmouseover="this.stop()" onmouseout="this.start()">
                     <?php
                     for ($i=0; $i < 2; $i++) { 
                        echo 'Berita hari ini : ';
                        echo "<span>Lorem ipsum dolor sit amet</span>";
                        echo "<span style='margin-right:20px'></span>";
                     }
                     ?>
               </marquee>
            </div>
         </div>   
      </footer>
   </div>
   <!-- jQuery -->
   <script src="./plugins/jquery/jquery.min.js"></script>
   <!-- ChartJS -->
   <script src="./plugins/chart.js/Chart.min.js"></script>

   <script>
      var ctx = document.getElementById("barChart");
      var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
         labels: <?=$bulan?>,
         datasets: [{
            label: 'Losstime',
            data: <?=$lossTime?>,
            backgroundColor: '#3498DB',
            borderColor: '#e3e5ea',
            borderWidth: 1
         }]
      },
      options: {
            responsive              : true,
            maintainAspectRatio     : false,
            datasetFill             : true,
            
            scales: {
               xAxes: [{
                  ticks: {
                     maxRotation: 100,
                     minRotation: 0
                  }
               }],
               yAxes: [{
                  ticks: {
                     beginAtZero: true
                  }
               }]
            }
         }
      });
   </script>
   
   </body>
</html>