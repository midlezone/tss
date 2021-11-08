<?php if ($banners && count($banners)) { ?>
    <div class="slider">

        <div id="slider1_container" style="position: relative; margin: 0 auto;
             top: 0px; left: 0px; width: 1366px; height: 506px; overflow: hidden;">

            <!-- Slides Container -->
            <div u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width: 1366px;
                 height: 506px; overflow: hidden;">
                 <?php
                 foreach ($banners as $banner) {
                     if ($banner['banner_type'] == Banners::BANNER_TYPE_FLASH)
                         continue;
                     $height = $banner['banner_height'];
                     $width = $banner['banner_width'];
                     ?>
                    <div>
                        <a href="<?php echo $banner['banner_link']; ?>" title="<?php echo $banner['banner_name']; ?>"> <img alt="<?php echo $banner['banner_name']; ?>" src="<?php echo $banner['banner_src']; ?>" <?php if ($height) { ?> height="<?php echo $height ?>" <?php } if ($width) { ?> width="<?php echo $width; ?>" <?php } ?> alt="<?php echo $banner['banner_name']; ?>"/>
                        </a>
                        <div u="caption" t="NO" t3="RTT|2" r3="137.5%" du3="0000" d3="000" style="position: absolute; width: 445px; height: 300px; top: 0px; left: 180px;  margin:0 auto">
                            <div u="caption" t="MCLIP|R" du="500" t2="NO" style="position: absolute; width: 1366px; height: 80px; top: 400px; left:0px; font-size:30px; color:#333; text-shadow: -1px 0 #FFF, 0 1px #FFF, 1px 0 #FFF, 0 -1px #FFF;
                                 -webkit-text-shadow: -1px 0 #FFF, 0 1px #FFF, 1px 0 #FFF, 0 -1px #FFF;
                                 -moz-text-shadow:-1px 0 #FFF, 0 1px #FFF, 1px 0 #FFF, 0 -1px #FFF;
                                 -o-text-shadow: -1px 0 #FFF, 0 1px #FFF, 1px 0 #FFF, 0 -1px #FFF;">
                                 <?php echo $banner['banner_name'] ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>

            </div>
            <div u="navigator" class="jssorb21" style="bottom: 26px; right: 6px;">

                <div u="prototype"></div>
            </div>
            <span u="arrowleft" class="jssora21l" style="top: 123px; left: 8px;">
            </span>

            <span u="arrowright" class="jssora21r" style="top: 123px; right: 8px;">
            </span>
        </div>
        <?php $themUrl = Yii::app()->theme->baseUrl; ?>
        <script type="text/javascript" src="<?= $themUrl ?>/js/jssor.js"></script> 
        <script type="text/javascript" src="<?= $themUrl ?>/js/jssor.slider.js"></script>
        <script>
            jQuery(document).ready(function ($) {

                var _CaptionTransitions = [];
                _CaptionTransitions["L"] = {$Duration: 900, x: 0.6, $Easing: {$Left: $JssorEasing$.$EaseInOutSine}, $Opacity: 2};
                _CaptionTransitions["R"] = {$Duration: 900, x: -0.6, $Easing: {$Left: $JssorEasing$.$EaseInOutSine}, $Opacity: 2};
                _CaptionTransitions["T"] = {$Duration: 900, y: 0.6, $Easing: {$Top: $JssorEasing$.$EaseInOutSine}, $Opacity: 2};
                _CaptionTransitions["B"] = {$Duration: 900, y: -0.6, $Easing: {$Top: $JssorEasing$.$EaseInOutSine}, $Opacity: 2};
                _CaptionTransitions["ZMF|10"] = {$Duration: 900, $Zoom: 11, $Easing: {$Zoom: $JssorEasing$.$EaseOutQuad, $Opacity: $JssorEasing$.$EaseLinear}, $Opacity: 2};
                _CaptionTransitions["RTT|10"] = {$Duration: 900, $Zoom: 11, $Rotate: 1, $Easing: {$Zoom: $JssorEasing$.$EaseOutQuad, $Opacity: $JssorEasing$.$EaseLinear, $Rotate: $JssorEasing$.$EaseInExpo}, $Opacity: 2, $Round: {$Rotate: 0.8}};
                _CaptionTransitions["RTT|2"] = {$Duration: 900, $Zoom: 3, $Rotate: 1, $Easing: {$Zoom: $JssorEasing$.$EaseInQuad, $Opacity: $JssorEasing$.$EaseLinear, $Rotate: $JssorEasing$.$EaseInQuad}, $Opacity: 2, $Round: {$Rotate: 0.5}};
                _CaptionTransitions["RTTL|BR"] = {$Duration: 900, x: -0.6, y: -0.6, $Zoom: 11, $Rotate: 1, $Easing: {$Left: $JssorEasing$.$EaseInCubic, $Top: $JssorEasing$.$EaseInCubic, $Zoom: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear, $Rotate: $JssorEasing$.$EaseInCubic}, $Opacity: 2, $Round: {$Rotate: 0.8}};
                _CaptionTransitions["CLIP|LR"] = {$Duration: 900, $Clip: 15, $Easing: {$Clip: $JssorEasing$.$EaseInOutCubic}, $Opacity: 2};
                _CaptionTransitions["MCLIP|L"] = {$Duration: 900, $Clip: 1, $Move: true, $Easing: {$Clip: $JssorEasing$.$EaseInOutCubic}};
                _CaptionTransitions["MCLIP|R"] = {$Duration: 900, $Clip: 2, $Move: true, $Easing: {$Clip: $JssorEasing$.$EaseInOutCubic}};

                var options = {
                    $FillMode: 2, //[Optional] The way to fill image in slide, 0 stretch, 1 contain (keep aspect ratio and put all inside slide), 2 cover (keep aspect ratio and cover whole slide), 4 actual size, 5 contain for large image, actual size for small image, default value is 0
                    $AutoPlay: true, //[Optional] Whether to auto play, to enable slideshow, this option must be set to true, default value is false
                    $AutoPlayInterval: 4000, //[Optional] Interval (in milliseconds) to go for next slide since the previous stopped if the slider is auto playing, default value is 3000
                    $PauseOnHover: 1, //[Optional] Whether to pause when mouse over if a slider is auto playing, 0 no pause, 1 pause for desktop, 2 pause for touch device, 3 pause for desktop and touch device, 4 freeze for desktop, 8 freeze for touch device, 12 freeze for desktop and touch device, default value is 1

                    $ArrowKeyNavigation: true, //[Optional] Allows keyboard (arrow key) navigation or not, default value is false
                    $SlideEasing: $JssorEasing$.$EaseOutQuint, //[Optional] Specifies easing for right to left animation, default value is $JssorEasing$.$EaseOutQuad
                    $SlideDuration: 800, //[Optional] Specifies default duration (swipe) for slide in milliseconds, default value is 500
                    $MinDragOffsetToSlide: 20, //[Optional] Minimum drag offset to trigger slide , default value is 20
                    //$SlideWidth: 600,                                 //[Optional] Width of every slide in pixels, default value is width of 'slides' container
                    //$SlideHeight: 300,                                //[Optional] Height of every slide in pixels, default value is height of 'slides' container
                    $SlideSpacing: 0, //[Optional] Space between each slide in pixels, default value is 0
                    $DisplayPieces: 1, //[Optional] Number of pieces to display (the slideshow would be disabled if the value is set to greater than 1), the default value is 1
                    $ParkingPosition: 0, //[Optional] The offset position to park slide (this options applys only when slideshow disabled), default value is 0.
                    $UISearchMode: 1, //[Optional] The way (0 parellel, 1 recursive, default value is 1) to search UI components (slides container, loading screen, navigator container, arrow navigator container, thumbnail navigator container etc).
                    $PlayOrientation: 1, //[Optional] Orientation to play slide (for auto play, navigation), 1 horizental, 2 vertical, 5 horizental reverse, 6 vertical reverse, default value is 1
                    $DragOrientation: 1, //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $DisplayPieces is greater than 1, or parking position is not 0)

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
                        $SpacingX: 8, //[Optional] Horizontal space between each item in pixel, default value is 0
                        $SpacingY: 8, //[Optional] Vertical space between each item in pixel, default value is 0
                        $Orientation: 1                                 //[Optional] The orientation of the navigator, 1 horizontal, 2 vertical, default value is 1
                    },
                    $ArrowNavigatorOptions: {//[Optional] Options to specify and enable arrow navigator or not
                        $Class: $JssorArrowNavigator$, //[Requried] Class to create arrow navigator instance
                        $ChanceToShow: 1, //[Required] 0 Never, 1 Mouse Over, 2 Always
                        $AutoCenter: 2, //[Optional] Auto center arrows in parent container, 0 No, 1 Horizontal, 2 Vertical, 3 Both, default value is 0
                        $Steps: 1                                       //[Optional] Steps to go for each navigation request, default value is 1
                    }
                };

                var jssor_slider1 = new $JssorSlider$("slider1_container", options);


                //responsive code begin
                //you can remove responsive code if you don't want the slider scales while window resizes
                function ScaleSlider() {
                    var bodyWidth = document.body.clientWidth;
                    if (bodyWidth)
                        jssor_slider1.$ScaleWidth(Math.min(bodyWidth, 1920));
                    else
                        window.setTimeout(ScaleSlider, 30);
                }
                ScaleSlider();

                $(window).bind("load", ScaleSlider);
                $(window).bind("resize", ScaleSlider);
                $(window).bind("orientationchange", ScaleSlider);
                //responsive code end
            });
        </script>
    </div>
<?php } ?>
