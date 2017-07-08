<?php require_once 'awal.php';?>


    <body class="homepage">   
<?php 
require_once 'header.php';
//require_once 'slider.php';
 $d_sambutan = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM sambutan"),MYSQLI_ASSOC);

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
                                    <h3><p align="justify"><?php  echo $d_sambutan['isi_sambutan'];?></p></h3>
                                    <br/></br/>
                                    <h3><b><u><?php  echo $d_sambutan['nama'];?></u></b></h3>

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