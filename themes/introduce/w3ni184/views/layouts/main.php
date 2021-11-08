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
        <link href='http://fonts.googleapis.com/css?family=Roboto|Roboto+Condensed|Roboto+Slab&subset=latin,vietnamese,latin-ext' rel='stylesheet' type='text/css'>
        <!-- Mobile -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <meta name="google-site-verification" content="DPYJXSHScKEA3pJ4ZUzx_4iMgQxPX1qGAZGrz5Ur2jU" />
        <!-- javaScript -->
        <base href="<?php echo Yii::app()->getBaseUrl(true); ?>"/>
        <?php
        if (trim(Yii::app()->siteinfo['google_analytics']) != '') {
            echo Yii::app()->siteinfo['google_analytics'];
        }
        ?>
        
        <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-51271002-3', 'auto');
  ga('send', 'pageview');

</script>
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
    </body>
</html>