 <div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
          <?php
          $modname = $_GET['mod']; //ambil nama modul

          ?>

            <div class="col-lg-12">
              <div class="page-header">
                <i class="fa fa-dashboard fa-fw"></i> <a href="index.php">Dashboard</a> / <a href="?mod=gallery">gallery</a>
              </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">

                        <?php

// Upload versi tidak menggunakan function 
/*
if (isset($_POST['tambah'])) {

              $judul = $_POST['judul'];// user name
             
              $imgFile = $_FILES['user_image']['name'];
              $tmp_dir = $_FILES['user_image']['tmp_name'];
              $imgSize = $_FILES['user_image']['size'];


              $upload_dir = '../images/gallery/'; // upload directory
             
              $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
            
              // valid image extensions
              $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
            
              // rename uploading image
              $userpic = rand(1000,1000000).".".$imgExt;

                  // allow valid image file formats
                  if(in_array($imgExt, $valid_extensions)){     
                    // Check file size '5MB'
                    if($imgSize < 5000000)        {
                      move_uploaded_file($tmp_dir,$upload_dir.$userpic);
                    }
                    else{
                      $errMSG = "File terlalu besar..";
                    }
                  }
                else{
                  $errMSG = "foto hanya berupa JPG, JPEG, PNG & GIF .";    
                }
              insert($conn,$userpic); //insert ke database              
              alert_success("Data gallery Berhasil ditambahkan .."); //tampilin pesan data berhasil disimpan
              echo '<meta http-equiv="refresh" content="1;url=?mod=gallery" />';
          }         */

// end 

        if (isset($_POST['tambah'])) {
          $var = $_FILES['user_image']['name'];
          $ext = pathinfo($var, PATHINFO_EXTENSION);   
          if (strlen($var) > 0) {
             $path = "../images/gallery/";
             // unlink("../img/".$row['gambar']); //hapus dulu gambar yang lama
             upload_file(user_image, $path); //upload berkas baru
             $gambar = $path.$var;
             $gambar_crop_nama = "gallery-".$var;
             $gambar_crop = $path."gallery-".$var;
             cropImage(1169, 487, "$gambar", $ext, "$gambar_crop");
          }
          insert($conn,$gambar_crop_nama); //insert ke database      
          alert_success("gallery Berhasil Ditambahkan"); //tampilin pesan data berhasil disimpan
        ?>
        <meta http-equiv="refresh" content="1;url=?mod=gallery" />
        <?php    
        }

        ?>
                            <h3>Form Tambah gallery</h3>
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
                                      <input type="text" class="form-control" name="judul" placeholder="Masukkan Judul gallery" required autofocus>
                                    </div>
                                </div>
                               <!--  <div class="row show-grid">
                                    <div class="col-xs-4">
                                      <textarea class="form-control" name="detail" rows=5 placeholder="Masukkan detail gallery"></textarea>
                                    </div>
                                </div> -->
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