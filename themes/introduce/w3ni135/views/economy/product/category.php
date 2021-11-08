<?php if (count($products)) { ?>
    <div class="product-category"> 
        <div class="list grid">
            <?php
            foreach ($products as $product) {
                ?>
                <div class="list-item">
                    <div class="list-content">
                        <div class="list-content-box">
                            <div class="list-content-img">
                                <a href="<?php echo $product['link']; ?>">
                                    <img src="<?php echo ClaHost::getImageHost() . $product['avatar_path'] . 's220_220/' . $product['avatar_name'] ?>">
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
        </div>
        <div class='product-page'>
            <?php
            $this->widget('common.extensions.LinkPager.LinkPager', array(
                'itemCount' => $totalitem,
                'pageSize' => $limit,
                'header' => '',
                'selectedPageCssClass' => 'active',
            ));
            ?>
        </div>
    </div>
<?php } ?>