<?php
if (count($banners)) {
    foreach ($banners as $banner) {
        $height = $banner['banner_height'];
        $width = $banner['banner_width'];
        $src = $banner['banner_src'];
        $link = $banner['banner_link'];
        ?>
        <div class="right-introduce clearfix">
            <i class="icon"></i>
            <div class="people-message">
                <p><?php echo $banner['banner_description'] ?></p>
                <i class="arrow-message"></i>
            </div>
            <div class="people-profile">
                <img src="<?php echo $src; ?>" <?php if ($height) { ?> height="<?php echo $height ?>" <?php } if ($width) { ?> width="<?php echo $width; ?>" <?php } ?> alt="<?php echo $banner['banner_name']; ?>"/>
            </div>
        </div>
    <?php
    }
}
?>