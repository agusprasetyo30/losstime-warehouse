<?php
   /**
       * Harap di baca readme di github sebelum di update ya . .
       * Salam Agus Prasetyo, MI-3B Angkatan 2017
       * 
       * Github        : agusprasetyo30
       * Github Link   : https://github.com/agusprasetyo30
       * Email        : agusprasetyo1889@gmail.com
    */
   session_start();
   // ini_set("display_errors", 1);

   include_once "./data/class/dataDB.php";

   // Membuat object baru
   $data = new dataDB();

   $tahunSekarang = date("Y");
   $bulanSekarang = date("m");
   $tanggalSekarang = date("Y-m-d");

   // memasukan data ke dalam array
   $data_lossTime = $data->getDataGrafikLosstime($tahunSekarang);
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
      <!-- Auto reload 1 menit -->
      <meta http-equiv="refresh" content="60">
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
      <!-- Sweetalert2 -->
      <link rel="stylesheet" href="./plugins/sweetalert2/sweetalert2.min.css">
   </head>

   <body class="main-content-dashboard" style="height: 100%; max-height: 100%">
   <!-- Navbar atas -->
   <nav class="navbar navbar-expand bg-navbar-dashboard">
      <div class="container-fluid mt-3 mb-3 ml-3 mr-3">
         <ul class="nav navbar-nav" style="width: 100%">
            <li class="nav-item" style="width: 50%">
               <div class="d-inline">
                  <img src="./dist/img/logo/logo-sai.png" class="img-fluid img-responsive" width="320px" height="100%">   
               </div>
            </li>
            <li class="nav-item" style="width: 50%; text-align: right">
               <?php if ($_SESSION['id_karyawan'] == NULL) { ?>
                  <a href="./login.php" class="btn btn-success btn-lg">
                     <i class="nav-icon fas fa-sign-in-alt mr-2"></i>
                     Login
                  </a>
               <?php } else { ?>
                  <form action="" method="post">
                     <!-- Mengecek session apakah yang masuk admin atau operator -->
                     <?php if ($_SESSION['akses'] == 'ADMIN') { ?>
                        <a href="./data/warehouse/" class="btn btn-primary btn-lg mr-2">
                           <i class="nav-icon fa fa-arrow-right mr-2" aria-hidden="true"></i>
                           Panel Admin
                        </a>
                     <?php } else { ?>
                        <a href="./data/warehouse/" class="btn btn-primary btn-lg mr-2">
                           <i class="nav-icon fa fa-arrow-right mr-2" aria-hidden="true"></i>
                           Panel Operator
                        </a>
                     <?php } ?>

                     <button type="submit" class="btn btn-danger btn-lg" name="logout">
                        <i class="nav-icon fas fas fa-door-open mr-2"></i>
                        Logout
                     </button>
                  </form>
               <?php } ?>
            </li>
               
         </ul>
      </div>
   </nav>
   <div id="container">
      <div class="container-fluid p-3 ">
         <div class="card" style="transition: all 0.15s ease 0s; height: inherit; width: inherit;">
            <div class="card-body">
            <h3 class="text-center m-3">Loss time Warehouse periode Januari - Desember <?= $tahunSekarang ?></h3>
               <div class="row">
                  <div class="col-md-12">
                     <div class="chart">
                        <canvas id="barChart" style="min-height: 300px; height: 300px; max-height: 300px; max-width: 100%;"></canvas>
                     </div>
                  </div>
               </div>
            </div>
            <div class="card-footer">
               <div class="container-fluid mt-3">
                  <div class="row justify-content-center">
                     <div class="col-4">
                        <div class="small-box red-flat">
                           <div class="inner description-text ml-3">
                              <h3 style="margin-top: 0.5rem"><?= $data->countLosstimeByDay($tanggalSekarang) ?>
                                 <sup style="font-size: 20px"> Menit</sup>
                              </h3>
                              <p>Losstime Harian (<?= date("d/M/Y", strtotime($tanggalSekarang)) ?>)</p>
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
                                 <?= $data->showLosstimeByMonthYear($bulanSekarang, $tahunSekarang)['jumlah_menit'] == NULL ? 0 : $data->showLosstimeByMonthYear($bulanSekarang, $tahunSekarang)['jumlah_menit'] ?>
                                 <sup style="font-size: 20px"> Menit</sup>
                              </h3>

                              <p>Losstime Bulan (<?= $data->getBulan($bulanSekarang) ?>)</p>
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
                                 <?= $data->countLosstimeByYear($tahunSekarang) ?>
                                 <sup style="font-size: 20px"> Menit</sup>
                              </h3>
                              <p>Losstime Tahun (<?= $tahunSekarang ?>)</p>
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
   </div>
   </body>

   <footer class="footer bg-navbar-dashboard">
      <div class="container">
         <div class="row">
            <!-- Text Berjalan -->
            <?php $running_text = $data->showListRunningText(); ?>
            
            <marquee scrolldelay=60 onmouseover="this.stop()" onmouseout="this.start()">
               <?php
                  for ($i=0; $i < count($running_text); $i++) {
               ?> 
                  <img src="./dist/img/logo/logo-sai-running.png" style="padding: 5px; background: white; margin-right: 5px" width=50>
                  <span style='margin-right:30px'><?= $running_text[$i]['text'] ?></span>
               <?php } ?>
            </marquee>
         </div>
      </div>   
   </footer>

   <!-- jQuery -->
   <script src="./plugins/jquery/jquery.min.js"></script>
   <!-- ChartJS -->
   <script src="./plugins/chart.js/Chart.min.js"></script>
   <!-- Sweetalert2 -->
   <script src="./plugins/sweetalert2/sweetalert2.min.js"></script>
   
   <!-- Bar chart -->
   <script type="text/javascript">
      var ctx = document.getElementById("barChart");
      var myChart = new Chart(ctx, {
         type: 'bar',
         data: {
            labels: <?=$bulan?>, // daftar Bulan
            datasets: [{
               label: 'Losstime',
               data: <?=$lossTime?>, // data yang ditampilkan
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
            layout: { // layout desain
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
   
   <script>
      // Sweetalert untuk logout
      function logout() {
         Swal.fire({
               type: 'success',
               html: 'Logout Sukses!',
               allowOutsideClick: false,
               allowEscapeKey: false,
               focusConfirm: true,
               showConfirmButton: true
               
         }).then(function() {
               window.location.href = "./",
               console.log("The OK Button was clicked");
         })
      }
   </script>

   <?php
      if (isset($_POST['logout'])) {
         if ($data->logout($_SESSION['id_karyawan'])) {
            echo "<script>logout()</script>";
         } else {
            echo '<script>alert("gagal")</script>';
         }
      }
   ?>
</html>