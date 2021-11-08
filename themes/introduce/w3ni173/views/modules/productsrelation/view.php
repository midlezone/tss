<?php if (count($products)) { ?>
    <div class="related-products">
        <?php if ($show_widget_title) { ?>
            <div class="box-title">
                <div class="title"> 
                    <a href="#" title="#"><?php echo $widget_title ?></a> 
                </div>
            </div>
        <?php } ?>
        <div class="box-cont">
            <div class="list grid">


                <?php foreach ($products as $product) { ?>
                    <div class="list-item  ">
                        <div class="list-content clearfix">
                            <div class="list-content-box">
                                <div class="list-content-img"> 
                                    <a href="<?php echo $product['link'] ?>" title="<?php echo $product['name'] ?>"> 
                                        <img alt="<?php echo $product['name']; ?>" src="<?php echo ClaHost::getImageHost() . $product['avatar_path'] . 's160_0/' . $product['avatar_name'] ?>" />
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
                        </div>
                    </div>
                <?php } ?>

            </div>
        </div>
    </div>
<?php } ?>