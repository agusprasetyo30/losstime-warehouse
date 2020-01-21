<?php
   $data_losstime = [];

   $losstime = json_encode($data_lossTime, JSON_NUMERIC_CHECK);
?>
<div class="card card-default mt-2">
   <div class="card-header">
      <h3 class="card-title mt-2">
         <i class="far fa-calendar-alt"></i>
         Tabel detail losstime <?= "( " . $data->getBulan($_GET['bulan']) . " " . $_GET['tahun'] . "  )" ?>
      </h3>

      <a href="./losstime.php?type=bulanan" class="btn btn-warning float-right">
         <i class="nav-icon fas fa-undo"></i>
         Kembali
      </a>
   </div>
   <div class="card-body">
   <?php

      // print_r($data->getJumlahLosstimeByMonthYear(date('m'), date('Y')));
      // die();
   ?>
      <div class="chart">
         <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
      </div>
   </div>
   <div class="card-footer">
      <div class="container-fluid">
         <div class="row">
            <div class="col-md-12 col-sm-12 mb-3">
               <table id="example3" class="table table-bordered table-striped table-hover text-center">
                  <thead>
                     <tr>
                        <th style="width: 30px; vertical-align: middle">#</th>
                        <th style="vertical-align: middle">Nomer Line</th>
                        <th style="vertical-align: middle">Shift</th>
                        <th style="width: 400px; vertical-align: middle">Masalah</th>
                        <th style="vertical-align: middle">Jumlah Menit</th>
                        <th style="vertical-align: middle">Periode</th>
                        <th style="vertical-align: middle">User Input</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                        $nomer = 1;
                        foreach ($data->showAllLostimeByMonthYear($_GET['bulan'], $_GET['tahun']) as $file) {
                     ?>
                     <tr>
                        <td style="vertical-align: middle"><?= $nomer++ ?>.</td>
                        <td style="vertical-align: middle"><b><?= $file['line'] ?></b></td>
                        <td style="vertical-align: middle"><?= $file['shift'] == 'PAGI' ? "<span class='label bg-success'>$file[shift]</span>" : "<span class='label bg-primary'>$file[shift]</span>" ?></td>
                        <td style="text-align: left; vertical-align: middle"><?= $file['masalah'] ?></td>
                        <td style="vertical-align: middle"><?= $file['jml_losstime'] ?></td>
                        <td style="vertical-align: middle"><?= date("d", strtotime($file['created_at'])) .'/'. $data->getBulan(date("m", strtotime($file['created_at']))) .'/'. date("Y", strtotime($file['created_at'])) ?></td>
                        <td style="vertical-align: middle"><?= explode(' ', $file['nama'])[0] .' '. explode(' ', $file['nama'])[1] .' '. explode(' ', $file['nama'])[2] ?></td>
                     </tr>
                     <?php } ?>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</div>
