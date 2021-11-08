<header id="header">
    <div class="container">
        <div class="clearfix">
            <div class="logo">
                <h1>
                    <a href="<?php echo Yii::app()->homeUrl; ?>" title="<?php echo Yii::app()->siteinfo['site_title']; ?>">
                        <img src="<?php echo Yii::app()->siteinfo['site_logo']; ?>" />
                        <span class="hide-text"><?php echo Yii::app()->siteinfo['site_title']; ?></span>
                    </a>
                </h1>
            </div>
            <div class="header_banner">
                <?php
                $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_HEADER));
                ?>
            </div>
            <div class="header-cont pull-right">
                <?php
                $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_HEADER_LEFT));
                ?>
            </div>
        </div>
    </div>
</header>