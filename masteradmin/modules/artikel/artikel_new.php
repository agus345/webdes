 <div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
          <?php
          $modname = $_GET['mod']; //ambil nama modul

          if(isset($_GET['id'])){
            $id =(int) $_GET['id'];
            set_nonaktif($conn,$id);
          } elseif(isset($_GET['non'])) {
            $id =(int) $_GET['non'];
            aktif($conn,$id);
          }


          if (isset($_POST['sampah'])){
            $result = tampil_nonaktif($conn);
          } else {
            $result = tampil($conn);
          }        

          if (isset($_GET['del'])) {
              hapus_permanen($conn,$_GET['del']); //insert ke database
              alert_warning("Artikel Telah Dihapus Secara Permanen"); //tampilin pesan data berhasil disimpan
              //echo '<meta http-equiv="refresh" content="2;url=?mod=pengguna" />';
          }
          ?>
            <div class="col-lg-12" align="center">
                <h1 class="page-header">Halaman Artikel</h1>
            </div>
            <div class="row">

            <?php
            if (isset($_POST['tambah'])) {
              $var = $_FILES['user_image']['name'];
              $ext = pathinfo($var, PATHINFO_EXTENSION);             
            if (strlen($var) > 0) {
              $path = "../images/artikel/";
        //      unlink("../img/".$row['gambar']); //hapus dulu gambar yang lama
              upload_file(user_image, $path); //upload berkas baru
              $gambar = $path.$var;
              $gambar_crop_nama = "artikel-".$var;
              $gambar_crop = $path."artikel-".$var;
              cropImage(1169, 487, "$gambar", $ext, "$gambar_crop");
            }
            insert($conn,$gambar_crop_nama); //insert ke database
            alert_success("artikel Berhasil Ditambahkan"); //tampilin pesan data berhasil disimpan
              echo '<meta http-equiv="refresh" content="2;url=?mod=artikel" />';
            }
            ?>
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h3>Form Tambah Pengguna</h3>
                             <form method="post" enctype="multipart/form-data" enctype="multipart/form-data" >
                               <div class="col-lg-6">
                                   <div class="form-group">
                                        <label>Judul</label>
                                        <input class="form-control" placeholder="Masukkan Judul Artikel" name="judul">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                   <div class="form-group">
                                        <label>Pilih Kategori Artikel</label>
                                        <?php selectdata($conn, kategori_artikel, "kategori_artikel", id, nama) ?>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                   <div class="form-group">
                                        <label>Deskripsi Singkat</label>
                                        <textarea class="form-control" Placeholder="Maksimal 50 Karakter" rows="3" name="deskripsi_singkat"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                   <div class="form-group">
                                        <label>Isi Artikel</label>
                                        <textarea class="form-control" rows="10" name="isi"></textarea>
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
