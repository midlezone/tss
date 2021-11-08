<?php if (count($products)) { ?>
    <div class="list-product-relation">
        <?php if ($show_widget_title) { ?>
            <div class="main-list">
                <h3><?php echo $widget_title; ?></h3>
            </div>
        <?php } ?>
        <ul class="list grid">
            <?php
            foreach ($products as $product) {
                $price = number_format(floatval($product['price']));
                if ($price == 0)
                    $price_label = Product::getProductPriceNullLabel();
                else
                    $price_label = $price . Product::getProductCurrency($product);
                ?>
                <div class="list-item">
                    <div class="list-content clearfix">
                        <div class="list-content-box">
                            <div class="list-content-img">
                                <a href="<?php echo $product['link']; ?>" title="<?php echo $product['name']; ?>">
                                    <img alt="<?php echo $product['name']; ?>" src="<?php echo ClaHost::getImageHost() . $product['avatar_path'] . 's200_200/' . $product['avatar_name'] ?>" alt="<?php echo $product['name']; ?>">
                                </a>
                            </div>
                            <div class="list-content-body">
                                <div class="product-price-all clearfix">
                                    <span class="list-content-title">
                                        <a href="<?php echo $product['link']; ?>">
                                            <?php echo $product['name']; ?>
                                        </a>
                                    </span>
                                    <?php if ($product['price_market'] && $product['price_market'] > 0) { ?>
                                        <div class="product-price-market">
                                            <?php echo $product['price_market_text']; ?>
                                        </div>
                                    <?php } ?>
                                    <?php if ($product['price'] && $product['price'] > 0) { ?>
                                        <div class="product-price">
                                            <span><?php echo $product['price_text']; ?></span>
                                        </div>
                                    <?php } ?>
                                </div>
                                <?php Yii::app()->controller->renderPartial('//partial/product_acction', array('pid' => $product['id'])); ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </ul>
    </div>
<?php } ?>