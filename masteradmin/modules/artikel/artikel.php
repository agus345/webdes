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
              echo '<meta http-equiv="refresh" content="2;url=?mod=artikel" />';
          }
          ?>
            <div class="col-lg-12" align="center">
                <h1 class="page-header">Halaman Artikel</h1>
            </div>           
            <div class="row">

                <div class="col-lg-12">
                <br/>
                <a class="btn btn-default" href="?mod=artikel_new"> <span class="glyphicon glyphicon-plus"></span> &nbsp; Tambah Artikel </a> 
                <br/>
                <br/>
                    <!-- <div class="panel panel-default">
                        <div class="panel-body">
                            <form method="post" action="">
                              <?php if(!isset($_POST['sampah'])){ ?>
                                <button type="submit" name="sampah" class="btn btn-warning">Artikel Tidak Aktif</button>
                              <?php } else { ?>
                                <button type="submit" class="btn btn-primary">Kembali</button>
                              <?php } ?>
                            </form>
                            
                               
                            
                        </div>

                    </div> -->
                </div>
                <!-- /.col-lg-12 -->
            </div>




    <table class="table table-bordered table-striped table-hover dataTable" id="example">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Deskripsi Singkat</th>
                <th>Isi</th>
                <th>Foto</th>
                <th>Kategori Artikel</th>
                <th>Aksi</th>
            </tr>
        </thead>
        
        <tbody>
            <?php
                $i = 1;
                $id = $_GET['id'];
                    while ($data = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
            ?>
            <tr>
                <td><?php echo $i;?></td>
                <td><?php echo $data['judul'];?></td>
                <td><?php echo $data['deskripsi_singkat'];?></td>
                <td><?php echo $data['isi'];?></td>
                <td>
                    <?php
                        if ($data['foto'] == "") {
                            ?>
                        <img class="img-responsive img-blog" src="../images/no-image.png" width="25%" alt="Artikel Desa" />
                        <?php
                        }else{?>
                        <img class="img-responsive img-blog" src="../images/artikel/<?php echo $data['foto'];?>" width="25%" alt="<?php echo $data['judul'];?>" />
                        <?php
                        }
                    ?>

                </td>
                <td><?php echo getanytampil($conn,kategori_artikel,id,$data['kategori_artikel_id'],nama)?></td>
                <td>

                    <?php 
                      editonrow($modname, $data['id']) ?> | <?php deleterow($modname, $data['id']); 
                    ?>
                    <!-- <?php 
                      editonrow($modname, $data['id']) ?> | <?php if (isset($_POST['sampah'])){ nonaktifonrow($modname, $data['id']);?> | <?php deleterow($modname, $data['id']); }else{ aktifonrow($modname, $data['id'],'Apakah ingin dihapus ?');}
                    ?> -->
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
