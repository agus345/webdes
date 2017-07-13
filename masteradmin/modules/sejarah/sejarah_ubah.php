 <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                 <?php
                    $id = (int) $_GET['id']; //ambil id
                    if (isset($_POST['ubah'])) { //ketika tombol ubah diklik
                      $sejarah = $_POST['sejarah'];
                        ubah($conn,$sejarah,$id); //ubah data
                        alert_success("Data Berhasil Diubah");
                        echo '<meta http-equiv="refresh" content="2;url=?mod=sejarah" />';
                    }

                    tampil_ubah($conn,$id); //tampilkan data

                  ?>

                  <div class="col-lg-12" align="center">
                      <h1 class="page-header">Halaman Sejarah</h1>
                  </div>
                  <div class="row">          
                  <div class="col-lg-12">
                      <div class="panel panel-default">
                          <div class="panel-body">
                              <h3>Form Edit Sejarah Desa</h3>
                               <form method="post">
                                 <div class="col-md-12">
                                     <div class="form-group">
                                          <label>Isi Sejarah</label>
                                          <textarea class="form-control" placeholder="Masukkan Perubahan sejarah" name="sejarah" cols="5"></textarea>
                                      </div>
                                      <button type="submit" name="ubah" class="btn btn-primary">Simpan</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </form>
                    </div>
                </div>
            </div>
            </div>
          <!-- /.col-lg-12 -->
      </div>
          </div>
      </div>
 </div>
