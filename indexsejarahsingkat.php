<?php require_once 'awal.php';?>


    <body class="homepage">   
<?php 
require_once 'header.php';
//require_once 'slider.php';
 $d_sejarah = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM sejarah"),MYSQLI_ASSOC);

?>
        <section id="blog" class="container">        
            <div align="center">
            <ol class="breadcrumb">
                <li><a href=""> <h1 style="color:black "><b>Sejarah Singkat Desa</b></h1></a></li>
            </ol>
            </div>
            <div class="blog">
                <div class="row">
                    <div class="col-md-12">
                        <div class="blog-item">
                            <div class="row">
                          
                                <div class="col-md-8 col-md-offset-2">
                                        
                                     <?php
                                            if ($d_sejarah['foto'] == "") {
                                                ?>
                                                <div align="center">
                                                    <img class="img-responsive img-blog" src="images/no-image.png" width="50%" alt="<?php echo $d_sejarah['judul'];?>" />
                                                </div>
                                            <?php
                                            }else{?>
                                             <div align="center">
                                                <img class="img-responsive img-blog" src="images/artikel/<?php echo $d_sejarah['foto'];?>" width="50%" alt="<?php echo $d_sejarah['judul'];?>" />
                                             </div>   
                                            <?php
                                            }
                                        ?>                                   
                                    <h3><?php  echo $d_sejarah['isi'];?></h3>
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