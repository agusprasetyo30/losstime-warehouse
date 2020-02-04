<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-10">
         <div class="card card-default mt-2">
            <div class="card-header">
               <h3 class="card-title">
                  <i class="fas fa-cogs mr-2"></i>
                  Input Line
               </h3>
            </div>
            <div class="container-fluid">
               <div class="card-body">
                  <div class="row justify-content-center mt-2">
                     <div class="col-md-4" style="border-right: 1px solid lightgrey">
                        <form action="" method="post">
                           <!-- DAFTAR LINE -->
                           <div class="form-group" style="margin-right: 20px;">
                              <label for="line" class="label-input-losstime mb-3">Input Line</label>
                              <input type="text" name="line" id="line" placeholder="Masukan Line" class="form-control" autofocus=on autocomplete="off" required>
                              <button type="submit" name="simpan-line" class="btn btn-success float-right mt-2">
                                 <i class="fas fa-save mr-2"></i>
                                 Simpan
                              </button>
                           </div>
                        </form>
                     </div>
                     <div class="col-md-8">
                        <div class="form-group" style="margin-left: 20px">
                           <div class="row">
                              <div class="col-md-6">
                                 <label for="cari-line" class="label-input-losstime">Tabel data Line</label>
                              </div>
                              <div class="col-md-6">
                                 <input type="text" name="cari-line" id="cari-line" class="form-control" placeholder="Cari line . . .">
                              </div>
                           </div>

                           <table id="line_table" class="table table-bordered table-striped table-hover">
                              <thead>
                                 <tr class="text-center">
                                    <th style="width: 30px">#</th>
                                    <th style="width: 150px">Data Line</th>
                                    <th>Aksi</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php
                                    $nomer = 1;
                                    foreach ($data->getLineDB() as $list) {
                                 ?>
                                 <tr class="text-center">
                                    <td class="align-middle"><?= $nomer++ ?>. </td>
                                    <td class="align-middle"><?= $list['nama_line'] ?></td>
                                    <td>
                                       <div class="btn-group">
                                          <a href="./input_data.php?id=<?=$list['id']?>&type=edit-line" class="btn btn-warning btn-sm">
                                             <i class="fas fa-pen mr-2"></i>
                                             Ubah
                                          </a>
                                          <a onclick="return hapusData(<?= $list['id'] ?>, 'input_data.php?id=<?=$list['id']?>&type=delete-line', 'Line')" href="#" class="btn btn-danger btn-sm" >
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
