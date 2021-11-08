
<?php if ($banners && count($banners)) { ?>
    <div id="slider">
        <div id="slider1_container" style="position: relative; margin: 0 auto;
             top: 0px; left: 0px; width: 1349px; height: 370px; overflow: hidden;">

            <!-- Slides Container -->
            <div u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width: 1349px;
                 height: 370px; overflow: hidden;">
                 <?php
                 foreach ($banners as $banner) {
                     if ($banner['banner_type'] == Banners::BANNER_TYPE_FLASH)
                         continue;
                     $height = $banner['banner_height'];
                     $width = $banner['banner_width'];
                     ?>
                    <div>
                        <a href="<?php echo $banner['banner_link']; ?>" title="<?php echo $banner['banner_name']; ?>"> 
                            <img alt="<?php echo $banner['banner_name']; ?>" src="<?php echo $banner['banner_src']; ?>" <?php if ($height) { ?> height="<?php echo $height ?>" <?php } if ($width) { ?> width="<?php echo $width; ?>" <?php } ?> alt="<?php echo $banner['banner_name']; ?>"/>
                        </a>
                        <div u=caption t="*" class="captionOrange"  style="position: absolute; width: 400px;text-align: center; height: 370px;top: 120px; left:0;right:0;margin: auto; font-size:28px; color:#fff;
                             text-shadow:2px 2px 1px #032f77,-1px -1px 0 #032f77,  1px -1px 0 #032f77,-1px  1px 0 #032f77,1px  1px 0 #032f77; -webkit-text-shadow:2px 2px 1px #032f77,-1px -1px 0 #032f77,  1px -1px 0 #032f77,-1px  1px 0 #032f77,1px  1px 0 #032f77; -moz-text-shadow:2px 2px 1px #032f77,-1px -1px 0 #032f77,  1px -1px 0 #032f77,-1px  1px 0 #032f77,1px  1px 0 #032f77;
                             ">
                                 <?php echo $banner['banner_name'] ?>
                        </div>
                        <div u=caption t="*" class="captionOrange" style="position: absolute; width: 800px;text-align: center; height: 370px;top: 180px; left:0;right:0;margin: auto; font-size:28px; color:#fff;
                             text-shadow:2px 2px 1px #032f77,-1px -1px 0 #032f77,  1px -1px 0 #032f77,-1px  1px 0 #032f77,1px  1px 0 #032f77; -webkit-text-shadow:2px 2px 1px #032f77,-1px -1px 0 #032f77,  1px -1px 0 #032f77,-1px  1px 0 #032f77,1px  1px 0 #032f77; -moz-text-shadow:2px 2px 1px #032f77,-1px -1px 0 #032f77,  1px -1px 0 #032f77,-1px  1px 0 #032f77,1px  1px 0 #032f77;
                             ">
                                 <?php echo $banner['banner_description'] ?>
                        </div>
                    </div>
                <?php } ?>

            </div>
            <div u="navigator" class="jssorb21" style="bottom: 26px; right: 6px;">

                <div u="prototype"></div>
            </div>
            <span u="arrowleft" class="jssora21l" style="top: 150px; left: 8px;">
            </span>
            <span u="arrowright" class="jssora21r" style="top: 150px; right: 8px;">
            </span>
        </div>
        <?php $themUrl = Yii::app()->theme->baseUrl; ?>
        <script type="text/javascript" src="<?= $themUrl ?>/js/jssor.js"></script> 
        <script type="text/javascript" src="<?= $themUrl ?>/js/jssor.slider.js"></script>
        <!--<script>
        	
            jQuery(document).ready(function ($) {
                //Reference http://www.jssor.com/development/slider-with-slideshow-jquery.html
                //Reference http://www.jssor.com/development/tool-slideshow-transition-viewer.html

                var _SlideshowTransitions = [
                    //Shift LR
                    {$Duration: 1200, x: 1, $Easing: {$Left: $JssorEasing$.$EaseInOutQuart, $Opacity: $JssorEasing$.$EaseLinear}, $Opacity: 2, $Brother: {$Duration: 1200, x: -1, $Easing: {$Left: $JssorEasing$.$EaseInOutQuart, $Opacity: $JssorEasing$.$EaseLinear}, $Opacity: 2}},
                ];
                var _CaptionTransitions = [
                    //RTT|10
                    {$Duration: 700, $Zoom: 11, $Rotate: 1, $Easing: {$Zoom: $JssorEasing$.$EaseInExpo, $Opacity: $JssorEasing$.$EaseLinear, $Rotate: $JssorEasing$.$EaseInExpo}, $Opacity: 2, $Round: {$Rotate: 0.8}},
                    //RTTL|R
                    {$Duration: 700, x: -0.6, $Zoom: 11, $Rotate: 1, $Easing: {$Left: $JssorEasing$.$EaseInCubic, $Zoom: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear, $Rotate: $JssorEasing$.$EaseInCubic}, $Opacity: 2, $Round: {$Rotate: 0.8}},
                    //RTTL|B
                    {$Duration: 700, y: -0.6, $Zoom: 11, $Rotate: 1, $Easing: {$Top: $JssorEasing$.$EaseInCubic, $Zoom: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear, $Rotate: $JssorEasing$.$EaseInCubic}, $Opacity: 2, $Round: {$Rotate: 0.8}},
                    //RTTS|R
                    {$Duration: 700, x: -0.6, $Zoom: 1, $Rotate: 1, $Easing: {$Left: $JssorEasing$.$EaseInQuad, $Zoom: $JssorEasing$.$EaseInQuad, $Rotate: $JssorEasing$.$EaseInQuad, $Opacity: $JssorEasing$.$EaseOutQuad}, $Opacity: 2, $Round: {$Rotate: 1.2}},
                    //RTTS|B
                    {$Duration: 700, y: -0.6, $Zoom: 1, $Rotate: 1, $Easing: {$Top: $JssorEasing$.$EaseInQuad, $Zoom: $JssorEasing$.$EaseInQuad, $Rotate: $JssorEasing$.$EaseInQuad, $Opacity: $JssorEasing$.$EaseOutQuad}, $Opacity: 2, $Round: {$Rotate: 1.2}},
                ];
                var options = {
                    $AutoPlay: true, //[Optional] Whether to auto play, to enable slideshow, this option must be set to true, default value is false
                    $AutoPlaySteps: 1, //[Optional] Steps to go for each navigation request (this options applys only when slideshow disabled), the default value is 1
                    $AutoPlayInterval: 4000, //[Optional] Interval (in milliseconds) to go for next slide since the previous stopped if the slider is auto playing, default value is 3000
                    $PauseOnHover: 1, //[Optional] Whether to pause when mouse over if a slider is auto playing, 0 no pause, 1 pause for desktop, 2 pause for touch device, 3 pause for desktop and touch device, 4 freeze for desktop, 8 freeze for touch device, 12 freeze for desktop and touch device, default value is 1

                    $ArrowKeyNavigation: true, //[Optional] Allows keyboard (arrow key) navigation or not, default value is false
                    $SlideDuration: 500, //[Optional] Specifies default duration (swipe) for slide in milliseconds, default value is 500
                    $MinDragOffsetToSlide: 20, //[Optional] Minimum drag offset to trigger slide , default value is 20
                    //$SlideWidth: 600,                                 //[Optional] Width of every slide in pixels, default value is width of 'slides' container
                    //$SlideHeight: 300,                                //[Optional] Height of every slide in pixels, default value is height of 'slides' container
                    $SlideSpacing: 0, //[Optional] Space between each slide in pixels, default value is 0
                    $DisplayPieces: 1, //[Optional] Number of pieces to display (the slideshow would be disabled if the value is set to greater than 1), the default value is 1
                    $ParkingPosition: 0, //[Optional] The offset position to park slide (this options applys only when slideshow disabled), default value is 0.
                    $UISearchMode: 1, //[Optional] The way (0 parellel, 1 recursive, default value is 1) to search UI components (slides container, loading screen, navigator container, arrow navigator container, thumbnail navigator container etc).
                    $PlayOrientation: 1, //[Optional] Orientation to play slide (for auto play, navigation), 1 horizental, 2 vertical, 5 horizental reverse, 6 vertical reverse, default value is 1
                    $DragOrientation: 1, //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $DisplayPieces is greater than 1, or parking position is not 0)

                    $SlideshowOptions: {//[Optional] Options to specify and enable slideshow or not
                        $Class: $JssorSlideshowRunner$, //[Required] Class to create instance of slideshow
                        $Transitions: _SlideshowTransitions, //[Required] An array of slideshow transitions to play slideshow
                        $TransitionsOrder: 1, //[Optional] The way to choose transition to play slide, 1 Sequence, 0 Random
                        $ShowLink: true                                    //[Optional] Whether to bring slide link on top of the slider when slideshow is running, default value is false
                    },
                    $CaptionSliderOptions: {//[Optional] Options which specifies how to animate caption
                        $Class: $JssorCaptionSlider$, //[Required] Class to create instance to animate caption
                        $CaptionTransitions: _CaptionTransitions, //[Required] An array of caption transitions to play caption, see caption transition section at jssor slideshow transition builder
                        $PlayInMode: 1, //[Optional] 0 None (no play), 1 Chain (goes after main slide), 3 Chain Flatten (goes after main slide and flatten all caption animations), default value is 1
                        $PlayOutMode: 3                                 //[Optional] 0 None (no play), 1 Chain (goes before main slide), 3 Chain Flatten (goes before main slide and flatten all caption animations), default value is 1
                    },
                    $BulletNavigatorOptions: {//[Optional] Options to specify and enable navigator or not
                        $Class: $JssorBulletNavigator$, //[Required] Class to create navigator instance
                        $ChanceToShow: 2, //[Required] 0 Never, 1 Mouse Over, 2 Always
                        $AutoCenter: 1, //[Optional] Auto center navigator in parent container, 0 None, 1 Horizontal, 2 Vertical, 3 Both, default value is 0
                        $Steps: 1, //[Optional] Steps to go for each navigation request, default value is 1
                        $Lanes: 1, //[Optional] Specify lanes to arrange items, default value is 1
                        $SpacingX: 10, //[Optional] Horizontal space between each item in pixel, default value is 0
                        $SpacingY: 10, //[Optional] Vertical space between each item in pixel, default value is 0
                        $Orientation: 1                                 //[Optional] The orientation of the navigator, 1 horizontal, 2 vertical, default value is 1
                    },
                    $ArrowNavigatorOptions: {
                        $Class: $JssorArrowNavigator$, //[Requried] Class to create arrow navigator instance
                        $ChanceToShow: 1                                //[Required] 0 Never, 1 Mouse Over, 2 Always
                    }
                };
                var jssor_slider1 = new $JssorSlider$("slider1_container", options);
                //responsive code begin
                //you can remove responsive code if you don't want the slider scales while window resizes
                function ScaleSlider() {
                    var parentWidth = jssor_slider1.$Elmt.parentNode.clientWidth;
                    if (parentWidth)
                        jssor_slider1.$ScaleWidth(Math.min(parentWidth, 1920));
                    else
                        window.setTimeout(ScaleSlider, 30);
                }
                ScaleSlider();
                $(window).bind("load", ScaleSlider);
                $(window).bind("resize", ScaleSlider);
                $(window).bind("orientationchange", ScaleSlider);
                //responsive code end
            });
        </script>-->
      
        
    </div>
<?php } ?>
