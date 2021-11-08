<?php
//
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/plugins/colorbox/jquery.colorbox-min.js');
//
?>
<div class="product-detail">
    <div class="product-detail-box">
        <div class="product-detail-img">
            <?php
            $images = $model->getImages();
            $first = reset($images);
            ?>
            <div class="product-img-main"> 
                <a class="product-img-small product-img-large" href="<?php echo ClaHost::getImageHost() . $first['path'] . 's800_600/' . $first['name'] ?>">
                    <img src="<?php echo ClaHost::getImageHost() . $first['path'] . 's330_330/' . $first['name'] ?>">
                </a>
            </div>
            <div class="product-img-item">
                <ul>
                    <?php foreach ($images as $img) { ?>
                        <li>
                            <a class="product-img-small" href="<?php echo ClaHost::getImageHost() . $img['path'] . 's800_600/' . $img['name']; ?>">
                                <img src="<?php echo ClaHost::getImageHost() . $img['path'] . 's50_50/' . $img['name']; ?>">
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
        <div class="product-detail-info">
            <h2 class="product-info-title"> <?php echo $product['name'] ?> </h2>

            <?php if ($product['price_market']) { ?>
                <p><label>Giá TT: </label><span class="product-detail-price-market"><?php echo number_format(floatval($product['price_market'])) . 'đ'; ?></span></li>
                <?php } ?>
                <?php
                $price = floatval($product['price']);
                if ($price > 0) {
                    ?>
                <p><label>Giá bán: </label><span class="product-detail-price"><?php echo number_format($price) . Product::getProductUnit($product); ?></span></p>
            <?php } else { ?>
                <p><label>Giá bán: </label><span class="product-detail-price"><?php echo Product::getProductPriceNullLabel(); ?></span></li>
                <?php } ?>
                <?php if ($product['product_sortdesc']) { ?>
                <p class="product-detail-sortdesc">
                    <?php echo $product['product_sortdesc']; ?>
                </p>
            <?php } ?>
        </div>
    </div>
    <div class="product-detail-more">
        <?php if ($product['product_desc']) { ?>
            <div class="tab">
                <ul role="tablist" class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" role="tab" href="#home">Chi Tiết Sản Phẩm</a></li>
                </ul>
                <div class="tab-content">
                    <div id="home" class="tab-pane fade active">
                        <?php
                        echo $product['product_desc'];
                        ?>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>