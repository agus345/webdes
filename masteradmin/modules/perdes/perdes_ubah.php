 <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                 <?php
                    $id = (int) $_GET['id']; //ambil id
                    if (isset($_POST['ubah'])) { //ketika tombol ubah diklik
                        ubah($conn); //ubah data
                        alert_success("Data Berhasil Diubah");
                        echo '<meta http-equiv="refresh" content="2;url=?mod=perdes" />';
                    }

                    $row = tampil_perdes_ubah($conn,$id); //tampilkan data

                  ?>

                  <div class="col-lg-12" align="center">
                      <h1 class="page-header">Halaman Perdes</h1>
                  </div>
                  <div class="row">          
                  <div class="col-lg-12">
                      <div class="panel panel-default">
                          <div class="panel-body">
                              <h3>Form Tambah Peraturan Desa</h3>
                               <form method="post" enctype="multipart/form-data" enctype="multipart/form-data" >
                                 <div class="col-md-4 col-md-offset-0">
                                     <div class="form-group">
                                          <label>Nama perdes</label>
                                          <input class="form-control" placeholder="Masukkan perdes" name="aturan" value="<?=$row['aturan']?>">
                                      </div>
                                  </div>                                                                   
                                        <button type="submit" name="ubah" class="btn btn-primary">Simpan</button>
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
