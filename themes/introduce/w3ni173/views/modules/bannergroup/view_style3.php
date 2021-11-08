<?php if ($banners && count($banners)) { ?>
    <div class="row">
        <?php foreach ($banners as $banner) { ?>
            <div class="col-sm-4">
                <div class="list-item">
                    <div class="list-content">
                        <div class="list-content-box">
                            <div class="list-content-img"> 
                                <a href="<?php echo $banner['banner_link'] ?>" title="<?php echo $banner['banner_name'] ?>"> 
                                    <img src="<?php echo $banner['banner_src']; ?>" <?php if ($height) { ?> height="<?php echo $height ?>" <?php } if ($width) { ?> width="<?php echo $width; ?>" <?php } ?> alt="<?php echo $banner['banner_name']; ?>">
                                </a> 
                            </div>
                            <div class="list-content-body">
                                <div class="list-content-title title_banner_food">
                                    <h2> 
                                        <a href="<?php echo $banner['banner_link'] ?>" title="<?php echo $banner['banner_name'] ?>"><?php echo $banner['banner_name'] ?></a>
                                    </h2> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
<?php } ?>
