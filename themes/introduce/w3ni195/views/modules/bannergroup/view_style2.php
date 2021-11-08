<div class="featured_services">
    <div class="row">
        <?php
        $count = 0;
        foreach ($banners as $banner) {
            if ($banner['banner_type'] == Banners::BANNER_TYPE_FLASH)
                continue;
            $height = $banner['banner_height'];
            $width = $banner['banner_width'];
            $count = $count + 1;
            ?>
            <div class="col-sm-4 col-xs-12">
                <div class="box <?php if ($count == 2) echo 'active '; ?> clearfix">
                    <div class="box-title">
                        <a href="<?php echo $banner['banner_link']; ?>" title="<?php echo $banner['banner_name']; ?>">
                            <h2><?php echo $banner['banner_name']; ?></h2>
                        </a>
                    </div>
                    <div class="box-body">
                        <div class="box-img">
                            <a href="<?php echo $banner['banner_link']; ?>" title="<?php echo $banner['banner_name']; ?>"> 
                                <img alt="<?php echo $banner['banner_name']; ?>" src="<?php echo $banner['banner_src']; ?>" <?php if ($height) { ?> height="<?php echo $height ?>" <?php } if ($width) { ?> width="<?php echo $width; ?>" <?php } ?> alt="<?php echo $banner['banner_name']; ?>"/>
                            </a>
                        </div>
                        <div class="shadow"></div>
                        <div class="box-content">
                            <?php if ($banner['banner_description']) { ?>
                                <?php echo $banner['banner_description']; ?>                    
                            <?php } ?>
                        </div>
                        <div class="box-footer">
                            <a class="btn detai-btn" href="<?php echo $banner['banner_link']; ?>" title="<?php echo $banner['banner_name']; ?>">
                                <span>read more</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
