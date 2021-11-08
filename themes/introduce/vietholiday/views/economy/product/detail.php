<?php
//
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/plugins/colorbox/jquery.colorbox-min.js');
//
?>
<script>
    thumb_img_w = 380;
    thumb_img_h = 380;
</script>
<div class="product-detail">
    <div class="product-detail-box">
        <div class="product-detail-img">
            <?php
            $images = $model->getImages();
            $first = reset($images);
            ?>
            <div class="product-img-main"> 
                <a class="product-img-small product-img-large" href="<?php echo ClaHost::getImageHost() . $first['path'] . 's800_600/' . $first['name'] ?>">
                    <img src="<?php echo ClaHost::getImageHost() . $first['path'] . 's380_380/' . $first['name'] ?>">
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
        <div class="product-detail-info" id="product-detail-info">
            <h2 class="product-info-title"> <?php echo $product['name'] ?> </h2>
            <div class="product-info-col1">

              <div class="tour-addon" style="margin-left:-15px; padding-top:5px;padding-bottom:10px;font-size:14px;">
						<span class="duration icon-location5" style="    border-right: 1px solid #FFF;">Khởi hành từ: Hà Tĩnh</span></br>
						<!-- thoi gian tour -->
						<span class="duration icon-clock5">Thời gian: 
						<?php echo $product['code'] ?></span>
						<!-- phuong tien van chuyen -->
						<span class="transport">Phương tiện: 
						<span class="hint--top hint--rounded" data-hint="Máy bay"><i class="icn icon-plane text-blue"></i></span><span class="hint--top hint--rounded" data-hint="Ô tô"><i class="icn icon-bus text-blue"></i></span></span>
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

                <?php // if ($product['price'] && $product['price'] > 0) { ?>
                    <p class="product-info-price">
                        <label><?php echo Yii::t('product', 'price'); ?>:</label>
                        <span class="product-detail-price">
                          Liên Hệ
                        </span>
                    </p>
                   
                    <div class="product-attr-error text-danger">
                        <span><?php echo Yii::t('product', 'please_choice') ?> </span><b></b>
                    </div>
                    <div class="CartActionAdd1 ProductActionAdd">
                        <a href="<?php echo Yii::app()->createUrl('/dat-tour-pde,3666'); ?>" class="btn">
                            <span class="a-btn-text">Đặt Tour</span> 
                            <span class="a-btn-icon-right"><span></span></span>
                        </a>
                    </div>
                <?php // } ?>
            </div>
            <!--            <div class="product-info-col2">
                        </div>-->
        </div>
    </div>
    <div class="product-detail-more">
            <div class="tab">
                <ul role="tablist" class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" role="tab" href="#home"><?php echo 'Lịch Trình'; ?></a></li>
					<li ><a data-toggle="tab" role="tab" href="#home1"><?php echo 'Giá Bao Gồm'; ?></a></li>
                </ul>
                <div class="tab-content">
                    <div id="home" class="tab-pane fade active">
                        <?php if ($attributesShow && count($attributesShow)) { ?>
                            <table class="table table-bordered">
                                <tbody>
                                    <?php
                                    $attributesDynamic = AttributeHelper::helper()->getDynamicProduct($model, $attributesShow);
                                    foreach ($attributesDynamic as $key => $item) {
                                        if (is_array($item['value']) && count($item['value'])) {
                                            $item['value'] = implode(", ", $item['value']);
                                        }
                                        if ($item['value'])
                                            echo '<tr><td>' . $item['name'] . '</td><td>' . $item["value"] . '</td>';
                                    }
                                    ?>      
                                </tbody>
                            </table>
                        <?php } ?>
                        <?php
                        echo $product['product_desc'];
                        ?>
                    </div>
					 <div id="home1" class="tab-pane fade">
                        <?php if ($attributesShow && count($attributesShow)) { ?>
                            <table class="table table-bordered">
                                <tbody>
                                    <?php
                                    $attributesDynamic = AttributeHelper::helper()->getDynamicProduct($model, $attributesShow);
                                    foreach ($attributesDynamic as $key => $item) {
                                        if (is_array($item['value']) && count($item['value'])) {
                                            $item['value'] = implode(", ", $item['value']);
                                        }
                                        if ($item['value'])
                                            echo '<tr><td>' . $item['name'] . '</td><td>' . $item["value"] . '</td>';
                                    }
                                    ?>      
                                </tbody>
                            </table>
                        <?php } ?>
						
                        <?php
                        echo nl2br($product['product_sortdesc']);
                        ?>
                    </div>
                </div>
            </div>
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