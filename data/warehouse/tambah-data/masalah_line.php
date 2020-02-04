<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-10">
         <div class="card card-default mt-2">
            <div class="card-header">
               <h3 class="card-title">
                  <i class="fas fa-unlink mr-2"></i>
                  Masalah Line
               </h3>
            </div>
            <div class="container-fluid">
               <div class="card-body">
                  <div class="row justify-content-center mt-2">
                     <div class="col-md-4" style="border-right: 1px solid lightgrey">
                        <form action="" method="post">
                           <!-- DAFTAR LINE -->
                           <div class="form-group" style="margin-right: 20px;">
                              <label for="kode_masalah" class="label-input-losstime mb-2">Kode Masalah</label>
                              <input type="text" name="kode_masalah" id="kode_masalah" placeholder="Masukan Line" class="form-control" autofocus=on autocomplete="off" required>
                           </div>
                           <div class="form-group" style="margin-right: 20px; margin-top: 20px">
                              <label for="masalah" class="label-input-losstime mb-2">Masalah</label>
                              <textarea name="masalah" id="masalah" cols="30" rows="4" placeholder="Masukan Line" 
                                 class="form-control" autofocus=on autocomplete="off" required></textarea>
                           </div>
                           <button type="submit" name="simpan-masalah-line" style="margin-right: 20px;" class="btn btn-success float-right mt-2">
                              <i class="fas fa-save mr-2"></i>
                              Simpan
                           </button>
                        </form>
                     </div>
                     <div class="col-md-8">
                        <div class="form-group" style="margin-left: 20px">
                           <div class="row">
                              <div class="col-md-7">
                                 <label for="running" class="label-input-losstime">Tabel data masalah line</label>
                              </div>
                              <div class="col-md-5">
                                 <input type="text" name="cari-masalah" id="cari-masalah" class="form-control" placeholder="Cari masalah . . .">
                              </div>
                           </div>

                           <table id="masalah_line_table" class="table table-bordered table-striped table-hover">
                              <thead>
                                 <tr class="text-center">
                                    <th style="width: 30px" class="align-middle">#</th>
                                    <th style="width: 50px" class="align-middle">Kode Masalah</th>
                                    <th style="width: 200px" class="align-middle">Masalah</th>
                                    <th style="width: 150px" class="align-middle">Aksi</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php
                                    $number = 1;
                                    foreach ($data->showMasalahLine() as $list) {
                                 ?>
                                 <tr>
                                    <td class="align-middle text-center"><?=$number++?>. </td>
                                    <td class="align-middle text-center"><b>[ <?= $list['kode_masalah'] ?> ]</b></td>
                                    <td class="align-middle"><?= $list['masalah'] ?></td>
                                    <td class="align-middle text-center">
                                       <div class="btn-group">
                                          <a href="./input_data.php?id=<?= $list['id']?>&type=edit-masalah-line" class="btn btn-warning btn-sm">
                                             <i class="fas fa-pen mr-2"></i>
                                             Ubah
                                          </a>
                                          <a onclick="return hapusData(<?= $list['id'] ?>, 'input_data.php?id=<?=$list['id']?>&type=delete-masalah-line', 'Masalah Line')" href="#" class="btn btn-danger btn-sm" >
                                             <i class="fas fa-trash mr-2"></i>
                                             Hapus
                                          </a>
                                       </div>
                                    </td>
                                 </tr>
                                 <?php } ?>
                              </tbody>
                           </table>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
