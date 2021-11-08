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
            <link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700|Roboto+Condensed:400,700' rel='stylesheet' type='text/css'>
            <!-- The Stylesheet -->
            <link href='<?php echo $themUrl ?>/css/style-menu.css' rel='stylesheet' type='text/css' />
            <link href='<?php echo $themUrl ?>/css/style.css' rel='stylesheet' type='text/css' />
            <link href='<?php echo $themUrl ?>/css/owl.carousel.css' rel='stylesheet' type='text/css' />
            <link href='<?php echo $themUrl ?>/css/owl.theme.css' rel='stylesheet' type='text/css' />
            <script type="text/javascript" src="<?= $themUrl ?>/js/masonry-docs.min.js"></script> 
            <script type="text/javascript" src="<?= $themUrl ?>/js/owl.carousel.min.js"></script> 
            
            
            <!-- Mobile -->
            <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
            <meta name="google-translate-customization" content="<?php echo base64_encode(Yii::app()->request->hostInfo); ?>"></meta>
            <!-- javaScript -->
            <base href="<?php echo Yii::app()->getBaseUrl(true) . '/'; ?>"/>
    </head>
    <body>
        <!--header-->
        <?php $this->renderPartial('//layouts/partial/header'); ?>
        <!--End header -->
        <?php
        $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_BEGIN_CONTENT));
        ?>
        <div id="main">
            <?php echo $content; ?>
        </div>
        <script type="text/javascript" src="<?= $themUrl ?>/js/script.js"></script> 
    </body>
</html>