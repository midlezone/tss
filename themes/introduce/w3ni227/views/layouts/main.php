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
            <script type="text/javascript" src="<?= $themUrl ?>/js/script.js"></script> 
			            <script type="text/javascript" src="<?= $themUrl ?>/js/owl.carousel.min.js"></script> 

            <!-- The Stylesheet -->
            <link href='http://fonts.googleapis.com/css?family=Roboto|Roboto+Condensed|Roboto+Slab&subset=latin,vietnamese,latin-ext' rel='stylesheet' type='text/css'/>
            <link href='<?php echo $themUrl ?>/css/owl.carousel.css' rel='stylesheet' type='text/css' />
			
            <link href='<?php echo $themUrl ?>/css/style.css' rel='stylesheet' type='text/css' />
            <!-- Mobile -->
            <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
            <!-- javaScript -->
            <base href="<?php echo Yii::app()->getBaseUrl(true) . '/'; ?>"/>
            <script>
                var baseUrl = "<?php echo Yii::app()->getBaseUrl(true); ?>";
            </script>
    </head>
    <body>
        <!--header-->
        <?php $this->renderPartial('//layouts/partial/header'); ?>
        <!--End header -->
        <div class="clearfix" id="main" >                
            <?php echo $content; ?>
        </div>
        <?php $this->renderPartial('//layouts/partial/footer'); ?>    
        <?php
        $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_LEFT_OUT));
        ?>        
        <?php
        $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_RIGHT_OUT));
        ?>
	<div class="call-mobile2">
		<a data-animate="fadeInDown" rel="noopener noreferrer" href="zalo.me/0961651567" target="_blank" class="button success" style="border-radius:99px;" data-animated="true">
		<span> ZALO </span></a>
	</div>
	<div class="call-mobile1">
		<a data-animate="fadeInDown" rel="noopener noreferrer" 
		href="https://www.facebook.com/linh.lipton"
		target="_blank" class="button success" style="border-radius:99px;" data-animated="true"><span> FACEBOOK </span></a>
	</div>

	<div class="coccoc-alo-phone coccoc-alo-green coccoc-alo-show" id="coccoc-alo-phoneIcon">
		<a href="tel:0961.651.567" data-original-title="Liên hệ với chúng tôi">
			<div class="coccoc-alo-ph-circle"></div><div class="coccoc-alo-ph-circle-fill">
			</div>
			<div class="coccoc-alo-ph-img-circle"></div><span class="phone_text">0961.651.567</span>
		</a>
	</div>
    </body>
</html>