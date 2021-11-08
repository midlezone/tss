<?php
//
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/plugins/colorbox/jquery.colorbox-min.js');
//
?>
<div class="product-detail">
    <div class="product-detail-box">        
        <div class="product-detail-info">
            <h2 class="product-info-title"> <?php echo $product['name'] ?> </h2>
            <!--
            <?php if ($product['price_market'] && $product['price_market'] > 0) { ?>
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
            -->
            <?php if (isset($model->product_info->product_sortdesc)) { ?>
                <p class="product-detail-sortdesc">
                    <?php echo $model->product_info->product_sortdesc; ?>
                </p>
            <?php } ?>
        </div>
    </div>
    <div class="product-detail-more">
        <?php if (isset($model->product_info->product_desc)) { ?>
            <?php
                echo $model->product_info->product_desc;
            ?>            
        <?php } ?>
    </div>
</div>