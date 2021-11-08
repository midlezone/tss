<?php
if (count($banners)) {
    ?>
    <div class="box-branch">
        <?php if ($show_widget_title) { ?>
            <div class="title clearfix">
                <div class="title_box">
                    <h2><?php echo $widget_title ?></h2>
                </div>
            </div>
        <?php } ?>
        <div class="content-slider">
            <ul>
                <?php
                foreach ($banners as $banner) {
                    $height = $banner['banner_height'];
                    $width = $banner['banner_width'];
                    $src = $banner['banner_src'];
                    $link = $banner['banner_link'];
                    if ($banner['banner_type'] == Banners::BANNER_TYPE_IMAGE) {
                        ?>
                        <li class="col-xs-2">
                            <a href="<?php echo $link; ?>" <?php echo Banners::getTarget($banner) ?> title="<?php echo $banner['banner_name']; ?>">
                                <img src="<?php echo $src; ?>" <?php if ($height) { ?> height="<?php echo $height ?>" <?php } if ($width) { ?> width="<?php echo $width; ?>" <?php } ?> alt="<?php echo $banner['banner_name']; ?>"/>
                            </a>
                        </li>
                            <?php }
                        }
                        ?>
            </ul>
        </div>
    </div>

<?php } ?>