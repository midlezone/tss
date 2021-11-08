<?php if ($category['image_path'] != '' && $category['image_name'] != '') { ?>
    <div class="banner-trong">
        <a onclick="javascript:void(0)" title="<?php echo $category['cat_name'] ?>">
            <img src="<?php echo ClaHost::getImageHost() . $category['image_path'] . $category['image_name']; ?>">
        </a>
    </div>
<?php } ?>
<div class="container">
    <div class="top-cont clearfix">
        <?php $this->widget('common.widgets.modules.breadcrumb.breadcrumb'); ?>
    </div>
    <?php if (count($products)) { ?>
        <div id="" class="products-list row">
            <?php
            foreach ($products as $product) {
                ?>
                <div class="col-sm-4">
                    <div class="item ">
                        <div class="box-cont">
                            <div class="box-img"> 
                                <a href="<?php echo $product['link']; ?>" title="<?php echo $product['name']; ?>">
                                    <img alt="<?php echo $product['name']; ?>" src="<?php echo ClaHost::getImageHost() . $product['avatar_path'] . 's280_280/' . $product['avatar_name'] ?>">
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
        <div class='product-page clearfix'>
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
        <div class="bottom-main">
            <div class="row">
                <div class="col-sm-4">
                    <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK4)); ?>
                </div>
                <div class="col-sm-4">
                    <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK5)); ?>
                </div>
                <div class="col-sm-4">
                    <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK6)); ?>
                </div>
            </div>
        </div>
    <?php } ?>
</div>
