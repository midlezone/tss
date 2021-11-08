<?php
$siteinfo = Yii::app()->siteinfo;
//
$adminSession = ClaSite::getAdminSession();
?>
<div id="inheader">
    <div class="language">
                <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_HEADER_RIGHT)); ?>
            </div>
    <div class="wrap">
        <div class="row no-margin">
            <div id="logo">
                <a href="<?php Yii::app()->homeUrl ?>">
                    <?php if(ClaWeb::isWeb3nhatDomain()) { ?>
                    <style>
                        #logo {height: 139px;}
                        /*#menutop {padding-top: 99px;}*/
                    </style>
                    <img title="<?php echo $siteinfo['site_title']; ?>" src="<?php echo Yii::app()->theme->baseUrl . '/img/logo.png' ?>" alt="<?php echo $siteinfo['site_title']; ?>" />
                    <?php } else {?>
                    <img title="<?php echo $siteinfo['site_title']; ?>" src="<?php echo ($siteinfo['site_logo']) ? $siteinfo['site_logo'] : Yii::app()->theme->baseUrl . '/images/logo.png' ?>" alt="<?php echo $siteinfo['site_title']; ?>" />
                    <?php }?>
                </a>
                <h1><?php echo $siteinfo['site_title']; ?></h1>
            </div>
                <?php
                $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_HEADER));
                ?>
        </div>
    </div>
</div>