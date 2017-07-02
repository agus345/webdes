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

          if (isset($_POST['tambah'])) {
              insert($conn); //insert ke database
              alert_success("Pengguna Berhasil Ditambahkan, password pengguna baru sama dengan username pengguna"); //tampilin pesan data berhasil disimpan
              //echo '<meta http-equiv="refresh" content="2;url=?mod=pengguna" />';
          }

          if (isset($_GET['del'])) {
              hapus_permanen($conn,$_GET['del']); //insert ke database
              alert_warning("Pengguna Telah Dihapus Secara Permanen"); //tampilin pesan data berhasil disimpan
              //echo '<meta http-equiv="refresh" content="2;url=?mod=pengguna" />';
          }
          ?>
            <div class="col-lg-12" align="center">
                <h1 class="page-header">Halaman Pengguna</h1>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h3>Form Tambah Pengguna</h3>
                              <form role="form" method="post" action="">
                                <div class="row show-grid">
                                    <div class="col-xs-6 col-sm-6">
                                      <input type="text" class="form-control" name="username" placeholder="Masukkan Username" required autofocus>
                                    </div>
                                    <div class="col-xs-6 col-sm-6">
                                      <input type="text" class="form-control" name="nama_panggilan" placeholder="Masukkan Nama" required>
                                    </div>
                                    <div class="col-xs-6 col-sm-6">
                                      <input type="text" class="form-control" name="nama_lengkap" placeholder="Masukkan Nama Lengkap" required>
                                    </div>
                                    <div class="col-xs-6 col-sm-6">
                                        <?php selectdata($conn,'Hak Akses', nama_hak_akses, "hak_akses where aktif='1' order by nama asc", id, nama) ?>
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
                                <button type="submit" name="sampah" class="btn btn-warning">Pengguna Tidak Aktif</button>
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
                <th>Usernama</th>
                <th>Nama Panggilan</th>
                <th>Nama Lengkap</th>
                <th>Hak Akses</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>No</th>
                <th>Usernama</th>
                <th>Nama Panggilan</th>
                <th>Nama Lengkap</th>
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
                <td><?php echo $data['username'];?></td>
                <td><?php echo $data['nama_panggilan'];?></td>
                <td><?php echo $data['nama_lengkap'];?></td>
                <td><?php echo getanytampil($conn,hak_akses, id, $data['hak_akses_id'], nama) ?></td>
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
