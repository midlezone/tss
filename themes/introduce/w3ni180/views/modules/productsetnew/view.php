<?php if (count($products)) { ?>
    <div class="box-js-top">
        <div class="main-list">
            <div class="border-list">
                <?php if ($show_widget_title) { ?>
                    <h2> <span class="title-list-list"><?php echo $widget_title ?></span></h2>
                <?php } ?>
            </div>
            <!--end-border-list--> 
        </div>
        <!--end-main-list-->
        <div class="js">
            <div class="jcarousel-wrapper">
                <a class="jcarousel-control-next" href="#" data-jcarouselcontrol="true"></a>
                <a class="jcarousel-control-prev" href="#" data-jcarouselcontrol="true"></a>
                <div class="jcarousel" data-jcarousel="true" data-jcarouselautoscroll="true">
                    <ul style="left: -0px; top: 0px;">
                        <?php foreach ($products as $product) { ?>
                            <li>
                                <div class="box-img">
                                    <button onclick="get_html_quickview('<?php echo $product['id'] ?>', this)" type="button" class="btn btn-primary btn-quickview" data-toggle="modal" data-target=".bs-example-modal-sm<?php echo $product['id'].'productsetnew' ?>">
                                        <span>Xem nhanh</span>
                                    </button>
                                    <div class="modal fade bs-example-modal-sm<?php echo $product['id'].'productsetnew' ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                                        <div class="modal-dialog modal-sm">
                                        </div>
                                    </div>
                                    <a href="<?php echo $product['link']; ?>" title="<?php echo $product['name']; ?>"> 
                                        <img alt="<?php echo $product['name']; ?>" src="<?php echo ClaHost::getImageHost() . $product['avatar_path'] . 's200_200/' . $product['avatar_name'] ?>">
                                    </a>
                                </div>
                                <div class="nd-banner">
                                    <p><a href="<?php echo $product['link']; ?>" title="<?php echo $product['name']; ?>"><?php echo $product['name']; ?></a></p>
                                    <div class="product-all">
                                        <div class="product-price-all clearfix">
                                            <?php if ($product['price_market'] && $product['price_market'] > 0) { ?>
                                                <div class="product-price-market">
                                                    <span><?php echo $product['price_market_text']; ?></span>
                                                </div>
                                            <?php } ?>
                                            <?php if ($product['price'] && $product['price'] > 0) { ?>
                                                <div class="product-price product-price-list">
                                                    <span><?php echo $product['price_text']; ?></span>
                                                </div>
                                            <?php } ?>
                                            <?php if ($product['price_market'] && $product['price_market'] > 0 && $product['price'] && $product['price'] > 0) { ?>
                                                <div class="sale-of"> <span>-<?php echo ClaProduct::getDiscount($product['price_market'], $product['price']) ?>%</span> </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <!--end-product-all--> 
                                </div>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
                <!--end-jcarousel--> 
            </div>
            <!--end-jcarousel-wrapper--> 
        </div>
        <!--end-js--> 
    </div>
<?php } ?>