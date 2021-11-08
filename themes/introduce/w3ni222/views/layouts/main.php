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
            <link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700,300|Roboto+Condensed:400,500,700&subset=latin,vietnamese' rel='stylesheet' type='text/css'/>

            <link href='<?php echo $themUrl ?>/css/owl.carousel.css' rel='stylesheet' type='text/css' />
            <link href='<?php echo $themUrl ?>/css/style.css?v=2.1.5' rel='stylesheet' type='text/css' />
            <!-- Mobile -->
            <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
            <!-- javaScript -->
            <base href="<?php echo Yii::app()->getBaseUrl(true) . '/'; ?>"/>
            <script type="text/javascript" src="<?= $themUrl ?>/js/jquery.colorbox-min.js"></script> 
            <script type="text/javascript" src="<?= $themUrl ?>/js/script.js"></script> 
            <script type="text/javascript" src="<?= $themUrl ?>/js/owl.carousel.min.js"></script> 
            <script type="text/javascript" src="<?= $themUrl ?>/js/bootstrap.min.js"></script> 
    </head>
    <body>
        <div class="warper">
            <?php $this->renderPartial('//layouts/partial/header'); ?>
            <div id="slider">
                <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_BANNER_MAIN)); ?>
            </div>
            <nav id="cssmenu">
                <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_MENU_MAIN)); ?>
            </nav>
            <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_BEGIN_CONTENT)); ?>
            <article id="main">
                <?php echo $content; ?>
            </article>
            <?php $this->renderPartial('//layouts/partial/footer'); ?>
        </div>
    </body>
</html>
<script>
    $(function ($) {
        $(".icon-tk").click(function () {
            if ($(".timkiem").hasClass("abc") == false) {
                $(".timkiem").addClass("abc")
            }
            else {
                $(".timkiem").removeClass("abc")
            }
        })
        $.fn.clickToggle = function (func1, func2) {
            var funcs = [func1, func2];
            this.data('toggleclicked', 0);
            this.click(function () {
                var data = $(this).data();
                var tc = data.toggleclicked;
                $.proxy(funcs[tc], this)();
                data.toggleclicked = (tc + 1) % 2;
            });
            return this;
        };
    }(jQuery));
    $(document).ready(function () {
        $('.dropdown-toggle').clickToggle(function () {
            $(this).next().css('display', 'block');
        }, function () {
            $(this).next().css('display', 'none');
        });
    });


</script>