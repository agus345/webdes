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
              alert_warning("Sejarah Telah Dihapus Secara Permanen"); //tampilin pesan data berhasil disimpan
              echo '<meta http-equiv="refresh" content="2;url=?mod=sejarah" />';
          }
          ?>
            <div class="col-lg-12" align="center">
                <h1 class="page-header">Halaman Sejarah Desa</h1>
            </div>           
            <div class="row">

                <div class="col-lg-12">

                    <div class="panel panel-default">
                        <div class="panel-body">
                            <a class="btn btn-default" href="?mod=sejarah_new"> <span class="glyphicon glyphicon-plus"></span> &nbsp; Tambah sejarah </a>                                                       
                        </div>

                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>

    <table class="table table-bordered table-striped table-hover dataTable" id="example">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>ISI</th>
                <th>Foto</th>
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
                <td><?php echo $data['isi'];?></td>             
                <td>
                    <?php
                        if ($data['foto'] == "") {
                            ?>
                        <img class="img-responsive img-blog" src="../images/no-image.png" width="10%" alt="Sejarah Desa" />
                        <?php
                        }else{?>
                        <img class="img-responsive img-blog" src="../images/sejarah/<?php echo $data['foto'];?>" width="10%" alt="<?php echo $data['nama'];?>" />
                        <?php
                        }
                    ?>
                </td>
                <td>
                    <?php 
                      editonrow($modname, $data['id']) ?> | <?php deleterow($modname, $data['id']);
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