<?php
   // ini_set("display_errors", 1);

   include_once "./data/class/dataDB.php";

   // Membuat object baru
   $data = new dataDB();

   // memasukan data ke dalam array
   $data_lossTime = $data->getDataGrafikLosstime(date('Y'));
   $data_bulan = ['Januari', 'Pebruari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'Nopember', 'Desember'];

   // merubah data array menjadi JSON
   $bulan = json_encode($data_bulan, JSON_NUMERIC_CHECK);
   $lossTime = json_encode($data_lossTime, JSON_NUMERIC_CHECK);
?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>WAREHOUSE | PT. SAI</title>
      <!-- Tell the browser to be responsive to screen width -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="icon" href="./dist/img/logo/logo-title.png">

      <!-- Template bawaan dan bootstrap 4 -->
      <link rel="stylesheet" href="./dist/css/adminlte.min.css">
      <!-- Font Awesome -->
      <link rel="stylesheet" href="./plugins/fontawesome-free/css/all.min.css">
      <!-- Ionicons -->
      <link rel="stylesheet" href="./plugins/ion-icon/css/ionicons.min.css">
      <!-- Custom CSS -->
      <link rel="stylesheet" href="./dist/css/app.css">
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
                           $ambilBulan = $data->getBulan(date("m"));
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
                              <h3 style="margin-top: 0.5rem"><?= $data->countLosstimeByDay(date('Y-m-d')) ?>
                                 <sup style="font-size: 20px"> Menit</sup>
                              </h3>
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
                              <h3 style="margin-top: 0.5rem">
                                 <?= $data->showLosstimeByMonthYear(date('m'), date('Y'))['jumlah_menit'] == NULL ? 0 : $data->showLosstimeByMonthYear(date('m'), date('Y'))['jumlah_menit'] ?>
                                 <sup style="font-size: 20px"> Menit</sup>
                              </h3>

                              <p>Losstime Bulan (<?= $data->getBulan(date("m")) ?>)</p>
                           </div>
                           <div class="icon text-white">
                              <i class="far fa-calendar-alt mr-3"></i>
                           </div>
                        </div>
                     </div>
                     <div class="col-4 ">
                        <div class="small-box green-flat">
                           <div class="inner description-text ml-3">
                              <h3 style="margin-top: 0.5rem">
                                 <?= $data->countLosstimeByYear(date('Y')) ?>
                                 <sup style="font-size: 20px"> Menit</sup>
                              </h3>

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

                  <?php $running_text = $data->showListRunningText(); ?>
                  
                  <marquee scrolldelay=60 onmouseover="this.stop()" onmouseout="this.start()">
                     <?php
                        for ($i=0; $i < count($running_text); $i++) {
                     ?> 
                        <img src="./dist/img/logo/logo-title.png" width=50>
                        <span style='margin-right:30px'><?= $running_text[$i]['text'] ?></span>
                                                   
                     <?php } ?>
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
                     },
                     scaleLabel: {
                        display: true,
                        labelString: 'Jumlah Losstime Perbulan (dalam menit)'
                     }
                  }]
               },
            legend: {
               display: false
            },
            layout: {
               padding: {
                  left: 0,
                  right: 0,
                  top: 15,
                  bottom: 0
               },
            },
            animation: { // Menampilkan data di atas chart/label chart
               // duration : 5,
               
               onComplete : function() {
                  var chartInstance = this.chart,
                  ctx = chartInstance.ctx;

                  ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontSize, Chart.defaults.global.defaultFontStyle, Chart.defaults.global.defaultFontFamily);
                  ctx.textAlign = 'center';
                  ctx.textBaseline = 'bottom';

                  this.data.datasets.forEach(function(dataset, i) {
                     var meta = chartInstance.controller.getDatasetMeta(i);
                     meta.data.forEach(function(bar, index) {
                           if (dataset.data[index] > 0) {
                              var data = dataset.data[index]; //menampilkan data, bisa dicustom
                              ctx.fillText(data, bar._model.x, bar._model.y);
                           }
                     });
                  });
               }
            }
         }
      });
   </script>
   
   </body>
</html>