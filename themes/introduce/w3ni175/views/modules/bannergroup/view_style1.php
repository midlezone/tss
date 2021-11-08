<?php if ($banners && count($banners)) { ?>
    <div id="slider1_container" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: 1366px; height: 500px; overflow: hidden;">
        <!-- Slides Container -->
        <div u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width: 1366px; height: 484px; overflow: hidden;">
            <?php
            foreach ($banners as $banner) {
                if ($banner['banner_type'] == Banners::BANNER_TYPE_FLASH) {
                    continue;
                }
                $height = $banner['banner_height'];
                $width = $banner['banner_width'];
                ?>
                <div>
                    <a href="<?php echo $banner['banner_link'] ?>" title="<?php echo $banner['banner_name'] ?>">
                        <img src="<?php echo $banner['banner_src']; ?>" <?php if ($height) { ?> height="<?php echo $height ?>" <?php } if ($width) { ?> width="<?php echo $width; ?>" <?php } ?> alt="<?php echo $banner['banner_name']; ?>"/>
                    </a>
                    <div u="caption" t="NO" t3="RTT|2" r3="137.5%" du3="0000" d3="000" style="position: absolute; width: 445px; height: 300px; top: 0px; left: 0px; bottom:0; margin:auto;">
                        <div u="caption" t="MCLIP|R" du="500" t2="NO" style="position: absolute; width: 1366px; text-align:center; height: 90px; top: 50px; left:0px; right:0; margin:auto;">
                            <h3 class="title-slider"><?php echo $banner['banner_name'] ?></h3>
                        </div>
                        <div u="caption" t="MCLIP|R" du="500" t2="NO" style="position: absolute; width: 1366px; text-align:center; height: 90px; top: 100px; left:0px; right:0; margin:auto;">
                            <h3 class="more-slider"><?php echo $banner['banner_description'] ?></h3>
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
<?php } ?>
<?php $themUrl = Yii::app()->theme->baseUrl;?>
<script type="text/javascript" src="<?=$themUrl?>/js/jssor.js"></script> 
<script type="text/javascript" src="<?=$themUrl?>/js/jssor.slider.js"></script>
