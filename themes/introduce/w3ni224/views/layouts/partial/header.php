<div id="header">
    <div class="top-header clearfix">
        <div class="container clearfix">
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
                    <li>
                        <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_TOP_LEFT)); ?>
                    </li>
                </ul>
            </div>

        </div>
    </div>
    <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_TOP_HEADER)); ?>
    <div class="cont-header">
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
            <div class="banner-top">
                <?php
                $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_HEADER));
                ?>
            </div>
            <div class="searchbox">
                <?php
                $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_SEARCH_BOX));
                ?>
            </div>
            <div class="ct">
                <?php
                $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_HEADER_RIGHT));
                ?>
            </div>
        </div>
    </div>
</div>