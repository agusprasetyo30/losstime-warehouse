<div class="card card-default mt-2">
      <div class="card-header">
         <h3 class="card-title">
            <i class="far fa-calendar-alt"></i>
            Tabel detail losstime <?= "( " . $data->getBulan($_GET['bulan']) . " " . $_GET['tahun'] . "  )" ?>
         </h3>
      </div>
      <div class="card-body">
         <div class="container-fluid">
            <div class="row">
               <div class="col-md-12 col-sm-12 mb-3">
                  <table id="example3" class="table table-bordered table-striped table-hover text-center">
                     <thead>
                        <tr>
                           <th style="width: 30px">#</th>
                           <th>Nomer Line</th>
                           <th>Shift</th>
                           <th style="width: 400px">Masalah</th>
                           <th>Jumlah Menit</th>
                           <th>Periode</th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr>
                           <td>1. </td>
                           <td>A42</td>
                           <td>Pagi</td>
                           <td>Supplay Terlambat Datang</td>
                           <td>3</td>
                           <td>3 Januari 2020</td>
                        </tr>
                        <tr>
                           <td>2. </td>
                           <td>A42</td>
                           <td>Malam</td>
                           <td>Terlambat Datang</td>
                           <td>10</td>
                           <td>4 Januari 2020</td>
                        </tr>
                        <tr>
                           <td>3. </td>
                           <td>A42</td>
                           <td>Pagi</td>
                           <td>Terlambat Datang</td>
                           <td>10</td>
                           <td>4 Januari 2020</td>
                        </tr>
                        <tr>
                           <td>4. </td>
                           <td>A42</td>
                           <td>Pagi</td>
                           <td>Terlambat Datang</td>
                           <td>10</td>
                           <td>6 Januari 2020</td>
                        </tr>
                        <tr>
                           <td>5. </td>
                           <td>A42</td>
                           <td>Malam</td>
                           <td>Terlambat Datang</td>
                           <td>10</td>
                           <td>7 Januari 2020</td>
                        </tr>
                        <tr>
                           <td>6. </td>
                           <td>A42</td>
                           <td>Pagi</td>
                           <td>Terlambat Datang</td>
                           <td>10</td>
                           <td>8 Januari 2020</td>
                        </tr>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
</div>