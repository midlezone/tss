<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="vi">
    <head>
        <meta charset="utf-8">
            <title><?= $this->pageTitle; ?></title>
            <?php
            $themUrl = Yii::app()->theme->baseUrl;
            $cs = Yii::app()->getClientScript();
            Yii::app()->clientScript->registerCoreScript('jquery');
            ?>
            <!-- The Stylesheet -->
            <link href='http://fonts.googleapis.com/css?family=Roboto|Roboto+Condensed|Roboto+Slab&subset=latin,vietnamese,latin-ext' rel='stylesheet' type='text/css'/>
            <link href='<?php echo $themUrl ?>/css/style-menu.css' rel='stylesheet' type='text/css' />
            <link href='<?php echo $themUrl ?>/css/style.css' rel='stylesheet' type='text/css' />
            <link href='<?php echo $themUrl ?>/css/owl.carousel.css' rel='stylesheet' type='text/css' />
            <script type="text/javascript" src="<?= $themUrl ?>/js/script.js"></script> 
            <!-- Mobile -->
            <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
            <!-- javaScript -->
            <base href="<?php echo Yii::app()->getBaseUrl(true) . '/'; ?>"/>
    </head>
    <body>
        <!--header-->
        <?php $this->renderPartial('//layouts/partial/header'); ?>
        <!--End header -->
        <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_BEGIN_CONTENT)); ?>
        <div id="main">
            <?php echo $content; ?>
        </div>
        <?php $this->renderPartial('//layouts/partial/footer'); ?>
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
        <script>
            $("document").ready(function () {
                $(window).scroll(function (event) {
                    var scroll = $(window).scrollTop();
                    // Do something
                    if (scroll >= 600) {
                        $(".container-out .banner").show();
                    } else {
                        $(".container-out .banner").hide();
                    }
                });

            });
        </script>

    </body>
</html>