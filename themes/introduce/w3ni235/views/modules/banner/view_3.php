<?php if (count($banners)) { ?>
    <?php if ($show_widget_title) { ?>
        <div class="title">
            <h2><?php echo $widget_title ?></h2>
        </div>
    <?php } ?>
    <?php
    foreach ($banners as $banner) {
        $height = $banner['banner_height'];
        $width = $banner['banner_width'];
        $src = $banner['banner_src'];
        $link = $banner['banner_link'];

        if ($banner['banner_type'] == Banners::BANNER_TYPE_IMAGE) {
            ?>
            <a href="<?php $link ?>" title="<?php echo $banner['banner_name']; ?>">
                <img src="<?php echo $src; ?>" <?php if ($height) { ?> max-height="<?php echo $height ?>" <?php } if ($width) { ?> width="<?php echo $width; ?>" <?php } ?> alt="<?php echo $banner['banner_name']; ?>"/>
            </a>
            <?php
        }
    }
    ?>

<?php } ?>
