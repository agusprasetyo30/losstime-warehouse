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
                              <select name="line" id="line" autofocus=on class="form-control select-input-losstime select2" style="width: 100%" required>
                                 <option value="" selected disabled>Pilih Line</option>
                                 <?php 
                                    for ($i=0; $i < count($data->getLine()); $i++) { 
                                       echo "<option value='" . $data->getLine()[$i] . "' >" . $data->getLine()[$i] ."</option>";      
                                    }
                                 ?>      
                              </select>
                           </div>

                           <!-- DAFTAR SHIFT -->
                           <div class="form-group mt-4" style="margin-right: 30px">
                              <label for="shift" class="label-input-losstime">Shift</label>
                              <select name="shift" id="shift" class="form-control select-input-losstime select2" style="width: 100%"
                                 autofocus=on required>
                                 
                                 <option value="" selected disabled>Pilih Shift</option>
                                 <option value="PAGI">Pagi</option>
                                 <option value="MALAM">Malam</option>
                              </select>
                           </div>

                           <!-- DAFTAR JAM KERJA -->
                           <div class="form-group mt-4" style="margin-right: 30px">
                              <label for="jam_kerja" class="label-input-losstime">Jam Kerja</label>
                              <select name="jam_kerja" id="jam_kerja" class="form-control select-input-losstime select2" style="width: 100%"
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
                              <select name="masalah" id="masalah" class="form-control select-input-losstime select2" style="width: 100%"
                                 autofocus=on required>
                                 
                                 <option value="" selected disabled>Pilih Masalah Kerja</option>
                                 <?php 
                                    for ($i=0; $i < count($data->getMasalah()); $i++) { 
                                       echo "<option value='" . $data->getMasalah()[$i] . "' >" . $data->getMasalah()[$i] ."</option>";      
                                    }
                                 ?>
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
                                    id="jumlah-losstime" class="form-control jumlah-input-losstime" min="0" maxlength="3">
                                 
                                 <div class="input-group-prevend">
                                    <button type="button" class="btn btn-success" id="btn-tambah">
                                       <i class="fa fa-plus" aria-hidden="true"></i>
                                    </button>
                                 </div>
                              </div>
                           </div>
                           <input type="hidden" name="waktu" value="<?= date('Y-m-d H:i:s'); ?>">
                           <input type="hidden" name="id_user" value="<?= $_SESSION['id'] ?>">
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
            </div>
         </div>
      </div>
   </div>
</div>
