<?php
$productModel = new Product();
?>
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th style="width: 80px; text-align: center"><?php echo Yii::t('common', 'picture'); ?></th>
            <th><?php echo $productModel->getAttributeLabel('name'); ?></th>           
            <th style="width: <?php echo (!isset($update) || $update) ? '180' : '80'; ?>px; text-align: center"><?php echo Yii::t('common', 'quantity'); ?></th>
            <th style="width: 110px; text-align: center"><?php echo $productModel->getAttributeLabel('price'); ?></th>
            <th style="width: 110px; text-align: center">Thành Tiền</th>
			<th style="width: 130px; text-align: center">Ưu Đãi </th>
			<th style="width: 130px; text-align: center">Thanh Toán</th>

        </tr>
    </thead>
    <tbody>
        <?php foreach ($shoppingCart->findAllProducts() as $key => $product) { ?>
            <tr>
                <td class="muted center_text"><a href="<?php echo $product['link']; ?>">
                        <img src="<?php echo ClaHost::getImageHost() . $product['avatar_path'] . 's500_500/' . $product['avatar_name']; ?>"></a>
                </td>
                <td>
                    <a href="<?php echo $product['link']; ?>" class="product-name">
                        <?php echo $product["name"]; ?>
                    </a>
                    <?php
                    $attributes = $shoppingCart->getAttributesByKey($key);
                    if ($attributes && count($attributes)) {
                        ?>
                        <div class="attr">
                            <?php foreach ($attributes as $attr) { ?>
                                <dl class="clearfix">
                                    <dt><?php echo $attr['name']; ?> : </dt>
                                    <dd><?php echo $shoppingCart->getAttributeText($attr); ?></dd>
                                </dl>
                            <?php } ?>
                        </div>
                    <?php } ?>
                </td>
              
                <td>
                    <?php if (!isset($update) || $update) { ?>
                        <form class="form-inline" role="form" action="<?php echo $this->createUrl('/economy/shoppingcart/update', array('key' => $key)); ?>" method="GET" enctype="multipart/form-data">
                            <input id="quantity-<?php echo $key; ?>" type="number" class="form-control sc-quantity" max-lenght="3" value="<?php echo $shoppingCart->getQuantity($key); ?>" name="qty" min="1" step="1" max-lenght="3"/>
                            <a onclick="updateQuantity('<?php echo $key; ?>', $('#quantity-<?php echo $key; ?>').val());" class="btn btn-xs btn-primary"><i class="ico ico-refrest"></i></a>
                            <a href="<?php echo $this->createUrl('/economy/shoppingcart/delete', array('key' => $key)); ?>" class="btn btn-xs btn-danger"><i class="ico ico-delete"></i></button>
                        </form>
                    <?php } else { ?>
                        <?php echo $shoppingCart->getQuantity($key); ?>
                    <?php } ?>
                </td>
                <td style="text-align:right;"><?php echo number_format($product['price'],0,",","."); ?></td>
                <td style="text-align:right;"><?php echo $shoppingCart->getTotalPriceForProduct($key,$product['price']); ?></td>
				 <td style="text-align:right;"><?php echo $bonus; ?></td>
				<td style="text-align:right;"><?php echo number_format(($product['price_market']*$shoppingCart->getQuantity($key)) - ((($product['price_market']*$shoppingCart->getQuantity($key))*(str_replace("%","", $bonus))) / 100 ),0,",","."); ?></td>
            </tr>
        <?php }; ?>		  
        <tr class="sc-totalprice-row">
            <td colspan="6">
                <div class="sc-totalprice-text">
                    <span><?php echo Yii::t('shoppingcart', 'subtotal') ?>:</span>
                </div>
                <div class="sc-totalprice-text">
                    <span><?php echo Yii::t('shoppingcart', 'total') ?>:</span>
                </div>
            </td>
            <td style="text-align:right;">
                <div class="sc-totalprice"><?php echo number_format( $shoppingCart->getTotalPrice() - ($shoppingCart->getTotalPrice()*(str_replace("%","", $bonus)))/100,0,",","."); ?></div>
                <div class="sc-totalprice"><?php echo number_format( $shoppingCart->getTotalPrice() - ($shoppingCart->getTotalPrice()*(str_replace("%","", $bonus)))/100,0,",","."); ?></div>
            </td>
        </tr>
    </tbody>
</table>