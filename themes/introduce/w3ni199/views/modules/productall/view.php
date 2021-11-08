<?php if (count($products)) { ?>
    <div id="owl-demo" class="products-list row">
        <?php
        foreach ($products as $product) {
            ?>
            <div class="col-xs-4">
                <div class="item ">
                    <div class="box-cont">
                        <div class="box-img"> 
                            <a href="<?php echo $product['link']; ?>" title="<?php echo $product['name']; ?>">
                                <img alt="<?php echo $product['name']; ?>" src="<?php echo ClaHost::getImageHost() . $product['avatar_path'] . 's330_330/' . $product['avatar_name'] ?>">
                            </a> 
                        </div>
                        <div class="product-information clearfix">
                            <div class="title-products">
                                <h3><a href="<?php echo $product['link']; ?>" title="<?php echo $product['name']; ?>"><?php echo $product['name']; ?></a></h3>
                            </div>
                            <div class="products-left">
                                <?php if ($product['price'] && $product['price'] > 0) { ?>
                                    <div class="price-products"><?php echo $product['price_text']; ?></div>
                                <?php } ?>
                                <?php if ($product['state']) { ?>
                                    <div class="status"><?php echo Yii::t('product', 'in_stock'); ?></div>
                                <?php } ?>
                            </div>
                            <div class="products-right">
                                <?php Yii::app()->controller->renderPartial('//partial/product_acction', array('pid' => $product['id'])); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
    <div class='product-page'>
        <?php
        $this->widget('common.extensions.LinkPager.LinkPager', array(
            'itemCount' => $totalitem,
            'pageSize' => $limit,
            'header' => '',
            'htmlOptions' => array('class' => 'W3NPager',), // Class for ul
            'selectedPageCssClass' => 'active',
        ));
        ?>
    </div>
<?php } ?>