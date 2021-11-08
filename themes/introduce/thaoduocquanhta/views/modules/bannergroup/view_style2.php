<?php if ($banners) { ?>
    <div class="product parter">
        <?php if ($show_widget_title) { ?>
            <div class="title">
                <h2><?php echo $widget_title; ?></h2>
            </div>
        <?php }
        ?>
        <div id="demo">
            <div id="owl-demo3" class="owl-carousel">
                <?php foreach ($banners as $banner) {
                    ?>
                    <div class="item">
                        <div class="box-img">
                            <a href="#" t="" class="hover-banner"></a>
                            <a href="<?php echo $banner['banner_link'] ?>" <?php echo Banners::getTarget($banner) ?> target="_blank" title="<?php echo $banner['banner_name'] ?>"> 
                                <img alt="<?php echo $banner['banner_name'] ?>" src="<?php echo $banner['banner_src']; ?>" <?php if ($height) { ?> height="<?php echo $height ?>" <?php } if ($width) { ?> width="<?php echo $width; ?>" <?php } ?> alt="<?php echo $banner['banner_name']; ?>">
                            </a> 
                        </div>                             
                    </div>
                    <?php
                }
                $themUrl = Yii::app()->theme->baseUrl;
                ?>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="<?= $themUrl ?>/js/owl.carousel.min.js"></script> 
    <script>
        $(document).ready(function () {
            var owl = $("#owl-demo3");
            owl.owlCarousel({
                itemsCustom: [
                    [0, 1],
                    [450, 2],
                    [600, 3],
                    [700, 5],
                ],
                navigation: false,
                autoPlay: true
            });
        });
    </script>
<?php } ?>

