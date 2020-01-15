<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-10">
         <div class="card card-default mt-2">
            <div class="card-header">
               <h3 class="card-title">
                  <i class="fas fa-text-width mr-2"></i>
                  Input Running Text Dashboard
               </h3>
            </div>
            <div class="container-fluid">
               <div class="card-body">
                  <form action="" method="post">
                     <div class="row justify-content-center mt-2">
                        <div class="col-md-5" style="border-right: 1px solid lightgrey">
                           <!-- DAFTAR LINE -->

                           <div class="form-group" style="margin-right: 20px">
                              <label for="running" class="label-input-losstime">Input Running Text</label>
                              <textarea class="form-control" name="input_running" id="running" rows="5" placeholder="Masukan running text" autofocus=on required></textarea>

                              <button type="submit" name="simpan" class="btn btn-success float-right mt-2">
                                 <i class="fas fa-save mr-2"></i>
                                 Simpan
                              </button>
                           </div>
                        </div>
                  </form>
                     <div class="col-md-7">
                        <div class="form-group" style="margin-left: 20px">
                           <label for="running" class="label-input-losstime">Tabel data Running Text</label>

                           <table id="running_text" class="table table-responsive table-bordered table-striped table-hover">
                              <thead>
                                 <tr class="text-center">
                                    <th style="width: 30px">#</th>
                                    <th>Data Running Text</th>
                                    <th>Aksi</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php
                                    $nomer = 1;
                                    foreach ($data->showListRunningText() as $list) {
                                 ?>
                                 <tr>
                                    <td><?= $nomer++ ?>.</td>
                                    <td><?= $list['text'] ?></td>
                                    <td class="table-align-middle">
                                       <div class="btn-group">
                                          <a href="./input_data.php?id=<?=$list['id']?>&type=edit-running-text" class="btn btn-warning btn-sm">
                                             <i class="fas fa-pen"></i>
                                             Ubah
                                          </a>
                                          <a onclick="return hapusRunning(<?= $list['id'] ?>, 'input_data.php?id=<?=$list['id']?>&type=delete-running-text')" href="#" class="btn btn-danger btn-sm" >
                                             <i class="fas fa-trash"></i>
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
