<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="vi">
    <head>
        <meta charset="utf-8" />
        <title><?= $this->pageTitle; ?></title>
        <?php
        $themUrl = Yii::app()->theme->baseUrl;
        Yii::app()->clientScript->registerCoreScript('jquery');
        ?>
		<? echo $themUrl; die;?> 
        <!-- The Stylesheet -->
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
		<meta name="description" content="CÔNG TY CP GIẢI PHÁP PHẦN MỀN & DỊCH VỤ CÔNG NGHỆ TSS * Số 73 đường Phan Đình Phùng - TP. Hà Tĩnh * Hotline: 0909727288 * Email: info@tss-software.com.vn" />
		<meta name="keywords" content="Thiết kế website tại Hà Tĩnh, thiết kế website tại Nghệ An, thiết kế website tại Quảng Bình, thiết kế website tại vinh, Thiết kế web Hà Tĩnh, thiết kế web Nghệ An, thiết kế web Quảng Bình, thiết kế web vinh,Thiết kế website Hà Tĩnh,Thiết kế website vinh" />

        <!-- web mastertool -->
        <meta name="google-site-verification" content="CJl4WSEo3UrHu062NbHQ4dRBDAaiXgTF2QlLXA96Ltw" />
        <meta name="copyright" content="tss-software.com.vn">
    	<meta name="developer" content="tss-software.com.vn">
    	<meta name="author" content="tss-software.com.vn"/>
		
        <link href='<?php echo $themUrl ?>/css/style.css?v=<?php echo VERSION; ?>' rel='stylesheet' type='text/css' />
        <link href='<?php echo $themUrl ?>/css/common.css?v=<?php echo VERSION; ?>' rel='stylesheet' type='text/css' />
        <link href='<?php echo $themUrl ?>/font-awesome-4.5.0/css/font-awesome.css' rel='stylesheet' type='text/css' />
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400&subset=latin,vietnamese' rel='stylesheet' type='text/css'>
        <!-- Mobile -->
		  
        <!-- end webmastertool -->
         <link rel='stylesheet' href='/themes/introduce/tss/css/font-awesome.min.css' rel='stylesheet' type='text/css' />
         <link rel='stylesheet' href='/themes/introduce/tss/css/icomoon-fonts.min.css' rel='stylesheet' type='text/css' />

		<!-- javaScript -->
        <base href="<?php echo Yii::app()->getBaseUrl(true); ?>"/>
        <?php
//        if (trim(Yii::app()->siteinfo['google_analytics']) != '') {
//            echo Yii::app()->siteinfo['google_analytics'];
//        }
        ?>
        

    </head>

    <?php
    $sitetypename = ClaSite::getSiteTypeName(Yii::app()->siteinfo);
    ?>
    <body>
        <!--header-->
        <?php $this->renderPartial('webroot.themes.' . $sitetypename . '.' . Yii::app()->theme->name . '.views.layouts.partial.header'); ?>
        <!--End header -->
        <div id="main">
            <?php
            $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_TOP_CENTER));
            ?>
            <div id="maincontent">
                <?php echo $content; ?>
            </div>
        </div>
        <!--footer-->
        <?php $this->renderPartial('webroot.themes.' . $sitetypename . '.' . Yii::app()->theme->name . '.views.layouts.partial.footer'); ?>

        <!-- end footer-->
        <script src="<?php echo Yii::app()->baseUrl; ?>/js/plugins/colorbox/jquery.colorbox-min.js"></script>
       <!-- check domain -->
        <script>
            var check_domain='<?php echo Yii::app()->createUrl("site/site/checkDomain") ?>';
            $('#domainadd').on('click', function(){
                var domain=$('#domainid').val();
                window.location.href=check_domain+'?domain='+domain;
            });
        </script>
        <!-- end check domain -->
        <!-- Google Tag Manager -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-KRTKT5"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-KRTKT5');</script>
<!-- End Google Tag Manager -->
    </body>
</html>