 <div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
          <?php
            $id = (int) $_GET['id']; //ambil id
            $row = tampil_ubah($conn,$id); //tampilkan data


          $modname = $_GET['mod']; //ambil nama modul

        if (isset($_POST['ubah'])) {
             $var = $_FILES['user_image']['name'];
            if (strlen($var) > 0) {
              $path = "../images/banner/";
              unlink($path.$row['foto']);        
              unlink($path.$row['foto']);        
              upload_file(user_image, $path); //upload berkas baru
             $gambar = $path.$var;
             $gambar_crop_nama = "banner-".$var;
             $gambar_crop = $path."banner-".$var;
              cropImage(1169, 487, "$gambar", 'jpg', "$gambar_crop");
            }
             ubah($conn,$gambar_crop_nama); //insert ke database
              alert_success("Data Banner Berhasil diubah..."); //tampilin pesan data berhasil disimpan
              echo '<meta http-equiv="refresh" content="1;url=?mod=banner" />';
        }




          /*if (isset($_POST['ubah'])) {
              $judul = $_POST['judul'];// user name                           
              $imgFile = $_FILES['user_image']['name'];
              $tmp_dir = $_FILES['user_image']['tmp_name'];
              $imgSize = $_FILES['user_image']['size'];

              if($imgFile)
                  {
                    $path = "../images/banner/";
                    $upload_dir = $path; // upload directory
                    $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
                    $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
                    $userpic = rand(1000,1000000).".".$imgExt;
                    if(in_array($imgExt, $valid_extensions))
                    {     
                      if($imgSize < 5000000)
                      {

                        unlink($upload_dir.$row['foto']);
                        move_uploaded_file($tmp_dir,$upload_dir.$userpic);
                        $gambar = $path.$var;
                        $gambar_crop_nama = "banner-".$var;
                        $gambar_crop = $path."banner-".$var;
                        cropImage(1169, 487, "$gambar", 'jpg', "$gambar_crop");

                      }
                      else
                      {
                        $errMSG = "Sorry, your file is too large it should be less then 5MB";
                      }
                    }
                    else
                    {
                      $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";    
                    } 
                  }
                  else
                  {
                    // if no image selected the old image remain as it is.
                    $userpic = $row['foto']; // old image from database
                  }                    
              ubah($conn,$userpic); //insert ke database
              alert_success("Data Banner Berhasil diubah..."); //tampilin pesan data berhasil disimpan
              echo '<meta http-equiv="refresh" content="1;url=?mod=banner" />';
          }    */     

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
                            <h3>Form Tambah Banner</h3>
                              <form method="post" method="post" enctype="multipart/form-data" class="form-horizontal">
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
                                      <input type="text" class="form-control" name="judul" value="<?=$row['alt'] ?>" placeholder="Masukkan Judul Banner" required autofocus>
                                    </div>
                                </div>
                                <div class="row show-grid">
                                    <div class="col-xs-6 col-sm-4">
                                    <p><img src="../images/banner/<?php echo $row['foto'] ?>" height="150" width="150" /></p>
                                      <input class="input-group" type="file" name="user_image" accept="image/*" />
                                    </div>
                                </div>

                                <div class="box-footer">
                                  <div class="row ">
                                    <div class="col-xs-6 col-sm-6" align="right">                                   
                                      <button type="submit" name="ubah" class="btn btn-primary">Tambah</button>
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

