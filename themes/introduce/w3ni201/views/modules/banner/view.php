<?php if (count($banners)) { ?>
    <?php if ($show_widget_title) { ?>
        <div class="title">
            <h2><?php echo $widget_title ?></h2>
        </div>
        <div class="line"></div>
    <?php } ?>
    <div class="cont">
        <div id="demo">
            <div id="owl-demo" class="owl-carousel">
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
                                <a href="<?php $link ?>" title="<?php echo $banner['banner_name']; ?>">
                                    <img src="<?php echo $src; ?>" <?php if ($height) { ?> max-height="<?php echo $height ?>" <?php } if ($width) { ?> width="<?php echo $width; ?>" <?php } ?> alt="<?php echo $banner['banner_name']; ?>"/>
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
        var owl = $("#owl-demo");
        owl.owlCarousel({
            itemsCustom: [
                [0, 2],
                [450, 2],
                [600, 3],
                [700, 3],
                [1000, 5],
                [1200, 5],
                [1400, 6],
                [1600, 7]
            ],
            navigation: true,
            autoPlay: true
        });
    });
</script>    