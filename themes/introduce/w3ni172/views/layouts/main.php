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
            <script type="text/javascript" src="<?= $themUrl ?>/js/bootstrap.min.js"></script> 
            <script type="text/javascript" src="<?= $themUrl ?>/js/script.js"></script> 
            <link href='<?php echo $themUrl ?>/css/style.css?v=0.1' rel='stylesheet' type='text/css' />
            <!-- Mobile -->
            <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
            <!-- javaScript -->
            <base href="<?php echo Yii::app()->getBaseUrl(true) . '/'; ?>"/>
    </head>
    <body>
        <!--header-->
        <?php $this->renderPartial('//layouts/partial/header'); ?>
        <!--End header -->
        <div id="nav-horizontal">
            <div class="container">
                <div class="row">
                    <div class="nav-horizonta-left">
                        <div class="box-menu">
                            <?php
                            $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_LEFT));
                            ?>
                        </div>
                    </div>
                    <div class="nav-horizonta-right">
                        <?php
                        $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_MENU_MAIN));
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <div id="main">
            <div class="container">
                <?php echo $content; ?>
            </div>
        </div>

        <?php $this->renderPartial('//layouts/partial/footer'); ?>    
    </body>
</html>
<script type="text/javascript">
    
    var home_page = '<?php echo (ClaSite::getLinkKey() == ClaSite::getHomeKey()) ? 'menu_page_home' : 'menu_page_sub';?>';
    jQuery(document).ready(function() {
        if( home_page == 'menu_page_sub' ) {
            jQuery('#cssmenu').css('display', 'none');
            jQuery('.box-menu').hover(function() {
                jQuery('#cssmenu').css('display', 'block');
            }, function() {
                jQuery('#cssmenu').css('display', 'none');
            })
        }
    });
    
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