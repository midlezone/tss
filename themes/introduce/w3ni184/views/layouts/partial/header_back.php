<?php
$siteinfo = Yii::app()->siteinfo;
//
$adminSession = ClaSite::getAdminSession();
?>
<div id="inheader">
    <div class="wrap">
        <div class="clearfix inheader-box">
            <div class="language">
                <ul class="menu">
                    <li class="language-item active">
                        <a href="#" onclick="jQuery('.language-item').removeClass('active');
                                jQuery(this).closest('.language-item').addClass('active');
                                doGTranslate('vi|vi');
                                return false;">
                            <img alt="vietnamese" class="lang-image" src="<?php echo Yii::app()->baseUrl . '/images/flag/vietnamese.png' ?>" />
                        </a>
                    </li>
                    <li class="language-item">
                        <a href="#" onclick="jQuery('.language-item').removeClass('active');
                                jQuery(this).closest('.language-item').addClass('active');
                                doGTranslate('vi|en');
                                return false;">
                            <img alt="english" class="lang-image" src="<?php echo Yii::app()->baseUrl . '/images/flag/english.png' ?>" />
                        </a>
                    </li>
                    <li class="language-item">
                        <a href="#" onclick="jQuery('.language-item').removeClass('active');
                                jQuery(this).closest('.language-item').addClass('active');
                                doGTranslate('vi|ja');
                                return false;">
                            <img alt="japan" class="lang-image" src="<?php echo Yii::app()->baseUrl . '/images/flag/japan.png' ?>" />
                        </a>
                    </li>
                </ul>
            </div>
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
                    <img title="<?php echo $siteinfo['site_title']; ?>" src="<?php echo ($siteinfo['site_logo']) ? $siteinfo['site_logo'] : Yii::app()->theme->baseUrl . '/images/logo.png' ?>" alt="<?php echo $siteinfo['site_title']; ?>" />
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
<style type="text/css">
    <!--
    a.gflag {vertical-align:middle;font-size:32px;padding:1px 0;background-repeat:no-repeat;background-image:url('<?php echo Yii::app()->baseUrl; ?>/images/flag/24.png');}
    a.gflag img {border:0;}
    a.gflag:hover {background-image:url('<?php echo Yii::app()->baseUrl; ?>/images/flag/24a.png');}
    #goog-gt-tt {display:none !important;}
    .goog-te-banner-frame {display:none !important;}
    .goog-te-menu-value:hover {text-decoration:none !important;}
    body {top:0 !important;}
    #google_translate_element2 {display:none!important;}
    -->
</style>
<div id="google_translate_element2"></div>