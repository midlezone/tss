<div id="header">
    <div class="top-header">
        <div class="container">
            <div class="top-left">
                <div class="login clearfix">
                    <ul>
                        <li class="icon-about"><a href="/lien-he" title="Liên hệ">Liên hệ</a></li>
                        <?php if (Yii::app()->user->isGuest) { ?>
                            <li class="icon-login">
                                <a href="<?php echo Yii::app()->createUrl('login/login/login'); ?>" id="w3nlogin">
                                    <?php echo Yii::t('common', 'login'); ?>
                                </a>
                            </li>
                            <li class="icon-register">
                                <a href="<?php echo Yii::app()->createUrl('login/login/signup'); ?>">
                                    <?php echo Yii::t('common', 'signup'); ?>
                                </a>
                            </li>
                        <?php } else { ?>
                            <li class="icon-register">
                                <a href="<?php echo Yii::app()->createUrl('login/login/logout'); ?>">
                                    <?php echo Yii::t('common', 'logout'); ?>
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
                <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_TOP_RIGHT)); ?>
            </div>
            <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_HEADER)); ?>
        </div>
    </div>
    <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_TOP_HEADER)); ?>
    <div class="cont-header">
        <div class="container">
            <div class="container clearfix">
                <div class="logo clearfix">
                    <h1  class="clearfix"> 
                        <a href="<?php echo Yii::app()->homeUrl; ?>" title="<?php echo Yii::app()->siteinfo['site_title']; ?>">
                            <img alt="Về trang chủ" src="<?php echo Yii::app()->siteinfo['site_logo']; ?>" />
                        </a>
                        <span class="hide-text">
                            <?php echo Yii::app()->siteinfo['site_title']; ?>
                        </span> 
                    </h1>
                </div>
                <div id='cssmenu'>
                    <?php
                    $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_MENU_MAIN));
                    ?>
                </div>
                <div class="searchbox">
                    <?php
                    $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_SEARCH_BOX));
                    ?>
                </div>
                <div class="cart">
                    <?php
                    $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_SHOPPING_CART));
                    ?>
                </div>
			
				
            </div>
        </div>
    </div>
</div>
<div id="slider">
    <?php
    $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_BANNER_MAIN));
    ?>
</div>