<!-- Mengambil data losstime berdasarkan ID -->
<?php $losstime = $data->getLosstimeByID($_GET['id']); ?>

<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-10">
         <div class="card card-default mt-2">
            <div class="card-header">
               <h3 class="card-title mt-2">
                  <i class="fas fa-pencil-alt mr-2"></i>
                  Edit Losstime <i>
                     <!-- Menampilkan status update atau tidak update -->
                     (<?= $losstime['updated_at'] != NUll ? 'Last Updated : '.date("d-M-Y", strtotime($losstime['updated_at'])).' [<b>'.$losstime['nama'].'</b>]' : 'Not edited yet' ?>)</i> 
                     <br>
                  <?php

                     // Mengambil bulan dan tahun
                     $bulan =  date("m", strtotime($losstime['created_at']));
                     $tahun = date("Y", strtotime($losstime['created_at']));
                  ?>
               </h3>
               <!-- Jika edit pada losstime harian -->
               <?php if ($_GET['type'] == 'edit-losstime-harian') { ?>
                  <a href="./losstime.php?type=harian" class="btn btn-warning float-right">
                     <i class="fas fa-undo mr-2"></i>
                     Kembali
                  </a>

               <?php } else if ($_GET['type'] == 'edit-losstime-bulanan') { ?>
                  <a href="./losstime.php?type=detail&bulan=<?= $bulan ?>&tahun=<?= $tahun ?>" class="btn btn-warning float-right">
                     <i class="fas fa-undo mr-2"></i>
                     Kembali
                  </a>
               <?php } ?>

            </div>
            <div class="container-fluid">
               <div class="card-body">
                  <form action="" method="post">
                     <div class="row justify-content-center mt-2">
                        <div class="col-md-6" style="border-right: 1px solid lightgrey">
                           <!-- DAFTAR LINE -->
                           <div class="form-group" style="margin-right: 30px">
                              <label for="line" class="label-input-losstime">Line</label>
                              <select name="line" id="line" autofocus=on class="form-control select-input-losstime select2" style="width: 100%" required>
                                 <option value="" disabled>Pilih Line</option>
                                 <?php 
                                    foreach ($data->getLineDB() as $file) {
                                 ?>

                                 <option value="<?= $file['nama_line'] ?>"  <?= $losstime['line'] == $file['nama_line'] ? ' selected' : '' ?> ><?= $file['nama_line'] ?></option>

                                 <?php } ?>
                              </select>
                           </div>

                           <!-- DAFTAR SHIFT -->
                           <div class="form-group mt-4" style="margin-right: 30px">
                              <label for="shift" class="label-input-losstime">Shift</label>
                              <select name="shift" id="shift" class="form-control select-input-losstime select2" style="width: 100%"
                                 autofocus=on required>
                                 
                                 <option value="" selected disabled>Pilih Shift</option>
                                 <option value="PAGI" <?= $losstime['shift'] == 'PAGI' ? ' selected' : '' ?> >Pagi</option>
                                 <option value="MALAM" <?= $losstime['shift'] == 'MALAM' ? ' selected' : '' ?>>Malam</option>
                              </select>
                           </div>

                           <!-- DAFTAR JAM KERJA -->
                           <div class="form-group mt-4" style="margin-right: 30px">
                              <label for="jam_kerja" class="label-input-losstime">Jam Kerja</label>
                              <select name="jam_kerja" id="jam_kerja" class="form-control select-input-losstime select2" style="width: 100%"
                                 autofocus=on required>
                                 
                                 <option value="" selected disabled>Pilih Jam Kerja</option>
                                 
                                 <?php for ($i=1; $i <= 8 ; $i++) { ?> 
                                    <option value="<?= $i ?>" <?= $losstime['jam_kerja'] == $i ? ' selected' : '' ?>><?= $i ?></option> 
                                 <?php } ?>
                              </select>
                           </div>

                        </div>
                        <div class="col-md-6">
                           <!-- DAFTAR MASALAH -->
                           <div class="form-group" style="margin-left: 30px">
                              <label for="masalah" class="label-input-losstime">Masalah</label>
                              <select name="masalah" id="masalah" class="form-control select-input-losstime select2" style="width: 100%"
                                 autofocus=on required>
                                 
                                 <option value="" selected disabled>Pilih Masalah Kerja</option>
                                 <?php foreach ($data->showMasalahLine() as $list) { 
                                    $masalah = "[ " .$list['kode_masalah']. " ] " .$list['masalah']; // menggabungkan antara kode masalah dan masalah pada tabel masalah_line
                                 ?>
                                    <option value="<?= $masalah ?>" <?= $losstime['masalah'] == $masalah ? ' selected' : '' ?> ><?= $masalah ?></option>                                 
                                 <?php } ?>
                              </select>
                           </div>
                           <!-- INPUT LOSSTIME -->
                           <div class="form-group mt-4" style="margin-left: 30px">
                              <label for="jumlah_losstime" class="label-input-losstime">Jumlah Losstime (Dalam Menit)</label>
                              <div class="input-group">
                                 <div class="input-group-prevend">
                                    <button type="button" class="btn btn-danger" id="btn-kurang">
                                       <i class="fa fa-minus" aria-hidden="true"></i>
                                    </button>
                                 </div>

                                 <input type="number" name="jumlah_losstime" placeholder="Tambahkan jumlah losstime" autocomplete="off" required
                                    id="jumlah-losstime" class="form-control jumlah-input-losstime" min="0" maxlength="3" value="<?= $losstime['jml_losstime'] ?>">
                                 
                                 <div class="input-group-prevend">
                                    <button type="button" class="btn btn-success" id="btn-tambah">
                                       <i class="fa fa-plus" aria-hidden="true"></i>
                                    </button>
                                 </div>
                              </div>
                           </div>
                           <input type="hidden" name="bulan" value="<?= $bulan ?>">
                           <input type="hidden" name="tahun" value="<?= $tahun ?>">
                           <input type="hidden" name="updated_at" value="<?= date('Y-m-d H:i:s'); ?>">
                           <input type="hidden" name="updated_by" value="<?= $_SESSION['id'] ?>">
                           <div class="form-group mt-4" style="margin-left: 30px;">
                              <button type="submit" name="simpan" class="btn btn-success btn-block" style="height: 75px; font-size: 20px">
                                 <i class="fas fa-pencil-alt mr-2"></i>
                                 Simpan Perubahan
                              </button>
                           </div>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
