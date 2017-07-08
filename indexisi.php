<?php 
require_once 'awal.php';?>


    <body class="homepage">   
<?php 
require_once 'header.php';
require_once 'slider.php';


  $profil = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM profil"),MYSQLI_ASSOC);
  
  $artikel = "SELECT * FROM artikel order by id desc";
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
                                            <img class="img-responsive img-blog" src="images/no-image.png" width="100%" alt="<`" />
                                            <?php
                                            }else{?>
                                            <img class="img-responsive img-blog" src="images/artikel/<?php echo $d_artikel['foto'];?>" width="100%" alt="<?php echo $d_artikel['judul'];?>" />
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
                    <h2>Data <span>Statistik Desa xxx</span></h2>
                    <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut <br> et dolore magna aliqua. Ut enim ad minim veniam</p>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <canvas id="myChart" ></canvas>
                        <div align="center">
                            <p><b>Data Penduduk</b></p>                            
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <canvas id="myChart2" ></canvas>
                        <div align="center">
                            <p><b>Data Pendapatan Daerah</b></p>                            
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <canvas id="myChart3" ></canvas>
                        <div align="center">
                            <p><b>Data Pemasukkan</b></p>                            
                        </div>
                    </div>
                </div>

               <!--  <div class="row">       
                    <div class="col-sm-3">
                        <div class="sinlge-skill wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
                            <div class="joomla-skill">                                   
                                <p><em>85%</em></p>
                                <p>Joomla</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="sinlge-skill wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                            <div class="html-skill">                                  
                                <p><em>95%</em></p>
                                <p>HTML</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="sinlge-skill wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="900ms">
                            <div class="css-skill">                                    
                                <p><em>80%</em></p>
                                <p>CSS</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="sinlge-skill wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="1200ms">
                            <div class="wp-skill">
                                <p><em>90%</em></p>
                                <p>Wordpress</p>                                     
                            </div>
                        </div>
                    </div>                  
                </div>  
            </div>
 -->

        </div><!--/.container-->
    </section><!--/about-us-->

<?php
require_once 'footer.php';
require_once 'required-js.php';
?>

</body>

</html>