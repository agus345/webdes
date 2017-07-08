 <div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
          <?php
          $modname = $_GET['mod']; //ambil nama modul
    
            if (isset($_POST['tambah'])) {
              $var = $_FILES['user_image']['name'];


              //  $var = $_FILES['user_image']['name'];
              if (strlen($var) > 0) {
                  $path = "../images/strukturdesa/";
                  //unlink("../img/".$row['gambar']); //hapus dulu gambar yang lama
                  upload_file(user_image, $path); //upload berkas baru
              }

              insert($conn,$var); //insert ke database      
              alert_success("Artikel Berhasil Ditambahkan"); //tampilin pesan data berhasil disimpan
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
                            <h3>Form Tambah Pengguna</h3>
                             <form method="post" enctype="multipart/form-data" enctype="multipart/form-data" >
                               <div class="col-md-4 col-md-offset-0">
                                   <div class="form-group">
                                        <label>Nama Pengurus</label>
                                        <input class="form-control" placeholder="Masukkan Nama" name="nama">
                                    </div>
                                </div>
                                <div class="col-md-4 col-md-offset-1">
                                   <div class="form-group">
                                        <label>Jabatan</label>
                                        <input class="form-control" placeholder="Masukkan Jabatan" name="jabatan">
                                    </div>
                                </div>                               
                                <div class="col-lg-6">
                                   <div class="form-group">
                                        <label>Foto</label>
                                        <input class="input-group" type="file" name="user_image" accept="image/*" />
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
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                        <a class="btn btn-default" href="?mod=artikel"> <span class="glyphicon glyphicon-arrow-left"></span> &nbsp; Kembali </a> 
                           

                        </div>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>

        </div>
    </div>
</div>
