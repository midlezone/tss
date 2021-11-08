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
            <link href='http://fonts.googleapis.com/css?family=Roboto|Roboto+Condensed|Roboto+Slab&subset=latin,vietnamese,latin-ext' rel='stylesheet' type='text/css'>
                <link href='<?php echo $themUrl ?>/css/style-menu.css' rel='stylesheet' type='text/css' />
                <link href='<?php echo $themUrl ?>/css/style.css?v=1.1' rel='stylesheet' type='text/css' />
                <link href='<?php echo $themUrl ?>/css/owl.carousel.css' rel='stylesheet' type='text/css' />
                <script type="text/javascript" src="<?= $themUrl ?>/js/script.js"></script> 
                <!-- javaScript -->
                <base href="<?php echo Yii::app()->getBaseUrl(true) . '/'; ?>"/>
                </head>
                <body>
                    <!--header-->
                    <?php $this->renderPartial('//layouts/partial/header'); ?>
                    <!--End header -->
                    <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_BANNER_MAIN)); ?>
                    <div id="nav" class="clearfix">
                        <div class="container">
                            <div id='cssmenu'>
                                <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_MENU_MAIN)); ?>
                            </div>
                            <div class="box-timkiem">
                                <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_SEARCH_BOX)); ?>
                            </div>
                        </div>
                    </div>
                    <div id="main">
                        <?php echo $content; ?>
                    </div>
                    <script>
                        $(function () {
                            $(".buttom").click(function () {
                                if ($(".support").hasClass("abc") == false) {
                                    $(".support").addClass("abc")
                                }
                                else {
                                    $(".support").removeClass("abc")
                                }
                            })
                        });
                    </script>
                    <?php $this->renderPartial('//layouts/partial/footer'); ?>
                </body>
                </html>