<div class="header" id="header">
    <div class="bg-top-logo">
        <div class="container clearfix">
            <div class="box-logo">
                <div class="logo">
                    <h1>
                        <a href="<?php echo Yii::app()->homeUrl; ?>" title="<?php echo Yii::app()->siteinfo['site_title']; ?>">
                            <img src="<?php echo Yii::app()->siteinfo['site_logo']; ?>" />
                            <span class="hide-text"><?php echo Yii::app()->siteinfo['site_title']; ?></span>
                        </a>
                    </h1>
                </div>
            </div><!--end-box-LOGO-->
            <div class="box-banner">
                <?php
                $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_TOP_HEADER));
                ?>
            </div>
            <div class="box-right-top">
                <div class="timkiem">
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
                            <?php } else 
                                { $user = Users::getCurrentUser();
                                    ?>
                                    <li>
                                        <a href="<?php echo Yii::app()->createUrl('profile/profile'); ?>">
                                            Xin chào: <?php echo $user->name ?> | <?php echo Yii::t('common', 'page_manager'); ?>
                                        </a>
                                    </li>
                            <?php } ?>
                        </ul>
                    </div>
                    <?php
                    $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_HEADER_RIGHT));
                    ?>
                </div>
            </div>
        </div>
    </div> <!--end-bg-top-->

    <div class="bg-menu">
        <div class="container">
            <div class="menu-top clearfix">
                <div class="box-menu">
                    <?php
                    $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_HEADER));
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>