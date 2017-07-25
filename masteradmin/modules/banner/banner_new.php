 <div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
          <?php
          $modname = $_GET['mod']; //ambil nama modul

          ?>

            <div class="col-lg-12">
              <div class="page-header">
                <i class="fa fa-dashboard fa-fw"></i> <a href="index.php">Dashboard</a> / <a href="?mod=banner">Banner</a>
              </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">

                        <?php

          if (isset($_POST['tambah'])) {
             $var = $_FILES['user_image']['name'];
             $ext = pathinfo($var, PATHINFO_EXTENSION);             
            if (strlen($var) > 0) {
              $path = "../images/banner/";
        //      unlink("../img/".$row['gambar']); //hapus dulu gambar yang lama
              upload_file(user_image, $path); //upload berkas baru
              $gambar = $path.$var;
            }
            insert($conn,$var); //insert ke database
            alert_success("Banner Berhasil Ditambahkan"); //tampilin pesan data berhasil disimpan
        ?>
        <meta http-equiv="refresh" content="1;url=?mod=banner" />
        <?php
        }

                        ?>
                            <h3>Form Tambah Banner</h3>
                              <form method="post" enctype="multipart/form-data" class="form-horizontal">
                              <?php
                                  if(isset($errMSG)){
                                    ?>
                                        <div class="alert alert-danger">
                                          <span class="glyphicon glyphicon-info-sign"></span> &nbsp; <?php echo $errMSG; ?>
                                        </div>
                                        <?php
                                  }
                              ?>
                                <div class="row show-grid">
                                    <div class="col-xs-4">
                                      <input type="text" class="form-control" name="judul" placeholder="Masukkan Judul Banner" required autofocus>
                                    </div>
                                </div>
                                <div class="row show-grid">
                                    <div class="col-xs-6 col-sm-4">
                                      <input class="input-group" type="file" name="user_image" accept="image/*" />
                                    </div>
                                </div>

                                <div class="box-footer">
                                  <div class="row ">
                                    <div class="col-xs-6 col-sm-6" align="right">
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
