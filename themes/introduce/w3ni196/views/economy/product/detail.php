<?php
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/plugins/colorbox/jquery.colorbox-min.js');
?>
<script>
    thumb_img_w = 500;
    thumb_img_h = 500;
</script>
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
                        <img src="<?php echo ClaHost::getImageHost() . $first['path'] . 's500_500/' . $first['name'] ?>">
                    </a>
                </div>
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
            </div>
            <div class="clear"></div>
        </div>
        <div class="product-detail-info" id="product-detail-info">
            <h2 class="product-info-title"> <?php echo $product['name'] ?> </h2>
            <div class="product-info-col1">
                <?php if ($product['price'] && $product['price'] > 0) { ?>
                    <p class="product-price">
                        <span class="product-detail-price">
                            <?php echo $product['price_text']; ?>
                        </span>
                        <?php if ($product['include_vat']) { ?>
                            <span class="price-inclue-vat">
                                (<?php echo Yii::t('product', 'product_include_vat'); ?>)
                            </span>
                        <?php } ?>
                    </p>
                <?php } else { ?>
                    <p class="product-info-price">
                        <label><?php echo Yii::t('product', 'price'); ?>:</label>
                        <span class="product-detail-price">
                            <?php echo Product::getProductPriceNullLabel(); ?>
                        </span>
                    </p>
                <?php } ?>
                <?php if ($product['price_market'] && $product['price_market'] > 0) { ?>
                    <p class="product-info-price-market">
                        <label><?php echo Yii::t('product', 'oldprice'); ?>:</label>
                        <span class="product-detail-price-market">
                            <?php echo $product['price_market_text']; ?>
                        </span>
                    </p>
                <?php } ?>
                <?php if ($product['price_market'] && $product['price'] && $product['price'] < $product['price_market']) { ?>
                    <p class="product-info-price-save">
                        <label><?php echo Yii::t('product', 'saveprice'); ?>:</label>
                        <span class="product-detail-price-save"><?php echo ClaProduct::getDiscount($product['price_market'], $product['price']) ?>%</span>
                    </p>
                <?php } ?>
                <?php
                // L???y v?? hi???n th??? c??c attribute c??  thu???c t??nh t??y ch???n
                $configurableFilter = AttributeHelper::helper()->getConfiguableFilter($category['attribute_set_id'], $product);
                if ($configurableFilter && count($configurableFilter)) {
                    ?>
                    <?php
                    foreach ($configurableFilter as $config) {
                        $countCf = count($config['configuable']);
                        $cfValue = '';
                        if (isset($config['configuable']) && $countCf) {
                            ?>
                            <div class="product-info-conf product-attr" attr-title="<?php echo $config['name']; ?>">
                                <label><?php echo $config['name']; ?>:</label>
                                <div class="product-info-conf-list">
                                    <?php
                                    foreach ($config['configuable'] as $cf) {
                                        ?>
                                        <div class="product-info-conf-item product-attr-item">
                                            <a href="#" data-input="<?php echo $cf['value']; ?>" title="<?php echo $cf['name']; ?>" class="<?php if ($countCf == 1) echo 'active'; ?>">
                                                <?php echo $cf['text']; ?>
                                            </a>
                                        </div>
                                        <?php
                                    }
                                    if ($countCf == 1)
                                        $cfValue = $cf['value'];
                                    ?>
                                </div>
                                <?php
                                echo CHtml::hiddenField(ClaShoppingCart::PRODUCT_ATTRIBUTE_CONFIGURABLE_KEY . '[' . $config['id'] . ']', $cfValue, array('class' => 'attrConfig-input'));
                                ?>
                            </div>
                            <?php
                        }
                    }
                    ?>
                <?php } ?>
                <?php if ($product['product_sortdesc']) { ?>
                    <p class="product-detail-sortdesc">
                        <?php echo $product['product_sortdesc']; ?>
                    </p>
                <?php } ?>

                <?php if ($product['price'] && $product['price'] > 0) { ?>
                    <div class="product-info-state">
                        <label><?php echo Yii::t('common', 'state'); ?>:</label>
                        <span><?php echo $product['state'] ? 'C??n h??ng' : 'H???t h??ng' ?></span>
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
                    <div class="button button-detail">
                        <a href="<?php echo Yii::app()->createUrl('/economy/shoppingcart/add', array('pid' => $model->id)); ?>">Ch???n</a>
                    </div>
                <?php } ?>
                <div class="description-detail">
                    <?php if ($attributesShow && count($attributesShow)) { ?>
                        <table class="table table-bordered">
                            <tbody>
                                <?php
                                $attributesDynamic = AttributeHelper::helper()->getDynamicProduct($model, $attributesShow);
                                foreach ($attributesDynamic as $key => $item) {
                                    if (is_array($item['value']) && count($item['value'])) {
                                        $item['value'] = implode(", ", $item['value']);
                                    }
                                    if ($item['value'])
                                        echo '<tr><td>' . $item['name'] . '</td><td>' . $item["value"] . '</td>';
                                }
                                ?>      
                            </tbody>
                        </table>
                    <?php } ?>
                    <?php
                    echo $product['product_desc'];
                    ?>
                </div>
            </div>
            <!--            <div class="product-info-col2">
                        </div>-->
        </div>

    </div>
</div>
<script type="text/javascript">
    jQuery(document).ready(function () {
        jQuery(document).on('click', '.product-info-conf-list .product-info-conf-item a', function () {
            $(this).closest('.product-info-conf').find('.product-info-conf-list .product-info-conf-item a').removeClass('active');
            $(this).addClass('active');
            var dataInput = $(this).attr('data-input');
            if (dataInput) {
                $(this).closest('.product-info-conf').find('.attrConfig-input').val(dataInput);
            }
            return false;
        });
    });
</script>