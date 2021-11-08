<div id="slider1_container" style="position: relative; top: 0px; left: 0px; width: 1140px;height: 600px; background: #191919; overflow: hidden;">
    <!-- Loading Screen -->
    <!-- Slides Container -->
    <?php if ($images) { ?>
        <div u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width: 1140px; height: 500px; overflow: hidden;">
            <?php foreach ($images as $image) {
                ?>
                <div>
                    <img u="image" src="<?php echo ClaHost::getImageHost() . $image['path'] . 's1200_1200/' . $image['name']; ?>" alt="<?php echo $image['name']; ?>" />
                    <img u="thumb" src="<?php echo ClaHost::getImageHost() . $image['path'] . 's150_150/' . $image['name']; ?>" alt="<?php echo $image['name']; ?>" />
                </div>
            <?php } ?>
        </div>
    <?php } ?>
    <style>
        .jssort01 {
            position: absolute;
            /* size of thumbnail navigator container */
            width: 1140px;
            height: 100px;
            background-color: #ffffff;
        }
        .jssort01 .p {
            position: absolute;
            top: 0;
            left: 0;
            width: 140px;
            height: 72px;
        }

        .jssort01 .t {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: none;
        }

        .jssort01 .w {
            position: absolute;
            top: 0px;
            left: 0px;
            width: 100%;
            height: 100%;
        }

        .jssort01 .c {
            position: absolute;
            top: 0px;
            left: 0px;
            width: 136px;
            height: 68px;
            _background: none;
            cursor: pointer;
        }

        .jssort01 .pav .c {
            top: 0px;
            _top: 0px;
            left: 0px;
            _left: 0px;
            width: 140px;
            height: 72px;
            border: #4bae4f 2px solid;
            background-position: 50% 50%;
        }

        .jssort01 .p:hover .c {
            top: 0px;
            left: 0px;
            width: 140px;
            height: 72px;
            border: #4bae4f 2px solid;
            background-position: 50% 50%;
        }

        .jssort01 .p.pdn .c {
            background-position: 50% 50%;
            width: 140px;
            height: 72px;
            border: #4bae4f 2px solid;
        }

        * html .jssort01 .c, * html .jssort01 .pdn .c, * html .jssort01 .pav .c {
            /* ie quirks mode adjust */
            width /**/: 140px;
            height /**/: 72px;
        }
    </style>
    <!-- thumbnail navigator container -->
    <div u="thumbnavigator" class="jssort01" style="left: 0px; bottom: 0px;">
        <!-- Thumbnail Item Skin Begin -->
        <div u="slides" style="cursor: default;">
            <div u="prototype" class="p">
                <div class=w><div u="thumbnailtemplate" class="t"></div></div>
                <div class=c></div>
            </div>
        </div>

    </div>
    <?php $themUrl = Yii::app()->theme->baseUrl; ?>
    <script type="text/javascript" src="<?= $themUrl ?>/js/jssor.js"></script> 
    <script type="text/javascript" src="<?= $themUrl ?>/js/jssor.slider.js"></script>
    <script>
        jQuery(document).ready(function ($) {
            var _SlideshowTransitions = [
                //Fade out LR
                , {$Duration: 1200, x: 0.3, $Cols: 2, $SlideOut: true, $ChessMode: {$Column: 3}, $Easing: {$Left: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear}, $Opacity: 2, $Outside: true}
            ];
            var options = {
                $AutoPlay: false, //[Optional] Whether to auto play, to enable slideshow, this option must be set to true, default value is false
                $AutoPlayInterval: 1500, //[Optional] Interval (in milliseconds) to go for next slide since the previous stopped if the slider is auto playing, default value is 3000
                $PauseOnHover: 1, //[Optional] Whether to pause when mouse over if a slider is auto playing, 0 no pause, 1 pause for desktop, 2 pause for touch device, 3 pause for desktop and touch device, 4 freeze for desktop, 8 freeze for touch device, 12 freeze for desktop and touch device, default value is 1

                $DragOrientation: 3, //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $DisplayPieces is greater than 1, or parking position is not 0)
                $ArrowKeyNavigation: true, //[Optional] Allows keyboard (arrow key) navigation or not, default value is false
                $SlideDuration: 800, //Specifies default duration (swipe) for slide in milliseconds

                $SlideshowOptions: {//[Optional] Options to specify and enable slideshow or not
                    $Class: $JssorSlideshowRunner$, //[Required] Class to create instance of slideshow
                    $Transitions: _SlideshowTransitions, //[Required] An array of slideshow transitions to play slideshow
                    $TransitionsOrder: 1, //[Optional] The way to choose transition to play slide, 1 Sequence, 0 Random
                    $ShowLink: true                                    //[Optional] Whether to bring slide link on top of the slider when slideshow is running, default value is false
                },
                $ArrowNavigatorOptions: {//[Optional] Options to specify and enable arrow navigator or not
                    $Class: $JssorArrowNavigator$, //[Requried] Class to create arrow navigator instance
                    $ChanceToShow: 1                               //[Required] 0 Never, 1 Mouse Over, 2 Always
                },
                $ThumbnailNavigatorOptions: {//[Optional] Options to specify and enable thumbnail navigator or not
                    $Class: $JssorThumbnailNavigator$, //[Required] Class to create thumbnail navigator instance
                    $ChanceToShow: 2, //[Required] 0 Never, 1 Mouse Over, 2 Always

                    $ActionMode: 1, //[Optional] 0 None, 1 act by click, 2 act by mouse hover, 3 both, default value is 1
                    $SpacingX: 8, //[Optional] Horizontal space between each thumbnail in pixel, default value is 0
                    $DisplayPieces: 14, //[Optional] Number of pieces to display, default value is 1
                    $ParkingPosition: 360                          //[Optional] The offset position to park thumbnail
                }
            };

            var jssor_slider1 = new $JssorSlider$("slider1_container", options);
            //responsive code begin
            //you can remove responsive code if you don't want the slider scales while window resizes
            function ScaleSlider() {
                var parentWidth = jssor_slider1.$Elmt.parentNode.clientWidth;
                if (parentWidth)
                    jssor_slider1.$ScaleWidth(Math.max(Math.min(parentWidth, 1140), 300));
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
<div class="introduce">
    <div class="title">
        <h2><?php echo $album->album_name; ?></h2>
    </div>
    <div class="line"></div>
    <div class="cont">
        <?php echo $album['album_description'] ?>
    </div>
</div>
<?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK2)); ?>
