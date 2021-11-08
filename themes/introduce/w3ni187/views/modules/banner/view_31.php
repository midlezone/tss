<?php if (count($banners)) { ?>

    <!--<div class="panel panel-default categorybox">-->
    <?php if ($show_widget_title) { ?>
        <div class="panel-heading">
            <h2><?php echo $widget_title ?></h2>
        </div>
    <?php } ?>
    <div class="banner">
        <?php
        foreach ($banners as $banner) {
            $height = $banner['banner_height'];
            $width = $banner['banner_width'];
            $src = $banner['banner_src'];
            $link = $banner['banner_link'];
            if ($banner['banner_type'] == Banners::BANNER_TYPE_IMAGE) {
                ?>

                <img src="<?php echo $src; ?>"  alt="<?php echo $banner['banner_name']; ?>"/>


                <?php
            }
        }
        ?>
    </div>
<?php } ?>
