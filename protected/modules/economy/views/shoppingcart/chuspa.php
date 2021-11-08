<?php
$productModel = new Product();
?>
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th><?php echo $productModel->getAttributeLabel('name'); ?></th>
            <th style="width: 130px; text-align: center"><?php echo $productModel->getAttributeLabel('code'); ?></th>
            <th style="width: <?php echo (!isset($update) || $update) ? '180' : '80'; ?>px; text-align: center"><?php echo Yii::t('common', 'quantity'); ?></th>
            <th style="width: 110px; text-align: center"><?php echo $productModel->getAttributeLabel('price'); ?></th>
            <th style="width: 110px; text-align: center"><?php echo Yii::t('common', 'total'); ?></th>
        </tr>
    </thead>
    <tbody>
            <tr>
              
                <td>
                    <a href="/san-pham" class="product-name">
                       Đăng ký xem website chuspa.vn
                    </a>
                  
                </td>
                <td>
                    <?php if (isset($product["code"])) echo $product["code"]; ?>
                </td>
                <td>
                    1
                </td>
                <td style="text-align:right;">4.999.000 đ</td>
                <td style="text-align:right;">4.999.000 đ</td>
            </tr>
        <tr class="sc-totalprice-row">
            <td colspan="4">
                <div class="sc-totalprice-text">
                    <span><?php echo Yii::t('shoppingcart', 'subtotal') ?>:</span>
                </div>
                <div class="sc-totalprice-text">
                    <span><?php echo Yii::t('shoppingcart', 'total') ?>:</span>
                </div>
            </td>
            <td style="text-align:right;">
                <div class="sc-totalprice">4.999.000</div>
                <div class="sc-totalprice">4.999.000</div>
            </td>
        </tr>
    </tbody>
</table>