<?php
//
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/plugins/colorbox/jquery.colorbox-min.js');
//
?>
<script>
    init_jssor_slider2 = function (containerId) {
        var options = {
            $AutoPlay: false, //[Optional] Whether to auto play, to enable slideshow, this option must be set to true, default value is false
            $SlideDuration: 500, //[Optional] Specifies default duration (swipe) for slide in milliseconds, default value is 500

            $ThumbnailNavigatorOptions: {//[Optional] Options to specify and enable thumbnail navigator or not
                $Class: $JssorThumbnailNavigator$, //[Required] Class to create thumbnail navigator instance
                $ChanceToShow: 2, //[Required] 0 Never, 1 Mouse Over, 2 Always

                $Lanes: 2, //[Optional] Specify lanes to arrange thumbnails, default value is 1
                $SpacingX: 14, //[Optional] Horizontal space between each thumbnail in pixel, default value is 0
                $SpacingY: 12, //[Optional] Vertical space between each thumbnail in pixel, default value is 0
                $DisplayPieces: 6, //[Optional] Number of pieces to display, default value is 1
                $ParkingPosition: 156, //[Optional] The offset position to park thumbnail
                $Orientation: 2                                //[Optional] Orientation to arrange thumbnails, 1 horizental, 2 vertical, default value is 1
            }
        };

        var jssor_slider1 = new $JssorSlider$(containerId, options);
    };
</script>

<div class="box-top-ct">
    <div class="container">
        <div class="row">
            <div class="col-xs-8">
                <div class="box-view-img">
                    <?php
                    $images = $model->getImages();
                    ?>
                    <div class="box-img-large"> 
                        <a href="<?php echo $product['link'] ?>" title="<?php echo $product['name'] ?>"> 
                            <img alt="<?php echo $product['name']; ?>" src="<?php echo ClaHost::getImageHost() . $product['avatar_path'] . $product['avatar_name'] ?>" alt="<?php echo $product['name'] ?>">
                        </a> 
<!--                        <a onclick="javascript:void(0);
                                return false;" href="<?php echo ClaHost::getImageHost() . $first['path'] . $first['name'] ?>">
                            <img src="<?php echo ClaHost::getImageHost() . $first['path'] . $first['name'] ?>">
                        </a>-->
                    </div>
                </div>
            </div>
            <div class="col-xs-4">
                <div class="box-top">
                    <div class="title-sp">
                        <h3><a onclick="javascript:void(0)" title="<?php echo $product['name'] ?>"><?php echo $product['name'] ?></a></h3>
                    </div>
                    <?php if ($product['state']) { ?>
                        <div class="tinhtrang"> 
                            <span><?php echo Yii::t('common', 'state') ?>: </span>
                            <span class="hientai"><?php echo Yii::t('product', 'in_stock') ?></span> 
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
                        <a class="addtocart noredirect a-btn" href="<?php echo Yii::app()->createUrl('/economy/shoppingcart/add', array('pid' => $product['id'])); ?>">
                            <span class="a-btn-text">MUA HÀNG</span> 
                            <span class="a-btn-icon-right"><span></span></span>
                        </a>
                    </div>
                    <div class="clear"></div>
                    <?php
                    $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_DETAIL_BLOCK1));
                    ?>
                    <div class="gift">
                        <?php
                        $array_sortdesc = preg_split('/\n|\r\n/', $product['product_sortdesc']);
                        if (count($array_sortdesc)) {
                            ?>
                            <ul>
                                <?php foreach ($array_sortdesc as $it) { ?>
                                    <li>
                                        <a title="<?php echo $it; ?>"><?php echo $it; ?></a>
                                    </li>
                                <?php } ?>
                            </ul>
                        <?php } ?>
                    </div>
                </div>
                <?php
                $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_RIGHT));
                ?>

            </div>
        </div>
    </div>
</div>

<div class="cont-ct">
    <div class="container">
        <?php
        $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_SOCIAL));
        ?>
        <div class="product-detail-more">
            <div class="row">
                <div class="col-xs-8">
                    <div class="tab">
                        <ul role="tablist" class="nav nav-tabs">
                            <li class="active"><a class="searchbychar"  data-toggle="tab" role="tab" data-target="thong-so-ky-thuat" href="javascript:void(0)">Thông số kỹ thuật</a></li>
                            <li class=""><a class="searchbychar" href="javascript:void(0)" data-target="product_detail_gallery">Hình ảnh sản phẩm</a></li>
                            <li class=""><a class="searchbychar"  data-toggle="tab" role="tab" href="javascript:void(0)" data-target="binhluan">Bình luận</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="thong-so-ky-thuat" class="tab-pane fade active">
                                <div class="thongso">
                                    <?php if ($attributesShow && count($attributesShow)) { ?>
                                        <ul class="parametdesc">
                                            <?php
                                            $attributesDynamic = AttributeHelper::helper()->getDynamicProduct($model, $attributesShow);
                                            foreach ($attributesDynamic as $key => $item) {
                                                if (is_array($item['value']) && count($item['value'])) {
                                                    $item['value'] = implode(", ", $item['value']);
                                                }
                                                if ($item['value'])
                                                    echo '<li><span>' . $item['name'] . '</span><strong>' . $item["value"] . '</strong></li>';
                                            }
                                            ?> 
                                        </ul>
                                    <?php } ?>
                                    <?php
                                    echo $product['product_desc'];
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-xs-4">
                    <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK7)); ?>
                </div>
            </div>
            <div id="product_detail_gallery" class="box-right video">
                <div class="title">
                    <h2>Hình ảnh sản phẩm</h2>
                </div>
                <div class="cont">
                    <?php if ($images && count($images)) { ?>
                        <div id="slider2_container" style="position: relative; padding: 0px; margin: 0 auto; top: 0px; left: 0px; width: 1080px;
                             height: 550px; background: #24262e;">

                            <div u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width: 840px; height: 550px; overflow: hidden;background-color: #ffffff;">
                                <?php foreach ($images as $img) { ?>
                                    <div>
                                        <img u="image" src="<?php echo ClaHost::getImageHost() . $img['path'] . 's800_600/' . $img['name']; ?>">
                                        <img u="thumb" src="<?php echo ClaHost::getImageHost() . $img['path'] . 's100_100/' . $img['name']; ?>">
                                    </div>
                                <?php } ?>
                            </div>

                            <div u="thumbnavigator" class="jssort06" style="right: 0px; bottom: 0px;">
                                <!-- Thumbnail Item Skin Begin -->
                                <div u="slides" style="cursor: default;">
                                    <div u="prototype" class="p">
                                        <div class="o">
                                            <div u="thumbnailtemplate" class="b"></div>
                                            <div class="i"></div>
                                            <div u="thumbnailtemplate" class="f"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <script>
                                init_jssor_slider1("slider1_container");
                            </script>
                        </div>
                    <?php } ?>
                    <div u="thumbnavigator" class="jssort06" style="right: 0px; bottom: 0px;">
                        <div u="slides" style="cursor: default;">
                            <div u="prototype" class="p">
                                <div class="o">
                                    <div u="thumbnailtemplate" class="b"></div>
                                    <div class="i"></div>
                                    <div u="thumbnailtemplate" class="f"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div id="binhluan">
            <?php
            $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_FACEBOOK_COMMENT));
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
    </div>
</div>
<script>
    init_jssor_slider2("slider2_container");
    $(document).on('click', '.searchbychar', function (event) {
        event.preventDefault();
        var target = "#" + this.getAttribute('data-target');
        $('html, body').animate({
            scrollTop: $(target).offset().top
        }, 1000);
    });
</script>

