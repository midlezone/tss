<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="vi">
    <head>
        <meta charset="utf-8" />
        <title><?= $this->pageTitle; ?></title>
        <?php
        $themUrl = Yii::app()->theme->baseUrl;
        $cs = Yii::app()->getClientScript();
        Yii::app()->clientScript->registerCoreScript('jquery');
        ?>
        <!-- The Stylesheet -->
        <link href='<?php echo $themUrl ?>/css/style.css' rel='stylesheet' type='text/css' />
        <!-- Mobile -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <!-- javaScript -->
        <base href="<?php echo Yii::app()->getBaseUrl(true); ?>"/>
    </head>
    <?php
    $sitetypename = ClaSite::getSiteTypeName(Yii::app()->siteinfo);
    ?>
    <body>
        <div class="container">
            <!--header-->
            <?php $this->renderPartial('//layouts/partial/header'); ?>
            <!--End header -->
            <div class="main">
                <div class="contentCol">
                    <?php echo $content; ?>
                </div>
            </div>
            <?php $this->renderPartial('//layouts/partial/footer'); ?>
        </div>
    </body>
</html>