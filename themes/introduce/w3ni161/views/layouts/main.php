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
            <!-- The Stylesheet -->
            <link href='<?php echo $themUrl ?>/css/style.css?v=2.0.4' rel='stylesheet' type='text/css' />
            <!-- Mobile -->
            <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
            <!-- javaScript -->
            <base href="<?php echo Yii::app()->getBaseUrl(true) . '/'; ?>"/>
    </head>
    <body>
        <div class="all-page">
                <!--header-->
                <?php $this->renderPartial('//layouts/partial/header'); ?>
                <!--End header -->
                <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_TOP_CENTER)); ?>
                <div class="main">
                    <?php echo $content; ?>
                    <?php
                    $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BOTTOM));
                    ?>
                </div>
                <?php $this->renderPartial('//layouts/partial/footer'); ?>    
        </div>
    </body>
</html>