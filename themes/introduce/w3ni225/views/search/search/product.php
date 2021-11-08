<div class="product-search"> 
    <div class="search-result" style="clear: both;">
        <p class="textreport"><?php echo Yii::t('common', 'search_result', array('{results}' => $totalitem, '{keyword}' => '<span class="bold">' . $keyword . '</span>')); ?></p>
    </div>
    <?php if (count($data)) { ?>
    <div class="list grid">
            <?php
            foreach ($data as $pro) {
                $price = number_format(floatval($pro['price']));
                $price_market = number_format(floatval($pro['price_market']));
                ?>
                <div class="col-sm-4">
                    <div class="item ">
                        <div class="box-cont">
                            <div class="box-img"> 
                                <a href="<?php echo $pro['link']; ?>" title="<?php echo $pro['name']; ?>">
                                    <img alt="<?php echo $pro['name']; ?>" src="<?php echo ClaHost::getImageHost() . $pro['avatar_path'] . 's280_280/' . $pro['avatar_name'] ?>">
                                </a> 
                            </div>
                            <div class="product-information clearfix">
                                <div class="title-products">
                                    <h3><a href="<?php echo $pro['link']; ?>" title="<?php echo $pro['name']; ?>"><?php echo $pro['name']; ?></a></h3>
                                </div>
                                <div class="products-left">
                                    <?php if ($pro['price'] && $pro['price'] > 0) { ?>
                                        <div class="price-products"><?php echo $pro['price_text']; ?></div>
                                    <?php } ?>
                                    <?php if ($pro['state']) { ?>
                                        <div class="status"><?php echo Yii::t('product', 'in_stock'); ?></div>
                                    <?php } ?>
                                </div>
                                <div class="products-right">
                                    <?php Yii::app()->controller->renderPartial('//partial/product_acction', array('pid' => $pro['id'])); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="wpager">
            <?php
            $this->widget('common.extensions.LinkPager.LinkPager', array(
                'itemCount' => $totalitem,
                'pageSize' => $limit,
                'header' => '',
                'selectedPageCssClass' => 'active',
            ));
            ?>
        </div>
    <?php } ?>