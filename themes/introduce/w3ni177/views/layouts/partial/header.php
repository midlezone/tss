<div id="header">
    <div class="top-header">
        <?php
        $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_TOP_HEADER));
        ?>
        <div class="login">
            <ul class="menu">
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
    </div>
    <div class="cont-header clearfix">
        <div class="logo">
            <h1>
                <a href="<?php echo Yii::app()->homeUrl; ?>" title="<?php echo Yii::app()->siteinfo['site_title']; ?>">
                    <img alt="Về trang chủ" src="<?php echo Yii::app()->siteinfo['site_logo']; ?>" />
                    <span class="hide-text"><?php echo Yii::app()->siteinfo['site_title']; ?></span>
                </a>
            </h1>
        </div>
        <div class="cont-header-r">
            <div class="box clearfix">
                <div class="timkiem">
                    <?php
                    $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_TOP_CENTER));
                    ?>

                    <!--end-search-form--> 
                </div>
                <div class="cart-cont">
                    <?php
                    $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_HEADER_RIGHT));
                    ?>

                </div>
                <!--end-timkiem--> 
            </div>
        </div>
    </div>
</div>