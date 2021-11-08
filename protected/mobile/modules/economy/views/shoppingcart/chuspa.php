<?php
$productModel = new Product();
?>
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th><?php echo $productModel->getAttributeLabel('name'); ?></th>
            <th style="width: 110px; text-align: center"><?php echo $productModel->getAttributeLabel('price'); ?></th>
        </tr>
    </thead>
    <tbody>
            <tr>
              
                <td>
                    <a href="/san-pham" class="product-name">
                       Đăng ký xem website chuspa.vn
                    </a>
                  
                </td>
                <td style="text-align:right;">4.999.000 đ</td>
            </tr>
        <tr class="sc-totalprice-row">
            <td colspan="1">
                <div class="sc-totalprice-text">
                    <span><?php echo Yii::t('shoppingcart', 'subtotal') ?>:</span>
                </div>
               
            </td>
            <td style="text-align:right;">
                <div class="sc-totalprice">4.999.000 VNĐ</div>
            </td>
        </tr>
    </tbody>
</table>