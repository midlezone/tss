<?php if (count($products)) { ?>
    <div class="title clearfix">
        <?php if ($show_widget_title) { ?>
            <div class="title_box">
                <h2><?php echo $widget_title ?></h2>
            </div>
        <?php } ?>
    </div>
    <div class="row">
        <div class="list-product clearfix">
            <?php foreach ($products as $product) { ?>
                <div class="col-xs-4">
                    <a href="<?php echo $product['link'] ?>" title="<?php echo $product['name'] ?>">
                        <img alt="<?php echo $product['name']; ?>" src="<?php echo ClaHost::getImageHost() . $product['avatar_path'] . 's280_280/' . $product['avatar_name'] ?>">
                    </a>
                    <div class="list-content-body">
                        <div class="product-price-all clearfix">
                            <span class="list-content-title">
                                <a href="<?php echo $product['link'] ?>" title="<?php echo $product['name'] ?>"><?php echo $product['name'] ?></a>
                            </span>
                            <?php if ($product['price'] && $product['price'] > 0) { ?>
                                <div class="product-price">
                                    <?php echo $product['price_text']; ?>
                                </div>
                            <?php } ?>
                            <?php if ($product['price_market'] && $product['price_market'] > 0) { ?>
                                <div class="product-price-market">
                                    <?php echo $product['price_market_text']; ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
<?php } ?>
