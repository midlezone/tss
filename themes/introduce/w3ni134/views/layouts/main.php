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
            <link href='<?php echo $themUrl ?>/css/style.css?v=2.0.4' rel='stylesheet' type='text/css' />
            <!-- Mobile -->
            <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
			<meta name="yandex-verification" content="035c673d79cf4e96" />

            <!-- javaScript -->
            <base href="<?php echo Yii::app()->getBaseUrl(true) . '/'; ?>"/>
    </head>
    <body>
        <div class="all-page">
            <div class="container">
                <!--header-->
                <?php $this->renderPartial('//layouts/partial/header'); ?>
                <!--End header -->
                <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_TOP_CENTER)); ?>
                <div class="main">
                    <div id="content" class="content">
                        <div id="maincontent">
                            <?php echo $content; ?>
                            <?php
                            $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BOTTOM));
                            ?>
                        </div>
                    </div>
                </div>
                <?php $this->renderPartial('//layouts/partial/footer'); ?>    
            </div>
        </div>
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
    </body>
</html>