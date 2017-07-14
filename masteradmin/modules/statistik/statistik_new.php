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
                <h1 class="page-header">Tambah Anggaran</h1>
            </div>
            <div class="row">

            <?php
            if (isset($_POST['tambah'])) {            
                $uraian = $_POST['uraian'];
                $anggaran = $_POST['anggaran'];
                $realisasi = $_POST['realisasi'];

                $total = $anggaran + $realisasi;
            $sql = "INSERT INTO anggarandesa (uraian,anggaran,realisasi,total) values ('$uraian','$anggaran','$realisasi','$total')";
            
            mysqli_query($conn,$sql);
                             
              alert_success("Anggaran Berhasil Ditambahkan"); //tampilin pesan data berhasil disimpan
              echo '<meta http-equiv="refresh" content="2;url=?mod=statistik" />';
            }
            ?>
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h3>Form Tambah Data Statistik</h3>
                             <form method="post" > 
                                <div class="col-lg-12">
                                   <div class="form-group">
                                        <label></label>
                                        <input type="text" class="form-control" Placeholder="Masukan Uraian Anggaran" name="uraian">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                   <div class="form-group">
                                        <label></label>
                                        <input type="text" class="form-control" Placeholder="Masukkan Anggaran" name="anggaran">
                                    </div>
                                </div>     
                                <div class="col-lg-12">
                                   <div class="form-group">
                                        <label></label>
                                        <input type="text" class="form-control" Placeholder="Masukkan Realisai" name="realisasi">
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
                        <a class="btn btn-default" href="?mod=statistik"> <span class="glyphicon glyphicon-arrow-left"></span> &nbsp; Kembali </a> 
                           

                        </div>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>

        </div>
    </div>
</div>
