<?php


  $banner1 = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM banner"),MYSQLI_ASSOC);
  
  $banner = "SELECT * FROM banner order by id desc";
  $result_banner = $conn->query($banner);

  $row = mysqli_fetch_array(mysqli_query($conn,"SHOW TABLE STATUS LIKE 'banner'"),MYSQLI_ASSOC);
    $barisbanner= $row['Rows'];


?>       

<script type="text/javascript" src="js/jssor.min.js"></script>
    <script>
        jssor_slider1_init = function (containerId) {
            //Reference https://www.jssor.com/development/slider-with-slideshow.html
            //Reference https://www.jssor.com/development/tool-slideshow-transition-viewer.html

            var _SlideshowTransitions = [
                //Fade
                { $Duration: 1200, $Opacity: 2 }
            ];

            var options = {
                $SlideDuration: 500,                                //[Optional] Specifies default duration (swipe) for slide in milliseconds, default value is 500
                $DragOrientation: 3,                                //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $Cols is greater than 1, or parking position is not 0)
                $AutoPlay: 1,                                    //[Optional] Auto play or not, to enable slideshow, this option must be set to greater than 0. Default value is 0. 0: no auto play, 1: continuously, 2: stop at last slide, 4: stop on click, 8: stop on user navigation (by arrow/bullet/thumbnail/drag/arrow key navigation)
                $Idle: 1500,                            //[Optional] Interval (in milliseconds) to go for next slide since the previous stopped if the slider is auto playing, default value is 3000
                $SlideshowOptions: {                                //[Optional] Options to specify and enable slideshow or not
                    $Class: $JssorSlideshowRunner$,                 //[Required] Class to create instance of slideshow
                    $Transitions: _SlideshowTransitions,            //[Required] An array of slideshow transitions to play slideshow
                    $TransitionsOrder: 1,                           //[Optional] The way to choose transition to play slide, 1 Sequence, 0 Random
                    $ShowLink: true                                    //[Optional] Whether to bring slide link on top of the slider when slideshow is running, default value is false
                }
            };

            var jssor_slider1 = new $JssorSlider$('slider1_container', options);
        }
    </script>
 <div class="slider" align="center">
    <div class="container">            
        <div id="about-slider">

            <div id="slider1_container" style="position:relative;width:800px;height:400px;">

                <!-- Loading Screen -->
                <div data-u="loading" style="position:absolute;top:0px;left:0px;background:url('../img/loading.gif') no-repeat 50% 50%; background-color: rgba(0, 0, 0, .7);"></div>

                <!-- Slides Container -->
                <div u="slides" style="position: absolute; left: 0px; top: 0px; width: 800px; height: 400px;overflow: hidden;">
                      <?php
                $nobanner = 1;
                    while ($databanner= mysqli_fetch_array($result_banner,MYSQLI_ASSOC)) {
                ?>

                <div>
                        <img u=image src="images/banner/<?php echo $databanner['foto'];?>" />                                              
                </div>


                <?php
                    $nobanner++;
                    }
                ?>            
                </div>

                <!-- Trigger -->
                <script>
                    jssor_slider1_init();
                </script>
            </div>
        </div>
    </div>
</div>

   