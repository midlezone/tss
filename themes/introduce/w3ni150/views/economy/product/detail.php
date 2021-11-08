<?php
//var_dump(ClaSite::isMobile());
//

if (!ClaSite::isMobile()) {
    Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/plugins/colorbox/jquery.colorbox-min.js');
Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/js/elevatezoom/elevateZoom.min.js');
    Yii::app()->clientScript->registerScript('elevatezoom', '
    function zoomImage(){
        jQuery(".zoomContainer").remove();
        jQuery(".product-img-main img").elevateZoom({
            zoomType: "window",
            cursor: "pointer",
            borderSize:0,
            borderColour:"#CCC",
            zoomWindowWidth:380,
            zoomWindowHeight: 400
        });
   };
   zoomImage();
    jQuery(".product-detail .product-detail-img a.product-img-small").on("mouseover",function(){
        var href = jQuery(this).attr("href");
            var src = jQuery(this).find("img").attr("src");
            var thumb = jQuery(this).find("img").attr("data-thumb-image");
            var zoomImg = jQuery(this).find("img").attr("data-zoom-image");
            if (href) {
                var clo = jQuery(this).closest(".product-detail-img");
                clo.find(".product-img-main a.product-img-large").attr("href", href);
                var imgthumb = clo.find(".product-img-main a.product-img-large img");
                //
                if (!thumb)
                    imgthumb.attr("src", src.replace("\/s50_50\/", "\/s500_500\/"));
                else
                    imgthumb.attr("src", thumb);
                if(zoomImg){
                    imgthumb.attr("data-zoom-image", zoomImg);
                    //
                    var ez = jQuery(".product-img-main img").data("elevateZoom");
                    ez.swaptheimage(thumb,zoomImg);
                    //
                }
            }
            return false;
});
', ClientScript::POS_END);
}
else {
    Yii::app()->clientScript->registerScript('elevatezoom1', '
    
    jQuery(".product-detail .product-detail-img a.product-img-small").on("click",function(){
//    return false;
        var href = jQuery(this).attr("href");
            var src = jQuery(this).find("img").attr("src");
            var thumb = jQuery(this).find("img").attr("data-thumb-image");
            if (href) {
                var clo = jQuery(this).closest(".product-detail-img");
                clo.find(".product-img-main a.product-img-large").attr("href", href);
                var imgthumb = clo.find(".product-img-main a.product-img-large img");
                //
                if (!thumb)
                    imgthumb.attr("src", src.replace("\/s50_50\/", "\/s500_500\/"));
                else
                    imgthumb.attr("src", thumb);
            }
            return false;
});
', ClientScript::POS_END);

}
?>
<div class="row">
    <div class="col-md-5 detail ">
        <div class="product-detail">
            <div class="product-detail-box">
                <div class="product-detail-img">
                    <?php
                    $images = $model->getImages();
                    $first = reset($images);
                    ?>
                    <div class="clearfix">
                        <div class="product-img-main"> 
                            <?php // if (!ClaSite::isMobile()) { ?>
                                <a class="product-img-small product-img-large" href="<?php echo ClaHost::getImageHost() . $first['path'] . 's800_600/' . $first['name'] ?>">
                                <?php // } ?>
                                <img src="<?php echo ClaHost::getImageHost() . $first['path'] . 's500_500/' . $first['name'] ?>" data-zoom-image="<?php echo ClaHost::getImageHost() . $first['path'] . 's1000_1000/' . $first['name']; ?>" />
                                <?php // if (!ClaSite::isMobile()) { ?>
                                </a>
                            <?php // } ?>
                        </div>
                        <div class="product-img-item">
                            <ul>
                                <?php foreach ($images as $img) { ?>
                                    <li>
                                        <?php // if (!ClaSite::isMobile()) { ?>
                                            <a class="product-img-small" href="<?php echo ClaHost::getImageHost() . $img['path'] . 's800_600/' . $img['name']; ?>">
                                            <?php // } ?>
                                            <img src="<?php echo ClaHost::getImageHost() . $img['path'] . 's50_50/' . $img['name']; ?>" data-thumb-image="<?php echo ClaHost::getImageHost() . $img['path'] . 's500_500/' . $img['name']; ?>" data-zoom-image="<?php echo ClaHost::getImageHost() . $img['path'] . 's1000_1000/' . $img['name']; ?>"/>
                                            <?php // if (!ClaSite::isMobile()) { ?>
                                            </a>
                                        <?php // } ?>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                    <div class="content-block">
                        <?php
                        $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK1));
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-7 detail ">
        <div class="product-detail-info clearfix">
            <h2><?php echo $product['name'] ?></h2>
        </div>

        <div class="product-detail-more">
            <div class="tab">
                <ul role="tablist" class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" role="tab" href="#home">thông tin cơ bản</a></li>
                    <li class=""><a data-toggle="tab" role="tab" href="#home1">Chi Tiết Sản Phẩm</a></li>
                </ul>
                <div class="tab-content clearfix">
                    <div id="home" class="tab-pane fade active">
                        <div class="col-md-6 information">
                            <?php if ($product['price_market'] && $product['price_market'] > 0) { ?>
                                <p><label>Giá thị trường: </label><span class="product-detail-price-market"> <?php echo $product['price_market_text'] ?></span></p>
                            <?php } ?>
                            <?php if ($product['price'] && $product['price'] > 0) { ?>
                                <p><label>Tại Ngọc Lan: </label><span class="product-detail-price"> <?php echo $product['price_text'] ?></span></p>
                            <?php } ?>
                            <?php if ($product['price'] != $product['price_market'] && $product['price_market'] > 0 && $product['price'] > 0) { ?>    
                                <p><label>Tiết kiệm: </label><span class="product-detail-price-of"> <?php echo Product::getPriceText($product, 'discount'); ?></span></p>
                            <?php } ?>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tbody>
                                        <?php if ($product['code']) { ?>
                                            <tr>
                                                <td>Mã sản phẩm:</td><td><?php echo $product['code']; ?></td>
                                            </tr>
                                        <?php } ?>
                                        <?php
                                        if ($attributesShow && count($attributesShow)) {
                                            $attributesDynamic = AttributeHelper::helper()->getDynamicProduct($model, $attributesShow);
                                            foreach ($attributesDynamic as $key => $item) {
                                                if (is_array($item['value']) && count($item['value'])) {
                                                    $item['value'] = implode(", ", $item['value']);
                                                }
                                                if ($item['value'])
                                                    echo '<tr><td>' . $item['name'] . ':</td><td>' . $item["value"] . '</td>';
                                            }
                                        }
                                        ?>      
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-6 information-right">
                            <?php if ($product['product_sortdesc']) { ?>
                                <div class="product-nd-chitiet">
                                    <p class="product-detail-sortdesc">
                                        <?php echo nl2br($product['product_sortdesc']); ?>
                                    </p>
                                </div>
                            <?php } ?>
                            <?php
                            $promotion = $model->getPromotion();
                            if ($promotion && count($promotion)) {
                                ?>
                                <div class="product-gif">
                                    <strong><?php echo $promotion['name']; ?></strong>
                                    <div class="box-product-gif-time">
                                        <span>
                                            <?php echo $promotion['sortdesc']; ?>
                                        </span>
                                        <div class="time-product">
                                            <strong>Thời gian còn:</strong>
                                            <div class="time-list-product">
                                                <?php
                                                $this->widget('common.extensions.flipClock.flipClock', array(
                                                    'element' => '.time-list-product',
                                                    'time' => $promotion['enddate'] - time(),
                                                    'language' => Yii::app()->language,
                                                ));
                                                ?>
                                            </div><!--end-time-list-product-->
                                        </div><!--end-time-product-->
                                    </div><!--end-time-product-->
                                </div><!--end-product-gif-->
                            <?php } ?>
                            <div class="clear"></div>
                            <div class="more-widget">
                                <?php
                                $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK2));
                                ?>
                            </div>
                        </div>
                    </div>
                    <div id="home1" class="tab-pane fade">
                        <?php
//                        if ($product['product_desc']) {
                            echo $product['product_desc'];
//                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        
        <?php if ($product['price'] && $product['price'] > 0) { ?>
                                <a class="addcart cart" title="Thêm vào giỏ hàng" href="<?php echo Yii::app()->createUrl('/economy/shoppingcart/add', array('pid' => $model->id)); ?>">
                                    <span>Thêm vào giỏ hàng</span>
                                </a>
                            <?php } ?>
    </div>
</div>