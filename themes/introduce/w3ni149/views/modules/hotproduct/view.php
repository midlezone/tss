<?php if (count($products)) { ?>
    <div class="panel panel-default hotproduct">
        <?php if ($show_widget_title) { ?>
            <div class="panel-heading">
                <div class="title-cont">
                    <h2><?php echo $widget_title; ?></h2>
                </div>
            </div>
        <?php } ?>
          <div class="panel-body">
            <div class="list list-small">
                <?php foreach ($products as $product) { ?>
                    <div class="list-item">
                        <div class="list-content">
                            <div class="list-content-box">
                                <?php if ($product['avatar_path'] && $product['avatar_name']) { ?>
                                    <div class="list-content-img">
                                        <a href="<?php echo $product['link']; ?>" title="<?php echo $product['name']; ?>">
                                            <img alt="<?php echo $product['name']; ?>" src="<?php echo ClaHost::getImageHost() . $product['avatar_path'] . 's100_100/' . $product['avatar_name'] ?>" alt="<?php echo $product['name'] ?>">
                                        </a>
                                    </div>
                                <?php } ?>
                                <div class="list-content-body">
                                    <div class="product-price-all">
                                        <span class="list-content-title">
                                        <a href="<?php echo $product['link']; ?>" title="<?php echo $product['name']; ?>">
                                            <?php echo $product['name']; ?>                             
                                        </a>
                                        </span>
                                        <?php if ($product['price'] && $product['price'] > 0) { ?>
                                            <div class="product-price">
                                                <?php echo Yii::t('product', 'price'); ?>:
                                                <?php echo $product['price_text']; ?>
                                            </div>
                                        <?php } ?>
                                        <?php if ($product['price_market'] && $product['price_market'] > 0) { ?>
                                            <div class="product-price-market">
                                                <?php echo Yii::t('product', 'oldprice'); ?>:
                                                <?php echo $product['price_market_text']; ?>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
<?php } ?>