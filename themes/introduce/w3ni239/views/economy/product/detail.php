<?php
//
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/plugins/colorbox/jquery.colorbox-min.js');
//
?>
<script>
    thumb_img_w = 500;
    thumb_img_h = 500;
</script>
<div class="main-content clearfix">
    <div class="box-breadcrumb">
        <?php // $this->widget('common.widgets.modules.breadcrumb.breadcrumb'); ?>
        <ul class="breadcrumb">
            <li><a href="<?php echo Yii::t('url', 'product'); ?>" title="<?php echo $name ?>"><?php echo Yii::t('common', 'product'); ?></a></li>
            <li><a><?php echo $product['name']; ?></a></li>
        </ul>
    </div>
    <div class="detail-warper main-content-bg">
        <div class="product ">
            <div class="product-detail">
                <div class="product-detail-box">
                    <div class="product-detail-img clearfix">
                        <div>
                            <?php
                            $images = $model->getImages();
                            $first = reset($images);
                            ?>
                            <div class="product-img-main"> 
                                <a class="product-img-small product-img-large" href="<?php echo ClaHost::getImageHost() . $first['path'] . 's800_600/' . $first['name'] ?>">
                                    <img src="<?php echo ClaHost::getImageHost() . $first['path'] . 's500_500/' . $first['name'] ?>">
                                </a>
                            </div>
                            <?php if ($images && count($images)) { ?>
                                <div class="product-img-item">
                                    <ul>
                                        <?php foreach ($images as $img) { ?>
                                            <li>
                                                <a class="product-img-small" href="<?php echo ClaHost::getImageHost() . $img['path'] . 's800_600/' . $img['name']; ?>">
                                                    <img src="<?php echo ClaHost::getImageHost() . $img['path'] . 's50_50/' . $img['name']; ?>">
                                                </a>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            <?php } ?>
                        </div>
                    </div>

                    <div class="product-detail-info" id="product-detail-info">
                        <h2 class="product-info-title"> <?php echo $product['name'] ?> </h2>
                        <div class="product-info-col1">
                            <div class="product-description">
                                <?php if ($product['product_desc'] || $attributesShow && count($attributesShow)) { ?>
                                    <?php
                                    echo $product['product_desc'];
                                    ?>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_WIGET_BLOCK4)); ?>
    </div>
  
</div>
<script type="text/javascript">
    jQuery(document).ready(function () {
        jQuery(document).on('click', '.product-info-conf-list .product-info-conf-item a', function () {
            $(this).closest('.product-info-conf').find('.product-info-conf-list .product-info-conf-item a').removeClass('active');
            $(this).addClass('active');
            var dataInput = $(this).attr('data-input');
            if (dataInput) {
                $(this).closest('.product-info-conf').find('.attrConfig-input').val(dataInput);
            }
            return false;
        });
    });
</script>