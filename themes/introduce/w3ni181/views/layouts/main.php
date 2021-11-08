<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="vi">
    <head>
        <meta charset="utf-8">
            <title><?= $this->pageTitle; ?></title>
            <?php
            $themUrl = Yii::app()->theme->baseUrl;
            $cs = Yii::app()->getClientScript();
            Yii::app()->clientScript->registerCoreScript('jquery');
            Yii::app()->clientScript->registerCoreScript('jquery.ui');
            ?>
            <!-- The Stylesheet -->
            <link href='<?php echo $themUrl ?>/css/topbar.min.css?v=<?php echo VERSION;?>' rel='stylesheet' type='text/css' />
            <link href='<?php echo $themUrl ?>/css/shadowbox/shadowbox.css?v=<?php echo VERSION;?>' rel='stylesheet' type='text/css' />
            <link href='<?php echo $themUrl ?>/css/fontello/css/fontello.css' rel="stylesheet">
            <link href='<?php echo $themUrl ?>/css/style.css?v=<?php echo VERSION;?>' rel='stylesheet' type='text/css' />
            <link href='<?php echo $themUrl ?>/css/colors.css?v=<?php echo VERSION;?>' rel='stylesheet' type='text/css' />
            <script type="text/javascript" src="<?php echo $themUrl ?>/js/modernizr.custom.js"></script>
            <!-- Mobile -->
            <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
            <!-- javaScript -->
            <base href="<?php echo Yii::app()->getBaseUrl(true) . '/'; ?>"/>
    </head>
    <body class="page-template-templateshome-template fireform-slider">
        <?php $this->renderPartial('//layouts/partial/header'); ?>
        <div id="ef-slider-overlay"><img alt="" src="<?php echo $themUrl ?>/assets/slider-overlay.png"></div>
        <?php
        $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_BEGIN_CONTENT));
        ?>
        <?php echo $content; ?>
        <?php $this->renderPartial('//layouts/partial/footer'); ?>
<!--        <script type="text/javascript" src="<?php echo $themUrl ?>/js/jquery.easing.min.js"></script>-->
        <script type="text/javascript" src="<?php echo $themUrl ?>/js/detectmobilebrowser.min.js"></script>
        <script type="text/javascript" src="<?php echo $themUrl ?>/js/jquery.transit.min.js"></script>
<!--        <script type="text/javascript" src="<?php echo $themUrl ?>/js/bootstrap.min.js"></script>-->
        <script type="text/javascript" src="<?php echo $themUrl ?>/js/foundation.min.js"></script>
        <script type="text/javascript" src="<?php echo $themUrl ?>/js/topbar.min.js"></script>
        <script type="text/javascript" src="<?php echo $themUrl ?>/js/jquery.isotope.min.js"></script>
        <script type="text/javascript" src="<?php echo $themUrl ?>/js/imagesloaded.min.js"></script>

        <script type="text/javascript" src="<?php echo $themUrl ?>/js/jquery.infinitescroll.min.js"></script>
        <script type="text/javascript" src="<?php echo $themUrl ?>/js/jquery.nicescroll.min.js"></script>
<!--        <script type="text/javascript" src="<?php echo $themUrl ?>/js/shortcodes/inview.min.js"></script>-->
        <script type="text/javascript" src="<?php echo $themUrl ?>/js/jquery.flexslider.min.js"></script>
        <script type="text/javascript" src="<?php echo $themUrl ?>/js/shadowbox/shadowbox.js"></script>
<!--        <script type="text/javascript" src="<?php echo $themUrl ?>/js/shortcodes/custom.js"></script>-->
<!--        <script type="text/javascript" src="<?php echo $themUrl ?>/demo/js/cookie.js"></script>-->
        <script type="text/javascript" src="<?php echo $themUrl ?>/js/setup.js"></script>
        <script type="text/javascript" src="<?php echo $themUrl ?>/js/app.js"></script>
        <script type="text/javascript">
    jQuery(document).ready(function() {
        
        var width_window = jQuery(window).width();
        if (width_window >= 768) {
            jQuery('li.first_li').hover(function() {
                var height_ul = jQuery(this).find('ul.dropdown').height();
                jQuery(this).find('ul.dropdown').css('top', -height_ul);
            });
            jQuery('li.second_li').hover(function() {
                var height_ul = jQuery(this).find('ul.dropdown').height();
                var height_parent_li = jQuery(this).height();
                var height_top = parseInt(height_ul) - parseInt(height_parent_li);
                jQuery(this).find('ul.dropdown').css('top', -height_top);
            });
        }
    });
</script>
    </body>
</html>