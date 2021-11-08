<!--Banner Header-->
<?php if (count($banners)) { ?>
    <div class="hot-service clearfix">
        <div class="feature clearfix ">
            <?php
            foreach ($banners as $banner) {
                $height = $banner['banner_height'];
                $width = $banner['banner_width'];
                $src = $banner['banner_src'];
                $link = $banner['banner_link'];
                ?>
                <div class="col-sm-4 featureitem-box">
                    <div class="featureitem-title">
                        <div class="icon-call24">
                            <img src="<?php echo $src ?>" alt="<?php echo $banner['banner_name'] ?>" style="max-height: <?php echo $height ?>"/>
                        </div>
                        <div class="title-call24">
                            <div>
                                <span><?php echo $banner['banner_name'] ?></span> 
                            </div>
                            <div>
                                <?php echo $banner['banner_description'] ?>
                            </div>
                        </div>
                    </div>
                </div>   
            <?php } ?>
        </div>   
    </div>
<?php } ?>


