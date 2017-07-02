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

              $judul = $_POST['judul'];// user name
             
              $imgFile = $_FILES['user_image']['name'];
              $tmp_dir = $_FILES['user_image']['tmp_name'];
              $imgSize = $_FILES['user_image']['size'];


              $upload_dir = '../images/banner/'; // upload directory
             
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
              tampil_last_id($conn);
              $id = $row['id'];
              $new_pic = $row['foto'];
              
              $gambar_crop = "new_".$new_pic;

              // jalankan fungsi crop gambar

              // lebar, tinggi, file yang di crop, format gambar, nama file setelah di crop

              cropImage(1169, 487, "$new_pic", 'jpg', "$gambar_crop");

              echo $row['foto'] ;

              //update_last($conn,$gambar_crop);
              //alert_success("Data Banner Berhasil ditambahkan .."); //tampilin pesan data berhasil disimpan
              //echo '<meta http-equiv="refresh" content="1;url=?mod=banner" />';
          }         

                        ?>
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
