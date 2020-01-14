<div class="container-fluid">
   <div class="row">
      <div class="col-md-6">
         <div>Jumlah menit : </div>
         <div class="jumlah-losstime-harian">
            <?= 10 ?> Menit
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
                        <th>Jumlah Menit</th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr>
                        <td>1. </td>
                        <td>A42</td>
                        <td>Pagi</td>
                        <td>Supplay Terlambat Datang</td>
                        <td>3</td>
                     </tr>
                     <tr>
                        <td>2. </td>
                        <td>A42</td>
                        <td>Malam</td>
                        <td>Terlambat Datang</td>
                        <td>10</td>
                     </tr>
                     <tr>
                        <td>3. </td>
                        <td>A42</td>
                        <td>Pagi</td>
                        <td>Terlambat Datang</td>
                        <td>10</td>
                     </tr>
                     <tr>
                        <td>4. </td>
                        <td>A42</td>
                        <td>Pagi</td>
                        <td>Terlambat Datang</td>
                        <td>10</td>
                     </tr>
                     <tr>
                        <td>5. </td>
                        <td>A42</td>
                        <td>Malam</td>
                        <td>Terlambat Datang</td>
                        <td>10</td>
                     </tr>
                     <tr>
                        <td>6. </td>
                        <td>A42</td>
                        <td>Pagi</td>
                        <td>Terlambat Datang</td>
                        <td>10</td>
                     </tr>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</div>
