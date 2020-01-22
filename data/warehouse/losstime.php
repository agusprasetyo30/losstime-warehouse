<?php
   // ini_set("display_errors", 1)

   include "../class/dataDB.php";
   $data = new DataDB();

   $minggu = $data->getWeekLosstimeByMonthYear($_GET['bulan'], $_GET['tahun']);
   $jumlah_menit = $data->getJumlahLosstimeByMonthYear($_GET['bulan'], $_GET['tahun']);

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
   
   } else if ($_GET['type'] == 'detail') {
      $title= "Detail Losstime";
      $menu = "Detail Losstime ( " . $data->getBulan($_GET['bulan']) . " " . $_GET['tahun'] . "  )";
      $link_menu = "losstime.php?type=bulanan";
      $location = "Index";
      
   } else if ($_GET['type'] == 'edit-losstime-harian') {
      $title= "Edit Losstime Harian";
      $menu = "Edit Losstime Harian";
      $link_menu = "losstime.php?type=edit-losstime-harian";
      $location = "Index";
   }

   include_once "./template/header.php";
?>

<link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.css">


<?php
   if ($_GET['type'] == 'harian') {
      include_once "./losstime/harian.php";

   } else if ($_GET['type'] == 'bulanan') {
      include_once "./losstime/bulanan.php";
   
   } else if ($_GET['type'] == 'detail') {
      include_once "./losstime/detail_bulanan.php";
   
   } else if ($_GET['type'] == 'edit-losstime-harian' || $_GET['type'] == 'edit-losstime-bulanan') {
      include_once "./losstime/edit_losstime.php";
   }
?>

<?php include_once "./template/footer.php" ?>

<!-- DataTablesLibrary -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>

<!-- Custom Javascript -->

<script>
   /** Untuk DataTable
    * 
    */
    $(function () {
      $('#example1').DataTable({
         "paging": true,
         "lengthChange": false,
         "searching": false,
         "ordering": true,
         "info": false,
         "autoWidth": false,
      });

      $('#example2').DataTable({
         "paging": true,
         "lengthChange": true,
         "searching": true,
         "ordering": true,
         "info": true,
         "autoWidth": false,
      });

      $('#example3').DataTable({
         "paging": true,
         "lengthChange": true,
         "searching": true,
         "ordering": true,
         "info": true,
         "autoWidth": false,
      });
   });
</script>

<script>

   /** Untuk Chart
    *
    */
   var ctx = document.getElementById("barChart");
   var myChart = new Chart(ctx, {
   type: 'bar',
   data: {
      labels: <?= $minggu ?>,
      datasets: [{
         label: '# Losstime',
         data: <?= $jumlah_menit ?>,
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
                  labelString: 'Jumlah Losstime Per Minggu (dalam menit)'
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
         animation: { // Menampilkan data di atas chart
            // duration : 2,

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
                           var data = dataset.data[index] + " Menit";
                           ctx.fillText(data, bar._model.x, bar._model.y);
                        }
                  });
               });
            }
         }
      },
   });
</script>

<script>
   /** Untuk menambahkan dan mengurangi jumlah losstime
    * 
    */
   $(function() {
      var hitung = 0;
      
      // Tombol tambah
      $('#btn-tambah').click(function() {
         var jumlah = document.getElementById('jumlah-losstime').value

         if (parseInt(jumlah) >= 0) {
            hitung = parseInt(jumlah) + 1
         }

         document.getElementById('jumlah-losstime').value = hitung
      });

      // Tombol kurang
      $('#btn-kurang').click(function() {
         var jumlah = document.getElementById('jumlah-losstime').value

         if (parseInt(jumlah) > 0) {
            hitung = parseInt(jumlah) - 1
         }

         document.getElementById('jumlah-losstime').value = hitung
      })

      // Untuk menginisialisasi select2
      $('.select2').select2()
   });
</script>

</script>