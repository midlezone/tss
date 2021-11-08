<div id="header">
    <div class="top-header">
        <div class="container">
            <?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_TOP_HEADER)); ?>
            <div class="social-top"></div>
        </div>
    </div>
    <div class="cont-header">
        <div class="container">
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
            <div id="cssmenu">
                <?php
                $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_MENU_MAIN));
                ?>
            </div>
        </div>
    </div>
</div>