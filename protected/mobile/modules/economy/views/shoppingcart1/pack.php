<?php
$productModel = new Product();
?>
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th style="width: 50px;">Ảnh</th>
            <th><?php echo $productModel->getAttributeLabel('name'); ?></th>
            <th style="width: 130px;"><?php echo $productModel->getAttributeLabel('code'); ?></th>
            <th style="width: 180px;"><?php echo Yii::t('common', 'quantity'); ?></th>
            <th style="width: 130px;"><?php echo $productModel->getAttributeLabel('price'); ?></th>
            <th style="width: 120px;"><?php echo Yii::t('common', 'total'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($shoppingCart->findAllProducts() as $product) { ?>
            <tr>
                <td class="muted center_text"><a href="<?php echo $product['link']; ?>">
                        <img src="<?php echo ClaHost::getImageHost() . $product['avatar_path'] . 's50_50/' . $product['avatar_name']; ?>"></a>
                </td>
                <td>
                    <a href="<?php echo $product['link']; ?>">
                        <?php echo $product["name"]; ?>
                    </a>
                </td>
                <td><?php echo $product["model"]; ?></td>
                <td>
                    <?php if (!isset($update) || $update) { ?>
                        <form class="form-inline" role="form" action="<?php echo $this->createUrl('/economy/shoppingcart/update', array('pid' => $product['id'])); ?>" method="GET" enctype="multipart/form-data">
                            <input id="quantity-<?php echo $product["id"]; ?>" type="text" class="form-control sc-quantity" max-lenght="3" value="<?php echo $shoppingCart->getQuantity($product["id"]); ?>" name="qty">
                            <a onclick="updateQuantity(<?php echo $product["id"]; ?>, $('#quantity-<?php echo $product["id"]; ?>').val());" class="btn btn-sm btn-primary"><i class="ico ico-refrest"></i></a>
                            <a href="<?php echo $this->createUrl('/economy/shoppingcart/delete', array('pid' => $product['id'])); ?>" class="btn btn-sm btn-danger"><i class="ico ico-delete"></i></button>
                        </form>
                    <?php } else { ?>
                        <?php echo $shoppingCart->getQuantity($product["id"]); ?>
                    <?php } ?>
                </td>
                <td><?php echo Product::getFormattedPrice($product); ?></td>
                <td><?php echo $shoppingCart->getTotalPriceForProduct($product["id"]); ?></td>
            </tr>
        <?php }; ?>		  
        <tr class="sc-totalprice-row">
            <td colspan="5">
                <div class="sc-totalprice-text">
                    <span>Thành tiền:</span>
                </div>
                <div class="sc-totalprice-text">
                    <span>Tổng tiền thanh toán:</span>
                </div>
            </td>
            <td>
                <div class="sc-totalprice"><?php echo $shoppingCart->getTotalPrice(); ?></div>
                <div class="sc-totalprice"><?php echo $shoppingCart->getTotalPrice(); ?></div>
            </td>
        </tr>
    </tbody>
</table>