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
            <link href='<?php echo $themUrl ?>/css/style.css?v=2.1.5' rel='stylesheet' type='text/css' />
            <link href='<?php echo $themUrl ?>/css/owl.carousel.css' rel='stylesheet' type='text/css' />
            <!-- Mobile -->
            <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
            <!-- javaScript -->
            <base href="<?php echo Yii::app()->getBaseUrl(true) . '/'; ?>"/>
            <script type="text/javascript" src="<?= $themUrl ?>/js/script.js"></script> 
            <script type="text/javascript" src="<?= $themUrl ?>/js/script1.js"></script> 
            <script type="text/javascript" src="<?= $themUrl ?>/js/owl.carousel.min.js"></script> 
            <script type="text/javascript" src="<?= $themUrl ?>/js/bootstrap.min.js"></script> 
    </head>
    <body>
        <?php $this->renderPartial('//layouts/partial/header'); ?>
        <div id="nav">
            <div class="container">
                <div id='cssmenu'>
                    <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_MENU_MAIN)); ?>
                </div>
            </div>
        </div>
        <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_BEGIN_CONTENT)); ?>
        <div id="main">
            <div class="container" style="background:<?php echo (ClaSite::getLinkKey() == ClaSite::getHomeKey()) ? '#ffffff' : '#f4ffe9'  ?>">
                <?php echo $content; ?>
            </div>
        </div>
        <?php $this->renderPartial('//layouts/partial/footer'); ?>
    </body>
</html>
<script type="text/javascript">
    
    (function ($) {
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
        },function () {
            $(this).next().css('display', 'none');
        });
    });

</script>