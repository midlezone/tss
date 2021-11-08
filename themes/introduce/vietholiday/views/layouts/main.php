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
            <link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700,300|Roboto+Condensed:400,700&subset=latin,vietnamese' rel='stylesheet' type='text/css'/>
			
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.2/css/font-awesome.min.css">
			
			<link rel="stylesheet" type="text/css" href="<?php echo $themUrl ?>/css/jquery.floating-social-share.min.css" />
			
            <!-- The Stylesheet -->
            <link href='<?php echo $themUrl ?>/css/style.css' rel='stylesheet' type='text/css' />
			<link href='<?php echo $themUrl ?>/css/owl.carousel.css' rel='stylesheet' type='text/css' />
			<link href='<?php echo $themUrl ?>/css/youtubegallerywall.css' rel='stylesheet' type='text/css' />

            <!-- Mobile -->
            <meta name="copyright" content="tss-software.com.vn">
            <meta name="developer" content="tss-software.com.vn">
            <meta name="author" content="tss-software.com.vn"/>
			<meta property="og:tag name" content="tag value"/>

            <!-- javaScript -->
            <script type="text/javascript" src="<?= $themUrl ?>/js/bootstrap.min.js"></script> 
            <script type="text/javascript" src="<?= $themUrl ?>/js/script.js"></script> 
			 <script type="text/javascript" src="<?= $themUrl ?>/js/owl.carousel.min.js"></script>
			 <script type="text/javascript" src="<?= $themUrl ?>/js/jquery.marquee.min.js"></script>
			<script  type="text/javascript" src="<?= $themUrl ?>/js/youtubegallerywall.js"></script>

					  <!-- New script -->
			<!-- Slider -->
			<script src="<?= $themUrl ?>/js/jquery.bxslider.min.js"></script>
			<link href="<?php echo $themUrl ?>/css/jquery.bxslider.css" rel="stylesheet" />

	
            <base href="<?php echo Yii::app()->getBaseUrl(true) . '/'; ?>"/> 
    </head>
    <body>
        <div class="page-all">
            <!--header-->
            <?php $this->renderPartial('//layouts/partial/header'); ?>
            <!--End header -->
	
		<script type="text/javascript" src="<?= $themUrl ?>/js/jquery.floating-social-share.min.js"></script>
		<script>
			$("body").floatingSocialShare({
				buttons: ["facebook", "google-plus", "linkedin", "pinterest", "reddit", "stumbleupon", "tumblr", "twitter", "vk"],
				twitter_counter: true,
				text: "share with: ",
				url: "<?= $themUrl ?>"
			});
		</script>
            <div id="content" class="main">
                <div class="container">
                    <?php echo $content; ?>
                    <?php
                    $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BOTTOM));
                    ?>
                </div>
            </div>
		
            <?php $this->renderPartial('//layouts/partial/footer'); ?>    
			<div class="bottom-main">
				<div class="container">
					<div class="partner">
						<?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK5)); ?>
					</div>
				</div>
			</div>
        </div>
		
    </body>
<script type='text/javascript'>window._sbzq||function(e){e._sbzq=[];var t=e._sbzq;t.push(["_setAccount",55588]);var n=e.location.protocol=="https:"?"https:":"http:";var r=document.createElement("script");r.type="text/javascript";r.async=true;r.src=n+"//static.subiz.com/public/js/loader.js";var i=document.getElementsByTagName("script")[0];i.parentNode.insertBefore(r,i)}(window);</script>

    <script>
        $(function ($) {
            $.fn.clickToggle = function (func1, func2) {
                var funcs = [func1, func2];
                this.data('toggleclicked', 0);
                this.click(function () {
                    var data = $(this).data();
                    var tc = data.toggleclicked;
                    $.proxy(funcs[tc], this)();
                    data.toggleclicked = (tc + 1) % 2;
                });
                return this;
            };
        }(jQuery));
        $(document).ready(function () {
            $('.dropdown-toggle').clickToggle(function () {
                $(this).next().css('display', 'block');
            }, function () {
                $(this).next().css('display', 'none');
            });
        });
    </script>
</html>