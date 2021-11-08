<?php
$siteinfo = Yii::app()->siteinfo;
//
$adminSession = ClaSite::getAdminSession();
?>
<script type="text/javascript">
$("document").ready(function($){
    var nav = $('#header22');

    $(window).scroll(function () {
        if ($(this).scrollTop() > 105) {
            nav.addClass("header-fixed");
        } else {
            nav.removeClass("header-fixed");
        }
    });
});
</script>
<script type="text/javascript">
$("document").ready(function($){
    var nav = $('#logo');

    $(window).scroll(function () {
        if ($(this).scrollTop() > 105) {
            nav.addClass("logo-fixed");
        } else {
            nav.removeClass("logo-fixed");
        }
    });
});
</script>
</div>
<div id="inheader">
    <div class="wrap">
        <div class="clearfix inheader-box">
            <div class="language">
                <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_HEADER_RIGHT)); ?>
            </div>
            <div class="user-box">
                <?php if (!$adminSession) { ?>
                    <script>
                        jQuery(document).ready(function() {
                            $("#w3nlogin").colorbox({width: "100%", maxWidth: "400px", overlayClose: false});
                        });
                    </script>
                    <ul class="menu">
                        <li><a href="http://tss-software.com.vn/gioi-thieu">Giới Thiệu</a></li> <li></li>
                        
                        <li><a href="http://tss-software.com.vn/bai-viet">Tin tức </a></li><li></li>
                        
                        <li><a href="http://tss-software.com.vn/tuyen-dung">Tuyển dụng </a></li><li></li>
                        
                        <!--
                        <li>
                            <a href="<?php echo Yii::app()->createUrl('/site/build/choicetheme'); ?>">
                                <?php echo Yii::t('common', 'signup'); ?>
                            </a>
                        </li>
                        -->
                        <li></li>
                         <li></li>
                          <li></li>
                           <li></li>
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
<div id="header22">
    <div class="wrap">
        <div class="row no-margin">
            <div id="logo">
                <a href="<?php Yii::app()->homeUrl ?>">
                    <?php if(ClaWeb::isWeb3nhatDomain()) { ?>
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
            <div class="button-home"><a href="/chon-giao-dien" class="btn btn-sm btn-signup">TẠO WEB CHỈ 30 GIÂY</a></div>
        </div>
    </div>
</div>
