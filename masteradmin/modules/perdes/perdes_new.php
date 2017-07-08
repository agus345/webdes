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
              alert_warning("Perdes Telah Dihapus Secara Permanen"); //tampilin pesan data berhasil disimpan
              //echo '<meta http-equiv="refresh" content="2;url=?mod=pengguna" />';
          }
          ?>
            
            <div class="row">

            <?php
            if (isset($_POST['tambah'])) {
              $var = $_POST['perdes'];             
              $sql = "INSERT INTO perdes (aturan) VALUES ('$var')";
              mysqli_query($conn,$sql) or die(mysqli_connect_error());
              //insert($conn,$var); //insert ke database      
              alert_success("{Perdes} Berhasil Ditambahkan"); //tampilin pesan data berhasil disimpan
              echo '<meta http-equiv="refresh" content="2;url=?mod=perdes" />';
            }
            ?>

            <div class="col-lg-12" align="center">
                <h1 class="page-header">Halaman Perdes Desa</h1>
            </div>
            <div class="row">          
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h3>Form Tambah Perdes</h3>
                               <form method="post">
                                <div class="form-group">
                                <h1>Nama peraturan</h1>
                                  <textarea rows="5" class="form-control" name="perdes" placeholder="Masukan no perdes, dan isi perdes"></textarea>
                                </div>
                                 <div class="box-footer">
                                    <div class="col-lg-12" align="right">
                                      <button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
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
                        <a class="btn btn-default" href="?mod=perdes"> <span class="glyphicon glyphicon-arrow-left"></span> &nbsp; Kembali </a> 
                           

                        </div>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>

        </div>
    </div>
</div>
</div>
