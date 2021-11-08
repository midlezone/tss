<div id="" class="fullwidth_slider everslider fullwidth-slider field-training">
    <div class="title">
        <div class="title-cont">
            <?php if ($show_widget_title) { ?>
                <h2>
                    <?php echo $widget_title ?>
                </h2>
            <?php } ?>
        </div>
    </div>
    <?php if ($banners && count($banners)) { ?>
    <ul class="es-slides">
        <?php foreach ($banners as $banner) { ?>
            <li> 
                <div class="panel panel-default page-in">
                    <div class="panel-heading">
                        <div class="box-images">
                            <a href="<?php echo $banner['banner_link'] ?>" <?php echo Banners::getTarget($banner) ?> title="<?php echo $banner['banner_name'] ?>">
                                <img alt="<?php echo $banner['banner_name'] ?>" src="<?php echo $banner['banner_src']; ?>" <?php if ($height) { ?> height="<?php echo $height ?>" <?php } if ($width) { ?> width="<?php echo $width; ?>" <?php } ?> alt="<?php echo $banner['banner_name']; ?>">
                            </a>
                        </div>
                        <a href="<?php echo $banner['banner_link'] ?>" title="<?php echo $banner['banner_name'] ?>" ><?php echo $banner['banner_name'] ?></a></div>
                </div>
            </li>
        <?php } ?>
    </ul>
    <?php } ?>
</div>
