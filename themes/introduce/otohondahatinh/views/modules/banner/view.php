<?php if (count($banners)) { ?>
    <div class="feature">
        <div class="container">
            <div id="triangle-down"></div>
            <div class="row featurebox">
                <?php
                foreach ($banners as $banner) {
                    $height = $banner['banner_height'];
                    $width = $banner['banner_width'];
                    $src = $banner['banner_src'];
                    $link = $banner['banner_link'];
                    if ($banner['banner_type'] == Banners::BANNER_TYPE_IMAGE) {
                        ?>

                        <div class="col-sm-3 featurebox-item">
                            <div class="featurebox-item-img"> 
                                <a title="<?php echo $banner['banner_name'] ?>" href="<?php echo $banner['banner_link'] ?>"> 
                                    <img src="<?php echo $src; ?>" <?php if ($height) { ?> height="<?php echo $height ?>" <?php } if ($width) { ?> width="<?php echo $width; ?>" <?php } ?> alt="<?php echo $banner['banner_name']; ?>"/>
                                </a> 
                            </div>
                            <div class="featurebox-item-body">
                                <div class="featurebox-item-title">
                                    <h3>
                                        <a title="<?php echo $banner['banner_name'] ?>" href="<?php echo $link; ?>"><?php echo $banner['banner_name'] ?></a>               
                                    </h3>
                                    <p><?php echo nl2br($banner['banner_description']); ?></p> 
                                </div>
                            </div>
                        </div>
                    <?php }
                } ?>

            </div>
        </div>
    </div>
<?php } ?>
