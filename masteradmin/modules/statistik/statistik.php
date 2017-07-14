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
              alert_warning("Data Telah Dihapus Secara Permanen"); //tampilin pesan data berhasil disimpan
              echo '<meta http-equiv="refresh" content="2;url=?mod=statistik" />';
          }
          ?>
            <div class="col-lg-12" align="center">
                <h1 class="page-header">Halaman Statistik</h1>
            </div>           
            <div class="row">

                <div class="col-lg-12">
                <br/>
                <a class="btn btn-default" href="?mod=statistik_new"> <span class="glyphicon glyphicon-plus"></span> &nbsp; Tambah data </a> 
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
                <th>Uraian</th>
                <th>Anggaran</th>
                <th>Realisai</th>
                <th>Total</th>
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
                <td><?php echo $data['uraian'];?></td>
                <td><?php echo $data['anggaran'];?></td>
                <td><?php echo $data['realisasi'];?></td>
                <td><?php echo $data['total'];?></td>
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
