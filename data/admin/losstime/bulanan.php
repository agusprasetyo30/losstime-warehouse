<div class="container-fluid">
   <div class="row">
      <div class="col-md-12">
         <!-- Untuk pencarian data berdasarkan bulan dan tahun -->
         <form action="" method="get">
            <!-- Mengambil type melalui GET -->
            <input type="hidden" name="type" value="<?=$_GET['type']?>">
            <label>Cari Berdasarkan bulan & tahun : </label>
            
            <div class="input-group">
               <!-- List View Bulan -->
               <div class="form-group">
                  <label for="bulan" style="font-weight: normal">Bulan </label>
                  <select name="bulan" id="bulan" class="form-control btn-cari">
                     <option value="01" <?= $_GET['bulan'] == 1 ? 'selected' : '' ?> >Januari</option>
                     <option value="02" <?= $_GET['bulan'] == 2 ? 'selected' : '' ?>>Pebruari</option>
                     <option value="03" <?= $_GET['bulan'] == 3 ? 'selected' : '' ?>>Maret</option>
                     <option value="04" <?= $_GET['bulan'] == 4 ? 'selected' : '' ?>>April</option>
                     <option value="05" <?= $_GET['bulan'] == 5 ? 'selected' : '' ?>>Mei</option>
                     <option value="06" <?= $_GET['bulan'] == 6 ? 'selected' : '' ?>>Juni</option>
                     <option value="07" <?= $_GET['bulan'] == 7 ? 'selected' : '' ?>>Juli</option>
                     <option value="08" <?= $_GET['bulan'] == 8 ? 'selected' : '' ?>>Agustus</option>
                     <option value="09" <?= $_GET['bulan'] == 9 ? 'selected' : '' ?>>September</option>
                     <option value="10" <?= $_GET['bulan'] == 10 ? 'selected' : '' ?>>Oktober</option>
                     <option value="11" <?= $_GET['bulan'] == 11 ? 'selected' : '' ?>>Nopember</option>
                     <option value="12" <?= $_GET['bulan'] == 12 ? 'selected' : '' ?>>Desember</option>
                  </select>
               </div>

               <!-- List View Tahun -->
               <div class="form-group ml-2">
                  <label for="tahun" style="font-weight: normal">Tahun</label>
                  <select name="tahun" id="tahun" class="form-control btn-cari">
                     <option value="2020" <?= $_GET['tahun'] == 2020 ? 'selected' : '' ?> >2020</option>
                     <option value="2021" <?= $_GET['tahun'] == 2021 ? 'selected' : '' ?> >2021</option>
                     <option value="2022" <?= $_GET['tahun'] == 2022 ? 'selected' : '' ?> >2022</option>
                     <option value="2023" <?= $_GET['tahun'] == 2023 ? 'selected' : '' ?> >2023</option>
                     <option value="2024" <?= $_GET['tahun'] == 2024 ? 'selected' : '' ?> >2024</option>
                     <option value="2025" <?= $_GET['tahun'] == 2025 ? 'selected' : '' ?> >2025</option>
                  </select>
               </div>

               <!-- Tombol Cari -->
               <div class="form-group ml-2">
                  <label>&nbsp;</label>
                  <button type="submit" id="cari" class="btn btn-success form-control">
                     <i class="fa fa-search" aria-hidden="true"></i>
                     Cari
                  </button>
               </div>

               <!-- Tombol Clear -->
               <div class="form-group ml-1">
                  <label>&nbsp;</label>
                  <a href="./losstime.php?type=bulanan" class="btn btn-danger form-control">
                     <i class="nav-icon fa fa-undo" aria-hidden="true"></i>
                     Default
                  </a>
               </div>
            </div>
         </form>
      </div>
   </div>
</div>
<?php
   
?>

<div class="container-fluid mb-3">
   <div class="card card-default mt-2">
   <div class="card-header">
      <h3 class="card-title">
         <i class="far fa-calendar-alt"></i>
         Tabel Losstime Bulanan
      </h3>
   </div>
   <div class="card-body">
         <div class="row">
            <div class="col-md-12 col-sm-12">
               <table id="example2" class="table table-bordered table-striped table-hover text-center">
                  <thead>
                     <tr>
                        <th style="width: 30px">#</th>
                        <th>Jumlah Line</th>
                        <th>Total Losstime (Menit)</th>
                        <th>Periode</th>
                        <th style="width: 90px">Aksi</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                        if ($_GET['bulan'] != null && $_GET['tahun'] != null) {
                        
                        $file = $data->showLosstimeByMonthYear($_GET['bulan'], $_GET['tahun']);

                           if ($file != null) {
                     ?>

                     <tr>
                        <td>1.</td>
                        <td><?= $file['jumlah_line'] ?></td>
                        <td><?= $file['jumlah_menit'] ?></td>
                        <td><span class="label bg-primary"><?=  $data->getBulan($file['month']) .' '. $file['year'] ?></span></td>
                        <td>
                           <a href="losstime.php?type=detail&bulan=<?=$file['month']?>&tahun=<?=$file['year']?>" class="btn btn-primary btn-sm">
                              <i class="fa fa-list" aria-hidden="true"></i>
                              Cek Detail
                           </a>
                        </td>
                     </tr>
                        <?php } ?>

                     <?php } else { ?>

                     <?php
                        $nomer = 1;
                        foreach ($data->showLosstimeByMonth() as $file) {
                     ?>
                     <tr>
                        <td><?= $nomer++ ?>. </td>
                        <td><?= $file['jumlah_line'] ?></td>
                        <td><?= $file['jumlah_menit'] ?></td>
                        <td><span class="label bg-primary"><?=  $data->getBulan($file['month']) .' '. $file['year'] ?></span></td>
                        <td>
                           <a href="losstime.php?type=detail&bulan=<?=$file['month']?>&tahun=<?=$file['year']?>" class="btn btn-primary btn-sm">
                              <i class="fa fa-list" aria-hidden="true"></i>
                              Cek Detail
                           </a>
                        </td>
                     </tr>
                     <?php 
                        } 
                     }
                     ?>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</div>