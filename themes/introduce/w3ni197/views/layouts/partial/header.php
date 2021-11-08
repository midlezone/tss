<div id="header">
    <div class="top-header">
        <div class="container">
            <div class="top-left">
                <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_TOP_LEFT)); ?>
            </div>
            <div class="login">
                <ul class="menu">
                    <?php if (Yii::app()->user->isGuest) { ?>
                        <li>
                            <a href="<?php echo Yii::app()->createUrl('login/login/login'); ?>" id="w3nlogin">
                                <?php echo Yii::t('common', 'login'); ?>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo Yii::app()->createUrl('login/login/signup'); ?>">
                                <?php echo Yii::t('common', 'signup'); ?>
                            </a>
                        </li>
                    <?php } else { ?>
                        <li>
                            <a href="<?php echo Yii::app()->createUrl('login/login/logout'); ?>">
                                <?php echo Yii::t('common', 'logout'); ?>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
            <div class="top-right">
                <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_TOP_RIGHT)); ?>
            </div>
        </div>
    </div>
    <div class="cont-header">
        <div class="container">
            <div class="logo clearfix">
                <h1 class="clearfix">
                    <a href="<?php echo Yii::app()->homeUrl; ?>" title="<?php echo Yii::app()->siteinfo['site_title']; ?>">
                        <img alt="Về trang chủ" src="<?php echo Yii::app()->siteinfo['site_logo']; ?>" />
                    </a>
                </h1>
            </div>
        </div>
    </div>
</div>
<div id="nav">
    <div class="container">
        <div id='cssmenu'>
            <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_MENU_MAIN)); ?>
        </div>
        <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_SEARCH_BOX)); ?>
    </div>
</div>