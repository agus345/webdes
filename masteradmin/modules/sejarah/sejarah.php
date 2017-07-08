 <div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
          <?php
          $modname = $_GET['mod']; //ambil nama modul
          $row = tampil_ubah($conn); //tampilkan data
            if (isset($_POST['ubah'])) {
               $var = $_FILES['user_image']['name'];
              //  $var = $_FILES['user_image']['name'];
              if (strlen($var) > 0) {
                  $path = "../images/sejarah/";
                  
                  if ($row['foto']=="") {
                     upload_file(user_image, $path); //upload berkas baru
                  }else{                  
                  unlink($path.$row['foto']);                   
                  upload_file(user_image, $path); //upload berkas baru
                  }
              }

              ubah($conn,$var); //insert ke database      
              alert_success("Data Berhasil Diubah"); //tampilin pesan data berhasil disimpan
              echo '<meta http-equiv="refresh" content="2;url=?mod=sejarah" />';
            }
            if (isset($_POST['hapusfoto'])) {
            
              ubahfoto($conn); //insert ke database      
              alert_success("Foto Berhasil Dihapus"); //tampilin pesan data berhasil disimpan
              echo '<meta http-equiv="refresh" content="2;url=?mod=sejarah" />';
            }
            
            
            ?>
            <div class="col-lg-12" align="center">
                <h1 class="page-header">Halaman Sejarah</h1>
            </div>
            <div class="row">

           
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h3>Form Tambah Pengguna</h3>
                             <form method="post" enctype="multipart/form-data" enctype="multipart/form-data" >
                               <div class="col-lg-6">
                                   <div class="form-group">
                                        <label>Judul</label>
                                        <input class="form-control" name="judul" value="<?=$row['judul'] ?>">
                                    </div>
                                </div>                                
                                <div class="col-lg-12">
                                   <div class="form-group">
                                        <label>Isi Artikel</label>
                                        <textarea class="form-control" rows="10" name="isi" ><?php echo $row['isi']?></textarea>
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
                                            <img class="img-responsive img-blog" src="../images/sejarah/<?php echo $row['foto'];?>" width="100%" alt="<?php echo $row['judul'];?>" />
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
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                        <a class="btn btn-default" href="?mod=sejarah"> <span class="glyphicon glyphicon-arrow-left"></span> &nbsp; Kembali </a> 
                           

                        </div>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>

        </div>
    </div>
</div>
