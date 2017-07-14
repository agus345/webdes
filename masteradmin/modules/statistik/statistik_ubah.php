 <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                  <?php
                    $id = (int) $_GET['id']; //ambil id
                    $row = tampil_ubah($conn,$id); //tampilkan data

                    if (isset($_POST['ubah'])) { //ketika tombol ubah diklik
                     
                        ubah($conn,$var,$id); //ubah data
                        alert_success("Data Berhasil Diubah");
                        echo '<meta http-equiv="refresh" content="2;url=?mod=artikel" />';
                    }                    
                  ?>

                  <div class="col-lg-12" align="center">
                      <h1 class="page-header">Halaman Statistik</h1>
                  </div>
                   <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h3>Form Edit Data Statistik</h3>
                             <form method="post" > 
                                <div class="col-lg-12">
                                   <div class="form-group">
                                        <label></label>
                                        <input type="text" class="form-control" name="uraian">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                   <div class="form-group">
                                        <label></label>
                                        <input type="text" class="form-control" Placeholder="Masukkan Anggaran" name="anggaran">
                                    </div>
                                </div>     
                                <div class="col-lg-12">
                                   <div class="form-group">
                                        <label></label>
                                        <input type="text" class="form-control" Placeholder="Masukkan Realisai" name="realisasi">
                                    </div>
                                </div>                                
                                 <div class="box-footer">
                                  <div class="row ">
                                    <div class="col-lg-12" align="right">                                   
                                      <button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
                                    </div>
                                  </div>
                                </div>
                              </form>
                        </div>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
                </div>
            </div>
       </div>
