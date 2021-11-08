<?php
$js = 'function updateQuantity(key, quantity) { if(quantity==0) {$(this).val(0);} document.location = "' . $this->createUrl('/economy/shoppingcart/update') . '?key=" + key + "&qty=" + quantity; }';
Yii::app()->clientScript->registerScript('updateQuantity', $js, CClientScript::POS_END);
?>
<?php
$productModel = new Product();
?>
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th style="width: 10%; text-align: center"><?php echo Yii::t('common', 'picture'); ?></th>
            <th style="width: 40%; text-align: center"><?php echo $productModel->getAttributeLabel('name'); ?></th>
            <th style="width: 30%; text-align: center"><?php echo Yii::t('common', 'quantity'); ?></th>
            <th style="width: 15%; text-align: center"><?php echo $productModel->getAttributeLabel('price'); ?></th>
            <th style="width: 15%; text-align: center"><?php echo Yii::t('common', 'total'); ?></th>
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
                        <form class="form-inline" role="form" action="<?php echo $this->createUrl('/economy/shoppingcart/update', array('key' => $key)); ?>" method="GET" enctype="multipart/form-data">
                            <input style="display: inherit;" id="quantity-<?php echo $key; ?>" type="number" class="form-control sc-quantity" max-lenght="3" value="<?php echo $shoppingCart->getQuantity($key); ?>" name="qty" min="1" step="1" max-lenght="3"/>
                            <a onclick="updateQuantity('<?php echo $key; ?>', $('#quantity-<?php echo $key; ?>').val());" class="btn btn-xs btn-primary"><i class="ico ico-refrest"></i></a>
                            <a href="<?php echo $this->createUrl('/economy/shoppingcart/delete', array('key' => $key)); ?>" class="btn btn-xs btn-danger"><i class="ico ico-delete"></i></button>
                        </form>
                       
                </td>
                <td style="text-align:right;"><?php echo Product::getPriceText($product); ?></td>
                <td style="text-align:right;"><?php echo $shoppingCart->getTotalPriceForProduct($key); ?></td>
            </tr>
        <?php }; ?>		  
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
                <div class="sc-totalprice"><?php echo $shoppingCart->getTotalPrice(); ?></div>
                <div class="sc-totalprice"><?php echo $shoppingCart->getTotalPrice(); ?></div>
            </td>
        </tr>
		 <tr class="sc-totalprice-row">
           <td colspan="4">
                <div class="sc-totalprice-text">
                    <span>Chọn hình thức thanh toán điểm khuyến mãi 2%- Số tiền còn lại:</span>
                </div>
              
            </td>
			 <td style="text-align:right;">
                <div class="sc-totalprice"><?php echo $shoppingCart->getTotalPrice1(); ?></div>
            </td>
        </tr>
    </tbody>
</table>