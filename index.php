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

      <link rel="stylesheet" href="./dist/css/adminlte.min.css">

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

   <body>
      <div class="container-fluid valign">
         <h3 class="text-center m-3">Loss time Warehouse PT. Surabaya Autocomp Indonesia</h3>
         <div class="row">
            <div class="col-md-12">
               <div class="card card-success" style="transition: all 0.15s ease 0s; height: inherit; width: inherit;">
                  <div class="card-body">
                     <div class="chart">
                        <canvas id="barChart" style="min-height: 400px; height: 400px; max-height: 400px; max-width: 100%;"></canvas>
                     </div>


                  </div>
                  <?php
                     $ambilBulan = getBulan(date("m"));
                  ?>
               </div>
            </div>
         </div>
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