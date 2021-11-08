<?php
//
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/plugins/colorbox/jquery.colorbox-min.js');
//
?>

<div class="col-sm-8">
    <div class="left">
        <div class="box-view-img">
            <?php
            $images = $model->getImages();
            $first = reset($images);
            ?>
            <div class="box-img-large">
                <a onclick="javascript:void(0); return false;" href="<?php echo ClaHost::getImageHost() . $first['path'] . 's800_600/' . $first['name'] ?>">
                    <img src="<?php echo ClaHost::getImageHost() . $first['path'] . 's500_500/' . $first['name'] ?>">
                </a>
            </div>
            <?php if ($images && count($images)) { ?>
                <div class="box-item">
                    <ul class="clearfix">
                        <?php foreach ($images as $img) { ?>
                            <li>
                                <a onclick="javascript:void(0); return false;" href="<?php echo ClaHost::getImageHost() . $img['path'] . 's800_600/' . $img['name']; ?>">
                                    <img src="<?php echo ClaHost::getImageHost() . $img['path'] . 's80_80/' . $img['name']; ?>">
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            <?php } ?>
        </div>
        <div class="box-top mobile">
            <div class="title-sp">
                <h3><a onclick="javascript:void(0)" title="<?php echo $product['name'] ?>"><?php echo $product['name'] ?></a></h3>
            </div>
            <?php if ($product['state']) { ?>
                <div class="tinhtrang">
                    <span><?php echo Yii::t('common', 'state') ?>: </span><span class="hientai"><?php echo Yii::t('product', 'in_stock'); ?></span>
                </div>
            <?php } ?>
            <div class="product-price">
                <?php if ($product['price'] && $product['price'] > 0) { ?>
                    <div class="product-detail-price">
                        <span><?php echo Yii::t('product', 'price') ?>: </span><?php echo $product['price_text']; ?>
                    </div>
                <?php } ?>
                <?php if ($product['price_market'] && $product['price_market'] > 0) { ?>
                    <div class="product-detail-sortdesc">
                        <span><?php echo Yii::t('product', 'oldprice') ?>: </span><?php echo $product['price_market_text']; ?>
                    </div>
                <?php } ?>
            </div>
            <div class="purchaser">
                <a href="<?php echo Yii::app()->createUrl('/economy/shoppingcart/add', array('pid' => $model->id)); ?>" class="a-btn">
                    <span class="a-btn-text">MUA HÀNG</span> 
                    <span class="a-btn-icon-right"><span></span></span>
                </a>
            </div>
            <div class="clear"></div>
        </div>
        <div class="product-detail-more">
            <div class="tab">
                <ul role="tablist" class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" role="tab" href="#home" aria-expanded="true">Chi tiết sản phẩm</a></li>
                </ul>

                <div class="tab-content">
                    <div id="home" class="tab-pane fade active in">
                        <?php
                        echo $product['product_desc'];
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_FACEBOOK_COMMENT)); ?>
    </div>
</div>
<div class="col-sm-4">
    <div class="right">
        <div class="box-top product-detail-info" id="product-detail-info">
            <div class="title-sp">
                <h3><a onclick="javascript:void(0)" title="<?php echo $product['name'] ?>"><?php echo $product['name'] ?></a></h3>
            </div>
            <?php if ($product['state']) { ?>
                <div class="tinhtrang">
                    <span><?php echo Yii::t('common', 'state') ?>: </span><span class="hientai"><?php echo Yii::t('product', 'in_stock'); ?></span>
                </div>
            <?php } ?>
            <div class="product-price">
                <?php if ($product['price'] && $product['price'] > 0) { ?>
                    <div class="product-detail-price">
                        <span><?php echo Yii::t('product', 'price') ?>: </span><?php echo $product['price_text']; ?>
                    </div>
                <?php } ?>
                <?php if ($product['price_market'] && $product['price_market'] > 0) { ?>
                    <div class="product-detail-sortdesc">
                        <span><?php echo Yii::t('product', 'oldprice') ?>: </span><?php echo $product['price_market_text']; ?>
                    </div>
                <?php } ?>
            </div>
            <?php
            // Lấy và hiển thị các attribute có  thuộc tính tùy chọn
            $configurableFilter = AttributeHelper::helper()->getConfiguableFilter($category['attribute_set_id'], $product);
            if ($configurableFilter && count($configurableFilter)) {
                ?>
                <?php
                foreach ($configurableFilter as $config) {
                    $countCf = count($config['configuable']);
                    $cfValue = '';
                    if (isset($config['configuable']) && $countCf) {
                        ?>
                        <div class="product-info-conf product-attr" attr-title="<?php echo $config['name']; ?>">
                            <label><?php echo $config['name']; ?>:</label>
                            <div class="product-info-conf-list">
                                <?php
                                foreach ($config['configuable'] as $cf) {
                                    ?>
                                    <div class="product-info-conf-item product-attr-item">
                                        <a href="#" data-input="<?php echo $cf['value']; ?>" title="<?php echo $cf['name']; ?>" class="<?php if ($countCf == 1) echo 'active'; ?>">
                                            <?php echo $cf['text']; ?>
                                        </a>
                                    </div>
                                    <?php
                                }
                                if ($countCf == 1)
                                    $cfValue = $cf['value'];
                                ?>
                            </div>
                            <?php
                            echo CHtml::hiddenField(ClaShoppingCart::PRODUCT_ATTRIBUTE_CONFIGURABLE_KEY . '[' . $config['id'] . ']', $cfValue, array('class' => 'attrConfig-input'));
                            ?>
                        </div>
                        <?php
                    }
                }
                ?>
            <?php } ?>
            <div class="purchaser">
                <a class="addtocart noredirect a-btn" data-params="#product-detail-info" href="<?php echo Yii::app()->createUrl('/economy/shoppingcart/add', array('pid' => $model->id)); ?>" >
                    <span class="a-btn-text">MUA HÀNG</span> 
                    <span class="a-btn-icon-right"><span></span></span>
                </a>
            </div>
            <div class="clear"></div>
        </div>

        <?php
        $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_RIGHT));
        ?>
        <?php
        $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_WIGET_BLOCK7));
        ?>

    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        jQuery(document).on('click', '.product-info-conf-list .product-info-conf-item a', function () {
            $(this).closest('.product-info-conf').find('.product-info-conf-list .product-info-conf-item a').removeClass('active');
            $(this).addClass('active');
            var dataInput = $(this).attr('data-input');
            if (dataInput) {
                $(this).closest('.product-info-conf').find('.attrConfig-input').val(dataInput);
            }
            return false;
        });
        
        
        $('.box-item ul li').hover(function () {
            var img_src = $(this).find('a').attr('href');
            console.log(img_src)
            $('.box-img-large a').attr('href', img_src);
            $('.box-img-large img').attr('src', img_src);
        }, function () {

        });
    });
</script>
