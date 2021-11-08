<?php if (count($banners)) { ?>
    <?php
    $slides = array();
    $i = 0;
    foreach ($banners as $banner) {
        if ($banner['banner_type'] == Banners::BANNER_TYPE_IMAGE) {
            $src = $banner['banner_src'];
            if ($src) {
                $slides[$i]['image'] = $src;
                $slides[$i]['mobile_image'] = $src;
                $slides[$i]['description'] = '<h2>' . $banner['banner_name'] . '</h2>' . ((isset($banner['banner_description']) && $banner['banner_description']) ? '<p>' . $banner['banner_description'] . '</p>' : '');
                $slides[$i]['position'] = ($i % 2 == 0) ? 'bottom-right' : 'top-left';
            }
            $i++;
        }
    }
    ?>
    <script>
        var slider_options = {
            auto: true,
            //transition: jQuery.cookie('fidelityTrans') ? jQuery.cookie('fidelityTrans') : "fade",
            cover: true,
            caption_easing: "easeOutCirc",
            transition_speed: 2000,
            slide_interval: 6000,
            css_engine: true,
            reverse: false,
            slides: <?php echo json_encode($slides); ?>
        };
    </script>
<?php } ?>