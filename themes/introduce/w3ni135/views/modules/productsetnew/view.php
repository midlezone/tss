<?php
if (!Yii::app()->request->isAjaxRequest) {
    if (!defined("SCRIPT_JCAROUSEL")) {
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . "/js/plugins/jcarousel/dist/jquery.jcarousel.min.js", CClientScript::POS_END);
        define("SCRIPT_JCAROUSEL", true);
    }
}
$id = 'product-in-home';
$time = 4000;
?>
<?php if (count($products)) { ?>
    <div class="center-main-center product-new" id="product-in-home"> 
        <div class="title-main">
            <?php if ($show_widget_title) { ?>
                <h3><?php echo $widget_title; ?></h3>
            <?php } ?>
        </div><!--end-main-list-->
        <div class="jcarousel-wrapper list grid">            
            <a class="jcarousel-control-next" href="#" data-jcarouselcontrol="true"></a>
            <a class="jcarousel-control-prev" href="#" data-jcarouselcontrol="true"></a>
            <div class="jcarousel" data-jcarousel="true" data-jcarouselautoscroll="true">
                <ul>
                <?php
                $i=0;
                foreach ($products as $product) {
                    $i++;?>
                    <li>
                        <div class="list-item <?php echo ($i%4==0)?"last-item":'';?>">
                            <div class="list-content">
                                <div class="list-content-box">
                                    <div class="list-content-img">
                                        <a href="<?php echo $product['link']; ?>">
                                            <img src="<?php echo ClaHost::getImageHost() . $product['avatar_path'] . 's220_220/' . $product['avatar_name'] ?>">
                                        </a>
                                        <div class="over-hover">                                
                                            <a class="btn-mr" href="<?php echo $product['link']; ?>">Read More</a>
                                        </div>
                                    </div>
                                    <div class="list-content-body">
                                        <span class="list-content-title">
                                            <a href="<?php echo $product['link']; ?>" title="<?php echo $product['name']; ?>" style="text-overflow:ellipsis;">
                                                <?php echo $product['name']; ?>
                                            </a>
                                        </span>
                                        <?php if ($product['price_market'] && $product['price_market'] > 0) { ?>
                                            <div class="product-price-market">
                                                <?php echo Yii::t('product', 'oldprice'); ?>:
                                                <?php echo $product['price_market_text']; ?>
                                            </div>
                                        <?php } ?>
                                        <?php if ($product['price'] && $product['price'] > 0) { ?>
                                            <div class="product-price">
                                                <label><?php echo Yii::t('product', 'price'); ?>: </label>
                                                <span><?php echo $product['price_text']; ?></span>
                                            </div>
                                        <?php } ?>
                                    </div>                            
                                </div>
                            </div>
                        </div>
                    </li>
                <?php } ?>
                </ul>
            </div>    
        </div><!--end-list-gird-->
    </div>
<script>
    jQuery(function(){
        $(".product-new .list-content-box" ).hover(
            function() {
                $( this ).addClass("box-hover");
            }, function() {
                $( this ).removeClass( "box-hover" );
            }
        );
        var id = (jQuery('#product-in-home').length)?'#product-in-home ':'';
        var jcarousel = $(id+'.jcarousel').jcarousel({wrap: 'circular'}); 
        $(id+'.jcarousel').jcarouselAutoscroll({autostart: true,interval:4000,target: '+=1'});
            $(id+'.jcarousel-control-prev').on('jcarouselcontrol:active', function() {
                $(this).removeClass('inactive');
            })
            .on('jcarouselcontrol:inactive', function() {
                $(this).addClass('inactive');
            })
            .jcarouselControl({
                target: '-=1'
            });

        $(id+'.jcarousel-control-next')
            .on('jcarouselcontrol:active', function() {
                $(this).removeClass('inactive');
            })
            .on('jcarouselcontrol:inactive', function() {
                $(this).addClass('inactive');
            })
            .jcarouselControl({
                target: '+=1'
            })
    })
</script>
<?php } ?>