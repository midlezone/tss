<?php
$productModel = new Product();
?>
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th align="left"><?php echo $productModel->getAttributeLabel('name'); ?></th>
            <th width="130" align="left"><?php echo $productModel->getAttributeLabel('code'); ?></th>
            <th width="180" align="left"><?php echo Yii::t('common', 'quantity'); ?></th>
            <th width="130" align="left"><?php echo $productModel->getAttributeLabel('price'); ?></th>
            <th width="120" align="left"><?php echo Yii::t('common', 'total'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($products as $product) { ?>
            <tr>
                <td>
                    <a href="<?php echo $product['link']; ?>">
                        <?php echo $product["name"]; ?>
                    </a>
                </td>
                <td><?php echo $product["model"]; ?></td>
                <td>
                    <?php echo ($product["product_qty"]); ?>
                </td>
                <td><?php echo Product::getFormattedPrice($product); ?></td>
                <td><?php echo Product::getTotalPrice($product, $product["product_qty"]); ?></td>
            </tr>
        <?php }; ?>		  
    </tbody>
</table>