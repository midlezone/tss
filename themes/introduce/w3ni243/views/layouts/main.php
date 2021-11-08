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
            <link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700,300|Roboto+Condensed:400,700&subset=latin,vietnamese' rel='stylesheet' type='text/css'/>

            <!-- The Stylesheet -->
            <link href='<?php echo $themUrl ?>/css/style.css' rel='stylesheet' type='text/css' />
            <!-- Mobile -->
            <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
            <meta name="copyright" content="JUJUBE.COM.VN">
            <meta name="developer" content="JUJUBE.COM.VN">
            <meta name="author" content="JUJUBE.COM.VN"/>
            <meta property="article:author" content="https://www.facebook.com/jujube.com.vn/" />
            <!-- javaScript -->
            <script type="text/javascript" src="<?= $themUrl ?>/js/bootstrap.min.js"></script> 
            <script type="text/javascript" src="<?= $themUrl ?>/js/script.js"></script> 
            <base href="<?php echo Yii::app()->getBaseUrl(true) . '/'; ?>"/> 
    </head>
    <body>
        <div class="page-all">
            <!--header-->
            <?php $this->renderPartial('//layouts/partial/header'); ?>
            <!--End header -->
            <div id="content" class="main">
                <div class="container">
                    <?php echo $content; ?>
                    <?php
                    $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BOTTOM));
                    ?>
                </div>
            </div>
            <?php $this->renderPartial('//layouts/partial/footer'); ?>    
        </div>
    </body>
    <script>
        $(function ($) {
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
</html>