<div class="header">
    <div class="bg-box-top">
        <div class="box-top ">
            <div class="container clearfix">
                <div class="logo">
                    <h1>
                        <a href="<?php echo Yii::app()->homeUrl; ?>" title="<?php echo Yii::app()->siteinfo['site_title']; ?>">
                            <img alt="Về trang chủ" src="<?php echo Yii::app()->siteinfo['site_logo']; ?>" />
                            <span class="hide-text"><?php echo Yii::app()->siteinfo['site_title']; ?></span>
                        </a>
                    </h1>
                </div>
                <div class="header-r">
                    <div class="right-bg-top">
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
                                <?php
                                $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_HEADER_RIGHT));
                                ?>
                            </ul>
                        </div> <!--end-login--> 
                        <div class="box-phone clearfix">
                            <?php
                            $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_HEADER_LEFT));
                            ?>
                        </div><!--end-phone--> 
                    </div>
                    <div class="box-right clearfix">
                        <?php
                        $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_SEARCH_BOX));
                        ?>
                    </div>
                </div>
            </div>      
            <div class="box-menu">
                <div class="container">
                    <?php
                    $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_HEADER));
                    ?>
                </div>
                <!--end-container--> 
            </div><!--end-box-menu--> 
        </div><!--end-container-->                                                                                                                        
    </div>    <!--end-box-top-->
    <!--end-bg-box-top-->
    <div class="banner-top">
        <?php
        $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK1));
        ?>
    </div>
</div>