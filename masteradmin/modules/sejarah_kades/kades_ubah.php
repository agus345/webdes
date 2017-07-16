 <div id="page-wrapper">
  <div class="container-fluid">
    <div class="row">
     <?php
                    $id = (int) $_GET['id']; //ambil id
                    if (isset($_POST['ubah'])) { //ketika tombol ubah diklik
                      $sejarah_kades = $_POST['nama'];
                        ubah($conn,$sejarah_kades,$id); //ubah data
                        alert_success("Data Berhasil Diubah");
                        echo '<meta http-equiv="refresh" content="2;url=?mod=sejarah_kades" />';
                      }

                    tampil_ubah($conn,$id); //tampilkan data

                    ?>

                    <div class="col-lg-12" align="center">
                      <h1 class="page-header">Halaman sejarah kades</h1>
                    </div>
                    <div class="row">          
                      <div class="col-lg-12">
                        <div class="panel panel-default">
                          <div class="panel-body">
                            <h3>Form Edit Peraturan Desa</h3>
                            <form method="post">
                             <div class="col-md-12">
                               <div class="form-group">
                                 <div class="col-lg-12">
                                  <div class="form-group">
                                    <label>Nama Kepala Desa</label>
                                    <input class="form-control" type="text" placeholder="Masukkan Nama Kepala Desa" name="nama">
                                  </div>
                                </div>
                                <div class="col-lg-12">
                                  <div class="form-group">
                                   <label>Jabatan</label>
                                   <input class="form-control" type="text" placeholder="Masukkan Nama Jabatan" name="jabatan">
                                 </div>
                               </div>
                               <div class="col-lg-12">
                                <div class="form-group">
                                  <label>Masa Jabatan</label>
                                  <input class="form-control" type="text" placeholder="Masukkan Masa Jabatan" name="masa_jabatan">
                                </div>
                              </div>
                              <div class="box-footer">
                                <div class="col-lg-12" align="right">
                                  <button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
                                </div>
                              </div>   
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
    
