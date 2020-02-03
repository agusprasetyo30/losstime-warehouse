<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-7">
         <div class="card card-default mt-2">
            <div class="card-header">
               <h3 class="card-title mt-2">
                  <i class="fas fa-cogs mr-2"></i>
                  Edit Line
               </h3>
               <a href="./input_data.php?type=line" class="btn btn-warning float-right">
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
                              <label for="line" class="label-input-losstime">Update Line</label>
                              <input type="text" name="input_line_edit" id="line" placeholder="Masukan line" class="form-control"
                                 value="<?= $data->showLineByID($_GET['id'])['nama_line'] ?>" autofocus=on required>

                              <button type="submit" name="ubah-line" class="btn btn-success float-right mt-2">
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