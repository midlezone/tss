<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="vi">
    <head>
        <meta charset="utf-8">
            <title><?= $this->pageTitle; ?></title>
            <link href='http://fonts.googleapis.com/css?family=Roboto|Roboto+Condensed|Roboto+Slab&subset=latin,vietnamese,latin-ext' rel='stylesheet' type='text/css'>
            <?php
            $themUrl = Yii::app()->theme->baseUrl;
            $cs = Yii::app()->getClientScript();
            Yii::app()->clientScript->registerCoreScript('jquery');
            ?>
            <script type="text/javascript" src="<?=$themUrl?>/js/script.js"></script> 
            <script type="text/javascript" src="<?=$themUrl?>/js/story-box.min.js"></script> 
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
            <!-- The Stylesheet -->
            <link href='<?php echo $themUrl ?>/css/style.css?v=2.0.4' rel='stylesheet' type='text/css' />
            <link href='<?php echo $themUrl ?>/css/font-awesome' rel='stylesheet' type='text/css' />
			<link href='<?php echo $themUrl ?>/css/youtubegallerywall.css' rel='stylesheet' type='text/css' />

            <!-- Mobile -->
			
			<link href='<?php echo $themUrl ?>/css/owl.carousel.css' rel='stylesheet' type='text/css' />
            <script type="text/javascript" src="<?= $themUrl ?>/js/owl.carousel.min.js"></script>

			<script  type="text/javascript" src="<?= $themUrl ?>/js/youtubegallerywall.js"></script>

            <!-- javaScript -->
            <base href="<?php echo Yii::app()->getBaseUrl(true) . '/'; ?>"/>
    </head>
    <body>
        <div class="all-page">
            <!--header-->
            <?php $this->renderPartial('//layouts/partial/header'); ?>
            <!--End header -->
            <div id="main">
                <?php echo $content; ?>
            </div>
             <?php $this->renderPartial('//layouts/partial/footer'); ?>
        </div>
    </body>
</html>