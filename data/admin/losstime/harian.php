<div class="container-fluid">
   <div class="row">
      <div class="col-md-6">
         <div>Jumlah menit : </div>
         <div class="jumlah-losstime-harian">
            <?= $data->countLosstimeByDay(date('Y-m-d')) ?> Menit
         </div>
      </div>
      <div class="col-md-6 text-right">
         <div>Periode :</div> 
         <div class="periode-losstime-harian">
            <?= date("d/M/Y") ?>
         </div>
      </div>
   </div>
   <div class="card card-default mt-2">
      <div class="card-header">
         <h3 class="card-title">
            <i class="fas fa-calendar-day"></i>
            Tabel Losstime Harian
         </h3>
      </div>
      <div class="card-body">
         <div class="row">
            <div class="col-md-12 col-sm-12 mb-3">
               <table id="example1" class="table table-bordered table-striped table-hover text-center">
                  <thead>
                     <tr>
                        <th style="width: 30px">#</th>
                        <th>Nomer Line</th>
                        <th>Shift</th>
                        <th style="width: 500px">Masalah</th>
                        <th style="width: 100px">Jumlah Menit</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                        $nomer = 1;
                        foreach ($data->showLosstimeByDay(date('Y-m-d')) as $file) {
                     ?>
                     <tr>
                        <td><?= $nomer++ ?>. </td>
                        <td><b><?= $file['line'] ?></b></td>
                        <td>  
                           <?= $file['shift'] == 'PAGI' ? "<span class='label bg-success'>$file[shift]</span>" : "<span class='label bg-primary'>$file[shift]</span>"  ?>
                        </td>
                        <td style="text-align: left"><?= $file['masalah'] ?></td>
                        <td ><?= $file['jml_losstime'] ?></td>
                     </tr>

                     <?php } ?>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</div>
