<?php require_once 'awal.php';?>


    <body class="homepage">   
<?php 
require_once 'header.php';
//require_once 'slider.php';

//die;


?>

<section id="portfolio">
        <div class="container">
            <div class="center">
               <h2>Portfolio</h2>
               <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut <br> et dolore magna aliqua. Ut enim ad minim veniam xxx</p>
               
            </div>
        

            <!-- <ul class="portfolio-filter text-center">
                <li><a class="btn btn-default active" href="#" data-filter="*">All Works</a></li>
                <li><a class="btn btn-default" href="#" data-filter=".bootstrap">Creative</a></li>
                <li><a class="btn btn-default" href="#" data-filter=".html">Photography</a></li>
                <li><a class="btn btn-default" href="#" data-filter=".wordpress">Web Development</a></li>
            </ul> --><!--/#portfolio-filter-->
            <?php
            //while($data = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM gallery"))){
                //echo $data[alt];
                $query     = ("SELECT * FROM gallery");
                $tampil     = mysqli_query($conn,$query);
                while ($data=mysqli_fetch_array($tampil)) {
                    
                    ?>
            
            <!-- <div class="row">
                <div class="portfolio-items"> -->
                    <div class="portfolio-item apps col-xs-12 col-sm-4 col-md-3">
                        <div class="recent-work-wrap">
                            <img class="img-responsive" src="images/gallery/<?php echo $data['foto']; ?>" alt="foto">
                            <div class="overlay">
                                <div class="recent-work-inner">
                                    <h3><a href="#"><?php echo $data['alt']?></a></h3>
                                    
                                     <a class="preview" href="images/gallery/<?php echo $data['foto']; ?>" rel="prettyPhoto"><i class="fa fa-eye"></i> View</a> 
                                </div> 
                            </div>
                        </div>
                    </div><!--/.portfolio-item-->
            
            <!--     </div>
            </div> -->
             <?php
             
                   }
            ?>
        </div>
    </section><!--/#portfolio-item-->


<?php
require_once 'footer.php';
require_once 'required-js.php';
?>

</body>

</html>