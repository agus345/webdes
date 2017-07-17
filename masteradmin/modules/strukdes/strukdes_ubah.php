 <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                  <?php
                    $id = (int) $_GET['id']; //ambil id
                    $row = tampil_ubah($conn,$id); //tampilkan data

                    if (isset($_POST['ubah'])) { //ketika tombol ubah diklik
                      $var = $_FILES['user_image']['name'];
                      //  $var = $_FILES['user_image']['name'];
                      if (strlen($var) > 0) {
                          $path = "../images/strukturdesa/";
                          
                          if ($row['foto']=="") {
                             upload_file(user_image, $path); //upload berkas baru
                          }else{                  
                          unlink($path.$row['foto']);                   
                          upload_file(user_image, $path); //upload berkas baru
                          }
                      }

                        ubah($conn,$var,$id); //ubah data
                        alert_success("Data Berhasil Diubah");
                        echo '<meta http-equiv="refresh" content="2;url=?mod=strukdes" />';
                    }
                     if (isset($_POST['hapusfoto'])) {
            
                      ubahfoto($conn,$id); //insert ke database      
                      alert_success("Foto Berhasil Dihapus"); //tampilin pesan data berhasil disimpan
                      echo '<meta http-equiv="refresh" content="2;url=?mod=strukdes" />';
                    }
                    
                  ?>

                  <div class="col-lg-12" align="center">
                      <h1 class="page-header">Halaman Struktur Desa</h1>
                  </div>
                  <div class="row">          
                  <div class="col-lg-12">
                      <div class="panel panel-default">
                          <div class="panel-body">
                              <h3>Form Edit Struktur Desa</h3>
                               <form method="post" enctype="multipart/form-data" enctype="multipart/form-data" >
                                 <div class="col-md-4 col-md-offset-0">
                                     <div class="form-group">
                                          <label>Nama Pengurus</label>
                                          <input class="form-control" placeholder="Masukkan Nama" name="nama" value="<?=$row['nama']?>">
                                      </div>
                                  </div>
                                  <div class="col-md-4 col-md-offset-1">
                                     <div class="form-group">
                                          <label>Jabatan</label>
                                          <input class="form-control" placeholder="Masukkan Jabatan" name="jabatan" value="<?=$row['jabatan']?>">
                                      </div>
                                  </div>                               
                                  <div class="col-lg-6">
                                     <div class="form-group">
                                          <label>Foto</label>
                                          <input class="input-group" type="file" name="user_image" accept="image/*" />
                                          <br/>
                                         <?php
                                            if ($row['foto'] == "") {
                                          ?>
                                            <img class="img-responsive img-blog" src="../images/no-image.png" width="50%" alt="Sejarah Desa" />
                                          <?php
                                            }else{?>
                                            <img class="img-responsive img-blog" src="../images/strukturdesa/<?php echo $row['foto'];?>" width="50%" alt="<?php echo $row['judul'];?>" />
                                          <?php
                                            }
                                        ?>
                                      </div>
                                  </div>
                                   <div class="box-footer">
                                    <div class="row ">
                                      <div class="col-lg-12" align="right">
                                        <button type="submit" name="hapusfoto" class="btn btn-danger">Hapus Foto</button>                                                                         
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
