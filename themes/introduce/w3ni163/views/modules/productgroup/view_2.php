<?php if (count($products)) { ?>
    <div class="latest-purchase">
        <div class="panel panel-default">
            <?php if ($show_widget_title) { ?>
                <div class="panel-heading">
                    <h2> 
                        <a href="#"><?php echo $widget_title; ?></a>
                    </h2>
                </div>
            <?php } ?>
        </div>
        <div class="product-all">
            <div class="list clearfix">
                <?php foreach ($products as $product) { ?>
                    <div class="list-item">
                        <div class="list-content clearfix">
                            <div class="list-content-box">
                                <div class="list-content-img">
                                    <a href="<?php echo $product['link']; ?>" title="<?php echo $product['name']; ?>"> 
                                        <img alt="<?php echo $product['name']; ?>" src="<?php echo ClaHost::getImageHost() . $product['avatar_path'] . 's200_200/' . $product['avatar_name'] ?>"> 
                                    </a>
                                </div>
                                <div class="list-content-body"> 
                                    <h3 class="list-content-title"> 
                                        <a href="<?php echo $product['link']; ?>" title="<?php echo $product['name'] ?>"><?php echo $product['name']; ?></a> 
                                    </h3>
                                    <div class="product-price-all clearfix">
                                        <?php if ($product['price'] && $product['price'] > 0) { ?>
                                            <div class="product-price">
                                                <?php echo Yii::t('product', 'price'); ?>:
                                                <?php echo $product['price_text']; ?>
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