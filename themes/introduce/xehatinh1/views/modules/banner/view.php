
<?php if (count($banners)) { ?>
    <?php if ($show_widget_title) { ?>
        <div class="title">
            <h2><?php echo $widget_title ?></h2>
        </div>
        <!--<div class="line"></div>-->
    <?php } ?>
    <?php
    foreach ($banners as $banner) {
        $height = $banner['banner_height'];
        $width = $banner['banner_width'];
        $src = $banner['banner_src'];
        $link = $banner['banner_link'];

        if ($banner['banner_type'] == Banners::BANNER_TYPE_IMAGE) {
            ?>
            <div class="banner-trong">
                <a href="<?php
                if ($link) {
                    echo $link;
                } else {
                    echo 'javascript::void(0);';
                }
                ?>" title="<?php echo $banner['banner_name']; ?>">
                    <img src="<?php echo $src; ?>"  alt="<?php echo $banner['banner_name']; ?>"/>
                </a>
            </div>
            <?php
        }
    }
    ?>
<?php } ?>
  
