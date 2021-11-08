<div class="header" id="header">
    <div class="container">
        <div class="top-menu clearfix">
            <?php
            $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_TOP_HEADER));
            ?> 
            <div class="info downarrow"><span>Menu</span></div>
            <ul class="sub-mn">
                <?php if (Yii::app()->user->isGuest) { ?>
                    <li>
                        <a href="<?php echo Yii::app()->createUrl('login/login/login'); ?>">
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
        <div class="row">
            <div class="col-sm-3 col-xs-12">
                <div class="logo clearfix">
                    <h1 class="clearfix">
                        <a href="<?php echo Yii::app()->homeUrl; ?>" title="<?php echo Yii::app()->siteinfo['site_title']; ?>">
                            <img alt="V�? trang chủ" src="<?php echo Yii::app()->siteinfo['site_logo']; ?>" />
                            <span class="hide-text"><?php echo Yii::app()->siteinfo['site_title']; ?></span>
                        </a>
                    </h1>
                </div>
            </div>
            <div class="col-sm-5 col-xs-12">
                <!--Banner Header-->
                <div class="banner-top">
                    <!--                    <a title="banner top" href=""> 
                                            <img alt="banner top" src="css/img/a.png">
                                        </a>-->
                    <?php
                    $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_TOP_CENTER));
                    ?>

                </div>
            </div>
            <div class="col-sm-4 col-xs-12">
                <?php
                $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_SEARCH_BOX));
                ?>
            </div>
        </div>
        <?php
        $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_HEADER));
        ?>
    </div>
</div>