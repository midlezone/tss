<?php if (count($products)) { ?>
    <div class="product-all"> 
        <?php if ($show_widget_title) { ?>
            <div class="widget-title">
                <h3><?php echo $widget_title; ?></h3>
            </div>
        <?php } ?>
        <div class="list grid">
        <?php
        foreach ($products as $product) {
            ?>
            <div class="list-item">
                <div class="list-content clearfix">
                    <div class="list-content-box">
                        <div class="list-content-img">
                            <a href="<?php echo $product['link']; ?>">
                                <img alt="<?php echo $product['name']; ?>" src="<?php echo ClaHost::getImageHost() . $product['avatar_path'] . 's200_200/' . $product['avatar_name'] ?>">
                            </a>
                        </div>
                        <div class="list-content-body">
                            <span class="list-content-title">
                                <h3>
                                    <a href="<?php echo $product['link']; ?>">
                                        <?php echo $product['name']; ?>
                                    </a>
                                </h3>
                            </span>
                            <div class="product-price-all clearfix">
                                <?php if ($product['price'] && $product['price'] > 0) { ?>
                                    <div class="product-price">
                                        <span><?php echo $product['price_text']; ?></span>
                                    </div>
                                <?php } ?>
                                <?php if ($product['price_market'] && $product['price_market'] > 0) { ?>
                                    <div class="product-price-market">
                                        <?php echo $product['price_market_text']; ?>
                                    </div>
                                <?php } ?>
                            </div>
                            <?php Yii::app()->controller->renderPartial('//partial/product_acction', array('pid' => $product['id'])); ?>
                        </div>
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