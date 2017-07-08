<?php require_once 'awal.php';?>


    <body class="homepage">   
<?php 
require_once 'header.php';
//require_once 'slider.php';
  $berita = "SELECT * FROM artikel where kategori_artikel_id = '2' order by id desc";
  $r_berita = $conn->query($berita);

?>
        <section id="blog" class="container">        
            <div align="center">
            <ol class="breadcrumb">
                <li><a href=""> <h1 style="color:black "><b>Sosial & Budaya</b></h1></a></li>
            </ol>
            </div>
            <div class="blog">
                <div class="row">
                    <div class="col-md-12">
                        <div class="blog-item">
                            <div class="row">
                            <?php
                            $noartikel = 1;
                            while ($d_berita= mysqli_fetch_array($r_berita,MYSQLI_ASSOC)) {
                            ?>
                                <div class="col-md-4">
                                    <a href="">
                                     <?php
                                            if ($d_berita['foto'] == "") {
                                                ?>
                                            <img class="img-responsive img-blog" src="images/no-image.png" width="100%" alt="<?php echo $d_berita['judul'];?>" />
                                            <?php
                                            }else{?>

                                            <img class="img-responsive img-blog" src="images/artikel/<?php echo $d_berita['foto'];?>" width="100%" alt="<?php echo $berita['judul'];?>" />
                                            <?php
                                            }
                                        ?>
                                    </a>
                                    
                                    <h2><a href=""><?php  echo $d_berita['deskripsi_singkat'];?></a></h2>
                                    <h3><?php  echo $d_berita['isi'];?></h3>
                                    <a class="btn btn-primary readmore" href="artikel.html?no_urut=<?php echo $d_berita['id'];?>">Baca Selengkapnya <i class="fa fa-angle-right"></i></a>
                                    <input type="button" value="Kembali" onClick="history.go(-1)" class="btn btn-danger readmore">
                                </div>
                                <?php
                                $noartikel++;
                                }
                            ?>
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