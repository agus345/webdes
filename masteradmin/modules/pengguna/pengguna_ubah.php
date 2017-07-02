 <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                  <?php
                    $id = (int) $_GET['id']; //ambil id
                    if (isset($_POST['ubah'])) { //ketika tombol ubah diklik
                        ubah($conn); //ubah data
                        alert_success("Data Berhasil Diubah");
                        echo '<meta http-equiv="refresh" content="2;url=?mod=pengguna" />';
                    }

                    $row = tampil_pengguna_ubah($conn,$id); //tampilkan data

                  ?>

                  <div class="col-lg-12" align="center">
                      <h1 class="page-header">Halaman Pengguna</h1>
                  </div>
                  <div class="row">
                      <div class="col-lg-12">
                          <div class="panel panel-default">
                              <div class="panel-body">
                                  <h3>Form Ubah Pengguna</h3>
                                    <form role="form" method="post" action="">
                                      <div class="row show-grid">
                                          <div class="col-xs-6 col-sm-6">
                                            <input type="text" class="form-control" name="username" placeholder="Masukkan Username" value="<?=$row['username'] ?>" required autofocus>
                                          </div>
                                          <div class="col-xs-6 col-sm-6">
                                            <input type="text" class="form-control" name="nama_panggilan" placeholder="Masukkan Nama" value="<?=$row['nama_panggilan'] ?>" required>
                                          </div>
                                          <div class="col-xs-6 col-sm-6">
                                            <input type="text" class="form-control" name="nama_lengkap" placeholder="Masukkan Nama Lengkap" value="<?=$row['nama_lengkap'] ?>" required>
                                          </div>
                                          <div class="col-xs-6 col-sm-6">
                                              <?php selectdataedit($conn,'Hak Akses', nama_hak_akses, "hak_akses where aktif='1' order by nama asc", id, nama,$row['hak_akses_id'], getanytampil($conn,hak_akses, id, $row['hak_akses_id'], nama)) ?>
                                          </div>
                                      </div>
                                      <div class="box-footer" align="right">
                                        <button type="submit" name="ubah" class="btn btn-primary">Ubah</button>
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
