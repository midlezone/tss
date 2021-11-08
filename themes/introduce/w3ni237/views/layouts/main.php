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
            <link href='<?php echo $themUrl ?>/css/style.css?v=1.0.1' rel='stylesheet' type='text/css' />
            <link href='<?php echo $themUrl ?>/css/style-menu.css?v=1.0.1' rel='stylesheet' type='text/css' />
            <!-- Mobile -->
            <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
            <meta name="copyright" content="JUJUBE.COM.VN">
            <meta name="developer" content="JUJUBE.COM.VN">
            <meta name="author" content="JUJUBE.COM.VN"/>
            <meta property="article:author" content="https://www.facebook.com/jujube.com.vn/" />
            <!-- javaScript -->
            <base href="<?php echo Yii::app()->getBaseUrl(true) . '/'; ?>"/>
            <script type="text/javascript" src="<?= $themUrl ?>/js/bootstrap.min.js"></script> 
    </head>
    <body>
        <!--header-->
        <?php $this->renderPartial('//layouts/partial/header'); ?>
        <!--End header -->

        <?php
        $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_BANNER_MAIN));
        ?>

        <div id="main">
            <div class="container ">
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