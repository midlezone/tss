<div id="" class="fullwidth_slider everslider fullwidth-slider field-training">
  
    <?php if ($banners && count($banners)) { ?>
    <ul class="es-slides">
        <?php foreach ($banners as $banner) { ?>
            <li> 
                <div class="panel121 panel-default page-in212">
                    <div class="panel-heading121">
                        <div class="box-images">
                            <a href="<?php echo $banner['banner_link'] ?>" <?php echo Banners::getTarget($banner) ?> title="<?php echo $banner['banner_name'] ?>">
                                <img alt="<?php echo $banner['banner_name'] ?>" src="<?php echo $banner['banner_src']; ?>" <?php if ($height) { ?> height="<?php echo $height ?>" <?php } if ($width) { ?> width="<?php echo $width; ?>" <?php } ?> alt="<?php echo $banner['banner_name']; ?>">
                            </a>
                        </div>
                </div>
            </li>
        <?php } ?>
    </ul>
    <?php } ?>
</div>
