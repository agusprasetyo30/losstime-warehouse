<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-7">
         <div class="card card-default mt-2">
            <div class="card-header">
               <h3 class="card-title mt-2">
                  <i class="fas fa-cogs mr-2"></i>
                  Edit Masalah Line
               </h3>
               <a href="./input_data.php?type=masalah-line" class="btn btn-warning float-right">
                  <i class="fas fa-undo mr-2"></i>
                  Kembali
               </a>
            </div>
            <div class="container-fluid">
               <div class="card-body">
                  <form action="" method="post">
                     <div class="row justify-content-center mt-2">
                        <div class="col-md-12">
                           <!-- DAFTAR LINE -->
                           
                           <div class="form-group">
                              <label for="kode_masalah_edit" class="label-input-losstime">Kode Masalah Line</label>
                              <input type="text" name="kode_masalah_edit" id="kode_masalah_edit" placeholder="Masukan kode masalah" class="form-control"
                                 value="<?= $data->showMasalahLineByID($_GET['id'])['kode_masalah'] ?>" autofocus=on required>
                           </div>
                           
                           <div class="form-group">
                              <label for="masalah_edit" class="label-input-losstime">Masalah</label>
                              <textarea name="masalah_edit" id="masalah_edit" rows="2" class="form-control"
                                 placeholder="Masukan masalah line" autofocus=on required><?= $data->showMasalahLineByID($_GET['id'])['masalah'] ?></textarea>
                           </div>

                           <button type="submit" name="ubah-masalah-line" class="btn btn-success float-right mt-2">
                              <i class="fas fa-pencil-alt mr-2"></i>
                              Simpan Perubahan
                           </button>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>