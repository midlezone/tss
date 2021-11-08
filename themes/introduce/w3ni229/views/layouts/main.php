<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
    <head>
        <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, target-densitydpi=160dpi, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <title>Công ty CP cảng quốc tế Lào-Việt</title>
        <meta name="description" content="Công ty CP cảng quốc tế Lào-Việt" />
        <meta name="keywords" content="Công ty CP cảng quốc tế Lào-Việt" />
        <meta property="og:caption" content="Công ty CP cảng quốc tế Lào-Việt" />
        <meta name="author" content="vungangport.com" />
            <?php
            $themUrl = Yii::app()->theme->baseUrl;
            $cs = Yii::app()->getClientScript();
            Yii::app()->clientScript->registerCoreScript('jquery');
            ?>
            <!-- The Stylesheet -->
            <link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700,300|Roboto+Condensed:400,700&subset=latin,vietnamese' rel='stylesheet' type='text/css'/>
            <link href='<?php echo $themUrl ?>/css/owl.carousel.css' rel='stylesheet' type='text/css' />
            <link href='<?php echo $themUrl ?>/css/style-menu.css?v=2.0.5' rel='stylesheet' type='text/css' />
            <link href='<?php echo $themUrl ?>/css/style.css?v=2.0.5' rel='stylesheet' type='text/css' />
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.2/css/font-awesome.min.css">
						 
            <script type="text/javascript" src="<?= $themUrl ?>/js/script.js"></script> 
            <script type="text/javascript" src="<?= $themUrl ?>/js/owl.carousel.min.js"></script>
            <script type="text/javascript" src="<?= $themUrl ?>/js/bootstrap.min.js"></script>
            <!-- Mobile -->
            <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
            <!-- javaScript -->
            <base href="<?php echo Yii::app()->getBaseUrl(true) . '/'; ?>"/>
    </head>
    <body>

        <!--header-->
        <?php $this->renderPartial('//layouts/partial/header'); ?>
        <!--<div class="container">-->
        <?php
        $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_HEADER_BOTTOM));
        ?>
        <!--</div>-->
        <!--End header -->
        <div id="main">    
            <?php
            $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_WIGET_BLOCK4));
            ?>
            <?php echo $content; ?>
        </div>
        <?php $this->renderPartial('//layouts/partial/footer'); ?>
    </body>
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
</html>