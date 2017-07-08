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
              echo "ddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd".$_GET['del'];
              echo "dcibjlwbijjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj";
              die;
              alert_warning("Perdes Telah Dihapus Secara Permanen"); //tampilin pesan data berhasil disimpan
              echo '<meta http-equiv="refresh" content="2;url=?mod=perdes" />';
          }else{
            echo "hahahahahahahahaahahah";
          }
          ?>
            <div class="col-lg-12" align="center">
                <h1 class="page-header">Halaman Peraturan Desa</h1>
            </div>           
            <div class="row">

                <div class="col-lg-12">

                    <div class="panel panel-default">
                        <div class="panel-body">
                            <a class="btn btn-default" href="?mod=perdes_new"> <span class="glyphicon glyphicon-plus"></span> &nbsp; Tambah </a>                                                       
                        </div>

                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>

    <table class="table table-bordered table-striped table-hover dataTable" id="example">
        <thead>
            <tr>
                <th>No</th>
                <th>Peraturan</th>
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
                <td><?php echo $data['aturan'];?></td>
                <td>
                  <?php
                    editonrow($modname, $data['id']) ?> | 
                    <?php if (isset($_POST['sampah'])){ nonaktifonrow($modname, $data['id']);?> | <?php deleterow($modname, $id); }else{ 
                      aktifonrow($modname, $data['id'],'Yakin Ingin Dihapus?');
                      /}
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
