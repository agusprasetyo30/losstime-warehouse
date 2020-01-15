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
                              <textarea class="form-control" name="input_running" id="running" rows="5" placeholder="Masukan running text" autofocus=on></textarea>

                              <button type="submit" class="btn btn-success float-right mt-2">
                                 <i class="fas fa-save mr-2"></i>
                                 Simpan
                              </button>
                           </div>
                        </div>
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
                                    <tr>
                                       <td>1</td>
                                       <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad inventore, quo fuga ullam culpa vitae.</td>
                                       <td class="table-align-middle">
                                          <div class="btn-group">
                                             <a href="#" class="btn btn-warning btn-sm">
                                                <i class="fas fa-pen"></i>
                                                Ubah
                                             </a>
                                             <a href="#" class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash"></i>
                                                Hapus
                                             </a>
                                          </div>  
                                       </td>
                                    </tr>
                                    <tr>
                                       <td>2</td>
                                       <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad inventore, quo fuga ullam culpa vitae.</td>
                                       <td class="table-align-middle">
                                          <div class="btn-group btn-group-sm">
                                             <a href="#" class="btn btn-warning btn-sm">Ubah</a>
                                             <a href="#" class="btn btn-danger btn-sm">Hapus</a>
                                          </div>  
                                       </td>
                                    </tr>
                                 </tbody>
                              </table>
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