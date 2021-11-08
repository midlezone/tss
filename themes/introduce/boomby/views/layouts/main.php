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
            <link href='https://fonts.googleapis.com/css?family=Roboto:400,500,700,300|Roboto+Condensed:400,700&subset=latin,vietnamese' rel='stylesheet' type='text/css'/>
            <link href='<?php echo $themUrl ?>/css/owl.carousel.css' rel='stylesheet' type='text/css' />
            <link href='<?php echo $themUrl ?>/css/style-menu.css?v=2.0.5' rel='stylesheet' type='text/css' />
            <link href='<?php echo $themUrl ?>/css/style.css?v=2.0.5' rel='stylesheet' type='text/css' />
			<link href='<?php echo $themUrl ?>/css/profile.css?v=2.0.5' rel='stylesheet' type='text/css' />
			<link href="<?php echo $themUrl ?>/css/jquery.exzoom.css" rel="stylesheet" type="text/css"/>

            <script type="text/javascript" src="<?= $themUrl ?>/js/script.js"></script> 
            <script type="text/javascript" src="<?= $themUrl ?>/js/owl.carousel.min.js"></script>
			 <script type="text/javascript" src="<?= $themUrl ?>/js/user_infor.js"></script>
			 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


			<script type="text/javascript" src="<?= $themUrl ?>/js/jquery.exzoom.js"></script>
			<script src="https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js"></script>
			<script src="http://w3ni879.nanoweb.com.vn/themes/introduce/w3ni879/js/jquery.scrollUp.min.js"></script>
			
			<link href='https://cdn.shopify.com/s/files/1/0404/9121/t/59/assets/ss-social-regular.css?2292869871446415388' rel='stylesheet' type='text/css'/>

			<script type="text/javascript">
				(function e(){var e=document.createElement("script");e.type="text/javascript",e.async=true,e.src="//staticw2.yotpo.com/cdURuBEh56mu5az858RXsmqVJkW8kMZmF9Q2ZQIo/widget.js";var t=document.getElementsByTagName("script")[0];t.parentNode.insertBefore(e,t)})();
			</script>
			<!-- Global site tag (gtag.js) - Google Analytics -->
			<script async src="https://www.googletagmanager.com/gtag/js?id=UA-129130267-1"></script>
			<script>
			  window.dataLayer = window.dataLayer || [];
			  function gtag(){dataLayer.push(arguments);}
			  gtag('js', new Date());

			  gtag('config', 'UA-129130267-1');
			</script>
			<!-- Mobile -->
            <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
            <!-- javaScript -->
            <base href="<?php echo Yii::app()->getBaseUrl(true) . '/'; ?>"/>
           
		   
		   <!-- Facebook Pixel Code -->
			<script>
			  !function(f,b,e,v,n,t,s)
			  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
			  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
			  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
			  n.queue=[];t=b.createElement(e);t.async=!0;
			  t.src=v;s=b.getElementsByTagName(e)[0];
			  s.parentNode.insertBefore(t,s)}(window, document,'script',
			  'https://connect.facebook.net/en_US/fbevents.js');
			  fbq('init', '2430622320511596');
			  fbq('track', 'PageView');
			</script>
			<noscript><img height="1" width="1" style="display:none"
			  src="https://www.facebook.com/tr?id=2430622320511596&ev=PageView&noscript=1"
			/></noscript>
			<!-- End Facebook Pixel Code -->
		
		
             
    </head>
    <body>

        <!--header-->
        <?php $this->renderPartial('//layouts/partial/header'); ?>
        <?php
        $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_HEADER_BOTTOM));
        ?>
        <!--End header -->
        <div id="main">                
            <?php echo $content; ?>
        </div>
        <?php $this->renderPartial('//layouts/partial/footer'); ?>

    </body>
    <script>
        $(function ($) {
            $(".icon-tk").click(function () {
                if ($(".timkiem").hasClass("abc") == false) {
                    $(".timkiem").addClass("abc")
                }
                else {
                    $(".timkiem").removeClass("abc")
                }
            })
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
	
	<script>
		$(document).ready(function() {
			demo1();
		});

		function demo1() {
			var OSName = "Unknown OS";
			if (navigator.userAgent.indexOf("Win") != -1) OSName = "Windows";
			if (navigator.userAgent.indexOf("Mac") != -1) OSName = "Macintosh";
			if (navigator.userAgent.indexOf("Linux") != -1) OSName = "Linux";
			if (navigator.userAgent.indexOf("Android") != -1) OSName = "Android";
			if (navigator.userAgent.indexOf("like Mac") != -1) OSName = "iOS";

			$(".linkandorid").fadeOut(1);
			$(".linkios").fadeOut(1);

			if (OSName == 'Android' || OSName == 'Windows') {
				$(".linkandorid").fadeIn(1);
			}

			if (OSName == 'iOS' || OSName == 'Macintosh') {
				$(".linkios").fadeIn(1);
			}

		}
	</script>
</html>



