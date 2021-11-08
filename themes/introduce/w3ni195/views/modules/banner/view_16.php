<div class="box gallery clearfix">
    <?php if ($show_widget_title) { ?>
        <div class="box-title">
            <h2><?php echo $widget_title; ?></h2>
        </div>
    <?php } ?>
    <div class="list grid">
        <?php
        foreach ($banners as $banner) {
            $height = $banner['banner_height'];
            $width = $banner['banner_width'];
            $src = $banner['banner_src'];
            $link = $banner['banner_link'];
            if ($banner['banner_type'] == Banners::BANNER_TYPE_IMAGE) {
                ?>
                <div class="list-item">
                    <div class="list-content">
                        <div class="list-content-box">
                            <div class="list-content-img">
                                <a href="<?php echo $link; ?>" <?php echo Banners::getTarget($banner) ?> title="<?php echo $banner['banner_name']; ?>">
                                    <img src="<?php echo $src; ?>" alt="<?php echo $banner['banner_name']; ?>"/>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } else { ?>
                <div class="list-item">
                    <div class="list-content">
                        <div class="list-content-box">
                            <div class="list-content-img">
                                <object <?php if ($height) { ?> height="<?php echo $height ?>" <?php } if ($width) { ?> width="<?php echo $width ?>" <?php } ?> >
                                    <param name="wmode" value="transparent">
                                    <param name="movie" value="<?php echo $src ?>">
                                    <embed <?php if ($height) { ?> height="<?php echo $height ?>" <?php } if ($width) { ?> width="<?php echo $width ?>" <?php } ?> src="<?php echo $src ?>" wmode="transparent">
                                </object>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        <?php } ?>
    </div>
</div>