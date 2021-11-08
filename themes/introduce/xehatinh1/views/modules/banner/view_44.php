<?php if (count($banners)) { ?>
    <?php
    foreach ($banners as $banner) {
        $height = $banner['banner_height'];
        $width = $banner['banner_width'];
        $src = $banner['banner_src'];
        $link = $banner['banner_link'];
        if ($banner['banner_type'] == Banners::BANNER_TYPE_IMAGE) {
            ?>
            <a href="<?php echo $link ?>" title="<?php echo $banner['banner_name']; ?>" target="_blank">
                <img src="<?php echo $src; ?>" style="max-height:<?php echo $height ?>;max-width: <?php echo $width; ?> " alt="<?php echo $banner['banner_name']; ?>"/>
            </a>
            <?php
        }
    }
    ?>
<?php } ?>