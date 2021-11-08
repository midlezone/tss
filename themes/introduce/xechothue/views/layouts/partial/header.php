<div id="header">
    <div class="top-header clearfix">
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
                <li ><?php
                    $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_HEADER_RIGHT));
                    ?></li>
            </ul>
        </div>
    </div>
    <div class="cont-header clearfix">
        <div class="logo  ">
            <h1>
                <a href="<?php echo Yii::app()->homeUrl; ?>" title="<?php echo Yii::app()->siteinfo['site_title']; ?>">
                    <img alt="Về trang chủ" src="<?php echo Yii::app()->siteinfo['site_logo']; ?>" />
                    <span class="hide-text"><?php echo Yii::app()->siteinfo['site_title']; ?></span>
                </a>
            </h1>
        </div>
        <div class="banner">
            <?php
            $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_TOP_HEADER));
            ?>
        </div>
        <div class="searchbox">
            <?php
            $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_SEARCH_BOX));
            ?>
        </div>
    </div>
</div>
<div id="nav-menu">
    <div id="cssmenu">
        <?php
        $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_MENU_MAIN));
        ?>
    </div>
</div>
