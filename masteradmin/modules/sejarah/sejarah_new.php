 <div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
          <?php
          $modname = $_GET['mod']; //ambil nama modul
    
            if (isset($_POST['tambah'])) {
              $var = $_FILES['user_image']['name'];


              //  $var = $_FILES['user_image']['name'];
              if (strlen($var) > 0) {
                  $path = "../images/sejarah/";
                  //unlink("../img/".$row['gambar']); //hapus dulu gambar yang lama
                  upload_file(user_image, $path); //upload berkas baru
              }

              insert($conn,$var); //insert ke database      
              alert_success("Sejarah Berhasil Ditambahkan"); //tampilin pesan data berhasil disimpan
              echo '<meta http-equiv="refresh" content="2;url=?mod=sejarah" />';
            }
            ?>
        <div class="col-lg-12">
          <div class="panel panel-default">
            <div class="panel-body">
              <h3>Form Tambah Sejarah</h3>
              <form method="post" enctype="multipart/form-data" enctype="multipart/form-data" >
               <div class="col-lg-12">
                 <div class="form-group">
                  <label>Judul</label>
                  <input class="form-control" placeholder="Masukkan Judul Sejarah" name="judul">
                </div>
              </div>               
              <div class="col-lg-12">
               <div class="form-group">
                <label>Isi Sejarah</label>
                <textarea class="form-control" Placeholder="Input Sejarah" rows="3" name="isi"></textarea>
              </div>
            </div>

            <div class="row show-grid">
              <div class="col-xs-6 col-sm-4">
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
