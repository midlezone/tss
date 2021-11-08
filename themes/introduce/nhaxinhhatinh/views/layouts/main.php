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
            <link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700,300|Roboto+Condensed:400,700&subset=latin,vietnamese' rel='stylesheet' type='text/css'/>
            <link href='<?php echo $themUrl ?>/css/style-menu.css?v=2.0.5' rel='stylesheet' type='text/css' />
            <link href='<?php echo $themUrl ?>/css/style.css?v=2.0.5' rel='stylesheet' type='text/css' />
            <script type="text/javascript" src="<?= $themUrl ?>/js/script.js"></script> 
            <script type="text/javascript" src="<?= $themUrl ?>/js/owl.carousel.min.js"></script>
						<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.2/css/font-awesome.min.css">

            <!-- Mobile -->
            <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
            <!-- javaScript -->
            <base href="<?php echo Yii::app()->getBaseUrl(true) . '/'; ?>"/>
			<!-- Global site tag (gtag.js) - Google Ads: 646961321 -->
			<script async src="https://www.googletagmanager.com/gtag/js?id=AW-646961321"></script>
			<script>
			  window.dataLayer = window.dataLayer || [];
			  function gtag(){dataLayer.push(arguments);}
			  gtag('js', new Date());

			  gtag('config', 'AW-646961321');
			</script>
			<!-- Event snippet for Liên hệ conversion page -->
			<script>
			  gtag('event', 'conversion', {'send_to': 'AW-646961321/ddBDCI7Xs9EBEKmxv7QC'});
			</script>
			<!-- Global site tag (gtag.js) - Google Ads: 625461180 -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=AW-625461180"></script>
		<script>
		  window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
		  gtag('js', new Date());

		  gtag('config', 'AW-625461180');
		</script>
			
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
     <!--Start of Tawk.to Script-->
        <script type="text/javascript">
        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
        (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/59191f994ac4446b24a6f0c4/default';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
        })();
        </script>
     <!--End of Tawk.to Script-->

	

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
</html>