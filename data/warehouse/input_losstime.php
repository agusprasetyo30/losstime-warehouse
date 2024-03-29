<?php
   // ini_set("display_errors", 0);
   $title= "Input Losstime";
   $menu = "Input Losstime";
   $link_menu = "input_losstime.php";
   $location = "Index";
   $status_nav_input = 'active';

   include_once "../class/dataDB.php";
   $data = new DataDB();

   
   include_once "./template/header.php";
   
      if ($_SESSION['akses'] == 'OPERATOR') {
         echo '<script>
            window.location.href = "./";
         </script>';
      }

?>

<hr>
<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-10">
         <div class="card card-default mt-2">
            <div class="card-header">
               <h3 class="card-title">
                  <i class="far fa-calendar-alt"></i>
                  Input Losstime
               </h3>
            </div>
            <div class="container-fluid">
               <div class="card-body">
                  <form action="" method="post">
                     <div class="row justify-content-center mt-2">
                        <div class="col-md-6" style="border-right: 1px solid lightgrey">
                           <!-- DAFTAR LINE -->
                           
                           <div class="form-group" style="margin-right: 30px">
                              <label for="line" class="label-input-losstime">Line</label>
                              <select name="line" id="line" autofocus=on class="form-control select-input-losstime select2"  required>
                                 <option value="" selected disabled>Pilih Line</option>
                                 <?php 
                                    foreach ($data->getLineDB() as $list) {
                                       echo "<option value='" . $list['nama_line'] . "' >" . $list['nama_line'] ."</option>";      
                                    }
                                 ?>      
                              </select>
                           </div>

                           <!-- DAFTAR SHIFT -->
                           <div class="form-group mt-4" style="margin-right: 30px">
                              <label for="shift" class="label-input-losstime">Shift</label>
                              <select name="shift" id="shift" class="form-control select-input-losstime select2" 
                                 autofocus=on required>
                                 
                                 <option value="" selected disabled>Pilih Shift</option>
                                 <option value="PAGI">Pagi</option>
                                 <option value="MALAM">Malam</option>
                              </select>
                           </div>

                           <!-- DAFTAR JAM KERJA -->
                           <div class="form-group mt-4" style="margin-right: 30px">
                              <label for="jam_kerja" class="label-input-losstime">Jam Kerja</label>
                              <select name="jam_kerja" id="jam_kerja" class="form-control select-input-losstime select2" 
                                 autofocus=on required>
                                 
                                 <option value="" selected disabled>Pilih Jam Kerja</option>
                                 <option value="1">1</option>
                                 <option value="2">2</option>
                                 <option value="3">3</option>
                                 <option value="4">4</option>
                                 <option value="5">5</option>
                                 <option value="6">6</option>
                                 <option value="7">7</option>
                                 <option value="8">8</option>
                              </select>
                           </div>

                        </div>
                        <div class="col-md-6">
                           <!-- DAFTAR MASALAH -->
                           <div class="form-group" style="margin-left: 30px">
                              <label for="masalah" class="label-input-losstime">Masalah</label>
                              <select name="masalah" id="masalah" class="form-control select-input-losstime select2" 
                                 autofocus=on required>
                                 
                                 <option value="" selected disabled>Pilih Masalah Kerja</option>
                                 <?php 
                                    foreach ($data->showMasalahLine() as $list) {
                                       $masalah = "[ " .$list['kode_masalah']. " ] " .$list['masalah']; // menggabungkan antara kode masalah dan masalah pada tabel masalah_line
                                 ?>
                                    <option value="<?= $masalah ?>"><?= $masalah ?></option>
                                 <?php } ?>
                              </select>
                           </div>
                           <!-- INPUT LOSSTIME -->
                           <div class="form-group mt-4" style="margin-left: 30px">
                              <label for="jumlah_losstime" class="label-input-losstime">Jumlah Losstime <small>(Dalam Menit)</small></label>
                              <div class="input-group">
                                 <div class="input-group-prevend">
                                    <button type="button" class="btn btn-danger" id="btn-kurang">
                                       <i class="fa fa-minus" aria-hidden="true"></i>
                                    </button>
                                 </div>

                                 <input type="number" name="jumlah_losstime" placeholder="Tambahkan jumlah losstime" required
                                    id="jumlah-losstime" class="form-control jumlah-input-losstime" min="0" maxlength="3" autocomplete="off">
                                 
                                 <div class="input-group-prevend">
                                    <button type="button" class="btn btn-success" id="btn-tambah">
                                       <i class="fa fa-plus" aria-hidden="true"></i>
                                    </button>
                                 </div>
                              </div>
                              <!-- DAFTAR SHIFT -->
                           </div>
                              <div class="form-group mt-4" style="margin-left: 30px">
                                 <label for="waktu" class="label-input-losstime">Waktu <small>(Format Tanggal-Bulan-Tahun)</small></label>
                                 
                                 <div class="row">
                                    <div class="col-md-3">
                                       <select name="tanggal" class="form-control" style="cursor: pointer">
                                          <?php for ($i=1; $i <= 31; $i++) { ?> 
                                             <option value="<?= $i ?>" <?= date('d') == $i ? ' selected' : '' ?>> <?= $i ?> </option>
                                          <?php } ?>
                                       </select>
                                    </div>
                                    <div class="col-md-5">
                                       <select name="bulan" class="form-control" style="cursor: pointer">
                                          <?php for ($i=1; $i <= 12; $i++) { ?> 
                                             <option value="<?= $i ?>" <?= date('m') == $i ? ' selected' : '' ?>> <?= $data->getBulan($i) ?> </option>
                                          <?php } ?>
                                       </select>
                                    </div>
                                    <div class="col-md-4">
                                       <select name="tahun" class="form-control" style="cursor: pointer">
                                          <?php for ($i=2020; $i <= 2030; $i++) { ?> 
                                             <option value="<?= $i ?>" <?= date('Y') == $i ? ' selected' : '' ?>> <?= $i ?> </option>
                                          <?php } ?>
                                       </select>
                                    </div>
                                    
                                 </div>
                              </div>
                           
                           <input type="hidden" name="id_user" value="<?= $_SESSION['id'] ?>">
                           <div class="form-group mt-4" style="margin-left: 30px;">
                              <button type="submit" name="simpan" class="btn btn-success btn-block" style="height: 70px; font-size: 20px">
                                 <i class="nav-icon fas fa-save"></i>
                                 Simpan
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

<?php include_once "./template/footer.php" ?>

<script>
   // Tampilan sweetalert ketika berhasil
   function berhasil() {
      Swal.fire({
         type: 'success',
         html: 'Losstime berhasil ditambahkan',
         allowOutsideClick: false,
         allowEscapeKey: false,
         focusConfirm: true,
         showConfirmButton: true
      }).then(function() {
         window.location.href = "input_losstime.php"
      })
   }
</script>

<?php 
   if (isset($_POST['simpan'])) { // ketika tombol simpan di tekan
      if ($data->addLosstime($_POST) > 0) {
         echo "<script>berhasil()</script>";
      
      } else {
         echo "
            <script>
               alert('Gagal');
            </script>
         ";
         
         echo("<br>");
         echo mysqli_error($data->koneksi);
      }
   }
   
?>

<script>
   // Untuk menambahkan dan mengurangi jumlah losstime
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

