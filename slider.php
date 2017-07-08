<?php


  $banner1 = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM banner"),MYSQLI_ASSOC);
  
  $banner = "SELECT * FROM banner order by id desc";
  $result_banner = $conn->query($banner);

  $row = mysqli_fetch_array(mysqli_query($conn,"SHOW TABLE STATUS LIKE 'banner'"),MYSQLI_ASSOC);
    $barisbanner= $row['Rows'];


?>       
 <div class="slider">
            <div class="container">            
                <div id="about-slider">
                <?php
                
                ?>
                 <div id="carousel-slider" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators visible-xs">
                        <?php
                            $urut = 0;
                            for ($i=0; $i < $barisbanner; $i++) { 
                                $urutx = $urut++;
                                if ($urutx == 0) {
                                    ?>
                                        <li data-target="#carousel-slider" data-slide-to="0" class="active"></li>
                                    <?php
                                }elseif ($urutx !=0) {
                                    ?>
                                    <li data-target="#carousel-slider" data-slide-to="<?php echo $urutx ?>"></li>
                                    <?php
                                }
                            }
                        ?>

                        </ol>                       

                        <div class="carousel-inner">
                            <div class="item active">
                                <img src="images/banner/<?php echo $banner1['foto'];?>" alt="" class="img-rounded" >
                            </div>
                            <?php
                            $nobanner = 1;
                            while ($databanner= mysqli_fetch_array($result_banner,MYSQLI_ASSOC)) {
                            ?>
                            <div class="item">
                                <img src="images/banner/<?php echo $databanner['foto'];?>" alt="" class="img-rounded" > 
                            </div>
                            <?php
                            $nobanner++;
                            }
                            ?>
                        </div>

                        <a class="left carousel-control xs" href="#carousel-slider" data-slide="prev">
                            <i class="fa fa-angle-left"></i> 
                        </a>

                        <a class=" right carousel-control xs"href="#carousel-slider" data-slide="next">
                            <i class="fa fa-angle-right"></i> 
                        </a>
                    </div> <!--/#carousel-slider-->
                </div><!--/#about-slider-->
            </div>
        </div>
