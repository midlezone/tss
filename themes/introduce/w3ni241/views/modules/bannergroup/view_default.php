<div class="partner">
    <?php if ($show_widget_title) { ?>
        <div class="title">
            <h2><a href="#" title="#"><?php echo $widget_title; ?></a></h2>
        </div>
    <?php } ?>
    <div class="cont">
        <div id="demo">
            <div id="owl-demo3" class="owl-carousel">
                <?php if ($banners && count($banners)) { ?>
                    <?php
                    foreach ($banners as $banner) {
                        if ($banner['banner_type'] == Banners::BANNER_TYPE_FLASH)
                            continue;
                        $height = $banner['banner_height'];
                        $width = $banner['banner_width'];
                        ?>
                        <div class="item">
                            <div class="box-img">
                                <a href="<?php echo $banner['banner_link'] ?>" title="<?php echo $banner['banner_name']; ?>">
                                    <img alt="<?php echo $banner['banner_name']; ?>" src="<?php echo $banner['banner_src']; ?>" <?php if ($height) { ?> height="<?php echo $height ?>" <?php } if ($width) { ?> width="<?php echo $width; ?>" <?php } ?> alt="<?php echo $banner['banner_name']; ?>"/>
                                </a>
                            </div>
                        </div>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
    </div>
    <?php $themUrl = Yii::app()->theme->baseUrl; ?>

    <script type="text/javascript" src="<?= $themUrl ?>/js/owl.carousel.min.js"></script> 
    <script>
        $(document).ready(function () {
            var owl = $("#owl-demo3");
            owl.owlCarousel({
                itemsCustom: [
                    [0, 2],
                    [450, 2],
                    [600, 3],
                    [700, 4],
                    [1000, 5],
                    [1200, 6],
                    [1400, 6],
                    [1600, 6]
                ],
                navigation: false,
                autoPlay: false,
            });
        });
    </script> 
</div>