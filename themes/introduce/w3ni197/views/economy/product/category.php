<?php if (count($products)) { ?>
    <div class="cont"> 
        <div class="list grid">
            <?php
            foreach ($products as $product) {
                ?>
                <div class="col-sm-4 box-product">
                    <div class="box-img">
                        <a href="<?php echo $product['link']; ?>">
                            <img alt="<?php echo $product['name']; ?>" src="<?php echo ClaHost::getImageHost() . $product['avatar_path'] . 's256_256/' . $product['avatar_name'] ?>">
                        </a>
                    </div>
                    <div class="title-product">
                        <h3>
                            <a href="<?php echo $product['link']; ?>">
                                <?php echo $product['name']; ?>
                            </a>
                        </h3>
                    </div>
                    <div class="body-product">
                        <div class="product-price-all clearfix clearfix">
                            <?php if ($product['price'] && $product['price'] > 0) { ?>
                                <div class="product-price"><?php echo $product['price_text']; ?></div>
                            <?php } ?>
                            <?php if ($product['price_market'] && $product['price_market'] > 0) { ?>
                                <div class="product-price-market"><?php echo $product['price_market_text']; ?></div>
                            <?php } ?>
                        </div>
                        <?php Yii::app()->controller->renderPartial('//partial/product_acction', array('pid' => $product['id'])); ?>
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