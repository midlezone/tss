<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="vi">
    <head>
        <meta charset="utf-8">
            <title>Pro186 - Tip Bóng Đá Tỷ Lệ Win Cao Số 1 Việt Nam</title>
			
            <?php
            $themUrl = Yii::app()->theme->baseUrl;
            $cs = Yii::app()->getClientScript();
            Yii::app()->clientScript->registerCoreScript('jquery');
            ?>
            <script type="text/javascript" src="<?= $themUrl ?>/js/script.js"></script> 
			<script type="text/javascript" src="<?= $themUrl ?>/js/owl.carousel.min.js"></script> 
			<script type="text/javascript" src="/themes/introduce/boomby/js/user_infor.js"></script>
            <!-- The Stylesheet -->
            <link href='http://fonts.googleapis.com/css?family=Roboto|Roboto+Condensed|Roboto+Slab&subset=latin,vietnamese,latin-ext' rel='stylesheet' type='text/css'/>
            <link href='<?php echo $themUrl ?>/css/owl.carousel.css' rel='stylesheet' type='text/css' />
			
            <link href='<?php echo $themUrl ?>/css/style.css' rel='stylesheet' type='text/css' />
            <link href='<?php echo $themUrl ?>/css/profile.css' rel='stylesheet' type='text/css' />
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
		<div id="dnn_balloon_botleft" class="sk_balloon sk_balloon_down sk_balloon_left"><div class="textwidget"><p>
		<a href="https://www.w88boleh.com/?affiliateid=49213" target="_blank" rel="noopener noreferrer">
		<img class="alignnone wp-image-2109 size-full" src="http://pro186.vn/mediacenter/media/files/1248/banners/449_1606729768_4225fc4c028241cf.gif" alt="" width="300" height="86"></a></p></div></div>
		
		<div id="dnn_balloon_botright" class="sk_balloon sk_balloon_down sk_balloon_right"><div class="textwidget"><p>
		<a href="https://www.w88boleh.com/?affiliateid=49213" target="_blank" rel="noopener noreferrer">
		<img class="alignnone wp-image-2109 size-full" src="http://pro186.vn/mediacenter/media/files/1248/banners/449_1606729768_4225fc4c028241cf.gif" alt="" width="300" height="86"></a></p></div></div>       

    </body>
</html>