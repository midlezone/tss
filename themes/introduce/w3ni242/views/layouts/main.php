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
            <link href='<?php echo $themUrl ?>/css/style.css' rel='stylesheet' type='text/css' />
            <!-- Mobile -->
            <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
            <meta name="google-translate-customization" content="<?php echo base64_encode(Yii::app()->request->hostInfo); ?>">
            	<meta name="copyright" content="JUJUBE.COM.VN">
            <meta name="developer" content="JUJUBE.COM.VN">
            <meta name="author" content="JUJUBE.COM.VN"/>
            <meta property="article:author" content="https://www.facebook.com/jujube.com.vn/" />
            </meta>
            <!-- javaScript -->
            <base href="<?php echo Yii::app()->getBaseUrl(true) . '/'; ?>"/>
    </head>
    <body>
        <!--header-->
        <?php $this->renderPartial('//layouts/partial/header'); ?>
        <!--End header -->
        <div id="menu">
            <div class="container">
                <?php
                $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_HEADER_BOTTOM));
                ?>
            </div>
        </div>
        <div id="main">
            <div class="container">
                <?php echo $content; ?>

                <?php
                $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BOTTOM));
                ?>
            </div>
        </div>
        <?php $this->renderPartial('//layouts/partial/footer'); ?>    
    </body>
</html>