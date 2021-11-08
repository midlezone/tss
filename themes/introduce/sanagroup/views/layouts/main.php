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
            <!-- The Stylesheet -->
            <link href='http://fonts.googleapis.com/css?family=Roboto|Roboto+Condensed|Roboto+Slab&subset=latin,vietnamese,latin-ext' rel='stylesheet' type='text/css'>
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
        <div class="container main1">
            <!--header-->
            <?php $this->renderPartial('//layouts/partial/header'); ?>
            <!--End header -->
            <div class="clearfix" id="main">                
                    <?php echo $content; ?>
            </div>
            <?php $this->renderPartial('//layouts/partial/footer'); ?>    
            <?php
            $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_LEFT_OUT));
            ?>        
            <?php
            $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_RIGHT_OUT));
            ?>
        </div>
		
    </body>

	 <script type='text/javascript'>window._sbzq||function(e){e._sbzq=[];var t=e._sbzq;t.push(["_setAccount",52540]);var n=e.location.protocol=="https:"?"https:":"http:";var r=document.createElement("script");r.type="text/javascript";r.async=true;r.src=n+"//static.subiz.com/public/js/loader.js";var i=document.getElementsByTagName("script")[0];i.parentNode.insertBefore(r,i)}(window);</script>
	<div class="coccoc-alo-phone coccoc-alo-green coccoc-alo-show" id="coccoc-alo-phoneIcon">
			<a href="tel:0343.526.000" data-original-title="Liên hệ với chúng tôi">
				<div class="coccoc-alo-ph-circle"></div><div class="coccoc-alo-ph-circle-fill">
				</div>
				<div class="coccoc-alo-ph-img-circle"></div><span class="phone_text">0343.526.000</span>
			</a>
	</div>
	
</html>