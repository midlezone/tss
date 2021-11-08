<?php if (count($shops)) { ?>
    <div class="row">
        <div class="wrap_all_shop">
            <?php foreach ($shops as $shop) { ?>
                <div class="col-sm-4 box-product">
                    <div class="box-img">
                        <a href="<?php echo $shop['link'] ?>" title="<?php echo $shop['description'] ?>">
                            <img src="<?php echo ClaHost::getImageHost(), $shop['image_path'], 's330_330/', $shop['image_name']; ?>" />
                        </a>
                    </div>
                    <div class="info">
                        <h1><?php echo $shop['name']; ?></h1>
                        <p><span><?php echo $shop['address'], ', ', $shop['ward_name'], ', ', $shop['district_name'], ', ', $shop['province_name'] ?></span></p>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class='product-page'>
            <?php
            $this->widget('common.extensions.LinkPager.LinkPager', array(
                'itemCount' => $totalitem,
                'pageSize' => $limit,
                'header' => '',
                'htmlOptions' => array('class' => 'W3NPager',), // Class for ul
                'selectedPageCssClass' => 'active',
            ));
            ?>
        </div>
    </div>
<?php } ?>
