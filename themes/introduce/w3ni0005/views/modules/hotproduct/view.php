<?php if (count($products)) { ?>
    <div class="center-main-center">
        <?php if ($show_widget_title) { ?>
            <div class="header-panel">
                <ul>
                    <li><?php echo $widget_title; ?></li>
                </ul>
            </div>
        <?php } ?>
        <div class="box-sp-box">
            <div class="list grid">
                <?php
                foreach ($products as $product) {

                    $price = number_format(floatval($product['price']));
                    if ($price == 0)
                        $price_label = Product::getProductPriceNullLabel();
                    else
                        $price_label = $price . Product::getProductUnit($product);
                    ?>
                    <div class="list-item">
                        <div class="list-content">
                            <div class="list-content-box">
                                <div class="list-content-img">
                                    <a href="<?php echo $product['link']; ?>" title="<?php echo $product['name']; ?>">
                                        <img src="<?php echo ClaHost::getImageHost() . $product['avatar_path'] . 's150_150/' . $product['avatar_name'] ?>" alt="<?php echo $product['avatar_name']; ?>" />
                                    </a>
                                </div>
                                <div class="list-content-body">
                                    <span class="list-content-title">
                                        <a href="<?php echo $product['link']; ?>" title="<?php echo $product['name']; ?>">
                                            <?php echo $product['name']; ?>
                                        </a>
                                    </span>
                                    <?php if ($price) { ?>
                                        <div class="product-price">
                                            <label>Giá: </label><span><?php echo $price_label; ?></span>
                                        </div> 
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="next-sp-index">
                <a class="next" href="<?php echo Yii::app()->createUrl('economy/product'); ?>">Xem Thêm...</a>
            </div>
        </div>
    </div>
<?php } ?>