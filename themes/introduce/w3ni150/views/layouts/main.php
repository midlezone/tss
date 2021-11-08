<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="vi">
    <head>
        <meta charset="utf-8" />
        <title><?= $this->pageTitle; ?></title>
        <?php
        $themUrl = Yii::app()->theme->baseUrl;
        $cs = Yii::app()->getClientScript();
        Yii::app()->clientScript->registerCoreScript('jquery');
        ?>
        <link href='http://fonts.googleapis.com/css?family=Roboto|Roboto+Condensed|Roboto+Slab&subset=latin,vietnamese,latin-ext' rel='stylesheet' type='text/css'>
            <!-- The Stylesheet -->
            <link href='<?php echo $themUrl ?>/css/style.css?v=1.1.6' rel='stylesheet' type='text/css' />
            <!-- Mobile -->
            <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
            <!-- javaScript -->
            <base href="<?php echo Yii::app()->getBaseUrl(true) . '/'; ?>"/>
    </head>
    <body>
        <div class="all-page">
            <!--header-->
            <?php $this->renderPartial('//layouts/partial/header'); ?>
            <!--End header -->
            <div class="main">
                <div class="banner-top-top ">
    <div class="container">
                    <?php echo $content; ?>    
                <div class="container-out container-out-left">
                    <?php
                    $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_LEFT_OUT));
                    ?>
                </div>
                <div class="container-out container-out-right">
                    <?php
                    $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_RIGHT_OUT));
                    ?>
                </div>
                    </div>
</div><!--end-banner-top--> 
                <?php $this->renderPartial('//layouts/partial/footer'); ?>
            </div>
        </div>
        <script type="text/javascript">
            jQuery(document).ready(function () {
                var container_first = jQuery('.container:first');
                var container_width_diamond = parseInt(container_first.outerWidth());
                var sbmenu = 800;
                jQuery(document).on('mouseover', '.list-content', function () {
                    var thi = jQuery(this);
                    //
                    thi.find('.hover-list-content').css('display', 'block');
                    //
                    if (thi.find('.hover-list-content').length) {
                        var winWidth = jQuery(window).width();
                        var _thiWidth = thi.width();
                        var _thiOfset = thi.offset();
                        if ((_thiOfset.left + _thiWidth + 270 > container_width_diamond + container_first.offset().left) || (_thiOfset.left + _thiWidth + 270 > winWidth)) {
                            thi.find('.hover-list-content').find('.category_product_detail_div').css('left', '-285px');
                        }
                    }
                });
                jQuery(document).on('mouseout', '.list-content', function () {
                    jQuery(this).find('.hover-list-content').css('display', 'none');
                });
                jQuery(document).on('mouseover', '.bg-menu .menu .submenu', function () {
                    var thi = jQuery(this);
                    var _thiOfset = thi.offset();
                    if (_thiOfset.left + sbmenu > container_width_diamond + container_first.offset().left) {
                        thi.find('.submenu-background').css({'left': (container_width_diamond + container_first.offset().left - _thiOfset.left - sbmenu) + 'px'});
                    }
                });
                //
                $(document).on('scroll', function () {
                    if ($(this).scrollTop() > 150) {
                        $('.scrollup').fadeIn('slow');
                        $('.callus').fadeIn('slow');
                    } else {
                        $('.scrollup').fadeOut();
                        $('.callus').fadeOut();
                    }
                });
                //
                $('.scrollup').click(function () {
                    $("html, body").animate({
                        scrollTop: 0
                    }, 600);
                    return false;
                });
            });
            
            //hover
            var listgrid_first = jQuery('.list.grid:first');
                var listgrid_width_diamond = parseInt(listgrid_first.outerWidth());
                jQuery(document).on('mouseover', '.list-content', function() {
                    var thi = jQuery(this);
                    //
                    thi.find('.hover-list-content').css('display', 'block');
                    //
                    if (thi.find('.hover-list-content').length) {
                        var winWidth = jQuery(window).width();
                        var _thiWidth = thi.width();
                        var _thiOfset = thi.offset();
                        if ((_thiOfset.left + _thiWidth + 270 > listgrid_width_diamond + listgrid_first.offset().left) || (_thiOfset.left + _thiWidth + 270 > winWidth)) {
                            thi.find('.hover-list-content').css({'left':"inherit", 'right':(_thiWidth)+'px'});
                        }
                    }
                });
                jQuery(document).on('mouseout', '.list-content', function() {
                    jQuery(this).find('.hover-list-content').css({'display':'none'});
                });
        </script>
        <a href="#" class="scrollup"></a>
        <?php if (ClaSite::isMobile()) {?>
        <div class="callus"><i class="i_phone"></i><a href="tel:0919.718.538">0919.718.538</a></div>
        <?php }?>
    </body>
</html>