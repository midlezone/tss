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
            <link href='<?php echo $themUrl ?>/css/pgwslider.min.css?v=1.1' rel='stylesheet' type='text/css'/>
            <link href='<?php echo $themUrl ?>/css/owl.carousel.css' rel='stylesheet' type='text/css'/>
            <link href='<?php echo $themUrl ?>/css/style.css?v=1.0' rel='stylesheet' type='text/css'/>
            <!-- Mobile -->
            <!--Font-->
            <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,400italic,500,700&subset=latin,vietnamese' rel='stylesheet' type='text/css'/>
             <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
            <!-- javaScript -->
            <base href="<?php echo Yii::app()->getBaseUrl(true) . '/'; ?>"/>
    </head>
    <body>
        <div id="main" class="all-page">
            <!--header-->
            <?php $this->renderPartial('//layouts/partial/header'); ?>
            <div>
                <?php
                $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_HEADER_BOTTOM));
                ?>
            </div>
            <div class="container">
                <?php
                $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_TOP_CENTER));
                ?>

            </div>
            <!--End header -->
            <div id="content" class="main">
                <div class="container">
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
    </body>
</html>