<!DOCTYPE html>
<html  xmlns="http://www.w3.org/1999/xhtml" lang="vi">
    <head>
        <meta charset="utf-8" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
        <!-- ===================== MASTER CSS ===================== -->
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.min.css" />
        <!-- ===================== ICONS CSS ===================== -->
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/font-awesome.min.css" />
        <!-- fonts -->
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ace-fonts.css" />
        <!-- ace styles -->
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ace.min.css" />
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ace-rtl.min.css" />
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ace-skins.min.css" />
        <!-- CUSTOMER CSS -->
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" rel="stylesheet" />   
        <!-- ===================== MAIN JS =====================-->
        <?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/ace-extra.min.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-ui-1.10.3.custom.min.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/main.js"></script>
        <script>
            var baseUrl = "<?php echo Yii::app()->getBaseUrl(true); ?>";
        </script>
        <base href="<?php echo Yii::app()->getBaseUrl(true) . '/'; ?>"/>
    </head>
    <body>
        <?php $this->widget('Flashes'); ?>
        <?php
        $this->renderPartial('application.views.layouts.partial.header');
        ?>
        <div id="main-container" class="main-container">
            <div class="main-container-inner">
				<?php if (Yii::app()->user->id == '1185') { ?>
						<div id="sidebar" class="sidebar">
						   <div id="sidebar-shortcuts" class="sidebar-shortcuts">
							  &nbsp;
						   </div>
						   <!-- #sidebar-shortcuts -->
						   <ul class="nav nav-list">
							  <li class="open">
								 <a class="dropdown-toggle" href="#">
								 <i class="icon-users"></i>
								 <span class="menu-text">Khách hàng</span>
								 <b class="arrow icon-angle-down"></b>
								 </a>
								 <ul class="submenu" style="overflow: hidden; display: block;">
									<li class="">
									   <a class="" href="/quantri/economy/order">
									   <i class=""></i>
									   <span class="menu-text">Quản lý đơn hàng</span>
									   </a>
									</li>
									<li class="">
									   <a class="" href="/quantri/custom/customform/statistic">
									   <i class=""></i>
									   <span class="menu-text">Liên hệ</span>
									   </a>
									</li>
									<li class="">
									   <a class="" href="/quantri/content/newsletter">
									   <i class=""></i>
									   <span class="menu-text">Email đăng ký nhận tin</span>
									   </a>
									</li>
								 </ul>
							  </li>
						   </ul>
						   <!-- /.nav-list -->
						   <div id="sidebar-collapse" class="sidebar-collapse">
							  <i data-icon2="icon-double-angle-right" data-icon1="icon-double-angle-left" class="icon-double-angle-left"></i>
						   </div>
						</div>
				<?php } else { ?>
					<?php
						if (!Yii::app()->user->isGuest) {
							//$this->renderPartial('application.views.layouts.partial.layoutleft');
							$this->widget('LeftLayout');
						}
					?>
				<?php } ?>
               
                <div class="main-content">
                    <?php
                    if (!Yii::app()->user->isGuest) {
                        $this->widget('application.widgets.adminbreadcrumb.adminbreadcrumb');
                    }
                    ?>
                    <div class="page-content">
                        <?php
                        echo $content;
                        ?>
                    </div>
                </div>
            </div>
        </div><!-- /.main-container -->
        <script type="text/javascript">
            if ("ontouchend" in document)
                document.write("<script src='<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
        </script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap.min.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/typeahead-bs2.min.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.ui.touch-punch.min.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.slimscroll.min.js"></script>
        <!-- ace scripts -->
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/ace-elements.min.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/ace.min.js"></script>

        <!--[if lte IE 8]>
          <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/excanvas.min.js"></script>
        <![endif]-->

<!--        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.dashboard.js"></script>-->
    </body>
</html>