<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="vi">
    <head>
        <meta charset="utf-8">
            <title><?= $this->pageTitle; ?></title>
			<link href="https://fonts.googleapis.com/css?family=Open+Sans|Poppins" rel="stylesheet">

			<?php
            $themUrl = Yii::app()->theme->baseUrl;
            $cs = Yii::app()->getClientScript();
            Yii::app()->clientScript->registerCoreScript('jquery');
            ?>
            <script type="text/javascript" src="<?=$themUrl?>/js/script.js"></script> 
            <script type="text/javascript" src="<?=$themUrl?>/js/story-box.min.js"></script> 
            <!-- The Stylesheet -->
            <link href='<?php echo $themUrl ?>/css/style.css?v=2.0.4' rel='stylesheet' type='text/css' />
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