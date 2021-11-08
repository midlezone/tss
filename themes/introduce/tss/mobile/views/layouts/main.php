<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="vi">
    <head>
        <meta charset="utf-8" />
        <title><?= $this->pageTitle; ?></title>
        <?php
        $themUrl = Yii::app()->theme->baseUrl;
        $cs = Yii::app()->getClientScript();
        Yii::app()->clientScript->registerCoreScript('jquery');
        ?>
        <!-- The Stylesheet -->
        <link href='<?php echo $themUrl ?>/css/style.css?v=<?php echo VERSION; ?>' rel='stylesheet' type='text/css' />
        <!--<link href='https://fonts.googleapis.com/css?family=Roboto:400,700,500' rel='stylesheet' type='text/css' />-->
        <!-- Mobile -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <!-- javaScript -->
        <base href="<?php echo Yii::app()->getBaseUrl(true); ?>"/>
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
        <div id="main">
        <!--header-->
        <?php $this->renderPartial('webroot.themes.' . $sitetypename . '.' . Yii::app()->theme->name . '.views.layouts.partial.header'); ?>
        <!--End header -->
        
            <?php
            $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_TOP_CENTER));
            ?>
            <div id="maincontent">
                <?php echo $content; ?>
            </div>
        </div>
        <!--footer-->
        <?php $this->renderPartial('webroot.themes.' . $sitetypename . '.' . Yii::app()->theme->name . '.views.layouts.partial.footer'); ?>
        <script src="<?php echo Yii::app()->baseUrl; ?>/js/plugins/colorbox/jquery.colorbox-min.js"></script>
    </body>
</html>