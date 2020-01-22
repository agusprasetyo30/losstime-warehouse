<?php
   // Memanggil class dan membuat object baru berdasarkan class yang dibuat pada folder class
   include_once "../class/dataDB.php";
   $data = new DataDB();

   $title= "Dashboard";
   $menu = "Dashboard";
   $link_menu = "index.php";
   $location = "Dashboard";

   // memasukan data ke dalam array
   $data_lossTime = $data->getDataGrafikLosstime(date('Y'));
   $data_bulan = ['Januari', 'Pebruari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'Nopember', 'Desember'];
   
   // merubah data array menjadi JSON
   $bulan = json_encode($data_bulan, JSON_NUMERIC_CHECK);
   $lossTime = json_encode($data_lossTime, JSON_NUMERIC_CHECK);

   $status_nav_dashboard = 'active';
   
?>
   
   <?php include_once "./template/header.php" ?>
   
   <!-- Konten Utama -->
         <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
               <div class="col-lg-4 col-12">
               <!-- small box -->
               <div class="small-box bg-info">
                  <div class="inner">
                     <a href="./losstime.php?type=harian" class="box-link">
                        <h3><?= $data->countLosstimeByDay(date('Y-m-d')) ?> <sup style="font-size: 20px">Menit</sup></h3>
                        
                        <p>Losstime Hari Ini (<?= date('d/m/Y') ?>)</p>
                     </a>
                  </div>
                  <div class="icon">
                     <i class="ion ion-bag"></i>
                  </div>
                  <a href="./losstime.php?type=harian" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
               </div>
               </div>
               <!-- ./col -->
               <div class="col-lg-4 col-12">
               <!-- small box -->
               <div class="small-box bg-success">
                  <div class="inner">
                     <a class="box-link" href="./losstime.php?type=detail&bulan=<?=date('m')?>&tahun=<?=date('Y')?>">

                        <h3><?= $data->showLosstimeByMonthYear(date('m'), date('Y'))['jumlah_menit'] == NULL ? 0 : $data->showLosstimeByMonthYear(date('m'), date('Y'))['jumlah_menit'] ?> <sup style="font-size: 20px">Menit</sup></h3>
                        
                        <p>Losstime Bulan (<?= $data->getBulan(date('m')) ?>)</p>
                     </a>
                  </div>
                  <div class="icon">
                     <i class="ion ion-stats-bars"></i>
                  </div>
                  <a href="./losstime.php?type=detail&bulan=<?=date('m')?>&tahun=<?=date('Y')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
               </div>
               </div>
               <!-- ./col -->
               <div class="col-lg-4 col-12">
               <!-- small box -->
               <div class="small-box bg-danger">
                  <div class="inner">
                     <a class="box-link" href="./losstime.php?type=bulanan">
                        <h3><?= $data->countLosstimeByYear(date('Y')) ?> <sup style="font-size: 20px">Menit</sup></h3>
                        
                        <p>Losstime Tahun (<?=date('Y')?>)</p>
                     </a>
                  </div>
                  <div class="icon">
                     <i class="ion ion-person-add"></i>
                  </div>
                  <a href="./losstime.php?type=bulanan" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
               </div>
               </div>
            </div>
            
            <div class="row">
               <div class="col-md-12">
                  <div class="card card-primary" style="transition: all 0.15s ease 0s; height: inherit; width: inherit;">
                     <div class="card-header">
                        <h3 class="card-title" >Grafik Loss Time (2020)</h3>

                        <div class="card-tools">
                           <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus "></i></button>
                        </div>
                     </div>
                     <!-- /.card-header -->
                     <div class="card-body">
                        <div class="chart">
                           <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                     </div>
                     <div class="card-footer">
                        <!-- Tabel jumlah -->
                        <table class="table table-bordered table-striped table-hover text-center mt-2">
                           <thead>
                              <td colspan=4 style="font-size: 20px">
                                 Daftar Tabel Loss Time                              
                              </td>
                              <tr>
                                 <th style="width: 10px">#</th>
                                 <th>Loss Time</th>
                                 <th>Bulan</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php
                                 // Melakukan perulangan untuk menampilkan ke tabel
                                 for ($i=0; $i < count($data_bulan); $i++) {
                              ?>

                              <tr>
                                 <td><?=$i + 1?>. </td>
                                 <td><?=$data_lossTime[$i]?></td>
                                 <td><?=$data_bulan[$i] ." ". date('Y')?></td>
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
         </div>

   <!-- Data Footer -->
<?php include_once "./template/footer.php" ?>

<script>
   var ctx = document.getElementById("barChart");
   var myChart = new Chart(ctx, {
   type: 'bar',
   data: {
      labels: <?=$bulan?>,
      datasets: [{
         label: '# Losstime',
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
      },
   });
</script>