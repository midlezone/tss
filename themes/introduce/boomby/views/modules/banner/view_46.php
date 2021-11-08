<?php if (count($banners)) { ?>
    <div class="feedback">
        <div id="demo">
            <div id="owl-demo4" class="owl-carousel">
                <?php
                foreach ($banners as $banner) {
                    $height = $banner['banner_height'];
                    $width = $banner['banner_width'];
                    $src = $banner['banner_src'];
                    $link = $banner['banner_link'];
                    if ($banner['banner_type'] == Banners::BANNER_TYPE_IMAGE) {
                        ?>
                                <img src="<?php echo $src; ?>" <?php if ($height) { ?> max-height="<?php echo $height ?>" <?php } if ($width) { ?> max-width="<?php echo $width; ?>" <?php } ?> alt="<?php echo $banner['banner_name']; ?>"/>

                        <?php
                    }
                }
                ?>
            </div>
        </div>
        <script>
            $(document).ready(function () {
                var owl = $("#owl-demo4");
                owl.owlCarousel({
                    itemsCustom: [
                        [0, 1],
                        [450, 1],
                        [1600, 1]
                    ],
                    navigation: true,
                    autoPlay: true,
                });
            });
        </script>
    </div>
<?php } ?>