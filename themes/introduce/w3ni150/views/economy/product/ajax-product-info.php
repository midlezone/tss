<div class="panel-heading"><?php echo $product['name']; ?></div>
<div class="table-responsive">
    <table class="table table-bordered">
        <tbody>
            <?php if ($product['code']) { ?>
                <tr>
                    <td>Mã sản phẩm:</td><td><?php echo $product['code']; ?></td>
                </tr>
            <?php } ?>
            <?php
            if ($attributesShow && count($attributesShow)) {
                $attributesDynamic = AttributeHelper::helper()->getDynamicProduct($model, $attributesShow);
                foreach ($attributesDynamic as $key => $item) {
                    if (is_array($item['value']) && count($item['value'])) {
                        $item['value'] = implode(", ", $item['value']);
                    }
                    if ($item['value'])
                        echo '<tr><td>' . $item['name'] . ':</td><td>' . $item["value"] . '</td>';
                }
            }
            ?>
                <tr><td colspan="2">
                                                            <?php if ($product['price_market'] && $product['price_market'] > 0) { ?>
                                                                <div class="product-price-market">
                                                                    <?php echo Yii::t('product', 'oldprice'); ?>:
                                                                    <?php echo $product['price_market_text']; ?>
                                                                </div>
                                                            <?php } ?>
                                                            <?php if ($product['price'] && $product['price'] > 0) { ?>
                                                                <div class="product-price">
                                                                    <?php echo Yii::t('product', 'price'); ?>:
                                                                    <?php echo $product['price_text']; ?>
                                                                </div>
                                                            <?php } ?>
                        </td></tr>
        </tbody>
    </table>
</div>