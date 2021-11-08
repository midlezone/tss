<div id="header">
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="logo clearfix">
                    <h1 class="clearfix">
                        <a href="<?php echo Yii::app()->homeUrl; ?>" title="<?php echo Yii::app()->siteinfo['site_title']; ?>">
                            <img src="<?php echo Yii::app()->siteinfo['site_logo']; ?>" />
                            <span class="hide-text"><?php echo Yii::app()->siteinfo['site_title']; ?></span>
                        </a>
                    </h1>
                </div>
            </div>
            <div class="col-sm-9">
                <div class="header-r clearfix">
                    <div class="top-header clearfix">
                        <div class="top-header-r clearfix">
                            <?php
                            $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_SEARCH_BOX));
                            ?>
                            <div class="login">
                                <ul class="menu">
                                    <?php if (Yii::app()->user->isGuest) { ?>
                                        <li>
                                            <a href="<?php echo Yii::app()->createUrl('login/login/loginRealestate'); ?>" id="w3nlogin">
                                                <?php echo Yii::t('common', 'login'); ?>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo Yii::app()->createUrl('login/login/signupRealestate'); ?>">
                                                <?php echo Yii::t('common', 'signup'); ?>
                                            </a>
                                        </li>
                                    <?php } else { 
                                        $user = Users::getCurrentUser();
                                        ?>
                                        <li>
                                            <a href="<?php echo Yii::app()->createUrl('profile/profile'); ?>">
                                                Xin chào: <?php echo $user->name ?>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo Yii::app()->createUrl('profile/profile'); ?>">
                                                <?php echo Yii::t('common', 'page_manager'); ?>
                                            </a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
                <div id="nav">
                    <div id='cssmenu'>
                        <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_MENU_MAIN)); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
