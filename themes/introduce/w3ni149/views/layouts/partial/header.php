<div id="header" >
    <div class="cont-header clearfix">
        <div class="logo">
            <h1>
                <a href="<?php echo Yii::app()->homeUrl; ?>" title="<?php echo Yii::app()->siteinfo['site_title']; ?>">
                    <img alt="Về trang chủ" src="<?php echo Yii::app()->siteinfo['site_logo']; ?>" />
                    <span class="hide-text"><?php echo Yii::app()->siteinfo['site_title']; ?></span>
                </a>
            </h1>
        </div>
        <div class="header_banner">
            <?php
                    $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_TOP_HEADER));
                    ?>
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
                <li ><?php
                    $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_HEADER_RIGHT));
                    ?></li>
            </ul>
        </div>
        <div class="cont-header-r clearfix">
            <div class="timkiem">
                <div class="search-form">
                    <?php
                    $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_TOP_CENTER));
                    ?>
                </div>
                <!--end-search-form--> 
            </div>
            <!--end-timkiem-->
            <!--        <div class="box-phone">
                      <div class="phone">
                        <div class="icon"></div>
            <?php
            $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_HEADER_LEFT));
            ?>
                      </div>
                    </div>-->
        </div>
        <div class="clear"></div>
        <nav id="nav">
            <div class="box-menu">
                <?php
                $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_HEADER));
                ?>
            </div>
        </nav>
    </div>
</div>