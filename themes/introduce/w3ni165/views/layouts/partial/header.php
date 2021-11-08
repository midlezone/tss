<div id="header">
    <div class="top-header">
        <div class="row">
            <div class="col-sm-5">
                <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_TOP_HEADER)); ?>
                <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_TOP_LEFT)); ?>
            </div>
            <div class="col-sm-7">
                <div class="top-header-l">
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

                    <div class="language">
                        <?php
                        $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_TOP_RIGHT));
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-cont">
        <div class="row">
            <div class="col-sm-12 col-md-3">
                <div class="logo" style="width: 100%;">
                    <a href="<?php echo Yii::app()->homeUrl; ?>" title="<?php echo Yii::app()->siteinfo['site_title']; ?>">
                        <img alt="Về trang chủ" src="<?php echo Yii::app()->siteinfo['site_logo']; ?>" />
                    </a>
                </div>
            </div>
            <div class="col-sm-12 col-md-9">
                <div class="header-r">
                    <div id="cssmenu">
                        <?php
                        $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_MENU_MAIN));
                        ?>
                    </div>
                    <div class="cart">
                        <?php
                        $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_SHOPPING_CART));
                        ?>
                    </div>
                    <div class="search">
                        <?php
                        $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_SEARCH_BOX));
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>