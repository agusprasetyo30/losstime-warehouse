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
                        <?php
                           $nomer = 1;
                           foreach ($data->showAllLostimeByMonthYear($_GET['bulan'], $_GET['tahun']) as $file) {
                        ?>
                        <tr>
                           <td><?= $nomer++ ?></td>
                           <td><?= $file['line'] ?></td>
                           <td><?= $file['shift'] ?></td>
                           <td><?= $file['masalah'] ?></td>
                           <td><?= $file['jml_losstime'] ?></td>
                           <!-- <td><?= date_format($file['created_at'], "d-M-Y") ?></td> -->
                        </tr>
                        <?php } ?>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
</div>