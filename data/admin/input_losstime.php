<?php
   $title= "Input Losstime";
   $menu = "Input Losstime";
   $link_menu = "input_losstime.php";
   $location = "Index";
   $status_nav_input = 'active';

   include_once "../function.php";
   include_once "./template/header.php";

?>

<div class="container-fluid">
   <hr>
   <form action="" method="post">
   <div class="row justify-content-center mt-2">
         <div class="col-md-5" style="border-right: 1px solid lightgrey">
            <!-- DAFTAR LINE -->
            <div class="form-group" style="margin-right: 30px">
               <label for="line" class="label-input-losstime">Line</label>
               <select name="line" id="line" class="form-control select-input-losstime select2" autofocus=on required>
                  <option value="" selected disabled>Pilih Line</option>
                  <option value="A41">A41</option>
                  <option value="A42">A42</option>
                  <option value="A43">A43</option>
                  <option value="A44">A44</option>
                  <option value="A45">A45</option>
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
         <div class="col-md-5">
            <!-- DAFTAR MASALAH -->
            <div class="form-group" style="margin-left: 30px">
               <label for="masalah" class="label-input-losstime">Masalah</label>
               <select name="masalah" id="masalah" class="form-control select-input-losstime select2" 
                  autofocus=on required>
                  
                  <option value="" selected disabled>Pilih Masalah Kerja</option>
                  <option value="masalah1">Masalah 1</option>
                  <option value="masalah2">Masalah 2</option>
                  <option value="masalah3">Masalah 3</option>
                  <option value="masalah4">Masalah 4</option>
                  <option value="masalah5">Masalah 5</option>
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

                  <input type="text" name="jumlah_losstime" onkeypress="return isNumberKey(event)" placeholder="Tambahkan jumlah losstime" required
                     id="jumlah-losstime" class="form-control jumlah-input-losstime" value="0" min="0" maxlength="3">
                  
                  <div class="input-group-prevend">
                     <button type="button" class="btn btn-success" id="btn-tambah">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                     </button>
                  </div>
               </div>
            </div>

            <div class="form-group mt-4" style="margin-left: 30px;">
               <button type="submit" name="simpan" class="btn btn-success btn-block" style="height: 75px; font-size: 20px">
                  <i class="nav-icon fas fa-save"></i>
                  Simpan
               </button>
            </div>

         </div>
         
      </div>
   </form>
</div>

<?php include_once "./template/footer.php" ?>

<?php 
   if (isset($_POST['simpan'])) {
      print_r($_POST);
   }
?>

<script>
   // Untuk menambahkan dan mengurangi jumlah losstime
   $(function() {
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

   // Inputan hanya angka
   function isNumberKey(evt)
   {
      var charCode = (evt.which) ? evt.which : evt.keyCode
      if (charCode > 31 && (charCode < 48 || charCode > 57))
      {
         return false;

      } else {
         return true;
      }
   }
</script>

