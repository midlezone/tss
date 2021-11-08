<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="vi">
    <head>

<!-- Facebook Conversion Code for Other Website Conversions - takevn 1 -->
<script>(function() {
  var _fbq = window._fbq || (window._fbq = []);
  if (!_fbq.loaded) {
    var fbds = document.createElement('script');
    fbds.async = true;
    fbds.src = '//connect.facebook.net/en_US/fbds.js';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(fbds, s);
    _fbq.loaded = true;
  }
})();
window._fbq = window._fbq || [];
window._fbq.push(['track', '6029033533441', {'value':'0.00','currency':'VND'}]);
</script>
<noscript><img height="1" width="1" alt="" style="display:none" src="https://www.facebook.com/tr?ev=6029033533441&amp;cd[value]=0.00&amp;cd[currency]=VND&amp;noscript=1" /></noscript>

<script>(function() {
var _fbq = window._fbq || (window._fbq = []);
if (!_fbq.loaded) {
var fbds = document.createElement('script');
fbds.async = true;
fbds.src = '//connect.facebook.net/en_US/fbds.js';
var s = document.getElementsByTagName('script')[0];
s.parentNode.insertBefore(fbds, s);
_fbq.loaded = true;
}
_fbq.push(['addPixelId', '564912390278276']);
})();
window._fbq = window._fbq || [];
window._fbq.push(['track', 'PixelInitialized', {}]);
</script>


<noscript><img height="1" width="1" alt="" style="display:none" src="https://www.facebook.com/tr?id=564912390278276&amp;ev=PixelInitialized" /></noscript>
<!-- end facebook -->
        <meta charset="utf-8" />
        <title><?= $this->pageTitle; ?></title>
        <?php
        $themUrl = Yii::app()->theme->baseUrl;
        Yii::app()->clientScript->registerCoreScript('jquery');
        ?>
        <!-- The Stylesheet -->
        <link href='<?php echo $themUrl ?>/css/style.css?v=<?php echo VERSION; ?>' rel='stylesheet' type='text/css' />
        <link href='<?php echo $themUrl ?>/css/common.css?v=<?php echo VERSION; ?>' rel='stylesheet' type='text/css' />
        <!-- <link href='<?php echo $themUrl ?>/domain/css/Common.css' rel='stylesheet' type='text/css' /> -->
        <link type="text/css" href="<?php echo $themUrl ?>/domain/css/ui-lightness/jquery-ui-1.7.2.custom.css" rel="stylesheet" />   
        <link rel="stylesheet" href="<?php echo $themUrl ?>/font-awesome-4.5.0/css/font-awesome.css">
        
        <link href='http://fonts.googleapis.com/css?family=Roboto|Roboto+Condensed|Roboto+Slab&subset=latin,vietnamese,latin-ext' rel='stylesheet' type='text/css'>
        <!-- Mobile -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <meta name="google-site-verification" content="DPYJXSHScKEA3pJ4ZUzx_4iMgQxPX1qGAZGrz5Ur2jU" />
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
                <?php $this->renderPartial('webroot.themes.' . $sitetypename . '.' . Yii::app()->theme->name . '.views.layouts.partial.promotion'); ?>
                <?php echo $content; ?>
            </div>
        </div>
        <!--footer-->
        <?php $this->renderPartial('webroot.themes.' . $sitetypename . '.' . Yii::app()->theme->name . '.views.layouts.partial.footer'); ?>
        <!-- Google Code for Remarketing Tag -->
<!--------------------------------------------------
Remarketing tags may not be associated with personally identifiable information or placed on pages related to sensitive categories. See more information and instructions on how to setup the tag on: http://google.com/ads/remarketingsetup
--------------------------------------------------->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 963228824;
var google_custom_params = window.google_tag_params;
var google_remarketing_only = true;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/963228824/?value=0&amp;guid=ON&amp;script=0"/>
</div>
</noscript>
        <script src="<?php echo Yii::app()->baseUrl; ?>/js/plugins/colorbox/jquery.colorbox-min.js"></script>
        <script type='text/javascript'>window._sbzq||function(e){e._sbzq=[];var t=e._sbzq;t.push(["_setAccount",37583]);var n=e.location.protocol=="https:"?"https:":"http:";var r=document.createElement("script");r.type="text/javascript";r.async=true;r.src=n+"//static.subiz.com/public/js/loader.js";var i=document.getElementsByTagName("script")[0];i.parentNode.insertBefore(r,i)}(window);</script>

        <script src="<?php echo $themUrl ?>/domain/js/common.js"></script>
        <script src="<?php echo $themUrl ?>/domain/js/jquery-ui-1.7.2.custom.min.js"></script>
        <script>
            var theme_url='<?php echo $themUrl ?>'+'/domain';
        </script>
    </body>
</html>

<style>
.preloader{
    display:block;
    position:fixed;
    top:200px;
    right:600px;
    height:24px;
    width:100px;
    background:url("<?php echo $themUrl ?>/domain/img/fancybox_loading.gif") no-repeat;
}
</style>

<script type="text/javascript" src="<?php echo $themUrl ?>/domain/js/scripts.min.js"></script> 