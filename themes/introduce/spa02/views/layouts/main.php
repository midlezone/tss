<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="vi">
    <head>
        <meta charset="utf-8">
            <title><?= $this->pageTitle; ?></title>
			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

			<meta name="author" content="Surjith S M">
			<meta name="description" content="Mediclick is a 4 in 1 health landing page template for Medical, Spa, Fitness and Yoga">
			<meta name="keywords" content="Mediclick, landing, spa, fitness, yoga, medical, responsive">

            <?php
            $themUrl = Yii::app()->theme->baseUrl;
            $cs = Yii::app()->getClientScript();
            Yii::app()->clientScript->registerCoreScript('jquery');
            ?>
            <!-- The Stylesheet -->
		
			<link href="<?= $themUrl ?>/css/bootstrap.min.css" rel="stylesheet">

			<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,700" rel="stylesheet" type="text/css">

			 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
			 
			<link href="<?= $themUrl ?>/css/streamline-icons.css" rel="stylesheet">
			<link href="<?= $themUrl ?>/css/twentytwenty.css" rel="stylesheet">

			<link href="<?= $themUrl ?>/css/health.css" rel="stylesheet">

			<link href="<?= $themUrl ?>/css/purple.css" rel="stylesheet">


			<!--[if lt IE 9]>
			  <script src="js/ie/respond.min.js"></script>
			  <![endif]-->

			<script src="<?= $themUrl ?>/js/modernizr.min.js"></script>

			<script src="<?= $themUrl ?>/js/pace.js"></script>

            
            <!-- javaScript -->
            <base href="<?php echo Yii::app()->getBaseUrl(true) . '/'; ?>"/>
    </head>
	<body data-spy="scroll" data-target="#navbar" data-offset="100" class="  pace-done" cfapps-selector="body" data-cf-browser-state="modern" data-cf-browser-version="86" data-cf-browser-name="chrome">
	
   <a href="#top" class="back_to_top" style="display: none;"><img src="https://demo.web3canvas.com/themeforest/mediclick/images/back_to_top.png" alt="back to top"></a>
   <script src="<?= $themUrl ?>/js/jquery.min.js"></script>
   <script src="<?= $themUrl ?>/js/bootstrap.min.js"></script>
   <script src="<?= $themUrl ?>/js/validate.js"></script>
   <script src="<?= $themUrl ?>/js/nicescroll.js"></script>
   <script src="<?= $themUrl ?>/js/event.move.js"></script>
   <script src="<?= $themUrl ?>/js/twentytwenty.js"></script>
   <script src="<?= $themUrl ?>/js/contact_form.js"></script>
   <script src="<?= $themUrl ?>/js/main.js"></script>
   
	<?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK1)); ?>
	
    </body>
</html>