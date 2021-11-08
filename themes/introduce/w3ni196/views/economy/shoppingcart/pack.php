<?php
$productModel = new Product();
$shopping_all_products = $shoppingCart->findAllProducts();
if (count($shopping_all_products) > 0) { 
?>
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th><?php echo $productModel->getAttributeLabel('name'); ?></th>
            <th style="width: <?php echo (!isset($update) || $update) ? '180' : '80'; ?>px; text-align: center"><?php echo Yii::t('common', 'quantity'); ?></th>
            <th style="width: 110px; text-align: center"><?php echo $productModel->getAttributeLabel('price'); ?></th>
            <th style="width: 110px; text-align: center"><?php echo Yii::t('common', 'total'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($shopping_all_products as $key => $product) { ?>
            <tr>
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
                            <a title="<?php echo Yii::t('shoppingcart', 'update_qty'); ?>" onclick="updateQuantityAjax('<?php echo $key; ?>', $('#quantity-<?php echo $key; ?>').val());" class="btn btn-xs btn-primary">
                                <i class="ico ico-refrest"></i>
                            </a>
                            <a title="<?php echo Yii::t('common', 'delete'); ?>" href="<?php echo $this->createUrl('/economy/shoppingcart/updateAjax', array('pid' => $key)); ?>" onclick="deleteFood(this); return false;" class="btn btn-xs btn-danger"><i class="ico ico-delete"></i></a>
                        </form>
                    <?php } else { ?>
                        <?php echo $shoppingCart->getQuantity($key); ?>
                    <?php } ?>
                </td>
                <td style="text-align:right;"><?php echo Product::getPriceText($product); ?></td>
                <td style="text-align:right;"><?php echo $shoppingCart->getTotalPriceForProduct($key); ?></td>
            </tr>
        <?php }; ?>		  
        <tr class="sc-totalprice-row">
            <td colspan="3">
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
    </tbody>
</table>
<?php } ?>