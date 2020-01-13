<?php
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
      <!-- Custom CSS -->
      <link rel="stylesheet" href="./dist/css/app.css">

      <style>
         .valign {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
         },
         body, html {
            height: 100%;
            margin: 0;
         }
      </style>
   </head>

   <body class="main-content-dashboard" style="height: 100%; max-height: 100%">
   <!-- Navbar atas -->
   <nav class="navbar navbar-expand navbar-primary">
      <div class="container mt-2 mb-2">
         <ul class="nav navbar-nav" style="width: 100%">
            <li class="nav-item" style="width: 90%">
               <h4 class="judul">PT. Surabaya Autocomp Indonesia</h4>
            </li>
            <li class="nav-item" style="width: 10%">
               <a href="#" class="btn btn-success">
                  <i class="nav-icon fas fa-sign-in-alt"></i>
                  Login
               </a>
            </li>
         </ul>
      </div>
   </nav>

   <div id="container">
      <div class="container-fluid">
         <h3 class="text-center m-3">Loss time Warehouse PT. Surabaya Autocomp Indonesia</h3>
         <div class="row">
            <div class="col-md-12">
               <div class="card card-success" style="transition: all 0.15s ease 0s; height: inherit; width: inherit;">
                  <div class="card-body">
                     <div class="chart">
                        <canvas id="barChart" style="min-height: 300px; height: 300px; max-height: 300px; max-width: 100%;"></canvas>
                     </div>
                  </div>
                  <?php
                     $ambilBulan = getBulan(date("m"));
                  ?>
               </div>
            </div>
         </div>
      </div>
         <footer class="footer ">
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
      var areaChartData = {
         labels  : <?=$bulan?>,
         datasets: [
            {
               label               : 'LOSS TIME',
               backgroundColor     : '#007efc',
               borderColor         : '#000000',
               pointRadius         : true,
               pointColor          : '#000000',
               pointStrokeColor    : '#c1c7d1',
               pointHighlightFill  : '#fff',
               pointHighlightStroke: 'rgba(220,220,220,1)',
               data                : <?=$lossTime?>,
            },
         ]
      }

      var barChartCanvas = $('#barChart').get(0).getContext('2d')
      var barChartData = jQuery.extend(true, {}, areaChartData)
      var temp0 = areaChartData.datasets[0]
      barChartData.datasets[0] = temp0

      var barChartOptions = {
         responsive              : true,
         maintainAspectRatio     : false,
         datasetFill             : true
      }

      var barChart = new Chart(barChartCanvas, {
         type: 'bar', 
         data: barChartData,
         options: barChartOptions
      });
   </script>
   </body>
</html>