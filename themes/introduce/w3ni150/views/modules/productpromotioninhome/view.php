<?php
if (!Yii::app()->request->isAjaxRequest) {
    if (!defined("SCRIPT_JCAROUSEL")) {
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . "/js/plugins/jcarousel/dist/jquery.jcarousel.min.js", CClientScript::POS_END);
        define("SCRIPT_JCAROUSEL", true);
    }
}
$id = 'promotion-in-home';
$time = 4000;
Yii::app()->clientScript->registerScript($id, ''
        . "
                                var id = (jQuery('#" . $id . "').length)?'#" . $id . " ':'';
                                var jcarousel = $(id+'.jcarousel').jcarousel({wrap: 'circular'}); 
                                $(id+'.jcarousel').jcarouselAutoscroll({autostart: true,interval: " . $time . ",target: '+=1'});
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
            });", CClientScript::POS_END);
?>
<?php if (count($data)) { ?>
    <div id="<?php echo $id; ?>">
        <?php foreach ($data as $promotion) { ?>
            <div class="box-js-top">
                <div class="main-list">
                    <div class="border-list">
                        <h2> 
                            <span class="title-list-list"><?php echo $promotion['name']; ?></span>
                            <span class="more-a"> <a href="<?php echo $promotion['link']; ?>"><?php echo Yii::t('common', 'viewall'); ?></a></span>
                        </h2>
                    </div><!--end-border-list-->
                    <hr>
                </div><!--end-main-list-->
                <?php if ($promotion['products'] && count($promotion['products'])) { ?>
                    <div class="js">
                        <div class="jcarousel-wrapper">
                            <a class="jcarousel-control-next" href="#" data-jcarouselcontrol="true"></a>
                            <a class="jcarousel-control-prev" href="#" data-jcarouselcontrol="true"></a>
                            <div class="jcarousel" data-jcarousel="true" data-jcarouselautoscroll="true">
                                <ul>
                                    <?php foreach ($promotion['products'] as $product) { ?>
                                        <li>
                                            <a href="<?php echo $product['link']; ?>" title="<?php echo $product['name']; ?>">
                                                <?php if ($product['avatar_path'] && $product['avatar_name']) { ?>
                                                    <img src="<?php echo ClaHost::getImageHost() . $product['avatar_path'] . 's200_200/' . $product['avatar_name'] ?>" alt="<?php echo $product['name'] ?>">
                                                <?php } ?>
                                                <div class="nd-banner">
                                                    <p><?php echo $product['name']; ?></p>
                                                    <div class="product-price-all">
                                                        <?php if ($product['price_market'] && $product['price_market'] > 0) { ?>
                                                            <div class="product-price-market">
                                                                <?php echo Yii::t('product', 'oldprice'); ?>:
                                                                <?php echo $product['price_market_text']; ?>
                                                            </div>
                                                        <?php } ?>
                                                        <?php if ($product['price'] && $product['price'] > 0) { ?>
                                                            <div class="product-price">
                                                                <?php echo Yii::t('product', 'price'); ?>:
                                                                <?php echo $product['price_text']; ?>
                                                            </div>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </a>
                                            <?php if ($product['price_market'] && $product['price'] && $product['price_market'] > 0) { ?>
                                                <?php $percent = round((($product['price'] - $product['price_market']) / $product['price_market']) * 100, 1); ?>
                                                <?php if ($percent) { ?>
                                                    <div class="sale new">
                                                        <a href="">
                                                            <?php echo $percent; ?>
                                                            %
                                                        </a>
                                                    </div>
                                                <?php } ?>
                                            <?php } ?>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div><!--end-jcarousel-->
                        </div><!--end-jcarousel-wrapper-->
                    </div><!--end-js-->
                <?php } ?>
            </div>
        <?php } ?>
    </div>
<?php } ?>