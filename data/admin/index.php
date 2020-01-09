<?php
   $title= "Dashboard";
   $menu = "Dashboard";
   $link_menu = "index.php";
   $location = "Dashboard";

   $data_onTime = [28, 48, 40, 19, 86, 27, 20, 30, 20, 50, 40, 30];
   $data_lossTime = [65, 59, 80, 81, 56, 55, 40, 20, 30, 40, 50, 20];
   $data_bulan = ['Januari', 'Pebruari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'Nopember', 'Desember'];

   $bulan = json_encode($data_bulan, JSON_NUMERIC_CHECK);
   $onTime = json_encode($data_onTime, JSON_NUMERIC_CHECK);
   $lossTime = json_encode($data_lossTime, JSON_NUMERIC_CHECK);

   $status_nav_dashboard = 'active';
?>
   <?php include_once "./template/header.php" ?>

   <!-- Konten Utama -->
         <div class="container-fluid">
            <?php // Mencoba cek lokasi 

            ?>
            <!-- Small boxes (Stat box) -->
            <div class="row">
               <div class="col-lg-3 col-6">
               <!-- small box -->
               <div class="small-box bg-info">
                  <div class="inner">
                     <h3>150</h3>

                     <p>New Orders</p>
                  </div>
                  <div class="icon">
                     <i class="ion ion-bag"></i>
                  </div>
                  <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
               </div>
               </div>
               <!-- ./col -->
               <div class="col-lg-3 col-6">
               <!-- small box -->
               <div class="small-box bg-success">
                  <div class="inner">
                     <h3>53<sup style="font-size: 20px">%</sup></h3>

                     <p>Bounce Rate</p>
                  </div>
                  <div class="icon">
                     <i class="ion ion-stats-bars"></i>
                  </div>
                  <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
               </div>
               </div>
               <!-- ./col -->
               <div class="col-lg-3 col-6">
               <!-- small box -->
               <div class="small-box bg-warning">
                  <div class="inner">
                     <h3>44</h3>

                     <p>User Registrations</p>
                  </div>
                  <div class="icon">
                     <i class="ion ion-person-add"></i>
                  </div>
                  <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
               </div>
               </div>
               <!-- ./col -->
               <div class="col-lg-3 col-6">
               <!-- small box -->
               <div class="small-box bg-danger">
                  <div class="inner">
                     <h3>65</h3>

                     <p>Unique Visitors</p>
                  </div>
                  <div class="icon">
                     <i class="ion ion-pie-graph"></i>
                  </div>
                  <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
               </div>
               </div>
            </div>
            
            <div class="row">
               <div class="col-md-12">
                  <div class="card card-primary" style="transition: all 0.15s ease 0s; height: inherit; width: inherit;">
                     <div class="card-header">
                        <h3 class="card-title" >Grafik On Time & Loss Time (2020)</h3>

                        <div class="card-tools">
                           <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus "></i></button>
                        </div>
                     </div>
                     <!-- /.card-header -->
                     <div class="card-body">
                        <div class="chart">
                           <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>

                        <!-- Tabel jumlah -->
                        <table class="table table-bordered table-striped table-hover text-center mt-2">
                           <thead>
                              <td colspan=4 style="font-size: 20px">
                                 Daftar Tabel On Time & Loss Time                              
                              </td>
                              <tr>
                                 <th style="width: 10px">#</th>
                                 <th>On Time</th>
                                 <th>Loss Time</th>
                                 <th>Bulan</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php
                                 for ($i=0; $i < count($data_bulan); $i++) {
                              ?>

                              <tr>
                                 <td><?=$i + 1?>. </td>
                                 <td><?=$data_onTime[$i]?> </td>
                                 <td><?=$data_lossTime[$i]?></td>
                                 <td><?=$data_bulan[$i]?></td>
                              </tr>

                              <?php
                                 } 
                              ?>
                              
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </div>

         </div>

   <!-- Data Footer -->
   <?php include_once "./template/footer.php" ?>

<script>
var areaChartData = {
   labels  : <?=$bulan?>,
   datasets: [
      {
         label               : 'ON TIME',
         backgroundColor     : 'rgba(60,141,188,0.9)',
         borderColor         : 'rgba(60,141,188,0.8)',
         pointRadius         : false,
         pointColor          : '#3b8bba',
         pointStrokeColor    : 'rgba(60,141,188,1)',
         pointHighlightFill  : '#fff',
         pointHighlightStroke: 'rgba(60,141,188,1)',
         data                : <?=$onTime?>,
      },
      {
         label               : 'LOSS TIME',
         backgroundColor     : 'rgba(210, 214, 222, 1)',
         borderColor         : 'rgba(210, 214, 222, 1)',
         pointRadius         : false,
         pointColor          : 'rgba(210, 214, 222, 1)',
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
   var temp1 = areaChartData.datasets[1]
   barChartData.datasets[0] = temp0
   barChartData.datasets[1] = temp1

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

