<?php
//
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/plugins/colorbox/jquery.colorbox-min.js');
//
?>
<div class="product-detail">
    <div class="product-detail-box">
        <div class="product-detail-info" id="product-detail-info">
            <h2 class="product-info-title"> <?php echo $product['name'] ?> </h2>
        </div>
        <div class="product-detail-img">
            <?php
            $images = $model->getImages();
            $first = reset($images);
            ?>
            <div class="product-img-main"> 
                <a class="product-img-small product-img-large" href="<?php echo ClaHost::getImageHost() . $first['path'] . 's800_600/' . $first['name'] ?>">
                    <img src="<?php echo ClaHost::getImageHost() . $first['path'] . 's330_330/' . $first['name'] ?>">
                </a>
            </div>
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
        </div>
    </div>
    <div class="product-detail-more">
        <?php if ($product['product_desc']) { ?>
            <div class="tab">
                <ul role="tablist" class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" role="tab" href="#home"><?php echo Yii::t('common','information_detail'); ?></a></li>
                </ul>
                <div class="tab-content">
                    <div id="home" class="tab-pane fade active">
                        <?php
                        echo $product['product_desc'];
                        ?>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>