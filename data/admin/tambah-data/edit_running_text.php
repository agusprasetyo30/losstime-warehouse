<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-7">
         <div class="card card-default mt-2">
            <div class="card-header">
               <h3 class="card-title mt-2">
                  <i class="fas fa-text-width mr-2"></i>
                  Edit Running Text
               </h3>
               <a href="./input_data.php?type=running-text" class="btn btn-warning float-right">
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
                              <label for="running" class="label-input-losstime">Update Running Text</label>
                              <textarea class="form-control" name="input_running" id="running" rows="5" placeholder="Masukan running text" autofocus=on required><?= $data->showListRunningTextByID($_GET['id'])['text'] ?></textarea>
                              <button type="submit" name="ubah" class="btn btn-success float-right mt-2">
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