<?php
$siteinfo = Yii::app()->siteinfo;
//
$adminSession = ClaSite::getAdminSession();
?>
<div id="inheader">
    <div class="wrap">
        <div class="clearfix inheader-box">
            <div class="user-box">
                <?php if (!$adminSession) { ?>
                    <script>
                        jQuery(document).ready(function() {
                            $("#w3nlogin").colorbox({width: "100%", maxWidth: "400px", overlayClose: false});
                        });
                    </script>
                    <ul class="menu">
                        <li>
                            <a href="<?php echo Yii::app()->createUrl('login/login/websitelogin'); ?>" id="w3nlogin">
                                <?php echo Yii::t('common', 'login'); ?>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo Yii::app()->createUrl('/site/build/choicetheme'); ?>">
                                <?php echo Yii::t('common', 'signup'); ?>
                            </a>
                        </li>
                    </ul>
                <?php } else { ?>
                    <ul class="menu">
                        <li>
                            <a>
                                <?php echo $adminSession['name']; ?>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo $adminSession['website']; ?>"><?php echo Yii::t('site', 'gotoyoursite'); ?></a>
                        </li>
                        <li>
                            <a href="<?php echo Yii::app()->createUrl('login/login/websitelogout'); ?>"><?php echo Yii::t('site', 'outyoursite'); ?></a>
                        </li>
                    </ul>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<div id="header">
    <div class="wrap">
        <div class="row no-margin">
            <div id="logo">
                <a href="<?php Yii::app()->homeUrl ?>">
                    <?php if(ClaWeb::isWeb3nhatDomain()) { ?>
                    <style>
                        #logo {height: 139px;}
                        #menutop {padding-top: 99px;}
                    </style>
                    <img title="<?php echo $siteinfo['site_title']; ?>" src="<?php echo Yii::app()->theme->baseUrl . '/img/logo.png' ?>" alt="<?php echo $siteinfo['site_title']; ?>" />
                    <?php } else {?>
                    <img title="<?php echo $siteinfo['site_title']; ?>" src="<?php echo ($siteinfo['site_logo']) ? $siteinfo['site_logo'] : Yii::app()->theme->baseUrl . '/images/logo.png' ?>" alt="<?php echo $siteinfo['site_title']; ?>" />
                    <?php }?>
                </a>
                <h1><?php echo $siteinfo['site_title']; ?></h1>
            </div>
            <div id="menutop">
                <?php
                $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_HEADER));
                ?>
            </div>
        </div>
    </div>
</div>