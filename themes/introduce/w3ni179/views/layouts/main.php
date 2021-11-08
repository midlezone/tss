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
            <link href='https://fonts.googleapis.com/css?family=Roboto:400,700,500' rel='stylesheet' type='text/css' />
            <!-- The Stylesheet -->
            <link href='<?php echo $themUrl ?>/css/style-menu.css?v=2.0.5' rel='stylesheet' type='text/css' />
            <link href='<?php echo $themUrl ?>/css/style.css?v=2.0.5' rel='stylesheet' type='text/css' />
            <!-- Mobile -->
            <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
            <!-- javaScript -->
            <base href="<?php echo Yii::app()->getBaseUrl(true) . '/'; ?>"/>
            <script type="text/javascript" src="<?= $themUrl ?>/js/script.js"></script> 
    </head>
    <body>
        <div class="warper">
            <!--header-->
            <?php $this->renderPartial('//layouts/partial/header'); ?>
            <!--End header -->
            <div id="main">
                <div class="container ">
                    <?php echo $content; ?>
                    <?php
                    $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BOTTOM));
                    ?>
                </div>
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
        </div>
    </div>
    </body>
</html>