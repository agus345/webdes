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
          if (isset($_POST['tambah'])) {
              insert($conn); //insert ke database
              alert_success("Hak Akses Berhasil Ditambahkan, password Hak Akses baru sama dengan username Hak Akses"); //tampilin pesan data berhasil disimpan
              echo '<meta http-equiv="refresh" content="1;url=?mod=kategori_artikel" />';
          }

          if (isset($_GET['del'])) {
              hapus_permanen($conn,$_GET['del']); //insert ke database
              alert_warning("Hak Akses Telah Dihapus Secara Permanen"); //tampilin pesan data berhasil disimpan
              echo '<meta http-equiv="refresh" content="1;url=?mod=kategori_artikel" />';
          }

          if (isset($_POST['sampah'])){
            $result = tampil_nonaktif($conn);
          } else {
            $result = tampil($conn);
          }

          ?>
            <div class="col-lg-12" align="center">
                <h1 class="page-header">Halaman Hak Akses</h1>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h3>Form Tambah Hak Akses</h3>
                              <form role="form" method="post" action="">
                                <div class="row show-grid">
                                    <div class="col-xs-6 col-sm-6">
                                      <input type="text" class="form-control" name="nama" placeholder="Masukkan Hak Akses" required autofocus>
                                    </div>
                                </div>
                                <div class="box-footer" align="right">
                                  <button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
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
                            <form method="post" action="">
                              <?php if(!isset($_POST['sampah'])){ ?>
                                <button type="submit" name="sampah" class="btn btn-warning">Data Tidak Aktif</button>
                              <?php } else { ?>
                                <button type="submit" class="btn btn-primary">Kembali</button>
                              <?php } ?>
                            </form>

                        </div>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>




    <table class="table table-bordered table-striped table-hover dataTable" id="example">
        <thead>
            <tr>
                <th>No</th>
                <th>Hak Akses</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>No</th>
                <th>Hak Akses</th>
                <th>Aksi</th>
            </tr>
        </tfoot>
        <tbody>
            <?php
                $i = 1;
                $id = $_GET['id'];
                    while ($data = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
            ?>
            <tr>
                <td><?php echo $i;?></td>
                <td><?php echo $data['nama'];?></td>
                <td>
                	<?php
                    editonrow($modname, $data['id']) ?> | <?php if (isset($_POST['sampah'])){ nonaktifonrow($modname, $data['id']);?> | <?php deleterow($modname, $data['id']); }else{ aktifonrow($modname, $data['id']);}
                  ?>
                </td>
            </tr>
             <?php
                $i++;
                }
            ?>
        </tbody>
    </table>

        </div>
    </div>
</div>
