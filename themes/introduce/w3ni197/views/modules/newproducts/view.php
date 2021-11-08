<?php if (count($products)) { ?>
    <div class="product-home">
        <div class="container">
            <?php if ($show_widget_title) { ?>
                <div class="title clearfix">
                    <h2><?php echo $widget_title ?></h2>
                    <!--<a class="view" href="#" title="#">Xem tất cả</a>-->
                </div>
            <?php } ?>
            <div class="cont">
                <div class="row">
                    <?php foreach ($products as $product) { ?>
                        <div class="col-sm-4 box-product">
                            <div class="box-img">
                                <a href="<?php echo $product['link'] ?>" title="<?php echo $product['name'] ?>"> 
                                    <img alt="<?php echo $product['name']; ?>" src="<?php echo ClaHost::getImageHost() . $product['avatar_path'] . 's350_350/' . $product['avatar_name'] ?>" alt="<?php echo $product['name'] ?>">
                                </a> 
                            </div>
                            <div class="title-product">
                                <h3>
                                    <a href="<?php echo $product['link'] ?>" title="<?php echo $product['name'] ?>"><?php echo $product['name'] ?></a>
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
            </div>
        </div>
    </div>
<?php }