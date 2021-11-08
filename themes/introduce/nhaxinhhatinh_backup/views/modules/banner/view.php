<div class="container">
    <?php if (count($banners)) { ?>
        <?php if ($show_widget_title) { ?>
            <div class="title">
                <h2><?php echo $widget_title ?></h2>
            </div>
            <!--<div class="line"></div>-->
        <?php } ?>
        <div class="cont">

            <div id="demo">
                <div id="owl-demo3" class="owl-carousel">
                    <?php
                    foreach ($banners as $banner) {
                        $height = $banner['banner_height'];
                        $width = $banner['banner_width'];
                        $src = $banner['banner_src'];
                        $link = $banner['banner_link'];

                        if ($banner['banner_type'] == Banners::BANNER_TYPE_IMAGE) {
                            ?>
                            <div class="item">
                                <div class="box-img">
                                    <a href="<?php echo $link ?>" title="<?php echo $banner['banner_name']; ?>">
                                        <img src="<?php echo $src; ?>" <?php if ($height) { ?> height="<?php echo $height ?>" <?php } if ($width) { ?> width="<?php echo $width; ?>" <?php } ?> alt="<?php echo $banner['banner_name']; ?>"/>
                                    </a>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>

        </div>
    <?php } ?>
    <script>
        $(document).ready(function () {
            var owl = $("#owl-demo3");
            owl.owlCarousel({
                itemsCustom: [
                    [0, 1],
                    [450, 1],
                    [600, 2],
                    [700, 3],
                    [1000, 5],
                    [1200, 7]
                ],
                navigation: false,
                autoPlay: true
            });
        });
    </script>    
</div>