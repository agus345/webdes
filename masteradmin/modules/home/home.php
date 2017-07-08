<?php
$data = tampil($conn);

     if (isset($_POST['tab-sambutan'])) {
         
        ubah_sambutan($conn); //insert ke database
        echo '<meta http-equiv="refresh" content="1;url=?mod=home" />';

    }

    if (isset($_POST['tab-profil'])) {
         $var = $_FILES['user_image']['name'];
        if (strlen($var) > 0) {
          $path = "../images/profil/";
          if ($data['foto'] == '') {
              upload_file(user_image, $path); //upload berkas baru
          }else{
          unlink($path.$data['foto']);        
          upload_file(user_image, $path); //upload berkas baru

          }
        }
        ubah($conn,$var); //insert ke database
        echo '<meta http-equiv="refresh" content="1;url=?mod=home" />';

    }
    

?>

 <div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12" align="center">
                <h1 class="page-header">Halaman Utama</h1>
            </div>
        </div>

        <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Informasi
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#home" data-toggle="tab">Pesan Sambutan</a>
                                </li>
                                <li><a href="#profile" data-toggle="tab">Profile</a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="home">

                                <form method="post" method="post" enctype="multipart/form-data" >
                                        <div class="form-group input-group">
                                            <h1>Sambutan Singkat</h1>
                                            <textarea rows="10" cols="100" name="sambutan"><?php echo $data['sambutan']; ?></textarea>                                
                                        </div>                                                                        
                                         <div class="box-footer">
                                          <div class="row ">
                                            <div class="col-xs-12 col-sm-1" align="right">                                   
                                              <button type="submit" name="tab-sambutan" class="btn btn-primary">Simpan</button>
                                            </div>
                                          </div>
                                        </div>
                                    </form>

                                </div>
                                <div class="tab-pane fade" id="profile">
                                   <form method="post" method="post" enctype="multipart/form-data" >
                                        <div class="form-group input-group">
                                        <label>Nama</label>
                                            <input type="text" name="nama" class="form-control" size="50" value="<?php echo $data['nama']; ?>">
                                        </div>
                                    
                                        <div class="form-group input-group">
                                        <label>Jabatan</label>
                                            <input type="text" name="jabatan" class="form-control" size="50" value="<?php echo $data['jabatan']; ?>">
                                        </div>

                                        <div class="form-group input-group">
                                        <label>Periode</label>
                                            <input type="text" name="periode" class="form-control" size="50" value="<?php echo $data['periode']; ?>">
                                        </div>

                                        <div class="form-group input-group">
                                        <label>Foto</label>
	                                      <input class="input-group" type="file" name="user_image" accept="image/*" />
	                                    </div>
	                                    <div class="form-group input-group">
                                        <?php
                                        $foto = $data['foto'];
                                            if ($foto =='') {
                                                # code...
                                        ?>                                
                                            <img src="../images/no-image.png" class="img-responsive" width="300" height="300">
                                        <?php
                                            }else{
                                        ?>
                                            <img src="../images/profil/<?php echo $data['foto']?>" class="img-responsive" width="300" height="300">
                                        <?php
                                            }
                                        ?>
	                                    </div>
        	                             <div class="box-footer">
                                          <div class="row ">
                                            <div class="col-xs-12 col-sm-1" align="right">                                   
                                              <button type="submit" name="tab-profil" class="btn btn-primary">Simpan</button>
                                            </div>
                                          </div>
                                        </div>
                                    </form>

                                </div>                               
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
               
            </div>

    </div>
</div>
