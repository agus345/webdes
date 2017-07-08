<?php require_once 'awal.php';?>


    <body class="homepage">   
<?php 
require_once 'header.php';
//require_once 'slider.php';

$urut = $_GET['no_urut'];
  $berita = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM artikel where id = '$urut'"),MYSQLI_ASSOC);

    
?>
        <section id="blog" class="container">        
            <div align="center">
            <ol class="breadcrumb">
                <li><a href=""> <h1 style="color:black "><b><?php  echo $berita['judul'];?></b></h1></a></li>


            </ol>
            </div>
            <div class="blog">
                <div class="row">
                
                    <div class="col-md-12">
                        <div class="blog-item">
                            <div class="row">          
                                <div class="col-md-8 col-md-offset-2">
                                    <a href="">

                                     <?php
                                            if ($berita['foto'] == "") {
                                                ?>
                                            <img class="img-responsive img-blog" src="images/no-image.png" width="100%" alt="<?php echo $berita['judul'];?>" />
                                            <?php
                                            }else{?>

                                            <img class="img-responsive img-blog" src="images/artikel/<?php echo $berita['foto'];?>" width="100%" alt="<?php echo $berita['judul'];?>" />
                                            <?php
                                            }
                                        ?>


                                    </a>
                                    
                                    <h2><a href=""><?php  echo $berita['deskripsi_singkat'];?></a></h2>
                                    <h3><?php  echo $berita['isi'];?></h3>
                                    <input type="button" value="Kembali" onClick="history.go(-1)" class="btn btn-primary readmore"></a>
                                </div>
                                                                                         
                            </div>    
                        </div><!--/.blog-item-->
            </div><!--/.row-->
        </div>
    </section><!--/#blog-->

<?php
require_once 'footer.php';
require_once 'required-js.php';
?>

</body>

</html>