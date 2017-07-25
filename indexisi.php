<?php 
require_once 'awal.php';?>


    <body class="homepage">   
<?php 
require_once 'header.php';
require_once 'slider.php';


  $profil = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM profil"),MYSQLI_ASSOC);
  
  $artikel = "SELECT * FROM artikel order by id desc limit 5";
  $r_artikel = $conn->query($artikel);

?>





        <section id="blog" class="container">        
            <div align="center">
            <ol class="breadcrumb">
                <li><a href=""> <h1 style="color:black "><b>SEKILAS BERITA</b></h1></a></li>
            </ol>
            </div>        
            <div class="blog">
                <div class="row">
                    <div class="col-md-8">
                        <div class="blog-item">
                            <div class="row">
                            
                            <?php
                            $noartikel = 1;
                            while ($d_artikel= mysqli_fetch_array($r_artikel,MYSQLI_ASSOC)) {
                            ?>
                                <div class="col-xs-12 col-sm-4 blog-content">
                                        <div align="center">
                                        <?php
                                            if ($d_artikel['foto'] == "") {
                                                ?>
                                                <div class="col-md-12">                                                    
                                                    <img class=" img-blog" src="images/no-image.png" width="200" height="200" alt="artikel-desa" />
                                                </div>
                                            <?php
                                            }else{?>

                                                <div class="col-md-12">                                                    
                                                    <img class="img-blog" src="images/artikel/<?php echo $d_artikel['foto'];?>" width="200" height="200" alt="<?php echo $d_artikel['judul'];?>" />
                                                </div>
                                            <?php
                                            }
                                        ?>
                                        </div>
                                        <a href="blog-item.html"><?php echo $d_artikel['judul'];?></a>
                                        <p align="justify"><?php echo $d_artikel['deskripsi_singkat'];?></p>
                                        <a class="btn btn-primary readmore" href="artikel.html?no_urut=<?php echo $d_artikel['id'];?>">Baca Selengkapnya <i class="fa fa-angle-right"></i></a>
                                </div>                           
                             <?php
                                $noartikel++;
                                }
                            ?>
                            </div>    
                        </div><!--/.blog-item-->
                    </div><!--/.col-md-8-->

                    <aside class="col-md-4">

                        <div class="widget categories">
                            <h3><b>Profil Kepala Desa</b></h3>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div align="center">
                                        <!-- <img src="images/blog/avatar3.png" alt=""  /> -->
                                        <img src="images/profil/<?php echo $profil['foto'];?>" width="200">
                                        <br/> <p></p>
                                        <p>Nama <a href="#"><?php echo $profil['nama'];?></a><br/>Sebagai <a href="#"><?php echo $profil['jabatan'];?></a><br/>Periode <?php echo $profil['periode'];?> </p>
                                    </div>                                
                                    <!--                                     
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="social">
                                                <ul class="social-share">
                                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li> 
                                                    <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-skype"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div> 
                                    -->
                                </div>
                            </div>                     
                        </div><!--/.recent comments-->  
                        <div class="widget categories">
                            <h3><b>Sambutan Kepala Desa</b></h3>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div align="center">                                        
                                        <p align="justify"><?php echo $profil['sambutan'];?> </p>
                                    </div>                                                                   
                                </div>
                            </div>                     
                        </div><!--/.recent comments-->                        
                </aside>  
            </div><!--/.row-->
        </div>
    </section><!--/#blog-->

    <section id="blogstat" class="container">        
             <div align="center">
            <ol class="breadcrumb">
                <li><a href=""> <h1 style="color:black "><b>DATA STATISTIK</b></h1></a></li>
            </ol>
            </div>
       <div class="container">         
            <div class="skill-wrap clearfix">           
                <div class="center wow fadeInDown">
                    <div class="col-md-12">
                            <div class="panel panel-primary">
                                <div class="panel-heading" align="center" style="background-color: #366f33;"><P>LAPORAN PERTANGGUNGJAWABAN REALISASI PELAKSANAAN ANGGARAN PENDAPATAN DAN BELANJA DESA<br>
                                PEMERINTAHAN DESA PASIRKALIKI TAHUN ANGGARAN 2016</P></div>
                                    <div class="col-md-12">
                                        <div class="panel-body">
                                            <div id ="anggaran"></div>
                                        </div>              
                                    </div>
                                   
                            </div>
                    </div>
                </div>
                <div class="center wow fadeInDown">
                    <div class="container" style="margin-top:20px">
                        <div class="col-md-12">
                            <div class="panel panel-primary">
                                <div class="panel-heading" align="center" style="background-color: #366f33;"><P>LAPORAN PERTANGGUNGJAWABAN REALISASI PELAKSANAAN ANGGARAN PENDAPATAN DAN BELANJA DESA<br>
                                PEMERINTAHAN DESA PASIRKALIKI TAHUN ANGGARAN 2016</P></div>
                                    <div class="col-md-12">
                                        <div class="panel-body">
                                            <div id ="realisasi"></div>
                                        </div>              
                                    </div>
                                   
                            </div>
                        </div>
                    </div>

                </div>
            </div>
                
        </div>
              
        </div><!--/.container-->
    </section><!--/about-us-->

<?php
require_once 'footer.php';
require_once 'required-js.php';
?>

</body>

</html>