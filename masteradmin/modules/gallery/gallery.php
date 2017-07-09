 <div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
          <?php
          error_reporting( ~E_NOTICE );

          $modname = $_GET['mod']; //ambil nama modul

          if(isset($_GET['id'])){
            $id =(int) $_GET['id'];
            set_nonaktif($conn,$id);
          } elseif(isset($_GET['non'])) {
            $id =(int) $_GET['non'];
            aktif($conn,$id);
          }

          if (isset($_GET['del'])) {
              $id= $_GET['del'];
              $row = tampil_ubah($conn,$id); //tampilkan data
              $path = "../images/gallery/";
              unlink($path.$row['foto']);

              hapus_permanen($conn,$_GET['del']); //delete ke database              
              echo '<meta http-equiv="refresh" content="1;url=?mod=gallery" />';
          }

            $result = tampil($conn);

          ?>
            <div class="page-header">
              <i class="fa fa-dashboard fa-fw"></i> <a href="index.php">Dashboard</a> / <a href="?mod=gallery">gallery</a>
            </div>
            <div>
              <a class="btn btn-default" href="?mod=gallery_new"> <span class="glyphicon glyphicon-plus"></span> &nbsp; Tambah gallery </a> 
              
            </div>
            <div class="row">
              <div class="col-lg-12">
                     <?php                      
                        $id = $_GET['id'];
                            while ($data = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
                      ?>
                      
                              <div class="col-xs-3">
                                  <p class="page-header">Deskripsi : <?php echo $data['alt'];?></p>
                                    <img src="../images/gallery/<?php echo $data['foto']; ?>" class="img-responsive img-blog"  width="250px" height="250px" />
                                  <p class="page-header">
                                    <span>
                                    <a class="btn btn-info" href="?mod=<?=$modname?>_ubah&id=<?php echo $data['id']?>" title="click for edit" onclick="return confirm('sure to edit ?')"><span class="glyphicon glyphicon-edit"></span> Edit</a> 
                                    <a class="btn btn-danger" href="?mod=<?=$modname?>&del=<?php echo $data['id']?>" title="click for delete" onclick="return confirm('sure to delete ?')"><span class="glyphicon glyphicon-remove-circle"></span> Delete</a> 
                                    <!-- <a class="btn btn-danger" href="?delete_id=<?php echo $row['id']; ?>" title="click for delete" onclick="return confirm('sure to delete ?')"><span class="glyphicon glyphicon-remove-circle"></span> Delete</a> -->
                                    </span>
                                  </p>
                              </div>                                    
                                        
                     <?php
                        }
                    ?>
                </div>
            </div>

    </div>
</div>
