<header>
    <div class="top-header">
        <div class="top-left">
            <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_TOP_LEFT)); ?>

        </div>
        <div class="top-center">
            <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_TOP_CENTER)); ?>

        </div>
        <div class="top-right">
            <div class="user-box">
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
        </div>
    </div>
    <div class="mid-header clearfix">
        <div class="logo clearfix">
            <h1 class="clearfix">
                <a href="<?php echo Yii::app()->homeUrl; ?>" title="<?php echo Yii::app()->siteinfo['site_title']; ?>">
                    <img src="<?php echo Yii::app()->siteinfo['site_logo']; ?>" />
                    <span class="hide-text"><?php echo Yii::app()->siteinfo['site_title']; ?></span>
                </a>
            </h1>
        </div>
        <div class="top-banner">
            <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_HEADER)); ?>

        </div>
    </div>
    <div class="bottom-header">
        <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_HEADER_BOTTOM)); ?>
    </div>

</header>
