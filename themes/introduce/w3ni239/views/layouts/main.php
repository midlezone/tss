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
            <link href='<?php echo $themUrl ?>/css/owl.carousel.css' rel='stylesheet' type='text/css' />
            <link href='<?php echo $themUrl ?>/css/style.css?v=2.0.5' rel='stylesheet' type='text/css' />
            <script type="text/javascript" src="<?= $themUrl ?>/js/owl.carousel.min.js"></script>
            <!--popup-->
            <script type="text/javascript" src="<?= $themUrl ?>/js/bootstrap.min.js"></script>
            <!--Menu-->
            <script type="text/javascript" src="<?= $themUrl ?>/js/custom.js"></script>
            <script type="text/javascript" src="<?= $themUrl ?>/js/snap.svg-min.js"></script>
            <!-- Mobile -->
            <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
            <meta name="copyright" content="JUJUBE.COM.VN">
            <meta name="developer" content="JUJUBE.COM.VN">
            <meta name="author" content="JUJUBE.COM.VN"/>
            <meta property="article:author" content="https://www.facebook.com/jujube.com.vn/" />
            <!-- javaScript -->
            <base href="<?php echo Yii::app()->getBaseUrl(true) . '/'; ?>"/>
    </head>
    <body>
        <div class="bg-video">
            <video autoplay preload="" loop muted poster="<?= $themUrl ?>/css/img/water-bg.jpg" class="show-for-large-up">
                <source src="<?= $themUrl ?>/video/water-bg.mp4" type="video/mp4"/>
                <source src="<?= $themUrl ?>/video/water-bg.webm" type="video/webm"/>
            </video>
            <div class="watermark"></div>
        </div>
        <div class="menu-wrap">
            <nav class="menu-ok">
                <div class="logo-menu">
                    <a href="<?php echo Yii::app()->homeUrl; ?>" title="<?php echo Yii::app()->siteinfo['site_title']; ?>">
                        <?php
                        $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_WIGET_BLOCK8));
                        ?>
                    </a>
                </div>
                <div class="logo-text">
                    <a href="<?php echo Yii::app()->homeUrl; ?>" title="<?php echo Yii::app()->siteinfo['site_title']; ?>">
                        <img alt="Về trang chủ" src="<?php echo Yii::app()->siteinfo['site_logo']; ?>" />
                    </a>
                </div>
                <?php
                $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_WIGET_BLOCK7));
                ?>
                <div class="menu-bottom">
                    <?php
                    $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_WIGET_BLOCK6));
                    ?>
                </div>
            </nav>
            <button class="close-button" id="close-button">Close Menu</button>
            <div class="morph-shape" id="morph-shape" data-morph-open="M-1,0h101c0,0,0-1,0,395c0,404,0,405,0,405H-1V0z">
                <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 100 800" preserveAspectRatio="none">
                    <path d="M-1,0h101c0,0-97.833,153.603-97.833,396.167C2.167,627.579,100,800,100,800H-1V0z"/>
                </svg>
            </div>
        </div>
        <button class="menu-button" id="open-button">Open Menu</button>
        <!--header-->
        <div class="content-wrap">
            <div class="wapper">
                <?php $this->renderPartial('//layouts/partial/header'); ?>
                <?php
                $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_HEADER_BOTTOM));
                ?>
                <!--End header -->
                <div id="main">                
                    <?php echo $content; ?>
                </div>
                <div id="bottom">
                    <?php
                    $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_WIGET_BLOCK5));
                    ?>
                </div>
                <?php $this->renderPartial('//layouts/partial/footer'); ?>
            </div>
        </div>
        <?php
        $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK7));
        ?>
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
    <script type="text/javascript" src="<?= $themUrl ?>/js/classie.js"></script>
    <script type="text/javascript" src="<?= $themUrl ?>/js/main3.js"></script>

</html>