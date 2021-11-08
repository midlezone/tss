<?php
//
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/plugins/colorbox/jquery.colorbox-min.js');
//
?>
 <script type="text/javascript" src="<?= $themUrl ?>/js/jquery-1.9.1.min.js"></script>			
 <style>
.arrange , .displayed,.categories4 { display: none; } 
</style>

 
<script>
    thumb_img_w = 380;
    thumb_img_h = 380;
</script>


<div class="product-detail">
    <div class="product-detail-box">
		
			 <?php
				$images = $model->getImages();
				$first = reset($images);
            ?>
			<div class="exzoom hidden" id="exzoom">
				<div class="exzoom_img_box">
					<ul class='exzoom_img_ul'>
					<?php if ($images == NULL) { ?>
							<li>
                                    <img src="<?php echo ClaHost::getImageHost() . $product['avatar_path'] . 's500_500/' . $product['avatar_name'] ?>">
							</li>
					<?php } ?>
					
						<?php foreach ($images as $img) { ?>
								 <li>
                                    <img src="<?php echo ClaHost::getImageHost() . $img['path'] . 's1000_1000/' . $img['name']; ?>">
								</li>
                        <?php } ?>
						
					</ul>
				</div>
				<div class="exzoom_nav"></div>
				
			</div>
		
		
        <div class="product-detail-info" id="product-detail-info">
            <h2 class="product-info-title"> <?php echo $product['name'] ?> </h2>
            <div class="product-info-col">
               
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
                <?php if ($product['product_sortdesc']) { ?>
                    <div class="product-detail-sortdesc">
                        <?php echo $product['product_sortdesc']; ?>
                    </div>
                <?php } ?>

                <?php // if ($product['price'] && $product['price'] > 0) { ?>
                <div class="product-info-state">
                    <label><?php echo Yii::t('common', 'state'); ?>:</label>
                    <span>Còn Hàng</span>
                </div>
                <p class="product-info-quantity">
                    <label><?php echo Yii::t('common', 'quantity'); ?>:</label>
                    <span class="product-detail-quantity">
                        <input type="number" name="qty" value="1" max-lenght="3" class="product_quantity" id="product_quantity" style="width: 40px;" min="1" step="1"/>
                    </span>
                </p>
                <div class="product-attr-error text-danger">
                    <span><?php echo Yii::t('product', 'please_choice') ?> </span><b></b>
                </div>
				 <?php if ($product['price'] && $product['price'] > 0) { ?>
                    <p class="product-price">
                        <span class="product-detail-price">
                            <?php echo $product['price_text']; ?>
                        </span>
                        <?php if ($product['include_vat']) { ?>
                            <span class="price-inclue-vat">
                                (<?php echo Yii::t('product', 'product_include_vat'); ?>)
                            </span>
                        <?php } ?>
                    </p>
                <?php } else { ?>
                    <p class="product-info-price">
                        <label><?php echo Yii::t('product', 'price'); ?>:</label>
                        <span class="product-detail-price">
                            <?php echo Product::getProductPriceNullLabel(); ?>

                        </span>
                    </p>
                <?php } ?>
                <?php if ($product['price_market'] && $product['price_market'] > 0) { ?>
                    <p class="product-detail-sortdesc">
                        <span><?php echo Yii::t('product', 'oldprice'); ?>:</span>
                        <span class="old-price">
                            <?php echo $product['price_market_text']; ?>
                        </span>
                    </p>
                <?php } ?>
                <?php if ($product['price_market'] && $product['price'] && $product['price'] < $product['price_market']) { ?>
                    <p class="product-detail-saving">
                        <span><?php echo Yii::t('product', 'saveprice'); ?>:</span>
                        <span class="saving-up">
                            <?php echo round((($product['price_market'] - $product['price']) / $product['price_market'] * 100), 0); ?>
                        </span>
                        <span>%</span>
                    </p>
                <?php } ?>
                <div class="purchaser">
                    <a href="<?php echo Yii::app()->createUrl('/economy/shoppingcart/add', array('pid' => $model->id)); ?>" class="a-btn">
                        <span class="a-btn-text"><?php echo Yii::t('shoppingcart', 'Thêm vào giỏ'); ?></span> 
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
                    <li class="active"><a data-toggle="tab" role="tab" href="#home1">Hướng dẫn sử dụng</a></li>
                    <li ><a data-toggle="tab" role="tab" href="#home3">Thông tin thêm</a></li>
                </ul>
                <div class="tab-content">
                    
					 <div id="home1" class="tab-pane active">
						
                        <?php
                        echo $product['product_exterior'];
                        ?>
                    </div>
					
					 <div id="home3" class="tab-pane">
						 <?php if ($attributesShow && count($attributesShow)) { ?>
                            <table class="table table-bordered">
                                <tbody>
                                    <?php
//                                    $attributesDynamic = AttributeHelper::helper()->getDynamicProduct($model, $attributesShow);
//                                    foreach ($attributesDynamic as $key => $item) {
//                                        if (is_array($item['value']) && count($item['value'])) {
//                                            $item['value'] = implode(", ", $item['value']);
//                                        }
//                                        if ($item['value'])
//                                            echo '<tr><td>' . $item['name'] . '</td><td>' . $item["value"] . '</td>';
//                                    }
                                    ?>      
                                </tbody>
                            </table>
                        <?php } ?>
                        <?php
                        echo $product['product_technical'];
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


<script type="text/javascript">

  $('.product-detail-box').imagesLoaded( function() {
  $("#exzoom").exzoom({
        autoPlay: false,
    });
  $("#exzoom").removeClass('hidden')
});

</script>



    <?php if (count($albums)) { ?>
        <div class="related" style="background: #feecec;">
            <div class="customer">
                    <div class="title clearfix">
                        <h2 style="font-size: 22px; margin-top: 16px;">Những cảm nhận thực tế từ khách hàng:</h2>
                    </div>
                <div class="cont">

                    <div id="owl-demo33" class="list grid">
                         <?php foreach ($albums as $album) { ?>
                            <div class="list-item" style="    padding-left: 30px;  padding-right: 30px;">
                                <div class="list-content clearfix">
                                    <div class="list-content-box">
                                        <div class="list-content-img list-content-img3" style="height: 469px;">
                                                <img  src="<?php echo ClaHost::getImageHost() . $album['path'] . 's500_500/' . $album['name']; ?>" />
                                        </div>
                                        <div class="list-content-body">
                                          
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>

    <?php } ?>


 <div class="purchaser1">
        <div class="selector-wrapper">
            <label for="quantity">Quantity</label>
            <select id="quantity" name="qty" class="small">
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
            </select>

        </div>
        <p class="product-price">
                <span class="product-detail-price">
                    <?php echo $product['price_text']; ?>
                </span>
               
            </p>
        <div>
            <a href="<?php echo Yii::app()->createUrl('/economy/shoppingcart/add', array('pid' => $model->id)); ?>" class="a-btn">
                <span class="a-btn-text">Mua hàng</span> 
            </a>
        </div>
    </div>

<script>
    $(document).ready(function () {
        var owl = $("#owl-demo33");
        owl.owlCarousel({
            itemsCustom: [
                [0, 1],
                [600, 1],
                [1000, 2],
                
            ],
            navigation: true,
            autoPlay: false,
        });
    });
</script>


<div class="yotpo yotpo-main-widget"
		data-product-id="<?php echo $model->id ?>"
		data-price="<?php echo $product['price'] ?>"
		data-currency="VNĐ"
		data-name="<?php echo $product['name'] ?>"
		data-url="<?php echo ClaHost::getImageHost() . $first['path'] . 's800_600/' . $first['name'] ?>"
		data-image-url="<?php echo ClaHost::getImageHost() . $first['path'] . 's500_500/' . $first['name'] ?>"
		data-description="">
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
 <?php
            $themUrl = Yii::app()->theme->baseUrl;
            $cs = Yii::app()->getClientScript();
            Yii::app()->clientScript->registerCoreScript('jquery');
            ?>
<link href='<?php echo $themUrl ?>/css/lightslider.css' rel='stylesheet' type='text/css' />
<script src="http://sachinchoolur.github.io/lightslider/dist/js/lightslider.js"></script>
<script>
	$('#lightSlider').lightSlider({
		gallery: true,
		item: 1,
		loop:true,
		slideMargin: 0,
		thumbItem: 9
	});
	$( "#quantity" ).change(function() {
	  var val = $( "#quantity" ).val();
	  var href = $('.a-btn').attr('href');
	  var test = $('.a-btn').attr("href", href + "/qty/"+val);
	});
	

	$(".main-nav-store-link").css("display", "block");
	$(".menuMain").css("display", "none");

</script>
