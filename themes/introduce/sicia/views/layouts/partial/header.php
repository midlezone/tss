<div id="header">
    <div class="top-header">
        <div class="container clearfix">
			<div class="address-content">
				<i class="fa fa-map-marker"></i>
				<span>Số Số 46 - Ngõ 360 Xã Đàn - Thành phố Hà Nội</span>
			</div>
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
            <div class="top-left">
                <div class="login clearfix">
                    <ul>
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
				<div class="cart">
                    <?php
                    $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_SHOPPING_CART));
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="cont-header">
        <div class="container clearfix">
            
            <?php
            $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_MENU_MAIN));
            ?>
        </div>
    </div>
</div>