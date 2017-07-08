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
                          $path = "../images/artikel/";
                          
                          if ($row['foto']=="") {
                             upload_file(user_image, $path); //upload berkas baru
                          }else{                  
                          unlink($path.$row['foto']);                   
                          upload_file(user_image, $path); //upload berkas baru
                          }
                      }

                        ubah($conn,$var,$id); //ubah data
                        alert_success("Data Berhasil Diubah");
                        echo '<meta http-equiv="refresh" content="2;url=?mod=artikel" />';
                    }
                     if (isset($_POST['hapusfoto'])) {
            
                      ubahfoto($conn,$id); //insert ke database      
                      alert_success("Foto Berhasil Dihapus"); //tampilin pesan data berhasil disimpan
                      echo '<meta http-equiv="refresh" content="2;url=?mod=artikel" />';
                    }
                    
                  ?>

                  <div class="col-lg-12" align="center">
                      <h1 class="page-header">Halaman Pengguna</h1>
                  </div>
                  <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h3>Form Tambah Pengguna</h3>
                             <form method="post" enctype="multipart/form-data" enctype="multipart/form-data" >
                               <div class="col-lg-6">
                                   <div class="form-group">
                                        <label>Judul</label>
                                        <input class="form-control" placeholder="Masukkan Judul Artikel" name="judul" value="<?=$row['judul'] ?>">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                   <div class="form-group">
                                        <label>Pilih Kategori Artikel</label>
                                        <?php selectdataedit2($conn, kategori_artikel_id, "kategori_artikel", id, nama, $row['kategori_artikel_id'], getanytampil($conn,kategori_artikel, id, $row['kategori_artikel_id'], nama)) ?>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                   <div class="form-group">
                                        <label>Deskripsi Singkat</label>
                                        <textarea class="form-control" Placeholder="Maksimal 50 Karakter" rows="3" name="deskripsi_singkat"><?php echo $row['deskripsi_singkat']?></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                   <div class="form-group">
                                        <label>Isi Artikel</label>
                                        <textarea class="form-control" rows="10" name="isi"><?php echo $row['isi']?></textarea>
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
                                            <img class="img-responsive img-blog" src="../images/artikel/<?php echo $row['foto'];?>" width="50%" alt="<?php echo $row['judul'];?>" />
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
                <!-- /.col-lg-12 -->
            </div>
                </div>
            </div>
       </div>
