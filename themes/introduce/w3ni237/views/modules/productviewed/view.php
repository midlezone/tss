<?php if ($products && count($products)) { ?>
    <?php
    if (!Yii::app()->request->isAjaxRequest) {
        if (!defined("SCRIPT_JCAROUSEL")) {
            Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . "/js/plugins/jcarousel/dist/jquery.jcarousel.min.js", CClientScript::POS_END);
            define("SCRIPT_JCAROUSEL", true);
        }
    }
    $id = 'viewed-products';
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
    <div class="viewed-product" id="<?php echo $id; ?>">
        <?php if ($show_widget_title) { ?>
            <div class="viewed-product-title">
                <h3> 
                    <span class="title-list-list"><?php echo $widget_title; ?></span>
                </h3>
            </div><!--end-border-list-->
        <?php } ?>
        <div class="js">
            <div class="jcarousel-wrapper">
                <a class="jcarousel-control-next" href="#" data-jcarouselcontrol="true"></a>
                <a class="jcarousel-control-prev" href="#" data-jcarouselcontrol="true"></a>
                <div class="jcarousel" data-jcarousel="true" data-jcarouselautoscroll="true">
                    <ul>
                        <?php foreach ($products as $product) { ?>
                            <li>
                                <a href="<?php echo $product['link']; ?>" title="<?php echo $product['name']; ?>">
                                    <?php if ($product['avatar_path'] && $product['avatar_name']) { ?>
                                        <img src="<?php echo ClaHost::getImageHost() . $product['avatar_path'] . 's100_100/' . $product['avatar_name'] ?>" alt="<?php echo $product['name'] ?>">
                                    <?php } ?>
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </div><!--end-jcarousel-->
            </div><!--end-jcarousel-wrapper-->
        </div><!--end-js-->
    </div>
<?php } ?>