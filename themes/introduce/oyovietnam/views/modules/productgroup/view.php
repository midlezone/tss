<?php if (count($products)) { ?>
    <div class="center-main-center"> 
        <div class="title-main">
            <div class="border-list clearfix">
                <?php if ($show_widget_title) { ?>
                    <h3><?php echo $widget_title; ?></h3>
                <?php } ?>
            </div><!--end-border-list-->
        </div><!--end-main-list-->
        <div class="list grid">
            <?php foreach ($products as $product) { ?>
                <div class="list-item">
                    <div class="list-content">
                        <div class="list-content-box">
                            <div class="list-content-img">
                                <a href="<?php echo $product['link']; ?>">
                                    <img src="<?php echo ClaHost::getImageHost() . $product['avatar_path'] . 's200_200/' . $product['avatar_name'] ?>">
                                </a>
                            </div>
                            <div class="list-content-body">
                                <span class="list-content-title">
                                    <a href="<?php echo $product['link']; ?>">
                                        <?php echo $product['name']; ?>
                                    </a>
                                </span>
                                <?php if ($product['price_market'] && $product['price_market'] > 0) { ?>
                                    <div class="product-price-market">
                                        <?php echo Yii::t('product', 'oldprice'); ?>:
                                        <?php echo $product['price_market_text']; ?>
                                    </div>
                                <?php } ?>
                                <?php if ($product['price'] && $product['price'] > 0) { ?>
                                    <div class="product-price">
                                        <label><?php echo Yii::t('product', 'price'); ?>: </label>
                                        <span><?php echo $product['price_text']; ?></span>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div><!--end-list-gird-->
    </div>
<?php } ?>