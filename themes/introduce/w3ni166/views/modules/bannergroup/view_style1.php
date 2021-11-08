<?php if ($banners && count($banners)) { ?>
    <div id="fullwidth_slider" class="everslider fullwidth-slider">
        <ul class="es-slides">
            <?php
            foreach ($banners as $banner) {
                if ($banner['banner_type'] == Banners::BANNER_TYPE_FLASH)
                    continue;
                $height = $banner['banner_height'];
                $width = $banner['banner_width'];
                ?>
                <li>
                    <a href="<?php echo $banner['banner_link'] ?>" title="<?php echo $banner['banner_name'] ?>">
                        <img src="<?php echo $banner['banner_src'] ?>" alt="<?php echo $banner['banner_name'] ?>" <?php if ($height) { ?> height="<?php echo $height ?>" <?php } if ($width) { ?> width="" <?php } ?> />
                    </a>
                    <div class="fullwidth-title"> 
                        <a href="<?php echo $banner['banner_link'] ?>"><?php echo $banner['banner_name'] ?></a> 
                        <span><?php echo $banner['banner_description'] ?></span> 
                    </div>
                </li>
            <?php } ?>
        </ul>
    </div>
<?php } ?>

<?php $themUrl = Yii::app()->theme->baseUrl; ?>
<script type="text/javascript" src="<?= $themUrl ?>/js/jssor.js"></script> 
<script type="text/javascript" src="<?= $themUrl ?>/js/jssor.slider.js"></script>
<script type="text/javascript" src="<?= $themUrl ?>/js/jquery.everslider.min.js"></script>

<script>
    jQuery(document).ready(function ($) {
        /* Fullwidth slider */
        $('#fullwidth_slider').everslider({
            mode: 'carousel',
            moveSlides: 1,
            slideEasing: 'easeInOutCubic',
            slideDuration: 700,
            navigation: true,
            keyboard: true,
            nextNav: '<span class="alt-arrow">Next</span>',
            prevNav: '<span class="alt-arrow">Next</span>',
            ticker: true,
            tickerAutoStart: true,
            tickerHover: true,
            tickerTimeout: 2000
        });
    });
</script>

