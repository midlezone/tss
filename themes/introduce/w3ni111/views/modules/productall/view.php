<?php if (count($products)) { ?>
    <div class="product-all"> 
        <?php if ($show_widget_title) { ?>
            <div class="widget-title">
                <h3><?php echo $widget_title; ?></h3>
            </div>
        <?php } ?>
        <div class="ef-portfolio infinite-scrolling ef-isotope">
            <?php
            foreach ($products as $product) {
                ?>
                <div class="ef-post category-1 category-4">
                    <div class="ef-post-inner">
                        <div class="ef-proj-img">
                            <a href="<?php echo $product['link']; ?>">
                                <img src="<?php echo ClaHost::getImageHost() . $product['avatar_path'] . 's400_400/' . $product['avatar_name'] ?>" alt="<?php echo $product['name']; ?>">
                                <div class="ef-proj-desc">
                                    <h4>  <?php echo $product['name']; ?></h4>
                                </div>
                            </a>
                        </div>
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