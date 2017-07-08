<?php require_once 'awal.php';?>


    <body class="homepage">   
<?php 
require_once 'header.php';
//require_once 'slider.php';

$struktur = "SELECT * FROM struktur_desa order by id desc";
$r_struktur = $conn->query($struktur);

?>

    <section id="feature" class="transparent-bg">
        <div class="container">
<br/>
            <div class="clients-area center wow fadeInDown">
                <h2>Struktur Desa</h2>
            </div>

            <div class="row">
            <?php
                $nobanner = 1;
                while ($d_struktur= mysqli_fetch_array($r_struktur,MYSQLI_ASSOC)) {
            ?>


                <div class="col-xs-12 col-sm-4 wow fadeInDown">
                    <div class="clients-comments text-center">
                    <?php
                    if ($d_struktur['foto'] == '') {?>
                        <img src="images/no-image.png" class="img-circle" alt="Struktur Desa">
                    <?php }else{?>

<img src="images/strukturdesa/<?php echo $d_struktur['foto'];?>" class="img-circle" alt="<?php echo $d_struktur['nama'];?>">
                    <?php }
                    ?>
                        

                        <h4><span>-<?php echo $d_struktur['nama'];?> /</span>  <?php echo $d_struktur['jabatan'];?></h4>
                    </div>
                </div>
            <?php
                $nobanner++;
                }
            ?>
                
            </div>
        </div><!--/.container-->
    </section><!--/#feature-->



<?php
require_once 'footer.php';
require_once 'required-js.php';
?>

</body>

</html>