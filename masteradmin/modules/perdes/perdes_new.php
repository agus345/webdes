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

            <div class="col-lg-12" align="center">
                <h1 class="page-header">Halaman Perdes Desa</h1>
            </div>
            <div class="row">          
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h3>Form Tambah Perdes</h3>
                             <form method="post" enctype="multipart/form-data" enctype="multipart/form-data" >
                               <form method="post" method="post" enctype="multipart/form-data" >
                                <div class="form-group input-group">
                                <h1>Nama peraturan</h1>
                                  <textarea rows="10" cols="100" name="sambutan"><?php echo $data['aturan']; ?></textarea>
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
                        <a class="btn btn-default" href="?mod=perdes"> <span class="glyphicon glyphicon-arrow-left"></span> &nbsp; Kembali </a> 
                           

                        </div>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>

        </div>
    </div>
</div>
