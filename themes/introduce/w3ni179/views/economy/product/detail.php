<?php
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/plugins/colorbox/jquery.colorbox-min.js');
?>
<div class="product-detail">
    <div class="product-detail-box">
        <div class="product-detail-img clearfix">
            <div>
                <?php
                $images = $model->getImages();
                $first = reset($images);
                ?>
                <div class="product-img-main"> 
                    <a class="product-img-small product-img-large cboxElement" href="<?php echo ClaHost::getImageHost() . $first['path'] . 's800_600/' . $first['name'] ?>">
                        <img src="<?php echo ClaHost::getImageHost() . $first['path'] . 's330_330/' . $first['name'] ?>">
                    </a>
                </div>
                <?php if ($images && count($images)) { ?>
                    <div class="product-img-item">
                        <ul>
                            <?php foreach ($images as $img) { ?>
                                <li>
                                    <a class="product-img-small cboxElement" href="<?php echo ClaHost::getImageHost() . $img['path'] . 's800_600/' . $img['name']; ?>">
                                        <img src="<?php echo ClaHost::getImageHost() . $img['path'] . 's50_50/' . $img['name']; ?>">
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                <?php } ?>
            </div>
            <div class="clear"></div>
        </div>
        <div class="product-detail-info" id="product-detail-info">
            <h2 class="product-info-title"> 
                <?php echo $product['name'] ?>
            </h2>
            <div class="product-info-col1">
                <?php if ($product['price'] && $product['price'] > 0) { ?>
                    <p class="product-price">
                        <span class="product-detail-price">
                            <span class="pricetext">  <?php echo $product['price_text']; ?></span>
                            <span class="currencytext"> Đ</span>
                        </span>
                        <?php if ($product['include_vat']) { ?>
                            <span class="price-inclue-vat">
                                (<?php echo Yii::t('product', 'product_include_vat'); ?>)
                            </span>
                        <?php } ?>
                    </p>
                <?php } else { ?>
                    <p class="product-detail-sortdesc">
                        <label><?php echo Yii::t('product', 'price'); ?>:</label>
                        <span class="product-detail-price">
                            <?php echo Product::getProductPriceNullLabel(); ?>
                        </span>
                    </p>
                <?php } ?>
                <?php if ($product['price_market'] && $product['price_market'] > 0) { ?>
                    <p class="product-detail-sortdesc">
                        <span><?php echo Yii::t('product', 'oldprice'); ?>:</span>
                        <span class="old-price">
                            <?php echo $product['price_market_text']; ?>
                        </span>
                    </p>
                <?php } ?>

                <?php if ($product['price'] && $product['price'] > 0) { ?>
                    <div class="product-info-state">
                        <label><?php echo Yii::t('common', 'state'); ?>:</label>
                        <span><?php echo $product['state'] ? 'Còn hàng' : 'Hết hàng' ?></span>
                    </div>
                    <p class="product-info-quantity">
                        <label><?php echo Yii::t('common', 'quantity'); ?>:</label>
                        <span class="product-detail-quantity">
                            <input type="number" name="qty" value="1" max-lenght="3" class="product_quantity" id="product_quantity" style="width: 40px;" min="1" step="1"/>
                        </span>
                    </p>
                    <div class="product-attr-error text-danger">
                        <span><?php echo Yii::t('product', 'please_choice') ?> </span><b></b>
                    </div>
                    <div class="CartActionAdd ProductActionAdd">
                        <a href="<?php echo Yii::app()->createUrl('/economy/shoppingcart/add', array('pid' => $model->id)); ?>" class="a-btn-2 orange">
                            <span class="a-btn-text">Đặt tour</span> 
                            <span class="a-btn-icon-right"><span></span></span>
                        </a>
                    </div>
                <?php } ?>
            </div>

        </div>
    </div>
    <div class="product-detail-more">
        <div class="tab">
            <ul role="tablist" class="nav nav-tabs">
                <li class="active">
                    <a data-toggle="tab" role="tab" href="#home">Chi tiết sản phẩm</a>
                </li>
            </ul>
            <div class="tab-content">
                <div id="home" class="tab-pane fade active">
                    <?php
                    echo $product['product_desc'];
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

