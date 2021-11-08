<?php if (count($products)) { ?>
    <div class="related-products product">
        <?php if ($show_widget_title) { ?>
            <div class="title">
                <h2><?php echo $widget_title ?></h2>
            </div>
            <div class="line"></div>
        <?php } ?>
        <div class="product-cont">
            <div class="list grid">
                <?php foreach ($products as $product) { ?>
                    <div class="list-item  ">
                        <div class="list-content clearfix">
                            <div class="list-content-box">
                                <div class="list-content-img"> 
                                    <a href="<?php echo $product['link'] ?>" title="<?php echo $product['name'] ?>"> 
                                        <img alt="<?php echo $product['name']; ?>" src="<?php echo ClaHost::getImageHost() . $product['avatar_path'] . 's150_150/' . $product['avatar_name'] ?>" alt="<?php echo $product['name']; ?>">
                                    </a> 
                                </div>
                                <div class="list-content-body"> 
                                    <span class="list-content-title"> 
                                        <h3>
                                            <a href="<?php echo $product['link'] ?>" title="<?php echo $product['name'] ?>"><?php echo $product['name'] ?></a> 
                                        </h3>
                                    </span>
                                    <div class="product-price-all clearfix clearfix">
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
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
<?php } ?>
