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
