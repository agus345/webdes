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
              alert_success("artikel Berhasil Ditambahkan, password pengguna baru sama dengan username pengguna"); //tampilin pesan data berhasil disimpan
              //echo '<meta http-equiv="refresh" content="2;url=?mod=pengguna" />';
          }

          if (isset($_GET['del'])) {
              hapus_permanen($conn,$_GET['del']); //insert ke database
              alert_warning("artikel Telah Dihapus Secara Permanen"); //tampilin pesan data berhasil disimpan
              //echo '<meta http-equiv="refresh" content="2;url=?mod=artikel" />';
          }
          ?>
            <div class="col-lg-12" align="center">
                <h1 class="page-header">Halaman artikel</h1>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h3>Form Tambah artikel</h3>
                              <form role="form" method="post" action="">
                                <div class="row show-grid">
                                    <div class="col-xs-6 col-sm-6">
                                      <input type="text" class="form-control" name="isi" placeholder=" isi" required autofocus>
                                    </div>
                                    <div class="row show-grid">
                                    <div class="col-xs-6  col-sm-6" >Artikel Kateori</label>
                                      <div class="col-md-9">
                                        <select class="form-control" name="artikel_kategori-input" id="artikel_kategori-input">
                                          <option value="profil-profil">profil-profil</option>
                                          <option value="potensi desa">potensi desa</option>
                                        </select>
                                      </div>

                                    <div class="col-xs-6 col-sm-6">
                                      <label class="control-label col-md-3" >Status</label>
                                      <div class="col-md-9">
                                        <select class="form-control" name="aktif-input" id="aktif-input">
                                          <option value="Non aktif">Non aktif</option>
                                          <option value="Aktif">Aktif</option>
                                        </select>
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
                                <button type="submit" name="sampah" class="btn btn-warning">artikel Tidak Aktif</button>
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
                <th>Isi Aritikel</th>
                <th>Kategori artikel</th>
               
                <th>Hak Akses</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>No</th>
                <th>Isi Aritikel</th>
                <th>Kategori artikel</th>
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
                <td><?php echo $data['isi'];?></td>
                <td><?php echo $data['artikel_kategori'];?></td>
                <td><?php echo $data['aktif'];?></td>
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
